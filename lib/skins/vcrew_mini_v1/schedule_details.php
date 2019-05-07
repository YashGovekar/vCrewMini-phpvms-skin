<div class="row">
    <div class="col s12 m6 l6">
        <div id="swipeable-tabs" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="header">FLIGHT DETAILS : <?php echo $schedule->code.' '.$schedule->flightnum ?></h4>
          <div class="row">
            <div class="col s12">
              <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col m4"><a href="#test-swipe-1">Airport Info</a></li>
                <li class="tab col m4"><a class="active" href="#test-swipe-2">Flight Details</a></li>
                <li class="tab col m4"><a href="#test-swipe-3">Weather</a></li>
              </ul>
              <div id="test-swipe-1" class="col s12 carousel carousel-item black-text">
                  <br><br>
                  <b style="font-weight:bold;">Departure Airport :</b><br>
									<?php
									$icao = $schedule->depicao;
									$getaps = OperationsData::getAirportInfo($icao);
									?>
									<b style="font-weight:bold">ICAO | Name : </b> <?php echo $getaps->icao;?> | <?php echo $getaps->name;?>  <br>
									<b style="font-weight:bold">Lat | Long : </b><?php echo $getaps->lat.' | '.$getaps->lng;?><br>
									<b style="font-weight:bold">Fuel Price : </b>
									<?php 
									$prce = $getaps->fuelprice;
									if($prce == "0"){ 
										echo "N/A"; } else { echo $prce; } 
										?>
									<br>
									<b style="font-weight:bold">Maintainance Available? : </b> 
									<?php 
									$hubs = $getaps->hub; if($hubs == 1){ 
										echo '<b style="color:green;font-weight:bold">Yes </b> '; 
									} 
									else { 
										echo '<b style="color:red;font-weight:bold">No </b>'; 
									}  
									?>  
									<br><br>
									<b style="font-weight:bold;">Arrival Airport :</b><br>
									<?php
									$arricao = $schedule->arricao;
									$getarraps = OperationsData::getAirportInfo($arricao);
									?>
									<b style="font-weight:bold">ICAO | Name : </b> <?php echo $getarraps->icao;?> | <?php echo $getarraps->name;?>  <br>
									<b style="font-weight:bold">Lat | Long : </b><?php echo $getarraps->lat.' | '.$getarraps->lng;?><br>
									<b style="font-weight:bold">Fuel Price : </b>
									<?php 
									$prce = $getarraps->fuelprice;
									if($prce == "0"){ 
										echo "N/A"; 
									} 
									else { 
										echo $prce; 
									} 
									?>
									<br>
									<b style="font-weight:bold">Maintainance Available? : </b> 
									<?php 
									$hubss = $getarraps->hub; if($hubss == 1){ 
										echo '<b style="color:green;font-weight:bold">Yes </b> '; 
									} 
									else { 
										echo '<span style="color:red;font-weight:bold">No </span>'; 
									}  
									?> 
              </div>
                  
              <div id="test-swipe-2" class="col s12 carousel carousel-item black-text">
              <div class="container">
                    <br><br>
                     <div class="col s12 m6 l6">
											<h5> 
												<b style="font-weight:bold;">Departure :</b> <?php echo $schedule->depicao;?><br><br>
												<b style="font-weight:bold;">Arrival :</b> <?php echo $schedule->arricao;?><br><br>
												<b style="font-weight:bold;">Cost Index :</b> 15<br><br>
												<b style="font-weight:bold;">PAX :</b> 
												<?php 
												if($schedule->flighttype == "P") {  }
												else if($schedule->flighttype == "C") {  } 
												$allaircraft = OperationsData::GetAllAircraft(true);
												foreach($allaircraft as $aircraft)
												if($aircraft->registration == $schedule->registration)  {
													echo round($aircraft->maxpax * 0.80, 0);
												}
												?>
												<br><br>
											</h5>
										</div>
                  <div class="col s12 m6 l6">
											<h5>
												<b style="font-weight:bold;">Max Cargo :</b> 
													<?php 
													if($schedule->flighttype == "P") {    }
													else if($schedule->flighttype == "C") {  } 
													$allaircraft = OperationsData::GetAllAircraft(true);
													foreach($allaircraft as $aircraft)
													if($aircraft->registration == $schedule->registration)	{
														echo round($aircraft->maxcargo * 0.80, 0) ;}
													?> 
													kgs<br><br>
												<b style="font-weight:bold;">Aircraft :</b> <?php echo $schedule->aircraft;?> <br><br>
												<b style="font-weight:bold;">Flight Time :</b> <?php echo $schedule->flighttime;?> hrs<br><br>
												<b style="font-weight:bold;">Distance :</b> <?php echo $schedule->distance;?> nm<br><br></h5>
										</div>   
                    </div>
                  </div>
                
              <div id="test-swipe-3" class="col s12 carousel carousel-item black-text">
                  
                  
                  
                  <ul class="tabs tab-demo z-depth-1">
                  <li class="tab col m6"><a class="active" href="#test1">Departure Metar</a>
                  </li>
                  <li class="tab col m6"><a href="#test2" class="">Arrival Metar</a>
                  </li>
                  </ul>
                  
                  
                  
                  <div class="col s12">
                      <br><br>
                <div id="test1" class="col s12 active" style="display: block;">
                  <b style="padding-left:5px;font-weight:bold;">Departure Metar</b> : <br><br>
											<textarea class="materialize-textarea" readonly><?php
												$urlfocus = 'http://metar.vatsim.net/'.$schedule->depicao.'';
												$focuswx = file_get_contents($urlfocus);
												echo "$focuswx";
												?>
                    </textarea>
                </div>
                <div id="test2" class="col s12" style="display: none;">
                <br><br>
                  <b style="padding-left:5px;font-weight:bold;">Arrival Metar</b> : <br><br>
											<textarea class="materialize-textarea" readonly><?php
												$urlfocus = 'http://metar.vatsim.net/'.$schedule->arricao.'';
												$focuswxs = file_get_contents($urlfocus);
												echo "$focuswxs";
												?>
                    </textarea>
                </div>
              </div>
                  
              </div>
            </div>
      </div>
    </div>
  </div>
          <div class="card ">
                <div class="card-content black-text">
                    <span class="card-title">Flight Options</span>
                    <br>
                      <div class="col s12 m6 l6">
                           
                            <a target="_blank" href="http://www.vatsim.net/fp/index.php?fpc=&1=V&2=<?php echo $schedule->code.''.$schedule->flightnum;?>&3=<?php echo $schedule->aircraft;?>&4=250&5=<?php echo $schedule->depicao;?>&6=1552&7=<?php echo $schedule->flightlevel;
?>&8=<?php echo $schedule->route;?>&9=<?php echo $schedule->arricao;?>&10a=00&10b=00&&11=RTF=Vistara VA%20/www.airasiavirtualairline.com&12a=00&12b=00&13=&14=<?php echo Auth::$userinfo->firstname;?>%20<?php echo Auth::$userinfo->lastname;?>%20<?php echo Auth::$userinfo->hub?>" class="btn btn-info">VATSIM PREFILE</a>
						 			
                      </div>
                    <div class="col s12 m6 l6">
                        <a class="btn mb-1 waves-effect waves-light red" id="books" data-id="<?php echo $schedule->id ?>" href="javascript:void(0)" >Book <i class="material-icons right">send</i></a>
                    </div>
                    <br><br>
                </div>
          </div>
        </div>
    <div class="col s12 m6 l6">
          <div class="card ">
                <div class="card-content black-text">
                    
                      <span class="card-title">Route Details</span>
                      <br>
                    <textarea class="materialize-textarea" readonly ><?php echo $schedule->route ?></textarea>
                      <br><br>
                </div>
                <div id="gmap_basic" class="gmaps"></div>        
                <div id="routemap" style="width: 100%;height:600px"></div>
          </div>
    </div>
    <div class="col s12 m12 l12">
        <?php
        $depicao = $schedule->depicao;
        $getdepaps = OperationsData::getAirportInfo($depicao);
        $dlat = $getdepaps->lat;
        $dlng = $getdepaps->lng;
        $dname = $getdepaps->name;
        $arricao = $schedule->arricao;
        $getarraps = OperationsData::getAirportInfo($arricao);
        $alat = $getarraps->lat;
        $alng = $getarraps->lng;
        $aname = $getarraps->name;
        ?>
    <iframe width="100%" height="450" src="https://embed.windy.com/embed2.html?lat=<?php echo $dlat?>&lon=<?php echo $dlng?>&zoom=5&level=surface&overlay=wind&menu=&message=&marker=&forecast=12&calendar=now&location=coordinates&type=map&actualGrid=&metricWind=kt&metricTemp=%C2%B0C" frameborder="0"></iframe>
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
    
    $(document).ready(function(){
   $('#dash').removeClass('active');
    $('#bids').addClass('active');
});
    
              </script>
