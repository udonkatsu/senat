<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kota Samarinda </title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- Profile and Sidebarmenu -->
            <?php
        include("sidebarmenu.php");
        ?>
            <!-- /Profile and Sidebarmenu -->

            <!-- top navigation -->
            <?php
        include("header.php");
        ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Admin</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Admin ><small>Edit Bagian</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="proses/proses_editbagian.php" method="post"
                                        enctype="multipart/form-data" id="demo-form2" name="formupdate"
                                        data-parsley-validate class="form-horizontal form-label-left">
                                        <?php
                                        include '../koneksi/koneksi.php';
                                        $id = mysqli_real_escape_string($db, $_GET['id_pengguna']);
                                        $sql = "SELECT * FROM tb_bagian WHERE id_pengguna = '$id'";
                                        $query = mysqli_query($db, $sql);
                                        $data = mysqli_fetch_array($query);
                                        ?>
                                        <input type="hidden" name="id_pengguna" value="<?php echo $id; ?>">

                                        <!-- Nama Komisi -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Komisi <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input value="<?php echo $data['nama_komisi']; ?>" type="text"
                                                    id="nama_komisi" name="nama_komisi" required="required"
                                                    placeholder="Masukkan Nama Komisi"
                                                    class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <!-- Username -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input value="<?php echo $data['username']; ?>" type="text"
                                                    id="username" name="username" required="required" maxlength="50"
                                                    placeholder="Masukkan Username"
                                                    class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="password" id="password" name="password" required="required"
                                                    maxlength="50" placeholder="Masukkan Password"
                                                    class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <!-- Role -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select id="role" name="role" class="form-control col-md-7 col-xs-12"
                                                    required>
                                                    <option value="admin"
                                                        <?php echo $data['role'] == 'admin' ? 'selected' : ''; ?>>Admin
                                                    </option>
                                                    <option value="komisi"
                                                        <?php echo $data['role'] == 'komisi' ? 'selected' : ''; ?>>
                                                        Komisi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Nama Lengkap -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input value="<?php echo $data['nama_lengkap']; ?>" type="text"
                                                    id="nama_lengkap" name="nama_lengkap" required="required"
                                                    maxlength="70" placeholder="Masukkan Nama Lengkap"
                                                    class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="alamat" name="alamat" required="required"
                                                    class="form-control" rows="3"
                                                    placeholder="Masukkan Alamat"><?php echo $data['alamat']; ?></textarea>
                                            </div>
                                        </div>

                                        <!-- No HP -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No HP <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input value="<?php echo $data['no_hp_bagian']; ?>" type="text"
                                                    id="no_hp_bagian" name="no_hp_bagian" required="required"
                                                    maxlength="12" placeholder="Masukkan Nomor HP"
                                                    class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <!-- Gambar -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="gambar" accept="image/png,image/jpeg,image/jpg" type="file"
                                                    id="gambar" class="form-control" /> *max 2MB
                                            </div>
                                        </div>

                                        <!-- Foto Sebelumnya -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto
                                                Sebelumnya</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <img src="../bagian/images/<?php echo $data['gambar']; ?>"
                                                    class="img-circle" height="80" width="80"
                                                    style="border: 2px solid #666666;" />
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <!-- Tombol -->
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="databagian.php" class="btn btn-success"><span
                                                        class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                                                <button type="submit" name="input" value="Simpan"
                                                    class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>
                                                    Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Parsley -->
    <script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
    <!-- Initialize datetimepicker -->
    <script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
    </script>
    <script language='javascript'>
    function validAngka(a) {
        if (!/^[0-9.]+$/.test(a.value)) {
            a.value = a.value.substring(0, a.value.length - 1000);
        }
    }
    </script>
</body>

</html>