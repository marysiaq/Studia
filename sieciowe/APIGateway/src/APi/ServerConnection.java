package APi;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.UnknownHostException;

public class ServerConnection {
	private Socket socket;
	private BufferedReader br;
	private BufferedWriter bw;
	
	public ServerConnection(String ip, int port){
		try {
			socket=new Socket(ip, port);
			bw=new BufferedWriter(new OutputStreamWriter(socket.getOutputStream()));
	    	br=new BufferedReader(new InputStreamReader(socket.getInputStream()));
		} catch (UnknownHostException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
    	
	}
	public void sendMessage(String message) {
		try {
			bw.write(message);
			bw.newLine();
			bw.flush();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	public String getAnswer() {
		String odp=null;
		try {
			odp=br.readLine();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return odp;
	}
	public void closeConnection() {
		try {
			bw.close();
			br.close();
	    	socket.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

}
