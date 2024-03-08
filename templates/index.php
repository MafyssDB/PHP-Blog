<?php include 'includes/header.php'?>
<body>

<div id="templatemo_wrapper">

    <?php include 'includes/menu.php'?>           
	  <!-- end of templatemo_menu -->

    <?php include 'includes/sidebar.php'?>

      <div id="templatemo_right_column">
        <div id="templatemo_main">

            <?php foreach ($posts as $post): ?>
              <div class="post_section">

                  <h2><a href="/?act=show&id=<?=$post['id']?>"><?=$post['title']?></a></h2>
                  <?= date('F j, Y' , strtotime($post['createdAt'])) ?> |

                  <strong>Author:</strong>
                  <?php foreach ($users as $user): ?>
                      <?php if($post['userId'] === $user['id']): ?><?=$user['name']?> <?php endif; ?>
                  <?php endforeach; ?>
                  |
                  <strong>Category:</strong>
                  <?php foreach ($categories as $category): ?>
                    <a href="#"><?php if($post['category_id'] === $category['id']): ?><?=$category['name']?> <?php endif; ?></a>
                  <?php endforeach; ?>


                  <?php if (isset($post['image'])): ?>
                      <img src="<?= '/images/' . $post['image']?>" alt="image 1" />
                  <?php endif; ?>
                  <p><?=mb_strimwidth($post['content'], 0, 170, " ...")?></p>
                <a href="/?act=show&id=<?=$post['id']?>">Читать дальше ...</a>
              </div>
            <?php endforeach; ?>

        </div>
      </div> 
  <div class="cleaner"></div>
  
    <!-- end of templatemo_main -->
    <?php include 'includes/footer.php'?>
  
  <div class="cleaner"></div>
</div> <!-- end of warpper -->

</body>
</html>