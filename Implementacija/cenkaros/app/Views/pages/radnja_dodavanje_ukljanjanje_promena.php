<!--Milan Akik 2018/0688-->
<div id="content" class="container-fluid izmena_radnje">
    <div class="row">
        <table class="col-12 col-md-6">
             <tr bgcolor="lightgray">
                 <th align="center">Artikal</th>
                 <th align="center">Cena</th>
                 <td></td>
             </tr>
             <?php
                 for($i = 0;$i<count($artikli); $i++)
                 {
                     echo "<tr><td>{$artikli[$i]->naziv}</td>";
                     echo "<td><form method='POST' action ='";
                     echo site_url("Predstavnik/promeni_cenu_artikla/{$artikli[$i]->idArtikla}");
                     echo "'>";
                     echo "<input class='cena_input' type='number' name='cena' step='0.01' value='{$prodaje[$i]->cena}'>";
                     echo "<input class='cena_button' type='submit' value='Promeni'>";
                     echo "</form></td>";
                     echo "<td>";
                     echo "<form method='POST' action ='";
                     echo site_url("Predstavnik/ukloni_artikal/{$artikli[$i]->idArtikla}");
                     echo "'><input type='submit' value='Obrisi'>";
                     echo "</form></td></tr>";
                 }
             ?>

        </table>
        <table class="col-12 col-md-6">
            <tr>
                <?php
                echo "<form method='POST' action='";
                echo site_url("Predstavnik/dodaj_artikal/");
                echo "'>"
                ?>
                    <td>
                        <select class="artikal_select" name="idA">
                            <?php
                            foreach($ne_prodajemo as $n)
                            {
                                echo "<option value='{$n->idArtikla}'>{$n->naziv}</otpion>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <button>Dodaj</button>
                    </td>

                <?php
                echo "</form>";
                ?>
            </tr>
        </table>
    </div>
</div>