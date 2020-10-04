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

<div class="row" style="margin-bottom: 10px;margin-top: 20px">
    <div class="col-md-4">
        
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
        <h6 class="m-0 font-weight-bold text-primary"><?=$header_table?></h6>
    </div>
    <div class="card-body">
        <?php if($paginado){                
                echo anchor(site_url('orden/1'),'ASC ');
                echo anchor(site_url('orden/2'),' DESC');
                }?>
        <div class="table-responsive" >
            <table class="table table-bordered table-striped" id="<?=$idtable?>">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Categoria</th>
                        <th>Item</th>
                        <th>Texto Item</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($items_data as $items) {
                        ?>
                        <tr>
                            <td><?php echo $items->id_item ?></td>
                            <td><?php echo $items->id_categoria.'/'.$items->categoria ?></td>
                            <td><?php echo $items->item ?></td>
                             <td><?php echo word_limiter($items->texto_item,WORDS) ?></td>
                            <td style="text-align:center" >
                                <?php
                                echo anchor(site_url('itread/' . $items->id_item),$botones->btn_read);
                                echo '</br>';
                                if($session->is_login){
                                    echo anchor(site_url('itup/' . $items->id_item), $botones->btn_update);
                                    echo '</br>';
                               
                                    echo anchor(site_url('itdel/' . $items->id_item), $botones->btn_delete,
                                        'onclick="javascript: return confirm(\'Are You Sure ?\')"');
                                 }
                                ?>
                            </td>
                        </tr>
                                <?php }?>
                </tbody>
                
            </table>
            <?php if($paginado){
                echo '<div>'.$pager->links('items', 'front_items').'</div>';
                }?>
        </div>
    </div>
</div>    
