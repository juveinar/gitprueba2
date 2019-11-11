<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GetEtiquetasLabInventario extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "GetEtiquetasLabInventario";
    protected $fillable = [
        'ID',
        'ID_Variedad',
        'CodigoVariedad',
        'BarCode',
        'CanInventario',
        'CantContenedor',
        'TipoContenedor',
        'CantEtiquetas',
        'ID_Inventario',
        'SemanUltimoMovimiento',
        'SemanaIngreso',
        'SemanaDespacho',
        'Indentificador',
        'Radicado',
        'id_Cuarto',
        'id_Estante',
        'id_Nivel',
        'Impresa'
    ];
}
