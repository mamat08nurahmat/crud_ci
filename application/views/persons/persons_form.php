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
        <h2 style="margin-top:0px">Persons <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">FirstName <?php echo form_error('firstName') ?></label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="FirstName" value="<?php echo $firstName; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">LastName <?php echo form_error('lastName') ?></label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="LastName" value="<?php echo $lastName; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Gender <?php echo form_error('gender') ?></label>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Dob <?php echo form_error('dob') ?></label>
            <input type="text" class="form-control" name="dob" id="dob" placeholder="Dob" value="<?php echo $dob; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('persons') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>