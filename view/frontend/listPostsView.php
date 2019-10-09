<?php $title = SITE_NAME .'Mon blog'; ?>

<?php ob_start(); ?>

<!--<em><a href="index.php?action=postArticle">AJOUTER UN ARTICLE</a></em>-->
<p>Derniers billets du blog :</p>

<div class='container'>
<?php
while ($data = $posts->fetch())
{
?>
    
   <!-- <button type="button" class="btn btn-light" href="index.php?action=post&amp;id=<?//= //$data['id'] ?>">
    
            <table class="table table-bordered table-striped table-sm"> 
                <thead>
                    <tr>
                            <th>
                                
                                    <?//= //htmlspecialchars($data['title']) ?>
                                    <em>le <?//=// $data['creation_date_fr'] ?></em>
                                
                            </th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>   
                        <td>
                            
                                <img src="public/images/livre.jpeg" class="rounded float-left" alt="...">
                                <?//= //$data['content'] ?>
                                <br />
                                <em><a href="index.php?action=post&amp;id=<?//= //$data['id'] ?>">Commentaires</a></em>
                        
                        </td>    
                    </tr>
            
                </tbody>   
                
            </table> 
        </button>  -->
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="row no-gutters bg-light position-relative">
                <div class="col-md-6 mb-md-0 p-md-4">
                    <img src = "<?='public/images/'.$data['images']."" ?> " class="w-100" alt="...">
                </div>
                <div class="col-md-6 position-static p-4 pl-md-0">
                    <h5 class="mt-0">
                            <?=htmlspecialchars($data['title']) ?>
                            <em>le <?= $data['creation_date_fr'] ?></em>
                    </h5>
                    <div class="row">
                        <div class="col-12 text-truncate">
                            <?=$data['content'] ?>
                        </div>
                    </div>    
                    <a href="index.php?action=post&amp;id=<?=$data['id'] ?>" class="stretched-link"></a>
                </div>
            </div>  
        </div>  
          <br>
          <br>
<?php
}
$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('/opt/lampp/htdocs/blog/view/template.php'); ?>