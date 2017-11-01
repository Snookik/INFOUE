<!doctype html>
<html>
  <head>
    
      
      
<!-- Hotjar Tracking Code for http://www.students.science.uu.nl/~4075897/uxopdr3a/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:540895,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

    
    <?php
      $array = unserialize(base64_decode($_POST["rowString"]));
      $handle = fopen("test.csv", "a");
      
      $count = count(file("test.csv"));

      $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
      $user_os        =   getOS();
      $user_browser   =   getBrowser();

      array_unshift($array, $count);
      array_push($array, microtime(true), $user_os, $user_browser);
      
      fputcsv($handle, $array);
      fclose($handle);
    ?> 

    <style type="text/css">
      .txt {
        position: absolute;
        top: 30%;
        padding: 10px;
        left: 30%;
        right: 30%;
        font-size: medium;
        font-family: Verdana, Geneva, sans-serif;
        text-align: center;
        color: black;
        background-color: silver;
      }
    </style>

    <?php
      
      # borrowed from https://stackoverflow.com/questions/18070154/get-operating-system-info-with-php 
        function getOS() { 
            global $user_agent;
            $os_platform    =   "Unknown OS Platform";
            $os_array       =   array(
                                    '/windows nt 10/i'      =>  'Windows 10',
                                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                                    '/windows nt 6.2/i'     =>  'Windows 8',
                                    '/windows nt 6.1/i'     =>  'Windows 7',
                                    '/windows nt 6.0/i'     =>  'Windows Vista',
                                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                    '/windows nt 5.1/i'     =>  'Windows XP',
                                    '/windows xp/i'         =>  'Windows XP',
                                    '/windows nt 5.0/i'     =>  'Windows 2000',
                                    '/windows me/i'         =>  'Windows ME',
                                    '/win98/i'              =>  'Windows 98',
                                    '/win95/i'              =>  'Windows 95',
                                    '/win16/i'              =>  'Windows 3.11',
                                    '/macintosh|mac os x/i' =>  'Mac OS X',
                                    '/mac_powerpc/i'        =>  'Mac OS 9',
                                    '/linux/i'              =>  'Linux',
                                    '/ubuntu/i'             =>  'Ubuntu',
                                    '/iphone/i'             =>  'iPhone',
                                    '/ipod/i'               =>  'iPod',
                                    '/ipad/i'               =>  'iPad',
                                    '/android/i'            =>  'Android',
                                    '/blackberry/i'         =>  'BlackBerry',
                                    '/webos/i'              =>  'Mobile'
                                );
        
            foreach ($os_array as $regex => $value) { 
                if (preg_match($regex, $user_agent)) {
                    $os_platform    =   $value;
                }
            }   
            return $os_platform;
        }
        
        # borrowed from https://stackoverflow.com/questions/18070154/get-operating-system-info-with-php  
        function getBrowser() {
            global $user_agent;
            $browser        =   "Unknown Browser";
            $browser_array  =   array(
                                    '/msie/i'       =>  'Internet Explorer',
                                    '/firefox/i'    =>  'Firefox',
                                    '/safari/i'     =>  'Safari',
                                    '/chrome/i'     =>  'Chrome',
                                    '/edge/i'       =>  'Edge',
                                    '/opera/i'      =>  'Opera',
                                    '/netscape/i'   =>  'Netscape',
                                    '/maxthon/i'    =>  'Maxthon',
                                    '/konqueror/i'  =>  'Konqueror',
                                    '/mobile/i'     =>  'Handheld Browser'
                                );
        
            foreach ($browser_array as $regex => $value) { 
                if (preg_match($regex, $user_agent)) {
                    $browser    =   $value;
                }
            }
            return $browser;
        }
    ?>

  </head>
  <body>
    <div class="txt">Thank you! Please fill in this survey, as it is an essential part of our experiment.<br><br>

    	<button type="button" style="font-size: 30px"onclick="window.location.href='https://docs.google.com/a/students.uu.nl/forms/d/1e6917PLQpZI3QUWxj4yLvKi8nk3nzwBf4akS7SEp970/viewform'">Go to survey</button>
    </div>

    <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=11375606; 
var sc_invisible=1; 
var sc_security="083ea640"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web analytics"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="//c.statcounter.com/11375606/0/083ea640/1/" alt="web
analytics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
  </body>
</html>
