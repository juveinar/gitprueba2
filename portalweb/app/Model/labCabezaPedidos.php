<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class labCabezaPedidos extends Model
{
    protected $dateFormat = 'Y-d-m H:i:s.v';
    protected $table = "labCabezaPedidos";
    protected $fillable = [
        'id',
        'id_Cliente',
        'SemanaEntrega',
        'SemanaCreacion',
        'NumeroPedido',
        'id_UserCreacion',
        'EmailPlaneacion',
        'EstadoDocumento',
        'Observaciones',
        'id_UserConfirmacion',
        'FechaConfirmacion',
        'id_UserAceptado',
        'FechaAceptado',
        'id_UserCancelado',
        'FechaCancelado',
        'Flag_Activo',
    ];

    public static function PedidosActivos()
    {
        $Pedidos = DB::table('labcabezapedidos as cb')
            ->leftJoin('clientesYBreeder_labs as cl', 'cl.id', '=', 'cb.id_Cliente')
            ->select(
                'cb.id',
                'cb.NumeroPedido',
                'cl.Nombre',
                'cb.SemanaEntrega',
                'cb.EstadoDocumento'
            )
            ->where('cb.Flag_Activo', '=', 1)
            ->get();

        return $Pedidos;
    }

    public static function DetallesPedidoC($id)
    {
        $id= base64_decode($id);
        $Detalles = DB::table('labcabezapedidos as cb')
            ->leftJoin('clientesYBreeder_labs as cl', 'cl.id', '=', 'cb.id_Cliente')
            ->leftJoin('labdetallespedidos as dt', 'dt.id_CabezaPedido', '=', 'cb.id')
            ->join('urc_variedades as vari', 'vari.id', '=', 'dt.id_Variedad')
            ->select(
                'cb.NumeroPedido',
                'cl.Nombre',
                'cb.SemanaEntrega',
                'cb.SemanaCreacion',
                'cb.EstadoDocumento',
                'cb.NumeroPedido',
                'cb.Observaciones'
            )
            ->where('cb.id', '=', $id)
            ->where('cb.Flag_Activo', '=', 1)
            ->first();

        return $Detalles;
    }

    public static function DetallesPedidoD($id)
    {
        $id= base64_decode($id);
        $DetallesD = DB::table('labdetallespedidos as dt')
            ->leftJoin('urc_variedades as v','v.id','=','dt.id_Variedad')
            ->leftJoin('labcabezapedidos as cb', 'cb.id', '=', 'dt.id_CabezaPedido')
            ->select(
                'dt.id',
                'v.id as id_V',
                'v.Nombre_Variedad',
                'dt.CantidadInicial',
                'dt.SemanaEntrega'
            )
            ->where('dt.id_CabezaPedido', '=', $id)
            ->where('cb.Flag_Activo', '=', 1)
            ->where('dt.Flag_Activo', '=', 1)
            ->get();

        return $DetallesD;
    }

    public static function CorreoPreconfirmado($id)
    {
        $consulta= DB::table('labCabezaPedidos as CP')
            ->select(

                'va.Nombre_Variedad',
                'gen.NombreGenero',
                'dp.CantidadInicial',
                'dp.SemanaEntrega',
                'dp.TipoEntrega')
            ->leftJoin('labDetallesPedidos as dp','dp.id_CabezaPedido','=','CP.id')
            ->leftJoin('URC_Variedades as va','va.id','=','dp.id_Variedad')
            ->leftJoin('URC_Especies as esp','esp.id','=','va.ID_Especie')
            ->leftJoin('URC_Generos as gen','gen.id','=','esp.Id_Genero')
            ->where('CP.NumeroPedido',$id)
            ->get();




        return $consulta;
    }
}
