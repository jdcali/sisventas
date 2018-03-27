<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentas\Http\Requests\IngresoFormRequest;
use sisVentas\Ingreso;
use sisVentas\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __constructor()
    {

    }
    public function index(Request  $request)
    {
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('ingreso as i')
                ->join('persona asp','i.proveedor','=','p.idpersona')
                ->join('detalle_ingreso as di','i.idingreso','='.'di.ingreso')
                ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra)as total'))
                ->where('i.num_comprobante','LIKE','%'.$query.'%')
                ->orderBy('i.idingreso','desc')
                ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                ->paginate(7);
                return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=$query]);
         }
        }
    public function create(){

            $personas=DB::table('persona')->where('tipo_persona','=','Proveedor'->get());
            $articulos=DB::table('articulo as art')
                ->select(DB::raw('CONCAT(art.codigo, "",art.nombre) AS articulo'),'art.idarticulo') 
                ->where('art.estado','=','Activo')
                ->get();
            return view("compras.inteso.create",["personas"=>$personas,"articulos"=>$articulos]);  
    }

    public function store (IngresoFormRequest $request)
    {
        try {
            DB::beginTransaction();

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
        }
    }
}
