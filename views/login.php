<?php
include("helpers/createUsers.php");
?>
<?php if (isset($_GET["action"])) { ?>
    <div class="alert alert-<?=$_GET["action"]?>" role="alert">
        <?=$_GET["msg"]?>
    </div>
<?php } ?>

<?php if (isset($errors["email"])) { ?>
    <div class="alert alert-danger" role="alert">
        <?=$errors["email"]?>
    </div>
<?php } ?>

<div class="container">
    <div class="row vh-100 align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" action="?view=login" method="POST" autocomplete="off">

                        <div class="form-label-group">
                            <input type="text" id="email" name="email" autocomplete="false"  class="form-control" placeholder="Email address">
                            <label for="email">Email</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="clave" name="clave" autocomplete="false" class="form-control" placeholder="Password">
                            <label for="clave">Contraseña</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>