<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?php echo $page_title; ?></title>
    <link rel="apple-touch-icon" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php 
    
    // Turn off error reporting
    error_reporting(0);
    /* This is required, so phpVMS can output the necessary libraries it needs */
    echo $page_htmlhead; 
    ?>
    <!-- BEGIN: VENDOR CSS-->
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/sweetalert/sweetalert.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/themes/vertical-dark-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/pages/data-tables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/pages/form-wizard.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/css/custom/custom.css">
    <!-- END: Page Level CSS-->
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
      
    <?php
        echo $page_htmlreq;
        // var_dump($_SERVER['REQUEST_URI']);
        # Hide the header if the page is not the registration or login page
        # Bit hacky, don't like doing it this way
        if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/registration') {
        if(Auth::LoggedIn()) {
        Template::Show('app_top.php');
        }
        }
    ?>

    <!-- END: SideNav-->
    
    <!-- BEGIN: Page Main-->
    <div id="main">
        <?php
        $mypilotid = Auth::$userinfo->pilotid;
        echo $page_content;
        ?>
    </div>
    
    <?php
        if(Auth::LoggedIn()) 
        {
        Template::Show('app_bottom.php');
        }
    ?>
        
        
        
        
    <!--  PHP CODE HERE-->
        
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/chartjs/chart.min.js"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/data-tables/js/dataTables.select.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/vendors/sweetalert/sweetalert.min.js"></script>
      
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/custom/custom-script.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
      
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/dashboard-ecommerce.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/intro.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/data-tables.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/extra-components-sweetalert.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/js/scripts/form-wizard.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
      
  </body>

</html>   
        
        
        
        