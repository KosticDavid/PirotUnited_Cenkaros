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
                            if(isset($lista))
                            {
                                for($i=0; $i<count($artikli); $i++)
                                {
                                    echo "<tr><td>";
                                    echo $i+1;
                                    echo "</td><td>";
                                    echo $artikli[$i]->naziv;
                                    echo "</td><td><input type='number' name='' id='' value='";
                                    echo $sadrzi[$i]->kolicina;
                                    echo "'></td><td><a href='#'>Ukloni</a></td></tr>";
                                }
                            }
                        ?>
<!--<tr>-->
<!--				<td>1.</td>
				<td>Mleko</td>
				<td><input type="number" name="" id="" value="1"></td>
				<td><a href="#">Ukloni</a></td>
			</tr>
			<tr>
				<td>2.</td>
				<td>Hleb</td>
				<td><input type="number" name="" id="" value="2"></td>
				<td><a href="#">Ukloni</a></td>
			</tr>
			<tr>
				<td>3.</td>
				<td>Jaja</td>
				<td><input type="number" name="" id="" value="2"></td>
				<td><a href="#">Ukloni</a></td>
			</tr>-->
		</table>
		<br>
		<p>Izaberite fajl</p>
		<input type="file" id="" name="" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
		<br>
		<button>Dodaj listu iz fajla</button>
		<br>
		<form action="cuvanje_liste.html" method="GET">
			<button>Sacuvaj listu</button>
		</form>
		<button>Pronadji najbolju radnju</button>

	</div>