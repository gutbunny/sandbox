CREATE TABLE `zipcodes` (
`zipcodes_id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`zipcodes_zipcode` INT( 5 ) NOT NULL ,
`zipcodes_city` VARCHAR( 100 ) NOT NULL ,
`zipcodes_state` VARCHAR( 100 ) NOT NULL ,
`zipcodes_latitude` DECIMAL( 9, 6 ) NOT NULL ,
`zipcodes_longitude` DECIMAL( 9, 6 ) NOT NULL ,
`zipcodes_timezone` INT( 3 ) NOT NULL ,
`zipcodes_dst` INT( 2 ) NOT NULL ,
PRIMARY KEY ( `zipcodes_id` )
) TYPE = MYISAM ;