<script type="text/javascript">
    let i=0;
    var namirnice = [
	<?php foreach($sviArtikli as $a) { echo "'".$a->naziv."',"; } ?>
    ];
    
    var idA = [
	<?php foreach($sviArtikli as $a) { echo "'".$a->idArtikla."',"; } ?>
    ];
    
    var fns = [
	<?php
        foreach($sviArtikli as $a)
        {
            echo "function(){window.location.replace('";
            echo site_url("Kupac/dodaj_artikal/{$a->idArtikla}");
            echo "');}, ";
        }
        ?>
    ];

    function search()
    {
            let results =document.getElementById("results");
            results.innerHTML="";
            let search = document.getElementById("search-articles");
            let searchtext = search.value.toLowerCase().trim();
            if(searchtext==="")return;
            for(i=0; i<namirnice.length; i++)
            {
                if(namirnice[i].toLocaleLowerCase().includes(searchtext))
                {
                        let div = document.createElement("DIV");
                        div.className="result";
                        div.innerHTML=namirnice[i];
                        div.onclick=fns[i];
                        results.appendChild(div);
                }
            }
    }
    
</script>	
<div id="content" class="pregled_liste">
            
		<input type="text" name="" id="search-articles" onkeyup="search()">
		<br>
		<div id="results">
		</div>
		<br>
		<table id="articles">
			<tr>
				<td>Br</td>
				<td>Naziv</td>
				<td>Kolicina</td>
				<td></td>
			</tr>
                        <?php 
                            if(isset($artikli))
                            {
                                for($i=0; $i<count($artikli); $i++)
                                {
                                    echo "<tr><td>";
                                    echo $i+1;
                                    echo "</td><td>";
                                    echo $nazivi[$i];
                                    echo "</td><td><form method='POST' action='";
                                    echo site_url("Kupac/umanji_artikal/{$artikli[$i]}");
                                    echo "'><input type='submit' value='-'></form><div>";
                                    echo $kolicine[$i];
                                    echo "</div><form method='POST' action='";
                                    echo site_url("Kupac/uvecaj_artikal/{$artikli[$i]}");
                                    echo "'><input type='submit' value='+'></form>";
                                    echo "</td><td><a href='";
                                    echo site_url("Kupac/ukloni_artikal/{$artikli[$i]}");
                                    echo "'>Ukloni</a></td></tr>";
                                }
                            }
                        ?>
		</table>
		<br>
		<p>Izaberite fajl</p>
		<input type="file" id="" name="" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
		<br>
		<button>Dodaj listu iz fajla</button>
		<br>
                <form action="<?php echo site_url('Kupac/cuvanje_liste');?>" method="POST">
			<button>Sacuvaj listu</button>
		</form>
                 <form action="<?php echo site_url('Kupac/maksimalna_razdaljina');?>" method="POST">
                     <button>Pronadji najbolju radnju</button>
		</form>
		

	</div>