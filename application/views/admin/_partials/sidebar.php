<nav>
  <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <?php if ($this->session->level == 1) { ?>
      <li class="nav-item">
        <a href="<?= base_url('admin/sales') ?>" class="nav-link">
          <i class="fas fa-cart-arrow-down fa-fw nav-icon"></i>
          <p>Sales</p>
        </a>
      </li>
    <?php } ?>

    <?php if ($this->session->level == 2) { ?>
      <li class="nav-item has-treeview mt-1">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th-large fa-fw"></i>
          <p>
            Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('admin/barang') ?>" class="nav-link">
              <i class="far fa-circle nav-icon text-sm"></i>
              <p>Barang</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin/import') ?>" class="nav-link">
          <i class="fas fa-cubes fa-fw nav-icon"></i>
          <p>Import</p>
        </a>
      </li>

    <?php } ?>
    <?php if ($this->session->level == 3) { ?>
      <li class="nav-item">
        <a href="<?= base_url('admin/management') ?>" class="nav-link">
          <i class="fas  fa-file-alt fa-fw nav-icon"></i>
          <p>HPP</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin/simulator') ?>" class="nav-link">
          <i class="fas  fa-calculator fa-fw nav-icon"></i>
          <p>Simulasi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin/report') ?>" class="nav-link">
          <i class="fas  fa-file-alt fa-fw nav-icon"></i>
          <p>Report</p>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item mt-1">
      <a href="javascript:void(0)" class="nav-link" onclick="logout()">
        <i class="nav-icon fas fa-sign-out-alt fa-fw"></i>
        <p>
          Keluar
        </p>
      </a>
    </li>

</nav>