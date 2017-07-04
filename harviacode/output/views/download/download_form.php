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
        <h2 style="margin-top:0px">Download <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tanggal Upload <?php echo form_error('tanggal_upload') ?></label>
            <input type="text" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Tanggal Upload" value="<?php echo $tanggal_upload; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama File <?php echo form_error('nama_file') ?></label>
            <input type="text" class="form-control" name="nama_file" id="nama_file" placeholder="Nama File" value="<?php echo $nama_file; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tipe File <?php echo form_error('tipe_file') ?></label>
            <input type="text" class="form-control" name="tipe_file" id="tipe_file" placeholder="Tipe File" value="<?php echo $tipe_file; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ukuran File <?php echo form_error('ukuran_file') ?></label>
            <input type="text" class="form-control" name="ukuran_file" id="ukuran_file" placeholder="Ukuran File" value="<?php echo $ukuran_file; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">File <?php echo form_error('file') ?></label>
            <input type="text" class="form-control" name="file" id="file" placeholder="File" value="<?php echo $file; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('download') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>