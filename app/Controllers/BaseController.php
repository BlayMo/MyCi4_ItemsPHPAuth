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
 *   Script creado el 27-09-2020
 *   27 sept. 2020
 * 
 */

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */


use CodeIgniter\Controller;
use Config\Database;
use Faker;
use Detection\MobileDetect;
use HTMLPurifier_HTML5Config;
use HTMLPurifier;
use App\Models\UsersModel;

defined('FILAS') || define('FILAS', 5);
defined('WORDS') || define('WORDS', 50);
defined('TIEMPO_SESSION')  || define('TIEMPO_SESSION', (15 * MINUTE)); //DURACION SESION EN 15 MINUTOS


class BaseController extends Controller {

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'form', 'text'];

    
    protected $security, $session, $validation, $botones, $faker, 
              $cerrar_session, $is_admin, $is_login,  $limpia, $oAuth;
    
    protected $pantalla;

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
       
        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        
        $this->session    = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->security   = \Config\Services::security();
        $this->faker      = Faker\Factory::create();
        $this->pager      = \Config\Services::Pager();
        $this->botones    = config('Botones');
        $this->pantalla   = new MobileDetect();
        $config           = HTMLPurifier_HTML5Config::createDefault();
        $this->limpia     = new HTMLPurifier($config);

        $this->db = Database::connect();

        //-------------------- conexion con auth ----------------
        $db = new Database();     
       
        $dbh = \Delight\Db\PdoDatabase::fromDsn(new \Delight\Db\PdoDsn("mysql:dbname={$db->pdo['database']};"
        . "host={$db->pdo['hostname']};charset={$db->pdo['charset']}",
                 $db->pdo['username'], $db->pdo['password']));
        
        $this->oAuth = new \Delight\Auth\Auth($dbh);
        
//        if (!$this->oAuth->isLoggedIn()) {
//            $this->session->set('is_login', false);
//            $this->session->set('is_admin', false);
//            $this->session->set('id_user', 0);
//            $this->session->set('username', '');
//        } else {
//            //users/mylogin            
//        }
           
    }
    
    //roles autorizados en edicion
    // ver items/update
    protected function canEdit(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
                        \Delight\Auth\Role::MODERATOR,
                        \Delight\Auth\Role::SUPER_MODERATOR,
                        \Delight\Auth\Role::ADMIN,
                        \Delight\Auth\Role::SUPER_ADMIN,
                        \Delight\Auth\Role::AUTHOR
        );
    }
    // ver items/delete
    protected function canDel(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
                        \Delight\Auth\Role::SUPER_ADMIN,
        );
    }
    
    protected function canAdmin(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
                        \Delight\Auth\Role::ADMIN,
                        \Delight\Auth\Role::SUPER_ADMIN,

        );
    }
    
    protected function verTodos(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
                        \Delight\Auth\Role::ADMIN,
                        \Delight\Auth\Role::AUTHOR,
                        \Delight\Auth\Role::COLLABORATOR,
                        \Delight\Auth\Role::CONSULTANT,
                        \Delight\Auth\Role::CONSUMER,
                        \Delight\Auth\Role::CONTRIBUTOR,
                        \Delight\Auth\Role::COORDINATOR,
                        \Delight\Auth\Role::CREATOR,
                        \Delight\Auth\Role::DEVELOPER,
                        \Delight\Auth\Role::DIRECTOR,
                        \Delight\Auth\Role::EDITOR,
                        \Delight\Auth\Role::EMPLOYEE,
                        \Delight\Auth\Role::MAINTAINER,
                        \Delight\Auth\Role::MANAGER,
                        \Delight\Auth\Role::MODERATOR,
                        \Delight\Auth\Role::PUBLISHER,
                        \Delight\Auth\Role::REVIEWER,
                        \Delight\Auth\Role::SUBSCRIBER,
                        \Delight\Auth\Role::SUPER_ADMIN,
                        \Delight\Auth\Role::SUPER_EDITOR,
                        \Delight\Auth\Role::SUPER_MODERATOR,
                        \Delight\Auth\Role::TRANSLATOR
        );
    }
    
    protected function user_online() {
        if (!$this->oAuth->isLoggedIn()) {
            $this->session->set('is_login', false);
            $this->session->set('is_admin', false);
            $this->session->set('id_user', 0);
            $this->session->set('username', '');
            $this->session->set('tiempo', 0);
        }
        else {            
            $this->session->set('is_login', true);
            $this->session->set('is_admin', false);
            if ($this->oAuth->hasRole(\Delight\Auth\Role::SUPER_ADMIN)) {
                $this->session->set('is_admin', true);
            }
            //$this->session->set('is_admin', true);//solo test
            $this->session->set('id_user', $this->oAuth->getUserId());
            $this->session->set('username', $this->oAuth->getUsername());
            
            if ($this->session->tiempo === 0) {
                $user_model = new UsersModel();
                $row = $user_model->find($this->session->id_user);
                $tiempo = time();
                if ($row){
                    $tiempo = $row->last_login;
                }
                $this->session->set('tiempo', (int)$tiempo);
            }
        }

        //---------------- compruebo dispositivo ------------
        if ($this->pantalla->isMobile()) {
            $this->session->set('es_movil', true);
        }
        else {
            $this->session->set('es_movil', false);
        }
//        $this->session->set('es_movil', true);//solo test
        //---------------------------------------------------
        
        $ahora  = time();
        $online = 0;
        if ($this->session->tiempo > 0) {
            $online = $ahora - $this->session->tiempo;
            $this->session->setFlashdata('message_login', '<strong>On Line... ' . intval($online / 60) . ' / ' . $this->session->username . '</strong>');
        }

        if (($online) > TIEMPO_SESSION) {
            return $this->salir();
        }
        else {

            return $this;
        }
    }

    public function salir() {        
        $salir = true;
        try {
            //$this->oAuth->logOutEverywhere();
            $this->oAuth->logOut();
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            //die('Not logged in');
             $this->session->setFlashdata('message', $e.' -Not logged in');
             $salir = false;
        }
        
        if ($salir){
            $this->session->setFlashdata('message_login', '');
            //$this->session->destroy();
            $this->oAuth->destroySession();
        }
        
        return redirect()->to(site_url('items'));
    }


}
