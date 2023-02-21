import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.List;





public class Rejestracja {
	List<ClientThread> clientList = new ArrayList<>();

    /**
     * Metoda uruchamiajaca serwer
     */
    void runServer() throws IOException {
        //tworzenie gniazda serwera
        ServerSocket server = new ServerSocket(1000);

        System.out.println("Server run ... ");

        while (true) {

            //Akceptacja polaczenia;
            Socket socket = server.accept();
            System.out.println("New client");

            //Tworzenie watku obsugujacego klienta
            ClientThread thread = new ClientThread(socket);
            //dodawanie watku do listy
            clientList.add(thread);
        }

        }
        void sendToAll(String data) {
            clientList.forEach(t -> t.send(data));
        }

        /**
         * Glowna metoda programu
         */
        public static void main(String[] args) {
            try {
                new Rejestracja().runServer();
            } catch (IOException e) {
                System.out.println(e);
            }
        }
        class ClientThread extends Thread {

            Socket socket;
            BufferedReader in;
            PrintStream out;


            /**
             * @param socket - zaakceptowanie polaczenie z klientem
             */
            ClientThread(Socket socket) throws IOException {

                this.socket = socket;

                // pobieranie strumieni
                this.in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
                this.out = new PrintStream(socket.getOutputStream());
                //uruchamianie watku
                start();
            }

            /**
             * Nadpisana metoda w ciele której znajduja sie instrukcje
             * wymagajace wykonania w osobnym w¹tku
             */
            public void run() {

                try {
                    while (isInterrupted() == false) {
                        //czytanie ze strumienia
                        String data = in.readLine();
                        
                        String [] tab=data.split(" ");
                                              
                        System.out.println(data);
                        
                        if(zarejestruj(tab[0],tab[1]))send("ok");
                        else send("err");
                        
                    }

                } catch (IOException e) {
                    e.printStackTrace();
                } finally {
                    try {
                        in.close();
                        out.close();
                        socket.close();
                    } catch (IOException e) {
                        System.err.println("Problemy z zamkniêciem strumieni lub po³¹czenia");
                        e.printStackTrace();
                    }
                }
            }

            /**
             * Metoda wysylajaca odpowiedz do klienta
             *
             * @param data - dane do wyslania
             */
            void send(String data) {
                //wysylanie danych
                out.println(data);
            }
            
            boolean zarejestruj(String nazwa, String haslo) {
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

        }
        

}
