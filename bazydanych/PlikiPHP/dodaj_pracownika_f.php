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
        <a href="zarz_pracownikami.php"> <-- Powrót </a>
        <?php
        

        ?>
    </nav>
    <article>
        <form method="post" action="dodaj_pracownika.php">
       Imie:<input type='text' name='imie'/><br/>
       Nazwisko:<input type='text' name='nazwisko' /><br/>
       <label>e-mail:</label>
            <input type="e-mail" name="e-mail"/>
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
            <input type="text"  name="kod"/>
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
            <select name ='id_uprawnienia'>
            <?php
            $conn = new mysqli("localhost", "root","", "sklepik");
            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
           }
            $result=$conn->query("SELECT id,uprawnienia FROM uprawnienia_pracownikow");
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<option value=\"{$row['id']}\">{$row['uprawnienia']} </option>";
                }
            }

            $conn->close();
            
            ?>
            </select><br/>
    <input type="submit" value="Dodaj" />
    </form>
    <?php
        if(isset($_SESSION['Blad'])){
            echo $_SESSION['Blad'];
            unset($_SESSION['Blad']);
        }
        
        ?>
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>