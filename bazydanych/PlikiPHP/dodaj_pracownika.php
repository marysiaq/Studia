<?php
   session_start();
   $conn = new mysqli("localhost", "root","", "sklepik");

   if ($conn->connect_error) {
      die("Connection failed: ". $conn->connect_error);
   }
   $warunki=true;
   //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   
   if(!empty($_POST["imie"])&&!empty($_POST['id_uprawnienia'])&&!empty($_POST["haslo"])&&!empty($_POST["e-mail"])&&!empty($_POST["nrtel"])&&strlen($_POST["nrtel"])==9&&is_numeric($_POST["nrtel"])&&!empty($_POST["nrbud"])&&$_POST["nrbud"]>0){
   
      
      $sql="SELECT id FROM pracownik WHERE e_mail=\"{$_POST['e-mail']}\"";
      $result=$conn->query($sql);
      $result2=$conn->query("select if('{$_POST['kod']}' regexp '^[0-9]{2}-[0-9]{3}$',true,false) as kod_ok, if('{$_POST['e-mail']}' regexp '^[a-zA-Z0-9.]{1,}@[a-z0-9]{2,}\.[a-z]{2,3}$',true,false)as e_mail_ok;");
      $row=$result2->fetch_assoc();  
      if( $result!== false && $result->num_rows>0){

         $_SESSION['Blad']='<span>Podany e-mail jest zajęty!</span>';

         echo "Email zajety";
         
         header("Location: dodaj_pracownika_f.php");
         exit();
      
      }
      else if($row['kod_ok']==false||$row['e_mail_ok']==false){
        $_SESSION['Blad']='<span>Blad!</span>';
         
         header("Location: dodaj_pracownika_f.php");
         exit();
      }
      else{
         echo "OK"; 
            
               if($warunki){
                  if(!empty($_POST["nrlok"]&&$_POST["nrlok"]>0 ))$sql="INSERT INTO adresy (miejscowosc, kod_pocztowy, ulica, numer_budynku, numer_lokalu) values ('{$_POST['miejsc']}','{$_POST['kod']}','{$_POST['ulica']}','{$_POST['nrbud']}','{$_POST['nrlok']}')";
                  else $sql="INSERT INTO adresy (miejscowosc, kod_pocztowy, ulica, numer_budynku) values ('{$_POST['miejsc']}','{$_POST['kod']}','{$_POST['ulica']}','{$_POST['nrbud']}')";
                  $conn->query($sql);
                  $sql= "INSERT INTO pracownik (imie, nazwisko, id_adres , e_mail, haslo, numer_telefonu, id_uprawnienia) SELECT '{$_POST['imie']}', '{$_POST['nazwisko']}', MAX(id), '{$_POST['e-mail']}', '{$_POST['haslo']}', '{$_POST['nrtel']}',{$_POST['id_uprawnienia']} from adresy";
                  //$sql= "INSERT INTO klient (imie, nazwisko, id_adres , e_mail, haslo, numer_telefonu) SELECT '{$_POST['imie']}', '{$_POST['nazwisko']}', id, '{$_POST['e-mail']}', '{$_POST['haslo']}', '{$_POST['nrtel']}' from adresy order by id desc limit 1;";
                  $conn->query($sql);
                  unset($_SESSION['Blad']);
         
           
                  header("Location: zarz_pracownikami.php");
               }
               else{
                 // header("Location: LogowanieRejestracja.php");
               }
         
      }
   }
   else{
      $_SESSION['Blad']='<span>Błąd!</span>'; 
      
      header("Location: dodaj_pracownika_f.php"); 
   }
   $conn-> close();
?>