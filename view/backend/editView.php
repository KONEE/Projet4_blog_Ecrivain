
<?php $title = 'admin'; ?>

<?php ob_start(); ?>

<p><a href="index.php?action=postArticle">Retour à la liste des billets Admin</a></p>

<form action="index.php?action=editArticle&id=<?=$data['id']?>" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value = "<?=$data["title"] ?>"/> 
            <input type="file" id="images" name="images" />
        </div>
        <?php //var_dump($data); ?>
        <div>
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content" ><?= $data['content']?></textarea>
        </div>
      
        <div>
            <input type="submit" value="Ajouter"/>
        </div>
    </form>
    <h2>Liste des articles</h2>
    </form>

    <?php  $content = ob_get_clean(); ?>
    
    <?php  require('/opt/lampp/htdocs/blog/view/template.php'); ?>