<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
	<script>
        function validate(){
		var pass=document.getElementById("pass1");
		var repass=document.getElementById("pass2");
    if(pass.value!=repass.value){
		alert("Passwords Don't Match");
		return false;
		}else{
			return true;
		}
    }
    </script>

</head>
<body>
<section class="loginform cf">
<form onSubmit="return validate()" method="POST" action="connectivity1.php">
<table cellpadding="10%">
<tr><td>Name:</td>
<td><input type="text" name="name" required placeholder="Name"></td>
</tr>
<tr><td>Address:</td>
<td><textarea type="text" name="address" rows="5" cols="23" placeholder="Address" required></textarea></td>
</tr>
<tr><td>Phone Number:</td>
<td><input type="text" name="phone_no" maxlength=10 pattern="^[0-9]{10}" placeholder="9876543210" required></td>
</tr>
<tr><td>Type:  </td><td><input type="radio" name="type1" value="washer" checked>Laundry
  <input type="radio" name="type1" value="customer">Customer</td>
</tr>
<tr><td>Email ID: </td><td><input type="email" name="email" placeholder="example@mail.com" required></td>
</tr>
<tr><td>Password: </td><td><input type="password" name="pass1" id="pass1" placeholder="Atleast 8 Characters" pattern=".{8,}" required></td>
</tr>
<tr><td>Confirm Password: </td><td><input type="password" name="pass2" id="pass2" placeholder="Confirm Password" pattern=".{8,}" required></td>
</tr>
  <tr><td><input type="submit" value="Register" name="regis"></td></tr>
</table>
</form>
</section>
</body>
</html>