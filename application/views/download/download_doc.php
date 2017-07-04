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
        <h2>Download List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal Upload</th>
		<th>Nama File</th>
		<th>Tipe File</th>
		<th>Ukuran File</th>
		<th>File</th>
		
            </tr><?php
            foreach ($download_data as $download)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $download->tanggal_upload ?></td>
		      <td><?php echo $download->nama_file ?></td>
		      <td><?php echo $download->tipe_file ?></td>
		      <td><?php echo $download->ukuran_file ?></td>
		      <td><?php echo $download->file ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>