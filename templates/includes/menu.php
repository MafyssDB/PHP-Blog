<div id="templatemo_menu">
    <ul>
        <li><a href="/" class="<?php if(empty($_GET['act'])){echo 'current';}?>" >Blog</a></li>
        <?php if(isset($_SESSION['userId'])): ?>
            <li><a href="/?act=posts" class="<?php if(isset($_GET['act']) && $_GET['act'] == 'posts'){echo 'current';}?>">My posts</a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['userId']) && checkAdmin($connect, $_SESSION['userId'])): ?>
            <li><a href="/admin">Admin</a></li>
        <?php endif ?>

        <?php if(isset($_SESSION['userId'])): ?>
            <li><a href="/?act=logout">Logout</a></li>
        <?php else: ?>
            <li><a href="/?act=login" class="<?php if(isset($_GET['act']) && $_GET['act'] == 'login' || isset($_GET['act']) && $_GET['act'] == 'register' ){echo 'current';}?>">Login</a></li>
        <?php endif ?>
    </ul>	
    
</div>

