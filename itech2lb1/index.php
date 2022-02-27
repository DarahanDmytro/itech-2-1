<?php
 include("bd.php");
 global $dbh;
 $nurses = prepare_list('Name','Nurse');
 $departments = prepare_list('Department','Nurse');
 $wards = prepare_list('name','ward');
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 1</title>
  <link href="style.css" rel="stylesheet">
 </head>
 <body>
  <main>
  <h1 style="margin-left: 50px;">Выберите действие:</h1><br>
  <form action="wards.php" method="post">
   <h3>Палаты по медсёстрам</h3>
   <span>
    <select name="nurse">    
       <?php echo $nurses ?>
    </select>
    <input type="submit" value="Перечень палат выбраной медсестры" />
    </span>
  </form>
  <form action="nurses.php" method="post">
    <h3>Медсёстры по отделениям</h3>
    <span>
    <select name="department">    
	<?php echo $departments ?>
    </select>
    <input type="submit" value="Медсёстры выбраного отделения" />
    </span>
  </form>
  <form action="shifts.php" method="post">
  <h3>Дежурства в выбраную смену</h3>
    <span>
   <select name="shift">
     <option value="First">Первая смена</option>
      <option value="Second">Вторая смена</option>
      <option value="Third">Третья смена</option>
   </select>
    <input type="submit" value="Дежурства" />
    </span>
  </form>
  <form action="add_nurse.php" method="post">
    <h3>Добавить медсестру</h3>
   <span>
   <input name="nurseName"  type="text" value="Имя">
   <select name="nurseDepartment">    
	<?php echo $departments ?>
    </select>
   <select name="shift">
     <option value="First">Первая смена</option>
      <option value="Second">Вторая смена</option>
      <option value="Third">Третья смена</option>
   </select>
   <input type="submit" value="Добавить медсестру" />
   </span>
  </form>
  <form action="add_ward.php" method="post">
   <h3>Добавить палату</h3>
   <span>
   <input name="wardNumber"  type="text" value="Номер" />
   <input type="submit" value="Добавить палату" />
   </span>
  </form>
  <form action="bind.php" method="post">
     <h3>Назначить медсестру в палату</h3>
    <span>
    <select name="nurse">    
	<?php echo $nurses ?>
    </select>
    <select name="ward">    
	<?php echo $wards ?>
    </select>
   <input type="submit" value="Назначить медсестру">
   </span>
  </form>
 </main>
 </body>
</html>
