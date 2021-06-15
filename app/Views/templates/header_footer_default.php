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
 *   @Proyecto: MyCi4_ItemsCrud
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo
 *   @Comienzo: 11-04-2020
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 7.4.4 + Codeigniter 4.0.2 + Bootstrap 4.4.1
 * 
 */

?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <?= csrf_meta()?>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Items CRUD</title>
      <!-- Bootstrap core CSS -->
      <link href="<?php echo base_url('assets/vendor/bootstrap/bootstrap.css') ?>" rel="stylesheet"/>
      <link href="<?php //echo site_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"/>
      <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <style>                    
         #toTop{
         position: fixed;
         bottom: 10px;
         right: 10px;
         cursor: pointer;
         display: none;
         }
      </style>
      <style>
         body{
         padding-top: 75px;
         }
      </style>
   </head>
   <body>
      <?php echo view('templates/main_navbar')?>
      <div class="container">
         <?php echo view($vista);?>          
      </div>
      <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ItemsCrud 2019 * Template from https://startbootstrap.com/</p>
          </div>
          <!-- /.container -->
        </footer>
      <script src="https://kit.fontawesome.com/4350c69beb.js" crossorigin="anonymous"></script>
      <script src="<?php echo site_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
      <script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>
      <script type="text/javascript">
         //boton Up   
         $(document).ready(function () {
             $('body').append('<div id="toTop" class="btn btn-success"><span class="glyphicon glyphicon-chevron-up"></span> Up</div>');
             $(window).scroll(function () {
                 if ($(this).scrollTop() !== 0) {
                     $('#toTop').fadeIn();
                 } else {
                     $('#toTop').fadeOut();
                 }
             });
             $('#toTop').click(function () {
                 $("html, body").animate({scrollTop: 0}, 600);
                 return false;
             });
         });
      </script>
      
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable_users").dataTable({                
                 "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todo"] ],
                 "responsive": true,
                 "searching": true,
                 "ordering": true,                
                 "processing": true,
                 "language": { "url": "<?=site_url('/assets/datatables/spanish.json')?>" },
                 "columnDefs": [
                             { "orderable": false, "targets": 8 },{ "orderable": false, "targets": 9 }
                           ]
             });              
         });        
      </script> 
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable_groups").dataTable({                
                 "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todo"] ],
                 "responsive": true,
                 "searching": true,
                 "ordering": true,                
                 "processing": true,
                 "language": { "url": "<?=site_url('/assets/datatables/spanish.json')?>" },
                 "columnDefs": [
                             { "orderable": false, "targets": 3 }
                           ]
             });              
         });        
      </script> 
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable_items").dataTable({                
                 "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todo"] ],
                 "responsive": true,
                 "searching": true,
                 "ordering": true,                
                 "processing": true,
                 "language": { "url": "<?=site_url('/assets/datatables/spanish.json')?>" },
                 "columnDefs": [
                             { "orderable": false, "targets": 4 }
                           ]
             });              
         });        
      </script> 
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable_users").dataTable({                
                 "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Todo"] ],
                 "responsive": true,
                 "searching": true,
                 "ordering": true,                
                 "processing": true,
                 "language": { "url": "<?=site_url('/assets/datatables/spanish.json')?>" },
                 "columnDefs": [
                             { "orderable": false, "targets": 3 }
                           ]
             });              
         });        
      </script> 
      <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
   </body>
</html>

