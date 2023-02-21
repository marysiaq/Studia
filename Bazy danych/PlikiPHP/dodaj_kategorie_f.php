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
        <a href="zarz_produktami.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="dodaj_kategorie.php">
        Kategoria:<input type='text' name='kategoria'/><br/>
   
    <input type="submit" value="Dodaj" />
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