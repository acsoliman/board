<h1>All threads</h1>
<div class="alert alert-block" style="background-color:#99CCFF" align="right">
	<div align="right">
		<a class="btn btn-primary" href="<?php eh(url('user/logout')) ?>">Logout</a>
	</div>
</div>

<ul>
<?php foreach ($threads as $v): ?>
	<li>
		<a href="<?php eh(url('comment/index', array('thread_id' => $v->id))) ?>">
		<?php eh($v->title) ?>
		</a>
	</li>
<?php endforeach ?>
</ul>

<div class="pager page-header">
	<?php echo $pagination_ctrl; ?>
</div>

<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">Create</a>

