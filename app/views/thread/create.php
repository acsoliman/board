<h1>Create a thread</h1>



<form class="well" method="post" action="<?php eh(url('')) ?>">
	<label>Thread</label>
	<input type="text" class="span2" name="thread" value="<?php eh(Param::get('thread')) ?>">
	<label>Your name</label>
	<input type="text" class="span2" name="name" value="<?php eh(Param::get('name')) ?>">
	<label>Comment</label>
	<textarea name="body" value="<?php eh(Param::get('body')) ?>"></textarea>
	<br />
	<input type="hidden" name="page_next" value="create_end">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>