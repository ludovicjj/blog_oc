<?php
namespace master\controller\admin;

use \master\model\MasterFactory;

class PostsController extends AdminController
{
    public function index()
    {
        $master = MasterFactory::getInstance();
        $req_posts = $master->getTable('posts')->all();
        $posts = array();
        foreach ($req_posts as $data_posts) {
            $entity_posts = $master->getTable('posts')->getEntity($data_posts);
            $posts[] = $entity_posts;
        }
        $this->render('backend/posts/index', compact('posts'));
    }
    
    public function add()
    {
        $master = MasterFactory::getInstance();
        $error = null;
        $message = null;
        
        if ($_POST) {
            $error = true;
            $message = 'Tous les champs sont obligatoires';
            
            if (!empty($_POST['title'] &&
                $_POST['intro'] &&
                $_POST['content'] &&
                $_POST['author'] &&
                $_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $extensions_valides = array('jpg', 'jpeg', 'png');
                $extension_upload = strtolower(substr(strrchr($image, '.'), 1));
                
                if ($_FILES['image']['error'] > 0) {
                    $error = "Erreur lors du transfert de l\'image";
                } else {
                    if (in_array($extension_upload, $extensions_valides)) {
                        $path_image ='public/img/' . $_FILES['image']['name'];
                        move_uploaded_file(
                            $_FILES['image']['tmp_name'],
                            $path_image
                        );
                        $master->getTable('posts')->addPost(
                            $_POST['title'],
                            $_POST['intro'],
                            $_POST['content'],
                            $_POST['author'],
                            $path_image
                        );
                        header('Location:index.php?p=admin.posts.index');
                    } else {
                        $error = 'Extension incorrecte (uniquement ".jpg", ".jpeg", ".png")';
                    }
                }
            }
        }
        $this->render('backend/posts/add', compact('error', 'message'));
    }
}
