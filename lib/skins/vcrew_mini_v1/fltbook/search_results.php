
<?php
$pilotid = Auth::$userinfo->pilotid;
$last_location 	= FltbookData::getLocation($pilotid);
$last_name = OperationsData::getAirportInfo($last_location->arricao);
?>

<div id="breadcrumbs-wrapper" data-image="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg" class="breadcrumbs-bg-image" style="background-image: url(&quot;<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/breadcrumb-bg.jpg&quot;);">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">Contact Us</h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="#">Flights Search</a>
                  </li>
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
<div class="container">
<div class="section section-data-tables">
  <!-- DataTables example -->
  <div class="row">
    <div class="col s12 m12 l12">
    <div id="button-trigger" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Search Results</h4>
            <div class="col s12 m12 l12">
                <table id="data-table-simple" class="display">
<?php
if(!$allroutes) {
	echo '<div class="card-alert card red">
                <div class="card-content white-text">
                  <p>ERROR : No Flights Found!</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>';
} else {
?>
<thead>
	<tr>
	    <th>Airline</th>
	    <th>Flight Number</th>
	    <th>Origin</th>
	    <th>Destination</th>
	    <th>Aircraft</th>
        <th>Time/Distance</th>
	    <th>Options</th>
	    <?php if($settings['show_details_button'] == 1) { ?>
	    <th style="display: none;">Details</th>
	    <?php } ?>
	</tr>
</thead>
<tbody>
<?php
foreach($allroutes as $route) {
	if($settings['disabled_ac_sched_show'] == 0) {
		# Disable 'fake' aircraft to get hide a lot of schedules at once
		$aircraft = FltbookData::getAircraftByID($route->aircraftid);
		if($aircraft->enabled != 1) {
			continue;
		}
	}

	if(Config::Get('RESTRICT_AIRCRAFT_RANKS') == 1 && Auth::LoggedIn()) {
		if($route->aircraftlevel > Auth::$userinfo->ranklevel) {
			continue;
		}
	}
?>
<tr style="font-weight: bold;">
	<td valign="middle"><img src="<?php echo SITE_URL; ?>/lib/images/airlinelogos/<?php echo $route->code;?>.png" alt="<?php echo $route->code;?>"></td>
	<td align="center" valign="middle"><?php echo $route->code . $route->flightnum?></td>
	<td align="center" valign="middle"><?php echo $route->depicao ;?></td>
	<td align="center" valign="middle"><?php echo $route->arricao ;?></td>
	<td valign="middle"><?php echo $route->aircraft ;?></td>
    <td><?php echo $route->flighttime; ?>h / <?php echo round($route->distance, 0, PHP_ROUND_HALF_UP); ?>nm</td>
    <td align="center" valign="middle">
	 <?php if($settings['show_details_button'] == 1) { ?>
	 <input type="button" value="Details" class="btn btn-warning" onclick="$('#details_<?php echo $route->flightnum;?>').toggle()">
	 <?php } ?>
	 <?php
	 $aircraft = OperationsData::getAircraftInfo($route->aircraftid);
	 $acbidded = FltbookData::getBidByAircraft($aircraft->id);
	 $check    = SchedulesData::getBidWithRoute(Auth::$userinfo->pilotid, $route->code, $route->flightnum);

	if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0) {
		 echo '<div class="btn btn-danger btn-sm disabled">Booked</div>';
	 } elseif($check) {
		 echo '<div class="btn btn-danger btn-sm disabled">Booked</div>';
	 } else {
		 echo '<a class="btn mb-1 waves-effect waves-light " id="books" data-id="'.$route->id.'" href="javascript:void(0)" >Book <i class="material-icons right">send</i></a>';
	 }
	 ?>
    </td>
    <?php if($settings['show_details_button'] == 1) { ?>
    <td colspan="6" id="details_<?php echo $route->flightnum; ?>" style="display: none;" width="100%">
        <table class="table table-striped">
            <tr>
                <th align="center" bgcolor="black" colspan="6"><font color="white">Flight Briefing</font></th>
            </tr>
            <tr>
                <td>Departure:</td>
                <td colspan="2"><strong>
                    <?php
                    $name = OperationsData::getAirportInfo($route->depicao);
                    echo "{$name->name}";
                    ?></strong>
                </td>
                <td>Arrival:</td>
                <td colspan="2"><strong>
                    <?php
                    $name = OperationsData::getAirportInfo($route->arricao);
                    echo "{$name->name}";
                    ?></strong>
                </td>
            </tr>
            <tr>
                <td>Aircraft</td>
                <td colspan="2"><strong>
                    <?php
                    $plane = OperationsData::getAircraftByName($route->aircraft);
                    echo $plane->fullname;
                    ?></strong>
                </td>
                <td>Distance:</td>
                <td colspan="2"><strong><?php echo $route->distance.Config::Get('UNITS'); ?></strong></td>
            </tr>
            <tr>
                <td>Dep Time:</td>
                <td colspan="2"><strong><font color="red"><?php echo $route->deptime?> UTC</font></strong></td>
                <td>Arr Time:</td>
                <td colspan="2"><strong><font color="red"><?php echo $route->arrtime?> UTC</font></strong></td>
            </tr>
            <tr>
                <td>Altitude:</td>
                <td colspan="2"><strong><?php echo $route->flightlevel; ?> ft</strong></td>
                <td>Duration:</td>
                <td colspan="2">
                    <font color="red">
                    <strong>
                    <?php
                    $dist = $route->distance;
                    $speed = 440;
                    $app = $speed / 60;
                    $flttime = round($dist / $app,0) + 20;
                    $hours = intval($flttime / 60);
                    $minutes = (($flttime / 60) - $hours) * 60;

                    if($hours > "9" AND $minutes > "9") {
                        echo $hours.':'.$minutes ;
                    } else {
                        echo '0'.$hours.':0'.$minutes ;
                    }
                    ?> Hrs
                    </strong>
                </font>
                </td>
            </tr>
            <tr>
                <td>Days:</td>
                <td colspan="2"><strong><?php echo Util::GetDaysLong($route->daysofweek); ?></strong></td>
                <td>Price:</td>
                <td colspan="2"><strong>$<?php echo $route->price ;?>.00</strong></td>
            </tr>
            <tr>
                <td>Flight Type:</td>
                <td colspan="2"><strong>
                <?php
                if($route->flighttype == "P") {
                    echo 'Passenger';
                } elseif($route->flighttype == "C") {
                    echo 'Cargo';
                } elseif($route->flighttype == "H") {
                    echo 'Charter';
                } else {
                    echo 'Passenger';
                }
                ?>
                </strong></td>
                <td>Times Flown</td>
                <td colspan="2"><strong><?php echo $route->timesflown ;?></strong></td>
            </tr>
             <tr>
                <th align="center" bgcolor="black" colspan="6"><font color="white">Flight Map</font></th>
             </tr>
             <tr>
                <td width="100%" colspan="6">
                <?php
                $string = "";
                $string = $string.$route->depicao.'+-+'.$route->arricao.',+';
                ?>
                <img width="100%" src="http://www.gcmap.com/map?P=<?php echo $string ?>&amp;MS=bm&amp;MR=240&amp;MX=680x200&amp;PM=pemr:diamond7:red%2b%22%25I%22:red&amp;PC=%230000ff" />
            </tr>
        </table>
    </td>
    <?php } ?>
    </tr>

<?php
/* END OF ONE TABLE ROW */
}
}
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
<script>
                $(document).ready(function(){
                  $(document).on('click', '#books', function(e){
                      $this = $(this);
                      $this.val("processing") // or: this.value = "processing";  

                    var rowaId = $(this).data('id');
                    var pilotID = <?php echo Auth::$userinfo->pilotid ?>;
                    
                    SwalDeletea(rowaId,pilotID);
                    e.preventDefault();
                  
                function SwalDeletea(rowaId,pilotID){
                    
                    $.ajax({
                    type: "POST",
                    url: '<?php echo url('FltBook/addemailbid')?>',
                      type: 'POST',
                      data: {
                        'rowaId': rowaId,
                        'pilotid': pilotID
                      },
                    success: function () {
                        swal("Booked!", "Flight has been Booked!", "success");
                    }
                    });

                 
                }
                $this.prop('disabled', true); // no double submit ;)
                $this.html("Booked!"); 
                $this.removeClass('btn mb-1 waves-effect waves-light');
                $this.addClass('btn btn-danger btn-sm disabled');
                }
                );
                }
                );
              </script>
<script>
$(document).ready(function(){
    $('#dash').removeClass('active');
    $("#bid").addClass('active');
});
</script>
