<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->loginModel->where('username', $username)->first();

        if ($user && ($password == $user['password'])) {
            return redirect()->to('/listado');
        } else {
            $data['error'] = 'Credenciales inválidas.';
            return view('login', $data);
        }
    }
}