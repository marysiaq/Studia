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
        <a href="zarz_dostawy.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="dodaj_dostawy.php">
       Nazwa:<input type='text' name='sposob_dostawy'/><br/>
       Cena:<input type='number' step="0.01" min="0.00" name='cena' />zł<br/>
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