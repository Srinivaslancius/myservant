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
            <li  class="<?php if($page_name == 'service_provider_registration.php' || $page_name == 'add_service_provider_registration.php' || $page_name == 'edit_service_provider_registration.php' ) { echo "active"; } ?>">
              <a href="service_provider_registration.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Service Provider Registrations</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'service_employee_registration.php' || $page_name == 'add_service_employee_registration.php' || $page_name == 'edit_service_employee_registration.php' ) { echo "active"; } ?>">
              <a href="service_employee_registration.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Service Employees</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_content_pages.php' || $page_name == 'add_services_content_pages.php' || $page_name == 'edit_services_content_pages.php' ) { echo "active"; } ?>">
              <a href="services_content_pages.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-item  zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Serivce Content Pages</span>
              </a>
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
            <li  class="<?php if($page_name == 'services_groups.php' || $page_name == 'add_services_groups.php' || $page_name == 'edit_services_groups.php' ) { echo "active"; } ?>">
              <a href="services_groups.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Groups</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_group_service_names.php' || $page_name == 'add_services_group_service_names.php' || $page_name == 'edit_services_group_service_names.php' ) { echo "active"; } ?>">
              <a href="services_group_service_names.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Service Names</span>
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
            <li  class="<?php if($page_name == 'services_brand_logos.php' || $page_name == 'add_services_brand_logos.php' || $page_name == 'edit_services_brand_logos.php' ) { echo "active"; } ?>">
              <a href="services_brand_logos.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Brand Logos</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_newletter.php' ) { echo "active"; } ?>">
              <a href="services_newletter.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">New Letters</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'services_our_branches.php' || $page_name == 'add_services_our_branches.php' || $page_name == 'edit_services_our_branches.php' ) { echo "active"; } ?>">
              <a href="services_our_branches.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-pin zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Our Branches</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'lkp_states.php' || $page_name == 'add_lkp_states.php' || $page_name == 'edit_lkp_states.php' ) { echo "active"; } ?>">
              <a href="lkp_states.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-pin zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">States</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'lkp_districts.php' || $page_name == 'add_lkp_districts.php' || $page_name == 'edit_lkp_districts.php' ) { echo "active"; } ?>">
              <a href="lkp_districts.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-pin zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Districts</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'lkp_cities.php' || $page_name == 'add_lkp_cities.php' || $page_name == 'edit_lkp_cities.php' ) { echo "active"; } ?>">
              <a href="lkp_cities.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-pin zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Cities</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'lkp_locations.php' || $page_name == 'add_lkp_locations.php' || $page_name == 'edit_lkp_locations.php' ) { echo "active"; } ?>">
              <a href="lkp_locations.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-pin zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Locations</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'customer_enquireis.php' ) { echo "active"; } ?>">
              <a href="customer_enquireis.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Customer Enquireis</span>
              </a>
            </li>
          </ul>
        </div>
      </div>