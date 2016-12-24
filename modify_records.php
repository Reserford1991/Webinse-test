<?php
$host="localhost";
$username="root";
$password="";
$databasename="clients";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $fname=$_POST['firstN_val'];
 $sname=$_POST['secondN_val'];
 $mail=$_POST['mail_val'];
 

 mysql_query("update users set FirstName='$fname', SecondName='$sname', Email='$mail' where id='$row'");
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysql_query("delete from users where id='$row_no'");
 echo "success";
 exit();
}

if(isset($_POST['insert_row']))
{
 $fname=$_POST['firstN_val'];
 $sname=$_POST['secondN_val'];
 $mail=$_POST['mail_val'];
 mysql_query("insert into users values('','$fname','$sname', '$mail')");
 echo mysql_insert_id();
 exit();
}
?>