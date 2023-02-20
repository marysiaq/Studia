import java.io.EOFException;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.ArrayList;

import javax.swing.JOptionPane;

public class Klient extends Osoba implements Serializable, Pliki, SprawdzStan{
	private float stan_konta;
	private String numer_rachunku;
	private Karta karta;
	
	public Klient(String imie, String nazwisko,float stan_konta, String numer_rachunku, Karta karta) {
		super(imie, nazwisko);
		this.stan_konta = stan_konta;
		this.numer_rachunku = numer_rachunku;
		this.karta = karta;
		karta.setWlascicel(this);
	}

	public Klient() {
	}
	
	
	public void wyplacPieniadze(int kwota) {
		this.stan_konta=this.stan_konta-(float)	kwota;
		aktaualizujWPliku();
	}
	public void wplacPieniadze(int kwota) {
		stan_konta+=(float)kwota;
		aktaualizujWPliku();
	}
	public void doladujTelefon(int kwota) {
		this.stan_konta=this.stan_konta-(float)	kwota;
		aktaualizujWPliku();
	}

	public void aktaualizujWPliku() {
		ArrayList<Klient> pom=new ArrayList<Klient>();
		try {
			
			
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("klienci.dat"));
			Klient a;
			while((a=(Klient)odczytaj.readObject())!=null) {
				if(this.numer_rachunku.equals(a.numer_rachunku)) {
					pom.add(this);
				}
				else {
					pom.add(a);
				}
			}
			odczytaj.close();
			
			
		}catch(EOFException e1){
			try {	
				ObjectOutputStream zapisz =new ObjectOutputStream(new FileOutputStream("klienci.dat"));
				for(Klient k:pom) {
				zapisz.writeObject(k);
				}
				zapisz.close();
				System.out.println("zapisa³o sie");
				
			}catch(IOException e2) {
				e1.printStackTrace();
				JOptionPane.showMessageDialog(null,e2.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
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

	public Object znajdzWPilku() {
		
			try {
				ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("klienci.dat"));
				Klient b;
				while((b=(Klient)odczytaj.readObject())!=null) {
					
					System.out.println(b.toString());
					if(this.getKarta().equals(b.getKarta())) {
						
						return b;
					}
					
				}
				odczytaj.close();
			}catch(EOFException e) {
				return null;
			}catch(IOException e) {
				e.printStackTrace();
				JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			} catch (ClassNotFoundException e) {
				JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
				e.printStackTrace();
			}
		

		return null;
	}

	public void zapiszDoPliku() {
		ArrayList<Klient> pom=new ArrayList<Klient>();
		try {
			
			
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("klienci.dat"));
			Klient a;
			while((a=(Klient)odczytaj.readObject())!=null) {
				pom.add(a);
				System.out.println(a.toString());
			}
			odczytaj.close();
			
			
		}catch(EOFException e1){
			try {
				pom.add(this);
			
				ObjectOutputStream zapisz =new ObjectOutputStream(new FileOutputStream("klienci.dat"));
				for(Klient k:pom) {
				zapisz.writeObject(k);
				}
				zapisz.close();
				System.out.println("zapisa³o sie");
				
			}catch(IOException e2) {
				e1.printStackTrace();
				JOptionPane.showMessageDialog(null,e2.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			}
				
		}
		catch(IOException e1) {
			e1.printStackTrace();
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			e.printStackTrace();
		}
	}

	public String toString() {
		return "Klient [stan_konta=" + stan_konta + ", numer_rachunku=" + numer_rachunku + "]";
	}

	public float getStan_konta() {
		return stan_konta;
	}

	public String getNumer_rachunku() {
		return numer_rachunku;
	}

	public Karta getKarta() {
		return karta;
	}

	public void setStan_konta(float stan_konta) {
		this.stan_konta = stan_konta;
	}

	public void setNumer_rachunku(String numer_rachunku) {
		this.numer_rachunku = numer_rachunku;
	}

	public void setKarta(Karta karta) {
		this.karta = karta;
	}

	

	@Override
	public boolean sprawdzStan(int kwota) {
		if(kwota<=this.stan_konta) return true;
		return false;
	}


	
	
	
}
