<?php $title=SITE_NAME .'Mon blog';?>
<?php ob_start();?>


<div class='container'>
<h3>Derniers Articles du Blog :</h3> 
    <?php while ($data=$posts->fetch()) { ?>
        
        <div class= " shadow p-3 mb-5 bg-white rounded position-static  ">
        <a href= " index.php?action=post&id=<?=$data['id'] ?>" class="btn btn-light stretched-link" >
            <div class= " row no-gutters position-relative ">
            
                
                    <h4 class="mt-0"><?=htmlspecialchars($data['title']).':'.' '?><em>le <?=$data['creation_date_fr'] ?></em>
                    </h4>
                    <div class="row" >
                        
                        <div class="col-12 ">
                        <span class = "writting">
                            <?=substr(substr($data['content'],0,100),0,strrpos(substr($data['content'],0,100),' ')).'...' ?>
                            </span>
                        </div>
    
                    </div>
                
            
            </div>
            </a>
        </div>
        
    <?php
        }
        $posts->closeCursor();
    ?>
</div>
<?php $content=ob_get_clean();?>
<?php require('view/template.php');?>
