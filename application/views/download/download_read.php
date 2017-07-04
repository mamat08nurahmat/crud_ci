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
        <h2 style="margin-top:0px">Download Read</h2>
        <table class="table">
	    <tr><td>Tanggal Upload</td><td><?php echo $tanggal_upload; ?></td></tr>
	    <tr><td>Nama File</td><td><?php echo $nama_file; ?></td></tr>
	    <tr><td>Tipe File</td><td><?php echo $tipe_file; ?></td></tr>
	    <tr><td>Ukuran File</td><td><?php echo $ukuran_file; ?></td></tr>
	    <tr><td>File</td><td><?php echo $file; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('download') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>