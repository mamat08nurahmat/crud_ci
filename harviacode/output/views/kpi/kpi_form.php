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
        <h2 style="margin-top:0px">Kpi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">ProductID <?php echo form_error('productID') ?></label>
            <input type="text" class="form-control" name="productID" id="productID" placeholder="ProductID" value="<?php echo $productID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kpi <?php echo form_error('nama_kpi') ?></label>
            <input type="text" class="form-control" name="nama_kpi" id="nama_kpi" placeholder="Nama Kpi" value="<?php echo $nama_kpi; ?>" />
        </div>
	    <input type="hidden" name="kpiid" value="<?php echo $kpiid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kpi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>