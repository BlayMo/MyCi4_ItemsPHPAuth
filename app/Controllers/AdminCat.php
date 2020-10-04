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

use App\Models\CategoriasModel;
use App\Entities\CategoriasEnt;
use App\Libraries\CatLib;

class AdminCat extends BaseController {

    private $Categorias_model;
    private $retorno;
    private $oEnt;
    private $template;
    private $oCat;
   

    function __construct() {
        $this->Categorias_model = new CategoriasModel;
        $this->oEnt = new CategoriasEnt;
        $this->oCat = new CatLib();
        $this->retorno = 'adcat';
        $this->template = 'templates/header_footer_default';
    }

    //Lista categorias
    public function index() {
        if ($this->canAdmin($this->oAuth)) {
            $categorias = $this->Categorias_model
                            ->orderBy('categorias.id_categoria ASC')
                            ->where('categorias.id_padre', 0)->findAll();

            $subcat = $this->Categorias_model
                    ->orderBy('categorias.id_padre ASC')
                    ->where('categorias.id_padre != 0')
                    ->findAll();

            $data = array(
                'categorias_data' => $categorias,
                'subcat_data' => $subcat,
                'session' => $this->session,
                'vista' => 'categorias/admin_cat_list',
                'cab_tabla' => 'Admin Categorias List',
                'crea_subcat' => true,
                'botones' => $this->botones
            );

            echo view($this->template, $data);
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    //lista sub-categorias
    public function subCat($id_cat) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Categorias_model->find($id_cat);

            if ($row) {
                $categorias = $this->Categorias_model
                        ->where('categorias.id_categoria', $id_cat)
                        ->findAll();

                $subcat = $this->Categorias_model
                        ->orderBy('categorias.id_padre ASC')
                        ->where('categorias.id_padre != 0')
                        ->findAll();

                $data = array(
                    'categorias_data' => $categorias,
                    'subcat_data' => $subcat,
                    'session' => $this->session,
                    'vista' => 'categorias/admin_cat_list',
                    'cab_tabla' => 'Admin SubCat/' . $row->categoria . ' List',
                    'crea_subcat' => true,
                    'botones' => $this->botones
                );

                echo view($this->template, $data);
            }
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function creaSubCat($id_padre) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Categorias_model->find($id_padre);

            if ($row) {
                $data = array(
                    'button' => 'Create',
                    'action' => site_url('nsubcat_ok'),
                    'id_categoria' => set_value('id_categoria'),
                    'id_padre' => set_value('id_padre', $id_padre),
                    'nivel' => set_value('nivel', ++$row->nivel),
                    'categoria' => set_value('categoria'),
                    'descripcion_cat' => set_value('descripcion_cat', 'Sub cat. ' . $row->categoria),
                    'color_cat' => set_value('color_cat', $row->color_cat),
                    'cat_padre' => $row->categoria
                );

                $data['retorno'] = $this->retorno;
                $data['vista'] = 'categorias/admin_cat_form_new';
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

    public function creaSubCat_ok() {
        $id_padre = $this->request->getPost('id_padre', FILTER_SANITIZE_NUMBER_INT);
        if (!$this->newCat_rules()) {
            $this->creaSubCat($id_padre);
        } else {

            $data = $this->request->getPost();
            $oData = $this->oEnt;
            $oData->fill($data);

            $oData->idcategoria = random_string('alnum', 32);
            $oData->tiene_hijos = 'NO';
            $oData->tiene_articulo = false;
            $oData->orden_cat = 1;

            if ($this->Categorias_model->save($oData)) {
                $this->Categorias_model->update($id_padre, ['tiene_hijos' => 'SI']);
                $this->session->setFlashdata('message', 'Creado nuevo registro');
            } else {
                $this->session->setFlashdata('message', 'NO Creado nuevo registro');
            }

            return redirect()->to(site_url($this->retorno));
        }
    }

    public function creaCat() {
        if ($this->canAdmin($this->oAuth)) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('creaok'),
                'id_categoria' => set_value('id_categoria'),
                'id_padre' => set_value('id_padre', 0),
                'nivel' => set_value('nivel', 1),
                'categoria' => set_value('categoria'),
                'descripcion_cat' => set_value('descripcion_cat', 'Descripcion Categoria'),
                'color_cat' => set_value('color_cat', $this->faker->hexcolor()),
            );

            $data['retorno'] = $this->retorno;
            $data['vista'] = 'categorias/admin_cat_form_new';
            $data['session'] = $this->session;
            $data['validation'] = $this->validation;

            echo view($this->template, $data);
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    public function creaCat_ok() {

        if (!$this->newCat_rules()) {
            $this->creaCat();
        } else {
            $data = $this->request->getPost();
            $oData = $this->oEnt;
            $oData->fill($data);

            $oData->idcategoria = random_string('alnum', 32);
            $oData->nivel = 1;
            $oData->tiene_hijos = 'NO';
            $oData->tiene_articulo = false;
            $oData->orden_cat = 1;
            if ($this->Categorias_model->save($oData)) {
                $this->session->setFlashdata('message', 'Creado nuevo registro');
            } else {
                $this->session->setFlashdata('message', 'NO Creado nuevo registro');
            }

            return redirect()->to(site_url($this->retorno));
        }
    }

    //Crea 5 categorias padre como base para un sitio web
    public function creaCatWeb() {
        $cats = ['Sin Clasificar', 'Categoria A', 'Categoria B', 'Categoria C', 'Categoria D'];
        $this->Categorias_model->truncate();
        
        foreach ($cats as $value) {

            $oData = $this->oEnt;
            $oData->idcategoria = random_string('alnum', 32);
            $oData->id_padre = 0;                      
            $oData->nivel = 1;
            $oData->tiene_hijos = 'NO';
            $oData->categoria = $value;
            $oData->descripcion_cat = 'Descripcion de Categoria';
            $oData->tiene_articulo = 0;
            $oData->orden_cat = 0;
            $oData->color_cat = $this->faker->hexcolor();
            $this->Categorias_model->save($oData);
        }

        $this->session->setFlashdata('message', 'Creado nuevo registro');
        return redirect()->to(site_url($this->retorno));
    }

    public function upCat($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Categorias_model->find($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('upcatok'),
                    'id_categoria' => set_value('id_categoria', $row->id_categoria),
                    'id_padre' => set_value('id_padre', $row->id_padre),
                    'categoria' => set_value('categoria', $row->categoria),
                    'descripcion_cat' => set_value('descripcion_cat', $row->descripcion_cat),
                    'orden_cat' => set_value('orden_cat', $row->orden_cat),
                    'color_cat' => set_value('color_cat', $row->color_cat),
                );

                $data['retorno'] = $this->retorno;
                $data['vista'] = 'categorias/admin_cat_form_up';
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

    public function upCat_ok() {
        $id = $this->request->getPost('id_categoria', FILTER_SANITIZE_NUMBER_INT);
        if (!$this->upCat_rules()) {
            $this->upCat($id);
        } else {
            $oData = $this->Categorias_model->find($id);
            $data = $this->request->getPost();

            $oData->fill($data);

            if ($this->Categorias_model->save($oData)) {
                $this->session->setFlashdata('message', 'Registro actualizado');
            } else {
                $this->session->setFlashdata('message', 'NO Registro actualizado');
            }


            return redirect()->to(site_url($this->retorno));
        }
    }

    public function delete($id) {
        if ($this->canAdmin($this->oAuth)) {
            $row = $this->Categorias_model->find($id);

            if ($row) {
                $this->Categorias_model->delete($id);
                $this->session->setFlashdata('message', 'Registro borrado');
            } else {
                $this->session->setFlashdata('message', 'Registro No encontrado');
            }

            return redirect()->to(site_url($this->retorno));
        } else {
            $this->session->setFlashdata('message', 'Ud. No esta autorizado');
            return redirect()->to(site_url('/'));
        }
    }

    private function newCat_rules() {
        $this->validation->reset();

        $rules = array(
            'categoria' => ['label' => 'Categoria', 'rules' => 'trim|required|string'],
            'descripcion_cat' => ['label' => 'Descripcion Cat', 'rules' => 'trim|string'],
            'color_cat' => 'trim'
        );

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

    private function upCat_rules() {
        $this->validation->reset();

        $rules = array(
            'categoria' => ['label' => 'Categoria', 'rules' => 'trim|required|string'],
            'descripcion_cat' => ['label' => 'Descripcion Cat', 'rules' => 'trim|string'],
            'orden_cat' => ['label' => 'Orden Cat', 'rules' => 'trim'],
            'id_categoria' => 'trim');

        $this->validation->setRules($rules);
        return $this->validate($rules);
    }

}
