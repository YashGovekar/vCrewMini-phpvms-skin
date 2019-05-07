<div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Your PIREPs</h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo url('PIREPs') ?>">My PIREPs</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
  <!-- DataTables example -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="button-trigger" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">PIREPs Filed</h4>
          <div class="row">
            <div class="col s12">
                <?php
                if(!$pirep_list){
                        ?>
                    <div class="card-alert card red lighten-5">
                        <div class="card-content red-text darken-1">
                          <span class="card-title red-text darken-1">No PIREPs Found</span>
                          <p>You have not flown any Flight yet. Please Book and Fly a Flight by clicking on button below.</p>
                        </div>
                        <div class="card-action red lighten-4">
                          <a href="<?php echo url('/Fltbook') ?>" class="red-text">Bid/Book Flights</a>
                        </div>
                    </div>
                    <?php
                    }
               else { 
                ?>
              <table id="data-table-simple" class="display">
                <thead>
                  <tr>
                    <th>Flight Number</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Aircraft</th>
                    <th>Flight Time</th>
                    <th>Submitted</th>
                    <th>Status</th>
                    <?php
                        // Only show this column if they're logged in, and the pilot viewing is the
                        //	owner/submitter of the PIREPs
                        if(Auth::LoggedIn() && Auth::$pilot->pilotid == $pilot->pilotid) {
                            echo '<th>Options</th>';
                        }
                    ?>
                  </tr>
                </thead>
                <tbody>
                   <?php
                    foreach($pirep_list as $pirep) {
                    ?>
                    <tr>
                        <td align="center">
                            <?php echo $pirep->code . $pirep->flightnum; ?>
                        </td>
                        <td align="center"><?php echo $pirep->depicao; ?></td>
                        <td align="center"><?php echo $pirep->arricao; ?></td>
                        <td align="center"><?php echo $pirep->aircraft . " ($pirep->registration)"; ?></td>
                        <td align="center"><?php echo $pirep->flighttime; ?></td>
                        <td align="center"><?php echo date(DATE_FORMAT, $pirep->submitdate); ?></td>
                        <td align="center">
                            <?php

                            if($pirep->accepted == PIREP_ACCEPTED) {
                                echo '<span data-badge-caption="" class="new badge green">Accepted</span>';
                            } elseif($pirep->accepted == PIREP_REJECTED) {
                                echo '<span data-badge-caption="" class="new badge red">Rejected</span>';
                            } elseif($pirep->accepted == PIREP_PENDING) {
                                echo '<span data-badge-caption="" class="new badge orange">Approval Pending</span>';
                            } elseif($pirep->accepted == PIREP_INPROGRESS) {
                                echo '<span data-badge-caption="" class="new badge yellow">Flight in Progress</span>';
                            }


                            ?>
                        </td>
                        <?php
                        // Only show this column if they're logged in, and the pilot viewing is the
                        //	owner/submitter of the PIREPs
                        if(Auth::LoggedIn() && Auth::$pilot->pilotid == $pirep->pilotid) {
                            ?>
                        <td align="right">
                            <a class="btn mb-1 waves-effect waves-light " href="<?php echo url('/pireps/view/'.$pirep->pirepid);?>">View PIREP</a>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                    } }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
                </div>
              </div>
            </div>
    </div>
</div>

<script>
$(document).ready(function(){
   $('#dash').removeClass('active');
    $('#pireps').addClass('active');
});
</script>