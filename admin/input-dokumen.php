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
                            <h3>Surat Masuk</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Surat Masuk ><small>Tambah Surat Masuk</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="proses/proses_inputdokumen.php" method="post"
                                        enctype="multipart/form-data" id="demo-form2" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <!-- Judul Dokumen -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="judul_dokumen">Judul Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="judul_dokumen" name="judul_dokumen"
                                                    required="required" placeholder="Masukkan Judul Dokumen"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!-- Deskripsi -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="deskripsi">Deskripsi</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"
                                                    placeholder="Masukkan Deskripsi (Opsional)"></textarea>
                                            </div>
                                        </div>
                                        <!-- Jenis Dokumen -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="komisi">Komisi
                                                <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select id="komisi" name="komisi" required="required"
                                                    class="form-control">
                                                    <option value="" disabled selected>Pilih Komisi</option>
                                                    <option value="Pengurus Harian">Pengurus Harian</option>
                                                    <option value="Komisi A">Komisi A</option>
                                                    <option value="Komisi B">Komisi B</option>
                                                    <option value="Komisi C">Komisi C</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="jenis_dokumen">Jenis Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select id="jenis_dokumen" name="jenis_dokumen" required="required"
                                                    class="form-control">
                                                    <option value="" disabled selected>Pilih Jenis Dokumen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Tanggal Dokumen -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="tanggal_dokumen">Tanggal Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="date" id="tanggal_dokumen" name="tanggal_dokumen"
                                                    required="required" class="form-control">
                                            </div>
                                        </div>
                                        <!-- File Path -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="file_path">Upload File <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="file" id="file_path" name="file_path"
                                                    accept="application/pdf" required="required" class="form-control">
                                                <small>* Hanya file PDF, maksimal 10MB</small>
                                            </div>
                                        </div>
                                        <!-- Diunggah Oleh -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="diunggah_oleh">Diunggah Oleh <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="diunggah_oleh" name="diunggah_oleh"
                                                    required="required" readonly="readonly"
                                                    value="<?php echo $_SESSION['nama'];?>" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Reset</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
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

    <script>
    const dokumenOptions = {
        "Pengurus Harian": [
            "Notulensi",
            "Proposal",
            "Laporan Pertanggung Jawaban",
            "Dokumentasi"
        ],
        "Komisi A": [
            "Rencana Kerja Tahunan",
            "Format Administrasi",
            "Laporan Quartil",
            "AD ART",
            "Dokumentasi"
        ],
        "Komisi B": [
            "Undang-undang",
            "Materi Legislatis",
            "Dokumentasi"
        ],
        "Komisi C": [
            "Musyawarah Mahasiswa",
            "Penilaian UKM",
            "Dokumentasi"
        ]
    };

    document.getElementById('komisi').addEventListener('change', function() {
        const jenisDokumen = document.getElementById('jenis_dokumen');
        jenisDokumen.innerHTML = '<option value="" disabled selected>Pilih Jenis Dokumen</option>';

        const selectedKomisi = this.value;
        if (dokumenOptions[selectedKomisi]) {
            dokumenOptions[selectedKomisi].forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.textContent = option;
                jenisDokumen.appendChild(opt);
            });
        }
    });
    </script>

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