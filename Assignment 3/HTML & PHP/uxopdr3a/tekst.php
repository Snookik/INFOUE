<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tekst</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

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

<body>


<?php
$date = date("m-d-Y H.i.s");
$timestamp1 = microtime(true);
$row = array ($date, 'A', $timestamp1);
?> 

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

#formA label.error {
  color:red;
  font-weight:bold;
}

</style>
</head>
<body>
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

       <h3> Billing / Shipping Information </h3>
        <form method="post" action="thankyou.php" name="A" id="formA">
        First Name: <br>
        <input type="text" name="firstname" id="firstname"><span>*</span><br>
        Last Name: <br>
        <input type="text" name="lastname" id="lastname"><span>*</span><br>
        Email Address:<br>
        <input type="text" name="email" id="email"><span>*</span><br>
        Date of Birth (YYYY/MM/DD): <br>
        <input type="date" name="dob" id="dob"><span>*</span><br>
        Address:<br>
        <input type="text" name="adress" id="adress"><span>*</span><br>
        Zip Code: <br>
        <input type="text" name="zip" id="zip"><span>*</span><br>
        City:<br>
        <input type="text" name="city" id="city"><span>*</span><br>
        Country:<br>
        <input type="text" name="country" id="country"><span>*</span><br>

        <h3> Credit Card Information </h3>

        Type: <br>
        <select>
          <option value="visa"> Visa </option>
          <option value="ae"> American Express </option>
          <option value="MasterCard"> MasterCard </option>
          <option value="PayPal"> PayPal </option>
        </select><span>*</span> <br>

        Name Holder: <br>
        <input type="text" name="ccname" id="ccname"><span>*</span><br>

        Number: <br>
        <input type="text" name="ccnr" id="ccnr"><span>*</span><br>

        CVC: <br>
        <input type="text" name="cvc" id="cvc"><span>*</span><br><br>


        <input type="hidden" name='rowString' value="<?php echo base64_encode(serialize($row)); ?>" />
        <input type="submit" name="Stuur" value="Process Payment" style="height:50px; width:200px; font-size:20px" />

        </form>
      </div>
    </div>
  </div>
  

<div style="text-align: center;">
</body>

<script type="text/javascript">
  $(function() { 

    $("#formA").validate({
      rules: {
        firstname: "required",
        lastname:  "required",

        email: {
          required: true,
          email: true
        },
        dob: {
          required: true,
          date: true
        },
        adress: "required",
        zip: "required",
        city: "required",
        country: "required",
        ccnr: "required",
        cvc: "required",
        ccname: "required"
      },

      messages: {
        email: "This is not a valid e-mail address."
      },

      submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>
</html>