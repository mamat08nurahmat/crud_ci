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
        <h2 style="margin-top:0px">Tb_peserta <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Nisn <?php echo form_error('nisn') ?></label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nisn" value="<?php echo $nisn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Panggilan <?php echo form_error('nama_panggilan') ?></label>
            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $nama_panggilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket Agama <?php echo form_error('ket_agama') ?></label>
            <input type="text" class="form-control" name="ket_agama" id="ket_agama" placeholder="Ket Agama" value="<?php echo $ket_agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Berat Badan <?php echo form_error('berat_badan') ?></label>
            <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" value="<?php echo $berat_badan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tinggi Badan <?php echo form_error('tinggi_badan') ?></label>
            <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" value="<?php echo $tinggi_badan; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
            <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Golongan Darah" value="<?php echo $golongan_darah; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Anak <?php echo form_error('status_anak') ?></label>
            <input type="text" class="form-control" name="status_anak" id="status_anak" placeholder="Status Anak" value="<?php echo $status_anak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Anak Ke <?php echo form_error('anak_ke') ?></label>
            <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" value="<?php echo $anak_ke; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah Saudara <?php echo form_error('jumlah_saudara') ?></label>
            <input type="text" class="form-control" name="jumlah_saudara" id="jumlah_saudara" placeholder="Jumlah Saudara" value="<?php echo $jumlah_saudara; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Tmp Tinggal Dengan <?php echo form_error('tmp_tinggal_dengan') ?></label>
            <input type="text" class="form-control" name="tmp_tinggal_dengan" id="tmp_tinggal_dengan" placeholder="Tmp Tinggal Dengan" value="<?php echo $tmp_tinggal_dengan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tmp Ket Tinggal Dengan <?php echo form_error('tmp_ket_tinggal_dengan') ?></label>
            <input type="text" class="form-control" name="tmp_ket_tinggal_dengan" id="tmp_ket_tinggal_dengan" placeholder="Tmp Ket Tinggal Dengan" value="<?php echo $tmp_ket_tinggal_dengan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tmp Alamat <?php echo form_error('tmp_alamat') ?></label>
            <input type="text" class="form-control" name="tmp_alamat" id="tmp_alamat" placeholder="Tmp Alamat" value="<?php echo $tmp_alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tmp Telepon <?php echo form_error('tmp_telepon') ?></label>
            <input type="text" class="form-control" name="tmp_telepon" id="tmp_telepon" placeholder="Tmp Telepon" value="<?php echo $tmp_telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tmp Jarak Sekolah <?php echo form_error('tmp_jarak_sekolah') ?></label>
            <input type="text" class="form-control" name="tmp_jarak_sekolah" id="tmp_jarak_sekolah" placeholder="Tmp Jarak Sekolah" value="<?php echo $tmp_jarak_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Tmp Kendaraan <?php echo form_error('tmp_kendaraan') ?></label>
            <input type="text" class="form-control" name="tmp_kendaraan" id="tmp_kendaraan" placeholder="Tmp Kendaraan" value="<?php echo $tmp_kendaraan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Nama Ayah <?php echo form_error('ort_nama_ayah') ?></label>
            <input type="text" class="form-control" name="ort_nama_ayah" id="ort_nama_ayah" placeholder="Ort Nama Ayah" value="<?php echo $ort_nama_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Ort Pekerjaan Ayah <?php echo form_error('ort_pekerjaan_ayah') ?></label>
            <input type="text" class="form-control" name="ort_pekerjaan_ayah" id="ort_pekerjaan_ayah" placeholder="Ort Pekerjaan Ayah" value="<?php echo $ort_pekerjaan_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Ket Pekerjaan Ayah <?php echo form_error('ort_ket_pekerjaan_ayah') ?></label>
            <input type="text" class="form-control" name="ort_ket_pekerjaan_ayah" id="ort_ket_pekerjaan_ayah" placeholder="Ort Ket Pekerjaan Ayah" value="<?php echo $ort_ket_pekerjaan_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Nama Ibu <?php echo form_error('ort_nama_ibu') ?></label>
            <input type="text" class="form-control" name="ort_nama_ibu" id="ort_nama_ibu" placeholder="Ort Nama Ibu" value="<?php echo $ort_nama_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Ort Pekerjaan Ibu <?php echo form_error('ort_pekerjaan_ibu') ?></label>
            <input type="text" class="form-control" name="ort_pekerjaan_ibu" id="ort_pekerjaan_ibu" placeholder="Ort Pekerjaan Ibu" value="<?php echo $ort_pekerjaan_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Ket Pekerjaan Ibu <?php echo form_error('ort_ket_pekerjaan_ibu') ?></label>
            <input type="text" class="form-control" name="ort_ket_pekerjaan_ibu" id="ort_ket_pekerjaan_ibu" placeholder="Ort Ket Pekerjaan Ibu" value="<?php echo $ort_ket_pekerjaan_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Alamat <?php echo form_error('ort_alamat') ?></label>
            <input type="text" class="form-control" name="ort_alamat" id="ort_alamat" placeholder="Ort Alamat" value="<?php echo $ort_alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Telepon <?php echo form_error('ort_telepon') ?></label>
            <input type="text" class="form-control" name="ort_telepon" id="ort_telepon" placeholder="Ort Telepon" value="<?php echo $ort_telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ort Penghasilan <?php echo form_error('ort_penghasilan') ?></label>
            <input type="text" class="form-control" name="ort_penghasilan" id="ort_penghasilan" placeholder="Ort Penghasilan" value="<?php echo $ort_penghasilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ska Nama <?php echo form_error('ska_nama') ?></label>
            <input type="text" class="form-control" name="ska_nama" id="ska_nama" placeholder="Ska Nama" value="<?php echo $ska_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Ska Status <?php echo form_error('ska_status') ?></label>
            <input type="text" class="form-control" name="ska_status" id="ska_status" placeholder="Ska Status" value="<?php echo $ska_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ska Alamat <?php echo form_error('ska_alamat') ?></label>
            <input type="text" class="form-control" name="ska_alamat" id="ska_alamat" placeholder="Ska Alamat" value="<?php echo $ska_alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ska Telepon <?php echo form_error('ska_telepon') ?></label>
            <input type="text" class="form-control" name="ska_telepon" id="ska_telepon" placeholder="Ska Telepon" value="<?php echo $ska_telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ska Kelas <?php echo form_error('ska_kelas') ?></label>
            <input type="text" class="form-control" name="ska_kelas" id="ska_kelas" placeholder="Ska Kelas" value="<?php echo $ska_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Ska Tahun Lulus <?php echo form_error('ska_tahun_lulus') ?></label>
            <input type="text" class="form-control" name="ska_tahun_lulus" id="ska_tahun_lulus" placeholder="Ska Tahun Lulus" value="<?php echo $ska_tahun_lulus; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ska No Ijazah <?php echo form_error('ska_no_ijazah') ?></label>
            <input type="text" class="form-control" name="ska_no_ijazah" id="ska_no_ijazah" placeholder="Ska No Ijazah" value="<?php echo $ska_no_ijazah; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin 1 <?php echo form_error('nil_bin_1') ?></label>
            <input type="text" class="form-control" name="nil_bin_1" id="nil_bin_1" placeholder="Nil Bin 1" value="<?php echo $nil_bin_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin 2 <?php echo form_error('nil_bin_2') ?></label>
            <input type="text" class="form-control" name="nil_bin_2" id="nil_bin_2" placeholder="Nil Bin 2" value="<?php echo $nil_bin_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin 3 <?php echo form_error('nil_bin_3') ?></label>
            <input type="text" class="form-control" name="nil_bin_3" id="nil_bin_3" placeholder="Nil Bin 3" value="<?php echo $nil_bin_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin 4 <?php echo form_error('nil_bin_4') ?></label>
            <input type="text" class="form-control" name="nil_bin_4" id="nil_bin_4" placeholder="Nil Bin 4" value="<?php echo $nil_bin_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin 5 <?php echo form_error('nil_bin_5') ?></label>
            <input type="text" class="form-control" name="nil_bin_5" id="nil_bin_5" placeholder="Nil Bin 5" value="<?php echo $nil_bin_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Bin Rata <?php echo form_error('nil_bin_rata') ?></label>
            <input type="text" class="form-control" name="nil_bin_rata" id="nil_bin_rata" placeholder="Nil Bin Rata" value="<?php echo $nil_bin_rata; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big 1 <?php echo form_error('nil_big_1') ?></label>
            <input type="text" class="form-control" name="nil_big_1" id="nil_big_1" placeholder="Nil Big 1" value="<?php echo $nil_big_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big 2 <?php echo form_error('nil_big_2') ?></label>
            <input type="text" class="form-control" name="nil_big_2" id="nil_big_2" placeholder="Nil Big 2" value="<?php echo $nil_big_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big 3 <?php echo form_error('nil_big_3') ?></label>
            <input type="text" class="form-control" name="nil_big_3" id="nil_big_3" placeholder="Nil Big 3" value="<?php echo $nil_big_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big 4 <?php echo form_error('nil_big_4') ?></label>
            <input type="text" class="form-control" name="nil_big_4" id="nil_big_4" placeholder="Nil Big 4" value="<?php echo $nil_big_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big 5 <?php echo form_error('nil_big_5') ?></label>
            <input type="text" class="form-control" name="nil_big_5" id="nil_big_5" placeholder="Nil Big 5" value="<?php echo $nil_big_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Big Rata <?php echo form_error('nil_big_rata') ?></label>
            <input type="text" class="form-control" name="nil_big_rata" id="nil_big_rata" placeholder="Nil Big Rata" value="<?php echo $nil_big_rata; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat 1 <?php echo form_error('nil_mat_1') ?></label>
            <input type="text" class="form-control" name="nil_mat_1" id="nil_mat_1" placeholder="Nil Mat 1" value="<?php echo $nil_mat_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat 2 <?php echo form_error('nil_mat_2') ?></label>
            <input type="text" class="form-control" name="nil_mat_2" id="nil_mat_2" placeholder="Nil Mat 2" value="<?php echo $nil_mat_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat 3 <?php echo form_error('nil_mat_3') ?></label>
            <input type="text" class="form-control" name="nil_mat_3" id="nil_mat_3" placeholder="Nil Mat 3" value="<?php echo $nil_mat_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat 4 <?php echo form_error('nil_mat_4') ?></label>
            <input type="text" class="form-control" name="nil_mat_4" id="nil_mat_4" placeholder="Nil Mat 4" value="<?php echo $nil_mat_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat 5 <?php echo form_error('nil_mat_5') ?></label>
            <input type="text" class="form-control" name="nil_mat_5" id="nil_mat_5" placeholder="Nil Mat 5" value="<?php echo $nil_mat_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Mat Rata <?php echo form_error('nil_mat_rata') ?></label>
            <input type="text" class="form-control" name="nil_mat_rata" id="nil_mat_rata" placeholder="Nil Mat Rata" value="<?php echo $nil_mat_rata; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa 1 <?php echo form_error('nil_ipa_1') ?></label>
            <input type="text" class="form-control" name="nil_ipa_1" id="nil_ipa_1" placeholder="Nil Ipa 1" value="<?php echo $nil_ipa_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa 2 <?php echo form_error('nil_ipa_2') ?></label>
            <input type="text" class="form-control" name="nil_ipa_2" id="nil_ipa_2" placeholder="Nil Ipa 2" value="<?php echo $nil_ipa_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa 3 <?php echo form_error('nil_ipa_3') ?></label>
            <input type="text" class="form-control" name="nil_ipa_3" id="nil_ipa_3" placeholder="Nil Ipa 3" value="<?php echo $nil_ipa_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa 4 <?php echo form_error('nil_ipa_4') ?></label>
            <input type="text" class="form-control" name="nil_ipa_4" id="nil_ipa_4" placeholder="Nil Ipa 4" value="<?php echo $nil_ipa_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa 5 <?php echo form_error('nil_ipa_5') ?></label>
            <input type="text" class="form-control" name="nil_ipa_5" id="nil_ipa_5" placeholder="Nil Ipa 5" value="<?php echo $nil_ipa_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ipa Rata <?php echo form_error('nil_ipa_rata') ?></label>
            <input type="text" class="form-control" name="nil_ipa_rata" id="nil_ipa_rata" placeholder="Nil Ipa Rata" value="<?php echo $nil_ipa_rata; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips 1 <?php echo form_error('nil_ips_1') ?></label>
            <input type="text" class="form-control" name="nil_ips_1" id="nil_ips_1" placeholder="Nil Ips 1" value="<?php echo $nil_ips_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips 2 <?php echo form_error('nil_ips_2') ?></label>
            <input type="text" class="form-control" name="nil_ips_2" id="nil_ips_2" placeholder="Nil Ips 2" value="<?php echo $nil_ips_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips 3 <?php echo form_error('nil_ips_3') ?></label>
            <input type="text" class="form-control" name="nil_ips_3" id="nil_ips_3" placeholder="Nil Ips 3" value="<?php echo $nil_ips_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips 4 <?php echo form_error('nil_ips_4') ?></label>
            <input type="text" class="form-control" name="nil_ips_4" id="nil_ips_4" placeholder="Nil Ips 4" value="<?php echo $nil_ips_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips 5 <?php echo form_error('nil_ips_5') ?></label>
            <input type="text" class="form-control" name="nil_ips_5" id="nil_ips_5" placeholder="Nil Ips 5" value="<?php echo $nil_ips_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nil Ips Rata <?php echo form_error('nil_ips_rata') ?></label>
            <input type="text" class="form-control" name="nil_ips_rata" id="nil_ips_rata" placeholder="Nil Ips Rata" value="<?php echo $nil_ips_rata; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Pendaftaran <?php echo form_error('status_pendaftaran') ?></label>
            <input type="text" class="form-control" name="status_pendaftaran" id="status_pendaftaran" placeholder="Status Pendaftaran" value="<?php echo $status_pendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Biodata <?php echo form_error('status_biodata') ?></label>
            <input type="text" class="form-control" name="status_biodata" id="status_biodata" placeholder="Status Biodata" value="<?php echo $status_biodata; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Verifikasi <?php echo form_error('status_verifikasi') ?></label>
            <input type="text" class="form-control" name="status_verifikasi" id="status_verifikasi" placeholder="Status Verifikasi" value="<?php echo $status_verifikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Seleksi <?php echo form_error('status_seleksi') ?></label>
            <input type="text" class="form-control" name="status_seleksi" id="status_seleksi" placeholder="Status Seleksi" value="<?php echo $status_seleksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_peserta') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>