<?php include_once __DIR__ . '/../includes/header.php'; ?>

<body>
	<div id="templatemo"><?php include_once __DIR__ . '/../includes/menu.php'; ?></div>
<div class="container">
	<section id="content">
		<form action="/?act=login" method="POST">
			<h1>Login Form</h1>
				<?php if(isset($error['authError'])): ?>
                    <h4 style="color: red;"><?=$error['authError']?></h4>
                <?php endif ?>
            <div style="display: flex; flex-direction: column; align-items: center;">
				<input value="<?php if(!empty($_POST)){ echo $email; } ?>" name="email" type="email" placeholder="email" id="email" />
				<?php if(isset($error['email'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['email']?></small>
                <?php endif ?>
			</div>

            <div style="display: flex; flex-direction: column; align-items: center;">
				<input name="password" type="password" placeholder="Password" id="password" />
				<?php if(isset($error['password'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['password']?></small>
                <?php endif ?>
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="/?act=register">Register</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
  
  
</body>
</html>
