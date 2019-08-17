
<!---
<?php //$title = 'admin'; ?>

<?php //ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>



<h2>Nouveau article</h2>

<form action="index.php?action=postArticle" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="article">Contenu</label><br />
        <textarea id="article" name="article"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>-->


  
<?php // $content = ob_get_clean(); ?>

<?php // require('template.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<form action="index.php?action=postArticle" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">Contenu</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>-->

</body>
</html>
