<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">

        <ul class="navbar-nav mx-auto" id="navbarToggler">
            <li class="nav-item">
                <a class="nav-link" href="?view=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?view=actors">Actors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?view=awards">Awards</a>
            </li>
            <?php if(isset($_SESSION["usuario"])){ ?>
                <?php if ($_SESSION["usuario"]["role"] == "admin"){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?view=admin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?view=logout">Logout</a>
                    </li>
                <?php } else if($_SESSION["usuario"]["role"] != "admin") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?view=profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?view=logout">Logout</a>
                    </li>
            <?php } } else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="?view=login">Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>