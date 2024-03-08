<?php include 'includes/header.php'?>
<body>

<div id="templatemo_wrapper">

    <?php include 'includes/menu.php'?>           
	<!-- end of templatemo_menu -->

    <?php include 'includes/sidebar.php'?>
    
    <div id="templatemo_right_column">
        <div id="templatemo_main">
            <div class="post_section">
            


                <h2><?= $post['title']?></h2>

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

                <img src="<?='/images/' . $post['image'] ?>" alt="image"/>
                <p><?= $post['content']?></p>
                
		  </div>
            
            <div class="comment_tab">
           	    Комментарии          </div>
            
      <div id="comment_section">
                <ol class="comments first_level">
                    <?php foreach ($comments as $comment): ?>
                    <li>
                        <div class="comment_box commentbox1">
                            <div class="comment_text">
                                <div class="comment_author">
                                    <?php foreach ($users as $user): ?>
                                        <?php if($comment['userId'] === $user['id']): ?><?=$user['name']?> <?php endif; ?>
                                    <?php endforeach; ?>
                                    <span class="date"> <?= date('F j, Y' , strtotime($comment['createdAt'])) ?></span>
                                    <span class="time"> <?= date('g:i a' , strtotime($comment['createdAt'])) ?> </span>
                                </div>
                                <p><?=$comment['comment']?></p>

                            </div>
                            <div class="cleaner"></div>
                        </div>
                    <?php endforeach; ?>
                    </li>

                </ol>
                </div>
                <?php if (isset($_SESSION['userId'])): ?>
                <div id="comment_form">
                    <h3>Написать комментрарий</h3>
                    
              		<form action="" method="post">
                        <input type="hidden" name="act" value="show"/>
                        <div class="form_row">
                            <label><strong>Комментарий</strong></label>
           					<br />
                            <textarea  name="comment" rows="" cols=""></textarea>
                        </div>
                        <input type="submit" name="Submit" value="Отправить" class="submit_btn" />
                    </form>
                    
                </div>
                <?php else: ?>
                    <h3>Чтобы написать комментраий <a href="/?act=login">войдите</a></h3>
                <?php endif; ?>
            
		</div> <!-- end of main -->
    
  <div class="cleaner"></div>
  </div> 
    <!-- end of templatemo_main -->
  <div class="cleaner_h20"></div> 
    <!-- end of templatemo_main -->
    <?php include 'includes/footer.php'?>
  
    <div class="cleaner"></div>
</div> <!-- end of warpper -->

</body>
</html>