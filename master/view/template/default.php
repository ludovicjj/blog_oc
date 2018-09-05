<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="public/img/logo-nb.png">
    
    <title><?= $title; ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="public/css/lux.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="public/css/custom.css" rel="stylesheet">
    
    <!-- Lien vers font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php?p=index">
                <img src="public/img/logo-nb.png"/>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?p=index">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=posts">Articles</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?p=register">Inscription</a>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a class="btn btn-secondary my-2 my-sm-0 btn-connexion" href="index.php?p=logout">';
                    echo 'Deconnexion';
                    echo '</a>';
                } else {
                    echo '<a class="btn btn-secondary my-2 my-sm-0 btn-connexion" href="index.php?p=login">';
                    echo 'Connexion';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </nav>
    
    <div class="starter-template">
        <?= $content; ?>
    </div>
    
    <footer>
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 information">
                    <h3>Index du site</h3>
                </div>
                <div class="col-md-6 social">
                    <div class="social-cv">
                        <a href="public/img/cv-ludovicJahan.pdf">
                            <i class="fas fa-graduation-cap fa-2x"></i>
                        </a>
                    </div>
                    <div class="social-github">
                        <a href="https://github.com/ludovicjj">
                            <i class="fab fa-github-square fa-3x"></i>
                        </a>
                    </div>
                    <div class="social-linkdin">
                        <a href="https://www.linkedin.com/in/ludovic-jahans/">
                            <i class="fab fa-linkedin fa-3x"></i>
                        </a>
                    </div>
                </div>
            </div><!-- ./row -->
        </div><!-- ./container -->
    </footer>
    
    <!-- JS
    ================================================== -->
    <script src="public/js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
    <script src="public/js/custom.js"></script>
  </body>
</html>