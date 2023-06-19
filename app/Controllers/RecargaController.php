<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\UsuariosModel;
use App\Models\MovimientosModel;
use CodeIgniter\Controller;

class RecargaController extends Controller
{
    protected $usuariosModel;


    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
        $this->movimientosModel = new MovimientosModel();
    }

    public function index()
    {
        $data['usuarios'] = $this->usuariosModel->findAll();
        return view('listado', $data);
    }

    public function search()
    {
        $dni = $this->request->getVar('dni');
        if($dni==""){
            $data['usuarios'] = $this->usuariosModel->findAll();
        }else{
            $data['usuarios'] = $this->usuariosModel->searchByDni($dni);
        }
        return view('listado', $data);
    }

    public function recharge(){
        $id = $this->request->getVar('id_usuario');
        $dni = $this->request->getVar('dni_usuario');
        $saldo_recarga = $this->request->getVar('saldo_recarga');
        $saldo_actual = $this->request->getVar('saldo_actual');
        $this->usuariosModel->updateSaldo($id, $saldo_recarga, $saldo_actual);
        $this->movimientosModel->insertRecharge($id, 'carga', $saldo_recarga);
        
        if($dni==""){
            $data['usuarios'] = $this->usuariosModel->findAll();
        }else{
            $data['usuarios'] = $this->usuariosModel->searchByDni($dni);
        }        
        return view('listado', $data);
    }

    public function list(){
        return view('list');
    }

}