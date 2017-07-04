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
        <h2 style="margin-top:0px">Customers Read</h2>
        <table class="table">
	    <tr><td>FirstName</td><td><?php echo $FirstName; ?></td></tr>
	    <tr><td>LastName</td><td><?php echo $LastName; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>City</td><td><?php echo $city; ?></td></tr>
	    <tr><td>Country</td><td><?php echo $country; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customers') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>