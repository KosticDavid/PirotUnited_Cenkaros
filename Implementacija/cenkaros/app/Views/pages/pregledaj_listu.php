<!--Milan Akik 2018/0688-->
<script type="text/javascript">
    let i=0;

    function search()
    {
            let results =document.getElementById("results");
            results.innerHTML="";
            let search = document.getElementById("search-articles");
            let searchtext = search.value.toLowerCase().trim();
            if(searchtext==="")return;
            let loc = <?php echo '"'.site_url("Kupac/dohvati_artikle_kao").'"';?>;
            $.ajax({type:"GET",url:loc,data:{tags:searchtext}}).done( function(res){ $("#results").append(res); } );
    }
    
</script>	
<div id="content" class="pregled_liste container-fluid">
    <div class="row">
        <div class="d-none d-md-block col-md-2"></div>
        <div class="col-12 col-md-8">
            <input type="text" name="" id="search-articles" onkeyup="search()">
            <br>
            <div id="results">
            </div>
            <br>
            <table id="articles">
                    <tr>
                            <td></td>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 col-md-1"></div>
                    <div class="col-8 col-md-10">
                        
                        <form class="container-fluid" method="POST" enctype="multipart/form-data" action='<?php echo site_url("Kupac/dodaj_automatski"); ?>'>
                            <div class="row">
                                <p class="col-12">Izaberite fajl</p>
                                <div class="d-none d-md-block col-md-3"></div>
                                <input class="col-12 col-md-6" type="file" id="" name="list" accept=".csv">
                                <div class="d-none d-md-block col-md-3"></div>
                                <button class="col-12">Dodaj</button>
                            </div>
                        </form>

                            <?php
                            $link = 'Kupac/sacuvaj_listu';
                            if($idL==-1) $link = 'Kupac/cuvanje_liste';
                            ?>
                        <form action="<?php echo site_url($link);?>" method="POST">
                            <button>Sacuvaj listu</button>
                        </form>
                         <form action="<?php echo site_url('Kupac/maksimalna_razdaljina');?>" method="POST">
                             <button>Pronadji najbolju radnju</button>
                        </form>
                        
                    </div>
                    <div class="col-2 col-md-1"></div>
                </div>
            </div>
            
        </div>
        <div class="d-none d-md-block col-md-2"></div>
    </div>
</div>