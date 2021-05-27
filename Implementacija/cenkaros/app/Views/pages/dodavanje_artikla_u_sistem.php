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
            #manja{
                align-items: center;
                font-size: 20px;
            }
        </style>
        <table id="veca" >
            <tr>
                <th colspan="2"align="left">
                    Naziv artikla 
                </th>
                <td rowspan="8"> 
                    <form method="POST" action="<?php echo site_url('Administrator/dodajA');?>">
                        <table id="manja">
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
                </td>
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
	</div>