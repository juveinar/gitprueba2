<html>
<head>
    <title> Area Medios Lab </title> <strong></strong>
    <br>
    <?php
<body>

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\D B;
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "clientesYBreeder_labs";
    protected $fillable = [
        'Indicativo',
        'Nombre',
        'Nit',
        'Tipo',
        'Flag_Activo',
    ];
<br>

    public static function clientesActivos()
    {
        $activos = ClientesLab::select('id','Nombre','Nit')
            ->where('Flag_Activo', '=', '1')
    ->where('Tipo','=','Cliente')
    ->orderBy('Nombre','ASC')
    ->get();
    return $activos;
    }
    }
</head>


</body>
</html>