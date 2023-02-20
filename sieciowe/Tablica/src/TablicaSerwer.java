import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;

public class TablicaSerwer {
	Socket socket;
    BufferedReader in;
    PrintStream out;
	 void runServer() throws IOException {
	        ServerSocket server = new ServerSocket(1700);
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
	 void provideService(String data){
		 send("type:tablica"+wiadomosci());
	 }
	 void closeConnection() throws IOException {
		 in.close();
         out.close();
         socket.close();
	 }
	 void send(String data) {
         out.println(data);
     }
	 public String wiadomosci() {
		 ObslugaBD bd= new ObslugaBD();
  		 String wiadomosci=bd.zwrocWiadomosci();
  		 bd.closeEverything();
  		 return wiadomosci;
	 }
	 
     
	 public static void main(String[] args) {
         try {
             new TablicaSerwer().runServer();
         } catch (IOException e) {
             System.out.println(e);
         }
     }
}
