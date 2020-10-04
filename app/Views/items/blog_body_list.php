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



MyCache();
?>


<div class="row">
   <!-- Blog Entries Column -->
   <div class="col-md-8">
      <h1 class="my-4">Items
         <small> Presentaci&oacute;n formato Blog</small>
      </h1>
      <?php echo $session->getFlashdata('message') <> '' ? $session->getFlashdata('message')  : ''; ?> 
      <!-- Blog Post -->
      
      <div class="col-md-12">  
            <?php if($paginado){ echo $pager->links('items', 'front_items');}?>
            <?php echo view('items/table_blog_items');?></br>
            <?php if($paginado){ echo $pager->links('items', 'front_items');}?>
      </div>    
               
   </div>
   <!-- Sidebar Widgets Column -->
   <div class="col-md-4">
      <div class="card my-4">
         <h5 class="card-header">Mi Proyecto</h5>
         <div class="card-body">
            Desarrollado con:</br>
             <ul>
                 <li>Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></li>
                 <li>Bootstrap 4.4.1</li>
                 <li>Plantillas de https://startbootstrap.com/</li>
                 <li>https://datatables.net/</li>
                 <li>https://github.com/fzaninotto/Faker</li>
             </ul>
         </div>
      </div>
      <div class="card my-4">
         <h5 class="card-header">Reordenar</h5>
         <div class="card-body">
              <?php if($paginado){                
                echo anchor(site_url('orden/3'),'ASC ');
                echo anchor(site_url('orden/4'),' DESC');
                }?>
         </div>
      </div>
      <p>
          <?php if(!$session->is_login){
            echo view('login_form');
          }?>
      </p>
      <!-- Categories Widget -->
      <?php echo view('modulos/modulo_categorias'); ?>
      <!-- Side Widget -->
      <!-- Side Widget -->
      <div class="card my-4">
         <h5 class="card-header">Side Widget</h5>
         <div class="card-body">
            You can put anything you want ...!
         </div>
      </div>
   </div>
</div>
<!-- /.row -->
<!-- /.container -->

