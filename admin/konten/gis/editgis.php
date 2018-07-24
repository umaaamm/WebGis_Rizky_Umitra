<!-- mengambil id untuk menampilkan data EDIT -->
<?php
@$id = $_GET['id_edit']; //dari link
$query_edit = $koneksi->query("SELECT * from tbl_gis where id='" . $id . "'"); //query untuk menampilkan data per ID
$tampil_edit = $query_edit->fetch_assoc(); // memasukkand data kedalam sebuah array untuk ditampilkan
?>
<?php
if (isset($_POST['submit'])) {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $pimpinan = $_POST['pimpinan'];
    $deskripsi = $_POST['deskripsi'];
    $jam_buka = $_POST['jam_buka'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    //mengambil nama gambar
    $namagambar = $_FILES['gambar'] ['name'];
    //mengambil lokasi path server
    $lokasi = $_FILES['gambar'] ['tmp_name'];
    //menentukan lokasi penyimpnan gambar
    $lokasitujuan = "././img";
    //memindahkan gambar dari web ke path server
    $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $namagambar);
    //jika nama gambar kosong
    if (empty($namagambar)) {
        //jika nama gambar kosong
        $query_tambah = $koneksi->query("UPDATE tbl_gis SET nama_perusahaan='" . $nama_perusahaan . "',pimpinan='" . $pimpinan . "',deskripsi='" . $deskripsi . "',jam_buka='" . $jam_buka . "',alamat='" . $alamat . "',no_telp='" . $no_telp . "',lat='" . $lat . "',lon='" . $lon . "' where id='" . $id . "' ");

    } else {
        //jika nama gambar tidak kosong 
        $query_tambah = $koneksi->query("UPDATE tbl_gis SET nama_perusahaan='" . $nama_perusahaan . "',pimpinan='" . $pimpinan . "',deskripsi='" . $deskripsi . "',jam_buka='" . $jam_buka . "',alamat='" . $alamat . "',no_telp='" . $no_telp . "',lat='" . $lat . "',lon='" . $lon . "',gambar='" . $namagambar . "' where id='" . $id . "' ");

    }

//jika query berhasil    
    if ($query_tambah) {

        echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
    }
}
?>
<!-- menampilkan form edit data -->
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Gis</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Perushaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan"
                               value="<?= $tampil_edit['nama_perusahaan'] ?>" placeholder="Masukkan Nama Perushaan" required>
                    </div>
                    <div class="form-group">
                        <label>Pimpinan</label>
                        <input type="text" value="<?= $tampil_edit['pimpinan'] ?>" class="form-control" name="pimpinan"
                               placeholder="Masukkan Pimpinan" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi"
                                  name="deskripsi" required><?= $tampil_edit['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jam Buka</label>
                        <input type="text" value="<?= $tampil_edit['jam_buka'] ?>" class="form-control" name="jam_buka"
                               placeholder="Masukkan Jam Buka" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat"
                                  name="alamat" required><?= $tampil_edit['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" value="<?= $tampil_edit['no_telp'] ?>" class="form-control" name="no_telp"
                               placeholder="Masukkan No Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" value="<?= $tampil_edit['lat'] ?>" class="form-control" name="lat"
                               placeholder="Masukkan Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" value="<?= $tampil_edit['lon'] ?>" class="form-control" name="lon"
                               placeholder="Masukkan Lontitude" required>
                    </div>

                    <label>Foto</label>
                    <div class="form-group">
                        <img src="img/<?= $tampil_edit['gambar'] ?>" class="img-thumbnail img-responsive"
                             style="width:300px; hegith:300px; margin-bottom:10px;" id="picturebox" >
                        <input type="file" accept="image/*" name="gambar" class="form-control" id="btnimage" required>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                    </div>
            </form>
        </div>
    </div>
</div>