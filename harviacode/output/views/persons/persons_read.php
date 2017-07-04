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
        <h2 style="margin-top:0px">Persons Read</h2>
        <table class="table">
	    <tr><td>FirstName</td><td><?php echo $firstName; ?></td></tr>
	    <tr><td>LastName</td><td><?php echo $lastName; ?></td></tr>
	    <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Dob</td><td><?php echo $dob; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('persons') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>