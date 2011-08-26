<?php
include('config.php');


/*
 * first we need to know what my lat and long is
 * ...so lets ask the db
 */

 $sql = "select * from zipcodes
        where zipcodes_zipcode = " . $_REQUEST['zipcode'];
 $result = mysql_query($sql);
 $user = mysql_fetch_object($result);

 /*
  * now let's use the haversine formula to get the users near by...
  */
 $sql = "SELECT u.*, z.*, (((acos(sin((".$user->zipcodes_latitude."*pi()/180)) * sin((`zipcodes_latitude`*pi()/180))+cos((".$user->zipcodes_latitude."*pi()/180)) * cos((`zipcodes_latitude`*pi()/180)) * cos(((".$user->zipcodes_longitude."- `zipcodes_longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance
          FROM zipcodes z, users u
          WHERE u.users_zipcodes_id = z.zipcodes_id
          AND u.users_gender like '" . $_REQUEST['seek_gender'] . "'
          HAVING distance <= " . $_REQUEST['radius'];
 $result = mysql_query($sql) or die(mysql_error());
 while($rs = mysql_fetch_object($result)) {

     $candidates[] = $rs;
 }

//echo "My User Info: <br/>";
//print_r($user);

?>



<html>
    <head>
        <?php include('header_head.php'); ?>
    </head>
        <body>
            <div id="content-wrapper">
                <div id="header-content-wrapper">
                    <?php include('header_visual.php'); ?>
                </div>
                <div id="body-content-wrapper" >
                    <!-- display the search results here -->
                    <?php foreach($candidates as $candidate) { ?>
                    <div class="candidate-data-row">
                        <?php
                        echo $candidate->users_firstname . " " . $candidate->users_lastname;
                        echo " - " . $candidate->zipcodes_city . ", " . $candidate->zipcodes_state . " " . $candidate->zipcodes_zipcode;
                        echo " Distance: " . number_format($candidate->distance, 2) . " miles";
                        ?>
                    </div>
                   <?php } ?>
                </div>
            <div id="footer-content-wrapper">
                <?php include('footer.php'); ?>
            </div>
        </div>
    </body>
</html>