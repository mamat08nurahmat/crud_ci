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
        <h2>Office List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Office Type</th>
		<th>Office Name</th>
		<th>Address</th>
		<th>Phone</th>
		
            </tr><?php
            foreach ($office_data as $office)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $office->office_type ?></td>
		      <td><?php echo $office->office_name ?></td>
		      <td><?php echo $office->address ?></td>
		      <td><?php echo $office->phone ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>