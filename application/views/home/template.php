<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/default-skin/default-skin.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>fonts/stroyka/stroyka.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/css/'); ?>sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/gijgo/css/gijgo.min.css') ?>">
  <script src="<?= base_url('assets/template/tema/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/template/js/header.js') ?>"></script>
  <script>
    var site_url = '<?= base_url() ?>';
  </script>

  <style>
    @media only screen and (max-width: 720px) {
      .ileft {
        text-align: right;
      }

      .iright {
        text-align: left;
      }

    }

    .foto-container {
      position: relative;

    }

    .foto-image {
      opacity: 1;
      display: block;
      width: 100%;
      height: 100%;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .foto-middle {
      transition: .5s ease;
      opacity: .3;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .foto-container:hover .foto-image {
      opacity: 0.5;
    }

    .foto-container:hover .foto-middle {
      opacity: 1;
    }

    .select2-container--default .select2-results>.select2-results__options {
      max-height: 400px;
      min-height: 400px;
      overflow-y: auto;
    }
  </style>

</head>

<body>
  <!-- quickview-modal -->
  <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content"></div>
    </div>
  </div>

  <!-- mobile menu -->
  <?php include '_include/mobilemenu.php'; ?>

  <!-- site -->
  <div class="site">
    <!-- navbar -->
    <?php include '_include/navbar.php'; ?>

    <div class="site__body">
      <!-- konten-->
      <div class="container" style="padding-top: 100px;">
        <?= $konten; ?>
      </div>
    </div>
    <!-- footer -->
    <?php include '_include/footer.php'; ?>
  </div>

  <script src="<?= base_url('assets/template/tema/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/nouislider/nouislider.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/photoswipe/photoswipe-ui-default.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/select2/js/select2.min.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>js/number.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>js/main.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>js/header.js"></script>
  <script src="<?= base_url('assets/template/tema/') ?>vendor/svg4everybody/svg4everybody.min.js"></script>
  <script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>
  <script src="<?= base_url('assets/template/js/footer.js') ?>"></script>
</body>

</html>