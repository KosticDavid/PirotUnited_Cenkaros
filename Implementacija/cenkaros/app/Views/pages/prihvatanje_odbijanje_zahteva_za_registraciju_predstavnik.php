	<div id="content" class="zahtevi">
		<table>
                    <tr>
                        <td></td>
                        <td>Korisnicko ime</td>
                        <td>Email</td>
                        <td>Naziv radnje</td>
                        <td>Lokacija</td>
                        <!--<td>Radno vreme</td>-->
                        <td>PIB</td>
                        <td></td>
                    </tr>
                    <?php
                    for($i=0;$i<count($radnje); $i++)
                    {
//                        $rv = explode(";",$radnje[$i]->radnoVreme);
                        echo "<tr>";
			echo "<td>".($i+1)."</td>";
			echo "<td>{$predstavnici[$i]->kIme}</td>";
			echo "<td>{$predstavnici[$i]->email}</td>";
                        echo "<td>{$radnje[$i]->naziv}</td>";
			echo "<td>{$radnje[$i]->sirina}</br>{$radnje[$i]->duzina}</td>";
//			echo "<td>";
//                        for($j=0; $j<7; $j++)
//                        {
//                            echo $rv[$j];
//                            echo "</br>";
//                        }
//                        echo "</td>";
			echo "<td>{$radnje[$i]->pib}</td>";
			echo "<td><form action='";
                        echo site_url("Administrator/prihvatiodbij/{$predstavnici[$i]->idKorisnik}");
                        echo "' method='POST'><input type='submit' name='prihvati' value='Prihvati'></br>";
                        echo "</br><input type='submit' value='Odbij'></form></td>";
			echo "</tr>";
                    }
                    ?>
		</table>
	</div>