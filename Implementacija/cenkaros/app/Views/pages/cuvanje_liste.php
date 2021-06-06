<!--Milena Djuric 2018/0630-->
<div id="content" class="container-fluid cuvanje_liste_content">
    <div class="row">
        <div class="d-none d-md-block col-md-3"></div>
        <form class="col-12 col-md-6" id="cuvanje_liste_form" action="<?php echo site_url("Kupac/sacuvaj_listu"); ?>" method="POST">
                <p id="cuvanje_liste_ime_label">Ime liste</p>
                <input type="text" name="naziv" id="cuvanje_liste_ime_input">
                <br>
                <button id="cuvanje_liste_button">Potvrdi</button>
        </form>
        <div class="d-none d-md-block col-md-3"></div>
    </div>
</div>