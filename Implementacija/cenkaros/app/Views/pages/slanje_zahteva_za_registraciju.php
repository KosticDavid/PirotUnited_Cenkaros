<div id="content" class="registracija_content">
        <form action="<?php site_url("Gost/zahtev_za_registraciju") ?>" method="POST" class="registracija_form">
                <p>Korisnicko ime:</p>
                <input type="text" name="uname" id="">
                <p>Email:</p>
                <input type="email" name="email" id="">
                <p>Lozinka</p>
                <input type="password" name="pword" id="">
                <p>Potvrda lozinke</p>
                <input type="password" name="pword2" id="">
                <br>
                <p>Tip naloga</p>
                <select name="" id="">
                        <option value="">Kupac</option>
                        <option value="">Predstavnik radnje</option>
                </select>
                <br>
                <button>Registruj se</button>
        </form>
</div>