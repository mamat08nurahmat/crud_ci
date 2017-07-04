<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Tb_peserta List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('tb_peserta/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('tb_peserta/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('tb_peserta/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Email</th>
		    <th>Username</th>
		    <th>Password</th>
		    <th>Nisn</th>
		    <th>Nama</th>
		    <th>Nama Panggilan</th>
		    <th>Jenis Kelamin</th>
		    <th>Agama</th>
		    <th>Ket Agama</th>
		    <th>Tempat Lahir</th>
		    <th>Tanggal Lahir</th>
		    <th>Berat Badan</th>
		    <th>Tinggi Badan</th>
		    <th>Golongan Darah</th>
		    <th>Status Anak</th>
		    <th>Anak Ke</th>
		    <th>Jumlah Saudara</th>
		    <th>Tmp Tinggal Dengan</th>
		    <th>Tmp Ket Tinggal Dengan</th>
		    <th>Tmp Alamat</th>
		    <th>Tmp Telepon</th>
		    <th>Tmp Jarak Sekolah</th>
		    <th>Tmp Kendaraan</th>
		    <th>Ort Nama Ayah</th>
		    <th>Ort Pekerjaan Ayah</th>
		    <th>Ort Ket Pekerjaan Ayah</th>
		    <th>Ort Nama Ibu</th>
		    <th>Ort Pekerjaan Ibu</th>
		    <th>Ort Ket Pekerjaan Ibu</th>
		    <th>Ort Alamat</th>
		    <th>Ort Telepon</th>
		    <th>Ort Penghasilan</th>
		    <th>Ska Nama</th>
		    <th>Ska Status</th>
		    <th>Ska Alamat</th>
		    <th>Ska Telepon</th>
		    <th>Ska Kelas</th>
		    <th>Ska Tahun Lulus</th>
		    <th>Ska No Ijazah</th>
		    <th>Nil Bin 1</th>
		    <th>Nil Bin 2</th>
		    <th>Nil Bin 3</th>
		    <th>Nil Bin 4</th>
		    <th>Nil Bin 5</th>
		    <th>Nil Bin Rata</th>
		    <th>Nil Big 1</th>
		    <th>Nil Big 2</th>
		    <th>Nil Big 3</th>
		    <th>Nil Big 4</th>
		    <th>Nil Big 5</th>
		    <th>Nil Big Rata</th>
		    <th>Nil Mat 1</th>
		    <th>Nil Mat 2</th>
		    <th>Nil Mat 3</th>
		    <th>Nil Mat 4</th>
		    <th>Nil Mat 5</th>
		    <th>Nil Mat Rata</th>
		    <th>Nil Ipa 1</th>
		    <th>Nil Ipa 2</th>
		    <th>Nil Ipa 3</th>
		    <th>Nil Ipa 4</th>
		    <th>Nil Ipa 5</th>
		    <th>Nil Ipa Rata</th>
		    <th>Nil Ips 1</th>
		    <th>Nil Ips 2</th>
		    <th>Nil Ips 3</th>
		    <th>Nil Ips 4</th>
		    <th>Nil Ips 5</th>
		    <th>Nil Ips Rata</th>
		    <th>Status Pendaftaran</th>
		    <th>Status Biodata</th>
		    <th>Status Verifikasi</th>
		    <th>Status Seleksi</th>
		    <th>Created At</th>
		    <th>Updated At</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "tb_peserta/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "email"},{"data": "username"},{"data": "password"},{"data": "nisn"},{"data": "nama"},{"data": "nama_panggilan"},{"data": "jenis_kelamin"},{"data": "agama"},{"data": "ket_agama"},{"data": "tempat_lahir"},{"data": "tanggal_lahir"},{"data": "berat_badan"},{"data": "tinggi_badan"},{"data": "golongan_darah"},{"data": "status_anak"},{"data": "anak_ke"},{"data": "jumlah_saudara"},{"data": "tmp_tinggal_dengan"},{"data": "tmp_ket_tinggal_dengan"},{"data": "tmp_alamat"},{"data": "tmp_telepon"},{"data": "tmp_jarak_sekolah"},{"data": "tmp_kendaraan"},{"data": "ort_nama_ayah"},{"data": "ort_pekerjaan_ayah"},{"data": "ort_ket_pekerjaan_ayah"},{"data": "ort_nama_ibu"},{"data": "ort_pekerjaan_ibu"},{"data": "ort_ket_pekerjaan_ibu"},{"data": "ort_alamat"},{"data": "ort_telepon"},{"data": "ort_penghasilan"},{"data": "ska_nama"},{"data": "ska_status"},{"data": "ska_alamat"},{"data": "ska_telepon"},{"data": "ska_kelas"},{"data": "ska_tahun_lulus"},{"data": "ska_no_ijazah"},{"data": "nil_bin_1"},{"data": "nil_bin_2"},{"data": "nil_bin_3"},{"data": "nil_bin_4"},{"data": "nil_bin_5"},{"data": "nil_bin_rata"},{"data": "nil_big_1"},{"data": "nil_big_2"},{"data": "nil_big_3"},{"data": "nil_big_4"},{"data": "nil_big_5"},{"data": "nil_big_rata"},{"data": "nil_mat_1"},{"data": "nil_mat_2"},{"data": "nil_mat_3"},{"data": "nil_mat_4"},{"data": "nil_mat_5"},{"data": "nil_mat_rata"},{"data": "nil_ipa_1"},{"data": "nil_ipa_2"},{"data": "nil_ipa_3"},{"data": "nil_ipa_4"},{"data": "nil_ipa_5"},{"data": "nil_ipa_rata"},{"data": "nil_ips_1"},{"data": "nil_ips_2"},{"data": "nil_ips_3"},{"data": "nil_ips_4"},{"data": "nil_ips_5"},{"data": "nil_ips_rata"},{"data": "status_pendaftaran"},{"data": "status_biodata"},{"data": "status_verifikasi"},{"data": "status_seleksi"},{"data": "created_at"},{"data": "updated_at"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
    </body>
</html>