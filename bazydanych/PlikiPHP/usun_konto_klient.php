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

       $result=$conn-> query("select count(zamowienie.id) as zam from zamowienie where zamowienie.id_klienta={$_SESSION['id']} and zamowienie.id_stan in (2,3);");
       $row=$result->fetch_assoc();

   if($row['zam']==0)$conn->query("update klient set usunieto=true where id={$_SESSION['id']}");
  else{
      $_SESSION['blad']="<span>Nie można usunąć konta jeżeli realizacja jakiegokolwiek zamówienia nie została zakończona!</span>";
      header("Location: usun_konto_klient_f.php");
      exit();
  }
  unset($_SESSION['zalogowany']);
  unset($_SESSION['id']);
  header("Location: lista_produktow.php");
   $conn->close();

?>
