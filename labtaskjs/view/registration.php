<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
  <form  onsubmit="return validateForm()" method="post">
<table>
  <tr>
    <td><label for="full_name">Full Name:</label></td>
    <td><input type="text" id="full_name" name="full_name"></td>
  </tr>
  <tr>
    <td><label for="email">Email:</label></td>
    <td><input type="email" id="email" name="email"></td>
  </tr>
  <tr>
    <td><label for="password">Password:</label></td>
    <td><input type="password" id="password" name="password"></td>
  </tr>
  <tr>
    <td><label for="confirm_password">Confirm Password:</label></td>
    <td><input type="password" id="confirm_password" name="confirm_password"></td>
  </tr>
  <tr>
    <td><label for="date_of_birth">Date of Birth:</label></td>
    <td><input type="date" id="date_of_birth" name="date_of_birth"></td>
  </tr>
  <tr>
    <td><label for="gender">Gender:</label></td>
    <td>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </td>
  </tr>
 
 
  <tr>
    <td><label for="phone_number">Phone Number:</label></td>
    <td><input type="tel" id="phone_number" name="phone_number"></td>
  </tr>
 
  <tr>
    <td colspan="2"><button type="submit">Register</button></td>
  </tr>
    <p id="demo"></p>
    <p id="output1"></p>
     <p id="output2"></p>
      <p id="output3"></p>
          <p id="output4"></p>
          <p id="output5"></p>

</form>
</table>
<script src="../js/myscript.js">
 
    </script>
</body>
</html>


