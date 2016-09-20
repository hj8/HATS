<!DOCTYPE html>
<html lang="en">
<title>OCCC Visitation Scheduling</title>
<?php date_default_timezone_set( 'HST'); ?>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Lato", sans-serif
    }
    .w3-navbar,
    h1,
    button {
        font-family: "Montserrat", sans-serif
    }
    .fa-anchor,
    .fa-coffee {
        font-size: 200px
    }
</style>

<body class="w3-content" style="max-width:9000px">

    <!-- Navbar -->
    <ul class="w3-navbar w3-black w3-card-2 w3-top w3-left-align w3-large">
        <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
            <a class="w3-padding-large w3-hover-white w3-large w3-black" href="javascript:void(0);" onclick="navDem()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        </li>
        <li class=""><a href="/" class="w3-padding-large w3-white">Today</a>
        </li>
        <li class="w3-hide-small"><a href="search" class="w3-padding-large w3-hover-white">Search</a>
        </li>
        <li class="w3-hide-small"><a href="support" class="w3-padding-large w3-hover-white">Support</a>
        </li>
    </ul>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
        <ul class="w3-navbar w3-left-align w3-large w3-black">
            <li><a class="w3-padding-large" href="/">Search</a>
            </li>
            <li><a class="w3-padding-large" href="/">Support</a>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="w3-container w3-white w3-center w3-padding-64">
        <?php echo '<h3 class="w3-margin w3-left w3-largeX">Visitation Schedule for ' . date( "Y/m/d") . ' as of ' . date( "h:i:s a") . '</h3>';?>
        <a onclick="collapseAll()" class="w3-right w3-btn-floating-large w3-black"><i class="fa fa-minus"></i></a>
        <a onclick="expandAll()" class="w3-right w3-btn-floating-large w3-black"><i class="fa fa-plus"></i></a>

        <table class="w3-card-16  w3-white w3-table w3-border w3-responsive w3-hoverable w3-padding-64 ">
            <thead>
                <tr class="w3-light-grey w3-hover-white">
                    <th class="w3-border-left">Attended</th>
                    <th class="w3-border-left">Visit Time</th>
                    <th class="w3-border-left">Inmate Name</th>
                    <th class="w3-border-left">Visitor</th>
                    <th class="w3-border-left">Relationship</th>
                    <th class="w3-border-left">Visit Type</th>
                </tr>
            </thead>


            <?php 
	    $info="host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man"; 
	    $db=pg_connect($info); 
	    if(!$db){ echo "<!--Error : Unable to open database\n-->"; } 
	    else { echo "<!--Opened database successfully\n\n-->"; } 

        // another column for verify table to work 
	    $sql="SELECT DISTINCT * FROM visitorid, approve, verify WHERE 
                 visitorid.visitid = approve.visitid and approve.visitid = verify.visitid and verify.visitid IS NOT NULL  and approve.approvedeny = TRUE ORDER BY visitorid.visittime"; // visitdate = (select timestamp 'today')  and
	    $ret=pg_query($db, $sql); 
	    if(!$ret){ 
		echo pg_last_error($db); 
		exit; 
	    } 
	    $id = 0;
	    while($visit=pg_fetch_array($ret)){ 
	    $num = 1;


        //approve visiitid
        $test = $visit[12];

        echo "<tr onclick='myFunction(\"Demo".$id."\")' class='w3-topbar w3-border-blue-grey'>";

            // if statement if vtarrive is null print out one button, and when click link to another page

        //if both field is emty, bring this button
        if($visit['vtexit'] == "" and $visit['vtarrive'] ==""){
            echo "<td> <form action=\"start.php\" method =\"post\">
                        <input type = \"submit\" name =\"timeon".$visit['visitid']."\" class='w3-btn-block w3-border-top w3-light-green button' 
                        id =\"submit\" value =\"Timeon\"/>

                        </form>

                 </td>";
        }

        //if vtarrives emty only bring this button. 
        elseif($visit['vtarrive'] !== "" && $visit['vtexit'] ==""){
            echo "<td> <form action=\"end.php\" method =\"post\">
                        <input type = \"submit\" name =\"timeout".$visit['visitid']."\" class='w3-btn-block w3-border-top w3-light-grey button' 
                        id =\"submit\" value =\"Timeout\"/>

                        </form>

                 </td>";
        }

        else{
            echo " <td><button class=\"w3-btn-block w3-light-green\">Visited</button></td> ";
        }

         


            echo "<td class=''>" . $visit[visittime] . "</td>"; /////////////////////////////////////////////////////////////////////////////
            echo "<td class=''>" . $visit[ifname] . " " .$visit[ilname] . "</td>"; //////////////////////////////////////////////////////////
	    $sql="SELECT * FROM visitors WHERE visitid= ${test}"; ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    $ret2=pg_query($db, $sql); ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    if(!$ret2){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		echo pg_last_error($db); ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    } ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    while($visitor=pg_fetch_array($ret2)){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if ($num == 1) { $num = $num; }/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    elseif ($num > 0) { /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$id = $id + 1;/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		echo "<tr onclick='myFunction(\"Demo".$id."\")' class='w3-border-top'>"; //////////////////////////////////////////////////////////////////////////////////////////////////////////////
                echo "<td class='w3-right-align' colspan=\"3\">   <b>Visitor #".$num."</b></td>";//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    }/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    $num = $num + 1;/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	    echo "<td class=''>".$visitor['vfname']." ".$visitor['vmname']." ".$visitor['vlname']."</td>";///////////////////////////////////////////////////////
            echo "<td class=''>".$visitor['vrelation']."</td>";//////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<td class=''>Special Visit<a id='Demo".$id."-1' class='w3-padding-tiny w3-text-grey w3-right'>&#x2796;</a>";
            echo "</td>";/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "</tr>";/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            echo "<tr onclick='myFunction(\"Demo".$id."\")' id='Demo".$id."' class=''>";
            echo "<td colspan='3' class='w3-padding-xlarge'><a>Agreement Check: </a><a class='w3-text-green'><b>&#x2714;</b></a>";
            echo "<a><br> Search Consent: </a><a class='w3-text-green'><b>&#x2714;</b></a>";
            echo "<a><br> Application Date: ".$visit['applicationdate']."</a>";
            echo "<br> Approved By: <b>".$visit['authorizer']."<b></a>";
            echo "</td>";
            echo "<td colspan='3' class='w3-padding-xlarge'><a>";
    	    echo "Visitor Address: ".$visitor['vaddress']."<br>";
            echo "Visitor City: ".$visitor['vcity']."<br>";
            echo "Visitor ZIP: ".$visitor['vzip']."<br>";
            echo "Visitor SSN: ".$visitor['vssn']."<br></a>";
            echo "</td>";
            echo "</tr>";
	    }
	    $id = $id + 1;

	    }
	    echo '<!--Operation done successfully\n-->'; 
	    pg_close($db); 
	    ?>
        </table>
    </div>
    <!--
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: I am philipino</h1>
</div>


<footer class="w3-container w3-padding-64 w3-center w3-opacity">
  <div class="w3-xlarge w3-padding-32">
   <a href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official"></i></a>
   <a href="#" class="w3-hover-text-red"><i class="fa fa-pinterest-p"></i></a>
   <a href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter"></i></a>
   <a href="#" class="w3-hover-text-grey"><i class="fa fa-flickr"></i></a>
   <a href="#" class="w3-hover-text-indigo"><i class="fa fa-linkedin"></i></a>
 </div>
 <p>Template from <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer> -->

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function navDem() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-hide") == -1) {
                x.className += " w3-hide";
            } else {
                x.className = x.className.replace(" w3-hide", "");
            }
            var x = document.getElementById(id + "-1");
            if (x.innerHTML.indexOf("\u2795") == -1) {
                x.innerHTML = "&#x2795";
            } else {
                x.innerHTML = "&#x2796";
            }
        }
    </script>
    <script>
        function collapseAll() {
            for (i = 0; i < 5000; i++) {
                var x = document.getElementById("Demo" + i);
                if (x.className.indexOf("w3-hide") == -1) {
                    x.className += " w3-hide";
                }
                var x = document.getElementById("Demo" + i + "-1");
                x.innerHTML = "&#x2795";
            }

        }
    </script>
    <script>
        function expandAll() {
            for (i = 0; i < 5000; i++) {
                var x = document.getElementById("Demo" + i);
                x.className = x.className.replace(" w3-hide", "");
                var x = document.getElementById("Demo" + i + "-1");
                x.innerHTML = "&#x2796";
            }

        }
    </script>

</body>

</html>