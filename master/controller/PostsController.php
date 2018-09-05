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
        $this->render('frontend/posts', compact('paging'));
    }
}
