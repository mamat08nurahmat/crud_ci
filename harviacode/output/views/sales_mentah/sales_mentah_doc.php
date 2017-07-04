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
        <h2>Sales_mentah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Sales Name</th>
		<th>Sales Type</th>
		<th>OfficeID</th>
		<th>Activedate</th>
		<th>Grade</th>
		<th>Status</th>
		<th>Upliner Npp</th>
		<th>Keterangan</th>
		<th>Non Activedate</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Last Updatetime</th>
		
            </tr><?php
            foreach ($sales_mentah_data as $sales_mentah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sales_mentah->sales_name ?></td>
		      <td><?php echo $sales_mentah->sales_type ?></td>
		      <td><?php echo $sales_mentah->officeID ?></td>
		      <td><?php echo $sales_mentah->activedate ?></td>
		      <td><?php echo $sales_mentah->grade ?></td>
		      <td><?php echo $sales_mentah->status ?></td>
		      <td><?php echo $sales_mentah->upliner_npp ?></td>
		      <td><?php echo $sales_mentah->keterangan ?></td>
		      <td><?php echo $sales_mentah->non_activedate ?></td>
		      <td><?php echo $sales_mentah->address ?></td>
		      <td><?php echo $sales_mentah->phone ?></td>
		      <td><?php echo $sales_mentah->last_updatetime ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>