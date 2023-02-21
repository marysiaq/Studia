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
        <a href="lista_produktow.php"> Strona głowna  </a>
        <a href="zaloguj_prac.php">  Pracownicy </a>
    </nav>
    <article>
        <br/><br/><br/>
        <h1>Zaloguj się na istniejące konto:</h1>
        <form action="zaloguj.php" method="POST">
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

        <h1>Nie masz konta? Zarejestruj się!</h1>
		<form action="zarejestruj.php" method="POST">
            <label>Imie:</label>
            <input type="text"  name="imie"/>
            <br/>
            <label>Nazwisko:</label>
            <input type="text"  name="nazwisko"/>
            <br/>
            <label>e-mail:</label>
            <input type="e-mail" pattern="^[a-zA-Z0-9.]{1,}@[a-z0-9]{2,}\.[a-z]{2,3}$" name="e-mail"/>
            <br/>
            <label>Numer telefonu:</label>
            <input type="text" name="nrtel"/>
            <br/>
            <label>Hasło:</label>
            <input type="password" name="haslo"/>
            <br/>
            <br/>
            <br/>

            <label>Miejscowiść:</label>
            <input type="text"  name="miejsc"/>
            <br/>
            <label>Kod pocztowy:</label>
            <input type="text" pattern="^[0-9]{2}-[0-9]{3}$"  name="kod"/>
            <br/>
            <label>Ulica:</label>
            <input type="text" name="ulica"/>
            <br/>
            <label>Numer budynku:</label>
            <input type="number" name="nrbud"/>
            <br/>
            <label>Numer lokalu:</label>
            <input type="number" name="nrlok"/>
            <br/>
            
            <input  type="submit" value="Zarejestruj"/>
        </form>
        <?php
            if(isset($_SESSION['Blad'])){
                echo $_SESSION['Blad'];
                unset($_SESSION['Blad']);
            }
        ?>
        <br/><br/><br/>
	
    </article>
    <footer>
		<br/>
		<p>@Maria Blim 2021</p>
		<br/>
    </footer>
</body>
</html>