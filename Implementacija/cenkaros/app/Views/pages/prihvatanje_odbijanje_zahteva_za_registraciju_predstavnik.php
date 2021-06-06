<!--Milena Djuric 2018/0630-->
<div id="content" class="zahtevi container-fluid">
    <div class="row">
        <div class="d-none d-md-block col-md-1"></div>
        <table class="col-12 col-md-10">
            <tr>
                <td></td>
                <td>Korisnicko ime</td>
                <td>Email</td>
                <td>Naziv radnje</td>
                <td>Lokacija</td>
                <td>PIB</td>
                <td></td>
            </tr>
            <?php
            for($i=0;$i<count($radnje); $i++)
            {
                echo "<tr>";
                echo "<td>".($i+1)."</td>";
                echo "<td>{$predstavnici[$i]->kIme}</td>";
                echo "<td>{$predstavnici[$i]->email}</td>";
                echo "<td>{$radnje[$i]->naziv}</td>";
                echo "<td>{$radnje[$i]->sirina}</br>{$radnje[$i]->duzina}</td>";
                echo "<td>{$radnje[$i]->pib}</td>";
                echo "<td><form action='";
                echo site_url("Administrator/prihvatiodbij/{$predstavnici[$i]->idKorisnik}");
                echo "' method='POST'><input type='submit' name='prihvati' value='Prihvati'></br>";
                echo "</br><input type='submit' value='Odbij'></form></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="d-none d-md-block col-md-1"></div>
    </div>
</div>