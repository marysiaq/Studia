
import java.io.File;
import java.io.IOException;

import java.net.UnknownHostException;
import java.util.Scanner;

public class Cli {
    private static Scanner sc = new Scanner (System.in);
    private CLIClient cliclient;
    private User user;
    private boolean koniec=false;
    
	public static void main(String[] args) throws UnknownHostException, IOException {
		Cli cli=new Cli();
		cli.menu();
		
	}
	public  Cli() {
		cliclient=new CLIClient();
		user =new User();
	}
	
	public void menu()  {
		System.out.println("Tryb: \n 1.Rejestracja \n 2.Logowanie \n 3.Tablica \n 4.Czat \n 5.Transfer in \n 6.Transfer out \n 7.Wylogowanie \n 8.Wyjscie \n 9.MAN ");

	while(!koniec) {	
		int wybor = sc.nextInt();
		switch (wybor){
		  case 1:
			  Rejestracja();
		    break;
		  case 2:
			  Logowanie();
		    break;
		  case 3:
			  Tablica();
			break;
		  case 4:
			  Czat();
			break;	
		  case 5:
			  PobieraniePliku();
			break;
		  case 6:
			  WysylaniePliku();
			break;
		  case 7:
			  Wyloguj();
			break;
		  case 8:
			  Wyjscie();
			break;
		  case 9:
			  man();
			break;
		  default:
		     System.out.println("Nieprawidlowy wybor!");
		}
	}
	}
	private void Rejestracja() {
		System.out.println("Nickname:");
		String nick=sc.next();
		System.out.println("Haslo:");
		String password=sc.next();
		
		String message ="type:rej#username:"+nick+"#password:"+password;
		cliclient.SendMessage(message);
		String answ=cliclient.listentToAnswer();
		
		if(answ.equalsIgnoreCase("type:rej#status:ok")) {
			System.out.println("sukces");
			System.out.println(answ);
		}
		else{
			System.out.println(answ);
		}
		
	}
	private void Logowanie() {
		if(user.isUserLoggedIn()) {
			System.out.println("Uzytkownik jest zalogowany!");
			return;
		}
		System.out.println("Nickname:");
		String nick=sc.next();
		System.out.println("Haslo:");
		String password=sc.next();
		
		String message ="type:log#username:"+nick+"#password:"+password;
		cliclient.SendMessage(message);
		String answ=cliclient.listentToAnswer();
		
		if(answ.equalsIgnoreCase("type:log#status:ok")) {
			user.LogIn(nick);
			System.out.println("sukces");
		}
		System.out.println(answ);
		
	}
	private void Tablica() {
		String message ="type:tablica";
		cliclient.SendMessage(message);
		String answ=cliclient.listentToAnswer();
		String[] zawartosc=answ.split("#");
		for(int i=1; i<zawartosc.length-1;i+=2) {
			System.out.println(zawartosc[i]+": "+zawartosc[i+1]);
		}
	}
	private void Czat() {
		if(!user.isUserLoggedIn()) {
			System.out.println("Uzytkownik nie jest zalogowany!");
			return;
		}
		System.out.println("Napisz wiadomosc do czatu:");
		sc.nextLine();
		String wiad=sc.nextLine();
		String message ="type:czat#username:"+user.getUsername()+"#zawartosc:"+wiad;
		cliclient.SendMessage(message);
		String answ=cliclient.listentToAnswer();
		System.out.println(answ);
	}
	private void WysylaniePliku() {
		if(!user.isUserLoggedIn()) {
			System.out.println("Uzytkownik nie jest zalogowany!");
			return;
		}
		System.out.println("Podaj nazwe pliku:");
		String filename=sc.next();
		File file = new File (filename);
		if(file.exists()) {
			sendFile(file);
		}
		else System.out.println("Brak pliku!");
	}
	private void sendFile(File file) {
		FileManager fm=new FileManager(file,true);
		String b64;
		while((b64=fm.getPartOfFileInBase64())!=null) {
			cliclient.SendMessage("type:transfer_out#username:"+user.getUsername()+"#nazwa_pliku:"+file.getName()+"#nr_pierwszego_bajtu:"+fm.getFirstByte()+"#offset:"+fm.getBytes()+"##"+b64);
			System.out.println(cliclient.listentToAnswer());
		}
		cliclient.SendMessage("type:transfer_out#status:stop");
		System.out.println(cliclient.listentToAnswer());
		System.out.println("Plik zostal wyslany!");
		fm.closeStreams();
	}
	private void PobieraniePliku() {
		if(!user.isUserLoggedIn()) {
			System.out.println("Uzytkownik nie jest zalogowany!");
			return;
		}
		
		System.out.println("Podaj nazwe pliku:");
		String filename=sc.next();
		cliclient.SendMessage("type:transfer_in#username:"+user.getUsername()+"#nazwa_pliku:"+filename);
		String answ = cliclient.listentToAnswer();
		if(!answ.equals("type:transfer_in#status:err")) {
			saveFile(answ);
		}
		else System.out.println(answ);
		
	}
	private void saveFile(String answ) {
		String [] tab = answ.split("#");
		FileManager fm= new FileManager(tab[1].substring(12),false);
		do {
			fm.savePartOfFile(tab[5],Integer.parseInt(tab[2].substring(20)) , Integer.parseInt(tab[3].substring(7)));
			answ = cliclient.listentToAnswer();
			tab = answ.split("#");
    	}
    	while(!answ.equals("type:transfer_in#status:stop"));
		fm.closeStreams();
		System.out.println("Plik zostal zapisany.");
	}
	private void Wyloguj() {
		user.LogOut();
		System.out.println("Wylogowano!");
	}
	private void Wyjscie() {
		koniec=true;
		sc.close();
		cliclient.closeEverything();
		System.exit(0);
	}
	private void man() {
		System.out.println("Rejestracja -> Pozwala zarejestrowac sie nowemu uzytkownikowi.\n"
				+ "Logowanie -> Pozwala uzytkownikowi zalogowac sie na istniejace konto. \n"
				+ "Tablica -> Wyswietla ostatnie 10 postow z czatu.\n"
				+ "Czat -> Umozliwia zalogowanemu uzytkownikowi wysylanie wiadomosci do czatu. \n"
				+ "Transfer in -> Umozliwia zalogowanemu uzytkownikowi wysylanie pliku na serwer dyskowy. \n"
				+ "Transfer out -> Umozliwia zalogowanemu uzytkownikowi pobieranie pliku z serwera dyskowego. \n"
				+ "Wylogowanie -> Wylogowuje zalogowanego uzytkownika. \n"
				+ "Wyjscie -> Zamyka aplikacje. \n");
	}
	
}
