import java.io.EOFException;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.ArrayList;

import javax.swing.JOptionPane;

public class Serwisant extends Osoba implements  Serializable,Pliki, PotwierdzeniePinu {
	private String kod_dostepu, pin;

	public Serwisant(String imie, String nazwisko,String kod_dostepu, String pin) {
		super(imie, nazwisko);
		this.kod_dostepu = kod_dostepu;
		this.pin = pin;
	}

	public Serwisant() {
	}
	
	public void naprawAwarie(Bankomat bankomat) {
		if(bankomat.isCzy_awaria()) {
			bankomat.setCzy_awaria(false);
			JOptionPane.showMessageDialog(null,"Awaria zosta³a naprawiona pomyœlnie!", "Informacja", JOptionPane.INFORMATION_MESSAGE);
		}
		else JOptionPane.showMessageDialog(null,"Bankomat nie wymaga naprawy!", "Informacja", JOptionPane.INFORMATION_MESSAGE);
	}
	public void uzupelnijBanknoty(Bankomat bankomat) {
		if(bankomat.czyMaloBanknotow()) {
			ArrayList<Integer> banknoty=new ArrayList<Integer> ();
			banknoty.add(0);
			banknoty.add(0);
			banknoty.add(0);
			banknoty.add(0);
			banknoty.add(0);
			if(bankomat.getSz200()<10)banknoty.set(0, 100);
			if(bankomat.getSz100()<10)banknoty.set(1, 100);
			if(bankomat.getSz50()<10)banknoty.set(2, 100);
			if(bankomat.getSz20()<10)banknoty.set(3, 100);
			if(bankomat.getSz10()<10)banknoty.set(4, 100);
			int kwota=(200*banknoty.get(0))+(100*banknoty.get(1))+(50*banknoty.get(2))+(20*banknoty.get(3))+(10*banknoty.get(4));
			bankomat.przyjmijPieniadze(banknoty, kwota);
			JOptionPane.showMessageDialog(null,"Banknoty zosta³y uzupe³nione pomyœlnie!", "Informacja", JOptionPane.INFORMATION_MESSAGE);
		}
		else JOptionPane.showMessageDialog(null,"Bankomat nie wymaga uzupe³nienia banknotów!", "Informacja", JOptionPane.INFORMATION_MESSAGE);

	}

	public boolean PotwierdzPin (String Pin) {
		if(this.pin.equals(Pin)) return true;
		return false;
		
	}


	public Object znajdzWPilku() {
		try {
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("serwisanci.dat"));
			Serwisant b;
			while((b=(Serwisant)odczytaj.readObject())!=null) {
				
				System.out.println(b.toString());
				if(this.getKod_dostepu().equals(b.getKod_dostepu())) {
					
					return b;
				}
				
			}
			odczytaj.close();
		}catch(EOFException e1) {
			return null;
		}catch(IOException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			e.printStackTrace();
			
		} catch (ClassNotFoundException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			e.printStackTrace();
		}

		return null;
	}
		



	public void aktaualizujWPliku() {
		
	}


	public void zapiszDoPliku() {
		ArrayList<Serwisant> pom=new ArrayList<Serwisant>();
		try {
			
			
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("serwisanci.dat"));
			Serwisant a;
			while((a=(Serwisant)odczytaj.readObject())!=null) {
				pom.add(a);
				System.out.println(a.toString());
			}
			odczytaj.close();
			
			
		}catch(EOFException e1){
			try {
				pom.add(this);
			
				ObjectOutputStream zapisz =new ObjectOutputStream(new FileOutputStream("serwisanci.dat"));
				for(Serwisant k:pom) {
				zapisz.writeObject(k);
				}
				zapisz.close();
				System.out.println("zapisa³o sie");
				
			}catch(IOException e2) {
				JOptionPane.showMessageDialog(null,e2.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);

				e1.printStackTrace();
			}
				
		}
		catch(IOException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);

			e1.printStackTrace();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);

			e.printStackTrace();
		}
		
	}

	@Override
	public String toString() {
		return "Serwisant [kod_dostepu=" + kod_dostepu + ", pin=" + pin + "]";
	}

	public String getKod_dostepu() {
		return kod_dostepu;
	}

	public String getPin() {
		return pin;
	}

	public void setKod_dostepu(String kod_dostepu) {
		this.kod_dostepu = kod_dostepu;
	}

	public void setPin(String pin) {
		this.pin = pin;
	}
	
	
}
