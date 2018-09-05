<?php
namespace master\controller;

use \master\model\MasterFactory;

class UsersController extends Controller
{
    public function register()
    {
        $this->setTitle('Inscription');
        $master = MasterFactory::getInstance();
        $users = $master->getTable('users');
        
        $error = null;
        $message = null;
        
        if ($_POST) {
            $error = true;
            $message = 'Tous les champs sont obligatoires';
            
            if (!empty($_POST['username'] && $_POST['password'] && $_POST['mail'])) {
                $entity = $users->getEntity($_POST);
                if ($entity->getMail() === null) {
                    $message = 'Le format de l\'adresse email est incorrect';
                } else {
                    $req = $users->usersExists($_POST['username'], $_POST['mail']);
                    if ($req['user'] == 0) {
                        $users->addUser(
                            $_POST['username'],
                            sha1($_POST['password']),
                            $_POST['mail']
                        );
                        $error = false;
                        $message = 'Inscription réussie';
                    } else {
                        $message = 'Pseudo ou adresse email déjà utilisé(e)';
                    }
                }
            }
        }
        $this->render('frontend/register', compact('error', 'message'));
    }
}
