
<!DOCTYPE html>
<html>
<head lang="es">
	<title> Carousel</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- Bootstrap core CSS -->
	 <link href="css/carousel.css" rel="stylesheet">
   <style type="text/css">
     p{
      background: #D01304;
      text-align: justify;
      color: white;
      padding: 2em;
      border-radius: 5px;
     }

    </style>
</head>
<body>
	
	 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner"  >
        <div class="item active">
          <img src="images\precentacion.jpg" alt="First slide">
          <div class="container">
            <!--<div class="carousel-caption">
              <h1>Titulo</h1>
              <p>Parrafo </p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Boton</a></p>
            </div>-->
          </div>
        </div>
        <div class="item">
          <img src="images\Presentacion2.jpg" alt="Second slide">
          <div class="container">
            <!--<div class="carousel-caption">
              <h1>Titulo</h1>
              <p>Parrafo </p>
              <p><a class="btn btn-lg btn-primary" href="http://www.definicionabc.com/wp-content/uploads/Im%C3%A1gen-Vectorial.jpg" role="button">Boton</a></p>
            </div>-->
          </div>
        </div>
        <div class="item">
          <img src="images\maestros.jpg" alt="Third slide">
          <div class="container">
            <!--<div class="carousel-caption">
              <h1>Titulo</h1>
              <p>Parrafo </p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Boton</a></p>
            </div>-->
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

    
      <!-- Three columns of text below the carousel -->

   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>

</body>
</html>