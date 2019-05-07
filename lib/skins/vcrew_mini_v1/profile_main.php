      <div class="row">
        <div class="col s12">
          <div class="container">
            <!--card stats start-->
<div id="card-stats">
   <div class="row">
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">flight</i>
                  <p>Your Flights</p>
               </div>
               <div class="col s6 m6 right-align">
                  <h4 class="mb-0 white-text"><?php echo Auth::$userinfo->totalflights ?></h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">hourglass_empty</i>
                  <p>Your Hours</p>
               </div>
               <div class="col s6 m6 right-align">
                  <h4 class="mb-0 white-text"><?php echo round(Auth::$userinfo->totalhours); ?></h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">assignment</i>
                  <p>Your Bids</p>
               </div>
               <div class="col s6 m6 right-align">
                  <h4 class="mb-0 white-text">
                      <?php echo SchedulesData::countBids(Auth::$userinfo->pilotid); ?></h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col s12 m6 l6 xl3">
         <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
            <div class="padding-4">
               <div class="col s6 m6">
                  <i class="material-icons background-round mt-5">flight_takeoff</i>
                  <p>Fav. Aircraft </p>
               </div>
               <div class="col s6 m6 right-align">
                  <h4 class="mb-0 white-text"><?php echo SchedulesData::getfavac(Auth::$userinfo->pilotid); ?></h4>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--card stats end-->
<!--yearly & weekly revenue chart start-->
<div id="sales-chart">
   <div class="row">
      <div class="col s12 m9 l9">
         <div id="revenue-chart" class="card animate fadeUp">
            <div class="card-content">
               <?php 
               MainController::Run('ACARS', 'index'); 
               ?>
               
            </div>
         </div>
      </div>
      <div class="col s12 m3 l3">
         <div id="weekly-earning" class="card animate fadeUp">
            <div class="card-content">
               <h4 class="header m-0">Pilot of the Month :</h4>
                <?php
                $pom = SchedulesData::getpilotmonth();
                ?>
               <h4 class="header"><b><?php echo $pom ?></b></h4>
                
               <canvas id="monthlyEarning" class="" height="150"></canvas>
               
            </div>
         </div>
          <div style="max-height:400px;" class="card animate fadeup container">
              <div style="max-height:400px;overflow-y:scroll" class="card-content content">
                    <br>
                    <?php
                    $news = SchedulesData::getnews();
                   if(!$news){
                       echo '<h5>NO News Found!</h5>';
                   }
                    foreach($news as $new){
                        ?>
                  <h5><?php echo $new->subject ?></h5>
                  <hr>
                  <p><?php echo $new->body ?></p>
                  <br>
                  <p style="text-align:right"> - <?php echo $new->postedby ?> (<?php echo date(DATE_FORMAT, $row->postdate) ?>)</p>
                  <?php
                    }
                   ?>
              </div>
          </div>
      </div>
       
   </div>
</div>

<?php
if(Auth::$userinfo->intro == '1'){
    
}
else {
?>
              <!-- Intro -->
<div id="intro">
    <div class="row">
        <div class="col s12">

            <div id="img-modal" class="modal white">
                <div class="modal-content">
                    <div class="bg-img-div"></div>
                    <p class="modal-header right modal-close" id="intro-a">
                        Skip Intro <span class="right"><i class="material-icons right-align">clear</i></span>
                    </p>
                    <div class="carousel carousel-slider center intro-carousel">
                        <div class="carousel-fixed-item center middle-indicator">
                            <div class="left">
                                <button class="movePrevCarousel middle-indicator-text btn btn-flat purple-text waves-effect waves-light btn-prev">
                                    <i class="material-icons">navigate_before</i> <span class="hide-on-small-only">Prev</span>
                                </button>
                            </div>

                            <div class="right">
                                <button class=" moveNextCarousel middle-indicator-text btn btn-flat purple-text waves-effect waves-light btn-next">
                                    <span class="hide-on-small-only">Next</span> <i class="material-icons">navigate_next</i>
                                </button>
                            </div>
                        </div>
                        <div class="carousel-item slide-1">
                            <img src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/intro-slide-1.png" alt="" class="responsive-img animated fadeInUp slide-1-img">
                            <h5 class="intro-step-title mt-7 center animated fadeInUp">Welcome to <?php echo SITE_NAME ?></h5>
                            <p class="intro-step-text mt-5 animated fadeInUp">
                                <?php echo SITE_NAME ?> is now powered by vCrew Sys. You will experience a next level simming through the features offered by vCrew Sys.
                                Let's Get Started!
                            
                            </p>
                        </div>
                        <div class="carousel-item slide-2">
                            <img src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/intro-features.png" alt="" class="responsive-img slide-2-img">
                            <h5 class="intro-step-title mt-7 center">Responsive Crew Center</h5>
                            <p class="intro-step-text mt-5">
                                This Crew Center is powered to be fit on all screen sizes. <br>
                                We have a total of <?php echo StatsData::TotalSchedules() ?> schedules!<br>
                                A total of <?php echo StatsData::PilotCount() ?> Pilots!
                            </p>
                        </div>
                        <div class="carousel-item slide-3">
                            <img src="<?php echo SITE_URL ?>/lib/skins/vcrew_mini_v1/app-assets/images/gallery/intro-app.png" alt="" class="responsive-img slide-1-img">
                            <h5 class="intro-step-title mt-7 center">vCrew Features</h5>
                            <div class="row">
                                <div class="col m5 offset-m1 s12">
                                    <ul class="feature-list left-align">
                                        <li><i class="material-icons">check</i> Advanced Dashboard</li>
                                        <li><i class="material-icons">check</i> Detailed PIREPS</li>
                                    </ul>
                                </div>
                                <div class="col m6 s12">
                                    <ul class="feature-list left-align">
                                        <li><i class="material-icons">check</i> Easy to Bid/Book Flights</li>
                                        <li><i class="material-icons">check</i> Detailed Schedules</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col s12 center">
                                        <button id="intro-b" class="get-started btn waves-effect waves-light gradient-45deg-purple-deep-orange mt-3 modal-close">Get
                                            Started</button>
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
<!-- / Intro -->
<?php
}
?>

          </div>
        </div>
      </div>
    <?php
    if(isset($_POST['intro'])){
        $pilotid = $_POST['pilotid'];
        $intro = '1';
        SchedulesData::performintro($pilotid, $intro);
    }
    ?>
    <script>
        $(document).on('click','#intro-a',function (e) {
			$.ajax({
				url: '<?php echo SITE_URL ?>/index.php/profile',
				type: 'post',
				data: {
					'intro': 1,
                    'pilotid' : <?php echo Auth::$userinfo->pilotid ?>
                },
				success: function(response){
					
				}
			});
        });
            
        $(document).on('click','#intro-b',function (e) {
        $.ajax({
            url: '<?php echo SITE_URL ?>/index.php/profile',
            type: 'post',
            data: {
                'intro': 1,
                'pilotid' : <?php echo Auth::$userinfo->pilotid ?>
            },
            success: function(response){

            }
        });
        });
            
    $(document).ready(function() {

    if ($('.content').height() > $('.container').height()) {
        setInterval(function () {

            start();
       }, 3000); 
   
    }
});


            
    </script>
<div style="display:none" class="row">
                  <div class="col s12">
                     <div class="yearly-revenue-chart">
                        <canvas id="thisYearRevenue" class="firstShadow" height="350"></canvas>
                        <canvas id="lastYearRevenue" height="350"></canvas>
                     </div>
                  </div>
               </div>