<div id="content" class="registracija_content">
        <form action="<?php echo site_url("Gost/zahtev_za_registraciju") ?>" method="POST" class="registracija_form">
                <p>Korisnicko ime:</p>
                <input type="text" name="uname" id="">
                <p>Email:</p>
                <input type="email" name="email" id="">
                <p>Lozinka</p>
                <input type="password" name="pword1" id="">
                <p>Potvrda lozinke</p>
                <input type="password" name="pword2" id="">
                <br>
                <p>Tip naloga</p>
                <select name="tip" id="">
                        <option value="1">Kupac</option>
                        <option value="3">Predstavnik radnje</option>
                </select>
                <br>
                <button>Registruj se</button>
                <h1>
                <?php if(isset($poruka))print_r($poruka); ?>
                </h1>
        </form>
</div>