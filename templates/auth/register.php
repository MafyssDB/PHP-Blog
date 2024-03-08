<?php include_once __DIR__ . '/../includes/header.php'; ?>
<body>
<div id="templatemo"><?php include_once __DIR__ . '/../includes/menu.php'; ?></div>

<div class="container">
	<section id="content">
		<form action="/?act=register" method="POST">
			<h1>Register Form</h1>
            <?php if(isset($error['passwordError'])): ?>
                    <h3 style="color: red;"><?=$error['passwordError']?></h3>
            <?php endif ?>
			<div style="display: flex; flex-direction: column; align-items: center;">
				<input name="name" value="<?php if(!empty($_POST)){ echo $name; } ?>" type="text" placeholder="Введите имя пользователя" id="username" />
                <?php if(isset($error['name'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['name']?></small>
                <?php endif ?>
			</div>
            <div style="display: flex; flex-direction: column; align-items: center;">
				<input name="email" value="<?php if(!empty($_POST)){ echo $email; } ?>" type="email" placeholder="Email" id="email" />
                <?php if(isset($error['email'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['email']?></small>
                <?php endif ?>
			</div>
            <div style="display: flex; flex-direction: column; align-items: center;">
				<input name="password" type="password" placeholder="Введите пароль" id="password" />
                <?php if(isset($error['password'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['password']?></small>
                <?php endif ?>
			</div>
            <div style="display: flex; flex-direction: column; align-items: center;">
				<input name="passwordConfirm" type="password" placeholder="Повторите пароль" id="password" />
                <?php if(isset($error['passwordConfirm'])): ?>
                    <small style="margin-top: -10px; margin-bottom: 15px"><?=$error['passwordConfirm']?></small>
                <?php endif ?>
            </div>
			<div>
				<input type="submit" value="Register" />
				<a href="/?act=login">Login</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
  
  
</body>
</html>