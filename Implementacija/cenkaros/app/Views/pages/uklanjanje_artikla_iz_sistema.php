	<div id="content" >
        <style>
            #veca{
                width: 80%;
                height: 80%;
                padding-left: 30%; 
                font-size: 20px;
            }
            #veca th{
                border-bottom: black solid 1px;
                
            }
            #veca td{
                font-size: 20px;
                padding: 6px;
            }
            #dugme{
                align-items: center;
                font-size: 40px;
            }
        </style>
        <table id="veca" >
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
                        echo "</td><td id='dugme'><button>Ukloni</button></td></tr></form>";
                    }
                    ?>
                
            </table>
            
	</div>