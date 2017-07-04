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
        <h2 style="margin-top:0px">Login List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('login/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('login/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('login'); ?>" class="btn btn-default">Reset</a>
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
		<th>Username</th>
		<th>Password</th>
		<th>User Nama</th>
		<th>User Email</th>
		<th>User Level</th>
		<th>User Status</th>
		<th>Foto</th>
		<th>Action</th>
            </tr><?php
            foreach ($login_data as $login)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $login->username ?></td>
			<td><?php echo $login->password ?></td>
			<td><?php echo $login->user_nama ?></td>
			<td><?php echo $login->user_email ?></td>
			<td><?php echo $login->user_level ?></td>
			<td><?php echo $login->user_status ?></td>
			<td><?php echo $login->foto ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('login/read/'.$login->user_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('login/update/'.$login->user_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('login/delete/'.$login->user_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('login/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('login/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>