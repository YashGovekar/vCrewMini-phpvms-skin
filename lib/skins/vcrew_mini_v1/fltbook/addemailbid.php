<?php
$pilotid = $_POST['pilotid'];
$routeid = $_POST['rowaId'];

SchedulesData::addemailBid($pilotid, $routeid);
