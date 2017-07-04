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
        <h2 style="margin-top:0px">Sales_npp Read</h2>
        <table class="table">
	    <tr><td>Npp</td><td><?php echo $npp; ?></td></tr>
	    <tr><td>Sales Name</td><td><?php echo $sales_name; ?></td></tr>
	    <tr><td>Activedate</td><td><?php echo $activedate; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sales_npp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>