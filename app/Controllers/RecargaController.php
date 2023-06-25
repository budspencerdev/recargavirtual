<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\UsuariosModel;
use App\Models\MovimientosModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class RecargaController extends Controller
{
    protected $usuariosModel;


    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
        $this->movimientosModel = new MovimientosModel();
    }

    public function index()
    {
        $data['usuarios'] = $this->usuariosModel->findAll(2);
        return view('listado', $data);
    }

    public function search()
    {
        $dni = $this->request->getVar('dni');
        if($dni==""){
            $data['usuarios'] = $this->usuariosModel->findAll(2);
        }else{
            $data['usuarios'] = $this->usuariosModel->searchByDni($dni);
        }
        return view('listado', $data);
    }

    public function recharge(){
        $session = session();
        $id_admin = $session->get('id_usuario');
        $id = $this->request->getVar('id_admin');
        $dni = $this->request->getVar('dni_usuario');
        $saldo_recarga = $this->request->getVar('saldo_recarga');
        $saldo_actual = $this->request->getVar('saldo_actual');
        $this->usuariosModel->updateSaldo($id, $saldo_recarga, $saldo_actual);
        $this->movimientosModel->insertRecharge($id, 'carga', $saldo_recarga, $id_admin);
        
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