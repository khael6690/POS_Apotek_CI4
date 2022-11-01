<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-not-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?= $this->include('layout/navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('layout/menu'); ?>

    <!-- Main content -->
    <?= $this->renderSection('content'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?></a>.</strong>
    All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->
  <?= $this->include('layout/foot'); ?>
  <?= $this->renderSection('script'); ?>

</body>

</html>