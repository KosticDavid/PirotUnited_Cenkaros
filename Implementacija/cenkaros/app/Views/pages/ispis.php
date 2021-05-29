<div id="content" class="pregled_liste">
        <table id="ispis">
            <tr>
                <th>
                    R.br
                </th>
                <th>
                    Naziv radnje
                </th>
                <th>
                    Cena
                </th>
                <th>
                    Lokacija
                </th>
            </tr>
            <?php 
                for($i=0; $i < count($nazivi); $i++){
                    $j=$i+1;
                    echo "<tr> <td> {$j}. </td>"; 
                    
                    echo "<td>{$nazivi[$i]}</td>";
                    
                    echo "<td>{$cene[$i]}</td>";
                    
                    echo"<td><img src='https://maps.geoapify.com/v1/staticmap?style=osm-carto&width=300&height=300&center=lonlat:{$duzine[$i]},{$sirine[$i]}&zoom=16&apiKey=3e8ff683b9924cf1a4d95f3b51fcfb01'></td> </tr>";
            
                }
            
            
            ?>
            

        </table>
	</div>