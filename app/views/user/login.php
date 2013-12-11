<!--
<div class="alert alert-block" style="background-color:#99CCFF" align="right">
	<div><a class="btn btn-primary" href="<?php eh(url('user/register')) ?>">SIGN UP</a></div>
</div>

<hr>
-->
<div class="alert alert-block" style="background-color:#99CCFF" align="right">
<table width="100%">
    <tr>
        <td>
            <h1 style="color:white">LOG IN</h1>
        </td>
        
        <td align="right">
            <a class="btn btn-large btn-primary" href="<?php eh(url('user/register')) ?>">SIGN UP</a>
        </td>
    </tr>
</table>
</div>

<form class="well" method="post" action="#">
	<label>Username</label>
	<input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
	<label>Password</label>
	<input type="password" class="span2" name="password" value="<?php eh(Param::get('password')) ?>">
	<br />
	<input type="hidden" name="page_next" value="login_success">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


