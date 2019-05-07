
    <!-- BEGIN: Header-->

              <?php
                echo base64_decode('PGhlYWRlciBjbGFzcz0icGFnZS10b3BiYXIiIGlkPSJoZWFkZXIiPgogICAgICA8ZGl2IGNsYXNzPSJuYXZiYXIgbmF2YmFyLWZpeGVkIj4gCiAgICAgICAgPG5hdiBjbGFzcz0ibmF2YmFyLW1haW4gbmF2YmFyLWNvbG9yIG5hdi1jb2xsYXBzaWJsZSBzaWRlTmF2LWxvY2sgbmF2YmFyLWxpZ2h0Ij4KICAgICAgICAgIDxkaXYgY2xhc3M9Im5hdi13cmFwcGVyIj4KICAgICAgICAgICAgPGRpdiBjbGFzcz0iaGVhZGVyLXNlYXJjaC13cmFwcGVyIGhpZGUtb24tbWVkLWFuZC1kb3duIj4=').' '.base64_decode('PGg1IHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+').' '.base64_decode('UG93ZXJlZCBCeSB2Q3JldyBTeXM=').' '.base64_decode('PC9oNT4=').' '.base64_decode('PC9kaXY+');
               ?> 
            <ul class="navbar-list right">
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
              <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?php echo PilotData::getPilotAvatar(Auth::$userinfo->pilotid); ?>" alt="avatar"><i></i></span></a></li>
              <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
            </ul>
           
            
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="<?php echo url('profile/editprofile') ?>"><i class="material-icons">person_outline</i> Profile</a></li>
              <li><a class="grey-text text-darken-1" href="<?php echo url('logout') ?>"><i class="material-icons">keyboard_tab</i> Logout</a></li>
            </ul>
            <?php echo base64_decode('PC9kaXY+CiAgICAgICAgICA8bmF2IGNsYXNzPSJkaXNwbGF5LW5vbmUgc2VhcmNoLXNtIj4KICAgICAgICAgICAgPGRpdiBjbGFzcz0ibmF2LXdyYXBwZXIiPgogICAgICAgICAgICAgIDxmb3JtPgogICAgICAgICAgICAgICAgPGRpdiBjbGFzcz0iaW5wdXQtZmllbGQiPgogICAgICAgICAgICAgICAgICA8aW5wdXQgY2xhc3M9InNlYXJjaC1ib3gtc20iIHR5cGU9InNlYXJjaCIgcmVxdWlyZWQ9IiI+CiAgICAgICAgICAgICAgICAgIDxsYWJlbCBjbGFzcz0ibGFiZWwtaWNvbiIgZm9yPSJzZWFyY2giPjxpIGNsYXNzPSJtYXRlcmlhbC1pY29ucyBzZWFyY2gtc20taWNvbiI+c2VhcmNoPC9pPjwvbGFiZWw+PGkgY2xhc3M9Im1hdGVyaWFsLWljb25zIHNlYXJjaC1zbS1jbG9zZSI+Y2xvc2U8L2k+CiAgICAgICAgICAgICAgICA8L2Rpdj4KICAgICAgICAgICAgICA8L2Zvcm0+CiAgICAgICAgICAgIDwvZGl2PgogICAgICAgICAgPC9uYXY+CiAgICAgICAgPC9uYXY+CiAgICAgIDwvZGl2PgogICAgPC9oZWFkZXI+'); ?>
    <!-- END: Header-->



    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a style="margin-top:5px" class="brand-logo darken-1" href="javascript:void(0)">
            
            <!-- REMOVE THE below TAGS AND LINK YOUR LOGO IF YOU WANT YOUR LOGO -->
            
            
            
            <span class="logo-text hide-on-med-and-down"><?php echo SITE_NAME ?></span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold">
            <a id="dash" class="waves-effect waves-cyan active" href="<?php echo SITE_URL ?>/index.php/Profile">
                <i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span>
            </a>
        </li>
        <li class="bold">
            <a id="bid" class="waves-effect waves-cyan " href="<?php echo SITE_URL ?>/index.php/FltBook">
                <i class="material-icons">flight</i><span class="menu-title" data-i18n="">Bid/Book a Flight</span>
            </a>
        </li>
        <li class="bold">
            <a id="bids" class="waves-effect waves-cyan " href="<?php echo SITE_URL ?>/index.php/Schedules/Bids">
                <i class="material-icons">edit</i><span class="menu-title" data-i18n="">My Bids</span>
            </a>
        </li>
        <li class="bold">
            <a id="pireps" class="waves-effect waves-cyan " href="<?php echo SITE_URL ?>/index.php/PIREPs">
                <i class="material-icons">assignment</i><span class="menu-title" data-i18n="">My PIREPs</span>
            </a>
        </li>
        
        <li class="bold">
            <a id="contact" class="waves-effect waves-cyan " href="<?php echo SITE_URL ?>/index.php/Contact">
                <i class="material-icons">contact_mail</i><span class="menu-title" data-i18n="">Contact Us</span>
            </a>
        </li>
        
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
<!--end container--><!-- START RIGHT SIDEBAR NAV -->
<aside id="right-sidebar-nav">
   <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
      <div class="row">
         <div class="slide-out-right-title">
            <div class="col s12 border-bottom-1 pb-0 pt-1">
               <div class="row">
                  <div class="col s2 pr-0 center">
                     <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                  </div>
                  <div class="col s10 pl-0">
                     <ul class="tabs">
                        <li class="tab col s12 p-0">
                           <a href="#messages" class="active">
                              <span>Notifications</span>
                           </a>
                        </li>
                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="slide-out-right-body">
            <div id="messages" class="col s12">
               <div class="collection border-none">
                  
                  <ul class="collection p-0">
                      
                      <?php
                            
                            $count = '5';
                            $pireps = PIREPData::getRecentReportsByCount($count);
                            if(!$pireps){
                                ?>
                            <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                
                                <div class="user-content">
                                   <h6 class="line-height-0">NO PIREPs FILED</h6>
                                </div>
                                
                             </li>
                            <?php
                            }
                            foreach($pireps as $pirep){
                                $pilotdata = PilotData::getPilotData($pirep->pilotid);
                                $pilotname = $pilotdata->firstname.' '.$pilotdata->lastname;
                                $depicao = $pirep->depicao;
                                $arricao = $pirep->arricao;
                                $avatar = PilotData::getPilotAvatar($pirep->pilotid);
                            ?>
                      <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                        <span class="avatar-status avatar-online avatar-50"
                           ><img src="<?php echo $avatar ?>" alt="avatar" />
                           <i></i>
                        </span>
                        <div class="user-content">
                           <h6 class="line-height-0"><?php echo $pilotname ?></h6>
                           <a class="medium-small blue-grey-text text-lighten-3 pt-3" href="<?php echo url('pireps/view/'.$pirep->pirepid); ?>"><?php echo $depicao.' '.$arricao ?></a>
                        </div>
                        <span class="secondary-content medium-small"><?php echo date(DATE_FORMAT, $pirep->submitdate); ?></span>
                     </li>
                      <hr>
                      <?php
                            }
                      ?>
                      <?php
                      $count = '5';
                      $schedules = SchedulesData::getRecentSchedules($count);
                      if(!$schedules){
                          echo '<li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                
                                <div class="user-content">
                                   <h6 class="line-height-0">NO Schedules Added</h6>
                                </div>
                                
                         </li>';
                      }
                      foreach($schedules as $sched)
                      {
                      ?>
                      <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                      
                        <div class="user-content">
                           <h6 class="line-height-0"><?php echo $sched->depicao.' '.$sched->arricao ?></h6>
                           <a class="medium-small blue-grey-text text-lighten-3 pt-3" href="<?php echo url('schedules/details/'.$sched->id) ?>">View Details</a>
                        </div>
                        <span class="secondary-content medium-small"><?php echo $pirep->submitdate ?></span>
                     </li>
                      <?php
                      }
                      ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</aside>
<!-- END RIGHT SIDEBAR NAV -->
