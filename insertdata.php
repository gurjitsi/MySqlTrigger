<?php
session_start();
if(!isset($_SESSION['uname']))
{
header("location:index.php");
}
$user=$_SESSION['uname'];
$password=$_SESSION['password'];
?>
<html>
<title>
MYSQLtrigger
</title>
<head>
<style type='text/css'>
#link4
{  
background: -moz-linear-gradient(top, grey,grey);
background: -webkit-gradient(linear, left top, left bottom, from(grey), to(grey));
background-color:grey; font-family:arial; color:grey; font-size:18px; font-weight:bold; text-decoration:none;
}
#link4:hover 
{  
background: -moz-linear-gradient(top, grey, white); 
background: -webkit-gradient(linear, left top, left bottom, from(grey), to(white));
font-family:arial; color:black; font-size:18px; font-weight:bold; text-decoration:none;
}
#cor 
{
background: -moz-linear-gradient(top, white, silver);
background: -webkit-gradient(linear, left top, left bottom, from(white), to(silver));
}
#cor22 
{
border: 2px solid #444; 
    overflow: hidden;
    position: relative;
}
</style>
</head>
<body id='cor'>
<table width='970px' height='550px' border='0' align='center' id='cor22'>
<tr>
<td>

<table width='960px' height='540px' border='0' align='center'>
<tr>
<td width='200px' valign='top'>

<table height='550px' width='190px'>
<tr>
<td style='font-family:arial; color:grey; font-size:18px; font-weight:bold; text-decoration:none;'>
<span style='font-family:arial; color:#444; font-size:20px; font-weight:bold; text-decoration:none;'>MYSQLtrigger 1.0</span>
</td>
</tr>
<tr>
<td style='font-family:arial; color:grey; font-size:14px; font-weight:bold; text-decoration:none;'>
<br/>
Databases
</td>
</tr>
<tr>
<td>
<?php
$con=mysql_connect('localhost',$user,$password);
$qu='show databases';
$res=mysql_query($qu);
echo "<table border='0' height='450px' width='190px' bgcolor='grey'>";
while($row=mysql_fetch_array($res))
{
$db=$row['Database'];
echo "<tr><td><img src='image/database.png' height='20px' width='20px'></td><td style='font-family:arial; color:white; font-size:14px; font-weight:bold; text-decoration:none;'>";
echo "<a style='color:white; text-decoration:none;' href='table.php?db=$db'>$db</a>";
echo "</td></tr>";
}
echo "</table>";
?>
</td>
</tr>
</table>
</td>
<td>

<table height='550px' width='730px' border='0' align='center' id='cor22'>
<tr>
<td height='100px' align='right'>

<table height="30px" width="250" border='0'>

<tr>
                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='main.php'><img src='image/home.png' width='50px' height='50px'><br/>Home</a></td>

				     <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='databases.php'><img src='image/database.png' width='50px' height='50px'>Databases</a></td>

                                    <td align='center' width='160px'><a style='font-family:arial; color:#444; font-size:14px; font-weight:bold; text-decoration:none;' href='logout.php'><img src='image/import.png' width='50px' height='50px'>Logout</a></td>

					 </tr>

</table>

</td>
</tr>
<tr>
<td valign='top'>

<br/><br/>
<?php
  $table=$_GET['table'];
  $db=$_GET['db'];
  //echo $table;
  //echo $db;
  $con=mysql_connect('localhost',$user,$password) or die('could not connect to server');
  $d=mysql_select_db($db,$con) or die('could not connect to db');
  $qu="select * from $table";
  $res=mysql_query($qu);
  echo "<form action='data_insert.php' method='POST'>";
  echo "<table width='500px' id='cor22' align='center'>";
	for($i=0;$i<mysql_num_fields($res);$i++)
	{
	echo "<tr><td bgcolor='grey' style='font-family:arial; color:white; font-size:14px; font-weight:bold;   		    		
        text-decoration:none;'>";
	$fiel=mysql_fetch_field($res);
	echo $fiel->name;
	echo "</td><td>";
	echo "<input type='text' name='name$i'>";
	echo "</td></tr>";
	}
   echo "<tr><td align='right' colspan='2'>
   <input type='hidden' value='$db' name='db'>
   <input type='hidden' value='$table' name='table'>
   <input type='submit' name='insert' value='Save'></td></tr>";
   echo "</table>";
   echo "</form>";
?>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
</body>
</html>
