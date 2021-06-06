<!--David Kostic 2016/0624-->
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="container-fluid">
                <div class="row">
                    <div class="d-none d-md-block col-md-1"></div>
                    <table class="uklanjanje_artikla_table col-12 col-md-10">
                        <tr>
                            <th>
                                Naziv artikla 
                            </th>
                        </tr>

                        <?php 
                            foreach ($artikli as $a)
                            {
                                echo "<tr><td>";
                                echo $a->naziv;
                                echo "</td></tr>";
                            }
                        ?>

                    </table>
                    <div class="d-none d-md-block col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <form method="POST" action="<?php echo site_url('Administrator/dodajA');?>">
                 <table id="dodavanje_artikla_tabela">
                     <tr>
                         <td>
                             Naziv novog artikla:
                         </td>
                         <td>
                             <input type="text" name="naziv">
                         </td>
                     </tr>
                     <tr>
                         <td>
                             Jedinica mere:
                         </td>
                         <td>
                             <input type="text" name="jm">
                         </td>
                     </tr>
                     <tr>
                         <td>
                             Tagovi:
                         </td>
                         <td>
                             <textarea name="tags"></textarea>
                         </td>
                     </tr>
                     <tr>
                         <td rowspan="2"> <button>Dodaj</button></td>
                     </tr>
                 </table>
             </form>
        </div>
    </div>
</div>