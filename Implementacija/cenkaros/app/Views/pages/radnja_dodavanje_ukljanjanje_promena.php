    <div id="content" >
        <table align="center" width='90%'>
            <tr>
                <td rowspan="2">
                    <table align="center" width="600px" >
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
                                echo "<input type='number' name='cena' step='0.01' value='{$prodaje[$i]->cena}'>";
                                echo "<input type='submit' value='Promeni'>";
                                echo "</form></td>";
                                echo "<td>";
                                echo "<form method='POST' action ='";
                                echo site_url("Predstavnik/ukloni_artikal/{$artikli[$i]->idArtikla}");
                                echo "'><input type='submit' value='Obrisi'>";
                                echo "</form></td></tr>";
                            }
                        ?>
                        
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <?php
                            echo "<form method='POST' action='";
                            echo site_url("Predstavnik/dodaj_artikal/");
                            echo "'>"
                            ?>
                                <td width="100px">
                                    <select name="idA">
                                        <?php
                                        foreach($ne_prodajemo as $n)
                                        {
                                            echo "<option value='{$n->idArtikla}'>{$n->naziv}</otpion>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td width="100px">
                                    <button height="100px">Dodaj</button>
                                </td>
                            
                            <?php
                            echo "</form>";
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>