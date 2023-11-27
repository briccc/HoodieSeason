<?php 

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CategoriaModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;

class CarritoController extends BaseController{

    public function ver_carrito(){
        $cart = \Config\Services::cart();
        $data['title'] = 'Carrito de compras';

        return view('header', $data).view('navbar').view('carrito').view('footer');
    }

    public function agregar_carrito(){
        $cart = \Config\Services::cart();
        $request =  \Config\Services::request();
        $data = array(
            'id' => $request ->getPost('id'),
            'name' => $request->getPost('titulo'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        );

        $cart-> insert($data);
        

        return redirect()->route('verCarrito');
    }

    public function eliminar_item($rowid=null){
        $cart = \Config\Services::cart();
        if ($rowid === 'all') {
            $cart->destroy();
        } else {
            $cart->remove($rowid);
        }

      return redirect()->route('verCarrito');
}

public function guardar_venta(){

    $cart = \Config\Services::cart();
    $ventas = new VentaModel();
    $detalle_ventas = new DetalleVentaModel();
    $productos = new ProductosModel();

    $cart1 = $cart->contents();
    $total = 0;
        foreach($cart1 as $item){
            $producto = $productos->where('id_producto',$item['id'])->first();
            if($producto['producto_stock'] < $item['qty']){
                $data ['id'] = $item['id'];
             return redirect()->route('verCarrito',$data)->with('mensaje_error','Stock insuficiente');
            }
            $total = $total + $item['subtotal'];
        }
       
        $data = array(
            'usuario_id' => session('id'),
            'venta_fecha' => date('Y-m-d'),
            'venta_total' => $total
        );

            $ventaId = $ventas->insert($data);
           
            $cart1 = $cart->contents();
            foreach($cart1 as $item){
                $detalle = array (
                    'id_venta' => $ventaId,
                    'id_producto' => $item['id'],
                    'detalle_cantidad' => $item['qty'],
                    'detalle_precio' => $item['price'] * $item['qty'],
                );
             
                
                $detalles = $detalle_ventas->insert($detalle);
                $producto = $productos->where('id_producto',$item['id'])->first();
                $productoID = $producto['id_producto'];
                
                $stock = $producto['producto_stock'] - $item['qty'];
                $data = array('producto_stock' => $stock);
                $productos->update($productoID,$data);
            }
            $cart->destroy();
            return redirect()->route('verCarrito')->with('mensaje_exito','Gracias por comprar!');
}
    


}