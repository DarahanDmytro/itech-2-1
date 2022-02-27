<?php
include("bd.php");
$department=$_POST['department'];

$sth = $dbh->prepare("SELECT DISTINCT name, shift FROM nurse 
                      WHERE department=:department");
$sth->bindParam(':department',$department,PDO::PARAM_STR);
$sth->execute();
$res=$sth->fetchAll();

$table = "<tr><th>Медсестра</th><th>Смена</th></tr>";

foreach($res as $row)
{
  $table=$table."<tr><td>".$row['name']."</td><td>".$row['shift']."</td></tr>";			
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Медсёстры отделения)</title>
  <link href="style.css" rel="stylesheet">
 </head>
 <body>

<main>
<table id="myTable" class="table_dark">
  <?php echo "<caption><b>Oтделение $department</b></caption>"?>
   <?php echo $table; ?>
</table><br>
<!--?php echo $out;?-->
</main>
 </body>
</html>