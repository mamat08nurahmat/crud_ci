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
        <h2 style="margin-top:0px">Login Read</h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>User Nama</td><td><?php echo $user_nama; ?></td></tr>
	    <tr><td>User Email</td><td><?php echo $user_email; ?></td></tr>
	    <tr><td>User Level</td><td><?php echo $user_level; ?></td></tr>
	    <tr><td>User Status</td><td><?php echo $user_status; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('login') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>