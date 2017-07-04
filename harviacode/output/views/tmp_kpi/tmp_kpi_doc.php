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
        <h2>Tmp_kpi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>SALES TYPE</th>
		<th>Nama Kpi</th>
		<th>BOBOT</th>
		<th>Kpiid</th>
		
            </tr><?php
            foreach ($tmp_kpi_data as $tmp_kpi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tmp_kpi->SALES_TYPE ?></td>
		      <td><?php echo $tmp_kpi->nama_kpi ?></td>
		      <td><?php echo $tmp_kpi->BOBOT ?></td>
		      <td><?php echo $tmp_kpi->kpiid ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>