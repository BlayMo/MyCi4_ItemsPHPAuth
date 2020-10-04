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
            
<tr>
    <td><?php echo $categorias->id_categoria?></td>

    <td>
        <a href="<?=site_url('subcat/'.$categorias->id_categoria)?>" class="btn  btn-link btn-sm"><?php echo $categorias->categoria;?></a>
        <?php if ($categorias->tiene_hijos == 'SI'){
        echo view('categorias/tabla_subcategorias',['subcat_data' => $subcat_data,
                                                          'id_categoria' => $categorias->id_categoria
                                                            ]);
        }
        ?>
    </td>
    <td><?php echo $categorias->descripcion_cat ?></td>

    
    <td><?php echo $categorias->tiene_hijos ?></td>
   <td style="text-align:center" >
     <?php 
     if ($crea_subcat){
        echo anchor(site_url('nsubcat/'.$categorias->id_categoria),$botones->btn_crea_subcat);    
        }
    
        echo anchor(site_url('upcat/'.$categorias->id_categoria),$botones->btn_update); 
        echo anchor(site_url('categorias/delete/'.$categorias->id_categoria),$botones->btn_delete,
                'onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
        ?>
  </td>
</tr>

            
