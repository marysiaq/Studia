package APi;
import java.io.*;
import java.net.*;
import java.util.*;

public class MultiServer {

    List<ClientThread> clientList = new ArrayList<>();
    void runServer() throws IOException {
        ServerSocket server = new ServerSocket(2000);
        System.out.println("Server run ... ");
        while (true) {
            Socket socket = server.accept();
            System.out.println("New client");
            ClientThread thread = new ClientThread(socket);
            clientList.add(thread);
        }
    }
    void sendToAll(String data) {
        clientList.forEach(t -> t.send(data));
    }
    public static void main(String[] args) {
        try {
            new MultiServer().runServer();
            System.out.println("api");
        } catch (IOException e) {
            System.out.println(e);
        }
    }
    class ClientThread extends Thread {

        Socket socket;
        BufferedReader in;
        PrintStream out;

        ClientThread(Socket socket) throws IOException {
            this.socket = socket;
            this.in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            this.out = new PrintStream(socket.getOutputStream());
            start();
        }
        public void run() {
            try {
                while (isInterrupted() == false) {
                    String data;
                    data=in.readLine();
                    System.out.println(data);
                    
                    if(data==null) {
                    	throw new IOException();
                    }
                    if(data.startsWith("type:rej")) {
                    	contactTo("localhost",1000,data);
                    }
                    else if(data.startsWith("type:log")) {
                    	contactTo("localhost",1500,data);
                    }
                    else if(data.startsWith("type:tablica")) {
                    	contactTo("localhost",1700,data);
                    }
                    else if(data.startsWith("type:czat")) {
                    	contactTo("localhost",1600,data);
                    }
                    else if(data.startsWith("type:transfer_out")) {
                    	fileTransferOut(data);
                    }
                    else if(data.startsWith("type:transfer_in")) {
                    	fileTransferIn(data);
                    }
                }
            } catch (IOException e) {
               
            } finally {
                try {
                    in.close();
                    out.close();
                    socket.close();
                    System.out.println("Roz³¹czono klienta!");
                } catch (IOException e) {
                    System.err.println("Problemy z zamkniêciem strumieni lub po³¹czenia");
                    e.printStackTrace();
                }
            }
        }
        void contactTo(String ip, int port, String data) {
        	ServerConnection mc= new ServerConnection(ip,port);
        	mc.sendMessage(data);
        	String answ=mc.getAnswer();
    		send(answ);
    		mc.closeConnection();
        }
        void fileTransferOut(String data) throws IOException {
        	ServerConnection mc= new ServerConnection("localhost",8000);
        	do {
        		mc.sendMessage(data);
        		String answ=mc.getAnswer();
        		send(answ);
        		data=in.readLine();
        	}
        	while(!data.equals("type:transfer_out#status:stop"));
        	mc.sendMessage(data);
        	String answ=mc.getAnswer();
    		send(answ);
        	mc.closeConnection();
        }
        void fileTransferIn(String data) {
        	ServerConnection mc= new ServerConnection("localhost",8000);
        	mc.sendMessage(data);
        	String answ=mc.getAnswer();
    		send(answ);
    		if(!answ.equals("type:transfer_in#status:err")) {
    			do {
            		answ=mc.getAnswer();
            		send(answ);
            	}
            	while(!answ.equals("type:transfer_in#status:stop"));
    		}
        	mc.closeConnection();
        }
        void send(String data) {
            out.println(data);
        }

    }

}