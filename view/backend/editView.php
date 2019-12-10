<?php
$title = SITE_NAME . 'admin_editer';
?>

<?php
ob_start();
?>



<div class='container'>
    <div class="row justify-content-center">
        <p><a class="text-secondary" href="index.php?action=postArticle">Retour à la liste des Articles</a></p>
        <div class="col-md-10">
            <form action="index.php?action=editArticle&id=<?= $data['id'] ?>" method="post">
                <div>
                    <label for="title">Titre</label><br />
                    <input type="text" id="title" name="title" value="<?= $data["title"] ?>" />
                  
                </div>
                <?php //var_dump($data); 
?>
               <div>
                    <label for="content">Contenu</label><br />
                    <textarea id="content" name="content"><?= $data['content'] ?></textarea>
                </div>

                <div>
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" value="Sauvegarder" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
?>

<?php
require('view/template.php');
?> 