import java.io.EOFException;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.ArrayList;

import javax.swing.JOptionPane;

public class Karta implements Serializable, Pliki, PotwierdzeniePinu {
	private String numer_karty, PIN;
	private int proby;
	private Klient wlascicel;
	
	

	public Karta(String numer_karty, String pIN) {
		this.numer_karty = numer_karty;
		PIN = pIN;
		this.proby = 0;
		
	}
	

	public Karta() {
	}
	


	public void aktaualizujWPliku() {
		ArrayList<Klient> pom=new ArrayList<Klient>();
		try {
			
			
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("klienci.dat"));
			Klient a;
			while((a=(Klient)odczytaj.readObject())!=null) {
				if(a.getKarta().equals(this)) {
					pom.add(this.wlascicel);
				}
				else {
					pom.add(a);
				}
				System.out.println(a.toString());
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



	public String getNumer_karty() {
		return numer_karty;
	}


	public String getPIN() {
		return PIN;
	}


	public int getProby() {
		return proby;
	}


	public Klient getWlascicel() {
		return wlascicel;
	}


	public void setNumer_karty(String numer_karty) {
		this.numer_karty = numer_karty;
	}


	public void setPIN(String pIN) {
		PIN = pIN;
	}


	public void setProby(int proby) {
		this.proby = proby;
	}


	public void setWlascicel(Klient wlascicel) {
		this.wlascicel = wlascicel;
	}


	public boolean PotwierdzPin (String Pin) {
		if(this.PIN.equals(Pin)&&proby<3) {
			
			return true;
		}
		else if (!this.PIN.equals(Pin)) {
			proby++;
			aktaualizujWPliku();
			 JOptionPane.showMessageDialog(null,"Niprawid³owy pin!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);

		}
		if(proby>=3)JOptionPane.showMessageDialog(null,"Zbyt wiele prób! Udaj siê do odzia³u banku aby odblokowaæ kartê!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
		return false;
		
	}


	@Override
	public void zapiszDoPliku() {
		
		
	}


	@Override
	public Object znajdzWPilku() {
		try {
			ObjectInputStream  odczytaj = new ObjectInputStream (new FileInputStream("klienci.dat"));
			Klient b;
			while((b=(Klient)odczytaj.readObject())!=null) {
				
				System.out.println(b.toString());
				if(this.getNumer_karty().equals(b.getKarta().getNumer_karty())) {
					
					return b.getKarta();
				}
				
			}
			odczytaj.close();
		}catch(EOFException e) {
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

	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Karta other = (Karta) obj;
		if (numer_karty == null) {
			if (other.numer_karty != null)
				return false;
		} else if (!numer_karty.equals(other.numer_karty))
			return false;
		return true;
	}
	
	
}
