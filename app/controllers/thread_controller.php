<?php
class ThreadController extends AppController
{
	public function index()
	{        
        isSessionActive();
		$array = Thread::getAll(Param::get('page',1));
        $threads = $array['threads'];
        $last_page = $array['last_page'];
        $offset = $array['offset'];
        $pagenum = $array['pagenum'];
        $pagination_ctrl = pagination($last_page, $pagenum, 4);
        $this->set(get_defined_vars()); 
	}
	
	public function view()
	{
        isSessionActive();    
		$thread = Thread::get(Param::get('thread_id'));
		$comments = $thread->getComments();		
		$this->set(get_defined_vars());
	}
	
	public function write()
	{
    isSessionActive();	
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
		
		}
		$this->set(get_defined_vars());
		$this->render($page);
	}
	
	public function create()
	{
        isSessionActive();
		$thread = new Thread;
		$comment = new Comment;
		$page = Param::get('page_next', 'create');
		
		switch ($page)
		{
		case 'create':
			break;
		case 'create_end':
			$thread->title = Param::get('thread');
			$comment->username = Param::get('name');
			$comment->body = Param::get('body');	
			try
			{
				$thread->create($comment);
			} catch (ValidationException $e)
			{
				$page = 'create';
			}
			break;
		default:
			throw new NotFoundException("{$page} is not found");
			break;
		}
		$this->set(get_defined_vars());
		//$thread = Thread::get(Param::get('thread_id'));
		$this->render($page);
	}
	
	
			
}