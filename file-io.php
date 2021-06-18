<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP IO</title>
</head>
<body>
<h1>PHP IO</h1>

 

<?php
define("filepath", "data.txt");



$firstName = $lastName = "";
$firstNameErr = $lastNameErr = "";
$gender = $genderErr = "";
$email = $emailErr = "";
$phone = $phoneErr = "";
$presntAddress = $presentAddressErr = "";
$permanentAddress = $permanentAddressErr = "";
$flag = false;
$successfulMessage = $errorMessage = "";



if($_SERVER['REQUEST_METHOD'] === "POST") 
{
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone =_POST['phone'];
$presentAddress = $_POST['presentAddress'];
$permanenetAddress = $_['permanentAddress'];



if(empty($firstName))
 {
$firstNameErr = "Field can not be empty";
$flag = true;
}

if(empty($lastName)) 
{
$lastNameErr = "Field can not be empty";
$flag = true;
}

if(empty($genderl)) 
{
$genderErr = "Field can not be empty";
$flag = true;
}

if(empty($email))
 {
$emailErr = "Field can not be empty";
$flag = true;
}

if(empty($phone))
 {
$phoneErr = "Field can not be empty";
$flag = true;
}

if(empty($presentAddress)) 
{
$presentAddressErr = "Field can not be empty";
$flag = true;
}

if(empty($permanentAddress)) 
{
$permanentAddressErr = "Field can not be empty";
$flag = true;
}

if(!$flag) 
{
$data[] = array("firstname" => $firstName, "lastname" => $lastName, "gender" => $gender, "email"=> $email, "phone" => $phone, "presentaddress" => $presentAddress, "permanentaddress" => $permanentAddress);

$data_encode = json_encode($data);
$res = write($data_encode);

if($res) {
$successfulMessage = "Sucessfully saved.";
}
else {
$errorMessage = "Error while saving.";
}
}
}



function test_input($data) 
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}



function write($content) 
{
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<fieldset>
	 	<legend>Personalia:</legend>

			<label for="firstname">First Name<span style="color: red">*</span>: </label>
			<input type="text" name="firstname" id="firstname">
			<span style="color: red"><?php echo $firstNameErr; ?></span>
			<br><br>

			<label for="lastname">Last Name<span style="color: red">*</span>: </label>
			<input type="text" name="lastname" id="lastname">
			<span style="color: red"><?php echo $lastNameErr; ?></span>
			<br><br>

			<label for="gender">Gender<span style="color: red";>*</span>:</label>
			<input type = "text" gender="Radio" id ="gender">
			<span style="color: red"><?php echo $genderErr; ?></span>
			<br><br>

			<label for="email">Email<span style="color: red";>*</span>:</label>
			<input type = "email"id ="email">
			<span style="color: red"><?php echo $emailErr; ?></span>
			<br><br>

			<label for="phone">Phone<span style="color: red";>*</span>:</label>
			<input type = "text"name="phone" id ="phone">
			<span style="color: red"><?php echo $phoneErr; ?></span>
			<br><br>

			<label for="PresentAddress">PresentAddress<span style="color: red";>*</span>:</label>
			<input type = "text" name="presentAddress" id ="presentAddress">
			<span style="color: red"><?php echo $presentAddressErr; ?></span>
			<br><br>

			<label for="PermanentAddress">PermanentAddress<span style="color: red";>*</span>:</label>
			<input type = "text"name="permanentAddress" id ="permanentAddress">
			<span style="color: red"><?php echo $permanentAddressErr; ?></span>
			<br><br>

			<input type="submit" name="submit" value="Submit">
	</fieldset>
</form>



<br>



<span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>



<?php



/*$fileData = read();
echo "<br><br>";
$fileDataExplode = explode("\n", $fileData);



echo "<ol>";
for($i = 0; $i < count($fileDataExplode) - 1; $i++) {
$temp = json_decode($fileDataExplode[$i]);
echo "<li>" . "First Name: " . $temp->firstname . " Last Name: " . $temp->lastname . "</li>";
}
echo "</ol>";*/



function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
</body>
</html>
