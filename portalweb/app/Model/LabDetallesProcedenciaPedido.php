<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LabDetallesProcedenciaPedido extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "labDetallesProcedenciaPedidos";
    protected $fillable = [
        'id',
        'id_DetallesPedido',
        'CantidadInicial',
        'SemanaEntrega',
        'CantidadModificada',
        'SemanaModificada',
        'Flag_Act'
    ];
}
