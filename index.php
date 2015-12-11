<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" data-find="_13">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Soluciones Avanzadas Informáticas y Telecomunicaciones SAITEL, es una empresa que fue creada con el fin principal de brindar a la colectividad el servicio de Internet.">
        <meta name="author" content="Romero Giovanni - 0987868133">
        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Saitel-Internet Wireless para todo el Ecuador</title>
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" href="css/components/slideshow.css" />
        <link rel="stylesheet" href="css/components/slidenav.css" />
        <link rel="stylesheet" href="css/components/dotnav.gradient.css" />
        <link rel="stylesheet" href="vendor/highlight/highlight.css" />

        <script src="js/jquery.js"></script>
        <script src="js/uikit.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/components/slideshow.js"></script>
        <script src="js/components/slideshow-fx.js"></script>
        <script src="js/core/grid.min.js"></script>
        <script src="js/core/grid.js"></script>
        <script src="js/facElectronica.js"></script>
        <script src="vendor/highlight/highlight.js"></script>
        <script src="js/components/sticky.js"></script>
        <script async src="//www.google-analytics.com/analytics.js"></script>

    </head>
    <body data-find="_12" style="background-color: rgb(230, 230, 230);">
        <div id="fb-root"></div>
        <!--NAV-->
        <nav class='uk-navbar uk-navbar-attached'>
            <div id="my-id" class='uk-container uk-container-center'>
                <a href="index.php" class='uk-navbar-brand uk-hidden-small'>
                    <img class='uk-margin uk-margin-remove' src="images/logosfondo.png" width="100" height="40" title="Saitel" alt="Saitel">
                </a>
            </div>
        </nav>
        <div style="background-image:url(images/bg.png);" class="tm-middle" data-find="_11">
            <div style="background-image:url(images/3.jpg);"><b class="uk-text-primary">_</b> </div>
            <!--DATOS-->
            <div  style="background-image:url(images/bgcx.png);background-repeat: no-repeat;" class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom" >

            
            <div  class="uk-block uk-contrast uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-slide-top',delay:100,repeat: true}">
            <!--238, 165, 72, 0.9<div class="uk-block uk-contrast uk-scrollspy-init-inview uk-block-primary" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:100,repeat: true}">-->
                <div class="uk-container uk-container-center">
                    <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">

                        </div>
                        <div style="background: rgba(255, 255, 255, 0.4); padding:10px" class="uk-width-medium-1-2">
                            <div class="uk-panel">
                                <h2><b>Facturación Electrónica</b></h2>
                                <p class="uk-text-justify">Ponemos a tu disposición el servicio de FACTURA ELECTRÓNICA, recibe la factura 
                                    mensual de tu servicio directamente a tu correo electrónico y puedes descargar tu factura eletrónica 
                                    desde www.saitel.ec Reduce el tiempo de recepción del estado de cuenta y apoya al medio ambiente en la 
                                    disminución de uso de papel</p>
                                <div class="uk-vertical-align uk-text-center" data-uk-grid-margin>
                                    <div class="uk-vertical-align-middle" >
                                        <form class="uk-panel uk-panel-box uk-form" style="background: rgba(22, 113, 15, 0.4);">
                                            <div class="uk-form-row">
                                                <input class="uk-width-1-1 uk-form-large" type="text" id="cedula" name="cedula" placeholder="Cédula o Ruc">
                                            </div>
                                            <div class="uk-form-row">
                                                <div class="uk-button-group">
                                                    <a class="uk-button uk-button-primary uk-button-large" id="clickCliente" name="clickCliente">Ingresar</a>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" id="datos">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div style="background: rgba(255, 255, 255, 0.4);" class="uk-block uk-contrast uk-scrollspy-init-inview" data-uk-scrollspy="{cls:'uk-animation-slide-top',delay:100,repeat: true}">
            <!--238, 165, 72, 0.9<div class="uk-block uk-contrast uk-scrollspy-init-inview uk-block-primary" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:100,repeat: true}">-->
                <div class="uk-container uk-container-center">
                    <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3><b>AYUDA AL CLIENTE</b></h3>
                                <hr>
                                <a href="../glosarioTerminos.html" class="uk-text-small uk-text-contrast">Glosario de Términos</a><br>
                                <a href="../reclamos.html" class="uk-text-small uk-text-contrast">Reclamos</a><br>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3><b>ENLACES GUBERNAMENTALES</b></h3>
                                <hr>
                                <a href="http://www.sri.gob.ec/" class="uk-text-small uk-text-contrast" target="_blank">SRI</a><br>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel">
                                <h3><b>INFORMACIÓN ADICIONAL</b></h3>
                                <hr>
                                <a href="../mejorar.html" class="uk-text-small uk-text-contrast">Ayudanos a Mejorar</a><br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="uk-container-center uk-width-medium-1-3">
                        <img src="images/logosfondo.png" width="150" height="100">
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=1607266319561188&l=04eab0ede6" data-width="500"></div>-->
    </body>
</html>