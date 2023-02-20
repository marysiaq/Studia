<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: lista_produktow.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sklepik</title>
</head>
<body>
    <header>
    </header>
    <nav>
    <a href="profil_prac.php"><-- Powrót </a>
    </nav>
    <article>
    <form   action='edytuj_dane_prac.php' method='post'>
        <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $result=$conn->query("select imie,nazwisko, e_mail,numer_telefonu from pracownik where pracownik.id={$_SESSION['id_prac']};");
        $row=$result-> fetch_assoc();
        echo "
             Imie:<input type='text' name='imie' value='{$row['imie']}'><br/>
             Nazwisko:<input type='text' name='nazwisko' value='{$row['nazwisko']}'><br/>
             E-mail:<input type='email' pattern='^[a-zA-Z0-9.]{1,}@[a-z0-9]{2,}\.[a-z]{2,3}$' name='email' value='{$row['e_mail']}'><br/>
             Numer telefonu:<input type='text' name='nr_tel' value='{$row['numer_telefonu']}'><br/>
        ";
        
        
        ?>
    <input type='submit'  value='zapisz'>
    </form>

        <?php
        if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);
        }
        
        ?>
        
        
    </article>
    <footer>
		<br/>
        <?php
        $conn->close();
        ?>
		
		<br/>
    </footer>
</body>
</html>   