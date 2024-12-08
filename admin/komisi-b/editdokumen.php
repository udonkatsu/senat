<!DOCTYPE html>
<?php
session_start();
include "../login/ceksession.php";
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
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../img/icon.ico">

    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
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
                            <h3>Edit Dokumen</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Dokumen ><small>Edit Dokumen</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="proses/proses_editdokumen.php" method="post"
                                        enctype="multipart/form-data" id="edit-form"
                                        class="form-horizontal form-label-left">
                                        <?php
                                          include '../../koneksi/koneksi.php';
                                          $id = mysqli_real_escape_string($db, $_GET['id_dokumen']);
                                          $sql = "SELECT * FROM tb_dokumen WHERE id_dokumen = '$id'";
                                          $query = mysqli_query($db, $sql);
                                          $data = mysqli_fetch_array($query);
                                          $tanggal_dokumen = date('Y-m-d', strtotime($data['tanggal_dokumen']));
                                        ?>
                                        <input type="hidden" name="id_dokumen" value="<?php echo $id; ?>">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="judul_dokumen">Judul Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="judul_dokumen" name="judul_dokumen"
                                                    required="required" class="form-control"
                                                    value="<?php echo $data['judul_dokumen']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="deskripsi">Deskripsi <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="deskripsi" name="deskripsi" required="required"
                                                    class="form-control"
                                                    rows="3"><?php echo $data['deskripsi']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="jenis_dokumen">Jenis Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select id="jenis_dokumen" name="jenis_dokumen" required="required"
                                                    class="form-control">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="komisi">Komisi
                                                <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="komisi" name="komisi" required="required"
                                                    class="form-control" value="<?php echo $data['komisi']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="tanggal_dokumen">Tanggal Dokumen <span
                                                    class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="date" id="tanggal_dokumen" name="tanggal_dokumen"
                                                    required="required" class="form-control"
                                                    value="<?php echo $tanggal_dokumen; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="file_path">File Dokumen <span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="file" id="file_path" name="file_path" class="form-control">
                                                <a href="../../dokumen/<?php echo $data['file_path']; ?>"
                                                    target="_blank"><b>Lihat
                                                        File Sebelumnya</b></a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="diunggah_oleh">Diunggah Oleh</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="diunggah_oleh" name="diunggah_oleh"
                                                    readonly="readonly" class="form-control"
                                                    value="<?php echo $data['diunggah_oleh']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                for="tanggal_upload">Tanggal Upload</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="tanggal_upload" name="tanggal_upload"
                                                    readonly="readonly" class="form-control"
                                                    value="<?php echo $data['tanggal_upload']; ?>">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="index.php" class="btn btn-primary">Batal</a>
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
    const jenisDokumenOptions = {
        "Pengurus Harian": [
            "Notulensi", "Proposal", "Laporan Pertanggung Jawaban", "Dokumentasi"
        ],
        "Komisi A": [
            "Rencana Kerja Tahunan", "Format Administrasi", "Laporan Quartil", "AD ART", "Dokumentasi"
        ],
        "Komisi B": [
            "Undang-undang", "Materi Legislatis", "Dokumentasi"
        ],
        "Komisi C": [
            "Musyawarah Mahasiswa", "Penilaian UKM", "Dokumentasi"
        ]
    };

    // Inisialisasi dropdown
    const komisiDropdown = document.getElementById('komisi');
    const jenisDokumenDropdown = document.getElementById('jenis_dokumen');

    function populateJenisDokumen(selectedKomisi, currentValue = '') {
        // Kosongkan opsi sebelumnya
        jenisDokumenDropdown.innerHTML = '';

        // Tambahkan opsi berdasarkan komisi yang dipilih
        if (jenisDokumenOptions[selectedKomisi]) {
            jenisDokumenOptions[selectedKomisi].forEach((jenis) => {
                const option = document.createElement('option');
                option.value = jenis;
                option.textContent = jenis;

                // Pilih default jika sesuai dengan nilai saat ini
                if (jenis === currentValue) {
                    option.selected = true;
                }

                jenisDokumenDropdown.appendChild(option);
            });
        }
    }

    // Jalankan saat halaman dimuat (untuk data yang sedang diedit)
    document.addEventListener('DOMContentLoaded', () => {
        const selectedKomisi = komisiDropdown.value;
        const currentJenisDokumen = "<?php echo $data['jenis_dokumen']; ?>";
        populateJenisDokumen(selectedKomisi, currentJenisDokumen);
    });

    // Ubah isi dropdown Jenis Dokumen berdasarkan pilihan Komisi
    komisiDropdown.addEventListener('change', () => {
        populateJenisDokumen(komisiDropdown.value);
    });
    </script>

    <!-- jQuery -->
    <script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Parsley -->
    <script src="../../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../../assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../assets/build/js/custom.min.js"></script>
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