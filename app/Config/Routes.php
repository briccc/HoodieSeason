<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::miproyecto');

//informacion
$routes->get('quienessomos', 'Home::quienessomosMetodo');
$routes->get('comercializacion', 'Home::comercializacionMetodo');
$routes->get('terminosyusos', 'Home::terminosMetodo');
$routes->get('contacto', 'Home::contactoMetodo');



//registro e inicio
$routes->get('registrarUsuario','UsuarioController::registrar_usuario');
$routes->get('iniciarSesion','UsuarioController::inicio_sesion');
$routes->get('cerrarSesion','UsuarioController::cerrar_sesion');

$routes->get('verConsultas', 'UsuarioController::listar_consultas');
$routes->get('registrarConsulta', 'UsuarioController::registrar_consulta');
$routes->get('verUsuarios', 'UsuarioController::listar_usuarios');

$routes->post('registrarUsuario', 'UsuarioController::registrar_usuario');
$routes->post('registrarConsulta', 'UsuarioController::registrar_consulta');
$routes->post('iniciarSesion','UsuarioController::iniciar_sesion');

//productos
$routes->get('productos','AdminController::listar_productos');
$routes->get('inicioAdmin','AdminController::inicio_admin');
$routes->get('agregarProducto','AdminController::agregar_producto');
$routes->get('gestionar', 'AdminController::gestionar_productos');
$routes->get('editar/(:num)', 'AdminController::editar_producto_vista/$1');
$routes->get('activar/(:num)', 'AdminController::activar_producto/$1');
$routes->get('eliminar/(:num)', 'AdminController::eliminar_producto/$1');

$routes->post('actualizar', 'AdminController::editar_producto_validacion');

$routes->post('insertarProducto', 'AdminController::registrar_producto');

//carrito
$routes->get('verCarrito', 'CarritoController::ver_carrito');
$routes->get('agregarCarrito', 'CarritoController::agregar_carrito');
$routes->get('eliminarItem/(:any)', 'CarritoController::eliminar_item/$1');
$routes->get('vaciarCarrito/(:any)', 'CarritoController::eliminar_item/$1');

$routes->post('agregarCarrito', 'CarritoController::agregar_carrito');

//venta
$routes->get('ventas', 'CarritoController::guardar_venta');
$routes->get('verVentas', 'VentaController::listar_ventas');
$routes->get('verDetalle/(:num)', 'VentaController::listar_detalle_ventas/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
