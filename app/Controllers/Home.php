<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function miproyecto()
    {
        $data['title']= "Hoodie Season";
        echo view('header', $data);
        echo view('navbar');
        echo view('carrousel');
        echo view('presentacion');
        echo view('img');
        echo view('footer');

    }

    public function quienessomosMetodo(){
        $data['title']= "Quienes Somos";
        echo view('header', $data);
        echo view('navbar');
        echo view('quienesSomos');
        echo view('footer');

    }

    public function comercializacionMetodo(){
        $data['title']= "Comercialización";
        echo view('header', $data);
        echo view('navbar');
        echo view('comercializacion');
        echo view('footer');
    }

    public function terminosMetodo(){
        $data['title']= "Terminos";
        echo view('header', $data);
        echo view('navbar');
        echo view('terminos');
        echo view('footer');
    }

    public function contactoMetodo(){
        $data['title']= "Contacto";
        echo view('header', $data);
        echo view('navbar');
        echo view('contacto');
        echo view('footer');
    }

    public function guiaMetodo(){
        $data['title']= "Guia de talles";
        echo view('header', $data);
        echo view('navbar');
        echo view('guia');
        echo view('footer');
    }



}

