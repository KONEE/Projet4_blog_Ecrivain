
<?php $title = 'admin'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets </a></p>

<!--<form action="index.php?action=postArticle" method="post" enctype="multipart/form-data">
	<input type="file" name="file"/><br/><br/>
	<input type="submit" name="submit" value="upload"/>
        </form>	-->

<form action="index.php?action=postArticle" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" />
            <input type="file" id="images" name="images"  />
        </div>
        
        <div>
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" value="Ajouter"/>
        </div>
    </form>
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



