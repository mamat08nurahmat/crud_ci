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
        <h2 style="margin-top:0px">Office Read</h2>
        <table class="table">
	    <tr><td>Office Type</td><td><?php echo $office_type; ?></td></tr>
	    <tr><td>Office Name</td><td><?php echo $office_name; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('office') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>