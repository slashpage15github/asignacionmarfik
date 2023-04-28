<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignación FS</title>

   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->

    <link href="flipping_cards/css/flipping.css?new" rel="stylesheet"/>
    <link href="flipping_cards/css/card.css?new" rel="stylesheet"/>

    <link href="flipping_cards/css/demopage.css?new" rel="stylesheet">

    <script src="flipping_cards/js/run_prettify.js?autoload=true&amp;lang=css"></script>

    <script src='flipping_cards/src/js/flipping.js?new' type='text/javascript'></script>

    <script src='flipping_cards/js/reconfigure.js?new' type='text/javascript'></script>




    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     
     
    <!-- Custom CSS -->
    <style>
    body {

        /*padding-top: 30px;*/
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }

    </style>





</head>
<body>
<div class="container" style="margin-top: 50px;">
        <?php
        if (!isset($_SESSION['usuario']))
        include('menu_publico.php');
        else
        include('menu_privado.php');
        ?>

         <div class="col-md-3 pull-left">
            <IMG SRC = "images/UAdeC.png" />
        </div>
        <div class="col-md-3 pull-right">
            <IMG SRC = "images/logo.png" />
        </div>
</div>
    <!-- Page Content -->
    <div class="container">

    <section class="row carousel">

        <div id="flipping_cards" class="flipping">

            <div class="btn-backward"></div>

            <div class="cards">
                <div>
                    <!--<h2>Lorem ipsum<br>1</h2>-->
            <span class="readmore"><a href="#" id="link1" onclick="f_work1();" data-toggle="modal" data-target="#work1">Detalle</a></span>
                    <img src="flipping_cards/images/1.jpg"/>
                </div>
                <div>
                    <!--<h2>Lorem ipsum<br>2</h2>-->
                    <span class="readmore"><a href="#" id="link2" onclick="f_work2();" data-toggle="modal" data-target="#work2">Detalle</a></span>
                    <img src="flipping_cards/images/2.jpg"/>
                </div>
                <div>
                    <!--<h2>Lorem ipsum<br>3</h2>-->
                    <span class="readmore"><a href="#" id="link3" onclick="f_work3();" data-toggle="modal" data-target="#work3">Detalle</a></span>
                    <img src="flipping_cards/images/3.jpg"/>
                </div>
                <div>
                    <!--<h2>Lorem ipsum<br>4</h2>-->
                    <span class="readmore"><a href="#" id="link4" onclick="f_work4();" data-toggle="modal" data-target="#work4">Detalle</a></span>
                    <img src="flipping_cards/images/4.jpg"/>
                </div>
                <div>
                    <!--<h2>Lorem ipsum<br>5</h2>-->
                    <span class="readmore"><a href="#" id="link5" onclick="f_work5();" data-toggle="modal" data-target="#work5">Detalle</a></span>
                    <img src="flipping_cards/images/5.jpg"/>
                </div>
                <div>
                    <!--<h2>Lorem ipsum<br>6</h2>-->
                    <span class="readmore"><a href="#" id="link6" onclick="f_work6();" data-toggle="modal" data-target="#work6">Detalle</a></span>
                    <img src="flipping_cards/images/6.jpg"/>
                </div>

                <div>
                    <!--<h2>Lorem ipsum<br>7</h2>-->
                    <span class="readmore"><a href="#" id="link7" onclick="f_work7();" data-toggle="modal" data-target="#work7">Detalle</a></span>
                    <img src="flipping_cards/images/7.jpg"/>
                </div>

                <div>
                    <!--<h2>Lorem ipsum<br>8</h2>-->
                    <span class="readmore"><a href="#" id="link8" onclick="f_work8();" data-toggle="modal" data-target="#work8">Detalle</a></span>
                    <img src="flipping_cards/images/8.jpg"/>
                </div>                                
                

            </div> <!--end cards -->

            <div class="btn-forward"></div>

        </div><!-- end flipping cards -->


        <script>

            document.addEventListener("DOMContentLoaded", function () {

                var configuration = {
                    autoFlipMode: true,
                    autoFlipDelay: 7000,
                    pauseMouseOver: true,

                    cardsShadow: true,
                    buttonsShadow: true,

                    transitionDuration: 700,

                    rotationMode: "simultaneous",
                    sequentialDelay: 600,

                    cardWidth: 300,
                    cardHeight: 400,

                    spacingHorizontal: 15,
                    spacingVertical: 15,

                    cardsToShow: 3,
                    cardsPerRow: 3,

                    startFromIndex: 1,
                    /* buttonBackwardHtml: "<",
                     buttonForwardHtml: ">"*/
                };

                // for demopage only. transfers parameters from configuration object to configurator form
                setDemopageConfiguration(configuration);

                flipping.init('flipping_cards', configuration);
            
                /*var mediaqueryList = window.matchMedia("(max-width: 500px)");
                if ( mediaqueryList.matches){
                    alert ("cucos");
                }*/

$(window).resize(function(){

       if ($(window).width() <= 480) {  

            $("#conf_decks_count").select();
            $('#conf_decks_count').val('1');

            $("#conf_cards_per_row").select();
            $('#conf_cards_per_row').val('1');

            $("#conf_card_width").select();
            $('#conf_card_width').val('300');

            $("#conf_card_height").select();
            $('#conf_card_height').val('400');            

            reconfigure();

       }
       
       if ($(window).width() > 480 && $(window).width()<=768) {
            $("#conf_decks_count").select();
            $('#conf_decks_count').val('2');

            $("#conf_cards_per_row").select();
            $('#conf_cards_per_row').val('2');

            $("#conf_card_width").select();
            $('#conf_card_width').val('200');

            $("#conf_card_height").select();
            $('#conf_card_height').val('300');

            reconfigure();       
        }
       
       if ($(window).width() >768) {
            $("#conf_decks_count").select();
            $('#conf_decks_count').val('3');

            $("#conf_cards_per_row").select();
            $('#conf_cards_per_row').val('3');

           $("#conf_card_width").select();
            $('#conf_card_width').val('300');

            $("#conf_card_height").select();
            $('#conf_card_height').val('400');            

            reconfigure();
       }     

});




            });

        </script>

    </section>




    <section class="row" style="display: none;">

        <div class="config col-xs-12 col-md-12">
            <h2>Configuration</h2>
        </div>


        <div class="config col-xs-12 col-sm-12 col-md-6 col-lg-6 config_column_1">

            <!--            <label for="conf_decks_count"> Number of cards to show: </label>
                        <select id="conf_decks_count" name="conf_decks_count" onchange="reconfigure()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <br>-->

            <label for="conf_decks_count">Number of cards to show: </label>
            <input type="number" name="conf_decks_count" id="conf_decks_count"
                   min="0" max="15"
                   onclick="select()" onkeyup="reconfigure(true)" onchange="reconfigure(true)">
            <br>

            <label for="conf_cards_per_row">Number of cards per row: </label>
            <input type="number" name="conf_cards_per_row" id="conf_cards_per_row"
                   min="1" max="15"
                   onclick="select()" onkeyup="reconfigure(true)" onchange="reconfigure(true)">
            <br>

            <!--            <label for="conf_cards_per_row">Number of decks: </label>
                        <select id="conf_cards_per_row" name="conf_cards_per_row" onchange="reconfigure()">
                            <option name="conf_cards_per_row" value="cardsPerRow">per row</option>
                            <option name="conf_number_of_rows" value="number-of-rows">rows</option>
                        </select>

                        <label for="conf_cards_per_row_or_rows"></label>
                        <input type="number" name="conf_cards_per_row_or_rows" id="conf_cards_per_row_or_rows"
                               min="1" max="6" value=""
                               onclick="select()" onkeyup="reconfigure()" onchange="reconfigure()">
                        <br>-->

            <!--            <label for="conf_starting_card_index">Starter set of cards: </label>
                        <select id="conf_starting_card_index" name="conf_starting_card_index" onchange="reconfigure(true)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>-->

            <label for="conf_starting_card_index">Start show from card index: </label>
            <input type="number" name="conf_starting_card_index" id="conf_starting_card_index"
                   min="1" max="15"
                   onclick="select()" onkeyup="reconfigure(true)" onch4ange="reconfigure(true)">
            <br>


            <input type="checkbox" name="conf_auto" id="conf_auto" onchange="reconfigure()">
            <label for="conf_auto">Automatic flipping mode</label>
            <br>

            <label for="conf_autoflip_delay">Delay before the next set of cards in automatic mode: </label>
            <input type="number" name="conf_autoflip_delay" id="conf_autoflip_delay"
                   min="0"
                   onkeyup="reconfigure()" onchange="reconfigure()"> ms
            <br>

            <input type="checkbox" name="conf_mouseover" id="conf_mouseover" onchange="reconfigure()">
            <label for="conf_mouseover">Pause on mouse over</label>


        </div>

        <div class="config col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <label for="conf_card_width">Card size: </label>
            <input type="number" name="conf_card_width" id="conf_card_width" min="120" onkeyup="reconfigure()"
                   onchange="reconfigure()" onblur="this.value<120?this.value=120:''">
            <label for="conf_card_height">x</label>
            <input type="number" name="conf_card_height" id="conf_card_height" min="145" onkeyup="reconfigure()"
                   onchange="reconfigure()" onblur="this.value<145?this.value=145:''"> px
            <br>

            <label for="conf_card_width">Cards spacing: horizontal </label>
            <input type="number" name="conf_spacing_horizontal" id="conf_spacing_horizontal" min="0"
                   onkeyup="reconfigure()"
                   onchange="reconfigure()"> px
            <label for="conf_card_height"> and vertical</label>
            <input type="number" name="conf_spacing_vertical" id="conf_spacing_vertical" min="0"
                   onkeyup="reconfigure()"
                   onchange="reconfigure()"> px
            <br>

            <label for="conf_transition_duration">Transition duration: </label>
            <input type="number" name="conf_transition_duration" id="conf_transition_duration" min="0"
                   onkeyup="reconfigure()"
                   onchange="reconfigure()"> ms
            <br>


            Rotation mode:
            <input type="radio" name="conf_rotation" id="conf_simultaneous" value="simultaneous"
                   onchange="reconfigure()">
            <label for="conf_simultaneous">Simultaneous</label>&nbsp;&nbsp;

            <input type="radio" name="conf_rotation" id="conf_sequential" value="sequential"
                   onchange="reconfigure()">
            <label for="conf_sequential">Sequential</label>
            <br>


            <!--Cards direction:
            <input type="radio" name="conf_flow" id="conf_flow_row" value="row" checked="checked" onchange="reconfigure()">
            <label for="conf_flow_row">Row</label>

            <input type="radio" name="conf_flow" id="conf_flow_col" value="column" onchange="reconfigure()">
            <label for="conf_flow_col">Column</label> <br><br>-->

            <label for="conf_sequential_delay">Delay for sequential rotation mode: </label>
            <input type="number" name="conf_sequential_delay" id="conf_sequential_delay" min="0"
                   onkeyup="reconfigure()"
                   onchange="reconfigure()"> ms
            <br>


            <!--                <label for="conf_cards_per_row">Number of cards per row </label>
          <input type="text" name="conf_cards_per_row" id="conf_cards_per_row" value="" onkeyup="reconfigure()"> or


          <label for="conf_number_of_rows">number of rows </label>
          <input type="text" name="conf_number_of_rows" id="conf_number_of_rows" value="" onkeyup="reconfigure()">
          <br><br>-->


            <input type="checkbox" name="conf_cards_shadow" id="conf_cards_shadow" onchange="reconfigure()">
            <label for="conf_cards_shadow">Cards shadow</label>&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="checkbox" name="conf_buttons_shadow" id="conf_buttons_shadow" onchange="reconfigure()">
            <label for="conf_buttons_shadow">Buttons shadow</label> <br><br>

        </div>

        </div>


    </section>


    <section class="row" style="display: none;">

        <div class="usage col-xs-12 col-md-12">
            <h2>How to use</h2>
        </div>


        <div class="usage col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-offset-6">
            <h4>Example of usage with pure JavaScript</h4>

<pre class="prettyprint">
<xmp>
    <link href="css/flipping.css" rel="stylesheet"/>
    <link href="css/card.css" rel="stylesheet"/>
    <script src="js/flipping.js"/>

    ...

    <div id="flipping_cards_carousel" class="flipping">

        <div class="btn-backward"></div>

        <div class="cards">
            <div>Content of card 1</div>
            <div>Content of card 2</div>
            <div>Content of card 3</div>
            ...
        </div>

        <div class="btn-forward"></div>

    </div>

    <script>

        var configuration = {
            autoFlipMode: false,
            autoFlipDelay: 1500,
            pauseMouseOver: true,

            cardsShadow: true,
            buttonsShadow: true,

            transitionDuration: 700,

            rotationMode: "simultaneous",
            sequentialDelay: 600,

            cardWidth: 150,
            cardHeight: 180,

            spacingHorizontal: 15,
            spacingVertical: 15,

            cardsToShow: 3,
            cardsPerRow: 3,

            startFromIndex: 1
        };

        flipping.init('flipping_cards_carousel', configuration);

    </script>

</xmp>
</pre>
        </div>

        <!--        <div class="usage col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <h4>Example of usage via React adapter</h4>
        <pre class="prettyprint">
        <xmp>
            <div id="app"></div>
            <script src="bundle.min.js"></script>

            ...

                    import React from 'react';
                    import ReactDOM from 'react-dom';

                    import FlippingCards from "./js/flipping-react";

                    require('./css/flipping.scss');
                    require('./css/card.scss');

                    var configuration = {
                            autoFlipMode: false,
                            autoFlipDelay: 1500,
                            pauseMouseOver: true,

                            cardsShadow: true,
                            buttonsShadow: true,

                            transitionDuration: 700,

                            rotationMode: "simultaneous",
                            sequentialDelay: 600,

                            cardWidth: 150,
                            cardHeight: 180,

                            spacingHorizontal: 15,
                            spacingVertical: 15,

                            cardsToShow: 3,
                            cardsPerRow: 3,

                            startFromIndex: 1
                    };

                    var content = [
                        '<div>Content of card 1</div>',
                        '<div>Content of card 2</div>',
                        '<div>Content of card 3</div>',
                        ...
                    ];

                    class App extends React.Component {
                        render() {
                            return (
                                <FlippingCards
                                        id="flipping_cards"
                                        configuration={configuration}
                                        content={content}
                                />
                            )
                       }
                    }
                    ReactDOM.render(<App/>, document.getElementById("app"));

                </xmp>
                </pre>
                </div>-->
    </section>


    <section class="row" style="display: none">

        <div class="configuration">
            <h2>Options</h2>
            <ul>

                <li><b>autoFlipMode</b> : [true | false] - start flipping in automatic mode<br><!--Endless Loop--></li>
                <li><b>autoFlipDelay</b> : [ms] - delay before the next set of cards in automatic mode [ms]<br></li>
                <li><b>rotationMode</b> : [true | false] - pausing to flip when you hover over the cards<br><br></li>

                <li><b>cardsShadow</b> : [true | false] - on/off cards shadow<br></li>
                <li><b>buttonsShadow</b> : [true | false] - on/off buttons shadow<br></li>

                <li><b>transitionDuration</b> : [ms] - card flip transition duration <br><br></li>


                <li><b>rotationMode</b> : [simultaneous | sequential] - simultaneous or sequential mode<br></li>
                <li><b>sequentialDelay</b> : [ms] - sequential delay before neighboring cards flip<br><br></li>

                <li><b>cardWidth</b> : [px] - card width<br></li>
                <li><b>cardHeight</b> : [px] - card height<br><br></li>

                <li><b>spacingHorizontal</b> : [px] - horizontal cards spacing<br></li>
                <li><b>spacingVertical</b> : [px] - vertical cards spacing<br><br></li>


                <li><b>cardsToShow</b> : [num] - number of cards to show<br></li>
                <li><b>cardsPerRow</b> : [num] - number of cards per row<br></li>

                <li><b>startFromIndex</b> : [num] - start show from card index <br><br></li>

                <li><b>buttonBackwardHtml</b> : [html] - backward button html code<br><br></li>
                <li><b>buttonForwardHtml</b> : [html] - forward button html code<br><br></li>

            </ul>
        </div>

    </section>


    <section class="row" style="display: none;">
        <div class="download  col-xs-12 col-md-12">
            <h2>Download</h2>
            <div>
                <i class="fa fa-github" aria-hidden="true">
                    <a href="https://github.com/mad48/flipping-cards/"> Get from GitHub</a></i>
            </div>
        </div>
    </section>


</main>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter46747293 = new Ya.Metrika({
                    id:46747293,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>





    </div><!-- container -->

    
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<script>
$(document).ready(function() {
  $('#link1').on('click', function() {
    $('#work1').modal('show');
    return false;
  });
});
</script>


<!-- Modal work1-->
<div class="modal fade" id="work1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Ingeniero de Servicio y Mantenimiento</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

   <!-- <thead>
      <tr>
        <th style="font-size: 20px;">La estrategia es obtener imagen de la facha como se muestra en los ejemplos</th>
      </tr>
    </thead>-->
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/1.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work2-->
<div class="modal fade" id="work2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Web Developer</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

   <thead>
      <tr>
        <th style="font-size: 20px;">Vacante para Web developer ( programador ) 
Vacante :Web Developer
Programación Orientada a Objetos.
Utiliza SASS/LESS/Stylus.
Conocé librerías como: GSAP, TypeScript, Vue, React, ES6, Handlebars.
Puede desarrollar Pixel Perfect SPAS.
Experiencia integrando servicios REST.
Conoce sobre compatibilidad de navegadores.
Experiencia con Responsive Design.
Utiliza un control versiones (Git/SVN/Mercury).
Atención al detalle.
Habilidades técnicas conocimientos sobre GatsbyJS, NextJS
</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/2.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work3-->
<div class="modal fade" id="work3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">OTOÑO CELEKTA (Prácticas Profesionales)</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

    <thead>
      <tr>
        <th style="font-size: 20px;">Atención AlumnosCELEKTA los invita a participar en la feria virtual para prácticas profesionales Fecha límite de inscripción 25 de septiembre. Atención Alumnos.<br>

CELEKTA los invita a participar en la feria virtual para prácticas profesionales
<br>
Fecha límite de inscripción 25 de septiembre
</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/3.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work4-->
<div class="modal fade" id="work4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Vacante PLASTIC OMNIUM</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

  <!--<thead>
      <tr>
        <th style="font-size: 20px;"></th>
      </tr>
    </thead>-->
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/4.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work5-->
<div class="modal fade" id="work5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">PROGRAMADOR FULL STACK</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

   <thead>
      <tr>
        <th style="font-size: 20px;">Área programación Fullstack para plataforma de gestión de emisiones, buscamos talento con posibilidad de convertirse en socio y CTO de startup. El proyecto cuenta con beca.</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/5.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work6-->
<div class="modal fade" id="work6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Oportunidad de practicas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

   <thead>
      <tr>
        <th style="font-size: 20px;">Becario de Proyectos y Programación.</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/6.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work7-->
<div class="modal fade" id="work7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Foro de Habilidades Blandas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

  <!-- <thead>
      <tr>
        <th style="font-size: 20px;">Becario de Proyectos y Programación.</th>
      </tr>
    </thead>-->
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/7.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal work8-->
<div class="modal fade" id="work8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Foro: Apuéstale a tu Futuro</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <table class="table table-striped text-center" style="font-weight: bold;">

   <!--<thead>
      <tr>
        <th style="font-size: 20px;">Becario de Proyectos y Programación.</th>
      </tr>
    </thead>-->
    <tbody>
      <tr>
        <td><img src="flipping_cards/images/8.jpg" class="rounded" alt="fachada" width="100%"></td>
      </tr>
    </tbody>
  </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>