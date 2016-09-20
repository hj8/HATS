<?php
    require('connection.php');
    $sql =<<<EOF

    SELECT DISTINCT visitorid.visitid, visitorid.ifname, visitorid.imname, visitorid.ilname, visitorid.visitdate, visitorid.visittime, visitorid.applicationdate

    from visitorid as visitorid 
    
    INNER JOIN approve as approve
      On visitorid.visitid = approve.visitid
    
    INNER JOIN  visitors as visitors
      ON approve.visitid = visitors.visitid
    
    WHERE approve.approvedeny IS NULL

    ORDER BY visitorid.applicationdate;

EOF;
  $ret = pg_query($db, $sql);
  if(!$ret){
    echo pg_last_error($db);
    exit;
  }
    $i=0;
    $j=0;
    $test = array();
    while($row = pg_fetch_array($ret)){
    $visitTypeQuery = "select * from visittype, visitdefinition where visittype.visitid = '".$row[visitid]."' and visittype.visittype = visitdefinition.visittype";
    $vals = pg_query($db, $visitTypeQuery);
    $visitInformation = "";
    $loopVisitInformation = 0;
    while($output = pg_fetch_array($vals)) {
       if ($loopVisitInformation == 0) {
	$loopVisitInformation = 1;
        $visitInformation = $visitInformation . $output[visitdefinition];
       }
       else {
	$visitInformation = $visitInformation . ", " . $output[visitdefinition];
       }
    }
     ++$j;
    // this loop to create tables with all inmate name  
    $template="
		<table class=\"w3-card-16 w3-white w3-table w3-hoverable w3-padding-64  w3-border w3-responsive\" >
			<col>
			<colgroup span=\"2\"></colgroup>
				<tr class=\"w3-light-grey w3-topbar w3-border-blue-grey\" onclick = \"newFunction('Expand{1}')\" >
            
					<td  class=\"\">          
						<div class = \"w3-show-inline-block\" > 
                 
                  <Form  action = \"approve.php\" method =\"POST\" >
                    <INPUT TYPE =\"submit\" class=\"w3-btn w3-padding-left w3-padding-right w3-ripple w3-light-green\"  
                        Name =\"Approve{visitid}\"  alt=\"Publish\" value = \"Approve\">
                    &nbsp;&nbsp;
                  </Form>
                  
            </div>
            <div class = \"w3-show-inline-block\" >
                  <button onclick=\"document.getElementById('id01').style.display='block'\" 
                  class=\"w3-btn  w3-padding-left w3-padding-right w3-ripple w3-text-black w3-red\">
                  &nbsp;&nbsp;&nbsp;Deny&nbsp;&nbsp;&nbsp;</button>
                  <div id=\"id01\" class=\"w3-modal\">
                    <div class=\"w3-modal-content\">
   			 <header class=\"w3-container w3-khaki\">
      			<span onclick=\"document.getElementById('id01').style.display='none'\" class=\"w3-closebtn\">&times;</span>
      			<h2>Disapproval Form</h2>
    			</header>
                      <div class=\"w3-container\">
                          <p class=\"w3-text-black\"><b>Reason for Disapproval</b></p>
                            <Form class=\"w3-padding-bottom\" Name=\"formDisapprove{visitid}\" method=\"POST\" action=\"deny.php\">
                              <INPUT TYPE=\"text\" style=\"width:400px\"  class=\"w3-animate-input w3-input\"alt=\" value=\"\" maxlength=\"300\" Name=\"DenyReason\" placeholder=\"Input reason for disapproval here.  (300 chars)\" required>
				<label class=\"w3-label w3-validate\">Reason</label>
                                <p></p>
                                 <input type=\"Submit\" 
                                  class=\"w3-btn w3-green w3-ripple w3-khaki w3-hover-green\" 
                                  type=\"button\" 
                                  name=\"Deny{visitid}\" 
                                  alt=\"Publish\" 
                                  value=\"Submit\">
                             </form>
                      </div>
                    </div>
                  </div>

                <a  class = \"w3-large w3-padding-left w3-padding-right\"><b>Inmate Name:</b>  {ifname} {imname} {ilname} &nbsp;   </a>
		<a class =\"w3-large w3-padding-left w3-padding-right\">Date:&nbsp;{visitdate}</a>
		<a class =\"w3-large w3-padding-right\">Time:&nbsp;{visittime}</a>
		<a class =\"w3-large w3-padding-right\">Application Date:&nbsp;{applicationdate}</a>

						</div>              
                 
          </th>
				
	  <tr class=\"w3-card-16 w3-hoverable w3-light-grey w3-padding-64\" >

              	<td  colspan =\"7\" class=\"w3-padding-left w3-left\">
		  <a class=\"w3-padding-left w3-padding-right\"></a>
                  <a class=\"w3-padding-left w3-padding-right\">Agreement Check: <b class=\"w3-text-green\">&#x2714;</b>
                  <a class=\"w3-padding-left w3-padding-right\">Search Consent: <b class=\"w3-text-green\">&#x2714;</b>
                  <a class=\"w3-padding-left w3-padding-right\">Dress Check: <b class=\"w3-text-green\">&#x2714;</b>
                  <a class=\"w3-padding-left w3-padding-right\">Visit Types: <b class=\"w3-text-green\">{visittypes}</b>
		</td>


          </tr>
         


		<tbody>
				
                <table class=\"w3-card-16 w3-white w3-table w3-hoverable w3-responsive w3-padding-64\">
                <tr class=\"w3-sand w3-hover-grey\">
                  <th class=\"w3-border-left\">Visitor Full Name</th>
                  <th class=\"w3-border-left\">Relation</th>
                  <th class=\"w3-border-left\">SSN</th>          
                  <th class=\"w3-border-left\">DOB</th>
                  <th class=\"w3-border-left\">Phone</th>
                  <th class=\"w3-border-left\">Email</th>
                  <th class=\"w3-border-left\">Address</th>
                  <th class=\"w3-border-left\">City</th>
                  <th class=\"w3-border-left\">ZIP</th>
                  <th class=\"w3-border-left\">Minor</th>
                </tr>  

            
                

              "; /// do not go off
                  
    $searchReplaceArray0 = array(
          "{1}"       => $j,
          "{visitid}" => $row[visitid],
          "{ifname}"  => $row[ifname],
          "{imname}"  => $row[imname],
          "{ilname}"  => $row[ilname],
	  "{visitdate}" => $row[visitdate],
	  "{visittime}" => $row[visittime],
	  "{visittypes}" => $visitInformation,
	  "{applicationdate}" => $row[applicationdate]
	  
	);

    $htmltable = str_replace(
            array_keys($searchReplaceArray0),
            array_values($searchReplaceArray0),
            $template                            

    );
    
    echo $htmltable;
    
    $result = "SELECT DISTINCT 
                    visitors.vfname, visitors.vlname, visitors.vmname, visitors.vaddress , visitors.vcity, visitors.vzip
                  , visitors.vemail, visitors.vphone, visitors.vssn  , visitors.vrelation, visitors.vdob, visitors.minorstatus

                  , visitorid.applicationdate, visitorid.visitdate, visitorid.visittime, visitorid.consentcheck,
                     visitorid.agreementcheck, visitorid.dresscheck, visitorid.visitid  
                

                FROM visitors as visitors
                
                INNER JOIN approve as approve
                On visitors.visitid = approve.visitid
    
                INNER JOIN visitorid as visitorid
                ON visitorid.visitid = visitors.visitid
                WHERE visitors.visitid  = '" . $row[0]. "';";


    $ret2 = pg_query($db,$result);


    // Making alot of variables then use to subtitude. 
    if(!$ret2){
    echo pg_last_error($db);
    exit;
  }
    
    while ($tablerow = pg_fetch_array($ret2)){    
      // This loop to create dynamic visitors for each of the inmate
      $htmlrow = "


    
        
		  <tr onclick = \"myFunction('Demo{1}')\">
			<td class=\"w3-bordered w3-border-top\">{vfname} {vmname} {vlname}</th>

			<td class=\"w3-bordered w3-border-top\">{vrelation}</a></th>
			             		  
			<td class=\"w3-bordered w3-border-top\">{vssn}</th>

			<td class=\"w3-bordered w3-border-top\">{vdob}</th>

			<td class=\"w3-bordered w3-border-top\">{vphone}</th>

			<td class=\"w3-bordered w3-border-top\">{vemail}</th>
				
			<td class=\"w3-bordered w3-border-top\">{vaddress}</th>
			
      			<td class=\"w3-bordered w3-border-top\">{vcity}</a></th>
			
      			<td class=\"w3-bordered w3-border-top\">{vzip}</a></th>

      			<td class=\"w3-bordered w3-border-top\">{minorstatus}</a></th>
				
      			

				
     </tr>

			</tr>

                "; /// do not go off

                // All the fields behind visitors will be replace with some variables

      //for loop to replace strings by variables
      //foreach ($tablerow as $value){ 
        ++$i;
          
        //$htmlrows = str_replace("{tablerow}", $value, $htmlrow);
        //$htmlrowsf = str_replace("{1}", $i, $htmlrows);
        $searchReplaceArray = array(
          "{1}" => $i,
          "{vfname}"  => $tablerow[vfname],
          "{vlname}"  => $tablerow[vlname],
          "{vmname}"  => $tablerow[vmname],
	  "{vaddress}" =>  $tablerow [vaddress],
	  "{vdob}" => substr($tablerow[vdob],5,2).substr($tablerow[vdob],7,3)."-".substr($tablerow[vdob],0,4),
	  "{vcity}" =>  $tablerow [vcity],
          "{vzip}"  => $tablerow[vzip],
          "{vemail}"     => $tablerow[vemail],
    	  "{vphone}" =>  "(".substr($tablerow [vphone],0,3).") ".substr($tablerow [vphone],3,3)."-".substr($tablerow [vphone],6,4),
          "{vssn}"  => substr($tablerow[vssn], 0, 3)."-".substr($tablerow[vssn],3,2)."-".substr($tablerow[vssn],5,4),
          "{vrelation}"     => $tablerow[vrelation],
	  "{applicationdate}"  => $tablerow[applicationdate],
	  "{minorstatus}"  => $tablerow[minorstatus],
          "{visitdate}"  => $tablerow[visitdate],
          "{visittime}"  => $tablerow[visittime],
	  "{consentcheck}" =>  $tablerow [consentcheck],
	  "{agreementcheck}" =>  $tablerow [agreementcheck],
          "{dresscheck}"  => $tablerow[dresscheck],
          "{visitid}"     => $tablerow[visitid]
        );

        $htmlrowsf = str_replace(
            array_keys($searchReplaceArray),
            array_values($searchReplaceArray),
            $htmlrow

          );

        //$childrowf = str_replace("{1}", $i, $chilrows);
        
        echo $htmlrowsf;
        //echo $childrowf;

        
        array_push($test, $row[0]);

          
    //echo "</table> ";
    
   } 

  }
  //echo $test;
  //$contents = str_replace("{row}", $row);
  
  pg_close($db);

?>  