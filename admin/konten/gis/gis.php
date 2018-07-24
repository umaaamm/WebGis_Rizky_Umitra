<!-- ini digunakan untuk fungsi hapus data gis  -->
<?php
@$id_delete = $_GET['id_delete'];
if (!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM tbl_gis where id='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
}
?>

<!-- --------- -->

<!-- ini digunakan untuk simpan data gis -->
<?php
if (isset($_POST['submit'])) {
    //input parameter untuk tambah data dari form
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $pimpinan = $_POST['pimpinan'];
    $deskripsi = $_POST['deskripsi'];
    $jam_buka = $_POST['jam_buka'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $namagambar = $_FILES['gambar'] ['name'];
    $lokasi = $_FILES['gambar'] ['tmp_name'];

    $lokasitujuan = "././img";
    //jika gambar kosong maka di isi dengan nama noimage.png
    if (empty($namagambar)) {
        $namagambar = "noimage.png";
    }
    $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $namagambar); //untuk memindahkan gambar dari storage kita ke path xampp

    //query untuk tambah data
    $query_tambah = $koneksi->query("INSERT INTO tbl_gis (nama_perusahaan,pimpinan,deskripsi,jam_buka,alamat,no_telp,lat,lon,gambar)values ('" . $nama_perusahaan . "','" . $pimpinan . "','" . $deskripsi . "','" . $jam_buka . "','" . $alamat . "','" . $no_telp . "','" . $lat . "','" . $lon . "','" . $namagambar . "')");
    echo '<div class="alert alert-success">Data Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
}
?>
<!-- -------- -->
<!-- digunakan untuk tampilan form halaman input data GIS -->
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Gis</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Perushaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan"
                               placeholder="Masukkan Nama Perushaan" required>
                    </div>
                    <div class="form-group">
                        <label>Pimpinan</label>
                        <input type="text" class="form-control" name="pimpinan" placeholder="Masukkan Pimpinan" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jam Buka</label>
                        <input type="text" class="form-control" name="jam_buka" placeholder="Masukkan Jam Buka" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="lat" placeholder="Masukkan Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" class="form-control" name="lon" placeholder="Masukkan Lontitude" required>
                    </div>
                    <label>Foto</label>
                    <div class="form-group">
                        <img src="img/noimage.png" class="img-thumbnail img-responsive"
                             style="width:300px; height:300px; margin-bottom:10px;" id="picturebox">
                        <input type="file" accept="image/*" name="gambar" class="form-control" id="btnimage" required>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- ------------ -->
<!-- digunakan untuk menampilkan data gis yang telah di inputkan -->
<div class="col-md-8">
    <?php
    $query = $koneksi->query("SELECT * FROM tbl_gis");
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Gis</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Pimpinan</th>
                    <th>Deskripsi</th>
                    <th>Jam Buka</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>

                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['nama_perusahaan'] ?></td>
                        <td><?= $tampil['pimpinan'] ?></td>
                        <td><?= $tampil['deskripsi'] ?></td>
                        <td><?= $tampil['jam_buka'] ?></td>
                        <td><?= $tampil['alamat'] ?></td>
                        <td><?= $tampil['no_telp'] ?></td>
                        <td><?= $tampil['lat'] ?></td>
                        <td><?= $tampil['lon'] ?></td>
                        <td><?= $tampil['gambar'] ?></td>
                        <td><a href="javascript:;" data-id="<?php echo $tampil['id'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=gis&m2=editgis&id_edit=<?= $tampil['id'] ?>" class="
						btn btn-success btn-warning fa fa-edit"></a></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- -------------------- -->

    <!-- untuk modal Hapus Data GIS -->
    <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- --------- -->