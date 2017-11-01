<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tekst</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>




<!-- Hotjar Tracking Code for http://www.students.science.uu.nl/~4075897/uxopdr3b -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:541551,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>


<body>




<style type="text/css">
.txt {
position: absolute;
top: 3%;
padding: 10px;
left: 10%;
right: 10%;
font-size: medium;
font-family: Verdana, Geneva, sans-serif;
text-align: outline;
color: black;
background-color: white;
text-align:justify;
}

span {
  color: red;
}

img {
  float: right;
}

#formB label.error {
  color:red;
  font-weight:bold;
}

</style>

<?php
      $row = unserialize(base64_decode($_POST["rowString"]));
      $t = microtime(true);
      array_push($row, $t);
      
      
?> 

</head>
<body>

<div class="txt">
  <div id="block-327817" data-id="block-327817" data-position="" data-type="article.header" data-sac-marker="block.article.header">
    <div>
      <div>
        <div>
          <div>
            <div>
              <div>
                <h1> Shipping form </h1>
              </div>
            </div>
          </div>
          <div></div>
        </div>
        
      </div>
    </div>
  </div>
  <div id="block-327819" data-id="block-327819" data-position="" data-type="article.body" data-sac-marker="block.article.body">
    <div>
    <img src="postit.png"/>
      <div>
      <span>* = Required fields</span>
       <h3> Shipping Information </h3>
        <form method="post" action="tekst3.php" name="A" id="formB">
        Address:<br>
        <input type="text" name="adress" id="adress"><span>*</span><br>
        Zip Code: <br>
        <input type="text" name="zip" id="zip"><span>*</span><br>
        City:<br>
        <input type="text" name="city" id="city"><span>*</span><br>
        Country:<br>
        <input type="text" name="country" id="country"><span>*</span><br>
        <input type="hidden" name='rowString' value="<?php echo base64_encode(serialize($row)); ?>" />
        <input type="submit" name="Stuur" value="Continue" style="height:50px; width:200px; font-size:20px" />

        </form>
      </div>
    </div>
  </div>
  <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=11376276; 
var sc_invisible=1; 
var sc_security="e75e990f"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web stats"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="//c.statcounter.com/11376276/0/e75e990f/1/" alt="web
stats"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

<div style="text-align: center;">
</body>

<script type="text/javascript">
  $(function() { 

    $("#formB").validate({
      rules: {
        adress: "required",
        zip: "required",
        city: "required",
        country: "required"
      },

      messages: {
      },

      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>
</html>