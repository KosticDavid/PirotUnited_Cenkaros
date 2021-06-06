<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Klasa koja predstavlja filter administratora
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class AdministratorFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session= session();
        if($session->has("tipK"))
        {
            if($session->get("tipK")=="Predstavnik")
            {
                return redirect()->to(site_url("Predstavnik/index"));
            }
            if($session->get("tipK")=="Kupac")
            {
                return redirect()->to(site_url("Kupac/index"));
            }
        }
        else 
        {
            return redirect()->to(site_url("Gost/index"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

