<?php

/* 
 *  CodeIgniter
 * 
 *  An open source application development framework for PHP
 * 
 *  This content is released under the MIT License (MIT)
 * 
 *  Copyright (c) 2014-2019 British Columbia Institute of Technology
 *  Copyright (c) 2019-2020 CodeIgniter Foundation
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 *  @package    CodeIgniter
 *  @author     CodeIgniter Dev Team
 *  @copyright  2019-2020 CodeIgniter Foundation
 *  @license    https://opensource.org/licenses/MIT  MIT License
 *  @link       https://codeigniter.com
 *  @since      Version 4.0.0
 *  @filesource
 *  

 *  --------------------- xxx My Codigo xxx -------------------------
 * 
 *   This content is released under the MIT License (MIT)
 * 
 *   @Proyecto: MyCi4_PHPAuth
 *   @Autor:    BlayMo
 *   @Objeto:   Aprendizaje/Desarrollo 
 *   @Comienzo: 27-09-2020
 *   @licencia  http://opensource.org/licenses/MIT  MIT License
 *   @link      https://github.com/BlayMo
 *   @Version   1.0.0
 * 
 *   @mail: expresoweb2019@gmail.com
 * 
 *   PHP 7.4.4 + Codeigniter 4.0.4 + Bootstrap v4.5.2
 *   Script creado el 28-09-2020
 *   28 sept. 2020
 * 
 */


?>
<div class='card shadow mb-4' style='margin-bottom: 50px' >
    <div class='card-header py-3'>
        <h4 class='m-0 font-weight-bold text-primary'><?php echo $button ?> Admin Users</h4>
    </div>
    <div class='card-body'>
        <form> 
            <?php echo form_open($action); ?>
            <div class="form-group">
                <label for="varchar">Email <?php echo '<span style="color:red"><small>' . $validation->getError('email') . '</small></span>' ?></label>
                <input type="text" class="form-control" name="" id="email" placeholder="Email" value="<?php echo $email; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo '<span style="color:red"><small>' . $validation->getError('password') . '</small></span>' ?></label>
                <input type="text" class="form-control" name="" id="password" placeholder="Password" value="<?php echo $password; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="varchar">Username <?php echo '<span style="color:red"><small>' . $validation->getError('username') . '</small></span>' ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
                <label for="tinyint">Status <?php echo '<span style="color:red"><small>' . $validation->getError('status') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="status" placeholder="Status" value="<?php echo $status; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="tinyint">Verified <?php echo '<span style="color:red"><small>' . $validation->getError('verified') . '</small></span>' ?></label>
                <input type="text" class="form-control" name="verified" id="verified" placeholder="Verified" value="<?php echo $verified; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="tinyint">Resettable <?php echo '<span style="color:red"><small>' . $validation->getError('resettable') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="resettable" placeholder="Resettable" value="<?php echo $resettable; ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="int">Roles Mask <?php echo '<span style="color:red"><small>' . $validation->getError('roles_mask') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="roles_mask" placeholder="Roles Mask" value="<?php echo $roles_mask; ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="int">Registered <?php echo '<span style="color:red"><small>' . $validation->getError('registered') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="registered" placeholder="Registered" value="<?php echo $registered; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="int">Last Login <?php echo '<span style="color:red"><small>' . $validation->getError('last_login') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="mediumint">Force Logout <?php echo '<span style="color:red"><small>' . $validation->getError('force_logout') . '</small></span>' ?></label>
                <input type="text" class="form-control"  id="force_logout" placeholder="Force Logout" value="<?php echo $force_logout; ?>" readonly />
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('usersadmin/otrapass/' . $id) ?>" class="btn btn-danger">Up Password</a>
            <a href="<?php echo site_url('usersadmin/otromail/' . $id) ?>" class="btn btn-danger">Up Email</a>
            <a href="<?php echo site_url($retorno) ?>" class="btn btn-default">Cancel</a>
        </form>
        <hr/>

    </div>
</div>
