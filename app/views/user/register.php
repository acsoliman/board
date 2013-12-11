
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