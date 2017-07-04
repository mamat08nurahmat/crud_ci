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
        <h2 style="margin-top:0px">Sales_mentah Read</h2>
        <table class="table">
	    <tr><td>Sales Name</td><td><?php echo $sales_name; ?></td></tr>
	    <tr><td>Sales Type</td><td><?php echo $sales_type; ?></td></tr>
	    <tr><td>OfficeID</td><td><?php echo $officeID; ?></td></tr>
	    <tr><td>Activedate</td><td><?php echo $activedate; ?></td></tr>
	    <tr><td>Grade</td><td><?php echo $grade; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Upliner Npp</td><td><?php echo $upliner_npp; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Non Activedate</td><td><?php echo $non_activedate; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Last Updatetime</td><td><?php echo $last_updatetime; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sales_mentah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>