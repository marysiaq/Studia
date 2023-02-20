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
    $result=$conn->query("select sposob_dostawy from sposoby_dostawy where sposob_dostawy='{$_POST['sposob_dostawy']}'");
    if( $result!== false && $result->num_rows>0){
        $_SESSION['blad']="<span>Podaj inną nazwę!</span>";
       header("Location: dodaj_dostawy_f.php");
       exit();
    }
    if(!empty($_POST['sposob_dostawy'])&&$_POST['cena']>=0.00){
        $conn->query("insert into sposoby_dostawy (sposob_dostawy, cena) values ('{$_POST['sposob_dostawy']}',{$_POST['cena']})");
    }
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: dodaj_dostawy_f.php");
       exit();
   }
   header("Location: zarz_dostawy.php");
    $conn->close();
?>