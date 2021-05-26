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
use App\Models\ItemsModel;
use App\Entities\ItemsEnt;
use App\Libraries\CatLib;
use App\Models\CategoriasModel;


class Items extends BaseController
{
    
    private $Items_model;
    private $Categorias_model;
    private $retorno;
    private $oEnt;
    private $template;
    private $vista;
    private $orden;
    private $oCat;
    private $todo_categorias;
    private $todo_subcat;
    private $cat_filtro = 0;    
   
        
    function __construct() {
        $this->Items_model      = new ItemsModel;
        $this->Categorias_model = new CategoriasModel;
        $this->oEnt             = new ItemsEnt;
        $this->oCat             = new CatLib();
        $this->retorno          = 'items';
        $this->template         = 'templates/header_footer_default';
        $this->vista            = 'items/items_list';
        $this->orden            = $this->Items_model->order;
        $this->todo_categorias  = new \stdClass();
        $this->todo_subcat      = new \stdClass();
    }

    public function index( $paginado = false ) {
        if ($paginado) {
            if ($this->cat_filtro != 0) {
                $items = $this->Items_model
                        ->join('categorias', 'items.id_categoria = categorias.id_categoria', 'left')
                        ->where('items.id_categoria', $this->cat_filtro)
                        ->orderBy($this->orden)
                        ->paginate(FILAS, $this->Items_model->table);
            } else {
                $items = $this->Items_model
                        ->join('categorias', 'items.id_categoria = categorias.id_categoria', 'left')
                        ->orderBy($this->orden)
                        ->paginate(FILAS, $this->Items_model->table);
            }
        } else {
            $items = $this->Items_model
                    ->join('categorias', 'items.id_categoria = categorias.id_categoria', 'left')
                    ->orderBy($this->orden)
                    ->findAll();
        }

        $data = array(
            'items_data' => $items,
            'session' => $this->session,
            'paginado' => $paginado,
            'pager' => $this->Items_model->pager,
            'botones' => $this->botones,
            'faker' => $this->faker,
            'todo_categorias_data' => $this->todo_categorias,
            'todo_subcat_data' => $this->todo_subcat,            
        );
        
        //variables para login_form
        $data['password'] = set_value('password', '');
        $data['email'] = set_value('email', '');
        
        $data['validation'] = $this->validation;
        $data['action'] = 'users/mylogin';
        //---------------------------------------------
        
        $data['header_table'] = 'Items  DataTables Example';
        $data['idtable'] = 'mytable_items';
        if ($paginado) {
            $data['header_table'] = 'Items  Paging Example';
            $data['idtable'] = '';
        }

        $data['vista'] = $this->vista;

        echo view($this->template, $data);
    }

    public function index2(){
        $this->index(true);
    }
    
    public function blog() {
        $this->todo_categorias = $this->Categorias_model
                        ->orderBy('categorias.id_categoria ASC')
                        ->where('categorias.id_padre', 0)->findAll();

        $this->todo_subcat = $this->Categorias_model
                ->orderBy('categorias.id_padre ASC')
                ->where('categorias.id_padre != 0')
                ->findAll();
        $this->vista = 'items/blog_body_list';
        $this->index(true);
    }
    
    public function fcat($id_cat) {
        $this->cat_filtro = $id_cat;
        if ($id_cat != 0) {
            $this->session->setFlashdata('message',
                    '<strong>Filtrado por ' . $this->oCat->categoria($id_cat) . '</strong>');
        }else{
            $this->session->setFlashdata('message','');
        }
        $this->blog();
    }

    public function reord($id) {
        switch ($id) {
            case 1:
                $this->orden = 'items.id_item ASC';
                break;
            case 2:
                $this->orden = 'items.id_item DESC';
                break;
            case 3:
                $this->orden = 'items.id_item ASC';
                $this->vista = 'items/blog_body_list';
                break;
            case 4:
                $this->orden = 'items.id_item DESC';
                $this->vista = 'items/blog_body_list';
                break;
        }

        $this->index(true);
    }

    public function selCat(){
        $categorias = $this->Categorias_model
                ->orderBy('categorias.id_categoria ASC')
                ->findAll();

        $data = array(
            'categorias_data' => $categorias,
            'session' => $this->session    
        );

        $data['vista'] = 'items/tabla_sel_cat';
        
        echo view($this->template, $data);
        
    }
     
    public function read($id) 
    {
        $row = $this->Items_model->find($id);
        if ($row) {
            $data = array(
		'id_item' => $row->id_item,
		'iditem' => $row->iditem,
		'id_categoria' => $row->id_categoria,
		'item' => $row->item,
		'texto_item' => $row->texto_item,
                'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
		'deleted_at' => $row->deleted_at,
		'session' => $this->session 
	    );
            
            $data['retorno'] = 'items';
            $data['vista'] = 'items/items_read';
            echo view($this->template, $data);
            
        } else {
            $this->session->setFlashdata('message', 'Registro No encontrado');
            return redirect()->to(site_url($this->retorno));            
        }
    }

    public function create( $id_categoria = 1 ) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('newitok'),
	    'id_item' => set_value('id_item'),
	    'iditem' => set_value('iditem'),
	    'id_categoria' => set_value('id_categoria',$id_categoria),
	    'item' => set_value('item',$this->faker->company),
	    'texto_item' => set_value('texto_item',$this->faker->realText(400, 2)),
            'categoria' => $this->oCat,            
	);
        $data['retorno'] = $this->retorno;
        $data['vista']   = 'items/items_form_new';
        $data['session'] = $this->session;
        $data['validation'] = $this->validation;
        
        echo view($this->template, $data);
        
    }
    
    public function create_ok() 
    {
        $id_categoria = $this->request->getPost('id_categoria',FILTER_SANITIZE_NUMBER_INT);
        if (!$this->_rules()) {
            $this->create( $id_categoria );
        } else {
            
            $data = $this->request->getPost();
            $oData = $this->oEnt;
            $oData->fill($data);
            
            $oData->iditem = random_string('alnum', 32);

            $this->Items_model->save($oData);
            $this->session->setFlashdata('message', 'Creado nuevo registro');
            return redirect()->to($this->retorno);
        }
    }
    
    public function update($id) {
        if ($this->canEdit($this->oAuth)) {
            $row = $this->Items_model->find($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('upok'),
                    'id_item' => set_value('id_item', $row->id_item),
                    'iditem' => set_value('iditem', $row->iditem),
                    'id_categoria' => set_value('id_categoria', $row->id_categoria),
                    'item' => set_value('item', $row->item),
                    'texto_item' => set_value('texto_item', $row->texto_item),
                    'categoria' => $this->oCat
                );
                $data['retorno'] = $this->retorno;
                $data['vista'] = 'items/items_form_up';
                $data['session'] = $this->session;
                $data['validation'] = $this->validation;

                echo view($this->template, $data);
            } else {
                $this->session->setFlashdata('message', 'Registro No encontrado');
                return redirect()->to(site_url($this->retorno));
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function update_ok() 
    {
        $id = $this->request->getPost('id_item', FILTER_SANITIZE_NUMBER_INT);
        if (!$this->_rules()) {
            $this->update($id);
        } else {
            $oData = $this->Items_model->find($id);
            
            $data = $this->request->getPost();  
            $oData->fill($data);          
		
            $this->Items_model->save($oData);
            $this->session->setFlashdata('message', 'Registro actualizado');
            
           return redirect()->to($this->retorno);            
        }
    }
    
    public function delete($id) {
        if ($this->canDel($this->oAuth)) {
            $row = $this->Items_model->find($id);

            if ($row) {
                $this->Items_model->delete($id);
                $this->session->setFlashdata('message', 'Registro borrado');
            } else {
                $this->session->setFlashdata('message', 'Registro No encontrado');
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
        }
        return redirect()->to(site_url($this->retorno));
    }

    private function _rules() {
        $this->validation->reset();

        $rules = array(
            'item' => ['label' => 'Item', 'rules' => 'trim|required|string'],
            'texto_item' => ['label' => 'Texto Item', 'rules' => 'trim|string'],
            'id_item' => 'trim');

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    //crea 100 items con datos falsos para testeo
    public function newItems() {
        $this->Items_model->truncate();
        $cats = $this->Categorias_model->findAll();
        foreach ($cats as $value) {
            
            $id_cats[] = $value->id_categoria;            
        }
        for ($i = 1; $i <= 100; $i++) {
            
            $oData = $this->oEnt;
            $oData->iditem = random_string('alnum', 32);
            $oData->item = 'Item ' . $this->faker->company;
            $oData->texto_item = $this->faker->realText(400, 2);
            $oData->id_categoria = $this->faker->randomElement($id_cats);
            $this->Items_model->save($oData);
        }

        $this->session->setFlashdata('message', 'Regenerada Tabla Items');
        $this->index();
    }


}
