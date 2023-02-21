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
        <a href="raporty.php"><-- Powrót</a>
    <?php
       
       

        ?>
    </nav>
    <article>
            
             <?php
              $conn = new mysqli("localhost", "root","", "sklepik");
              if ($conn->connect_error) {
                  die("Connection failed: ". $conn->connect_error);
              }

                $sql="select sum(pom2.pom)  as ilosc from (select id_stan, if(isnull(data_anulowania),0,1) as pom ,data_anulowania from zamowienie where id_stan in (2,3,4,5,6)";
                if (isset($_POST["dzien"])&&!empty($_POST["dzien"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST['dzien']}')";
                 //   echo $_POST['dzien'];
                }
                
                else if (isset($_POST["mies"])&&!empty($_POST["mies"])) {
                    $sql .= " AND data_zamowienia LIKE'{$_POST["mies"]}%')";
                    //echo $_POST['mies'];
                }
                else if (isset($_POST["rok"])&&!empty($_POST["rok"])) {
                    $sql .= " AND data_zamowienia LIKE '{$_POST["rok"]}%')";
                }
                else{
                    $_SESSION['blad1']="<span>Błąd!</span>";
                    header("Location: raporty.php");
                    exit();
                }

                $sql .=" as pom2 ;";
				
				
               
				
                $result=$conn->query($sql);
                if($result->num_rows>0){
                   while($row=$result->fetch_assoc()){
                       
                    echo "Liczba zamówień anulowanych ale przywróconych: {$row['ilosc']}<br/>";
                        
                    }
               }
               else echo "Brak wyników!";
                $conn->close();

        ?>
  
	
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>