<?php
include("bd.php");
$nurse=$_POST['nurse'];

$sth = $dbh->prepare("SELECT DISTINCT w.name FROM nurse as n
                          INNER JOIN nurse_ward ON FID_Nurse=ID_Nurse 
                          INNER JOIN ward as w ON FID_Ward=ID_Ward
                      WHERE n.name=:name");
$sth->bindParam(':name',$nurse,PDO::PARAM_STR);
$sth->execute();
$res=$sth->fetchAll();

$table = "<tr><th>Медсестра</th><th>$nurse</th></tr>";

foreach($res as $row)
{
  $table=$table."<tr><td>Палата</td><td>".$row['name']."</td></tr>";
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1(Палаты медсестры)</title>
  <link href="style.css" rel="stylesheet">
 </head>
 <body>

<main>
  <table id="myTable">
   <caption><b>Список палат медсестры</b></caption>
   <?php echo $table; ?>
  </table>
 </main>
 </body>
</html>