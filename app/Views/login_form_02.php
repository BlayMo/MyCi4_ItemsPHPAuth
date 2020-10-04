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
 *  @link      https://github.com/BlayMo https://codeigniter.com
 *  @since      Version 4.0.0
 *  @filesource
 *  

 *  --------------------- xxxxxx -------------------------
 * 
 *   @Proyecto: MyCi4_BlogAdmin
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo
 *   @Comienzo: 09-03-2020
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 7.4.1 + Codeigniter 4.0.2
 * 
 */

?>


<div class="card my-4">
   <h5 class="card-header display-6 text-center">LogIn</h5>
   <article class="card-body">
      
      <hr>
      <?php echo $session->getFlashdata('message_login') <> '' ? $session->getFlashdata('message_login')  : ''; ?>
      <form action="<?= site_url($action) ?>" method="post" autocomplete="off">
         <?= csrf_field() ?>
         <div class="form-group">
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input name="email" class="form-control" placeholder="Email" type="email" value="<?php echo $email; ?>">
            </div>
            <!-- input-group.// -->
         </div>
         <!-- form-group// -->
         <div class="form-group">
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input name="password"  class="form-control" placeholder="******" type="password" value="<?php echo $password; ?>">
            </div>
            <!-- input-group.// -->
         </div>
         <!-- form-group// -->
         <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Login  </button>
            
         </div>
         <!-- form-group// -->                 
      </form>
     
      <hr>
      <p class="text-center lead"><a href="<?=site_url('registro')?>"><span class="fa fa-sign-in"></span> Sign Up</a></p>
      <p class="text-center lead"><a href="<?=site_url('users/newpass')?>" >Forgot password?</a></p>
      <p class="text-center"><a href="<?php echo site_url($retorno) ?>" class="btn btn-danger">Volver</a></p>
   </article>
</div>

