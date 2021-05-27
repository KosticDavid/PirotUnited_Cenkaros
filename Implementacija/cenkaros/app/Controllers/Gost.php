<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Controllers\BazniKontroler;

class Gost extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Gost';
        echo view("templates\\header_logged_out",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
        
    public function index()
    {
        return redirect()->to(site_url('Gost/prijava'));
    }

    public function prijava($poruka="")
    {
        $this->show('prijava',['poruka'=>$poruka]);
    }
    
    public function registracija($poruka="")
    {
        $this->show('slanje_zahteva_za_registraciju',['poruka'=>$poruka]);
    }
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
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
    
    public function zahtev_za_registraciju()
    {
        
        if(!$this->validate(['uname'=>'required|min_length[5]|max_length[30]', 'email'=>'required|min_length[10]|max_length[30]', 'pword1'=>'required|min_length[8]|max_length[20]', 'pword2'=>'required|min_length[8]|max_length[20]|matches[pword1]']))
            return $this->registracija($this->validator->getErrors());
        $km = new korisnikModel();
        $kIme = $km->pretraga_kIme($this->request->getVar('uname'));
        $email = $km->pretraga_email($this->request->getVar('email'));
        if(count($kIme)>0) return $this->registracija(['Korisnicko ime je zauzeto']);
        if(count($email)>0) return $this->registracija(['Email se vec koristi']);
        $km->insert([ 'kIme'=>$this->request->getVar('uname'), 'sifra'=>$pwordhash = hash("sha256",$this->request->getVar('pword1')), 'email'=>$this->request->getVar('email'), 'tipKorisnika'=>$this->request->getVar('tip') ]);
        return $this->registracija('Vas nalog je dodat');
        
    }
    
}