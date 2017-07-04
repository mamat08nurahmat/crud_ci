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
        <h2 style="margin-top:0px">Sales <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Npp <?php echo form_error('npp') ?></label>
            <input type="text" class="form-control" name="npp" id="npp" placeholder="Npp" value="<?php echo $npp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sales Type <?php echo form_error('sales_type') ?></label>
            <input type="text" class="form-control" name="sales_type" id="sales_type" placeholder="Sales Type" value="<?php echo $sales_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upliner <?php echo form_error('upliner') ?></label>
            <input type="text" class="form-control" name="upliner" id="upliner" placeholder="Upliner" value="<?php echo $upliner; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">OfficeID <?php echo form_error('officeID') ?></label>
            <input type="text" class="form-control" name="officeID" id="officeID" placeholder="OfficeID" value="<?php echo $officeID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sales') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>