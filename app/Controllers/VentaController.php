<?php 

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;


class VentaController extends BaseController{
    
    public function listar_ventas(){
        $venta = new VentaModel();
        $detalle_venta= new DetalleVentaModel();
        $data['title']= "Listado de ventas";
        $data['ventas']= $venta-> join('usuarios', 'usuarios.id_usuario = venta.id_usuario')->findAll();
        


        return view ('header', $data).view('back/navbarAdmin').view('back/listarVentas').view('footer');
    }

    public function listar_detalle_ventas($id=NULL){
        $venta= new VentaModel();
        $detalle_venta= new DetalleVentaModel();
        $data['title']= "Detalle de ventas";
        $data['detalle']= $detalle_venta-> where('id_venta', $id)->join('productos', 'productos.id_producto = detalle_venta.id_producto')->findAll();

        return view('header', $data).view('back/navbarAdmin').view('back/listarDetalleVentas').view('footer');
    }
    
   

    
}
