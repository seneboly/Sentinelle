<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Renseignement traitement : {{$reclamation->code_reclamation}}</title>
  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Lato:400);

    /* Take care of image borders and formatting */

    img {
      max-width: 600px;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    a {
      text-decoration: none;
      border: 0;
      outline: none;
    }

    a img {
      border: none;
    }

    /* General styling */

    td, h1, h2, h3  {
      font-family: Helvetica, Arial, sans-serif;
      font-weight: 400;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%;
      height: 100%;
      color: #37302d;
      background: #ffffff;
    }

     table {
      border-collapse: collapse !important;
    }


    h1, h2, h3 {
      padding: 0;
      margin: 0;
      color: #ffffff;
      font-weight: 400;
    }

    h3 {
      color: #21c5ba;
      font-size: 24px;
    }

    .important-font {
      color: #dc3545;
      font-size:12px;
      font-weight: bold;
    }

    .hide {
      display: none !important;
    }

    .force-full-width {
      width: 100% !important;
    }
  </style>

  <style type="text/css" media="screen">
    @media screen {
       /* Thanks Outlook 2013! http://goo.gl/XLxpyl*/
      td, h1, h2, h3 {
        font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
      }
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {
      table[class="w320"] {
        width: 320px !important;
      }

      table[class="w300"] {
        width: 300px !important;
      }

      table[class="w290"] {
        width: 290px !important;
      }

      td[class="w320"] {
        width: 320px !important;
      }

      td[class="mobile-center"] {
        text-align: center !important;
      }

      td[class="mobile-padding"] {
        padding-left: 20px !important;
        padding-right: 20px !important;
        padding-bottom: 20px !important;
      }

      td[class="mobile-block"] {
        display: block !important;
        width: 100% !important;
        text-align: left !important;
        padding-bottom: 20px !important;
      }

      td[class="mobile-border"] {
        border: 0 !important;
      }

      td[class*="reveal"] {
        display: block !important;
      }
    }
  </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table width="70%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" width="100%">
<table style="width: 70%;" width="70%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-bottom: 2px solid #000000; width: 100%;" width="70%">&nbsp;</td>
</tr>
<tr>
<td style="width: 100%;" valign="top" bgcolor="#dc3545"><!-- [if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:303px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/kmlo6MonRpWsVuuM47EG" color="#8b8284" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
<div><center>
<table class="w320" style="width: 530px;" width="530" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="vertical-align: middle; padding-right: 15px; padding-left: 15px; text-align: left; width: 500px;" valign="middle" height="100">
<table style="height: 100px; width: 107.8%;" width="398" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<h5 style="margin-top: 20px;"><font color="#ffffff">Bonjour,</font></h5>
<h5><font color="#ffffff">La r&eacute;clamation : {{$reclamation->code_reclamation}} vient d'&ecirc;tre renseign&eacute;e !</font></h5>
</td>
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="hide reveal" style="width: 0%;">&nbsp;</td>
<td style="width: 100%;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center></div>
<!-- [if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]--></td>
</tr>
<tr>
<td style="width: 100%;" valign="top"><center>
<table class="w320" width="500" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="border-bottom: 1px solid #a1a1a1;" valign="top">
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="mobile-padding" style="padding: 30px 0;">
<table class="force-full-width" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="text-align: left;"><span class="important-font" style="color: #dc3545 !important;">Nom client<br /></span> {{$reclamation->client->nom_client}} <br /><br /></td>
<td style="text-align: right; vertical-align: top;"><span class="important-font"> Nom du CCL<br /></span> {{$reclamation->user->name}}</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="mobile-padding" style="padding-bottom: 30px;">
<table class="force-full-width" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="mobile-block" width="33%">
<table class="force-full-width" style="border-collapse: collapse;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="mobile-border" style="background-color: #dc3545; color: #ffffff; padding: 5px; border-right: 3px solid #ffffff;">Code client</td>
</tr>
<tr>
<td style="background-color: #000; color: #fff; padding: 8px; border-top: 3px solid #ffffff;">{{$reclamation->client->code_client}}</td>
</tr>
</tbody>
</table>
</td>
<td class="mobile-block" width="33%">
<table class="force-full-width" style="width: 0px; height: 67px;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #dc3545; color: #ffffff; padding: 5px; border-right: 3px solid #ffffff; width: 78px;">Num&eacute;ro compte</td>
</tr>
<tr>
<td style="background-color: #000; color: #fff; padding: 8px; border-top: 3px solid #ffffff; width: 78px;">{{$reclamation->client->numero_compte}}</td>
</tr>
</tbody>
</table>
</td>
<td class="mobile-block" width="38%">
<table class="force-full-width" style="width: 0px; height: 38px;" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 19px;">
<td style="background-color: #dc3545; color: #ffffff; padding: 5px; width: 200px; height: 19px;">Date r&eacute;ception SGBS</td>
<td style="background-color: #dc3545; color: #ffffff; padding: 5px; width: 6px; height: 19px;">&nbsp;</td>
</tr>
<tr style="height: 19px;">
<td style="background-color: #000000; color: #ffffff; padding: 8px; border-top: 3px solid #ffffff; width: 157px; height: 19px;">@date($reclamation->date_reception_sgbs)</td>
<td style="background-color: #000000; color: #ffffff; padding: 8px; border-top: 3px solid #ffffff; width: 0px; height: 19px;">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="mobile-padding">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class="w320" width="500" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="mobile-padding" style="text-align: left;"><br />&nbsp;Pour avoir plus d'information sur cette r&eacute;clamation cliquer sur le lien suivant :&nbsp; <a style="color: #dc3545;" href="{{route('reclamations.edit', $reclamation)}}">voir r&eacute;clamation</a>. <br /><br />Cordialement,<br /><br /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center></td>
</tr>
<tr>
<td style="background-color: #dc3545; width: 100%;"><center>
<table class="w320" width="500" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
</center></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</body>
</html>