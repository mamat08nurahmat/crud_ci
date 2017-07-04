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
        <h2 style="margin-top:0px">Office <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Office Type <?php echo form_error('office_type') ?></label>
            <input type="text" class="form-control" name="office_type" id="office_type" placeholder="Office Type" value="<?php echo $office_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Office Name <?php echo form_error('office_name') ?></label>
            <input type="text" class="form-control" name="office_name" id="office_name" placeholder="Office Name" value="<?php echo $office_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <input type="hidden" name="officeID" value="<?php echo $officeID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('office') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>