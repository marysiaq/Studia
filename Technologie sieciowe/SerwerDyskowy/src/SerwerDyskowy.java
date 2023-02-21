import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;



public class SerwerDyskowy {
	Socket socket;
    BufferedReader in;
    PrintStream out;
	 void runServer() throws IOException {
	        ServerSocket server = new ServerSocket(8000);
	        System.out.println("Server run ... ");
	        while (true) {
	        	acceptConnection(server.accept());
	            String data = getMessage();
	            provideService(data);
                closeConnection();
	        }  
	 }
	 void send(String data) {
         out.println(data);
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
		 if(data.startsWith("type:transfer_out")) {
         	send("type:transfer_out#status:ok");
         	saveFile(data);
         }
         else if(data.startsWith("type:transfer_in")) {
         	String [] tab = data.split("#");
         	File file = new File ("C:/Users/bm01/eclipse-workspace/SerwerDyskowy/Pliki/"+tab[2].substring(12));
         	if(file.exists())sendFile(file);
         	else send("type:transfer_in#status:err");
         }
	 }
	 void closeConnection() throws IOException {
		 in.close();
         out.close();
         socket.close();
	 }
	 private void saveFile(String data) {
		String [] tab= data.split("#");
     	FileManager fm=new FileManager(tab[2].substring(12),false);
     	
     	while(!data.equals("type:transfer_out#status:stop")) {
         	fm.savePartOfFile(tab[tab.length-1],Integer.parseInt(tab[tab.length-4].substring(20)) , Integer.parseInt(tab[tab.length-3].substring(7)));
			try {
				data = in.readLine();
				tab= data.split("#");
			} catch (IOException e) {
				send("type:transfer_out#status:err");
			}
     		send("type:transfer_out#status:ok");
     	}
     	fm.closeStreams();
	 }
	 private void sendFile(File file){
		 //send("type:transfer_in#status:ok");
		 FileManager fm = new FileManager(file,true);
		 String b64;
			while((b64=fm.getPartOfFileInBase64())!=null) {
				send("type:transfer_in#nazwa_pliku:"+file.getName()+"#nr_pierwszego_bajtu:"+fm.getFirstByte()+"#offset:"+fm.getBytes()+"##"+b64);
			}
			send("type:transfer_in#status:stop");
		fm.closeStreams();
	 }
	 public static void main(String[] args) {
         try {
             new SerwerDyskowy().runServer();
         } catch (IOException e) {
             System.out.println(e);
         }
     }
}
