<?php

/*
 *  CodeIgniter
 * 
 *  An open source application development framework for PHP
 * 
 *  This content is released under the MIT License (MIT)
 * 
 *  Copyright (c) 2014-2019 British Columbia Institute of Technology
 *  Copyright (c) 2019-2020 CodeIgniter Foundation
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 *  @package    CodeIgniter
 *  @author     CodeIgniter Dev Team
 *  @copyright  2019-2020 CodeIgniter Foundation
 *  @license    https://opensource.org/licenses/MIT  MIT License
 *  @link       https://codeigniter.com
 *  @since      Version 4.0.0
 *  @filesource
 *  

 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyCi4_PHPAuth
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo: 27-09-2020
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 7.4.4 + Codeigniter 4.0.4 + Bootstrap v4.5.2
 *   Script creado el 28-09-2020
 *   28 sept. 2020
 * 
 */

namespace App\Controllers;

use App\Models\UsersModel;
use App\Entities\UsersEnt;
use App\Controllers\BaseController;

class UsersAdmin extends BaseController {

    private $Users_model;
    private $retorno;
    private $oUsersEnt;
    private $template;
    private $vista;

    function __construct() {
        $this->Users_model = new UsersModel;
        $this->oUsersEnt = new UsersEnt;
        $this->retorno = 'users';
        $this->template = 'templates/header_footer_default';
        $this->vista = '';       
    }

    public function index() {
        if ($this->canAdmin($this->oAuth)) {
            $users = $this->Users_model->findAll();
            $this->vista = 'users/users_admin_list';
            $data = array(
                'users_data' => $users,
                'session' => $this->session,
                'navbar' => 'templates/main_navbar',
                'botones' => $this->botones,
                'oAuth' => $this->oAuth,
                'roles' => $this->oAuth->getRoles()
            );

            $data['vista'] = $this->vista;

            return view($this->template, $data);
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function otromail($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);

            if ($row) {
                $data = array(
                    'button' => 'Actualizar',
                    'action' => site_url('usersadmin/otromailOk'),
                    'id' => set_value('id', $row->id),
                    'email' => set_value('email', $row->email),
                    'newemail' => set_value('newemail', ''),
                    'username' => set_value('username', $row->username),
                    'navbar' => 'templates/main_navbar',
                );
                $data['retorno'] = $this->retorno;
                $data['vista'] = 'users/users_form_admin_otromail';
                $data['session'] = $this->session;
                $data['validation'] = $this->validation;

                return view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
                return redirect()->to(site_url($this->retorno));
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function otromailOk() {
        $id = $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT);
        $row = $this->Users_model->find($id);
        if ($row) {
            $newemail = $this->request->getPost('newemail', FILTER_VALIDATE_EMAIL);
            $this->Users_model->update($id,['email' => $newemail]);
            
            $this->session->setFlashdata('message', 'Email Actualizado'); 
            
        }
        
        $this->index();
    }

    //cambia password a un usuario no logeado
    public function otrapass($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);

            if ($row) {

                $data = array(
                    'button' => 'Actualizar',
                    'action' => site_url('usersadmin/otrapassOk'),
                    'id' => set_value('id', $row->id),
                    'email' => set_value('email', $row->email),
                    'newpassword' => set_value('newpassword', ''),
                    'username' => set_value('username', $row->username),
                    'navbar' => 'templates/main_navbar',
                );
                $data['retorno'] = $this->retorno;
                $data['vista'] = 'users/users_form_admin_newpass';
                $data['session'] = $this->session;
                $data['validation'] = $this->validation;

                return view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
                $this->index();
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function otrapassOk() {
        $id = $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT);
        $row = $this->Users_model->find($id);
        if ($row) {

            $password = $this->request->getPost('newpassword', FILTER_SANITIZE_STRING);
            try {
                $this->oAuth->admin()->changePasswordForUserById($id, $password);
                $this->session->setFlashdata('message', 'Password actualizada');
                
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                
                $this->session->setFlashdata('message', 'Password no valida');
                $this->otrapass($id);
            }

            //$this->index();
        }else{
            $this->session->setFlashdata('message', 'Registro No Encontrado');
        }
        $this->index();
    }

    public function grupo($id, $rol) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);
            if ($row) {
                try {
                    if ($rol == 1) {
                        $this->oAuth->admin()->addRoleForUserById($row->id, \Delight\Auth\Role::ADMIN);
                    }
                    if ($rol == 2) {
                        $this->oAuth->admin()->addRoleForUserById($row->id, \Delight\Auth\Role::AUTHOR);
                    }
                } catch (\Delight\Auth\UnknownIdException $e) {
                    $this->session->setFlashdata('message', 'Registro No Encontrado');
                }
            }
            $this->index();
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function read($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);
            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'password' => $row->password,
                    'username' => $row->username,
                    'status' => $row->status,
                    'verified' => $row->verified,
                    'resettable' => $row->resettable,
                    'roles_mask' => $row->roles_mask,
                    'registered' => $row->registered,
                    'last_login' => $row->last_login,
                    'force_logout' => $row->force_logout,
                    'navbar' => 'templates/main_navbar',
                );
                $data['retorno'] = 'users';
                $data['vista'] = 'users/users_read';
                $data['session'] = $this->session;

                return view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
                $this->index();
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function create() {
        if ($this->canAdmin($this->oAuth)) {
            $data = array(
                'button' => 'Crear',
                'action' => site_url('usersadmin/createOk'),
                'email' => set_value('email'),
                'password' => set_value('password'),
                'username' => set_value('username'),
                'navbar' => 'templates/main_navbar',
            );
            $data['retorno'] = $this->retorno;
            $data['vista'] = 'users/users_form_admin_new';
            $data['session'] = $this->session;
            $data['validation'] = $this->validation;


            return view($this->template, $data);
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function createOk() {

        if (!$this->new_rules()) {
            $this->create();
        } else {

            $email = $this->request->getPost('email', FILTER_VALIDATE_EMAIL);
            $password = $this->request->getPost('password', FILTER_SANITIZE_STRING);
            $username = $this->request->getPost('username', FILTER_SANITIZE_STRING);

            try {
                $userId = $this->oAuth->admin()->createUser($email, $password, $username);
                $this->session->setFlashdata('message', 'Ud. Se ha registrado con el  ID ' . $userId);
            } catch (\Delight\Auth\InvalidEmailException $e) {
                $this->session->setFlashdata('message', 'Email no valido');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                $this->session->setFlashdata('message', 'Password no valida');
            } catch (\Delight\Auth\UserAlreadyExistsException $e) {
                $this->session->setFlashdata('message', 'El usuario ya existe');
            }

            $this->index();
        }
    }

    public function update($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);

            if ($row) {

                $data = array(
                    'button' => 'Actualizar',
                    'action' => site_url('usersadmin/updateOk'),
                    'id' => set_value('id', $row->id),
                    'email' => set_value('email', $row->email),
                    'password' => set_value('password', $row->password),
                    'username' => set_value('username', $row->username),
                    'status' => set_value('status', $row->status),
                    'verified' => set_value('verified', $row->verified),
                    'resettable' => set_value('resettable', $row->resettable),
                    'roles_mask' => set_value('roles_mask', $row->roles_mask),
                    'registered' => set_value('registered', $row->registered),
                    'last_login' => set_value('last_login', $row->last_login),
                    'force_logout' => set_value('force_logout', $row->force_logout),
                    'navbar' => 'templates/main_navbar',
                );
                $data['retorno'] = $this->retorno;
                $data['vista'] = 'users/users_form_admin_up';
                $data['session'] = $this->session;
                $data['validation'] = $this->validation;


                return view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
                return redirect()->to(site_url($this->retorno));
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function updateOk() {
        $id = $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT);
        if (!$this->up_rules()) {
            $this->update($id);
        } else {
           
            $oData = $this->oUsersEnt;
             
            $data = $this->request->getPost();
            $oData->fill($data);

            $this->Users_model->save($oData);
            $this->session->setFlashdata('message', 'Registro Actualizado');

            
            $this->index();
        }
    }

    public function delete($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Users_model->find($id);
            if ($row) {
                //$this->Users_model->delete($id);
                try {
                    $this->auth->admin()->deleteUserById($id);
                    $this->session->setFlashdata('message', 'Registro Borrado');
                } catch (\Delight\Auth\UnknownIdException $e) {
                    $this->session->setFlashdata('message', 'Registro No Encontrado');
                }
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
            }

            $this->index();
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    private function new_rules() {
        $this->validation->reset();

        $rules = array(
            'email' => ['label' => 'Email', 'rules' => 'trim|required|string'],
            'password' => ['label' => 'Password', 'rules' => 'trim|required|string'],
            'username' => ['label' => 'Username', 'rules' => 'trim|required|string'],
        );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    private function up_rules() {
        $this->validation->reset();

        $rules = array(
            'username' => ['label' => 'Username', 'rules' => 'trim|required|string'],
            'id' => 'trim');

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

}
