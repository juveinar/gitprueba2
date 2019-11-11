<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class labdetallesPedidos extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "labDetallesPedidos";
    protected $fillable = [
        'id',
        'id_Variedad',
        'TipoEntrega',
        'CantidadInicial',
        'cantidadFinal',
        'SemanaEntrega',
        'SemanaConfirmada',
        'id_CabezaPedido',
        'Flag_Activo',
    ];
}
