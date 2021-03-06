<?php
$title = SITE_NAME . 'admin';
?>

<?php
ob_start();
?>
<div class='container'>
        <a class="text-secondary" href="index.php?action=postArticle">Retour à la liste des Articles</a>
      
        <div class="row bootstrap snippets">
            <div class="col-md-10 col-md-offset-2 col-sm-12">
                <div class="comment-wrapper">
                    <div class="panel panel-info">
                        <div class="d-flex justify-content-center">
                        
                            <span class="align-self-end"> <i class="fa fa-comments" aria-hidden="true">commentaires</i> </span>
                        </div>
                        <div class="panel-body">
                            
                            <div class="clearfix"></div>
                            <hr>
                            <ul class="media-list">
            <?php
foreach ($signalCom as $signalComs) {
    
?> 
                            <li class="media">
                                    <div class="pull-right">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        <strong class="text-info"><?= htmlspecialchars($signalComs['author']) ?></strong> 
                                    </div>

                                    <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted"><?= ": " . "le" . " " . $signalComs['comment_date_fr'] ?></small>
                                        </span>
                                        
                                        <a class="text-success" href="index.php?action=valideComment&amp;id=<?= $signalComs['id'] ?>"><i class="fas fa-check"></i></a>
                                        <a class="text-danger"  href="index.php?action=deleteCom&amp;id=<?= $signalComs['id'] ?>"><i class="fas fa-times-circle"></i></a>
                                      
                                        <p>
                                            <?= nl2br(htmlspecialchars($signalComs['comment'])) ?>.
                                        </p>
                                        <div class="clearfix"></div>
                                        <hr>
                                    </div>
                                </li>
                                <?php
}
?>
                           </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
<?php
$content = ob_get_clean();
?>
   
<?php
require('view/template.php');
?> 