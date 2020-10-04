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


?>


<div class="row" style="margin-bottom: 30px">
   <div class="col-md-4">
      <h2 style="margin-top:0px">Admin Users List</h2>
   </div>
   <div class="col-md-4 text-center">
      <div style="margin-top: 4px"  id="message">
         <?php echo $session->getFlashdata('message') <> '' ? $session->getFlashdata('message') : ''; ?>
      </div>
   </div>
   <div class="col-md-4 text-right">
   </div>
</div>
<div class="card shadow mb-4" style="margin-bottom: 50px" >
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users  DataTables Example</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive" >
         <table class="table table-bordered table-striped" id="zmytable_users">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Grupo</th>
                  <th>Status</th>
                  <th><?php echo anchor(site_url('usersadmin/create'), 'Create', 'class="btn btn-primary btn-block"'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  foreach ($users_data as $users)
                  {
                      $roles_user = $oAuth->admin()->getRolesForUserById($users->id);
                      
                      $estado = '';
                      if ($session->id_user == $users->id) {
                              
                              if ($oAuth->isNormal()) {
                                  $estado = 'Normal';
                              }
                  
                              if ($oAuth->isArchived()) {
                                  $estado = 'archived';
                              }
                  
                              if ($oAuth->isBanned()) {
                                  $estado = 'banned';
                              }
                  
                              if ($oAuth->isLocked()) {
                                  $estado = 'locked';
                              }
                  
                              if ($oAuth->isPendingReview()) {
                                  $estado = 'pending review';
                              }
                  
                              if ($oAuth->isSuspended()) {
                                  $estado = 'suspended';
                              }
                          }
                          ?>
               <tr>
                  <td><?php echo $users->id?></td>
                  <td><?php echo htmlspecialchars($users->email,ENT_QUOTES,'UTF-8') ?></td>
                  <td><?php echo htmlspecialchars($users->username,ENT_QUOTES,'UTF-8') ?></td>
                  <td>
                      <?php 
                        foreach ($roles_user as $value) {
                            echo $value.'<br/>';
                        }
                      ?>
                  </td>
                  <td><?php echo $estado?></td>
                  <td style="text-align:center" >
                     <?php 
                     if ($session->is_admin){
                        echo anchor(site_url('usersadmin/read/'.$users->id),'Read'); 
			echo '<br/>';  
                        echo anchor(site_url('usersadmin/grupo/'.$users->id.'/1'),'Is ADMIN'); 
                        echo '<br/>';
                        echo anchor(site_url('usersadmin/grupo/'.$users->id.'/2'),'Is AUTHOR'); 
                        echo '<br/>';
                        echo anchor(site_url('usersadmin/otrapass/'.$users->id),'Update Pass'); 
                        echo '<br/>'; 
                        echo anchor(site_url('usersadmin/otromail/'.$users->id),'Update Email'); 
                        echo '<br/>'; 
                        echo anchor(site_url('usersadmin/update/'.$users->id),'Update'); 
                        echo '<br/>'; 
                        echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
                     }
                    ?>
                  </td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

