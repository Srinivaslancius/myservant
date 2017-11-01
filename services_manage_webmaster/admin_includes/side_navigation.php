<?php
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $page_name = $parts[count($parts) - 1];
?>
<div class="site-left-sidebar">
        <div class="sidebar-backdrop"></div>
        <div class="custom-scrollbar">
          <ul class="sidebar-menu">
            <li class="menu-title">Menu</li>
             <li  class="<?php if($page_name == 'dashboard.php') { echo "active"; } ?>">
              <a href="dashboard.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Dashboard</span>
              </a>
            </li>
            <li class="<?php if($page_name == 'site_settings.php') { echo "active"; } ?>">
              <a href="site_settings.php" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-settings zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Site Settings</span>
              </a>
            </li>
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Users</span>
              </a>
              <ul class="sidebar-submenu collapse">
                <li class="menu-subtitle">Users</li>
                <li class="<?php if($page_name == 'admin_users.php' || $page_name == 'add_admin_users.php' || $page_name == 'edit_admin_users.php') { echo "active"; } ?>"><a href="admin_users.php">Admin Users</a></li> 
                <li class="<?php if($page_name == 'users.php' || $page_name == 'add_users.php' || $page_name == 'edit_users.php') { echo "active"; } ?>"><a href="users.php">Users</a></li>
              </ul>
            </li>
            <li  class="<?php if($page_name == 'services_category.php' || $page_name == 'add_services_category.php' || $page_name == 'edit_services_category.php' ) { echo "active"; } ?>">
              <a href="services_category.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Categories</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_sub_category.php' || $page_name == 'add_services_sub_category.php' || $page_name == 'edit_services_sub_category.php' ) { echo "active"; } ?>">
              <a href="services_sub_category.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Sub Categories</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_banners.php' || $page_name == 'add_services_banners.php' || $page_name == 'edit_services_banners.php' ) { echo "active"; } ?>">
              <a href="services_banners.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Banners</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_groups.php' || $page_name == 'add_services_groups.php' || $page_name == 'edit_services_groups.php' ) { echo "active"; } ?>">
              <a href="services_groups.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Groups</span>
              </a>
            </li>
          </ul>
        </div>
      </div>