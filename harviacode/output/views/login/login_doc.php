<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Login List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>User Nama</th>
		<th>User Email</th>
		<th>User Level</th>
		<th>User Status</th>
		<th>Foto</th>
		
            </tr><?php
            foreach ($login_data as $login)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $login->username ?></td>
		      <td><?php echo $login->password ?></td>
		      <td><?php echo $login->user_nama ?></td>
		      <td><?php echo $login->user_email ?></td>
		      <td><?php echo $login->user_level ?></td>
		      <td><?php echo $login->user_status ?></td>
		      <td><?php echo $login->foto ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>