<?php
class CommentController extends AppController {

    public function index() { 
        $array = Comment::getAll(
                            Param::get('page',1) ,
                                        Param::get('thread_id')
                                );
                $thread_title = $array['thread']->title;
                $comments = $array['comments'];
                $last_page = $array['last_page'];
        $offset = $array['offset'];
        $pagenum = $array['pagenum'];
        $pagination_ctrl = pagination($last_page, $pagenum, 4);
        $this->set(get_defined_vars()); 
    }
        
    public function write() {
        $comment = new Comment;
        $page = Param::get('page_next', 'write');

        switch ($page) {
            case 'write':
            break;
            case 'write_end':
                $comment->username = Param::get('username');
                $comment->body = Param::get('body');
                $comment->thread_id = Param::get('thread_id');
                try {
                    $comment->write();
                } catch (ValidationException $e) {
                    $page = 'write';
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