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
        <h2 style="margin-top:0px">Sales_npp <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Npp <?php echo form_error('npp') ?></label>
            <input type="text" class="form-control" name="npp" id="npp" placeholder="Npp" value="<?php echo $npp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sales Name <?php echo form_error('sales_name') ?></label>
            <input type="text" class="form-control" name="sales_name" id="sales_name" placeholder="Sales Name" value="<?php echo $sales_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Activedate <?php echo form_error('activedate') ?></label>
            <input type="text" class="form-control" name="activedate" id="activedate" placeholder="Activedate" value="<?php echo $activedate; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sales_npp') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>