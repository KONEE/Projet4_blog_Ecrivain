

<?php $title = 'connexion'; ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des billets </a></p>
<div class=container>
        <div class="row justify-content-center">
            <!-- Material form login -->
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
                        <input type="text" name="pseudo"  required id="materialLoginFormPseudo" placeholder="Pseudo" class="form-control">
                        <br>
                    </div>

                    <!-- Password -->
                    <div class="md-form">
                        <input type="password" name="pass" required id="materialLoginFormPassword" placeholder="mot de passe" class="form-control">
                       
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
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                    <!-- Register 
                    <p>Not a member?
                        <a href="">Register</a>
                    </p> -->

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
            <!-- Material form login -->
<!-- Material form login -->
          <!--  <div class="col-md-6">
                    <form action="index.php?action=connexion" method="post">
                            <h3> Connexion à la page Administrateur </h3>
                                    <label for="pseudo">Pseudo*</label> : <input type="text" name="pseudo" id="pseudo"  required /><br />
                                    <label for="pass">Mot de passe*</label> : <input type="pass" name="pass" id="pass"  required /><br />
                               <label for="pass">Retaper Mot de passe</label> : <input type="pass" name="passR" id="passR"  required /><br /> 
                                    <input type="submit" value="Se connecter" />
                                
                    </form>
            </div>
            <div class="col-md-5">
            <form action="index.php?action=connexion" method="post">
                                <h3> Ajouter un Administrateur </h3>
                                <label for="pseudo">Pseudo*</label> : <input type="text" name="pseudo" id="pseudo"  required /><br />
                                <label for="pass">Mot de passe*</label> : <input type="pass" name="pass" id="pass"  required /><br />
                             <label for="pass">Retaper Mot de passe</label> : <input type="pass" name="passR" id="passR"  required /><br /> 
                                <label for="email">Adresse Email*</label> :  <input type="email" name="email" id="email" required /><br />

                                <input type="submit" value="Envoyer" />
                            
            </form>
            </div> -->
        </div>
</div>        
    <?php  $content = ob_get_clean(); ?>

<?php  require('/opt/lampp/htdocs/blog/view/template.php'); ?>
