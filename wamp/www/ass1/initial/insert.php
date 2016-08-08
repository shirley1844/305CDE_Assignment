 
mysql_select_db("login1", $con);
$sql = "CREATE TABLE login_info 
(
UserName varchar(16),
Password varchar(52),
)";
mysql_query($sql,$con);

mysql_query("INSERT INTO login_info (UserName, Password) VALUES ('Rin','123')");

mysql_select_db("data1", $con);
$sql = "CREATE TABLE data_info 
(
Name tinytext,
Type int,
)";
mysql_query($sql,$con);

mysql_query("INSERT INTO data_info (Name, Type) VALUES ('Coca Cola','1')");
