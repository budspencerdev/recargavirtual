<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['nombres', 'dni','correo','saldo'];

    public function searchByDni($dni){
        return $this->where('dni', $dni)->findAll();
    }

    public function updateSaldo($id, $saldo_recarga, $saldo_actual)
    {
        $this->where('id', $id)
            ->set('saldo', $saldo_recarga + $saldo_actual)
            ->update();
    }
}