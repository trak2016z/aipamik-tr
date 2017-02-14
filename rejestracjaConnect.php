<?php
    session_start();
    require_once 'connect.php';
    
    $name = $_POST['name'];
    $haslo = $_POST['password'];
    $haslo2 = $_POST['password2'];
    $email = $_POST['email'];

    if(!($haslo==$haslo2))
    {
        $polaczenie->close();
        header('Location:rejestracja.php');
        
    }
    else
    {
        $sql = "Select * FROM uzytkownik WHERE user = '$name' OR  email = '$email'";
        

        if($rezultat = @$polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $_SESSION['blad'] = '<span style = " color: red">User juz istnieje</span>';
                header('Location: rejestracja.php');
            }
            else
            {
                $sql2 = "INSERT INTO `uzytkownik` (`id`, `user`, `password`, `email`) VALUES (0, '$name', '$haslo', '$email')";
                if ($rezultat2 = @$polaczenie->query($sql2))
                {
                    header('Location: login.php');
                }
            }
        }
        
        $polaczenie->close();
        $polaczenie2->close();
    }
?>
