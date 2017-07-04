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
        <h2>Persons List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Gender</th>
		<th>Address</th>
		<th>Dob</th>
		
            </tr><?php
            foreach ($persons_data as $persons)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $persons->firstName ?></td>
		      <td><?php echo $persons->lastName ?></td>
		      <td><?php echo $persons->gender ?></td>
		      <td><?php echo $persons->address ?></td>
		      <td><?php echo $persons->dob ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>