<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">Factura Original</td>
                <td style="text-align: center;    width: 34%"> <?php $nCom; ?> </td>
                <td style="text-align: right;    width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 50%;"><i>Siempre con los mejores precios</i></td>
                <td style="text-align: right; width: 50%;">Pagina [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <span style="font-size: 20px; font-weight: bold; text-align:center">Esta es tu factura original por favor no elimine esta factura, conservela en un lugar seguro</span><br>
    <br>
    <br>
    <table style="width: 95% ;border: solid 1px; border-collapse: collapse" align="center">
        <thead>
            <tr>
                <th style="text-align: center; border: solid 1px;">Producto</th>
                <th style="text-align: center; border: solid 1px;" >Cantidad</th>
                <th style="text-align: center; border: solid 1px;" >IVA</th>
					 <th style="text-align: center; border: solid 1px;" >Descuento</th>
					 <th style="text-align: center; border: solid 1px;" >Total</th>
            </tr>
        </thead>
        <tbody>
        
<?php
    for ($k=0; $k<13; $k++) {
?>
            <tr>
                <td style="width: 50%; text-align: left; border: solid 1px">
						textoooooo
                </td>
                <td style="width: 15%; text-align: center; border: solid 1px">
						cuaaaas
                </td>
                <td style="width: 15%; text-align: center; border: solid 1px">
						cuaaaas
                </td>                
                <td style="width: 15%; text-align: center; border: solid 1px">
						cuaaaas
                </td>
                <td style="width: 15%; text-align: center; border: solid 1px">
						cuaaaas
                </td>                                
            </tr>
<?php
    }
?>
        </tbody>
    </table>
</page>