 <?php
if ($user->hasError()) : ?>
    <div class="alert alert-block">
    <h4 class="alert-heading">Registration error!</h4>
<?php
    if (!empty($user->validation_errors['username']['length'])) : ?>
        <div>Your <em>username</em> must be between
        <?php eh($user->validation['username']['length'][1]) ?> and
        <?php eh($user->validation['username']['length'][2]) ?> characters in length.
        </div>
<?php endif ?>

<?php
    if (!empty($user->validation_errors['password']['length'])) : ?>
        <div>Your <em>password</em> must be
        between
        <?php eh($user->validation['password']['length'][1]) ?> and
        <?php eh($user->validation['password']['length'][2]) ?> characters in length.
        </div>
<?php endif ?>
    </div>

<?php
elseif ($is_error) : ?> 
    <div class="alert alert-block alert-error">
        <h4 class="alert-heading">Registration error!</h4>
        <div><?php echo $error_message ?></div>
    </div>

<?php
elseif ($user_exist) : ?>
    <div class="alert alert-block alert-error">
        <h4 class="alert-heading">Registration error!</h4>
        <div>Account already exist!</div>
    </div>

<?php endif ?>

<form class="well" method="post" action="#">
	
	<label>Username</label>
		<input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
	<label>Password</label>
		<input type="password" class="span2" name="password" value="<?php eh(Param::get('password')) ?>">
	<br />
	<label>Retype Password</label>
		<input type="password" class="span2" name="repassword" value="<?php eh(Param::get('repassword')) ?>">
	<br />
		<input type="hidden" name="page_next" value="register_end">
	<button type="submit" class="btn btn-primary">Create</button>

</form>