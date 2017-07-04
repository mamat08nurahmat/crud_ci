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
        <h2 style="margin-top:0px">Login <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Nama <?php echo form_error('user_nama') ?></label>
            <input type="text" class="form-control" name="user_nama" id="user_nama" placeholder="User Nama" value="<?php echo $user_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Email <?php echo form_error('user_email') ?></label>
            <input type="text" class="form-control" name="user_email" id="user_email" placeholder="User Email" value="<?php echo $user_email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Level <?php echo form_error('user_level') ?></label>
            <input type="text" class="form-control" name="user_level" id="user_level" placeholder="User Level" value="<?php echo $user_level; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Status <?php echo form_error('user_status') ?></label>
            <input type="text" class="form-control" name="user_status" id="user_status" placeholder="User Status" value="<?php echo $user_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('login') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>