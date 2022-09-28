<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo base_url("resources/");?>assets/images/221.jpg" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">John Doe</a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>Web Developer</small>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="<?php echo base_url();?>">
                    <span class="m-r-xs"><i class="fa fa-home"></i></span>
                    <span>Home</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="profile.html">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.html">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>Çıkış Yap</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="<?php echo base_url(); ?>">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Gösterge Tablosu</span>
          </a>
        </li>
        
        <li class="has-submenu">
          <a href="<?php echo base_url("personel");?>">
            <i class="menu-icon fa-solid fa-user"></i>
            <span class="menu-text">Personel</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-calendar-days"></i>
            <span class="menu-text">Takvim</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-person-walking-arrow-right"></i>
            <span class="menu-text">İzin Yönetimi</span>
          </a>
        </li>
        
        <li>
          <a href="search.web.html">
            <i class="menu-icon fa-solid fa-calendar-plus"></i>
            <span class="menu-text">Puantaj</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-people-group"></i>
            <span class="menu-text">Temel IK</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-wifi"></i>
            <span class="menu-text">Modüller</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-money-bills"></i>
            <span class="menu-text">Bordro</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-money-check-dollar"></i>
            <span class="menu-text">Maaş Yönetimi</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fa-solid fa-file"></i>
            <span class="menu-text">Rapor Yönetimi</span>
          </a>
        </li>

        <li class="has-submenu">
          <a href="javascript:void(0)">
            <i class="menu-icon fas fa-gear"></i>
            <span class="menu-text">Sistem</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="calendar.html"><span class="menu-text">Başlık Yönetimi</span></a></li>
            <li><a href="contacts.html"><span class="menu-text">Ayarlar</span></a></li>
            <li><a href="contacts.html"><span class="menu-text">Modül Yönetimi</span></a></li>
            <li><a href="contacts.html"><span class="menu-text">Tema Ayarları</span></a></li>
            <li><a href="contacts.html"><span class="menu-text">Sabitler</span></a></li>
          </ul>
        </li>
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>