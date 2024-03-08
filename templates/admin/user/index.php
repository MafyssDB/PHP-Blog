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
          <div class="card col-5">
              <div class="card-header">
                  <h3 class="card-title">Пользователи</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th style="width: 10px">ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Admin</th>
                          <th colspan="1">Действия</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($users as $user): ?>
                      <tr>
                          <td><?=$user['id']?></td>
                          <td><?= $user['name']?></td>
                          <td><?= $user['email']?></td>
                          <td><?php if ($user['is_admin'] == 1){
                                  echo 'Yes';
                              }else
                                  echo 'No';
                              ?>
                          </td>
                          <td>
                              <a class="btn btn-primary" href="/admin/?act=users_edit&id=<?=$user['id']?>">Edit</a>
                              <a class="btn btn-danger" href="/admin/?act=users_delete&id=<?=$user['id']?>">Delete</a>
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
