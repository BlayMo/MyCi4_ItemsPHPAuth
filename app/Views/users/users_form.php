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
        <h4 class='m-0 font-weight-bold text-primary'><?php echo $button ?> Users</h4>
    </div>
    <div class='card-body'>
        <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
	<?php echo form_open($action); ?>
	    <div class="form-group">
            <label for="varchar">Email <?php echo  '<span style="color:red"><small>'.$validation->getError('email').'</small></span>' ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo  '<span style="color:red"><small>'.$validation->getError('password').'</small></span>' ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo  '<span style="color:red"><small>'.$validation->getError('username').'</small></span>' ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo  '<span style="color:red"><small>'.$validation->getError('status').'</small></span>' ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Verified <?php echo  '<span style="color:red"><small>'.$validation->getError('verified').'</small></span>' ?></label>
            <input type="text" class="form-control" name="verified" id="verified" placeholder="Verified" value="<?php echo $verified; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Resettable <?php echo  '<span style="color:red"><small>'.$validation->getError('resettable').'</small></span>' ?></label>
            <input type="text" class="form-control" name="resettable" id="resettable" placeholder="Resettable" value="<?php echo $resettable; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Roles Mask <?php echo  '<span style="color:red"><small>'.$validation->getError('roles_mask').'</small></span>' ?></label>
            <input type="text" class="form-control" name="roles_mask" id="roles_mask" placeholder="Roles Mask" value="<?php echo $roles_mask; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Registered <?php echo  '<span style="color:red"><small>'.$validation->getError('registered').'</small></span>' ?></label>
            <input type="text" class="form-control" name="registered" id="registered" placeholder="Registered" value="<?php echo $registered; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Last Login <?php echo  '<span style="color:red"><small>'.$validation->getError('last_login').'</small></span>' ?></label>
            <input type="text" class="form-control" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumint">Force Logout <?php echo  '<span style="color:red"><small>'.$validation->getError('force_logout').'</small></span>' ?></label>
            <input type="text" class="form-control" name="force_logout" id="force_logout" placeholder="Force Logout" value="<?php echo $force_logout; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url($retorno) ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
</div>
    </body>
</html>