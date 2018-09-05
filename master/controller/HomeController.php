<?php
namespace master\controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->setTitle('Accueil');
        $error = null;
        $message = null;
        if (isset($_POST)) {
            $error = true;
            $message = 'Tous les champs sont obligatoires.';
            if (!empty($_POST['nom'] && $_POST['mail'] && $_POST['message'])) {
                $message = 'Format de l\'adresse Email incorrect.';
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
                    $from = $_POST['mail'];
                    $target = "jahanblog@alwaysdata.net";
                    $subject = "Contact via blog";
                    $message = htmlspecialchars($_POST['message']);
                    $headers = "From:" . $from;
                    mail($target, $subject, $message, $headers);
                    header('Location:index.php?p=index&info=send');
                }
            }
        }
        $this->render('frontend/index', compact('error', 'message'));
    }
}
