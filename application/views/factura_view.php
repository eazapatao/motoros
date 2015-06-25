<?php



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
$pdf = new TCPDF('l', 'mm', 'A5', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Motoros');
$pdf->SetTitle('Factura');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->SetHeaderData('recursos/logo.png','', '', '', '', '');

//$pdf->setFooterData(array(0,64,0), array(0,64,128),'');
//$pdf->setFooterData(array(0,64,0), array(0,64,128),'');

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// ---------------------------------------------------------

// set default font subsetting mode
    $pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 8, '', true);
$GLOBALS['band'] = "uno";


foreach ($facturacion as $key => $value) {

// Add a page
// This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

// set JPEG quality
    $pdf->setJPEGQuality(50);


// Image method signature:
// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// Image example with resizing
    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");
    $tbl = <<<EOD
<br><br>
EOD;
    $pdf->writeHTML($tbl, true, false, false, false, '');
//bloque de fecha

    $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0.5">';
    $tbl_footer = '</table>';
    $tbl = '';

    $tbl_header = '<table cellspacing="0" cellpadding="1" border="0.5" align="center" width="20%">

    <tr>
    <th><font face="Arial, Helvetica, sans-serif">Día</font></th>
    <th><font face="Arial, Helvetica, sans-serif">Mes</font></th>
    <th><font face="Arial, Helvetica, sans-serif">Año</font></th>
    <th width="85%"><font face="Arial, Helvetica, sans-serif">Recibo de caja N°</font></th>
    </tr>
    ';

    $tbl_footer = '</table>';
    $tbl = '';


    $tbl .= '
<tr>
    <td>' . $dia . '</td>
    <td>' . $mes . '</td>
    <td>' . $ano . '</td>
    <td></td>
</tr>
        ';

    // output the HTML content
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

    //bloque datos del cliente



        $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0">';
        $tbl_footer = '</table>';
        $tbl = '';

    foreach ($value as $value2) {

            $tbl .= '
<tr>
        <td width="50%">Nombre: ' . $value2['cli_nombre'] . ' ' . $value2['cli_apellido'] . '</td>
        <td width="50%">Teléfono: ' . $value2['cli_telefono'] . '-' . $value2['cli_celular'] . '</td>


    </tr>
  <tr>
       <td width="50%">Cédula: ' . $value2['cli_cedula'] . '</td>
        <td width="50%">Correco electrónico: ' . $value2['cli_correo'] . '</td>
    </tr>
    <tr>
        <td width="50%">Dirección: ' . $value2['cli_direccion'] . '</td>
        <td width="50%">Ciudad: ' . $value2['cli_ciudad'] . '</td>
    </tr>
        ';
            break;


    }

    

        // output the HTML content
        $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

//bloque de resumen de pagos

    $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0.5">';
    $tbl_footer = '</table>';
    $tbl = '';
    $tbl_header = '<table id="gallerytab"  cellspacing="0" cellpadding="0"   border="0.5" align="center">
    <tr>
    <th><font face="Arial, Helvetica, sans-serif">LINEA</font></th>
    <th><font face="Arial, Helvetica, sans-serif">CORTE</font></th>
    <th><font face="Arial, Helvetica, sans-serif">N° MINUTOS Y/O DATOS</font></th>
    <th><font face="Arial, Helvetica, sans-serif">DEPÓSITO</font></th>
    <th><font face="Arial, Helvetica, sans-serif">$PLAN</font></th>
    </tr>
    ';

    $tbl_footer = '</table>';
    $tbl = '';
    $total = 0;
    $total1=0;
    $totallineas=sizeof($value);
    if(sizeof($value)<=9) {
    foreach ($value as $value2) {
        $total += $value2['his_cargobasico'];
        if ($key == $value2['cli_id']) {
            $tbl .= '
<tr>
    <td>' . $value2['lin_numero'] . '</td>
    <td>' . $value2['lin_corte'] . '</td>
    <td>' . $value2['pla_totalmin'] . ' - ' . $value2['dat_nombre'] . '</td>
    <td></td>
    <td>$ ' . $value2['his_cargobasico'] . '</td>
</tr>
        ';
        }           // output the HTML content


    }
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}
    else
    {

        foreach($value as $value2)
        {
            $total+=$value2['his_cargobasico'];
        }

        $tbl .= '
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
        ';
    }

    //bloque de observaciones y total

    $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0.5">';
    $tbl_footer = '</table>';
    $tbl = '';

    $tbl_header = '<table cellspacing="0" cellpadding="1" border="0.5" align="center" >

    <tr>
    <th><font face="Arial, Helvetica, sans-serif">Obervaciones</font></th>
    <th><font face="Arial, Helvetica, sans-serif">Total</font></th>

    </tr>
    ';

    $tbl_footer = '</table>';
    $tbl = '';


    $tbl .= '
<tr>
    <td>Al corte usted tiene ' . $totallineas . ' líneas</td>
    <td>$ ' . $total . '</td>

</tr>
        ';

    // output the HTML content
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
    //bloque condiciones y restricciones
    $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0.5">';
    $tbl_footer = '</table>';
    $tbl = '';

    $tbl_header = '<table cellspacing="0" cellpadding="1" border="0.5" align="center" >

    <tr>
    <th><font face="Arial, Helvetica, sans-serif">Condiciones y restricciones</font></th>
    </tr>
    ';

    $tbl_footer = '</table>';
    $tbl = '';


    $tbl .= '
<tr>
    <td align="justify"><h6>No se puede llamar al #301 para consulta de saldo, si necesita una consulta adicional debe comunicarse a la empresa y se le suministrará el consumo,
    * Es responsabilidad del cliente anunciar la devolución de la sim antes de la fecha de corte * No se permite llamadas de larga distancia, llamadas pra adultos,
     esotéricas, concursos, consursos, donaciones, 113, 117, números especiales o suscripciones de la linea por internet * Todos los cobros adicionales que se generen
     en la factura en el periodo que el cliente permanezca con la sim, es responsabilidad del mismo y deberá pagarlos en su totalidad. Así los costos de envío
     y devolución de la sim deberán ser asumidos por el cliente * La pérdida o robo de la sim debe ser reportada inmediatamente a la empresa la cual tiene un plazo
     de 24 horas hábiles para la reposición de la misma y tiene un costo que debe cancelar el cliente.</h6></td>

</tr>
        ';

    // output the HTML content
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
    // bloque de firmas
    $tbl_header = '<table  cellspacing="0" cellpadding="1" border="0">';
    $tbl_footer = '</table>';
    $tbl = '';

    $tbl_header = '<table cellspacing="0" cellpadding="1" border="0" align="center">

    <tr>
    <th><font face="Arial, Helvetica, sans-serif">__________________________</font></th>
    <th><font face="Arial, Helvetica, sans-serif">___________________________</font></th>
    </tr>
    ';

    $tbl_footer = '</table>';
    $tbl = '';


    $tbl .= '
<tr>
    <td>Firma del cliente</td>
    <td>Firma minuto para todos</td>
</tr>
        ';

    // output the HTML content
    $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

}

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0 , '15', '40', $final, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.

    $pdf->Output('Factura_de_corte.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php *///============================================================*