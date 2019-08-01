ALTER TABLE phpvms_pilots
ADD intro varchar(1);

ALTER TABLE `phpvms_aircraft` ADD `airline` varchar(255) NOT NULL AFTER `icao`;
ALTER TABLE `phpvms_aircraft` ADD `location` varchar(255) NOT NULL AFTER `airline`;
ALTER TABLE `phpvms_bids` ADD `aircraftid` int(11) NOT NULL AFTER `routeid`;
