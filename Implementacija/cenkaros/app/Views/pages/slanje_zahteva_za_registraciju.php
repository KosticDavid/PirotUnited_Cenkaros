<!--David Kostic 2016/0624-->
<div id="content" class="registracija_content">
        <form class="registracija_form container-fluid" action="<?php echo site_url("Gost/zahtev_za_registraciju") ?>" method="POST">
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <p class="col-8 col-md-3">Korisnicko ime:</p>
                <div class="col-2 d-block d-md-none"></div>
                <div class="col-2 d-block d-md-none"></div>
                <input class="col-8 col-md-3" type="text" name="uname" id="">
                <div class="col-2 col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <p class="col-8 col-md-3">Email:</p>
                <div class="col-2 d-block d-md-none"></div>
                <div class="col-2 d-block d-md-none"></div>
                <input class="col-8 col-md-3" type="email" name="email" id="">
                <div class="col-2 col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <p class="col-8 col-md-3">Lozinka</p>
                <div class="col-2 d-block d-md-none"></div>
                <div class="col-2 d-block d-md-none"></div>
                <input class="col-8 col-md-3" type="password" name="pword1" id="">
                <div class="col-2 col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <p class="col-8  col-md-3">Potvrda lozinke</p>
                <div class="col-2 d-block d-md-none"></div>
                <div class="col-2 d-block d-md-none"></div>
                <input class="col-8 col-md-3" type="password" name="pword2" id="">
                <div class="col-2 col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <p class="col-8 col-md-3">Tip naloga</p>
                <div class="col-2 d-block d-md-none"></div>
                <div class="col-2 d-block d-md-none"></div>
                <select class="col-8 col-md-3" name="tip" id="">
                        <option value="2">Kupac</option>
                        <option value="3">Predstavnik radnje</option>
                </select>
                <div class="col-2 col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-3 col-md-5"></div>
                <button class="col-6 col-md-2">Registruj se</button>
                <div class="col-3 col-md-5"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-3"></div>
                <h1 class="col-8 col-md-6"> <?php if(isset($poruka))print_r($poruka); ?> </h1>
                <div class="col-2 col-md-3"></div>
            </div>
        </form>
</div>