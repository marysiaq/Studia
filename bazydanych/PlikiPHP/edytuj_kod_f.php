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
        <a href="kody_rabatowe.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="edytuj_kod.php">
            
    <?php
        $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
       }
       
       $result=$conn->query("select kod, znizka_procent, czy_aktywny from kody_rabatowe where id={$_GET['id']}");
       $row=$result->fetch_assoc();
       echo "<input type='hidden' name='id' value='{$_GET['id']}'>
       Kod:<input type='text' name='kod'  value='{$row['kod']}' /><br/>
       Czy kod jest nadal aktywny?<select name='czy_aktywny'>
       ";

       if($row['czy_aktywny']==0)echo "<option selected='selected' value='false'>nie</option><br/><option  value='true'>tak</option><br/></select>";
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