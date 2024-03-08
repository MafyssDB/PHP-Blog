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
          <div class="card col-4">
              <div class="card-header">
                  <h3 class="card-title">Категории</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <a href="/admin/?act=categories_create" class="btn btn-primary mb-3" >Создать категорию</a>
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th style="width: 10px">ID</th>
                          <th>NAME</th>
                          <th colspan="1">Действия</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($categories as $category): ?>
                      <tr>
                          <td><?=$category['id']?></td>
                          <td><?= $category['name']?></td>
                          <td>
                              <a class="btn btn-primary" href="/admin/?act=categories_edit&id=<?=$category['id']?>">Edit</a>
                              <a class="btn btn-danger" href="/admin/?act=categories_delete&id=<?=$category['id']?>">Delete</a>
                          </td>

                      </tr>
                      <?php endforeach ?>

                      </tbody>
                  </table>
              </div>
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
