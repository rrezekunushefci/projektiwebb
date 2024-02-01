<nav>
    <img src="logo.png" class="logo">
    <ul>
        <li><a href="Home.php">HOME</a></li>
        <li><a href="Tour.php">TOURS</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="aboutus.php">ABOUT US</a></li>

        <?php if ($loggedIn): ?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo $username; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="my_bag.php">My Bag</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        <?php else: ?>
            <li><a href="login.php">LOGIN</a></li>
        <?php endif; ?>
    </ul>
</nav>