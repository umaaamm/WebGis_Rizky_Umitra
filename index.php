<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <?php

    include "koneksi/koneksi.php";

   ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Sistem informasi geografis letak service center makita-maktec di indonesia</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Leccy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="assetgis/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="assetgis/css/font-awesome.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <!-- For Clients slider -->
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
      <!-- //For clients slider -->
      <link href="assetgis/css/lsb.css" rel="stylesheet" type="text/css">
      <!--gallery lsb lightbox-->
      <!--stylesheets-->
      <link href="assetgis/css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
   </head>
   <body>
      <div class="header-outs" id="home">
         <div class="header-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="#gis" class="nav-link scroll">Gis</a>
                     </li>
                  </ul>
               </div>
            </nav>
            <div class="hedder-up">
               <h1><a class="navbar-brand" href="#">Makita - Maktec <span class="fa fa-lightbulb-o" aria-hidden="true"></span></a></h1>
            </div>
         </div>
         <!-- //Navigation -->
         <!-- Slideshow 4 -->
         <div class="slider">
            <div class="callbacks_container">
               <ul class="rslides" id="slider4">
                  <li>
                     <div class="slider-img one-img">
                        <div class="container">
                           <div class="slider-info">
                              <!-- <h4>Best Electrical Service</h4>
                              <p>Quis autem vel eum iure reprehderit Quis autem <br>vel eum iure reprehderit.</p> -->
                              <!-- <div class="outs_more-buttn">
                                 <a href="#" data-toggle="modal">Book Now</a>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </li>
                  <!-- <li>
                     <div class="slider-img two-img">
                        <div class="container">
                           <div class="slider-info">
                              <h4>Power At Your Home</h4>
                              <p>Quis autem vel eum iure reprehderit Quis autem <br>vel eum iure reprehderit.</p>
                              <div class="outs_more-buttn">
                                 <a href="#" data-toggle="modal">Book Now</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li> -->
                  <li>
                     <div class="slider-img three-img">
                        <div class="container">
                           <!-- <div class="slider-info">
                              <h4>Solar Panel Technology</h4>
                              <p>Quis autem vel eum iure reprehderit Quis autem <br>vel eum iure reprehderit.</p>
                              <div class="outs_more-buttn">
                                 <a href="#">Book Now</a>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
      <div class="about" id="gis">
         <h3 class="title">Sistem Informasi Gis</h3>
         <div class="container-fluid">
            <div class="row abt-colm offset">
            <?php

            $query=$koneksi->query("SELECT * from tbl_gis");
            $tampils=array();
            while ($tampil = $query->fetch_assoc()) {
                $tampils[]=$tampil;
            }  
            $data = json_encode(array('results'=>$tampils));
            ?>

            <div id="map" style="width:100%;height:600px;"></div>
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script type="text/javascript">
  function initialize() {
    var mapOptions = {   
        zoom: 6,
        center: new google.maps.LatLng(-2.292606,112.6089484), 
        disableDefaultUI: true
    };
    var mapElement = document.getElementById('map');
    var map = new google.maps.Map(mapElement, mapOptions);
    setMarkers(map, officeLocations);
  }
var officeLocations = [
<?php

                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
                  $cut=substr($item->alamat,0,50);
       
?>
[<?php echo $item->id ?>,'<?php echo $item->nama_perusahaan ?>','<?php echo $cut ?>','<?php echo $item->jam_buka ?>', <?php echo $item->lon ?>, <?php echo $item->lat ?>],
<?php 
}
} 
?>    
];

function setMarkers(map, locations)
{
    var globalPin = 'img/mark.png';

    for (var i = 0; i < locations.length; i++) {
       
        var office = locations[i];
        var myLatLng = new google.maps.LatLng(office[5], office[4]);
        var infowindow = new google.maps.InfoWindow({content: contentString});
        
        var contentString = 
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h6 id="firstHeading" class="firstHeading">'+ office[1] + '</h6>'+
            '<div id="bodyContent"><br>'+ office[2] + '<br><br> Jam Operasional : '+office[3]+'<br><br>'+ 
            '<a href=detail-gis.php?id='+office[0]+' class="btn btn-success btn-primary fa fa-mouse-pointer"> Info Detail</a>'+
            '</div>'+
            '</div>';

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: office[1],
            icon:'img/mark.png'
        });

        google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
    }
}

              function getInfoCallback(map, content) {
                  var infowindow = new google.maps.InfoWindow({content: content});
                  return function() {
                          infowindow.setContent(content); 
                          infowindow.open(map, this);
                      };
              }

              initialize();
    </script>
            </div>
         </div>
      </div>


      <!--//about -->
    
      <!--//contact -->
      <!-- //Footer -->
      <footer>
         <p>©2018 Rizky. All Rights Reserved</p>
      </footer>
      <!-- //Footer -->
      <!--js working-->
      <script src='assetgis/js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- carousal service slider-->
      <script src="assetgis/js/slick.js"></script>
      <script>
         $(document).on('ready', function() {
           $(".center").slick({
         	dots: true,
         	infinite: true,
         	centerMode: true,
         	slidesToShow: 2,
         	slidesToScroll: 2,
         	responsive: [
         		{
         		  breakpoint: 768,
         		  settings: {
         			arrows: true,
         			centerMode: false,
         			slidesToShow: 2
         		  }
         		},
         		{
         		  breakpoint: 480,
         		  settings: {
         			arrows: true,
         			centerMode: false,
         			centerPadding: '40px',
         			slidesToShow: 1
         		  }
         		}
         	 ]
           });
         });
      </script>
      <!-- //carousal -->
      <!--responsiveslides banner-->
      <script src="assetgis/js/responsiveslides.min.js"></script>
      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
         	// Slideshow 4
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager:true,
         		nav: false,
         		speed: 900,
         		namespace: "callbacks",
         		before: function () {
         			$('.events').append("<li>before event fired.</li>");
         		},
         		after: function () {
         			$('.events').append("<li>after event fired.</li>");
         		}
         	});
         
         });
      </script>
      <!--// responsiveslides banner-->	  
      <!--About OnScroll-Number-Increase-JavaScript -->
      <script src="assetgis/js/jquery.waypoints.min.js"></script>
      <script src="assetgis/js/jquery.countup.js"></script>
      <script>
         $('.counter').countUp();
      </script>
      <!-- //OnScroll-Number-Increase-JavaScript -->
      <!-- clients FlexSlider-JavaScript -->
      <script defer src="assetgis/js/jquery.flexslider.js"></script>
      <script>
         $(window).load(function(){
         $('.flexslider').flexslider({
         	animation: "slide",
         	start: function(slider){
         		$('body').removeClass('loading');
         	}
         });
         });
      </script>
      <!-- //clients FlexSlider-JavaScript -->
      <!-- gallery-lightbox -->  
      <script src="assetgis/js/lsb.min.js"></script>
      <script>
         $(window).load(function() {
         	  $.fn.lightspeedBox();
         	});
      </script> 
      <!-- //gallery-lightbox -->
      <!-- start-smoth-scrolling -->
      <script src="assetgis/js/move-top.js"></script>
      <script src="assetgis/js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         
         
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="assetgis/js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
   </body>
</html>