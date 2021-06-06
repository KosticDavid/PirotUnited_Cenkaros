<!--Milan Akik 2018/0688-->
<div id="content" class="pregled_liste container-fluid">
    <div class="row">
        <table id="ispis" class="col-12">
            <tr>
                <th></th>
                <th> Naziv radnje </th>
                <th> Cena </th>
                <th> Radno vreme </th>
                <th> Lokacija </th>
            </tr>
            <?php 
                for($i=0; $i < count($nazivi); $i++){
                    $j=$i+1;
                    echo "<tr> <td> {$j}. </td>"; 

                    echo "<td>{$nazivi[$i]}</td>";

                    echo "<td>{$cene[$i]}</td>";
                    $pomocna = explode(";", $radno_vreme[$i]);
                    echo "<td> ";
                    echo "Pon:";
                    if (substr($radni_dani[$i],0 ,1) == '1'){
                        echo $pomocna[0];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Uto:";
                    if (substr($radni_dani[$i],1 ,1) == '1'){
                        echo $pomocna[1];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Sre:";
                    if (substr($radni_dani[$i],2 ,1) == '1'){
                        echo $pomocna[2];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Cet:";
                    if (substr($radni_dani[$i],3 ,1) == '1'){
                        echo $pomocna[3];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Pet:";
                    if (substr($radni_dani[$i],4 ,1) == '1'){
                        echo $pomocna[4];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Sub:";
                    if (substr($radni_dani[$i],5 ,1) == '1'){
                        echo $pomocna[5];
                    }
                    else{
                        echo "Ne radi";
                    }
                    echo "</br>";

                    echo "Ned:";
                    if (substr($radni_dani[$i],6 ,1) == '1'){
                        echo $pomocna[6];
                    }
                    else{
                        echo "Ne radi";
                    }                   

                    echo "</td>";

                    echo"<td><img src='https://maps.geoapify.com/v1/staticmap?style=osm-carto&width=300&height=300&center=lonlat:{$duzine[$i]},{$sirine[$i]}&zoom=16&apiKey=3e8ff683b9924cf1a4d95f3b51fcfb01'></td> </tr>";
                    //https://maps.geoapify.com/v1/staticmap?style=osm-carto&width=300&height=300&center=lonlat:{$duzine[$i]},{$sirine[$i]}&zoom=16&apiKey=3e8ff683b9924cf1a4d95f3b51fcfb01

                }
            ?>
        </table>
    </div>
</div>