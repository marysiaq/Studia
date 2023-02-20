import java.io.BufferedReader;
	import java.io.IOException;
	import java.io.InputStreamReader;
	import java.io.PrintStream;
	import java.net.ServerSocket;
	import java.net.Socket;
public class CzatSerwer {
		Socket socket;
	    BufferedReader in;
	    PrintStream out;
		 void runServer() throws IOException {
		        ServerSocket server = new ServerSocket(1600);
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
			 String [] tab=data.split("#");
             if(zapiszWiadmosc(tab[1].substring(9),tab[2].substring(10)))send("type:czat#status:ok");
             else send("type:czat#status:err");
		 }
		 void closeConnection() throws IOException {
			 in.close();
	         out.close();
	         socket.close();
		 }
		 void send(String data) {
	         out.println(data);
	     }
		 boolean zapiszWiadmosc(String nazwa, String wiadmosc) {
	     	ObslugaBD bd= new ObslugaBD();
	     		if( bd.ZapiszWiadomoscDoBD(nazwa, wiadmosc)) {
	     			bd.closeEverything();
	     			return true;
	     		}
	     	
	     	bd.closeEverything();
	     	return false;
	     }
	     
		 public static void main(String[] args) {
	         try {
	             new CzatSerwer().runServer();
	         } catch (IOException e) {
	             System.out.println(e);
	         }
	     }
	}


