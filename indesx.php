<?php
Include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html  lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Website Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Google Font -->
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Allerta+Stencil:400,700,900:normal" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="assetberanda/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link href="assetberanda/assets/css/normalize.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/iline-icons.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/animate.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.carousel.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.theme.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/owl.transitions.css" type="text/css" rel="stylesheet" />
    <!-- Main CSS -->
    <link href="assetberanda/assets/css/style.css" type="text/css" rel="stylesheet" />
    <link href="assetberanda/assets/css/responsive.css" type="text/css" rel="stylesheet" />
    <!-- Shortcut icon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  </head>
  <body>
    <!-- NAVIGATION START -->
    <header class="fallone-navbar" data-id="default-navbar">
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a  href="blog-standard.php">Home</a></li>
              <li><a  href="regis.php">Registrasi</a></li>
              <li><a  href="login-anggota.php">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!-- NAVIGATION END -->
    <!-- MAIN CONTAINER -->
    <div class="main-content">
      <!-- HEADER TREE -->
      <!-- HEADER TREE END -->
      <!-- BLOG POST BODY SECTION -->
       <?php

      $query=$koneksi->query("SELECT * from jasaweb");
      $tampils=array();
       while ($tampil = $query->fetch_assoc()) {
          $tampils[]=$tampil;
       }  
       $data = json_encode(array('results'=>$tampils));
  
    ?>
     <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard centered">
            <div class="panel-heading">
              <h2 class="panel-title"><strong> - TAMPILAN PETA - </strong></h2>
            </div>
            <div class="panel-body">
              <div id="map" style="width:100%;height:580px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w"></script>

<script type="text/javascript">
  function initialize() {
  
    var mapOptions = {   
        zoom: 5,
        center: new google.maps.LatLng(-2.292606,112.6089484), 
        disableDefaultUI: true
    };

    var mapElement = document.getElementById('map');

    var map = new google.maps.Map(mapElement, mapOptions);

    setMarkers(map, officeLocations);

}

var officeLocations = [
<?php
// $data = file_get_contents('http://localhost/jasaweb/ambildata.php');
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
?>
[<?php echo $item->id_perusahaan ?>,'<?php echo $item->nama_perusahaan ?>','<?php echo $item->alamat ?>', <?php echo $item->longitude ?>, <?php echo $item->latitude ?>],
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
        var myLatLng = new google.maps.LatLng(office[4], office[3]);
        var infowindow = new google.maps.InfoWindow({content: contentString});
         
        var contentString = 
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h5 id="firstHeading" class="firstHeading">'+ office[1] + '</h5>'+
            '<div id="bodyContent">'+ 
            '<a href=detail.php?id='+office[0]+'>Info Detail</a>'+
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
        </div>


<script type="text/javascript">
  if ("geolocation" in navigator){
    navigator.geolocation.getCurrentPosition(function(position){ 
      var currentLatitude = position.coords.latitude;
      var currentLongitude = position.coords.longitude;

      window.print(currentLatitude);
}


</script>







  </div>

      <!-- BLOG POST BODY SECTION END -->
      <!-- BEGIN FOOTER -->
      <footer class="page-footer">
        <!-- FOOTER CONTENT -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col-md-12 -->
            <div class="col-md-12">
              <!-- .row -->
              <div class="row">
                <aside class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <!-- Copyright Informations -->
                  <h3  class="uppercase">Copyright | Zeny 2018</h3>
                </aside>
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12 text-center mar-top-sm">
                  <!-- .social -->
                  <ul class="social">
                    <li><a href="#" class="icon-xl iline3-be"></a></li>
                    <li><a href="#" class="icon-xl iline3-facebook27"></a></li>
                    <li><a href="#" class="icon-xl iline3-instagram4"></a></li>
                    <li><a href="#" class="icon-xl iline3-twitter19"></a></li>
                    <li><a href="#" class="icon-xl iline3-vimeo11"></a></li>
                  </ul>
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- FOOTER CONTENT -->
      </footer>
      <!-- FOOTER END -->
    </div>
    <!-- MAIN CONTAINER END -->
    <!-- Back to top -->
    <div id="back-to-top" class="back-to-top">
      <a href="#" class="icon iline2-thin16 no-margin"></a>
    </div>
    <!-- Back to top end -->


    <!-- Include js plugin -->
    <script src="assetberanda/assets/js/libs/jquery-1.11.2.min.js"></script>
    <script src="assetberanda/assets/js/libs/jqBootstrapValidation.js"></script>
    <script src="assetberanda/assets/js/libs/imagesloaded.pkgd.min.js"></script>
    <script src="assetberanda/assets/js/libs/imagesloaded.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.magnific-popup.min.js"></script>
    <script src="assetberanda/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetberanda/assets/js/libs/isotope.pkgd.min.js"></script>
    <script src="assetberanda/assets/js/libs/ParallaxScrolling.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.mailchimp.js"></script>
    <script src="assetberanda/assets/js/libs/wow.min.js"></script>
    <script src="assetberanda/assets/js/libs/owl.carousel.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.fittext.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.lettering.js"></script>
    <script src="assetberanda/assets/js/libs/jquery.textillate.js"></script>

    <!-- Main JS -->
    <script src="assetberanda/assets/js/main.js"></script>
  </body>
</html>
