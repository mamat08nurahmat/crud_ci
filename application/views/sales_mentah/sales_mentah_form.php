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
        <h2 style="margin-top:0px">Sales_mentah <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Sales Name <?php echo form_error('sales_name') ?></label>
            <input type="text" class="form-control" name="sales_name" id="sales_name" placeholder="Sales Name" value="<?php echo $sales_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sales Type <?php echo form_error('sales_type') ?></label>
            <input type="text" class="form-control" name="sales_type" id="sales_type" placeholder="Sales Type" value="<?php echo $sales_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">OfficeID <?php echo form_error('officeID') ?></label>
            <input type="text" class="form-control" name="officeID" id="officeID" placeholder="OfficeID" value="<?php echo $officeID; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Activedate <?php echo form_error('activedate') ?></label>
            <input type="text" class="form-control" name="activedate" id="activedate" placeholder="Activedate" value="<?php echo $activedate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Grade <?php echo form_error('grade') ?></label>
            <input type="text" class="form-control" name="grade" id="grade" placeholder="Grade" value="<?php echo $grade; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Upliner Npp <?php echo form_error('upliner_npp') ?></label>
            <input type="text" class="form-control" name="upliner_npp" id="upliner_npp" placeholder="Upliner Npp" value="<?php echo $upliner_npp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Non Activedate <?php echo form_error('non_activedate') ?></label>
            <input type="text" class="form-control" name="non_activedate" id="non_activedate" placeholder="Non Activedate" value="<?php echo $non_activedate; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Address <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Last Updatetime <?php echo form_error('last_updatetime') ?></label>
            <input type="text" class="form-control" name="last_updatetime" id="last_updatetime" placeholder="Last Updatetime" value="<?php echo $last_updatetime; ?>" />
        </div>
	    <input type="hidden" name="npp" value="<?php echo $npp; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sales_mentah') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>