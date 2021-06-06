<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Klasa koja predstavlja filter gosta
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class GostFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session= session();
        if($session->has("tipK"))
        {
            if($session->get("tipK")=="Administrator")
            {
                return redirect()->to(site_url("Administrator/index"));
            }
            if($session->get("tipK")=="Predstavnik")
            {
                return redirect()->to(site_url("Predstavnik/index"));
            }
            if($session->get("tipK")=="Kupac")
            {
                return redirect()->to(site_url("Kupac/index"));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

