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
        <h2 style="margin-top:0px">Product <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Product Name <?php echo form_error('product_name') ?></label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>" />
        </div>
	    <input type="hidden" name="productID" value="<?php echo $productID; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>