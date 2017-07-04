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
        <h2 style="margin-top:0px">Tmp_kpi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">SALES TYPE <?php echo form_error('SALES_TYPE') ?></label>
            <input type="text" class="form-control" name="SALES_TYPE" id="SALES_TYPE" placeholder="SALES TYPE" value="<?php echo $SALES_TYPE; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kpi <?php echo form_error('nama_kpi') ?></label>
            <input type="text" class="form-control" name="nama_kpi" id="nama_kpi" placeholder="Nama Kpi" value="<?php echo $nama_kpi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">BOBOT <?php echo form_error('BOBOT') ?></label>
            <input type="text" class="form-control" name="BOBOT" id="BOBOT" placeholder="BOBOT" value="<?php echo $BOBOT; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kpiid <?php echo form_error('kpiid') ?></label>
            <input type="text" class="form-control" name="kpiid" id="kpiid" placeholder="Kpiid" value="<?php echo $kpiid; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tmp_kpi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>