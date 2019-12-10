<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class='container'>
   

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= $post['content'] ?>
        </p>
    </div>
</div>


<!-----*************************************************-->
<div class='container'>
    <div class="row bootstrap snippets">
        <div class="col-md-6 col-md-offset-2 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Commentaires <i class="fa fa-comments" aria-hidden="true"></i>

                    </div>
                    <div class="panel-body">
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                            <input class="form-control" type="text" id="author" name="author" placeholder="Auteur"
                                rows="3" />
                            <br>
                            <textarea id="comment" name="comment" class="form-control" placeholder="Commentaires..."
                                rows="3"></textarea>
                            <br>

                            <input type="submit" id= "btt" class="btn btn-primary " value="POSTER" />
                        </form>
                        
                        <div class="clearfix"></div>
                        <hr>
                        <ul class="media-list">
                        
                            <?php
    while ($comment = $comments->fetch())
    {
        //echo '<pre>';
       // print_r($comment);
    ?>
                <?php if($comment['tag'] === '1' ) : ?>
                            <li class="media">
                                <div class="pull-right">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <strong class="text-info"><?= htmlspecialchars($comment['author']) ?> </strong>
                                </div>
                                
                                <div class="media-body">
                                    <span class="text-muted pull-right">
                                        <small class="text-muted"><?= ": "."le"." ". $comment['comment_date_fr'] ?></small>
                                            <?php // $succes = 'commentaire signalé'; ?>
                                        <a class="text-warning" href="index.php?action=signalCom&amp;post_id=<?=$comment['post_id']?>&amp;id=<?= $comment['id']?>&amp;" ><i class="fas fa-star" data-toggle="tooltip" data-placement="top" title="Signalé ce commentaire"></i></a> 
                                       
                                    </span>
                                        <p>
                                            <?= nl2br(htmlspecialchars($comment['comment'])) ?>.
                                        </p>       
                                </div>
  
                            </li>
                            <?php endif ;?>
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
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>