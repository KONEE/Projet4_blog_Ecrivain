<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>


<!-----*************************************************-->
<div class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-2 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    commentaires <i class="fa fa-comments" aria-hidden="true"></i>

                </div>
                <div class="panel-body">
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                        <input class="form-control" type="text" id="author" name="author" placeholder="Auteur" rows="3"/>
                        <br>
                    <textarea id="comment" name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                    <br>
                    <input type="submit" value="POST"/>
                        </form>   
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                    <?php
while ($comment = $comments->fetch())
{
?>
                        <li class="media">
                            <div class="pull-right">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?= $comment['comment_date_fr'] ?></small>
                                </span>
                                <strong class="text-success">@<?= htmlspecialchars($comment['author']) ?>
                                
 
                                </strong>
                                <p>
                                <?= nl2br(htmlspecialchars($comment['comment'])) ?>.
                                </p>
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

<!----------****************************-->
 <!--       
<form action="index.php?action=addComment&amp;id=<?//= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Ajouter Votre commentaire"/>
    </div>
</form>
-->       
<?/*php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
*/?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
