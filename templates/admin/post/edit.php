<?php include_once ROOT . '/templates/admin/layouts/header.php'; ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

    <?php include_once ROOT . '/templates/admin/layouts/navbar.php'; ?>

  <!-- Main Sidebar Container -->
  <?php include_once ROOT . '/templates/admin/layouts/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Изменение поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card card-primary col-5">
              <!-- form start -->
              <form action="" enctype="multipart/form-data" method="POST">
                  <input type="hidden" name="act" value="posts_edit">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Заголовок поста</label>
                          <input value="<?= $post['title']?>" type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите заголовок поста">
                          <?php if (isset($error['title'])): ?>
                                <small class="text-danger"><?=$error['title']?></small>
                          <?php endif ?>
                      </div>
                      <div class="form-group">
                          <label>Контент</label>
                          <textarea name="content" class="form-control" rows="10" placeholder="Enter ..."><?= $post['content']?></textarea>
                          <?php if (isset($error['content'])): ?>
                              <small class="text-danger"><?=$error['content']?></small>
                          <?php endif ?>
                      </div>
                      <?php if (isset($post['image'])): ?>
                      <div class="mb-3">
                          <p class="font-weight-bold">Текущее изображение</p>
                          <img src="<?='/images/' . $post['image']?>" alt="">
                      </div>
                      <?php endif ?>
                      <div class="form-group">
                          <label for="exampleInputFile">Добавьте изображение</label>
                          <div class="input-group">
                              <div class="custom-file">
                                  <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Добавьте изображение</label>
                              </div>
                              <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                              </div>
                          </div>
                      </div>
                      <div class="form-group col-5">
                          <label>Выберите категорию</label>
                          <select name="category_id" class="custom-select">
                              <option value="0">--category--</option>
                              <?php foreach ($categories as $category): ?>
                              <option <?php if((int)$post['category_id'] === $category['id'] ){ echo 'selected'; } ?> value="<?=$category['id']?>"><?=$category['name']?></option>
                              <?php endforeach ?>
                          </select>
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Изменить</button>
                  </div>
              </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>


</div>
<!-- ./wrapper -->

<?php include_once ROOT . '/templates/admin/layouts/footer.php'; ?>
