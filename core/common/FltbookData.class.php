<?php
class FltbookData extends CodonData {

	public static function findschedules($arricao, $depicao, $airline, $aircraft)   
	{
        $query = "SELECT phpvms_schedules.*, phpvms_aircraft.name AS aircraft, phpvms_aircraft.icao AS aircrafticao, phpvms_aircraft.registration
               FROM phpvms_schedules, phpvms_aircraft
                WHERE phpvms_schedules.depicao LIKE '$depicao'
                AND phpvms_schedules.arricao LIKE '$arricao'
                AND phpvms_schedules.code LIKE '$airline'
                AND phpvms_schedules.aircraft LIKE '$aircraft'
                AND phpvms_aircraft.id LIKE '$aircraft'
		AND phpvms_schedules.enabled = '1'
		ORDER BY phpvms_schedules.code ASC, phpvms_schedules.flightnum ASC";
		
        	return DB::get_results($query);
    	}
      
	public static function findschedule($arricao, $depicao, $airline)   
	{
		$query = "SELECT phpvms_schedules.*,
			phpvms_aircraft.name AS aircraft,
			phpvms_aircraft.registration,
			phpvms_aircraft.icao AS aircrafticao,
			phpvms_aircraft.ranklevel AS aircraftlevel
			FROM phpvms_schedules, phpvms_aircraft
			WHERE phpvms_schedules.depicao LIKE '$depicao'
			AND phpvms_schedules.arricao LIKE '$arricao'
			AND phpvms_schedules.code LIKE '$airline'
			AND phpvms_aircraft.id LIKE phpvms_schedules.aircraft";

		return DB::get_results($query);
        }
		
    	public static function getAllAircraftFltbook($airline, $aicao) 
    	{
					
		$sql = "SELECT * FROM phpvms_aircraft 
			WHERE `enabled` = 1 
		        AND `icao` = '$aicao' 
		        AND `airline` ='$airline' 
		        ORDER BY icao, registration ASC";
	
	        $all_aircraft = DB::get_results($sql);
	        if(!$all_aircraft) {
	            $all_aircraft = array();
		}

        	return $all_aircraft;
    	}
	
	public static function findaircraft($aircraft) 
	{
	        $query = "SELECT id
	                  FROM phpvms_aircraft
	                  WHERE icao='$aircraft'";
	
	        return DB::get_results($query);
    	}
		
	public static function findCountries() 
	{
		$query = "SELECT DISTINCT country
		          FROM phpvms_airports";
		
		return DB::get_results($query);
    	}
	
	public static function routeaircraft($icao)
	{
		$sql = "SELECT DISTINCT aircraft FROM phpvms_schedules WHERE depicao = '$icao'";
		
		return DB::get_results($sql);
	}
	
	public static function getAircraftByIcao($icao)
	{
		$sql = "SELECT * FROM phpvms_aircraft WHERE icao ='$icao'";
		return DB::get_row($sql);
	}
	
	public static function arrivalairport($icao)
	{
		$sql = "SELECT DISTINCT arricao FROM phpvms_schedules WHERE depicao = '$icao'";
		
		return DB::get_results($sql);
	}
	
	public static function getAircraftByID($id)
	{
		$sql = "SELECT * FROM phpvms_aircraft WHERE id ='$id'";
		return DB::get_row($sql);
	}
	
	public static function jumpseatpurchase($pilot_id, $total)
    	{
	        $query = 'UPDATE '.TABLE_PREFIX.'pilots
			  SET totalpay='.$total.'
			  WHERE pilotid='.$pilot_id;

	        DB::query($query);
    	}
		
	public static function getAllAirports_icao() 
	{
                
	         $sql = 'SELECT * FROM ' . TABLE_PREFIX . 'airports
	                 ORDER BY `icao` ASC';
	                  
	        return DB::get_results($sql);
	}
	
	public static function getLocation($pilot)
    	{
	        $query = "SELECT * FROM fltbook_location WHERE pilot_id='$pilot'";
	
	        $real_location = DB::get_row($query);
	
	        $pirep_location = PIREPData::getLastReports(Auth::$userinfo->pilotid, 1, '');
	
	        if($real_location->last_update > $pirep_location->submitdate)
	        {
	            return $real_location;
	        }
	        else
	        {
	            return $pirep_location;
	        }
    	}
	
	public static function getPilotID($pilot) 
	{
		$query = "SELECT * FROM fltbook_location WHERE pilot_id='$pilot'";
		DB::get_row($query);
	}
	
	public static function updatePilotLocation($icao)
    	{
	        $pilot = Auth::$userinfo->pilotid;//wont work for listener
	
	        $query = "SELECT * FROM fltbook_location WHERE pilot_id='$pilot'";
	
	        $check = DB::get_row($query);
	
	        if(!$check)
	        {
	            $query1 = "INSERT INTO fltbook_location (pilot_id, arricao, jumpseats, last_update)
	                    VALUES ('$pilot', '$icao', '1', NOW())";
	        }
	        else
	        {
	            $jumpseats = $check->jumpseats + 1;
	            $query1 = "UPDATE fltbook_location SET arricao='$icao', jumpseats='$jumpseats', last_update=NOW() WHERE pilot_id='$pilot'";
	        }
	
	        DB::query($query1);
    	}
}
