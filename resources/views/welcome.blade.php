<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title> Sistema de Portafolios </title>
<link rel="icon" href="images/logocpiis.png" type="image/x-icon">
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.theme.css">
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Preloader-->
<div id="preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>
<!--Navigation-->
<header id="menu">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#menu" onclick="location.reload(true);">
                <img src="images/logocpiis.png" alt="">
              </a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a class="scroll" href="#about">Sistema de Portafolios</a></li>
              <li><a class="scroll" href="#features">Desarrollo de Software</a></li>
              <li><a class="scroll" href="#testimonials">Conoce a nuestro Equipo</a></li>
              <!-- Agrega la lógica de autenticación y roles aquí -->
              @auth
                @if (session()->get('rol') == 'Docente')
                  <li><a href="{{ route('docentes.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Dashboard') }}</a></li>
                @endif
                @if (session()->get('rol') == 'Revisor')
                  <li><a href="{{ route('revisores.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Dashboard') }}</a></li>
                @endif
                @if (session()->get('rol') == 'Admin')
                  <li><a href="{{ route('admins.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Dashboard') }}</a></li>
                @endif
              @else
                <li><a href="{{ route('login') }}" class="font-semibold text-whites-custom-gray hover:text-gray-500 dark:text-whites-custom dark:hover:text-gray-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                  <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-whites-custom-gray hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Register') }}</a></li>
                @endif
              @endauth
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </div>
    </div>
  </header>
<!--Slider-Start-->
<section id="slider">
  <div id="home-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active" style="background-image:url(images/escuela.jpeg)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1> CodeEval9 </h1>
              <h2> Revisión ágil, resultados brillantes </h2>
              <p>Optimiza tu proceso de evaluación con nuestros Sistemas de Revisión de Portafolios, simplificando la gestión y análisis de proyectos de manera eficiente y efectiva</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item" style="background-image:url(images/portafolioreal.png)">
        <div class="carousel-caption container">
          <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12">
              <h1> CodeEval9 </h1>
              <h2> Agiliza tu proceso de evaluación </h2>
              <p>Eleva el estándar de tu proceso de revisión con nuestro Sistema de Evaluación de Portafolios en línea, simplificando la gestión y maximizando la eficacia en la evaluación de proyectos</p>
            </div>
          </div>
        </div>
      </div>
      <div class="item" style="background-image:url(images/ingsotware.jpg)">
        <div class="carousel-caption container">
          <div class="row">
             <div class="col-md-7 col-sm-12 col-xs-12">
              <h1> CodeEval9 </h1>
              <h2> Eficiencia y velocidad en cada proyecto </h2>
              <p>Revoluciona tu enfoque de revisión de proyectos con nuestra Solución Web de Evaluación de Portafolios, ofreciendo una gestión simplificada y un análisis efectivo para un proceso más eficiente</p>
            </div>
          </div>
        </div>
      </div>
      <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
  </div>
  <!--/#home-carousel-->
</section>
<!--About-Section-Start-->
<section id="about">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>SISTEMA DE <span>PORTAFOLIOS</span></h2>
        <div class="line"></div>
        <p><span><strong>T</strong></span>ransforma la manera en que evalúas proyectos con nuestra Plataforma de Revisión de Portafolios en línea, optimizando la gestión y facilitando un análisis exhaustivo y eficiente</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ab-sec">
        <div class="col-md-6">
          <h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"><span>C</span>reativo y Asombroso</h3>
          <p><span><strong>E</strong></span>n el universo de la evaluación de portafolios, destacamos como arquitectos de experiencias singulares. Nos sumergimos en el arte de la presentación, buscando más allá de lo convencional para construir portafolios que no solo impresionan, sino que cuentan historias visualmente cautivadoras. Cada línea de código que escribimos es una pincelada en la tela de la creatividad. Trabajamos incansablemente, no solo para destacar en el diseño, sino para elevar la esencia de cada proyecto que tocamos. Nuestro compromiso con la excelencia se refleja en cada detalle.</p>
        </div>
        <div class="col-md-6 ab-sec-img wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms"><img src="images/Aboutus/01.jpg" alt=""> </div>
      </div>
    </div>
  </div>
</section>
<!--Features-Section-Start-->
<section id="features">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h2>DESARROLLO DE <span>SOFTWARE</span></h2>
        <div class="line"></div>
        <p><span><strong>S</strong></span>umérgete en la excelencia en desarrollo de software con nuestro equipo. Cada línea de código que escribimos es una manifestación de nuestra dedicación a la innovación y la entrega de soluciones tecnológicas de primera categoría. Nos enorgullece destacarnos no solo por nuestras habilidades técnicas avanzadas, sino también por nuestra capacidad para comprender las necesidades de los clientes y traducirlas en software eficiente y de calidad. Desde la concepción de ideas disruptivas hasta la implementación de soluciones robustas, cada miembro de nuestro equipo contribuye con su experiencia única para impulsar el éxito de nuestros clientes. Al elegirnos, eliges la garantía de soluciones tecnológicas excepcionales que trascienden las expectativas. Estamos aquí para transformar tu visión en realidad</p>
      </div>
    </div>
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#tab-1" role="tab" data-toggle="tab"><i class="fa fa-paper-plane"></i></a></li>
      <li role="presentation"><a href="#tab-2" role="tab" data-toggle="tab"><i class="fa fa-laptop"></i></a></li>
      <li role="presentation"><a href="#tab-3" role="tab" data-toggle="tab"><i class="fa fa-code"></i></a></li>
      <li role="presentation"><a href="#tab-4" role="tab" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
      <li role="presentation"><a href="#tab-5" role="tab" data-toggle="tab"><i class="fa fa-file-image-o"></i></a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active feat-sec" id="tab-1">
        <div class="col-md-6 tab">
          <h5>Web Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Explora la sinergia perfecta entre creatividad y funcionalidad con nuestro equipo de diseño web. Cada página que creamos es una fusión cautivadora de estética y usabilidad, garantizando experiencias de usuario excepcionales. Desde la selección de colores hasta la implementación de tecnologías avanzadas, cada sitio web que diseñamos no solo impresiona visualmente, sino que también cumple con los objetivos estratégicos.<br>
          </p>
          <p class="feat-sec-1">Colaboramos estrechamente contigo para traducir tu visión en soluciones web poderosas y conectivas. Al elegirnos, eliges la garantía de sitios web que destacan y funcionan. Descubre cómo transformamos ideas en experiencias digitales excepcionales; estamos aquí para dar vida a tu presencia en línea.</p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/01.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-2">
        <div class="col-md-6 tab">
          <h5>Graphic Design</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Descubre el impacto visual con nuestro equipo de diseño gráfico. Cada proyecto es una fusión única de arte y comunicación que va más allá de lo convencional. Desde la conceptualización hasta la ejecución, nuestros diseñadores gráficos aportan habilidades técnicas avanzadas y una pasión por la creatividad. <br>
          </p>
          <p class="feat-sec-1">Colaboramos estrechamente contigo para transformar tus objetivos en soluciones visuales cautivadoras, ya sea en impresiones o medios digitales. Elige la promesa de gráficos que no solo comunican, sino que también cautivan. Estamos aquí para dar vida a tu visión visual de manera excepcional.</p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/02.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-3">
        <div class="col-md-6 tab">
          <h5>Web Development</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Adéntrate en el desarrollo web con nuestro equipo experto. Cada proyecto representa la conjunción de tecnología y creatividad, generando sitios web impactantes tanto visual como funcionalmente. Desde la concepción hasta la ejecución, combinamos habilidades técnicas avanzadas con una profunda pasión por la innovación. <br>
          </p>
          <p class="feat-sec-1">Trabajamos en estrecha colaboración contigo para transformar tus metas en experiencias digitales excepcionales y adaptables. Elige la confiabilidad de un desarrollo web que no solo cumple con tus expectativas, sino que también cautiva. Estamos aquí para llevar tu presencia en línea a nuevas alturas.</p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/03.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-4">
        <div class="col-md-6 tab">
          <h5>Responsive Design</h5>  
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Descubre la magia del diseño adaptable con nuestro equipo especializado en Responsive Design. Cada proyecto es una exploración de la versatilidad visual, creando experiencias de usuario fluidas y atractivas en cualquier dispositivo. Nos destacamos por ir más allá de la estética, asegurando que cada diseño responda de manera dinámica a diferentes tamaños de pantalla.<br>
          </p>
          <p class="feat-sec-1">Elige la confiabilidad de un diseño adaptable que no solo se adapta, sino que cautiva en todos los formatos. Estamos aquí para llevar tu experiencia en línea a un nuevo nivel de accesibilidad y atracción visual.</p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/04.jpg" class="img-responsive" alt=""></div>
      </div>
      <div role="tabpanel" class="tab-pane fade feat-sec" id="tab-5">
        <div class="col-md-6 tab">
          <h5>Creative Gallery</h5>
          <div class="line"></div>
          <div class="clearfix"></div>
          <p class="feat-sec">Explora el mundo de la creatividad con nuestra "Creative Gallery". Cada obra es una expresión única de ingenio y habilidad artística, ofreciendo una experiencia visual cautivadora. Nos destacamos por curar una colección diversa que abarca desde ilustraciones impactantes hasta diseños innovadores.<br>
          </p>
          <p class="feat-sec-1">En este escaparate digital, no solo creamos software; diseñamos experiencias inolvidables. Nuestro enfoque innovador se refleja en cada proyecto, destacándose por su originalidad y creatividad. Si buscas soluciones que trasciendan lo común y que estén a la vanguardia de la tecnología, has llegado al lugar adecuado. Únete a nosotros en la exploración de nuevas fronteras digitales, donde tu visión cobra vida con un toque de autenticidad y una pizca de innovación. ¡Convierte tu idea en una obra maestra digital con nosotros! </p>
        </div>
        <div class="col-md-6 tab-img"><img src="images/Features/05.jpg" class="img-responsive" alt=""></div>
      </div>
    </div>
  </div>
</section>
<!--Testimonials-Section-Start-->
<section id="testimonials" class="parallex">
  <div class="container">
    <div class="quote"><i class="fa fa-quote-left"></i></div>
    <div class="heading">
      {{-- <h2><span>EQUIPO DE DESARROLLO</span></h2> --}}
      <div class="line"></div>
    </div>
    <div class="clearfix"></div>
    <div class="slider-text">
      <div id="owl-testi" class="owl-carousel owl-theme">
        <div class="item">
          <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/LennartR.jpeg" class="img-circle" alt="">
            <h5>Con una sólida comprensión de las últimas tecnologías y un enfoque meticuloso en cada línea de código, asegura soluciones que van más allá de las expectativas. Su compromiso con la excelencia técnica y su pasión por la innovación hacen de Jefferson un verdadero artista digital en el ámbito Full Stack</h5>
            <h6>Jefferson L Campos S</h6>
            <p>Full Stack Developer</p>
          </div>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Wilman.jpeg" class="img-circle" alt="">
          <h5>Wilman se distingue por su habilidad para traducir conjuntos de datos complejos en ideas claras y estrategias accionables. Con un enfoque analítico agudo y una mentalidad orientada a los resultados, transforma datos en insights valiosos que impulsan la toma de decisiones informadas.</h5>
          <h6>Wilman Ccasani H</h6>
          <p>Data Scientist</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/CristhianC.jpeg" class="img-circle" alt="">
          <h5>Su experiencia se centra en la creación de sólidos backends que respaldan aplicaciones y plataformas robustas. Con una profunda comprensión de los principios fundamentales del desarrollo backend, Cristhian diseña soluciones escalables y eficientes. </h5>
          <h6>Cristhian Ccala H</h6>
          <p>Backend Developer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Angel.jpeg" class="img-circle" alt="">
          <h5>Angel fusiona creatividad con empatía, creando soluciones que van más allá de lo estético. Su enfoque prioriza la usabilidad y la satisfacción del usuario. Con habilidad innata para convertir ideas en interfaces visuales atractivas.</h5>
          <h6>Angel L Cespedes V</h6>
          <p>User Experience (UX) Designer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Joseph.jpg" class="img-circle" alt="">
          <h5>Joseph es un destacado Frontend Developer reconocido por su capacidad innata para transformar conceptos en interfaces dinámicas y responsivas. Su agudo ojo para los detalles y su compromiso con la innovación al desarrollo de aplicaciones web visualmente impactantes, intuitivas y orientadas al usuario.</h5>
          <h6>Joseph O Espirilla M</h6>
          <p>Frontend Developer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Andy.jpeg" class="img-circle" alt="">
          <h5>Andy trabaja incansablemente para identificar y corregir posibles problemas, asegurando la fiabilidad y eficiencia de cada software. Con un profundo conocimiento de las mejores prácticas de aseguramiento de calidad, contribuye de manera crucial a la entrega de productos libres de defectos.</h5>
          <h6>Andy M Huaman Q</h6>
          <p>Software Quality Engineer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Alvino.jpeg" class="img-circle" alt="">
          <h5>Su destreza radica en la implementación de diseños innovadores que elevan la interacción del usuario. Luis combina su habilidad técnica con una comprensión profunda de las últimas tendencias de diseño y las mejores prácticas de experiencia del usuario.</h5>
          <h6>Luis A.Levita Q.</h6>
          <p>Frontend Developer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Saman.jpeg" class="img-circle" alt="">
          <h5>Su experiencia abarca desde el análisis exploratorio hasta la implementación de modelos avanzados de aprendizaje automático. Saman se distingue por su habilidad para traducir conjuntos de datos complejos en ideas claras y estrategias accionables.</h5>
          <h6>Saman Quispe C</h6>
          <p>Data Scientist</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Alberth.jpeg" class="img-circle" alt="">
          <h5>Jhon destaca por su habilidad para desarrollar backend que respaldan aplicaciones y plataformas escalables. Con un compromiso constante con la calidad del código y la optimización del rendimiento, contribuye a la construcción de sistemas que no solo son confiables sino también eficientes.</h5>
          <h6>Jhon A Quispe Q</h6>
          <p>Backend Developer</p>
        </div>
        <div  class="col-md-10 col-md-offset-1"> <img src="images/Testimonials/Marko.jpeg" class="img-circle" alt="">
          <h5>Con un enfoque analítico agudo y una mentalidad orientada a los resultados, transforma datos en insights valiosos que impulsan la toma de decisiones informadas. Su dedicación a la investigación y su destreza en las últimas técnicas de ciencia de datos.</h5>
          <h6>Marko L Valencia Ñ</h6>
          <p>Data Scientist</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Footer-Start-->
<footer id="footer">
  <div class="bg-sec">
    <div class="container">
      <h6>Universidad Nacional San Antonio Abad del Cusco</h6>
      <h6> Av. de la Cultura 733 - Cusco, Cusco, Perú </h6>
      <h6> © 2024 Ingenieria de Software </h6>
    </div>
  </div>
</footer>
<footer id="footer-down">
</footer>
<!--Jquery-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<!--Isotopes-->
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="js/wow.js"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/jquery.inview.min.js"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="js/owl.carousel.js"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>

