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
        <h2 style="margin-top:0px">Sales_mentah List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sales_mentah/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sales_mentah/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sales_mentah'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($sales_mentah_data as $sales_mentah)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sales_mentah/read/'.$sales_mentah->npp),'Read'); 
				echo ' | '; 
				echo anchor(site_url('sales_mentah/update/'.$sales_mentah->npp),'Update'); 
				echo ' | '; 
				echo anchor(site_url('sales_mentah/delete/'.$sales_mentah->npp),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('sales_mentah/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('sales_mentah/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>