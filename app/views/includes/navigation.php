<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT;?>/posts/home">
                Home
            </a>
        </li>
        <li>
            <a href="#about-footer">
                About
            </a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) { ?>
                <a href="<?php echo URLROOT; ?>/users/logout">
                    Log Out
                </a>
            <?php } else { ?>
                <a href="<?php echo URLROOT; ?>/users/login">
                    Log In
                </a>
            <?php } ?>
        </li>
    </ul>
</nav>