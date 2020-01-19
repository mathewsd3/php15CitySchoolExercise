<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Title</title>
</head>

<body>

<form name="form_update" method="post" action="exercise-city-school.php">

<?php
// 1 - preparer  connexion
$connectionDb = new PDO('mysql:host=localhost:3306;dbname=ecole;charset=utf8','root','');
// 2 – prepare the query
$result = $connectionDb->prepare("select DISTINCT(ville) from profs");
// 3 – add the parameters (inutil)
// 4 - run the query and retrieve thecursor
$result->execute();
// 5 fetch data line by line
//drop down 
echo "<select name= 'ville'>";
echo '<option value="">'.'--- Please Select City ---'.'</option>';

//fetch the data from database
while($row= $result->fetch())
{

echo "<option value='". $row['ville']."'>".$row['ville'].'</option>';
}
echo '</select>';


?>
<button name="submit" >Submit</button>
<?php
if(isset($_POST["submit"])) 
{
	$result_1 = $connectionDb->prepare('select * from profs where ville="'.$_POST['ville'].'"');
// 3 – add the parameters (inutil)
// 4 - run the query and retrieve thecursor
$result_1->execute();
while($line= $result_1->fetch())
{
	echo '</br>'.$line['Nom'];
}
}
?>
</form>

</body>
</html>
