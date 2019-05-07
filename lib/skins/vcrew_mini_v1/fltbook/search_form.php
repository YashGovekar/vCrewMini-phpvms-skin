<div id="breadcrumbs-wrapper" data-image="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg" class="breadcrumbs-bg-image" style="background-image: url(&quot;<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg&quot;);">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Schedules Search</h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="#">Flight Booking</a>
                  </li>
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
<div class="container">
    <div class="card">
    <?php
    $pilotid        = Auth::$userinfo->pilotid;
    $last_location  = FltbookData::getLocation($pilotid);
    $last_name      = OperationsData::getAirportInfo($last_location->arricao);
    if(!$last_location) {
      FltbookData::updatePilotLocation($pilotid, Auth::$userinfo->hub);
    }
    ?>
       <div class="card-content">
          <h4 class="card-title">Schedule Search</h4>
          <h4>Current Location: <?php if($settings['search_from_current_location'] == 1) { ?>
                           
                            <font color="red">
                                <?php echo $last_location->arricao; ?> - <?php echo $last_name->name; ?>
                            </font>
                  <?php } else { ?>
                    <font color="red"><?php echo $last_location->arricao; ?> - <?php echo $last_name->name; ?></font>
                  <?php } ?>
              </h4>
           

       </div>
    </div>
</div>

<hr />
<div class="container">
    <div class="card">
        <div class="card-content">
<form style="width:600px;margin:auto" action="<?php echo url('/Fltbook');?>" class="row" method="post">
     <?php if($settings['search_from_current_location'] == 1) { ?>
    <input id="depicao" name="depicao" type="hidden" value="<?php echo $last_location->arricao; ?>">
    <?php } ?>
    <?php if($settings['search_from_current_location'] == 0) { ?>
     <div class="input-field col s12">
        <select class="search" name="depicao">
            <option value="" selected disabled>Choose Your Departure Location</option>
            <?php
              foreach ($depappts as $depappt) {
                echo '<option value="'.$depappt->depicao.'">'.$depappt->depicao.' - '.$depappt->depname.'</option>';
              }
            ?>
        </select>
        <label>Select a Departure Location:</label>
      </div>
    <?php } ?>
    <div class="input-field col s12">
        <select class="search" name="airline">
          <option value="">Any</option>
          <?php
            foreach ($airlines as $airline) {
              echo '<option value="'.$airline->code.'">'.$airline->name.'</option>';
            }
          ?>
        </select>
        <label>Select An Airline:</label>
      </div>
    <div class="input-field col s12">
        <select class="search" name="aircraft">
              <option value="" selected>Any</option>
              <?php
              if($settings['search_from_current_location'] == 1) {
		$airc = FltbookData::routeaircraft($last_location->arricao);
		if(!$airc) {
		      echo '<option>No Aircraft Available!</option>';
	        } else {
		      foreach ($airc as $air) {
			$ai = FltbookData::getaircraftbyID($air->aircraft);
			echo '<option value="'.$ai->icao.'">'.$ai->name.'</option>';
		      }
	        }
              } else {
                $airc = FltbookData::routeaircraft_depnothing();
                if(!$airc) {
		  echo '<option>No Aircraft Available!</option>';
	        } else {
                  foreach($airc as $ai) {
                    echo '<option value="'.$ai->icao.'">'.$ai->name.'</option>';
                  }
                }
              }
	      ?>
            </select>
        <label>Select An Aircraft Type:</label>
      </div>
    <div class="input-field col s12">
        <select class="search" name="arricao">
                  <option value="">Any</option>
                  <?php
                  if($settings['search_from_current_location'] == 1) {
                    $airs = FltbookData::arrivalairport($last_location->arricao);
                    if(!$airs) {
                      echo '<option>No Airports Available!</option>';
                    } else {
                      foreach ($airs as $air) {
                        $nam = OperationsData::getAirportInfo($air->arricao);
                        echo '<option value="'.$air->arricao.'">'.$air->arricao.' - '.$nam->name.'</option>';
                      }
                    }
                  } else {
                    foreach($arrappts as $arrappt) {
                      echo '<option value="'.$arrappt->arricao.'">'.$arrappt->arricao.' - '.$arrappt->arrname.'</option>';
                    }
                  }
                  ?>
              </select>
        <label>Select Arrival Airfield:</label>
      </div>
    <div class="input-field col s12">
        <input type="hidden" name="action" value="search" />
        <button class="btn mb-1 waves-effect waves-light " type="submit" name="submit">Search Flights
          <i class="material-icons right">send</i>
        </button>
        
    </div>

</form>
        </div>
    </div>
</div>
<hr />


<div class="container">
    <div class="card">
        <div class="card-content">
            
<?php if($settings['search_from_current_location'] == 1) { ?>
<h4>Pilot Transfer</h4>
<form style="width:600px;margin:auto" action="<?php echo url('/Fltbook/jumpseat');?>" class="row" method="post">
    
    <div class="input-field col s12">
        <div id="errors"></div>
        <h5>Transfer To :</h5>
                <select class="search" name="depicao" onchange="calculate_transfer(this.value)">
                    <option value="" selected disabled>Select Airport</option>
                    <?php
                    foreach($depappts as $airport) {
                      if($airport->depicao == $last_location->arricao) {
                        continue;
                      }

                      echo '<option value="'.$airport->depicao.'">'.$airport->depicao.' - '.$airport->depname.'</option>';
                    }
                    ?>
                </select>
        <button type="submit" class="waves-effect waves-light btn mb-1" id="purchase_button" value="Purchase Transfer!" disabled="disabled">
            <i class="material-icons right">gps_fixed</i> Purchase Transfer!
        </button>
        
      </div>
    <div class="input-field col s12">
        <h5>Distance Travelling : <font id="distance_travelling" ></font></h5>
       
    </div>
    
    <div class="input-field col s12">
        
        <h5>Cost: <font id="jump_purchase_cost" ></font></h5>
    </div>
 
   <input type="hidden" name="cost">
   <input type="hidden" name="airport">
  </form>

           
        </div>
    </div>
</div>
<script type="text/javascript">
function calculate_transfer(arricao) {
  var distancediv = $('#distance_travelling')[0];
  var costdiv     = $('#jump_purchase_cost')[0];
  var errorsdiv     = $('#errors')[0];

  errorsdiv.innerHTML = '';

  $.ajax({
    url: baseurl + "/action.php/Fltbook/get_jumpseat_cost",
    type: 'POST',
    data: { depicao: "<?php echo $last_location->arricao; ?>", arricao: arricao, pilotid: "<?php echo Auth::$userinfo->pilotid; ?>" },
    success: function(data) {
      data = $.parseJSON(data);
      console.log(data);

      if(data.error) {
        $("#purchase_button").prop('disabled', true);
        errorsdiv.innerHTML = "<font color='red'>Not enough funds for this transfer!</font>";
      } else {
        $("#purchase_button").prop('disabled', false);
        distancediv.innerHTML = data.distance + "nm";
        costdiv.innerHTML = "$" + data.total_cost;
      }

    },
    error: function(e) {
      console.log(e);
    }
  });
}
</script>
<?php } ?>
<script>
$(document).ready(function(){
    $('#dash').removeClass('active');
    $("#bid").addClass('active');
});
</script>
