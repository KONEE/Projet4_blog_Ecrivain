<!DOCTYPE html>
<html  lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="publics/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="publics/images/favicon.ico"/>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    
    <!-- Custom fonts for this template -->
    <link href="publics/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="publics/css/clean-blog.min.css" rel="stylesheet">
    
    <!--tinyMce -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content',
            entity_encoding : "raw",
	        encoding: "UTF-8",
            language : 'fr_FR',
           
        });
    </script>
    
    <!--chatbot
    <script src="https://account.snatchbot.me/script.js"></script>
    <script>
        window.sntchChat.Init(70554)
    </script> -->
</head>

<body>
   
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">BLOG</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">ARTICLES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showAbout">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showContact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('publics/images/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Jean Forteroche</h1>
                        <span class="subheading">Ecrivain et 
                         <a class="navbar-brand" 
                                href="index.php?action=connexion">Administrateur du site</a></span>    
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <?php if(isset($_SESSION['message_succes'])):?>
    <div class='container'>
        <!-- Modal 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        
      </div>
      
    </div>
  </div>-->
    <div class="row justify-content-center">
        <div class="col-4">
        
        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
            <div class="swal2-success-circular-line-left" id="backround-blanc1" ></div>
            <span class="swal2-success-line-tip"></span>
            <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div> 
            <div class="swal2-success-fix" id="backround-blanc2" ></div>
            <div class="swal2-success-circular-line-right" id="backround-blanc3" ></div>
            
            </div>
            <div class="alert alert-success" role="alert">
                <div class="justify-content-beetwen">
                        <button type="button" class="close" 
                                        data-dismiss="alert" 
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                                        
                    <?=$_SESSION['message_succes'];
                    unset($_SESSION['message_succes']);?>
                </div> 
            </div>
        </div> 
    </div>    
    </div>
    <?php elseif(isset($_SESSION['state'])):?>
    <div class='container'>
        <div class="alert alert-success" role="alert">
            <span class="d-flex justify-content-between">
            <?=$_SESSION['state'];?>
                 <a class="text-secondary"  href='index.php?action=deconnexion'>Deconnecter</a>   
            </span>
        </div>
    </div>
    <?php elseif(isset($_SESSION['message_error'])):?>
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                    <span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <div class="alert alert-danger" role="alert">
                    <div class="justify-content-beetwen">
                        <button type="button" class="close" 
                                                data-dismiss="alert" 
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                        </button>
                        <?=$_SESSION['message_error'];
                        unset($_SESSION['message_error']);?>
                    </div>    
                    
                </div>
            </div> 
        </div>       
    </div>
    <?php else :?>
    <?php endif ;?>
    
    
    <?=$content ?>

    <!-- Footer -->
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; KONE 2019</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="publics/vendor/jquery/jquery.min.js"></script>
    <script src="publics/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="publics/js/clean-blog.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>

</html>