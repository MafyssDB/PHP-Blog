<?php include 'includes/header.php'?>
<body>

<div id="templatemo_wrapper">

    <?php include 'includes/menu.php'?>           
	<!-- end of templatemo_menu -->
    <div id="templatemo_right_column">
        <div id="templatemo_main">
            <form action="/?act=create" enctype="multipart/form-data" method="POST">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">Заголовок поста</label>
                        <input value="<?php if(!empty($_POST)){ echo $title; } ?>" type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите заголовок поста">
                        <?php if (isset($error['title'])): ?>
                            <small class="text-danger"><?=$error['title']?></small>
                        <?php endif ?>
                    </div>
                    <div class="form-group mb-3">
                        <label>Контент</label>
                        <textarea name="content" class="form-control" rows="10" placeholder="Enter ..."><?php if(!empty($_POST)){ echo $content; } ?></textarea>
                        <?php if (isset($error['content'])): ?>
                            <small class="text-danger"><?=$error['content']?></small>
                        <?php endif ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputFile">Загрузите изображение</label>
                        <div class="input-group">
                            <div class="input-group">
                                <input name="image" type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-6 mb-3">
                        <label>Выберите категорию</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option value="0">--category--</option>
                            <?php foreach ($categories as $category): ?>
                                <option <?php if(!empty($_POST) && (int)$_POST['category_id'] === $category['id'] ){ echo 'selected'; } ?> value="<?=$category['id']?>"><?=$category['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>




    <div class="cleaner"></div>
    <!-- end of templatemo_main -->
    <?php include 'includes/footer.php'?>
  
    <div class="cleaner"></div>
</div> <!-- end of warpper -->

</body>
</html>