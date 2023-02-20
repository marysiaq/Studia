import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.Socket;
import java.net.UnknownHostException;

public class CLIClient {
	private Socket socket;
    private BufferedReader in;
    private PrintStream out;

    
    public CLIClient() {
    	try {
            this.socket =new Socket("localhost", 2000);
            this.in =  new BufferedReader(new InputStreamReader(socket.getInputStream()));
            this.out = new PrintStream(socket.getOutputStream());

        } catch (UnknownHostException e) {
            System.err.print("Nieznany Host");
        } catch (Exception e) {
           e.printStackTrace();
        }
    }    
    public void SendMessage(String message) {
    	out.println(message);
    }
    public String listentToAnswer()  {
    	String data="";
    	try {
    		 data = in.readLine();
    	}catch(IOException e) {
    		e.printStackTrace();
    	}
    	return data;
    }
    public void closeEverything() {
    	try {
            in.close();
            out.close();
            socket.close();
        } catch (IOException e) {
            System.err.println("Problemy z zamknieciem strumieni lub polaczenia");
            e.printStackTrace();
        }
    }
}
