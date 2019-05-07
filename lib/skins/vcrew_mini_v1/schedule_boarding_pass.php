
<head>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>
<style class="cp-pen-styles">/*--------------------
Body
--------------------*/
*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  background: radial-gradient(ellipse farthest-corner at center top, #ECECEC, #999);
  font-family: 'Roboto', sans-serif;
}

/*--------------------
Boarding Pass
--------------------*/
#boarding-pass {
  position: fixed;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 350px;
  height: 382px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  text-transform: uppercase;
  /*--------------------
  Header
  --------------------*/
  /*--------------------
  Cities
  --------------------*/
  /*--------------------
  Infos
  --------------------*/
  /*--------------------
  Strap
  --------------------*/
}
#boarding-pass small {
  display: block;
  font-size: 11px;
  color: #A2A9B3;
  margin-bottom: 2px;
}
#boarding-pass strong {
  font-size: 15px;
  display: block;
}
#boarding-pass header {
  background: linear-gradient(to bottom, #0288D1, #0288D1);
  padding: 12px 20px;
  height: 53px;
}
#boarding-pass header .logo {
  float: left;
  margin-top:-10px;
  width: auto;
  height: 31px;
}
#boarding-pass header .flight {
  float: right;
  color: #fff;
  text-align: right;
}
#boarding-pass header .flight small {
  font-size: 8px;
  margin-bottom: 2px;
  opacity: 0.8;
}
#boarding-pass header .flight strong {
  font-size: 18px;
}
#boarding-pass .cities {
  position: relative;
}
#boarding-pass .cities::after {
  content: '';
  display: table;
  clear: both;
}
#boarding-pass .cities .city {
  padding: 20px 18px;
  float: left;
}
#boarding-pass .cities .city:nth-child(2) {
  float: right;
}
#boarding-pass .cities .city strong {
  font-size: 40px;
  font-weight: 300;
  line-height: 1;
}
#boarding-pass .cities .city small {
  margin-bottom: 0px;
  margin-left: 3px;
}
#boarding-pass .cities .airplane {
  position: absolute;
  width: 30px;
  height: 25px;
  top: 57%;
  left: 30%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  -webkit-animation: move 3s infinite;
          animation: move 3s infinite;
}
@-webkit-keyframes move {
  40% {
    left: 50%;
    opacity: 1;
  }
  100% {
    left: 70%;
    opacity: 0;
  }
}
@keyframes move {
  40% {
    left: 50%;
    opacity: 1;
  }
  100% {
    left: 70%;
    opacity: 0;
  }
}
#boarding-pass .infos {
  display: flex;
  border-top: 1px solid #99D298;
}
#boarding-pass .infos .places,
#boarding-pass .infos .times {
  width: 50%;
  padding: 10px 0;
}
#boarding-pass .infos .places::after,
#boarding-pass .infos .times::after {
  content: '';
  display: table;
  clear: both;
}
#boarding-pass .infos .times strong {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
  -webkit-transform-origin: left bottom;
          transform-origin: left bottom;
}
#boarding-pass .infos .places {
  background: #ECECEC;
  border-right: 1px solid #99D298;
}
#boarding-pass .infos .places small {
  color: #97A1AD;
}
#boarding-pass .infos .places strong {
  color: #239422;
}
#boarding-pass .infos .box {
  padding: 10px 20px 10px;
  width: 47%;
  float: left;
}
#boarding-pass .infos .box small {
  font-size: 10px;
}
#boarding-pass .strap {
  clear: both;
  position: relative;
  border-top: 1px solid #99D298;
}
#boarding-pass .strap::after {
  content: '';
  display: table;
  clear: both;
}
#boarding-pass .strap .box {
  padding: 23px 0 20px 20px;
}
#boarding-pass .strap .box div {
  margin-bottom: 15px;
}
#boarding-pass .strap .box div small {
  font-size: 10px;
}
#boarding-pass .strap .box div strong {
  font-size: 13px;
}
#boarding-pass .strap .box sup {
  font-size: 8px;
  position: relative;
  top: -5px;
}
#boarding-pass .strap .qrcode {
  position: absolute;
  top: 20px;
  right: 20px;
  width: 80px;
  height: 80px;
}
</style>
</head>


<div id="boarding-pass">
  <header>
    <div style="text-align:left" class="logo">
      <h5 style="color:white;"><?php echo SITE_NAME ?></h5>
    </div>
    <div class="flight">
      <small>flight</small>
      <strong><?php echo $schedule->code ?> <?php echo $schedule->flightnum ?></strong>
    </div>
  </header>
  <section class="cities">
    <div class="city">
      

      <strong><?php echo $schedule->depicao ?></strong>
    </div>
    <div class="city">
      

      <strong><?php echo $schedule->arricao ?></strong>
    </div>
    <svg class="airplane">
      <use xlink:href="#airplane"></use>
    </svg>
  </section>
  <section class="infos">
    <div class="places">
      <div class="box">
        <small>Terminal</small>
        <strong><em>W</em></strong>
      </div>
      <div class="box">
        <small>Gate</small>
        <strong><em><?php echo chr(rand(65, 90)); // echo's a random letter between A and Z
				echo rand(1, 30); ?></em></strong>
      </div>
      <div class="box">
        <small>Seat</small>
        <strong>Captain</strong>
      </div>
      <div class="box">
        <small>Class</small>
        <strong>A</strong>
      </div>
    </div>
    <div class="times">
      <div class="box">
        <small>Boarding</small>
        <?php
        $date = $schedule->deptime;
        $time = strtotime($date);
        $time = $time - (25 * 60);
        $datenew = date("H:i", $time);
        ?>
        <strong><?php echo $datenew?></strong>
      </div>
      <div class="box">
        <small>Departure</small>
        <strong><?php echo $schedule->deptime ?></strong>
      </div>
      <div class="box">
        <small>Duration</small>
        <strong><?php echo $schedule->flighttime ?></strong>
      </div>
      <div class="box">
        <small>Arrival</small>
        <strong><?php echo $schedule->arrtime?></strong>
      </div>
    </div>
  </section>
  <section class="strap">
    <div class="box">
      <div class="passenger">
        <small>captain</small>
        <strong><?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname ?></strong>
      </div>
      <div class="date">
        <small>Date</small>
        <strong><?php echo date('Y-m-d'); ?></strong>
      </div>
    </div>
    <svg class="qrcode">
      <use xlink:href="#qrcode"></use>
    </svg>
  </section>
</div>


<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
  <symbol  id="airplane" viewBox="243.5 245.183 25 21.633">
    <g>
      <path fill="#336699" d="M251.966,266.816h1.242l6.11-8.784l5.711,0.2c2.995-0.102,3.472-2.027,3.472-2.308
                              c0-0.281-0.63-2.184-3.472-2.157l-5.711,0.2l-6.11-8.785h-1.242l1.67,8.983l-6.535,0.229l-2.281-3.28h-0.561v3.566
                              c-0.437,0.257-0.738,0.724-0.757,1.266c-0.02,0.583,0.288,1.101,0.757,1.376v3.563h0.561l2.281-3.279l6.535,0.229L251.966,266.816z
                              "/>
    </g>
  </symbol>
  <symbol id="qrcode" viewBox="0 0 130 130">
   <g>
	<path fill="#0288D1" d="M123,3h-5h-5h-5h-5h-5h-5v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5V8V3H123z M123,13v5v5v5v5h-5h-5h-5
		h-5h-5v-5v-5v-5v-5V8h5h5h5h5h5V13z"/>
	<polygon fill="#0288D1" points="88,13 88,8 88,3 83,3 78,3 78,8 78,13 83,13 	"/>
	<polygon fill="#0288D1" points="63,13 68,13 73,13 73,8 73,3 68,3 68,8 63,8 58,8 58,13 53,13 53,8 53,3 48,3 48,8 43,8 43,13 
		48,13 48,18 43,18 43,23 48,23 53,23 53,18 58,18 58,23 63,23 63,18 	"/>
	<polygon fill="#0288D1" points="108,13 103,13 103,18 103,23 103,28 108,28 113,28 118,28 118,23 118,18 118,13 113,13 	"/>
	<polygon fill="#0288D1" points="78,18 73,18 73,23 78,23 83,23 83,18 	"/>
	<polygon fill="#0288D1" points="23,28 28,28 28,23 28,18 28,13 23,13 18,13 13,13 13,18 13,23 13,28 18,28 	"/>
	<polygon fill="#0288D1" points="53,28 53,33 53,38 58,38 58,33 58,28 58,23 53,23 	"/>
	<rect x="63" y="23" fill="#0288D1" width="5" height="5"/>
	<rect x="68" y="28" fill="#0288D1" width="5" height="5"/>
	<path fill="#0288D1" d="M13,38h5h5h5h5h5v-5v-5v-5v-5v-5V8V3h-5h-5h-5h-5h-5H8H3v5v5v5v5v5v5v5h5H13z M8,28v-5v-5v-5V8h5h5h5h5h5v5
		v5v5v5v5h-5h-5h-5h-5H8V28z"/>
	<polygon fill="#0288D1" points="48,33 48,28 43,28 43,33 43,38 48,38 	"/>
	<polygon fill="#0288D1" points="83,38 88,38 88,33 88,28 88,23 83,23 83,28 78,28 78,33 83,33 	"/>
	<polygon fill="#0288D1" points="23,43 18,43 13,43 8,43 3,43 3,48 8,48 13,48 18,48 23,48 28,48 28,43 	"/>
	<rect x="108" y="43" fill="#0288D1" width="5" height="5"/>
	<rect x="28" y="48" fill="#0288D1" width="5" height="5"/>
	<polygon fill="#0288D1" points="88,53 93,53 93,48 93,43 88,43 88,48 83,48 83,53 	"/>
	<polygon fill="#0288D1" points="123,48 123,43 118,43 118,48 118,53 118,58 123,58 123,63 118,63 113,63 113,68 118,68 118,73 
		118,78 123,78 123,83 128,83 128,78 128,73 123,73 123,68 128,68 128,63 128,58 128,53 123,53 	"/>
	<polygon fill="#0288D1" points="98,58 98,63 103,63 103,68 108,68 108,63 108,58 103,58 103,53 103,48 103,43 98,43 98,48 98,53 
		93,53 93,58 	"/>
	<rect x="108" y="53" fill="#0288D1" width="5" height="5"/>
	<rect x="78" y="63" fill="#0288D1" width="5" height="5"/>
	<rect x="93" y="63" fill="#0288D1" width="5" height="5"/>
	<rect x="53" y="68" fill="#0288D1" width="5" height="5"/>
	<polygon fill="#0288D1" points="108,73 108,78 108,83 113,83 113,78 113,73 113,68 108,68 	"/>
	<rect x="13" y="73" fill="#0288D1" width="5" height="5"/>
	<rect x="98" y="73" fill="#0288D1" width="5" height="5"/>
	<polygon fill="#0288D1" points="18,83 18,88 23,88 28,88 28,83 23,83 23,78 18,78 	"/>
	<polygon fill="#0288D1" points="8,83 8,78 8,73 8,68 13,68 13,63 13,58 13,53 8,53 3,53 3,58 3,63 3,68 3,73 3,78 3,83 3,88 8,88 	
		"/>
	<rect x="53" y="83" fill="#0288D1" width="5" height="5"/>
	<rect x="73" y="83" fill="#0288D1" width="5" height="5"/>
	<path fill="#0288D1" d="M108,88v-5h-5h-5h-5h-5v-5h5v-5h-5v-5h-5v5h-5h-5v-5h-5h-5v5h5v5h-5v5v5h5v-5h5v-5h5h5v5v5h-5v5h5v5h-5h-5
		v5h5v5h5v5v5h-5v5h5h5h5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5h-5v-5v-5h-5v5H108z M98,118h-5v-5h5V118z M98,103h-5h-5v-5v-5v-5
		h5h5h5v5v5v5H98z M123,118v5h-5h-5v-5h-5h-5v-5h5v-5h5v5v5h5v-5h5V118z M118,98h5v5h-5h-5v-5H118z"/>
	<path fill="#0288D1" d="M28,93h-5h-5h-5H8H3v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5H28z M33,103v5v5v5v5h-5h-5h-5h-5
		H8v-5v-5v-5v-5v-5h5h5h5h5h5V103z"/>
	<rect x="93" y="93" fill="#0288D1" width="5" height="5"/>
	<polygon fill="#0288D1" points="63,98 68,98 68,93 63,93 58,93 53,93 53,88 48,88 48,83 43,83 43,78 48,78 48,73 43,73 43,68 
		48,68 53,68 53,63 58,63 58,68 63,68 63,63 63,58 68,58 73,58 73,63 78,63 78,58 83,58 83,53 78,53 78,48 83,48 83,43 83,38 78,38 
		78,33 73,33 73,38 73,43 68,43 68,38 68,33 63,33 63,38 63,43 63,48 68,48 73,48 73,53 68,53 63,53 58,53 58,58 53,58 53,53 53,48 
		58,48 58,43 53,43 48,43 43,43 38,43 33,43 33,48 38,48 38,53 33,53 33,58 38,58 43,58 43,63 38,63 33,63 33,68 38,68 38,73 33,73 
		28,73 28,68 28,63 33,63 33,58 28,58 23,58 18,58 18,63 23,63 23,68 18,68 18,73 23,73 23,78 28,78 33,78 38,78 38,83 33,83 33,88 
		38,88 43,88 43,93 43,98 48,98 48,103 53,103 53,98 58,98 58,103 58,108 63,108 63,103 	"/>
	<polygon fill="#0288D1" points="18,103 13,103 13,108 13,113 13,118 18,118 23,118 28,118 28,113 28,108 28,103 23,103 	"/>
	<polygon fill="#0288D1" points="48,108 48,103 43,103 43,108 43,113 43,118 43,123 43,128 48,128 53,128 53,123 48,123 48,118 
		48,113 53,113 58,113 58,108 53,108 	"/>
	<polygon fill="#0288D1" points="78,118 78,113 78,108 73,108 68,108 63,108 63,113 68,113 68,118 63,118 63,123 63,128 68,128 
		68,123 73,123 73,118 	"/>
	<rect x="73" y="123" fill="#0288D1" width="5" height="5"/>
</g>
  </symbol>
</svg>

<script>
$(document).ready(function(){
   $('#dash').removeClass('active');
    $('#bids').addClass('active');
});
</script>