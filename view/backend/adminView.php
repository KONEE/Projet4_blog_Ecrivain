
<?php $title = SITE_NAME .'admin'; ?>

<?php ob_start(); 
//var_dump($_SESSION);
//echo 'bonjour'.$_SESSION['pseudo'];
?>
<p><?='Vous etes connecté entanque Administrateur'?>  <a href='index.php?action=deconnexion'>deconnecter</a></p>



<p><a href="index.php">Retour à la liste des billets </a></p>

<!--<form action="index.php?action=postArticle" method="post" enctype="multipart/form-data">
	<input type="file" name="file"/><br/><br/>
	<input type="submit" name="submit" value="upload"/>
        </form>	-->
<!-- Default form login -->
<div container>
    <div class="row justify-content-center">
        <div class="col-md-9">
                <form class="text-center border border-light p-5" action="index.php?action=postArticle" method="post" >
                    <div>
                        
                        <input type="text" id="title" name="title" placeholder="Titre"/>
                        <input type="file" id="images" name="images"  />
                    </div>
                    <br>
                    
                    <div>
                        
                        <textarea id="content" name="content" placeholder="Article"></textarea>
                    </div>
                    <div>
                          <!--  <input type="submit" value="Ajouter"/> -->
                        <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Envoyer"/>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form class="text-center border border-light p-5" action="index.php?action=connexion" method="post">

                    <p class="h4 mb-4">Nouveau Administrateur</p>
                    <!-- pseudo -->
                    <input type="text" name="pseudo" required id="defaultLoginFormPseudo" class="form-control mb-4" placeholder="Pseudo">
                    <!-- Email -->
                    <input type="email" name="email" required id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input type="password" name="pass" required id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
               
                    

                    <!-- Sign in button -->
                    <button class="btn btn-outline-secondary" type="submit">Ajouter</button>

                    

                </form>
            </div>
            
            
            
        </div>
</div>
<!-- Default form login -->



    <h2>Liste des articles</h2>
    <?php
    while ($data = $posts->fetch())
    {
    ?>
    <div class="container">
        
                
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
                <td><?= htmlspecialchars($data['title']) ?></td>
                <td><?= nl2br(($data['content'])) ?></td>
                <td><?= $data['creation_date_fr']?></td>
                <td><em><a href="index.php?action=deleteArticle&amp;id=<?= $data['id']?>"><i class="fas fa-trash-alt"></i></a></em>
                    <em><a href="index.php?action=editArticle&amp;id=<?= $data['id']?>"><i class="far fa-edit"></i></a></em>
                    
                </td>
            </tr>
            
            </tbody>
        </table>
        </div>

        <?php
        }
        $posts->closeCursor();
        ?>
  
<?php  $content = ob_get_clean(); ?>

    <?php  require('/opt/lampp/htdocs/blog/view/template.php'); ?>



