<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TablaController extends Controller
{
    public function prepareData(){
    	//Preparar la consulta aquí
      $todos = DB::table('productos')->select('numeroPedido','nombreCliente','total','status','fecha')->get();

      $pendientes = DB::table('productos')->select('numeroPedido','nombreCliente','total','status','metodoPago','fecha')->where('status','Pendiente')->get();

      $pagados = DB::table('productos')->select('numeroPedido','nombreCliente','total','fecha','metodoPago','comprobantePago','guia','status')->where('status','Pagado')->get();

      $cancelados = DB::table('productos')->select('numeroPedido','nombreCliente','total','fecha','motivoCancelacion')->where('status','Cancelado')->get();
    	//$todos = DB::select
    	/*('select (numPedido,nombreCliente,total,status,fecha) from pedidos');
    	$cancelados = DB::select('select (numPedido,nombreCliente,total,fecha, nombreCancelacion, motivoCancelacion) from pedidos where status = Cancelado');
        return view('tablas',['todos'=>$todos,'pendientes'=>$pendientes,'pagados'=>$pagados, 'cancelados'=>$cancelados]);
        */
        echo "";
        return view('tablas',['todos'=>$todos,'pendientes'=>$pendientes,'pagados'=>$pagados,'cancelados'=>$cancelados]);
    }
}
