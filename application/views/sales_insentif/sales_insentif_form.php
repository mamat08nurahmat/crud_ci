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
        <h2 style="margin-top:0px">Sales_insentif <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Performance <?php echo form_error('performance') ?></label>
            <input type="text" class="form-control" name="performance" id="performance" placeholder="Performance" value="<?php echo $performance; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Insentif <?php echo form_error('insentif') ?></label>
            <input type="text" class="form-control" name="insentif" id="insentif" placeholder="Insentif" value="<?php echo $insentif; ?>" />
        </div>
	    <input type="hidden" name="npp" value="<?php echo $npp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sales_insentif') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>