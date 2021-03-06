<?php
class ThreadController extends AppController
{
	public function index()
	{
		$threads = Thread::getAll();
		$this->set(get_defined_vars());
		// TODO: Get all threads
		// $this->set(get_defined_vars());
	}
	
	public function view()
	{
		$thread = Thread::get(Param::get('thread_id'));
		$comments = $thread->getComments();
		
		$this->set(get_defined_vars());
	}
	
	public function write()
	{
	
	$thread = Thread::get(Param::get('thread_id'));
	$comment = new Comment;
	$page = Param::get('page_next');

	switch ($page) {
	case 'write_end':
		$comment->username = Param::get('username');
		$comment->body = Param::get('body');
		$thread->write($comment);
	break;
	default:
	throw new NotFoundException("{$page} is not found");
	break;
/* 		$thread = Thread::get(Param::get('thread_id'));
		$comment = new Comment;
		$page = Param::get('page_next');
		
		switch ($page) {
		case 'write_end':
			$comment->username = Param::get('username');
			$comment->body = Param::get('body');
			$thread->write($comment);
			break;
			
		default:
			throw new NotFoundException("{$page} is not found");
			break;
		}
		
		$this->set(get_defined_vars());
		$this->render($page); */
		
		
		
		
		
		}
		$this->set(get_defined_vars());
		$this->render($page);
	}
	
	public function create()
	{
		$thread = new Thread;
		$comment = new Comment;
		$page = Param::get('page_next', 'create');
		
		switch ($page) {
		case 'create':
			break;
		case 'create_end':
			$thread->title = Param::get('title');
			$comment->username = Param::get('username');
			$comment->body = Param::get('body');
			try {
				$thread->create($comment);
			} catch (ValidationException $e) {
				$page = 'create';
			}
			break;
		default:
			throw new NotFoundException("{$page} is not found");
			break;
		}
		
		$this->set(get_defined_vars());
		$this->render($page);
	}
			
}