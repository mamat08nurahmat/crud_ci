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
        <h2 style="margin-top:0px">Sales_target <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="float">Target <?php echo form_error('target') ?></label>
            <input type="text" class="form-control" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Realisasi <?php echo form_error('realisasi') ?></label>
            <input type="text" class="form-control" name="realisasi" id="realisasi" placeholder="Realisasi" value="<?php echo $realisasi; ?>" />
        </div>
	    <input type="hidden" name="npp" value="<?php echo $npp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sales_target') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>