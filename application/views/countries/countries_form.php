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
        <h2 style="margin-top:0px">Countries <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="char">Iso <?php echo form_error('iso') ?></label>
            <input type="text" class="form-control" name="iso" id="iso" placeholder="Iso" value="<?php echo $iso; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Printable Name <?php echo form_error('printable_name') ?></label>
            <input type="text" class="form-control" name="printable_name" id="printable_name" placeholder="Printable Name" value="<?php echo $printable_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Iso3 <?php echo form_error('iso3') ?></label>
            <input type="text" class="form-control" name="iso3" id="iso3" placeholder="Iso3" value="<?php echo $iso3; ?>" />
        </div>
	    <div class="form-group">
            <label for="smallint">Numcode <?php echo form_error('numcode') ?></label>
            <input type="text" class="form-control" name="numcode" id="numcode" placeholder="Numcode" value="<?php echo $numcode; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Created Date <?php echo form_error('created_date') ?></label>
            <input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('countries') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>