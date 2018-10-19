<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http:8080/public/pdf/bootstrap/css/bootstrap.css" />
    <title>Comprobante de pago</title>
</head>

<body>

    <style>
        .marco {
            border: 1px solid #333;
        }

        .visual {
            width: 100%;
            text-align: center;
            padding: 5px;
        }

        .rCalif {
            width: 24.7%;
        }

        .alineados: {
            vertical-align: top;
            display: inline-block;
        }
    </style>



    <div width="100%" style="margin:0;padding:0;display:none; display:none !important; color:#fff;">

        {{$list_facturas['fecha_emision']}}
        Transaction ID:{{$list_facturas['token']}}
    </div>
    <div class="logo img alineados">
        <table border="0" cellpadding="0" cellspacing="0" contenteditable="false" style="margin-bottom:10px;" width="100%">
            <tbody>
                <tr valign="bottom">
                    <td width="20" align="center" valign="top">&nbsp;</td>
                    <td align="left" height="64">
                        <img alt="paypal" style="width:113px; height:46px;" width="113" height="46" border="0" src="https://i0.wp.com/www.criptonoticias.com/wp-content/uploads/2017/06/Bitcoin-Logotipo.png?fit=610%2C128&ssl=1">
                    </td>
                    <td width="40" align="center" valign="top">&nbsp;</td>
                    <td align="right">
                        <span style="padding-top:15px; padding-bottom:10px; font:italic 12px; Calibri, Trebuchet, Arial, sans serif; color: #757575;line-height:15px;">
                            <!-- EmailContentHeader : start -->

                            <span style="display:inline;">
                                {{$list_facturas['fecha_emision']}}
                            </span>


                            <span style="display:inline;">

                                <span style="display:inline;">
                                    <br>
                                    Transaction ID: <a href="https://www.paypal.com/myaccount/transaction/details/9VR848197Y315841N?v=0.1&amp;ppid=PPX001066&amp;cnac=US&amp;rsta=en_US(en_US)&amp;cust=3X595708HN166880T&amp;unptid=f0a903ea-d300-11e8-ae52-d48564436370&amp;t=&amp;cal=276a1d5debf5&amp;calc=276a1d5debf5&amp;calf=276a1d5debf5&amp;unp_tpcid=email-receipt-xclick-payment&amp;page=main:email&amp;pgrp=main:email&amp;e=op&amp;mchn=em&amp;s=ci&amp;mail=sys"
                                        style="text-decoration:none;" target="_BLANK">
                                        {{$list_facturas['token']}}&nbsp;</a>
                                </span>

                            </span>

                            <!-- EmailContentHeader : end -->
                        </span>
                    </td>
                    <td width="20" align="center" valign="top">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="datos-per alineados">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="marginFix">
        <!-- GRAY BACKGROUND -->
        <tbody>
            <tr>
                <td bgcolor="#f2f2f2" class="mobMargin" style="font-size:0px;">&nbsp;</td>
                <td bgcolor="#ffffff" width="660" align="center" class="mobContent">
                    <!-- inner container / place all modules below -->
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <!-- BEGIN MAIN CONTENT -->
                        <tbody>
                            <tr>
                                <td align="center" width="100%" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr class="no_mobile_phone">
                                                <td bgcolor="#f2f2f2" style="padding-top:10px;"></td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#f2f2f2" style="padding-top:10px;"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top" bgcolor="#ffffff">
                                                    <!-- PLACE ALL MODS BELOW -->
                                                    <!-- PayPal logo - start -->

                                                    <!-- PayPal logo - start -->
                                                    <!-- body - start -->
                                                    <table border="0" cellpadding="0" cellspacing="0" contenteditable="false"
                                                        style="margin-bottom: 10px;" width="100%">
                                                        <tbody>
                                                            <tr valign="bottom">
                                                                <td width="20" align="center" valign="top">&nbsp;</td>
                                                                <td valign="top" style="font-family:Calibri, Trebuchet, Arial, sans serif; font-size:15px; line-height:22px; color:#333333;"
                                                                    class="ppsans">
                                                                    <!-- EmailGreeting : start -->
                                                                    <!-- EmailGreeting : end -->
                                                                    <div style="color:#333 !important;font-family: arial,helvetica,sans-serif;font-size:12px;"><span
                                                                            style="color:#333333 !important;font-weight:bold;font-family: arial,helvetica,sans-serif;">Hola
                                                                            {{$nombres}},</span><br>
                                                                        <p style="font-size:14px;color:#C88039;font-weight:bold;text-decoration:none;">Se realizó el pago de
                                                                            {{$list_facturas['monto_bruto']}} a la tienda Cryptoperu<br></p>


                                                                            <div>
                                                                            </div>
                                                                            <table align="center" border="0"
                                                                                cellpadding="0" cellspacing="0" class="CartTable"
                                                                                contenteditable="false" style="clear:both;color:#666666 !important;font-family: arial,helvetica,sans-serif;font-size:11px;margin-top:20px;"
                                                                                width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            <b>Descripción</b>
                                                                                        </td>
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            <b>Precio unitario</b>
                                                                                        </td>
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            <b>Cantidad</b>
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr >
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            {{$list_facturas['tipo_cripto']}}
                                                                                            <br>
                                                                                        </td>
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            <span style="display: inline;">
                                                                                                {{$list_facturas['monto_bruto']}}
                                                                                            </span>
                                                                                        </td>
                                                                                        <td style="border-bottom:1px dashed #ccc;">
                                                                                            {{$list_facturas['cant_cripto']}}
                                                                                        </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <span style="display:inline;">
                                                                            </span>
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0" contenteditable="false"
                                                                                style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;clear:both;color:#666666 !important;font-family: arial,helvetica,sans-serif;font-size:11px;"
                                                                                width="100%">

                                                                                <tbody>
                                                                                    <tr>


                                                                                        <td>
                                                                                            <span style="display:inline;">

                                                                                            </span>
                                                                                            <table align="right" border="0"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0"
                                                                                                contenteditable="false"
                                                                                                style="color:#666666 !important;font-family: arial,helvetica,sans-serif;font-size:11px;margin-top: 20px;clear:both; width:100%">

                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="width:115%;text-align:right; ">
                                                                                                            <span style="color:#333333 !important;font-weight:bold;">
                                                                                                                Subtotal
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td >

                                                                                                            {{$list_facturas['monto_bruto']*(0.82)}}
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td style="width:115%;text-align:right;">
                                                                                                            <span style="color:#333333 !important;font-weight:bold;">
                                                                                                                IGV
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td >


                                                                                                            <span style="display: inline;">
                                                                                                                {{$list_facturas['igv']}}
                                                                                                            </span>

                                                                                                        </td>
                                                                                                    </tr>


                                                                                                    <tr>
                                                                                                        <td style="width:115%;text-align:right;">
                                                                                                            <span style="color:#333333 !important;font-weight:bold;">
                                                                                                                <b>Total</b>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td >



                                                                                                                <b>{{$list_facturas['monto_bruto']}}</b>


                                                                                                        </td>
                                                                                                    </tr>


                                                                                                    <tr>
                                                                                                        <td colspan="2"
                                                                                                            style="width:100%;text-align:left; padding:10px 10px 10px 0;">
                                                                                                            Pago enviado a
                                                                                                            <b>Cryptoperu</b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2"
                                                                                                            style="width:100%;text-align:right; padding:10px 10px 10px 0;">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                            </table>
                                                                            <!-- EmailContentPayerTransaction : end -->
                                                                        </span><br>
                                                                    </div>
                                                                </td>
                                                                <td width="20" align="center" valign="top">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- body - end -->
                                                    <!-- PLACE ALL MODS ABOVE -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <!-- END MAIN CONTENT -->
                            </tr>
                        </tbody>
                    </table>
                    <!-- end inner container / place all modules above -->
                    <!--  footer modules -->

                </td>
                <td bgcolor="#f2f2f2" class="mobMargin" style="font-size:0px;">&nbsp;</td>
            </tr>
            <!-- END GRAY BACKGROUND -->
        </tbody>
    </table>
    <!-- END CONTAINER -->

</div>
</body>

</html>