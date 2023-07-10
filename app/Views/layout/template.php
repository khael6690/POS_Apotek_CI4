<!DOCTYPE html>
<html lang="en">

<?= $this->include('components/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-not-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?= $this->include('components/navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('components/sidebar'); ?>

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
  <?= $this->include('components/foot'); ?>
  <?= $this->renderSection('script'); ?>

</body>

</html>