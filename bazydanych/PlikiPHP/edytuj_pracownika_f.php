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
        <form method="post" action="edytuj_pracownika.php">
       
            <?php
            $conn = new mysqli("localhost", "root","", "sklepik");
            if ($conn->connect_error) {
                die("Connection failed: ". $conn->connect_error);
           }
           $result2=$conn->query("SELECT id_uprawnienia,imie,nazwisko, czy_aktywny FROM pracownik where id={$_GET['id']} ");
            $result=$conn->query("SELECT id,uprawnienia FROM uprawnienia_pracownikow order by uprawnienia ");
            $row2=$result2->fetch_assoc();
            echo "Uprawnienia:<select name ='id_uprawnienia'>";
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    if($row['id']==$row2['id_uprawnienia'])echo "<option selected='selected' value=\"{$row['id']}\">{$row['uprawnienia']} </option>";
                    else echo "<option value=\"{$row['id']}\">{$row['uprawnienia']} </option>";
                }
                echo "</select><br/>";
                echo "Czy aktywny:<select name='czy_aktywny'>";
                if($row2['czy_aktywny']==true)echo "<option selected='selected' value=\"true\">tak</option><option  value=\"false\">nie</option>";
                else echo "<option  value=\"true\">tak</option><option selected='selected'  value=\"false\">nie</option>";
                echo "</select>";
                echo "<input type='hidden' name='id' value='{$_GET['id']}'>";

            }

            $conn->close();
            
            ?>
            
    <input type="submit" value="Zapisz" />
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