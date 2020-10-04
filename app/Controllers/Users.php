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
 */

/*
 * Control de acceso desde el front
 * 
 * Login, Logout, Registro, modificar datos del usuario
 * 
 */


namespace App\Controllers;
use App\Models\UsersModel;
use App\Entities\UsersEnt; 
use App\Controllers\BaseController;    


class Users extends BaseController
{
    
    private $Users_model;
    private $retorno;
    private $oUsersEnt;
    private $template;
    private $vista;
    
        
    function __construct()
    {
        $this->Users_model = new UsersModel;
        $this->oUsersEnt = new UsersEnt;    
        $this->retorno = 'items';
        $this->template = 'templates/header_footer_default';
        $this->vista = ''; 
        
    }
    
    public function Entrar(){      
        
        $data = array();
        
        $data['password'] = set_value('password', '');
        $data['email'] = set_value('email', '');
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;
        $data['action'] = 'users/mylogin';
        $data['retorno'] = 'items';
        $data['vista'] = 'login_form_02';
        
        echo view( 'templates/header_footer_default', $data);
    }
    
    public function mylogin() {

        $ret = 'login';
        if (!$this->log_rules()) {
            $this->Entrar();
        } else {
            $email = $this->request->getPost('email', FILTER_VALIDATE_EMAIL);
            $password = $this->request->getPost('password', FILTER_SANITIZE_STRING);
            try {

                $this->oAuth->login($email, $password, (int) TIEMPO_SESSION);
                $ret = 'items';
                //$this->session->setFlashdata('message', $this->oAuth->getUsername() . ' is logged in ');
                $this->session->set('is_login', true);
                $this->session->set('is_admin', false);
                if ($this->oAuth->hasRole(\Delight\Auth\Role::ADMIN)) {
                    $this->session->set('is_admin', true);
                }
                $this->session->set('id_user', $this->oAuth->getUserId());
                $this->session->set('username', $this->oAuth->getUsername());
                $this->session->setFlashdata('message', $this->session->username . ' is logged in ');
            } catch (\Delight\Auth\InvalidEmailException $e) {
                $this->session->setFlashdata('message_login', 'Wrong email address');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                $this->session->setFlashdata('message_login', 'Wrong password');
            } catch (\Delight\Auth\EmailNotVerifiedException $e) {
                $this->session->setFlashdata('message_login', 'Email not verified');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                $this->session->setFlashdata('message_login', 'Too many requests');
            }
        }
        return redirect()->to(site_url($ret));
    }

    private function log_rules() {
        $this->validation->reset();
        $rules = array(            
            'password' => ['label' => 'Password', 'rules' => 'trim|required|min_length[8]|max_length[12]'],
            'email' =>    ['label' => 'Email',    'rules' => 'trim|required|valid_email'],
        );
        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    public function salir(){
        $this->oAuth->logOut();
        $this->oAuth->destroySession();
        $this->session->setFlashdata('message', 'Is LogOut');
        return redirect()->to(site_url('items'));
    }
    
    //------------------ my cuenta -------------------------
    // modificar mail y password del usuario logeado
    public function mycta() {
        if ($this->canEdit($this->oAuth)) {
            $row = $this->Users_model->find($this->session->id_user);

            if ($row) {
                $data = array(
                    'button' => 'Actualizar',
                    'action' => site_url('users/myctaOk'),
                    'id' => set_value('id', $row->id),
                    'email' => $row->email,
                    'newemail' => set_value('newemail', ''),
                    'newpassword' => set_value('newpassword', ''),
                    'username' => set_value('username', $row->username),
                    'status' => $row->status,                    
                    'navbar' => 'templates/main_navbar',
                );
                $data['retorno'] = 'items';
                $data['vista'] = 'users/users_form_mycta';
                $data['session'] = $this->session;
                $data['validation'] = $this->validation;

                echo view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No Encontrado');
                return redirect()->to(site_url('items'));
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function myctaOk() {
        $id = $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT);
        if (!$this->myc_rules()) {
            $this->session->setFlashdata('message', 'Revise los datos');
            $this->mycta();
        } else {
            $row = $this->Users_model->find($id);
            if ($row) {
                $msg1 = $msg2 = '';
                $email = $this->request->getPost('newemail', FILTER_VALIDATE_EMAIL);
                $p = $this->request->getPost('newpassword');

                $username = $this->request->getPost('username', FILTER_SANITIZE_STRING);
                $this->Users_model->update($id, ['username' => $username]);

                if ($email !== '') {
                    if (trim($row->email) != $email) {
                        //cambia email
                        $msg1 = $this->newemail($row->password, $email);
                    }
                }
                if ($p !== '') {
                    $password = \password_hash($p, \PASSWORD_DEFAULT);
                    if ($password !== $row->password) {
                        //cambia password
                        $msg2 = $this->renewpass($row->password, $p);
                    }
                }

                $msg = 'Email:' . $msg1 . ' Password: ' . $msg2;
                $this->session->setFlashdata('message', $msg);
            } else {
                $this->session->setFlashdata('message', 'Registro no encontrado');
            }

            $this->mycta();
        }
    }

    private function newemail($password, $email) {
        $msg1 = '';
        try {
            if ( $this->oAuth->reconfirmPassword($password)) {
                 $this->oAuth->changeEmail($email) ;

                $msg1 = 'The change will take effect as soon as the new email address has been confirmed';
            } else {
                $msg1 = 'We can\'t say if the user is who they claim to be';
            }
            
        } catch (\Delight\Auth\InvalidEmailException $e) {
            $msg1 = 'Email no valido';
            
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            $msg1 = 'Email address already exists';
            
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {
            $msg1 = 'Account not verified';
            
        } catch (\Delight\Auth\NotLoggedInException $e) {
            $msg1 = 'Not logged in';
            
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            $msg1 = 'Too many requests';
        }
        
        return $msg1;
    }
    
    private function renewpass($oldpass, $newpass) {
        
        try {
             $this->oAuth->changePassword($oldpass, $newpass);

            $msg2 = 'Password has been changed';
        } catch (\Delight\Auth\NotLoggedInException $e) {
            $msg2 ='Not logged in';
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            $msg2 = 'Password no valida(s)';
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            $msg2 = 'Too many requests';
        }
        
        return $msg2;
    }

    //------- forgot password
    public function newpass() 
    {                   
        $data = array(
            'button' => 'Submit',
            'action' => site_url('users/newpassOk'),	    
	    'email' => set_value('email'),   
            'navbar' => 'templates/main_navbar',
	);
        $data['retorno'] = $this->retorno;
        $data['vista']   = 'users/users_form_new_pasword';
        $data['session'] = $this->session;
        
        echo view($this->template, $data);
    }
    
    public function newpassOk() {
        
        $email = $this->request->getPost('email', FILTER_VALIDATE_EMAIL);
        try {            
            $this->oAuth->forgotPassword($email, function ($selector, $token) { 
                $url = base_url('reset_password').'?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
                $msg = 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo $msg.$url;//solo test
                //$this->sendEmail($email, $subject, $url, $fromEmail);
            });
            
            /*
             * 
             * Ver pasos 2 y 3 no desarrollados en este proyecto
             * https://github.com/delight-im/PHP-Auth#password-reset-forgot-password
             * 
             * 
             */
            
            $this->session->setFlashdata('message','Request has been generated<br/>');
            return redirect()->to(site_url('items'));
            
        } catch (\Delight\Auth\InvalidEmailException $e) {
            $this->session->setFlashdata('message_login', 'Email no valido');
            return redirect()->to(site_url('login'));
            
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {            
             $this->session->setFlashdata('message_login', 'Email not verified');
             return redirect()->to(site_url('login'));
             
        } catch (\Delight\Auth\ResetDisabledException $e) {
            $this->session->setFlashdata('message_login', 'Password reset is disabled');
            return redirect()->to(site_url('login'));
            
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            $this->session->setFlashdata('message_login', 'Too many requests');
            return redirect()->to(site_url('login'));
        }
        
        
    }
    //------------------------------------------------------
    
    public function create() 
    {                   
        $data = array(
            'button' => 'Crear',
            'action' => site_url('users/createOk'),
	    'id' => set_value('id'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'username' => set_value('username'),
	    'status' => set_value('status'),
	   
            'navbar' => 'templates/main_navbar',
	);
        $data['retorno'] = $this->retorno;
        $data['vista']   = 'users/users_form_new';
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;
        
        
        echo view($this->template, $data);
    }
    
    
    
    public function createOk() {

        $ret = 'users/create';
        if (!$this->new_rules()) {
            $this->create();
        } else {
            $email    = $this->request->getPost('email',    FILTER_VALIDATE_EMAIL);
            $password = $this->request->getPost('password', FILTER_SANITIZE_STRING);
            $username = $this->request->getPost('username', FILTER_SANITIZE_STRING);
            try {
                $userId = $this->oAuth->register($email, $password, $username);

                $ret = 'items';
                $this->session->setFlashdata('message', 'We have signed up a new user with the ID ' . $userId);
            } catch (\Delight\Auth\InvalidEmailException $e) {
                $this->session->setFlashdata('message', 'Email no valido');
            } catch (\Delight\Auth\InvalidPasswordException $e) {
                $this->session->setFlashdata('message', 'Password no valida');
            } catch (\Delight\Auth\UserAlreadyExistsException $e) {
                $this->session->setFlashdata('message', 'El usuario ya existe');
            } catch (\Delight\Auth\TooManyRequestsException $e) {
                $this->session->setFlashdata('message', 'Too many requests');
            }

            return redirect()->to(site_url($ret));
        }
    }

    private function new_rules() {
        $this->validation->reset();

        $rules = array(
            'email' =>      ['label' => 'Email', 'rules' => 'trim|required|valid_email'],
            'password' =>   ['label' => 'Password', 'rules' => 'trim|required|string'],
            'username' =>   ['label' => 'Username', 'rules' => 'trim|required|string'],
        );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    private function myc_rules() {
        $this->validation->reset();

        $rules = array(
            'newemail' =>      ['label' => 'Email',    'rules' => 'trim|valid_email'],
            'newpassword' =>   ['label' => 'Password', 'rules' => 'trim'],
            'username' =>      ['label' => 'Username', 'rules' => 'trim|string'],
        );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }
}
