<?php namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Controllers\BazniKontroler;
use App\Models\RadnjaModel;

class Gost extends BazniKontroler
{
    
    //Pomocna funkcija koja postavlja controller u data i onda prikazuje 
    //header gosta, trazenu stranicu i footer sa data nizom prosledjenim
    protected function show($page, $data=[])
    {
        $data['controller']='Gost';
        echo view("templates\\header_logged_out",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    //Ukoliko se trazi index preusmeri na metod prijava
    public function index()
    {
        return redirect()->to(site_url('Gost/prijava'));
    }

    //Poziva prikaz stranice za prijavu sa mogucom prosledjenom porukom
    public function prijava($poruka="")
    {
        $this->show('prijava',['poruka'=>$poruka]);
    }
    
    //Poziva prikaz stranice za registraciju sa mogucom prosledjenom porukom
    public function registracija($poruka="")
    {
        $this->show('slanje_zahteva_za_registraciju',['poruka'=>$poruka]);
    }
    
    //Poziva prikaz stranice za dodavanje radnje sa mogucom prosledjenom porukom
    public function dodavanje_radnje($poruka="")
    {
        $this->show('dodavanje_radnje_u_sistem',['poruka'=>$poruka]);
    }
    
    //Poziva prikaz stranice o_nama
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    //Poziva prikaz stranice kontakt
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    //Funkcija koja vrsi prijavljivanje na sistem
    //Prvo validira sva polje i ako postoje neispravne vrednosti vraca se na
    //stranicu za prijavu sa tekstom problema. Onda uradi hesovanje sifre.
    //Potrazi korisnika sa datim korisnickim imenom i ukoliko ne postoji ispise
    //da korisnik sa tim imenom ne postoji. Proveri sifru sa prosledjenom i ako
    //nije ispravna ispise da sifra nije ispravna. Inace zapamti potrebne stvari
    //u sesiju i predje na odgovarajuci kontroler ili nazad na formu za prijavu 
    //sa porukom da nalog nije aktiviran ako je radnja i dalje neaktivna
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
    
    //Funkcija koja vrsi registraciju na sistem
    //Prvo validira sva polje i ako postoje neispravne vrednosti vraca se na
    //stranicu za registraciju sa tekstom problema. Onda proveri da li postoji
    //korisnik sa datim korisnickim imenom i ako postoji ispise da je korisnicko
    //ime zauzeto. Onda proveri da li postoji korisnik sa datim email u bazi i 
    //ako postoji ispise da je email zauzet. Ukoliko prodje do ovde samo unese
    //korisnika u bazu i predje na stranicu za prijavu
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
        return $this->prijava('Vas nalog je dodat');
        
    }
    
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
       
       $rv = "";
       
       $r = new RadnjaModel();
       $data = [
           "naziv" => $imeR,
           "pib" => $pib,
           "sirina" => $gs,
           "duzina" => $gd,
           "radniDani" => $rd,
           "radnoVreme" => $rv,
           "idPredstavnika" => 1
       ];
       $r->insert($data);
       echo $pon;
    }
    
}