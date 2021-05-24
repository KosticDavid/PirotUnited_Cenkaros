<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
            echo view('templates\header_logged_in');
            echo view('pages\pregledaj_listu');
            echo view('templates\footer');
	}
        
        public function index2()
        {
            echo view('templates\header_logged_in');
            echo view('pages\ispis');
            echo view('templates\footer');
        }
}
