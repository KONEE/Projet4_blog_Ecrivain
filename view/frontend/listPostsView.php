<?php $title=SITE_NAME .'Mon blog';?>
<?php ob_start();?>


<div class='container'>
<p>Derniers Articles du Blog :</p>
    <?php while ($data=$posts->fetch()) { ?>
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="row no-gutters bg-light position-relative">
               
                <div class="col-md-10 position-static p-4 pl-md-0">
                    <h5 class="mt-0"><?=htmlspecialchars($data['title']).':'.' '?><em>le <?=$data['creation_date_fr'] ?></em>
                    </h5>
                    <div class="row">
                        <div class="col-12 "><?=substr(substr($data['content'],0,100),0,strrpos(substr($data['content'],0,100),' ')).'...' ?>
                        </div>
                    </div><a href="index.php?action=post&amp;id=<?=$data['id'] ?>" class="stretched-link"></a>
            </div>
        </div>
    </div><br><br>
    <?php
        }
         $posts->closeCursor();
    ?>
</div>
<?php $content=ob_get_clean();?>
<?php require('view/template.php');?>
