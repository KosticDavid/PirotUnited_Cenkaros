<div id="content" class="prijava_content">
    <form action="<?php echo site_url("Gost/zahtev_za_prijavu"); ?>" method="POST" id="prijava_form">
        <p class="prijava_paragraph">Korisnicko ime:</p>
        <input class="prijava_input" type="text" name="uname" id="">
        <p class="prijava_paragraph">Lozinka</p>
        <input class="prijava_input" type="password" name="pword" id="">
        <br>
        <button class="prijava_button">Prijavi se</button>
        <h1> <?php if(isset($poruka))print_r($poruka); ?> </h1>
    </form>
</div>