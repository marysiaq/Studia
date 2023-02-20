<?php
    session_start();
    
    
    $conn = new mysqli("localhost", "root","", "sklepik");

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
     }

     if(!empty($_POST["e-mail"])&&!empty($_POST["haslo"])){
        $sql="SELECT id, imie FROM klient WHERE e_mail='".$_POST['e-mail']."' AND haslo ='".$_POST['haslo']."' and usunieto=false";
        
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            echo "oK";
            echo $row['imie'];
            //$_SESSION['nickname']=$row['nickname'];
            $_SESSION['id']=$row['id'];
           // $_SESSION['datarejestracji']=$row['datarejestracji'];
            //$_SESSION['haslo']=$row['haslo'];
            $_SESSION['zalogowany']=true;
            $_SESSION['pracownik']=false;
            

             unset($_SESSION['BladLog']);

             
            

             header("Location: lista_produktow.php");  
        }
        else{
            $_SESSION['BladLog']="<span>Nieprawidłowa nazwa użytkownika lub hasło!</span>";
            
            header("Location: LogowanieRejestracja.php");  
        }

     }
     else{
         $_SESSION['BladLog']="<span>Nieprawidłowa nazwa użytkownika lub hasło!</span>";
         
         header("Location: LogowanieRejestracja.php");
     }

     $conn-> close();
?>