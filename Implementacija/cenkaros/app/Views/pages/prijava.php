<!--Milena Djuric 2018/0630-->
<div id="content" class="prijava_content">
    <form class="container-fluid prijava_form" action="<?php echo site_url("Gost/zahtev_za_prijavu"); ?>" method="POST" id="prijava_form">
        <div class="row">
            <div class="col-1 col-md-3"></div>
            <p class="prijava_paragraph col-10 col-md-3">Korisnicko ime:</p>
            <div class="d-block d-md-none col-1"></div>
            <div class="d-block d-md-none col-1"></div>
            <input class="prijava_input col-10 col-md-3" type="text" name="uname" id="">
            <div class="col-1 col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-1 col-md-3"></div>
            <p class="prijava_paragraph col-10 col-md-3">Lozinka</p>
            <div class="d-block d-md-none col-1"></div>
            <div class="d-block d-md-none col-1"></div>
            <input class="prijava_input col-10 col-md-3" type="password" name="pword" id="">
            <div class="col-1 col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-3 col-md-5"></div>
            <button class="prijava_button col-6 col-md-2">Prijavi se</button>
            <div class="col-3 col-md-5"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <h1 class="col-6"> <?php if(isset($poruka))print_r($poruka); ?> </h1>
            <div class="col-3"></div>
        </div>
    </form>
</div>