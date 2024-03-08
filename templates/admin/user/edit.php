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
            <h1 class="m-0">User</h1>
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
          <div class="card card-primary col-4">
              <div class="card-header">
                  <h3 class="card-title">Edit user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                  <input type="hidden" name="act" value="users_edit">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputPassword1">Имя пользователя</label>
                          <input value="<?=$user['name']?>" type="text" name="name"  class="form-control" id="exampleInputPassword1" placeholder="Введите имя пользователя">
                          <?php if (isset($error['name'])): ?>
                              <small class="text-danger"><?=$error['name']?></small>
                          <?php endif ?>
                      </div>
                      <div class="form-check">
                          <input    <?php if ($user['is_admin'] == 1){
                                            echo 'checked';
                                    }
                                    ?>
                          name="isAdmin" type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Права администратора</label>
                      </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
