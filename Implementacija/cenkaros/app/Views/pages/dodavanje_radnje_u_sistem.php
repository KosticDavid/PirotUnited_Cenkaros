<div id="content">
    <form action="<?php echo site_url('Gost/dodaj_radnju')?>" method = "POST">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6" >
                    <input type="text" name="imeR" required placeholder="Ime radnje">
                    <br/>
                    <input type="number" name="pib" required placeholder="PIB">
					<br/>
					<br/>
					<table>
						<tr>
							<th>Radno vreme</th>
						</tr>
						<tr>
							<td>
								Ponedeljak
							</td>
							<td>
								<input type="checkbox" name="pon">radi
							</td>
							<td>
								<input name="pon1" type="time">
								<input name="pon2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Utorak
							</td>
							<td>
								<input type="checkbox" name="uto">radi
								
							</td>
							<td>
								<input name="uto1" type="time">
								<input name="uto2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Sreda
							</td>
							<td>
								<input type="checkbox" name="sre">radi
								
							</td>
							<td>
								<input name="sre1" type="time">
								<input name="sre2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Cetvrtak
							</td>
							<td>
								<input type="checkbox" name="cet">radi
							</td>
							<td>
								<input name="cet1" type="time">
								<input name="cet2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Petak
							</td>
							<td>
								<input type="checkbox" name="pet">radi
								
							</td>
							<td>
								<input name="pet1" type="time">
								<input name="pet2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Subota
							</td>
							<td>
								<input type="checkbox" name="sub">radi
							</td>
							<td>
								<input name="sub1" type="time">
								<input name="sub2" type="time">
							</td>
						</tr>
						<tr>
							<td>
								Nedelja
							</td>
							<td>
								<input type="checkbox" name="ned">radi
							</td>
							<td>
								<input name="ned1" type="time">
								<input name="ned2" type="time">
							</td>
						</tr>
					</table>
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    <input type="number" name="geosir" step="any" placeholder="Geografska sirina"></br>
                    <input type="number" name="geoduz" step="any" placeholder="Geografska duzina"></br>
					<br/>
					<button class="btn btn-primary"> Dodaj </button>
				</div>
            </div>
        </div>
        </form>
	</div>