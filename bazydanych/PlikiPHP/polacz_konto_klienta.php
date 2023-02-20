<?php
session_start();
if(!isset($_SESSION['zalogowany'])||$_SESSION['zalogowany']!=true||$_SESSION['pracownik']!=true){
    header("Location: zaloguj_prac.php");
    exit();
}
$conn = new mysqli("localhost", "root","", "sklepik");
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
    $result=$conn->query("select klient.id from klient inner join pracownik where pracownik.e_mail=klient.e_mail and pracownik.id={$_SESSION['id_prac']};");
    if( $result!== false && $result->num_rows>0){
        $conn->query("update pracownik inner join klient on pracownik.e_mail=klient.e_mail and pracownik.id={$_SESSION['id_prac']} set pracownik.id_klienta=klient.id;");
    }
    else{
        $_SESSION['blad']="<span>Konto klient z Twoim e-mailem nie istnieje, zalecane utworzyć konto klienta!</span>";
       header("Location: profil_prac.php");
       exit();
    }
    $result=$conn->query("select id_klienta from pracownik where id={$_SESSION['id_prac']}");
    $row=$result->fetch_assoc();
    $_SESSION['id']=$row['id_klienta'];
    header("Location: profil_prac.php");
    

    $conn-> close();
?>