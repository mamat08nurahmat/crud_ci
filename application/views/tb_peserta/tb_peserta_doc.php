<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tb_peserta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
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
		
            </tr><?php
            foreach ($tb_peserta_data as $tb_peserta)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_peserta->email ?></td>
		      <td><?php echo $tb_peserta->username ?></td>
		      <td><?php echo $tb_peserta->password ?></td>
		      <td><?php echo $tb_peserta->nisn ?></td>
		      <td><?php echo $tb_peserta->nama ?></td>
		      <td><?php echo $tb_peserta->nama_panggilan ?></td>
		      <td><?php echo $tb_peserta->jenis_kelamin ?></td>
		      <td><?php echo $tb_peserta->agama ?></td>
		      <td><?php echo $tb_peserta->ket_agama ?></td>
		      <td><?php echo $tb_peserta->tempat_lahir ?></td>
		      <td><?php echo $tb_peserta->tanggal_lahir ?></td>
		      <td><?php echo $tb_peserta->berat_badan ?></td>
		      <td><?php echo $tb_peserta->tinggi_badan ?></td>
		      <td><?php echo $tb_peserta->golongan_darah ?></td>
		      <td><?php echo $tb_peserta->status_anak ?></td>
		      <td><?php echo $tb_peserta->anak_ke ?></td>
		      <td><?php echo $tb_peserta->jumlah_saudara ?></td>
		      <td><?php echo $tb_peserta->tmp_tinggal_dengan ?></td>
		      <td><?php echo $tb_peserta->tmp_ket_tinggal_dengan ?></td>
		      <td><?php echo $tb_peserta->tmp_alamat ?></td>
		      <td><?php echo $tb_peserta->tmp_telepon ?></td>
		      <td><?php echo $tb_peserta->tmp_jarak_sekolah ?></td>
		      <td><?php echo $tb_peserta->tmp_kendaraan ?></td>
		      <td><?php echo $tb_peserta->ort_nama_ayah ?></td>
		      <td><?php echo $tb_peserta->ort_pekerjaan_ayah ?></td>
		      <td><?php echo $tb_peserta->ort_ket_pekerjaan_ayah ?></td>
		      <td><?php echo $tb_peserta->ort_nama_ibu ?></td>
		      <td><?php echo $tb_peserta->ort_pekerjaan_ibu ?></td>
		      <td><?php echo $tb_peserta->ort_ket_pekerjaan_ibu ?></td>
		      <td><?php echo $tb_peserta->ort_alamat ?></td>
		      <td><?php echo $tb_peserta->ort_telepon ?></td>
		      <td><?php echo $tb_peserta->ort_penghasilan ?></td>
		      <td><?php echo $tb_peserta->ska_nama ?></td>
		      <td><?php echo $tb_peserta->ska_status ?></td>
		      <td><?php echo $tb_peserta->ska_alamat ?></td>
		      <td><?php echo $tb_peserta->ska_telepon ?></td>
		      <td><?php echo $tb_peserta->ska_kelas ?></td>
		      <td><?php echo $tb_peserta->ska_tahun_lulus ?></td>
		      <td><?php echo $tb_peserta->ska_no_ijazah ?></td>
		      <td><?php echo $tb_peserta->nil_bin_1 ?></td>
		      <td><?php echo $tb_peserta->nil_bin_2 ?></td>
		      <td><?php echo $tb_peserta->nil_bin_3 ?></td>
		      <td><?php echo $tb_peserta->nil_bin_4 ?></td>
		      <td><?php echo $tb_peserta->nil_bin_5 ?></td>
		      <td><?php echo $tb_peserta->nil_bin_rata ?></td>
		      <td><?php echo $tb_peserta->nil_big_1 ?></td>
		      <td><?php echo $tb_peserta->nil_big_2 ?></td>
		      <td><?php echo $tb_peserta->nil_big_3 ?></td>
		      <td><?php echo $tb_peserta->nil_big_4 ?></td>
		      <td><?php echo $tb_peserta->nil_big_5 ?></td>
		      <td><?php echo $tb_peserta->nil_big_rata ?></td>
		      <td><?php echo $tb_peserta->nil_mat_1 ?></td>
		      <td><?php echo $tb_peserta->nil_mat_2 ?></td>
		      <td><?php echo $tb_peserta->nil_mat_3 ?></td>
		      <td><?php echo $tb_peserta->nil_mat_4 ?></td>
		      <td><?php echo $tb_peserta->nil_mat_5 ?></td>
		      <td><?php echo $tb_peserta->nil_mat_rata ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_1 ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_2 ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_3 ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_4 ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_5 ?></td>
		      <td><?php echo $tb_peserta->nil_ipa_rata ?></td>
		      <td><?php echo $tb_peserta->nil_ips_1 ?></td>
		      <td><?php echo $tb_peserta->nil_ips_2 ?></td>
		      <td><?php echo $tb_peserta->nil_ips_3 ?></td>
		      <td><?php echo $tb_peserta->nil_ips_4 ?></td>
		      <td><?php echo $tb_peserta->nil_ips_5 ?></td>
		      <td><?php echo $tb_peserta->nil_ips_rata ?></td>
		      <td><?php echo $tb_peserta->status_pendaftaran ?></td>
		      <td><?php echo $tb_peserta->status_biodata ?></td>
		      <td><?php echo $tb_peserta->status_verifikasi ?></td>
		      <td><?php echo $tb_peserta->status_seleksi ?></td>
		      <td><?php echo $tb_peserta->created_at ?></td>
		      <td><?php echo $tb_peserta->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>