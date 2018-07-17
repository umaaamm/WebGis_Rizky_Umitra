<?php

include "koneksi/koneksi.php";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem informasi geografis letak service center makita-maktec di indonesia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="aset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="aset/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="aset/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php

@$id = $_GET['id'];
$query_edit = $koneksi->query("SELECT * FROM tbl_gis where id='". $id . "' ");
$tampil= $query_edit->fetch_assoc();

$cut=substr($tampil['alamat'],0,50);

?>

<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper" style="margin-top: 30px;">
  <div class="lockscreen-logo">
    <a href="#"><b>Sistem informasi </b> Gis Makita-Maktec</a>
  </div>
</div>

<div class="row" style="margin-left: 10px;margin-right: 10px;">
        
<div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Foto Perusahaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img src="./admin/img/<?=$tampil['gambar']?>" class="img-thumbnail img-responsive" style="width:300px; height:300px; margin-bottom:10px;" id="picturebox">
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Lokasi Perusahaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCu4pNEiS1Y4te3hh-6AN7Lg4JHKhGNEDs&callback=initMap">

            </script>


        <?php
        $latlon = $tampil['lat'].",".$tampil['lon'];
        
        ?>

            <div id="map" style="width:100%;height:380px;"></div>

            <div class="form-group">
                        <label><br>Waktu : </label><br>
                         <div id="duration"></div>
                        <hr size="1px;">
            </div>
             <div class="form-group">
                        <label>Jarak : </label><br>
                         <div id="jarak"></div>
                        <hr size="1px;">
            </div>
            <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: -2.600029, lng: 118.015776}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setOptions({
    polylineOptions: {
            strokeWeight: 4,
            strokeOpacity: 1,
            strokeColor:  'blue'
          }
    });
    directionsDisplay.setOptions( { suppressMarkers: true } );

    var lat;
    var lon;
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(function (pos) {
          lat = pos.coords.latitude;
          lon = pos.coords.longitude;

          directionsService.route({
         origin: lat+","+lon,
         destination: "<?php echo $latlon; ?>",
         travelMode: 'DRIVING',
      }, function(response, status) {
         if (status === 'OK') {
              directionsDisplay.setDirections(response);
              var route = response.routes[0];
              console.log(response.routes[0].legs[0]);
                  duration = response.routes[0].legs[0].duration.text;
                  jarak = response.routes[0].legs[0].distance.text;
                document.getElementById("duration").innerHTML = duration;
                document.getElementById("jarak").innerHTML = jarak;
                createMarker(response.routes[0].legs[0].end_location);
                createMarkerStart(response.routes[0].legs[0].start_location);
         } else {
             window.alert('Directions request failed due to ' + status);
         }
      });
         });
     }
    
      function createMarker(position) {
      var marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: 'img/mark.png'
        });
    }
    function createMarkerStart(position) {
      var marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: 'img/map-marker.png'
        });
    }
      }
    </script>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        
        <!-- /.col (left) -->
        <div class="col-md-5">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Perusahaan</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="form-group">
                        <label>Nama Perusahaan</label><br>
                        <?=$tampil['nama_perusahaan']?>
                        <hr size="1px;">
            </div>
            <div class="form-group">
                        <label>Nama Pimpinan</label><br>
                        <?=$tampil['pimpinan']?>
                        <hr size="1px;">
            </div>
            <div class="form-group">
                        <label>Deskripsi Perusahaan</label><br>
                        <?=$tampil['deskripsi']?>
                        <hr size="1px;">
            </div>
            <div class="form-group">
                        <label>Jam Buka</label><br>
                        <?=$tampil['jam_buka']?>
                        <hr size="1px;">
            </div>
             <div class="form-group">
                        <label>Alamat</label><br>
                        <?=$tampil['alamat']?>
                        <hr size="1px;">
            </div>
            <div class="form-group">
                        <label>No Telpon</label><br>
                        <?=$tampil['no_telp']?>
                        <hr size="1px;">
            </div>
            <div class="form-group">
                        <label>LatLon</label><br>
                        <?=$tampil['lat']?>,<?=$tampil['lon']?>
                        <hr size="1px;">
            </div>
            
            </div>
            <div class="box-footer">
                <a href="./" class="btn btn-success btn-warning fa  fa-sign-out"></a>
                </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->
        </div>

        <!-- /.col (right) -->
      </div>
  
  <!-- <div class="lockscreen-footer text-center">
    <b>Copyright &copy; 2018</b><br>
    All rights reserved
  </div> -->
<!-- Automatic element centering --> 
<!-- /.center -->

<!-- jQuery 3 -->
<script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
