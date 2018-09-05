<?php
namespace master\controller;

use \master\model\MasterFactory;

class PostsController extends Controller
{
    public function posts()
    {
        $this->setTitle('Articles');
        $master = MasterFactory::getInstance();
        $req = $master->getTable('posts')->paging();
        
        $paging =  ceil($req['page'] / 4);
        $paging = (int) $paging;
        
        if (isset($_GET['page'])) {
            $limit = ($_GET['page'] * 4) - 4;
        } else {
            $limit = 0;
        }
        
        $req_post = $master->getTable('posts')->allWithLimit($limit);
        if (empty($req_post)) {
            $this->notFound();
        } else {
            $post = array();
            foreach ($req_post as $data) {
                $entity_post = $master->getTable('posts')->getEntity($data);
                $post[] = $entity_post;
            }
            $this->render('frontend/posts', compact('paging', 'post'));
        }
    }
}
