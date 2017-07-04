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
        <h2 style="margin-top:0px">Agenda <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Year <?php echo form_error('year') ?></label>
            <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?php echo $year; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Month <?php echo form_error('month') ?></label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php echo $month; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agenda <?php echo form_error('agenda') ?></label>
            <input type="text" class="form-control" name="agenda" id="agenda" placeholder="Agenda" value="<?php echo $agenda; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('agenda') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>