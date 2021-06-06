<!--Milan Akik 2018/0688-->
<div id="content" class="sacuvane_liste container">
    <div class="row">
        <div class="col-1 col-md-2"></div>
        <table class="col-10 col-md-8">
            <tr>
                        <td></td>
                        <td>Naziv</td>
                        <td>Broj artikala</td>
                        <td>Skini</td>
                        <td>Izmeni</td>
                        <td>Obrisi</td>
            </tr>
            <?php
            for($i=0; $i<count($liste); $i++)
            {
                $a = 0;
                foreach($sadrzi as $s)
                {
                    if(($s->idListe)==($liste[$i]->idListe))$a++;
                }
                echo '<tr><td>';
                echo $i+1;
                echo "</td><td>";
                echo $liste[$i]->naziv;
                echo "</td><td>";
                echo $a;
                echo '</td><td><a href="';
                echo site_url("/Kupac/skini_listu/{$liste[$i]->idListe}");
                echo '" target="_newtab">Skini</a>';
                echo '</td><td><a href="';
                echo site_url("/Kupac/pregledaj_listu/{$liste[$i]->idListe}");
                echo '">Izmeni</a>';
                echo '</td><td><a href="';
                echo site_url("/Kupac/obrisi_listu/{$liste[$i]->idListe}");
                echo '">Obrisi</a></td></tr>';
            } ?>
        </table>
        <div class="col-1 col-md-2"></div>
    </div>
</div>