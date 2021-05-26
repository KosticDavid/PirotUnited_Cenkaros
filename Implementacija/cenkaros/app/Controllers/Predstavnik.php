<?php

namespace App\Controllers;

class Predstavnik extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Predstavnik';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_predstavnik',[]);
    }
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
}