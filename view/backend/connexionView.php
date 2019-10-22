<?php $title = 'connexion'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets </a></p>
<div class=container>
    <div class="row justify-content-center">
        <!-- Material form login -->

        <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Sign in</strong>
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

                    <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <!-- Forgot password -->
                            <a href="">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                        type="submit">Sign in</button>

                    <!-- Social login -->
                    <p>or sign in with:</p>
                    <a type="button" class="btn-floating btn-fb btn-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-tw btn-sm">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="btn-floating btn-li btn-sm">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a type="button" class="btn-floating btn-git btn-sm">
                        <i class="fab fa-github"></i>
                    </a>

                </form>
                <!-- Form -->

            </div>

        </div>

    </div>
</div>
<?php  $content = ob_get_clean(); ?>

<?php  require('/opt/lampp/htdocs/blog/view/template.php'); ?>