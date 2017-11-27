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
            
            <li  class="<?php if($page_name == 'food_content_pages.php' || $page_name == 'add_food_content_pages.php' || $page_name == 'edit_food_content_pages.php' ) { echo "active"; } ?>">
              <a href="food_content_pages.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-item  zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Content Pages</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_banners.php' || $page_name == 'add_food_banners.php' || $page_name == 'edit_food_banners.php' ) { echo "active"; } ?>">
              <a href="food_banners.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Banners</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_category.php' || $page_name == 'add_food_category.php' || $page_name == 'edit_food_category.php' ) { echo "active"; } ?>">
              <a href="food_category.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Categories</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_sub_category.php' || $page_name == 'add_food_sub_category.php' || $page_name == 'edit_food_sub_category.php' ) { echo "active"; } ?>">
              <a href="food_sub_category.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Sub Categories</span>
              </a>
            </li> 
            <li  class="<?php if($page_name == 'food_restaurants.php' || $page_name == 'add_food_restaurants.php' || $page_name == 'edit_food_restaurants.php' ) { echo "active"; } ?>">
              <a href="food_restaurants.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-local-offer zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Restaurants</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_product_weights.php' || $page_name == 'add_food_product_weights.php' || $page_name == 'edit_food_product_weights.php') { echo "active"; } ?>">
              <a href="food_product_weights.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Weights</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_ingredients.php' || $page_name == 'add_food_ingredients.php' || $page_name == 'edit_food_ingredients.php') { echo "active"; } ?>">
              <a href="food_ingredients.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-store zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Ingredients</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'food_products.php' || $page_name == 'add_food_products.php' || $page_name == 'edit_food_products.php') { echo "active"; } ?>">
              <a href="food_products.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-shopping-basket zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Products</span>
              </a>
            </li>           
            
            <!-- <li  class="<?php if($page_name == 'services_brand_logos.php' || $page_name == 'add_services_brand_logos.php' || $page_name == 'edit_services_brand_logos.php' ) { echo "active"; } ?>">
              <a href="services_brand_logos.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Brand Logos</span>
              </a>
            </li> -->
            <!-- <li  class="<?php if($page_name == 'food_testimonials.php' || $page_name == 'add_food_testimonials.php' || $page_name == 'edit_food_testimonials.php') { echo "active"; } ?>">
              <a href="food_testimonials.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-comments  zmdi-hc-fw"></i>
                </span> 
                <span class="menu-text">Testimonials</span>
              </a>
            </li> -->
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
            <li  class="<?php if($page_name == 'food_newletter.php' ) { echo "active"; } ?>">
              <a href="food_newletter.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-collection-image zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">News Letters</span>
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