<?php include 'includes/header.php'?>
<body>

<div id="templatemo_wrapper">

    <?php include 'includes/menu.php'?>           
	<!-- end of templatemo_menu -->
    <?php include 'includes/sidebar.php'?>    

<div id="templatemo_right_column">
    <div id="templatemo_main">
        <button style="margin-bottom: 20px;" class="custom-btn btn-1"><a style=" color: white; font-size: 18px;"  href="/?act=create">Add new post</a></button>
        <h2>My Posts</h2>
        <div id="gallery">
            <ul>
                <?php foreach ($posts as $post): ?>
                <li>
                    <div class="left">
                       <img src="<?='/images/' . $post['image']?>" alt="1" />
                    </div>
                    <div class="right">
                        <a style="margin-right: 12px" href="/?act=edit&id=<?=$post['id']?>"><i class="bi bi-pencil-fill"></i></a>
                        <a style="margin-right: 12px" href="/?act=show&id=<?=$post['id']?>"><i class="bi bi-eye-fill"></i></a>
                        <a href="/?act=delete&id=<?=$post['id']?>"><i class="bi bi-trash-fill"></i></a>
                        <h5 class="mt-2"><?=$post['title']?></h5>
                        <p><?=mb_strimwidth($post['content'], 0, 100, " ...")?></p>
                    </div>
                    <div class="cleaner"></div>
                </li>
                <?php endforeach ?>
            </ul>
        
        </div>
    
    </div> <!-- end of main -->
    <div class="cleaner"></div>
</div>  <!-- end of right column -->

<div class="cleaner"></div>
    <!-- end of templatemo_main -->
    <?php include 'includes/footer.php'?>
  
    <div class="cleaner"></div>
</div> <!-- end of warpper -->

</body>
</html>