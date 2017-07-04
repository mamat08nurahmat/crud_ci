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
        <h2>Countries List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Iso</th>
		<th>Name</th>
		<th>Printable Name</th>
		<th>Iso3</th>
		<th>Numcode</th>
		<th>Created Date</th>
		
            </tr><?php
            foreach ($countries_data as $countries)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $countries->iso ?></td>
		      <td><?php echo $countries->name ?></td>
		      <td><?php echo $countries->printable_name ?></td>
		      <td><?php echo $countries->iso3 ?></td>
		      <td><?php echo $countries->numcode ?></td>
		      <td><?php echo $countries->created_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>