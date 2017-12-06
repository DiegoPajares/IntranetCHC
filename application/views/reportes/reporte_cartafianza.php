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
//        print_r($cartafianza);
        ?>
        <table border="1" cellspacing="3" cellpadding="4" style="width: 100%;">
            <tr>
                <th>CF</th>
                <th align="center">Fiel Cumplimiento</th>
                <th align="center"># Carta Fianza</th>
                <th align="center">Gasto</th>
                <th align="center">Monto</th>
                <th align="center">Fecha de emisión</th>
                <th align="center">Fecha de venc. y/o renov.</th>
            </tr>
            <?php
            foreach ($cartafianza as $key => $fila) {
                $index = ($key + 1) % 2;
                echo (($index == 0) ? '<tr bgcolor="#fff0da">' : '<tr bgcolor="#ffdba4">');
                echo '<td></td>';
                echo '<td>' . $fila->FielCumplimiento . '</td>';
                echo '<td>' . $fila->numero . '</td>';
                echo '<td>' . number_format((float) $fila->gastofinac, 2, '.', '') . '</td>';
                echo '<td>' . number_format((float) $fila->montorenov, 2, '.', '') . '</td>';
                echo '<td>' . $fila->fechaemisionini . '</td>';
                echo '<td>' . $fila->fechavencren . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
