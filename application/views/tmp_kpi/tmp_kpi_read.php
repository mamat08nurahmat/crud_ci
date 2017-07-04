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
        <h2 style="margin-top:0px">Tmp_kpi Read</h2>
        <table class="table">
	    <tr><td>SALES TYPE</td><td><?php echo $SALES_TYPE; ?></td></tr>
	    <tr><td>Nama Kpi</td><td><?php echo $nama_kpi; ?></td></tr>
	    <tr><td>BOBOT</td><td><?php echo $BOBOT; ?></td></tr>
	    <tr><td>Kpiid</td><td><?php echo $kpiid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tmp_kpi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>