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
        <h2 style="margin-top:0px">Customers <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">FirstName <?php echo form_error('FirstName') ?></label>
            <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="FirstName" value="<?php echo $FirstName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">LastName <?php echo form_error('LastName') ?></label>
            <input type="text" class="form-control" name="LastName" id="LastName" placeholder="LastName" value="<?php echo $LastName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">City <?php echo form_error('city') ?></label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Country <?php echo form_error('country') ?></label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('customers') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>