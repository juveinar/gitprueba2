
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LabIngresoIntroduccion extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "LabIngresoIntroduccions";
    protected $fillable = [
        'id',
        'Cantidad',
        'IdVariedad',
        'IdCliente',
        'IdContenedor',
        'FechaEntrada',
        'Identificador',
        'IdTipoFase',
        'CodIntroducion',
        'IdUser',
        'Flag_Activo',
    ];
}
