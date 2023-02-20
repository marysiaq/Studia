<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
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
    <a href="profil.php"> Powrót </a>
    
    </nav>
    <article>
        <h3>Czy napewno chcesz usunąć konto? </h3>
    <form   action='usun_konto_klient.php' method='post'>
    <input type='submit'  value='Usuń konto'>
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
        
        ?>
		
		<br/>
    </footer>
</body>
</html>   