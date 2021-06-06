<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Controllers\BazniKontroler;
use App\Models\RadnjaModel;

/**
 * Klasa koja predstavlja kontroler za gosta
 * @author Milena Djuric 2018/0630
 * @author David Kostic 2016/0624
 * 
 * @version 1.0
 */
class Gost extends BazniKontroler
{
    
    
    /**
    * Prikaz prosledjene stranice
    *
    * @param string $page stranica
    * @param array $data podaci
    *
    * @return void
    *
    */
    protected function show($page, $data=[])
    {
        $data['controller']='Gost';
        echo view("templates\\header_logged_out",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    /**
    * Prikaz indeksne stranice
    *
    * @return void
    *
    */
    public function index()
    {
        return redirect()->to(site_url('Gost/prijava'));
    }

    /**
    * Prikaz stranice za prijavu na sistem
    *
    * @param string $poruka poruka
    *
    * @return void
    *
    */
    public function prijava($poruka="")
    {
        $this->show('prijava',['poruka'=>$poruka]);
    }
    
    /**
    * Prikaz stranice za registraciju na sistem
    *
    * @param string $poruka poruka
    *
    * @return void
    *
    */
    public function registracija($poruka="")
    {
        $this->show('slanje_zahteva_za_registraciju',['poruka'=>$poruka]);
    }
    
    /**
    * Prikaz stranice za registraciju radnje na sistem
    *
    * @param string $poruka poruka
    *
    * @return void
    *
    */
    public function dodavanje_radnje($poruka="")
    {
        $this->show('dodavanje_radnje_u_sistem',['poruka'=>$poruka]);
    }
    
    /**
    * Prikaz stranice o nama
    *
    * @return void
    *
    */
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    /**
    * Prikaz stranice kontakt
    *
    * @return void
    *
    */
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    /**
    * Obrada zahteva za prijavu
    *
    * @return void
    *
    */
    public function zahtev_za_prijavu()
    {
        if(!$this->validate(['uname'=>'required|min_length[5]|max_length[30]', 'pword'=>'required|min_length[8]|max_length[20]']))
            return $this->prijava($this->validator->getErrors());
        $pwordhash = hash("sha256",$this->request->getVar('pword'));
        $km = new korisnikModel();
        $korisnici = $km->pretraga_kIme($this->request->getVar('uname'));
        if(count($korisnici)==1)
        {
            if($korisnici[0]->sifra==$pwordhash)
            {
                if($korisnici[0]->tipKorisnika<3)
                {
                    $tipK = ['Administrator','Predstavnik','Kupac'];
                    $sessiondata=['idK'=>$korisnici[0]->idKorisnik,
                        'tipK'=>$tipK[$korisnici[0]->tipKorisnika]];
                    $this->session->set($sessiondata);
                }
                if($korisnici[0]->tipKorisnika==0) return redirect()->to(site_url('Administrator/index'));
                else if($korisnici[0]->tipKorisnika==1) return redirect()->to(site_url('Predstavnik/index'));
                else if($korisnici[0]->tipKorisnika==2) return redirect()->to(site_url('Kupac/index'));
                else return $this->prijava('Administrator jos uvek nije odobrio zahtev');
            }
            return $this->prijava('Sifra nije ispravna');
        }
        return $this->prijava('Korisnik sa tim imenom ne postoji');
    }
    
    /**
    * Obrada zahteva za registraciju
    *
    * @return void
    *
    */
    public function zahtev_za_registraciju()
    {
        if(!$this->validate(['uname'=>'required|min_length[5]|max_length[30]', 'email'=>'required|min_length[10]|max_length[30]', 'pword1'=>'required|min_length[8]|max_length[20]', 'pword2'=>'required|min_length[8]|max_length[20]|matches[pword1]']))
            return $this->registracija($this->validator->getErrors());
        $km = new korisnikModel();
        $kIme = $km->pretraga_kIme($this->request->getVar('uname'));
        $email = $km->pretraga_email($this->request->getVar('email'));
        if(count($kIme)>0) return $this->registracija(['Korisnicko ime je zauzeto']);
        if(count($email)>0) return $this->registracija(['Email se vec koristi']);
        if($this->request->getVar('tip')==2)
        {
            $km->insert([ 'kIme'=>$this->request->getVar('uname'),
                          'sifra'=>$pwordhash = hash("sha256",$this->request->getVar('pword1')),
                          'email'=>$this->request->getVar('email'),
                          'tipKorisnika'=>$this->request->getVar('tip')]);
        }
        else
        {
            $this->session->set("kIme",$this->request->getVar('uname'));
            $this->session->set("sifra",hash("sha256",$this->request->getVar('pword1')));
            $this->session->set("email",$this->request->getVar('email'));
            $this->session->set("tipKorisnika",$this->request->getVar('tip'));
            return redirect()->to(site_url("/Gost/dodavanje_radnje"));
        }
        return $this->prijava('Vas nalog je dodat');
        
    }
    
    /**
    * Obrada zahteva za registraciju radnje
    *
    * @return void
    *
    */
    public function dodaj_radnju()
    {
       
        $imeR = $this->request->getVar("imeR");
        $pib = $this->request->getVar("pib");
        $gs = $this->request->getVar("geosir");
        $gd = $this->request->getVar("geoduz");
        $pon = $this->request->getVar("pon");
        $uto = $this->request->getVar("uto");
        $sre = $this->request->getVar("sre");
        $cet = $this->request->getVar("cet");
        $pet = $this->request->getVar("pet");
        $sub = $this->request->getVar("sub");
        $ned = $this->request->getVar("ned");
        $pon1 = $this->request->getVar("pon1");
        $uto1 = $this->request->getVar("uto1");
        $sre1 = $this->request->getVar("sre1");
        $cet1 = $this->request->getVar("cet1");
        $pet1 = $this->request->getVar("pet1");
        $sub1 = $this->request->getVar("sub1");
        $ned1 = $this->request->getVar("ned1");
        $pon2 = $this->request->getVar("pon2");
        $uto2 = $this->request->getVar("uto2");
        $sre2 = $this->request->getVar("sre2");
        $cet2 = $this->request->getVar("cet2");
        $pet2 = $this->request->getVar("pet2");
        $sub2 = $this->request->getVar("sub2");
        $ned2 = $this->request->getVar("ned2");
        $kIme = $this->session->get("kIme");
        $sifra = $this->session->get("sifra");
        $email = $this->session->get("email");
        $tip = $this->session->get("tip");

        $rd = "";
        if($pon == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($uto == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($sre == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($cet == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($pet == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($sub == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";
        if($ned == "on")
            $rd = $rd."1";
        else
            $rd = $rd."0";

        $pon12 = $pon1."-".$pon2;
        $uto12 = $uto1."-".$uto2;
        $sre12 = $sre1."-".$sre2;
        $cet12 = $cet1."-".$cet2;
        $pet12 = $pet1."-".$pet2;
        $sub12 = $sub1."-".$sub2;
        $ned12 = $ned1."-".$pon2;
        $rv = $pon12.";".$uto12.";".$sre12.";".$cet12.";".$pet12.";".$sub12.";".$ned12;

        $km = new KorisnikModel();
        $idK = $km->insert([ 'kIme'=>$kIme,
                      'sifra'=>$sifra,
                      'email'=>$email,
                      'tipKorisnika'=>3]);
        $r = new RadnjaModel();
        $data = [
            "naziv" => $imeR,
            "pib" => $pib,
            "sirina" => $gs,
            "duzina" => $gd,
            "radniDani" => $rd,
            "radnoVreme" => $rv,
            "idPredstavnika" => $idK
        ];
       $r->insert($data);
       return redirect()->to(site_url("Gost/prijava"));
    }
    
}