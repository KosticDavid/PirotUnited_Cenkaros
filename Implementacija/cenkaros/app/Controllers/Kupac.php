<?php

namespace App\Controllers;

class Kupac extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Kupac';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_kupac',[]);
    }
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    public function sacuvane_liste()
    {
        $liste = $this->doctrine->em->getRepository('App\\Models\\Entities\\Korisnik')->find(5);
//        $data = ["liste"=>$liste];
//        echo count($liste);
        return;
//        for($i=0; $i<count($liste); $i++)
//        {
////            $lista = liste[$i];
////            $sadr = $lista->getIdsadrzi();
//            echo '<tr><td>';
//            echo $i;
//            echo "</td></tr>";
////            echo "</td><td>";
////            echo $lista->getNaziv();
////            echo "</td><td>";
////            echo count($sadr);
////            echo '</td><td><a href="pregledaj_listu.html">Izmeni</a>';
////            echo '</td><td><a href="#">Obrisi</a></td></tr>';
//        }
////        foreach($liste as $lista)
////        {
//////            var_dump($lista);
////            
////        }
        
        $this->show('pregledaj_sacuvane_liste',$data);
    }
    
}