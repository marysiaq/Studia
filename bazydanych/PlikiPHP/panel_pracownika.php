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
   
    </nav>
    <article>
        <h1>Praca:</h1>
        <a href="zarz_zamowieniami.php">Zamówienia</a><br/>
        <a href="zarz_produktami.php">Produkty</a><br/>
        
        <?php
        if($_SESSION['id_uprawnienia']==2){echo"<a href='zarz_pracownikami.php'>Pracownicy</a><br/>
           <a href='zarz_klientami.php'>Klienci</a><br/>
           <a href='zarz_dostawy.php'>Sposoby dostawy</a><br/>
           <a href='zarz_platnosci.php'>Metody platnosci</a><br/>
           <a href='kody_rabatowe.php'>Kody rabatowe</a><br/>
           <a href='raporty.php'>Raporty</a><br/>
            ";}
        ?>
        
        <h1>Dane:</h1>
        <a href='profil_prac.php'> Profil</a><br/>
        <?php
        if(isset($_SESSION['id']))echo"<a href='lista_produktow.php'>Zakupy</a><br/>"
        ?>
        <a href='wyloguj_prac.php'> Wyloguj się </a>

    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>