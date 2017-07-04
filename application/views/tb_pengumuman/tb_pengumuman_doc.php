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
        <h2>Tb_pengumuman List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Slug</th>
		<th>Isi</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($tb_pengumuman_data as $tb_pengumuman)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_pengumuman->judul ?></td>
		      <td><?php echo $tb_pengumuman->slug ?></td>
		      <td><?php echo $tb_pengumuman->isi ?></td>
		      <td><?php echo $tb_pengumuman->created_at ?></td>
		      <td><?php echo $tb_pengumuman->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>