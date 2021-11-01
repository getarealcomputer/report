<?= $this->extend('layouts/master') ?>

<?= $this->section('head') ?>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<?= $this->endSection() ?>

<?= $this->section('foot') ?>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/raphael/raphael.min.js"></script>
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('assets/adminlte3') ?>/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="<?= base_url('assets/adminlte3') ?>/js/pages/dashboard2.js"></script>
<?= $this->endSection() ?>
<?php echo $this->section('content'); ?>
    <div class="col-12">
      <?php if(session()->has("success")): ?>
        <div class="alert alert-success">
          <?= session("success") ?>
        </div>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <div class="card-title">Users Table</div> 
          <div class="card-tools">
            <a href="<?= route_to('users.add') ?>" class="btn btn-sm btn-success">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Username</th>
                <th>Passphrase</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
          <?php if ($model): ?>
            <?php foreach($model as $row) : ?>
              <tr>
                <td><?php echo esc($row['username']); ?></td>
                <td><?php echo esc($row['password']); ?></td>
                <td><?php echo esc($row['email']); ?></td>
                <td>
                  <a href="" class="btn btn-primary btn-rounded btn-condensed btn-sm">
                    <span class="fa fa-pen"></span>
                  </a>
                  <a href="" class="btn btn-danger btn-rounded btn-condensed btn-sm" onClick="return confirm('Hapus Data Ini ?')"
                    ><span class="fa fa-trash"></span>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr class="no-data">
              <td class="text-warning" colspan="">NULL</td>
            </tr>
          <?php endif; ?>  
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
<?php echo $this->endSection(); ?>
