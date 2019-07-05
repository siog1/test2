<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
include './main_function.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';
require './phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
//require 'vendor/autoload.php';


  $lname = htmlentities($_POST['nom']);
  $fname = htmlentities($_POST['prenom']);
  $email = htmlentities($_POST['mail']);
  $imgid = $_POST['img_radios'];
  // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
  function create_login ($firstname, $lastname) {
      $firstnamelog = strtolower($firstname);
      $lastnamelog = strtolower($lastname);
      $create_login = $lastnamelog[0].substr($firstnamelog, 0, 3);
      return $create_login;
  }
    $create_login = create_login($fname,$lname);

  if(!empty($create_login)) {
    //On utilise alors notre fonction password_hash :
    $hash = password_hash($create_login, PASSWORD_DEFAULT);
    //Puis on stock le résultat dans la base de données :
    $query = $pdo->prepare('INSERT INTO users (firstname, lastname, password, mail, img) VALUES (?,?,?,?,?)');
    $query->execute(array($fname,$lname,$hash,$email,$imgid));

    $confirm = $pdo->prepare('SELECT * FROM users WHERE lastname = ?');
    $confirm->execute(array($lname));
    $valid = $confirm->rowCount();

    if($valid > 0) {
        header('Location: login.php');
    } else {
        echo "erreur inscription";
    }
  }


$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail10.lwspanel.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'world-of-sio@katmakov.com';                 // SMTP username
    $mail->Password = 'dD9_JJCh7g';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('world-of-sio@katmakov.com', 'World of SIO');
    $mail->addAddress($email, 'User');     // Add a recipient  igorwot39@gmail.com
//    $mail->addReplyTo();
    //$mail->addCC('coulat.arno21110@gmail.com', 'User');
//    $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Inscription WOS";


//    $bodycorps = "Ceci\r\nest\n\rune\nchaîne\r";
//      nl2br($title);
//    str_replace( "\n", '<br />', $Text );
    $mail->Body=("
    <!DOCTYPE html>
    <html lang=\"fr\" >

    <head>
      <meta charset=\"UTF-8\">
      <title>World Of Sio - Mot de passe</title>

      <style type=\"text/css\">

    /**********************************************
    * Ink v1.0.5 - Copyright 2013 ZURB Inc        *
    **********************************************/

    /* Client-specific Styles & Reset */

    #outlook a {
      padding:0;
    }

    body{
      width:100% !important;
      min-width: 100%;
      -webkit-text-size-adjust:100%;
      -ms-text-size-adjust:100%;
      margin:0;
      padding:0;
    }

    .ExternalClass {
      width:100%;
    }

    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }

    #backgroundTable {
      margin:0;
      padding:0;
      width:100% !important;
      line-height: 100% !important;
    }

    img {
      outline:none;
      text-decoration:none;
      -ms-interpolation-mode: bicubic;
      width: auto;
      max-width: 100%;
      float: left;
      clear: both;
      display: block;
    }

    center {
      width: 100%;
      min-width: 580px;
    }

    a img {
      border: none;
    }

    p {
      margin: 0 0 0 10px;
    }

    table {
      border-spacing: 0;
      border-collapse: collapse;
    }

    td {
      word-break: break-word;
      -webkit-hyphens: auto;
      -moz-hyphens: auto;
      hyphens: auto;
      border-collapse: collapse !important;
    }

    table, tr, td {
      padding: 0;
      vertical-align: top;
      text-align: left;
    }

    hr {
      color: #d9d9d9;
      background-color: #d9d9d9;
      height: 1px;
      border: none;
    }

    /* Responsive Grid */

    table.body {
      height: 100%;
      width: 100%;
    }

    table.container {
      width: 580px;
      margin: 0 auto;
      text-align: inherit;
    }

    table.row {
      padding: 0px;
      width: 100%;
      position: relative;
    }

    table.container table.row {
      display: block;
    }

    td.wrapper {
      padding: 10px 20px 0px 0px;
      position: relative;
    }

    table.columns,
    table.column {
      margin: 0 auto;
    }

    table.columns td,
    table.column td {
      padding: 0px 0px 10px;
    }

    table.columns td.sub-columns,
    table.column td.sub-columns,
    table.columns td.sub-column,
    table.column td.sub-column {
      padding-right: 10px;
    }

    td.sub-column, td.sub-columns {
      min-width: 0px;
    }

    table.row td.last,
    table.container td.last {
      padding-right: 0px;
    }

    table.one { width: 30px; }
    table.two { width: 80px; }
    table.three { width: 130px; }
    table.four { width: 180px; }
    table.five { width: 230px; }
    table.six { width: 280px; }
    table.seven { width: 330px; }
    table.eight { width: 380px; }
    table.nine { width: 430px; }
    table.ten { width: 480px; }
    table.eleven { width: 530px; }
    table.twelve { width: 580px; }

    table.one center { min-width: 30px; }
    table.two center { min-width: 80px; }
    table.three center { min-width: 130px; }
    table.four center { min-width: 180px; }
    table.five center { min-width: 230px; }
    table.six center { min-width: 280px; }
    table.seven center { min-width: 330px; }
    table.eight center { min-width: 380px; }
    table.nine center { min-width: 430px; }
    table.ten center { min-width: 480px; }
    table.eleven center { min-width: 530px; }
    table.twelve center { min-width: 580px; }

    table.one .panel center { min-width: 10px; }
    table.two .panel center { min-width: 60px; }
    table.three .panel center { min-width: 110px; }
    table.four .panel center { min-width: 160px; }
    table.five .panel center { min-width: 210px; }
    table.six .panel center { min-width: 260px; }
    table.seven .panel center { min-width: 310px; }
    table.eight .panel center { min-width: 360px; }
    table.nine .panel center { min-width: 410px; }
    table.ten .panel center { min-width: 460px; }
    table.eleven .panel center { min-width: 510px; }
    table.twelve .panel center { min-width: 560px; }

    .body .columns td.one,
    .body .column td.one { width: 8.333333%; }
    .body .columns td.two,
    .body .column td.two { width: 16.666666%; }
    .body .columns td.three,
    .body .column td.three { width: 25%; }
    .body .columns td.four,
    .body .column td.four { width: 33.333333%; }
    .body .columns td.five,
    .body .column td.five { width: 41.666666%; }
    .body .columns td.six,
    .body .column td.six { width: 50%; }
    .body .columns td.seven,
    .body .column td.seven { width: 58.333333%; }
    .body .columns td.eight,
    .body .column td.eight { width: 66.666666%; }
    .body .columns td.nine,
    .body .column td.nine { width: 75%; }
    .body .columns td.ten,
    .body .column td.ten { width: 83.333333%; }
    .body .columns td.eleven,
    .body .column td.eleven { width: 91.666666%; }
    .body .columns td.twelve,
    .body .column td.twelve { width: 100%; }

    td.offset-by-one { padding-left: 50px; }
    td.offset-by-two { padding-left: 100px; }
    td.offset-by-three { padding-left: 150px; }
    td.offset-by-four { padding-left: 200px; }
    td.offset-by-five { padding-left: 250px; }
    td.offset-by-six { padding-left: 300px; }
    td.offset-by-seven { padding-left: 350px; }
    td.offset-by-eight { padding-left: 400px; }
    td.offset-by-nine { padding-left: 450px; }
    td.offset-by-ten { padding-left: 500px; }
    td.offset-by-eleven { padding-left: 550px; }

    td.expander {
      visibility: hidden;
      width: 0px;
      padding: 0 !important;
    }

    table.columns .text-pad,
    table.column .text-pad {
      padding-left: 10px;
      padding-right: 10px;
    }

    table.columns .left-text-pad,
    table.columns .text-pad-left,
    table.column .left-text-pad,
    table.column .text-pad-left {
      padding-left: 10px;
    }

    table.columns .right-text-pad,
    table.columns .text-pad-right,
    table.column .right-text-pad,
    table.column .text-pad-right {
      padding-right: 10px;
    }

    /* Block Grid */

    .block-grid {
      width: 100%;
      max-width: 580px;
    }

    .block-grid td {
      display: inline-block;
      padding:10px;
    }

    .two-up td {
      width:270px;
    }

    .three-up td {
      width:173px;
    }

    .four-up td {
      width:125px;
    }

    .five-up td {
      width:96px;
    }

    .six-up td {
      width:76px;
    }

    .seven-up td {
      width:62px;
    }

    .eight-up td {
      width:52px;
    }

    /* Alignment & Visibility Classes */

    table.center, td.center {
      text-align: center;
    }

    h1.center,
    h2.center,
    h3.center,
    h4.center,
    h5.center,
    h6.center {
      text-align: center;
    }

    span.center {
      display: block;
      width: 100%;
      text-align: center;
    }

    img.center {
      margin: 0 auto;
      float: none;
    }

    .show-for-small,
    .hide-for-desktop {
      display: none;
    }

    /* Typography */

    body, table.body, h1, h2, h3, h4, h5, h6, p, td {
      color: #222222;
      font-family: \"Helvetica\", \"Arial\", sans-serif;
      font-weight: normal;
      padding:0;
      margin: 0;
      text-align: left;
      line-height: 1.3;
    }

    h1, h2, h3, h4, h5, h6 {
      word-break: normal;
    }

    h1 {font-size: 40px;}
    h2 {font-size: 36px;}
    h3 {font-size: 32px;}
    h4 {font-size: 28px;}
    h5 {font-size: 24px;}
    h6 {font-size: 20px;}
    body, table.body, p, td {font-size: 14px;line-height:19px;}

    p.lead, p.lede, p.leed {
      font-size: 18px;
      line-height:21px;
    }

    p {
      margin-bottom: 10px;
    }

    small {
      font-size: 10px;
    }

    a {
      color: #2ba6cb;
      text-decoration: none;
    }

    a:hover {
      color: #2795b6 !important;
    }

    a:active {
      color: #2795b6 !important;
    }

    a:visited {
      color: #2ba6cb !important;
    }

    h1 a,
    h2 a,
    h3 a,
    h4 a,
    h5 a,
    h6 a {
      color: #2ba6cb;
    }

    h1 a:active,
    h2 a:active,
    h3 a:active,
    h4 a:active,
    h5 a:active,
    h6 a:active {
      color: #2ba6cb !important;
    }

    h1 a:visited,
    h2 a:visited,
    h3 a:visited,
    h4 a:visited,
    h5 a:visited,
    h6 a:visited {
      color: #2ba6cb !important;
    }

    /* Panels */

    .panel {
      background: #f2f2f2;
      border: 1px solid #d9d9d9;
      padding: 10px !important;
    }

    .sub-grid table {
      width: 100%;
    }

    .sub-grid td.sub-columns {
      padding-bottom: 0;
    }

    /* Buttons */

    table.button,
    table.tiny-button,
    table.small-button,
    table.medium-button,
    table.large-button {
      width: 100%;
      overflow: hidden;
    }

    table.button td,
    table.tiny-button td,
    table.small-button td,
    table.medium-button td,
    table.large-button td {
      display: block;
      width: auto !important;
      text-align: center;
      background: #2ba6cb;
      border: 1px solid #2284a1;
      color: #ffffff;
      padding: 8px 0;
    }

    table.tiny-button td {
      padding: 5px 0 4px;
    }

    table.small-button td {
      padding: 8px 0 7px;
    }

    table.medium-button td {
      padding: 12px 0 10px;
    }

    table.large-button td {
      padding: 21px 0 18px;
    }

    table.button td a,
    table.tiny-button td a,
    table.small-button td a,
    table.medium-button td a,
    table.large-button td a {
      font-weight: bold;
      text-decoration: none;
      font-family: Helvetica, Arial, sans-serif;
      color: #ffffff;
      font-size: 16px;
    }

    table.tiny-button td a {
      font-size: 12px;
      font-weight: normal;
    }

    table.small-button td a {
      font-size: 16px;
    }

    table.medium-button td a {
      font-size: 20px;
    }

    table.large-button td a {
      font-size: 24px;
    }

    table.button:hover td,
    table.button:visited td,
    table.button:active td {
      background: #2795b6 !important;
    }

    table.button:hover td a,
    table.button:visited td a,
    table.button:active td a {
      color: #fff !important;
    }

    table.button:hover td,
    table.tiny-button:hover td,
    table.small-button:hover td,
    table.medium-button:hover td,
    table.large-button:hover td {
      background: #2795b6 !important;
    }

    table.button:hover td a,
    table.button:active td a,
    table.button td a:visited,
    table.tiny-button:hover td a,
    table.tiny-button:active td a,
    table.tiny-button td a:visited,
    table.small-button:hover td a,
    table.small-button:active td a,
    table.small-button td a:visited,
    table.medium-button:hover td a,
    table.medium-button:active td a,
    table.medium-button td a:visited,
    table.large-button:hover td a,
    table.large-button:active td a,
    table.large-button td a:visited {
      color: #ffffff !important;
    }

    table.secondary td {
      background: #e9e9e9;
      border-color: #d0d0d0;
      color: #555;
    }

    table.secondary td a {
      color: #555;
    }

    table.secondary:hover td {
      background: #d0d0d0 !important;
      color: #555;
    }

    table.secondary:hover td a,
    table.secondary td a:visited,
    table.secondary:active td a {
      color: #555 !important;
    }

    table.success td {
      background: #5da423;
      border-color: #457a1a;
    }

    table.success:hover td {
      background: #457a1a !important;
    }

    table.alert td {
      background: #c60f13;
      border-color: #970b0e;
    }

    table.alert:hover td {
      background: #970b0e !important;
    }

    table.radius td {
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
    }

    table.round td {
      -webkit-border-radius: 500px;
      -moz-border-radius: 500px;
      border-radius: 500px;
    }

    /* Outlook First */

    body.outlook p {
      display: inline !important;
    }

    /*  Media Queries */

    @media only screen and (max-width: 600px) {

      table[class=\"body\"] img {
        width: auto !important;
        height: auto !important;
      }

      table[class=\"body\"] center {
        min-width: 0 !important;
      }

      table[class=\"body\"] .container {
        width: 95% !important;
      }

      table[class=\"body\"] .row {
        width: 100% !important;
        display: block !important;
      }

      table[class=\"body\"] .wrapper {
        display: block !important;
        padding-right: 0 !important;
      }

      table[class=\"body\"] .columns,
      table[class=\"body\"] .column {
        table-layout: fixed !important;
        float: none !important;
        width: 100% !important;
        padding-right: 0px !important;
        padding-left: 0px !important;
        display: block !important;
      }

      table[class=\"body\"] .wrapper.first .columns,
      table[class=\"body\"] .wrapper.first .column {
        display: table !important;
      }

      table[class=\"body\"] table.columns td,
      table[class=\"body\"] table.column td {
        width: 100% !important;
      }

      table[class=\"body\"] .columns td.one,
      table[class=\"body\"] .column td.one { width: 8.333333% !important; }
      table[class=\"body\"] .columns td.two,
      table[class=\"body\"] .column td.two { width: 16.666666% !important; }
      table[class=\"body\"] .columns td.three,
      table[class=\"body\"] .column td.three { width: 25% !important; }
      table[class=\"body\"] .columns td.four,
      table[class=\"body\"] .column td.four { width: 33.333333% !important; }
      table[class=\"body\"] .columns td.five,
      table[class=\"body\"] .column td.five { width: 41.666666% !important; }
      table[class=\"body\"] .columns td.six,
      table[class=\"body\"] .column td.six { width: 50% !important; }
      table[class=\"body\"] .columns td.seven,
      table[class=\"body\"] .column td.seven { width: 58.333333% !important; }
      table[class=\"body\"] .columns td.eight,
      table[class=\"body\"] .column td.eight { width: 66.666666% !important; }
      table[class=\"body\"] .columns td.nine,
      table[class=\"body\"] .column td.nine { width: 75% !important; }
      table[class=\"body\"] .columns td.ten,
      table[class=\"body\"] .column td.ten { width: 83.333333% !important; }
      table[class=\"body\"] .columns td.eleven,
      table[class=\"body\"] .column td.eleven { width: 91.666666% !important; }
      table[class=\"body\"] .columns td.twelve,
      table[class=\"body\"] .column td.twelve { width: 100% !important; }

      table[class=\"body\"] td.offset-by-one,
      table[class=\"body\"] td.offset-by-two,
      table[class=\"body\"] td.offset-by-three,
      table[class=\"body\"] td.offset-by-four,
      table[class=\"body\"] td.offset-by-five,
      table[class=\"body\"] td.offset-by-six,
      table[class=\"body\"] td.offset-by-seven,
      table[class=\"body\"] td.offset-by-eight,
      table[class=\"body\"] td.offset-by-nine,
      table[class=\"body\"] td.offset-by-ten,
      table[class=\"body\"] td.offset-by-eleven {
        padding-left: 0 !important;
      }

      table[class=\"body\"] table.columns td.expander {
        width: 1px !important;
      }

      table[class=\"body\"] .right-text-pad,
      table[class=\"body\"] .text-pad-right {
        padding-left: 10px !important;
      }

      table[class=\"body\"] .left-text-pad,
      table[class=\"body\"] .text-pad-left {
        padding-right: 10px !important;
      }

      table[class=\"body\"] .hide-for-small,
      table[class=\"body\"] .show-for-desktop {
        display: none !important;
      }

      table[class=\"body\"] .show-for-small,
      table[class=\"body\"] .hide-for-desktop {
        display: inherit !important;
      }
    }

      </style>

      <style type=\"text/css\">
    body {
      background-color: #ffffff;
      font-family: san-sarif;
    }

    .container {
      /*background-color: pink;*/
    }

    table.logo td {
      padding: 0;
    }

    .logo {
      display: block;
      margin: 0 auto !important;
    }

    .confirmation {
      background-color: #e1e1e1;
    }

    table.confirmation td {
      padding: 0;
    }

    table.confirmation p {
      text-transform: uppercase;
      color: #464545;
      text-align: center;
      padding: 10px 0;
      margin-bottom: 0;
    }

    table.trackorder td {
      padding: 0;
    }

    .trackorder p {
      text-transform: uppercase;
      text-align: center;
      padding-left: 40px;
      padding-right: 40px;
      padding-top: 20px;
      font-size: 1.1em;
    }

    table.trackorder-cta td {
      padding: 0;
      padding-bottom: 10px;
      padding-top: 5px;
    }

    .trackorder-cta {
      /*background-color: orange;*/
    }

    .customer-details {
      padding: 0;
    }

    table.customer-details td {
      background-color: #e1e1e1;
    }

    .btn-adonit {
      background-color: #ffffff;
      border: 1px solid #5c5c5c;
      border-radius: 0px;
      color: #5d5c5c;
      display: inline-block;
      font-family: sans-serif;
      font-size: 13px;
      font-weight: bold;
      line-height: 40px;
      text-align: center;
      text-decoration: none;
      width: 300px;
      -webkit-text-size-adjust: none;
      mso-hide: all;
      text-transform: uppercase;
    }

    .shipping-info {
      text-transform: uppercase;
      color: #464545;
      background: none;
      padding: 20px 40px !important;
    }

    .shipping-info img{
      float: right !important;
      padding-right: 40px;
    }

    table.order-details td {
      background-color: #ffffff;
    }

    table.cta-panels td {
      padding: 0;
    }

    .order-info {
      text-transform: uppercase;
      font-size: 13px;
      color: #464545;
      background: none;
      padding: 25px 50px !important;
    }

    .p-checkout {
      text-transform: uppercase;
      color: #ffffff;
      text-align: center;
      background: #b98893;
      padding: 25px 50px !important;
    }

    .p-watch {
      text-transform: uppercase;
      color: #ffffff;
      text-align: center;
      background: #a8bdbb;
      padding: 25px 50px !important;
    }

    .p-read {
      text-transform: uppercase;
      color: #ffffff;
      text-align: center;
      background: #c3ac89;
      padding: 25px 50px !important;
    }

    .social-icons {
      background-color: #e1e1e1
    }

    table.social-icons img {
      padding: 15px;
    }

    table.four {
      width: 100%;
    }

    table.social-icons td {
      padding: 0;
    }

    table.contact-info td {
      padding-top:10px;
      padding-left: 20px;
      padding-right: 20px;
    }

    table.contact-info p {
      font-size: .8em;
      text-align: center;
      color: #464545;
      text-transform: uppercase;
    }

      </style>


    </head>

    <body>

      <table class=\"body\">
      <tr>
        <td class=\"center\" align=\"center\" valign=\"top\">
          <center>
                <table class=\"row\">
                    <tr>
                      <td class=\"wrapper last\">

                        <!-- logo area -->

                        <table class=\"twelve columns logo\">
                          <tr>
                            <td>
                            <center>
                              <a href=\"http://world-of-sio.katmakov.com/\" target=\"_blank\">
                                <img src=\"https://world-of-sio.katmakov.com/assets/img/logo-dark.svg\" width=\"80\" height=\"80\" align=\"right\" class=\"center\" style=\"width:10s0px !important;height:100px !important\" alt=\"WoF Logo\"/>
                              </a>
                              </center>
                            </td>
                            <td class=\"expander\"></td>
                          </tr>
                        </table>

                      </td>
                    </tr>
                  </table>

            <!-- Track your order button -->

            <table class=\"container trackorder\">
              <tr>
                <td class=\"row\">
                  <table class=\"wrapper\">
                    <tr>
                      <td>
                        <p>
                          Confirmation d’inscription,<br /><br />
                          Bienvenue ".$fname." ".$lname.",<br />
                          vous venez de vous inscrire sur <strong>World Of Sio</strong>.<br />
                          Merci de votre confiance voici votre mot de passe. <br />
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- Track your order button -->

             <table class=\"row trackorder-cta\">
                    <tr>
                      <td class=\"wrapper last\">

                        <!--Check it out!-->

                        <table class=\"twelve columns\">
                          <tr>
                            <td>
                            <center>
                    <!--[if mso]>
    <v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"http://\" style=\"height:40px;v-text-anchor:middle;width:300px;\" arcsize=\"0%\" strokecolor=\"##5d5c5\" fillcolor=\"#ffffff\">
      <w:anchorlock/>
      <center style=\"color:#5d5c5c;font-family:sans-serif;font-size:13px;font-weight:bold;\">TRACK YOUR ORDER</center>
    </v:roundrect>
    <![endif]-->
                            <a class=\"center btn-adonit\" href=\"https://world-of-sio.katmakov.com/view/login.php\">".$create_login."</a></center>
                            </td>
                            <td class=\"expander\"></td>
                          </tr>
                        </table>

                      </td>
                    </tr>
                  </table>

               <table class=\"container contact-info\">
                <tr>
                  <td>
                    <p>
                      Si vous n'êtes pas à l'origine de cette inscription, il se peut que quelqu'un d'autre ait récemment utilisé votre adresse mail. Contactez nous pour vous désinscrire.
                      <br />
                      Merci.
                    </p>
                  </td>
                </tr>
              </table>

          </center>
        </td>
      </tr>
    </table>

    </body>

    </html>");
    $mail->send();
    echo '<meta http-equiv="refresh" content="0;URL='.$url.'/view/login.php">';
}catch(Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
