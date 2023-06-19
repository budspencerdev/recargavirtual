<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimientosModel extends Model
{
    protected $table = 'movimientos';
    protected $allowedFields = ['id_usuario', 'tipo','fecha','monto'];

    public function insertRecharge($id_usuario, $tipo, $monto)
    {
        $fecha = date('Y-m-d H:i:s');
        $data = [
            'id_usuario'=>$id_usuario,
            'tipo'=>$tipo,
            'fecha'=>$fecha,
            'monto'=>$monto
        ];
        $this->db->table('movimientos')->insert($data);
    }
}