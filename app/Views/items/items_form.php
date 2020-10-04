<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter4 crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <div class='card shadow mb-4' style='margin-bottom: 50px' >
     <div class='card-header py-3'>
        <h4 class='m-0 font-weight-bold text-primary'><?php echo $button ?> Items</h4>
    </div>
    <div class='card-body'>
        <h2 style="margin-top:0px">Items <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Iditem <?php echo  '<span style="color:red"><small>'.$validation->getError('iditem').'</small></span>' ?></label>
            <input type="text" class="form-control" name="iditem" id="iditem" placeholder="Iditem" value="<?php echo $iditem; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Categoria <?php echo  '<span style="color:red"><small>'.$validation->getError('id_categoria').'</small></span>' ?></label>
            <input type="text" class="form-control" name="id_categoria" id="id_categoria" placeholder="Id Categoria" value="<?php echo $id_categoria; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Item <?php echo  '<span style="color:red"><small>'.$validation->getError('item').'</small></span>' ?></label>
            <input type="text" class="form-control" name="item" id="item" placeholder="Item" value="<?php echo $item; ?>" />
        </div>
	    <div class="form-group">
            <label for="texto_item">Texto Item <?php echo '<span style="color:red"><small>'.$validation->getError('texto_item').'</small></span>' ?></label>
            <textarea class="form-control" rows="3" name="texto_item" id="texto_item" placeholder="Texto Item"><?php echo $texto_item; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo  '<span style="color:red"><small>'.$validation->getError('created_at').'</small></span>' ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo  '<span style="color:red"><small>'.$validation->getError('updated_at').'</small></span>' ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Deleted At <?php echo  '<span style="color:red"><small>'.$validation->getError('deleted_at').'</small></span>' ?></label>
            <input type="text" class="form-control" name="deleted_at" id="deleted_at" placeholder="Deleted At" value="<?php echo $deleted_at; ?>" />
        </div>
	    <input type="hidden" name="id_item" value="<?php echo $id_item; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url($retorno) ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
</div>
    </body>
</html>