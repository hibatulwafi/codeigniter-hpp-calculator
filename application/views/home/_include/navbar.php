<!-- mobile site__header -->
<header class="site__header d-lg-none">
  <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
  <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
    <div class="mobile-header__panel">
      <div class="container">
        <div class="mobile-header__body">
          <button class="mobile-header__menu-button">
            <svg width="18px" height="14px">
              <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#menu-18x14"></use>
            </svg>
          </button>

          <?php

          echo "<a href='" . base_url() . "' class='mobile-header__logo'><img height='40px' src='" . base_url() . "assets/images/logo/logo.png'/></a>";

          ?>
        </div>
      </div>
    </div>
  </div>
</header>

<header class="site__header d-lg-block d-none">
  <div class="site-header">

    <div class="site-header__nav-panel">
      <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
      <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
        <div class="nav-panel__container container">
          <div class="nav-panel__row">
            <div class="nav-panel__logo mr-2">
              <a href="<?= base_url() ?>">
                <?php
                echo "<a href='" . base_url() . "'><img height='40px' src='" . base_url() . "assets/images/logo/logo.png'/></a>";
                ?>
              </a>
            </div><!-- .nav-links -->
          </div>
        </div>
      </div>
    </div>
  </div>
</header>