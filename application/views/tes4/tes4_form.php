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
        <h2 style="margin-top:0px">Tes4 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Year <?php echo form_error('year') ?></label>
            <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?php echo $year; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Month <?php echo form_error('month') ?></label>
            <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php echo $month; ?>" />
        </div>
	    <input type="hidden" name="npp" value="<?php echo $npp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tes4') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>