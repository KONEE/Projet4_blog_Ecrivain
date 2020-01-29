<?php
$title = SITE_NAME . 'admin';
?>

<?php
ob_start();

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form class="text-center border border-light p-5" action="index.php?action=postArticle" method="post">
                <div>

                    <input type="text" id="title" name="title" placeholder="Titre" />
                  
                </div>
                <br>

                <div>

                    <textarea id="content" name="content" ></textarea>
                </div>
                <div>
                  
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Envoyer" />
                </div>
            </form>
        </div>
        <div class="col-md-3">
            
            
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Nouveau Administrateur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                     <form  action="index.php?action=createA" method="post">
                        <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="pseudo" id="Form-name" class="form-control validate" placeholder="Pseudo" required>
                        
                        </div>
                        <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input type="email" name="email" id="Form-email" class="form-control validate" placeholder="Email" required>
                        </div>

                        <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="pass" id="Form-pass" class="form-control validate" placeholder="Mot de passe" required>
                        
                        
                        </div>
                        <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input type="password" name="pass1" id="Form-pass1" class="form-control validate" placeholder="Confirmation de Mot de passe" required>
                        </div>
                        <button class="btn btn-secondary" type="submit" >AJOUTER</button>
                        </form>
                        
                    </div>
                    
        
                    
                    </div>
                </div>
                </div>

                <div class="text-center">
                <a href="" class="btn btn-outline-primary btn-rounded waves-effect" data-toggle="modal" data-target="#modalRegisterForm" >AJOUTER UN NOUVEAU ADMINISTRATEUR</a>
                </div>
            
            </div>
        
    </div>
</div>




<div class="container">
    <div class="row justify-content-between">
        <h2 id = "titlePost">Liste des articles</h2>
        <a class="text-secondary"  href='index.php?action=signalComment'>Commentaires Signalés</a>
    </div>
</div>
<?php
foreach ($articles as $article) {
    //  echo '<pre>';
    // print_r($article);
?>      
       <div class="container" >

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Date de creation</th>

                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                            
                                <td><?= htmlspecialchars($article['title']) ?></td>
                                <td><?= nl2br(substr(substr($article['content'], 0, 100), 0, strrpos(substr($article['content'], 0, 100), ' ')) . '...') ?></td>
                                <td><?= $article['creation_date_fr'] ?></td>
                                <td><em><a href="index.php?action=deleteArticle&amp;id=<?= $article['id'] ?>"><i
                                                class="fas fa-trash-alt"></i></a></em>
                                    <em><a href="index.php?action=editArticle&amp;id=<?= $article['id'] ?>"><i
                                                class="far fa-edit"></i></a></em>
                                                <a href="index.php?action=articleComments&amp;id=<?= $article['id'] ?>">Commentaires...<!--<span class="badge badge-light">9</span>--></a> 
                                </td>
                                
                            </tr>

                        </tbody>
                        
                    </table>
                    
                </div>
<?php
}
?>


<?php
$content = ob_get_clean();
?>

<?php
require('view/template.php');
?> 