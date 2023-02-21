<?php
    session_start();
    if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){
        //header("Location: filmy.php");
        //exit();
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
        <a href="lista_produktow.php"> Strona głowna </a>
    </nav>
    <article>
        <br/><br/><br/>
        <h1>Logowanie dla pracowników:</h1>
        <form action="zaloguj_prac.php" method="POST">
            <label>e-mail:</label>
            <input type="e-mail" name="e-mail"/>
            <br/>
            <label>Hasło:</label>
            <input type="password" name="haslo"/>
            <br/>
            <input type="submit" value="Zaloguj"/>
        </form>
        <?php
            if(isset($_SESSION['BladLog'])){
                echo $_SESSION['BladLog'];
                unset($_SESSION['BladLog']);
            }
        ?>
        <br/><br/><br/>
        </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>