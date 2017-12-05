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
                <td>Entidad:</td><td>Ppoqiwe poqiwepoiqwe</td>
                <td>RUC:</td><td>098765432123</td>
                <td>Domicilio:</td><td>ioajsd asdjasdj lajsdh kajsd</td>
            </tr>
            <tr>
                <td colspan="6">Obra:</td>
            </tr>
            <tr>
                <td colspan="6">Proceso:</td>
            </tr>
            <tr>
                <td>Monto:</td><td><b>123</b></td>
                <td>Fecha:</td><td>20/20/2012</td>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
        <br/>        
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
//        print_r($amortizaciones);
            foreach ($amortizaciones as $fila) {
                echo '<tr>';
                echo '<td>' . $fila->Descripcion . '</td>';
                echo '<td>' . $fila->Fecha . '</td>';
                echo '<td>' . $fila->Numero . '</td>';
                echo '<td>' . $fila->ValorInicial . '</td>';
                echo '<td>' . $fila->ReajusteFP . '</td>';
                echo '<td>' . $fila->AdelantoDirecto . '</td>';
                echo '<td>' . $fila->AdelantoMateriales . '</td>';
                echo '<td>' . $fila->DeduccionRAD . '</td>';
                echo '<td>' . $fila->DeduccionRAM . '</td>';
                echo '<td>' . $fila->MontoTotal . '</td>';
                echo '</tr>';
            }
            ?>       
        </table>
    </body>
</html>
