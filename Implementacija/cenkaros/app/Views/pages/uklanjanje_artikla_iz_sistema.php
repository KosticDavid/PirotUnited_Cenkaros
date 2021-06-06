<!--Milena Djuric 2018/0630-->
<div id="content" class="container-fluid">
    <style>
        
    </style>
    <div class="row">
        <div class="d-none d-md-block col-md-2"></div>
        <table class="uklanjanje_artikla_table col-12 col-md-8">
            <tr>
                <th>
                    Naziv artikla 
                </th>
                <th>

                </th>
            </tr>

                <?php 
                foreach($artikli as $a)
                {
                    echo "<form method='POST' action='";
                    echo site_url("Administrator/ukloniA/{$a->idArtikla}");
                    echo "'><tr><td>";
                    echo $a->naziv;
                    echo "</td><td class='uklanjanje_artikla_dugme'><button>Ukloni</button></td></tr></form>";
                }
                ?>

        </table>
        <div class="d-none d-md-block col-md-2"></div>
    </div>
</div>