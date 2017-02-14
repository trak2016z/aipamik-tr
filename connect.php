<?php
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "aipamik";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    //$polaczenie2 = @new mysqli($host, $db_user, $db_password, $db_name);


if($polaczenie->connect_errno!=0)
{
    die("Error:".$polaczenie->connect.errno);
}

//if($polaczenie2->connect_errno!=0)
//{
  //  die("Error:".$polaczenie2->connect.errno);
//}

//    $sql = "INSERT INTO uzytkownik (user, password, email) VALUES ('marcinek', 'lol', 'nob@example.com')";
//        
//    if ($polaczenie->query($sql) === TRUE) {
//        echo "New record created successfully";
//    } else {
//        echo "Error: " . $sql . "<br>" . $polaczenie->error;
//        }
//        
//    $polaczenie->close();

/* // na hoscie

<?php
    $host = "sql310.byethost33.com";
    $db_user = "b33_19393556";
    $db_password = "tiotio";
    $db_name = "b33_19393556_aipamik";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie->query("SET NAMES 'utf8'");
if($polaczenie->connect_errno!=0)
{
    die("Error:".$polaczenie->connect.errno);
}
?>

*/
