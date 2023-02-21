<?php
    session_start();
    
    
    $conn = new mysqli("localhost", "root","", "sklepik");

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
     }

     if(!empty($_POST["e-mail"])&&!empty($_POST["haslo"])){
        $sql="SELECT id, imie,id_uprawnienia,id_klienta FROM pracownik WHERE e_mail='".$_POST['e-mail']."' AND haslo ='".$_POST['haslo']."' and czy_aktywny=true";
        
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            echo "oK";
            echo $row['imie'];
            //$_SESSION['nickname']=$row['nickname'];
            $_SESSION['id_prac']=$row['id'];
            $_SESSION['id_uprawnienia']=$row['id_uprawnienia'];
           // $_SESSION['datarejestracji']=$row['datarejestracji'];
            //$_SESSION['haslo']=$row['haslo'];
            $_SESSION['zalogowany']=true;
            $_SESSION['pracownik']=true;

            if($row['id_klienta']!=null){
                $_SESSION['id']=$row['id_klienta'];
            }
            

             unset($_SESSION['BladLog']);

             
            

             header("Location: panel_pracownika.php");  
        }
        else{
            $_SESSION['BladLog']="<span>Błąd!</span>";
            
            header("Location: logowanie_prac_f.php");  
        }

     }
     else{
         //$_SESSION['BladLog']="<span>Nieprawidłowa nazwa użytkownika lub hasło!</span>";
         
         header("Location: logowanie_prac_f.php");
     }

     $conn-> close();
?>