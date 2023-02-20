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
        <a href="panel_pracownika.php"><-- Powrót</a>
    <?php
        ?>
    </nav>
    <article>
    <?php
        if(isset($_SESSION['blad1'])){
            echo $_SESSION['blad1'];
            unset($_SESSION['blad1']);
        }
        
        ?>

    Liczba zamówionych poszczególnych produktów:<form action="raport1.php" method="post">
                
				
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                

                <input type="submit" value="Generuj raport"/>
            </form></br>
            3 produkty sprzedane w największej ilości:<form action="raport2.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Produkty zamówione w większej ilości niż wynosi średnia:<form action="raport3.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>

            Zestawienie ilości wybieranych przez klientów sposobów dostwa, metod płatności oraz kodów rabatowych w kolejności od najczęściej wybieranych:<form action="raport4.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>

            Suma udzielonego rabatu z kodów rabatowych z podziałem na kody:<form action="raport5.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Podsumiwanie kosztów całkowitych zamówień:<form action="raport6.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
           Średnia długość realizacji zamowienia:<form action="raport7.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Liczba zamówień anulowanych ale przywróconych:<form action="raport8.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Troje klietntów którzy wydali najwięcej pieniędzy w sklepie:<form action="raport9.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Troje klietntów którzy zamówili najwięcej sztuk towarów:<form action="raport10.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Klienci, którzy złorzyli swoje piersze zamowienie w podanym czasie:<form action="raport11.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
            Trzy najpopularniehsze kategorie produktów wśród klientów, których nazwy miejscowości w adresie zaczynają się na M lub D:<form action="raport12.php" method="post">
                Data:<input type='date' name ='dzien' />
                Miesiąc<input type='month' name='mies'/>
                Rok<input type='number' min='2020' max='2030' name='rok'/>
                <input type="submit" value="Generuj raport"/>
            </form></br>
        
    </article>
    <footer>
		<br/>
		
		<br/>
    </footer>
</body>
</html>