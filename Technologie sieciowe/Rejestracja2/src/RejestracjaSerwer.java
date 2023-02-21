import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;

public class RejestracjaSerwer {
	Socket socket;
    BufferedReader in;
    PrintStream out;
	 void runServer() throws IOException, ClassNotFoundException {
	        //tworzenie gniazda serwera
	        ServerSocket server = new ServerSocket(1400);
	        System.out.println("Server run ... ");

	        while (true) {
	        	acceptConnection(server.accept());
	            String data = getMessage();
	            provideService(data);
                closeConnection();
                
	        }
	        
	 }
	 void acceptConnection(Socket socket) throws IOException {
		 System.out.println("New client");
         this.socket = socket;
         this.in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
         this.out = new PrintStream(socket.getOutputStream());
	 }
	 String getMessage() throws IOException {
		 return in.readLine();
	 }
	 void provideService(String data) throws ClassNotFoundException{
		  String [] tab=data.split("#");
          if(zarejestruj(tab[1].substring(9),tab[2].substring(9)))send("type:rej#status:ok");
          else send("type:rej#status:err");
	 }
	 void closeConnection() throws IOException {
		 in.close();
         out.close();
         socket.close();
	 }
	 void send(String data) {
         out.println(data);
     }
	 boolean zarejestruj(String nazwa, String haslo) throws ClassNotFoundException {
     	BDObsluga bd= new BDObsluga();
     	if(!bd.czyNazwaUzytkownikaJestZajeta(nazwa, haslo)) {
     		if( bd.Zarejestruj(nazwa, haslo)) {
     			bd.closeEverything();
     			return true;
     		}
     	}
     	bd.closeEverything();
     	return false;
     }
     
	 public static void main(String[] args) throws ClassNotFoundException {
         try {
             new RejestracjaSerwer().runServer();
         } catch (IOException e) {
             System.out.println(e);
         }
     }
}
