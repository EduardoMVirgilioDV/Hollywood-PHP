<nav class="navbar navbar-expand-lg navbar-light bg-light">
<ul class="navbar-nav mx-auto">
    <li class="nav-item">
        <a class="nav-link" href="?view=home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="?view=actors">Actors</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="?view=awards">Awards</a>
    </li>
    <?php if(isset($_SESSION["user"])){ ?>
        <?php if ($_SESSION["user"]["role"] == "admin"){ ?>
            <li class="nav-item">
                <a class="nav-link" href="?view=admin">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?view=logout">Logout</a>
            </li>
        <?php } else if($_SESSION["user"]["role"] != "admin") { ?>
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
        <li class="nav-item">
            <a class="nav-link" href="?view=register">Sign In</a>
        </li>
    <?php } ?>
</ul>
</nav>