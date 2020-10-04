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



?>


<div class="card shadow mb-4" style="margin-bottom: 50px" >
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Items  Read</h6>
   </div>
   <div class="card-body">
      <div class="table" >
         <table class="table">
            <tr>
                <td width="200px">Iditem</td>
               <td><?php echo $iditem; ?></td>
            </tr>
            <tr>
               <td width="200px">Id Categoria</td>
               <td><?php echo $id_categoria; ?></td>
            </tr>
            <tr>
               <td width="200px">Item</td>
               <td><?php echo $id_item.'/'. $item; ?></td>
            </tr>
            <tr>
               <td width="200px">Texto Item</td>
               <td><?php echo $texto_item; ?></td>
            </tr>
            <tr>
               <td width="200px">Created At</td>
               <td><?php echo $created_at; ?></td>
            </tr>
            <tr>
               <td width="200px">Updated At</td>
               <td><?php echo $updated_at; ?></td>
            </tr>
            <tr>
               <td width="200px">Deleted At</td>
               <td><?php echo $deleted_at; ?></td>
            </tr>
            <tr>
               <td width="200px"></td>
               <td><a href="<?php echo site_url($retorno) ?>" class="btn btn-default">Cancel</a></td>
            </tr>
         </table>
      </div>
   </div>
</div>

