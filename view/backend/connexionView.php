

<?php $title = 'connexion'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets </a></p>
<div class=container>
        <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="index.php?action=connexion" method="post">
                            <h3> Connexion à la page Administrateur </h3>
                                    <label for="pseudo">Pseudo*</label> : <input type="text" name="pseudo" id="pseudo"  required /><br />
                                    <label for="pass">Mot de passe*</label> : <input type="pass" name="pass" id="pass"  required /><br />
                                <!-- <label for="pass">Retaper Mot de passe</label> : <input type="pass" name="passR" id="passR"  required /><br /> -->
                                    <input type="submit" value="Se connecter" />
                                
                    </form>
            </div>
            <div class="col-md-5">
            <form action="index.php?action=connexion" method="post">
                                <h3> Ajouter un Administrateur </h3>
                                <label for="pseudo">Pseudo*</label> : <input type="text" name="pseudo" id="pseudo"  required /><br />
                                <label for="pass">Mot de passe*</label> : <input type="pass" name="pass" id="pass"  required /><br />
                            <!-- <label for="pass">Retaper Mot de passe</label> : <input type="pass" name="passR" id="passR"  required /><br /> -->
                                <label for="email">Adresse Email*</label> :  <input type="email" name="email" id="email" required /><br />

                                <input type="submit" value="Envoyer" />
                            
            </form>
            </div>
        </div>
</div>        
    <?php  $content = ob_get_clean(); ?>

<?php  require('/opt/lampp/htdocs/blog/view/template.php'); ?>
