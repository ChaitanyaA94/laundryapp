<?php
//include_once('css.php');
?>
<div id="footer_marquee">
  <marquee behavior="scroll" direction="right" scrollamount="5">
        		<img src="image/truck.png" style="margin-left:500px"/>
                <img src="image/traveller.png" style="margin-left:300px"/>
                <img src="image/tanker1.png" style="margin-left:300px"/>
	   </marquee>
  </div>
<div id="footer">
  	<p><strong><a href="index.php">Home</a></strong></p>
  	<p></p>
        <p>Need a help? &nbsp; Call us: <strong>9260610306 / 8983627535</strong></p>
        <p>Email us: <strong>contact@laundry.com</strong></p>
        <p>All Rights Reserved &copy; laundry.com. <br/></p>
   </div>
	

<script type="text/javascript">
	function specialc(){

var iChars = "!`@#$%^&*()+=[]';{}./\\|:<>~_";   
var data = document.getElementById("comment").value;

for (var i = 0; i < data.length; i++){      
    if (iChars.indexOf(data.charAt(i)) != -1){    

    alert ("Comment allows only few special characters below\n '- , ' ");
	document.getElementById("comment").focus();
	document.getElementById("comment").value="";
	
	//data.focus();
    return false; 
} 
}
}
</script>