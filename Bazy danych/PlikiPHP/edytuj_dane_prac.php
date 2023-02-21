<?php
    session_start();
    if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']==false){
        header("Location: lista_produktow.php");
        exit();
    }
    $conn = new mysqli("localhost", "root","", "sklepik");
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }


        $result=$conn->query("select e_mail from pracownik where e_mail='{$_POST['email']}' id!={$_SESSION['id_prac']}");
        if( $result!== false && $result->num_rows>0){
            $_SESSION['blad']="<span>E-mail używany przez innego pracownika!</span>";
            header("Location: edytuj_dane_prac_f.php");
           exit();
        }    

    if(!empty($_POST['imie'])&&!empty($_POST['nazwisko'])&&!empty($_POST['email'])&&!empty($_POST['nr_tel'])&&strlen($_POST["nr_tel"])==9&&is_numeric($_POST["nr_tel"]))$conn->query("update pracownik set imie='{$_POST['imie']}', nazwisko='{$_POST['nazwisko']}',e_mail='{$_POST['email']}',numer_telefonu='{$_POST['nr_tel']}'  where pracownik.id={$_SESSION['id_prac']};");
   else{
       $_SESSION['blad']="<span>Błąd!</span>";
       header("Location: edytuj_dane_prac_f.php");
       exit();
   }
   header("Location: profil_prac.php");
    $conn->close();
?>