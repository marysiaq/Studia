<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true){
        header("Location: lista_produktow.php");
        exit();
    }
    $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
    $result=$conn->query("select kategoria from kategorie_produktow where kod='{$_POST['kategoria']}'");
    if( $result!== false && $result->num_rows>0){
        $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_kategorie_f.php");
       exit();
    }
    if(!empty($_POST['kategoria'])){
        $conn->query("insert into kategorie_produktow (kategoria) values ('{$_POST['kategoria']}')");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_kategorie_f.php");
       exit();
   }
   header("Location: zarz_produktami.php");
    $conn->close();
?>