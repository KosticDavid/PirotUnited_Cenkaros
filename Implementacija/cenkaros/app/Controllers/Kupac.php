<?php

namespace App\Controllers;

class Kupac extends BaseController
{
    
    protected function show($page, $data=[])
    {
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_kupac',[]);
    }
    
}