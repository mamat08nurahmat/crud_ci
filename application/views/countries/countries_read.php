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
        <h2 style="margin-top:0px">Countries Read</h2>
        <table class="table">
	    <tr><td>Iso</td><td><?php echo $iso; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Printable Name</td><td><?php echo $printable_name; ?></td></tr>
	    <tr><td>Iso3</td><td><?php echo $iso3; ?></td></tr>
	    <tr><td>Numcode</td><td><?php echo $numcode; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('countries') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>