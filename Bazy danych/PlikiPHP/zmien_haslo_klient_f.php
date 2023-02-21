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
    <form   action='zmien_haslo_klient.php' method='post'>
       Nowe haslo: <input type="password" name='haslo'/><br/>
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
       
        ?>
		
		<br/>
    </footer>
</body>
</html>   