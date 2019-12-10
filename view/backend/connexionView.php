<?php
$title = 'connexion';
?>

<?php
ob_start();
?>


<div class=container>

    <div class="row justify-content-center">
        <!-- Material form login -->

        <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Connexion</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="index.php?action=connexion" method="post">

                    <!-- Pseuso -->
                    <div class="md-form">
                        <br>
                        <input type="text" name="pseudo" required id="materialLoginFormPseudo" placeholder="Pseudo"
                            class="form-control">
                        <br>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" name="pass" required id="materialLoginFormPassword"
                            placeholder="mot de passe" class="form-control">
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                        type="submit">se connecter</button>
                        

                  

                </form>
                <!-- Form -->

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