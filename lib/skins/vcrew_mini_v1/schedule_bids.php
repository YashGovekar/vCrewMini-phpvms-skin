<?php

if(isset($_POST['bidid'])){
    $bidid = $_POST['bidid'];
    SchedulesData::deleteBid($bidid);
    
}
?>
<div class="row">
        <div id="breadcrumbs-wrapper" data-image="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Your Bids</h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?php echo url('Schedules/Bids') ?>">My Bids</a>
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
          <h4 class="card-title">Pilot Bids</h4>
          <div class="row">
            <div id="bidsdata" class="col s12">
                <?php
                if(!$bids){
                        ?>
                    <div class="card-alert card red lighten-5">
                        <div class="card-content red-text darken-1">
                          <span class="card-title red-text darken-1">No Bids Found</span>
                          <p>You have not booked any Flight yet. Please Book a Flight by clicking on button below.</p>
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
                    <th>Route</th>
                    <th>Aircraft</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Distance</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                    
                    foreach($bids as $bid)
                    {
                    ?>
                    <tr id="bid<?php echo $bid->bidid ?>"  style="font-weight: bold;">
                        <td><?php echo $bid->code . $bid->flightnum; ?></td>
                        <td align="center"><?php echo $bid->depicao; ?> to <?php echo $bid->arricao; ?></td>
                        <td align="center"><?php echo $bid->aircraft; ?> (<?php echo $bid->registration?>)</td>
                        <td><?php echo $bid->deptime;?></td>
                        <td><?php echo $bid->arrtime;?></td>
                        <td><?php echo $bid->distance;?></td>
                        <td>
                            
                            <a title="Details" class="btn-floating mb-1 waves-effect waves-light " href="<?php echo url('/schedules/details/'.$bid->id);?>"><i class="material-icons right">assignment</i></a>
                            <a title="Boarding Pass" class="btn-floating mb-1 waves-effect waves-light green darken-1" href="<?php echo url('/schedules/boardingpass/'.$bid->id);?>"><i class="material-icons right">credit_card</i></a>
                            <a title="Remove Bid" id="remove" data-id="<?php echo $bid->bidid; ?>" class="deleteitem btn-floating mb-1 waves-effect waves-light red accent-2" href="javascript:void(0)"><i class="material-icons right">cancel</i></a>

                        </td>
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
    $('#bids').addClass('active');
});
    
$(document).ready(function(){
                  $(document).on('click', '#remove', function(e){
                      $this = $(this);
                      $this.val("processing") // or: this.value = "processing";  

                    var bidid = $(this).data('id');
                    var pilotID = <?php echo Auth::$userinfo->pilotid ?>;
                    
                    SwalDeletea(bidid,pilotID);
                    e.preventDefault();
                  
                function SwalDeletea(bidid,pilotID){
                    
                    $.ajax({
                    type: "POST",
                    url: '<?php echo url('Schedules/Bids')?>',
                      type: 'POST',
                      data: {
                        'bidid': bidid,
                        'pilotid': pilotID
                      },
                    success: function () {
                        swal("Cancelled!", "Your flight has been Cancelled!", "success");
                        $('#bidsdata').load(document.URL + ' #bidsdata');
                    }
                    }
                           );

                 
                }
                }
                );
                }
                );
    
</script>