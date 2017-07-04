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
        <h2>Customers List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Phone</th>
		<th>Address</th>
		<th>City</th>
		<th>Country</th>
		
            </tr><?php
            foreach ($customers_data as $customers)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $customers->FirstName ?></td>
		      <td><?php echo $customers->LastName ?></td>
		      <td><?php echo $customers->phone ?></td>
		      <td><?php echo $customers->address ?></td>
		      <td><?php echo $customers->city ?></td>
		      <td><?php echo $customers->country ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>