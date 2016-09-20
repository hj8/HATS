# Hawaii Advanced Technology Society's HACC submission. http://hats.team
Interested in this application? View the demo here: https://www.youtube.com/watch?v=fx9EGhxjhnI 

<h3><b>The WHY:</b><br></h3>
Oahu Community Correctional Center has a lengthy and troublesome visitation process.  Many of the visitors fill out numerous forms and wait all day just to get denied because of something missing.  

We held a meeting with the OCCC staff and identified key aspects and problems in their visitor registration process. 
<h3><b>For WHO: </b><br></h3>
The process is lengthy for both the visitors attempting to visit the site, and the staff attempting to verify everyone coming in. We wanted to build out a solution that helps a portion of our population get accumalated back into society by providing the needed day-to-day contact to ensure a stable mindset. Being able to talk to your loved ones is a critical part of our functioning society; being removed from that interaction doesn't help to rehabilitate those who have been incarcerated. By making this process smooth and efficent, we wanted to create a web application that helps the visitors, staff, and the inmates. Technology is supposed to make our lives easier, not harder.  

<h3><b>And HOW: </b><br></h3>
Our perfect solution would be to create a centralized web application that will allow both visitors and staff to save a lot of time and have an easy registration process. Being able to access this site from the web on any device is extremely important. Compatibility with devices such as phones, tablets, and even general desktop support is an important aspect. A simple to use, easy to navigate website was our target goal. 

<h3><b>The END: </b><br></h3>
In result, HATS has implemented an automated visitation process for OCCC by creating a website for the visitors to submit an online form. The visitors are able to input all of their information and add any additional visitors.  Once finished, they can submit the form and will be processed and sent to the database were OCCC staff can approve the form. From there, the OCCC Staff can approve and verify meeting times and general information of the visitors.


<h3><b>The PROCESS: </b><br></h3>

Step 1: Registration for Visit Request - http://hacc.hats.team:81/Registration.html<br>
Step 2: Authorization of a Visit Request - http://hacc.hats.team:83/<br>
Step 3: Verification for Arrival/Departure of Visitor - http://hacc.hats.team:84/<br>
Step 4: ? <br>
Step 5: Profit<br>


<h3><b>The INSTALL: </b><br></h3>
We designed our install with infrastructure and the potential to implement defense in depth. Our install environment consisted of three CentOS 7 and a Ubuntu host (don't ask why) each hosting a different portion of our product as they reside on different network segments. For example, the registration form is online, publicly accessible; while the authorization and verification process reside on two different interal networks at OCCC. As such, it made sense for us to implement in a manner that would reflect this concept. 

Our internal network:
-192.168.254.21: CentOS Registation Box<br>
  yum install httpd php php-common php-pgsql<br>

-192.168.254.25: Ubuntu PostGresql Database<br>
  tar -xzvf postgresql-9.5.4.tar.gz<br>
  
-192.168.254.31: CentOS Authorization<br>
  yum install httpd php php-common php-pgsql<br>

-192.168.254.35: CentOS Verification<br>
  yum install httpd php php-common php-pgsql<br>
