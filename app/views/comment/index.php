
<h1>All comments</h1>
<div class="alert alert-block" style="background-color:#99CCFF" align="right">
	<div align="right">
		<h5 style="color:white">WELCOME <?php eh($_SESSION['username']) ?>
        <a class="btn btn-primary" href="<?php eh(url('thread/index')) ?>">Thread</a>
		<a class="btn btn-primary" href="<?php eh(url('user/logout')) ?>">Logout</a>	
	</div>
	
</div>

<?php foreach ($comments as $k => $v): ?>
<div class="comment">
	<div class="meta">
		<?php eh($k + 1) ?>:  <?php eh($v->username) ?> </br> <?php eh($v->created) ?>
	</div>
	<div>
		</br><?php eh($v->body) ?>
	</div>
</div>
</br>
<?php endforeach ?>


<div class="pager page-header">
    <?php echo $pagination_ctrl; ?>
</div>


<form class="well" method="post" action="<?php eh(url('comment/write')) ?>">
    <label>Your name</label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Comment</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($v->thread_id) ?>">
    <input type="hidden" name="page_next" value="write_end">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>