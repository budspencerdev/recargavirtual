<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class LoginController extends Controller
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        return view('auth');
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->loginModel->where('username', $username)->first();

        if ($user && ($password == $user['password'])) {
            $id = $user['id'];
            $session->set('id_admin', $id);
            return redirect()->to('/listado');
        } else {
            $data['error'] = 'Credenciales inválidas.';
            return view('auth', $data);
        }
    }
}