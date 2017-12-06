<!DOCTYPE html>
<html lang="es">
    <head> 
        <style>
            th{ background-color: #c37719; color: #FFFFFF;}
        </style>
    </head>
    <body>
        <!--<h2><?php echo $titulo; ?></h2>-->        
        <table border="0" cellspacing="0" cellpadding="1" style="width: 100%;">
            <tr>
                <td>Entidad:</td><td><b><?php echo $info_obra[0]->Empresa ?></b></td>
                <td>RUC:</td><td>Lorem Ipsum Dolor Chavez</td>
                <td>Domicilio:</td><td><b>Lorem Ipsum Dolor Chavez</b></td>
            </tr>
            <tr>
                <td>Obra:</td><td colspan="5"><b><?php echo $info_obra[0]->Nombre ?></b></td>
            </tr>
            <tr>
                <td>Proceso:</td><td colspan="5"><b><?php echo $info_obra[0]->proceso ?></b></td>
            </tr>
            <tr>
                <td>Monto:</td><td><b><?php echo number_format((float) $info_obra[0]->Monto_Inicial, 2, '.', ''); ?></b></td>
                <td>Fecha:</td><td><b><?php echo $info_obra[0]->fechacontrato ?></b></td>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
        <br/>
        <?php
//        print_r($info_obra[0]);
        ?>
        <table border="1" cellspacing="3" cellpadding="4" style="width: 100%;">
            <tr>
                <th>Desc</th>
                <th align="center">Fecha</th>
                <th align="center"># Fact.</th>
                <th align="center">Total Val.</th>
                <th align="center">Reajuste Frml Polinómica</th>
                <th align="center">Adelanto Directo</th>
                <th align="center">Adelanto Materiales</th>
                <th align="center">Reajuste por Ad. Directo</th>
                <th align="center">Reajuste por Ad. Materiales</th>
                <th align="center">TOTAL</th>
            </tr>
            <?php
            foreach ($amortizaciones as $key => $fila) {
                echo '<tr>';
                echo '<td>' . $fila->Descripcion . ' ' . ($key+1)%2 . '</td>';
                echo '<td>' . $fila->Fecha . '</td>';
                echo '<td>' . $fila->Numero . '</td>';
                echo '<td>' . number_format((float) $fila->ValorInicial, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->ReajusteFP, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->AdelantoDirecto, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->AdelantoMateriales, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->DeduccionRAD, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->DeduccionRAM, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->MontoTotal, 2, '.', '') . '</td>';
                echo '</tr>';
            }
            ?>       
        </table>
    </body>
</html>
