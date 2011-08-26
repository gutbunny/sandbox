<?php
/* 
 *  @license http://www.gnu.org/licenses/gpl-2.0.html
 */
include('config.php');

?>
<html>
    <head>
        <?php include('header_head.php'); ?>
<script language="javascript">

    /* validate form data and then submit */

    function checkForm(formObj) {

        var zip = document.getElementById('zipcode');

        if (zip.value != parseInt(zip.value)) { 
            alert(zip.value + ' is not a whole number');
            return false;
        }
        
        if (zip.value.length != 5) {
            alert('Zipcode must be 5 digits long');
            return false;
        }

        document.getElementById('dating_form').submit();
        
    }
</script>
    </head>
    <body>
        <div id="content-wrapper">
            <div id="header-content-wrapper">
                <?php include('header_visual.php'); ?>
            </div>
            <div id="body-content-wrapper" >
                <form action="form_process.php" id="dating_form" method="post">
                    <div class="form-item">
                        <label for="self_gender">I am a: </label>
                        <select id="self_gender" name="self_gender">
                            <option value="male">Man</option>
                            <option value="female">Woman</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label for="seek_gender">Looking for a: </label>
                        <select id="seek_gender" name="seek_gender">
                            <option value="male">Man</option>
                            <option value="female">Woman</option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label for="radius"> Within </label>
                        <select id="radius" name="radius">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            
                        </select>
                        <label for="radius"> miles </label>
                    </div>
                    <div class="form-item">
                        <label for="zipcode">Of </label>
                        <input type="text" name="zipcode" id="zipcode" maxlength="5" size="5">
                    </div>
                    <input type="submit" value="Search" onClick="javascript:checkForm('dating_form');return false;"/>
                </form>
            </div>
            <div id="footer-content-wrapper">
                <?php include('footer.php'); ?>
            </div>
        </div>
    </body>
</html>