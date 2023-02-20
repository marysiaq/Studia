<?php
   session_start();
   $conn = new mysqli("localhost", "root","", "sklepik");

   if ($conn->connect_error) {
      die("Connection failed: ". $conn->connect_error);
   }
   $warunki=true;
   $_SESSION['zalogowany']=false;//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
   if(!empty($_POST["imie"])&&!empty($_POST["haslo"])&&!empty($_POST["e-mail"])&&!empty($_POST["nrtel"])&&strlen($_POST["nrtel"])==9&&is_numeric($_POST["nrtel"])&&!empty($_POST["nrbud"])&&$_POST["nrbud"]>0){
   
      
      $sql="SELECT id FROM klient WHERE e_mail=\"{$_POST['e-mail']}\"";
      $result=$conn->query($sql);

      if( $result!== false && $result->num_rows>0){

         $_SESSION['Blad']='<span>Podany e-mail jest zajęty!</span>';

         echo "Email zajety";
         
         header("Location: LogowanieRejestracja.php");
         exit();
      
      }
      else{
         echo "OK"; 
            
               if($warunki){
                  if(!empty($_POST["nrlok"]&&$_POST["nrlok"]>0 ))$sql="INSERT INTO adresy (miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values ('{$_POST['miejsc']}','{$_POST['kod']}','{$_POST['ulica']}','{$_POST['nrbud']}','{$_POST['nrlok']}')";
                  else $sql="INSERT INTO adresy (miejscowosc, kod_pocztowy, ulica, numer_budynku) values ('{$_POST['miejsc']}','{$_POST['kod']}','{$_POST['ulica']}','{$_POST['nrbud']}')";
                  $conn->query($sql);
                  $sql= "INSERT INTO klient (imie, nazwisko, id_adres , e_mail, haslo, numer_telefonu) SELECT '{$_POST['imie']}', '{$_POST['nazwisko']}', MAX(id), '{$_POST['e-mail']}', '{$_POST['haslo']}', '{$_POST['nrtel']}' from adresy";
                  //$sql= "INSERT INTO klient (imie, nazwisko, id_adres , e_mail, haslo, numer_telefonu) SELECT '{$_POST['imie']}', '{$_POST['nazwisko']}', id, '{$_POST['e-mail']}', '{$_POST['haslo']}', '{$_POST['nrtel']}' from adresy order by id desc limit 1;";
                  $conn->query($sql);
         
                  $sql="SELECT id FROM klient WHERE imie='{$_POST['imie']}'and nazwisko='{$_POST['nazwisko']}' and e_mail='{$_POST['e-mail']}'";
                  $result=$conn->query($sql);
                  $row=$result->fetch_assoc();

                  $_SESSION['zalogowany']=true;
                  $_SESSION['pracownik']=false;
                 // $_SESSION['nickname']=$row['nickname'];
                  $_SESSION['id']=$row['id'];
                 // $_SESSION['haslo']=$row['haslo'];
                  //$_SESSION['datarejestracji']=$row['datarejestracji'];

                  unset($_SESSION['Blad']);
         
           
                  header("Location: lista_produktow.php");
               }
               else{
                 // header("Location: LogowanieRejestracja.php");
               }
         
      }
   }
   else{
      $_SESSION['Blad']='<span>Błąd!</span>'; 
      
      header("Location: LogowanieRejestracja.php"); 
   }
   $conn-> close();
?>