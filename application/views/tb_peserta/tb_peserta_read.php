<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_peserta Read</h2>
        <table class="table">
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Nisn</td><td><?php echo $nisn; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Nama Panggilan</td><td><?php echo $nama_panggilan; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Ket Agama</td><td><?php echo $ket_agama; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Berat Badan</td><td><?php echo $berat_badan; ?></td></tr>
	    <tr><td>Tinggi Badan</td><td><?php echo $tinggi_badan; ?></td></tr>
	    <tr><td>Golongan Darah</td><td><?php echo $golongan_darah; ?></td></tr>
	    <tr><td>Status Anak</td><td><?php echo $status_anak; ?></td></tr>
	    <tr><td>Anak Ke</td><td><?php echo $anak_ke; ?></td></tr>
	    <tr><td>Jumlah Saudara</td><td><?php echo $jumlah_saudara; ?></td></tr>
	    <tr><td>Tmp Tinggal Dengan</td><td><?php echo $tmp_tinggal_dengan; ?></td></tr>
	    <tr><td>Tmp Ket Tinggal Dengan</td><td><?php echo $tmp_ket_tinggal_dengan; ?></td></tr>
	    <tr><td>Tmp Alamat</td><td><?php echo $tmp_alamat; ?></td></tr>
	    <tr><td>Tmp Telepon</td><td><?php echo $tmp_telepon; ?></td></tr>
	    <tr><td>Tmp Jarak Sekolah</td><td><?php echo $tmp_jarak_sekolah; ?></td></tr>
	    <tr><td>Tmp Kendaraan</td><td><?php echo $tmp_kendaraan; ?></td></tr>
	    <tr><td>Ort Nama Ayah</td><td><?php echo $ort_nama_ayah; ?></td></tr>
	    <tr><td>Ort Pekerjaan Ayah</td><td><?php echo $ort_pekerjaan_ayah; ?></td></tr>
	    <tr><td>Ort Ket Pekerjaan Ayah</td><td><?php echo $ort_ket_pekerjaan_ayah; ?></td></tr>
	    <tr><td>Ort Nama Ibu</td><td><?php echo $ort_nama_ibu; ?></td></tr>
	    <tr><td>Ort Pekerjaan Ibu</td><td><?php echo $ort_pekerjaan_ibu; ?></td></tr>
	    <tr><td>Ort Ket Pekerjaan Ibu</td><td><?php echo $ort_ket_pekerjaan_ibu; ?></td></tr>
	    <tr><td>Ort Alamat</td><td><?php echo $ort_alamat; ?></td></tr>
	    <tr><td>Ort Telepon</td><td><?php echo $ort_telepon; ?></td></tr>
	    <tr><td>Ort Penghasilan</td><td><?php echo $ort_penghasilan; ?></td></tr>
	    <tr><td>Ska Nama</td><td><?php echo $ska_nama; ?></td></tr>
	    <tr><td>Ska Status</td><td><?php echo $ska_status; ?></td></tr>
	    <tr><td>Ska Alamat</td><td><?php echo $ska_alamat; ?></td></tr>
	    <tr><td>Ska Telepon</td><td><?php echo $ska_telepon; ?></td></tr>
	    <tr><td>Ska Kelas</td><td><?php echo $ska_kelas; ?></td></tr>
	    <tr><td>Ska Tahun Lulus</td><td><?php echo $ska_tahun_lulus; ?></td></tr>
	    <tr><td>Ska No Ijazah</td><td><?php echo $ska_no_ijazah; ?></td></tr>
	    <tr><td>Nil Bin 1</td><td><?php echo $nil_bin_1; ?></td></tr>
	    <tr><td>Nil Bin 2</td><td><?php echo $nil_bin_2; ?></td></tr>
	    <tr><td>Nil Bin 3</td><td><?php echo $nil_bin_3; ?></td></tr>
	    <tr><td>Nil Bin 4</td><td><?php echo $nil_bin_4; ?></td></tr>
	    <tr><td>Nil Bin 5</td><td><?php echo $nil_bin_5; ?></td></tr>
	    <tr><td>Nil Bin Rata</td><td><?php echo $nil_bin_rata; ?></td></tr>
	    <tr><td>Nil Big 1</td><td><?php echo $nil_big_1; ?></td></tr>
	    <tr><td>Nil Big 2</td><td><?php echo $nil_big_2; ?></td></tr>
	    <tr><td>Nil Big 3</td><td><?php echo $nil_big_3; ?></td></tr>
	    <tr><td>Nil Big 4</td><td><?php echo $nil_big_4; ?></td></tr>
	    <tr><td>Nil Big 5</td><td><?php echo $nil_big_5; ?></td></tr>
	    <tr><td>Nil Big Rata</td><td><?php echo $nil_big_rata; ?></td></tr>
	    <tr><td>Nil Mat 1</td><td><?php echo $nil_mat_1; ?></td></tr>
	    <tr><td>Nil Mat 2</td><td><?php echo $nil_mat_2; ?></td></tr>
	    <tr><td>Nil Mat 3</td><td><?php echo $nil_mat_3; ?></td></tr>
	    <tr><td>Nil Mat 4</td><td><?php echo $nil_mat_4; ?></td></tr>
	    <tr><td>Nil Mat 5</td><td><?php echo $nil_mat_5; ?></td></tr>
	    <tr><td>Nil Mat Rata</td><td><?php echo $nil_mat_rata; ?></td></tr>
	    <tr><td>Nil Ipa 1</td><td><?php echo $nil_ipa_1; ?></td></tr>
	    <tr><td>Nil Ipa 2</td><td><?php echo $nil_ipa_2; ?></td></tr>
	    <tr><td>Nil Ipa 3</td><td><?php echo $nil_ipa_3; ?></td></tr>
	    <tr><td>Nil Ipa 4</td><td><?php echo $nil_ipa_4; ?></td></tr>
	    <tr><td>Nil Ipa 5</td><td><?php echo $nil_ipa_5; ?></td></tr>
	    <tr><td>Nil Ipa Rata</td><td><?php echo $nil_ipa_rata; ?></td></tr>
	    <tr><td>Nil Ips 1</td><td><?php echo $nil_ips_1; ?></td></tr>
	    <tr><td>Nil Ips 2</td><td><?php echo $nil_ips_2; ?></td></tr>
	    <tr><td>Nil Ips 3</td><td><?php echo $nil_ips_3; ?></td></tr>
	    <tr><td>Nil Ips 4</td><td><?php echo $nil_ips_4; ?></td></tr>
	    <tr><td>Nil Ips 5</td><td><?php echo $nil_ips_5; ?></td></tr>
	    <tr><td>Nil Ips Rata</td><td><?php echo $nil_ips_rata; ?></td></tr>
	    <tr><td>Status Pendaftaran</td><td><?php echo $status_pendaftaran; ?></td></tr>
	    <tr><td>Status Biodata</td><td><?php echo $status_biodata; ?></td></tr>
	    <tr><td>Status Verifikasi</td><td><?php echo $status_verifikasi; ?></td></tr>
	    <tr><td>Status Seleksi</td><td><?php echo $status_seleksi; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_peserta') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>