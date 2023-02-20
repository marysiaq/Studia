<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: zaloguj_prac.php");
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
        <a href="zarz_platnosci.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="edytuj_platnosc.php">
            
    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
       }
       
       $result=$conn->query("select id, metoda_platnosci,  dostepne from metody_platnosci where id={$_GET['id']}");
       $row=$result->fetch_assoc();
       echo "<input type='hidden' name='id' value='{$_GET['id']}'>
       Nazwa:<input type='text' name='metoda_platnosci'  value='{$row['metoda_platnosci']}' /><br/>
       Czy sposob płatności jest nadal dostepny?<select name='dostepne'>
       ";

       if($row['dostepne']==0)echo "<option selected='selected' value='false'>nie</option><br/><option  value='true'>tak</option><br/></select>";
         else echo "<option  value='false'>nie</option><br/><option selected='selected' value='true'>tak</option><br/></select><br/>";    
        $conn->close();
    ?>
    <input type="submit" value="Zapisz" />
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
		
		<br/>
    </footer>
</body>
</html>