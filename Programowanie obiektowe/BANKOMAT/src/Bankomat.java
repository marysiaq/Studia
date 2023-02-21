import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.Serializable;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import javax.swing.JOptionPane;



public class Bankomat implements Pliki, Serializable, SprawdzStan {
	private int  sz200, sz100, sz50, sz20,sz10, kwota_w_bankomoacie;
	private static String id_bankomatu="S1AW2680";
	private  int nr_operacji;
	private boolean czy_awaria;
	
	
	public Bankomat() {
		try {
			
			File plik=new File("banknoty.txt");
			FileReader czytelnikP=new FileReader(plik);
			BufferedReader czytelnik= new BufferedReader(czytelnikP);
			String wiersz=null;
			String [] banknotySztuki;
			
			while((wiersz =czytelnik.readLine())!=null) {
				banknotySztuki=wiersz.split(" ");
				sz200=Integer.parseInt(banknotySztuki[0]);
				sz100=Integer.parseInt(banknotySztuki[1]);
				sz50=Integer.parseInt(banknotySztuki[2]);
				sz20=Integer.parseInt(banknotySztuki[3]);
				sz10=Integer.parseInt(banknotySztuki[4]);
				nr_operacji=Integer.parseInt(banknotySztuki[5]);
				
			}
			
			kwota_w_bankomoacie =(sz200*200)+(sz100*100)+(sz50*50)+(sz20*20)+(sz10*10);

		}
		catch(FileNotFoundException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
		} 
		catch (IOException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			//e.printStackTrace();
		}
		
		if(((int)(Math.random()*3)+1)==1)czy_awaria=true;
		else czy_awaria= false;
	}
	private  ArrayList<Integer> ileJakichBanknotow(int kwota) {
		int [] n= {200,100,50,20,10};
		
		ArrayList <Integer> wynik= new ArrayList<Integer>();
		for (int i=0; i<n.length; i++) {
			wynik.add((int)(kwota / n[i]));
			kwota -= wynik.get(i) * n[i];
		}
		
		return wynik;
		
	}
		
		
	
	private void wydajPieniadze(int kwota)  {
		
		ArrayList<Integer> a=ileJakichBanknotow(kwota);
		
		sz200=sz200-a.get(0);
		sz100=sz100-a.get(1);
		sz50=sz50-a.get(2);
		sz20=sz20-a.get(3);
		sz10=sz10-a.get(4);
		kwota_w_bankomoacie=kwota_w_bankomoacie-kwota;
		aktaualizujWPliku();
		
		
	}
	
	public void przyjmijPieniadze(ArrayList<Integer> banknoty,int kwota) {
		
		sz200+=banknoty.get(0);
		sz100+=banknoty.get(1);
		sz50+=banknoty.get(2);
		sz20+=banknoty.get(3);
		sz10+=banknoty.get(4);
		kwota_w_bankomoacie+=kwota;
		aktaualizujWPliku();
		
		
	}

	public String toString() {
		return "Bankomat [sz200=" + sz200 + ", sz100=" + sz100 + ", sz50=" + sz50 + ", sz20=" + sz20 + ", sz10=" + sz10 + ", kwota_w_bankomoacie=" + kwota_w_bankomoacie + "]";
	}



	public void aktaualizujWPliku() {
		try {
			File plik=new File("banknoty.txt");
			FileWriter czytelnikP=new FileWriter(plik);
			BufferedWriter zapisz= new BufferedWriter(czytelnikP);
			
			
			zapisz.write(sz200+" ");
			zapisz.write(sz100+" ");
			zapisz.write(sz50+" ");
			zapisz.write(sz20+" ");
			zapisz.write(sz10+" ");
			zapisz.write(nr_operacji+" ");
			
			zapisz.close();
	
		}
		catch(FileNotFoundException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			System.out.println(e1.getMessage()+"Brak Pliku");
		} 
		catch (IOException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			e.printStackTrace();
		}
	}



	
	
	
	public int getSz200() {
		return sz200;
	}
	public int getSz100() {
		return sz100;
	}
	public int getSz50() {
		return sz50;
	}
	public int getSz20() {
		return sz20;
	}
	public int getSz10() {
		return sz10;
	}
	public void setCzy_awaria(boolean czy_awaria) {
		this.czy_awaria = czy_awaria;
	}
	
	public boolean isCzy_awaria() {
		return czy_awaria;
	}
	
	
	

	@Override
	public void zapiszDoPliku() {
		// TODO Auto-generated method stub
		
	}
	@Override
	public Object znajdzWPilku() {
		
		return null;
	}
	private void drukujPotwierdzenieWyplaty(int kwota, Klient klient) {
		
		File plik= new File("potwierdzeniewyplaty.txt");
		Date date = new Date();
	    SimpleDateFormat dataa = new SimpleDateFormat("YYYY/MM/dd ");
	    SimpleDateFormat godz=new SimpleDateFormat("HH:mm");
	    String data= dataa.format(date);
	    String g=godz.format(date);
		try {
			
			PrintWriter zapis= new PrintWriter(plik);
			zapis.write("\t\t\t\tBANKOMAT\n");
			zapis.write("\tDATA\t\tGODZINA\t\tBANKOMAT\tOPERACJA\n");
			zapis.write("\t"+data+"\t"+g+"\t\t"+this.id_bankomatu+"\t"+this.nr_operacji+"\n");
			
			zapis.write("\n\t\t\tW Y P £ A T A  G O T Ó W K I\n");
			zapis.write("\tWYPLATA GOTOWKI Z RACHUNKU NR: **********************"+klient.getNumer_rachunku().substring(22)+"\n");
			zapis.write("\tNUMER KARTY: ************"+ klient.getKarta().getNumer_karty().substring(12)+"\n");
			zapis.write("\n\tKWOTA WYP£ACONA: "+String.format("%.2f",(float)kwota)+" PLN");
			zapis.write("\n\n\t\tDZIÊKUJEMY I ZAPRASZAMY PONOWNIE!");
			
			zapis.close();
		} catch (FileNotFoundException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			e.printStackTrace();
		}
	}
	private void drukujPotwierdzenieWplaty(int kwota, Klient klient, ArrayList<Integer> banknoty ) {
		
		File plik= new File("potwierdzeniewplaty.txt");
		Date date = new Date();
	    SimpleDateFormat dataa = new SimpleDateFormat("YYYY/MM/dd ");
	    SimpleDateFormat godz=new SimpleDateFormat("HH:mm");
	    String data= dataa.format(date);
	    String g=godz.format(date);
		try {
			
			PrintWriter zapis= new PrintWriter(plik);
			zapis.write("\t\t\t\tBANKOMAT\n");
			zapis.write("\tDATA\t\tGODZINA\t\tBANKOMAT\tOPERACJA\n");
			zapis.write("\t"+data+"\t"+g+"\t\t"+this.id_bankomatu+"\t"+this.nr_operacji+"\n");
			
			zapis.write("\n\t\t\tW P £ A T A  G O T Ó W K I\n");
			zapis.write("\tWPLATA PIENIEDZY NA RACHUNEK NR: **********************"+klient.getNumer_rachunku().substring(22)+"\n");
			zapis.write("\tNUMER KARTY: ************"+ klient.getKarta().getNumer_karty().substring(12)+"\n");
			zapis.write("\n\tKWOTA WP£ACONA: "+String.format("%.2f",(float)kwota)+" PLN\n");
			zapis.write("\t10 PLN\t*"+ banknoty.get(4)+"\t= "+10*banknoty.get(4)+"PLN\n");
			zapis.write("\t20 PLN\t*"+ banknoty.get(3)+"\t= "+20*banknoty.get(3)+"PLN\n");
			zapis.write("\t50 PLN\t*"+ banknoty.get(2)+"\t= "+50*banknoty.get(2)+"PLN\n");
			zapis.write("\t100 PLN\t*"+ banknoty.get(1)+"\t= "+100*banknoty.get(1)+"PLN\n");
			zapis.write("\t200 PLN\t*"+ banknoty.get(0)+"\t= "+200*banknoty.get(0)+"PLN\n");
			zapis.write("\n\n\t\tDZIÊKUJEMY I ZAPRASZAMY PONOWNIE!");
			
			zapis.close();
		} catch (FileNotFoundException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			System.out.println(e.getMessage());
		}
	}
	public void drukujStanKonta(Klient klient) {
		this.nr_operacji++;
		aktaualizujWPliku();
		File plik= new File("stankonta.txt");
		Date date = new Date();
	    SimpleDateFormat dataa = new SimpleDateFormat("YYYY/MM/dd ");
	    SimpleDateFormat godz=new SimpleDateFormat("HH:mm");
	    String data= dataa.format(date);
	    String g=godz.format(date);
		try {
			
			PrintWriter zapis= new PrintWriter(plik);
			zapis.write("\t\t\t\tBANKOMAT\n");
			zapis.write("\tDATA\t\tGODZINA\t\tBANKOMAT\tOPERACJA\n");
			zapis.write("\t"+data+"\t"+g+"\t\t"+this.id_bankomatu+"\t"+this.nr_operacji+"\n");
			
			zapis.write("\n\t\t\tS T A N  K O N T A \n");
			zapis.write("\tRACHUNEK NR: **********************"+klient.getNumer_rachunku().substring(22)+"\n");
			zapis.write("\tNUMER KARTY: ************"+ klient.getKarta().getNumer_karty().substring(12)+"\n");
			//float stan= klient.getStan_konta();
			zapis.write("\n\tDOSTÊPNE SALDO: "+String.format("%.2f", klient.getStan_konta())+" PLN\n");
			zapis.write("\n\n\t\tDZIÊKUJEMY I ZAPRASZAMY PONOWNIE!");
			
			zapis.close();
		} catch (FileNotFoundException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			System.out.println(e.getMessage());
		}
	}
	private void drukujPotwierdzenieDoladowania(Klient klient, int kwota,String numer, String siec) {
		
		
		File plik= new File("potwdoladowania.txt");
		Date date = new Date();
	    SimpleDateFormat dataa = new SimpleDateFormat("YYYY/MM/dd ");
	    SimpleDateFormat godz=new SimpleDateFormat("HH:mm");
	    String data= dataa.format(date);
	    String g=godz.format(date);
		try {
			
			PrintWriter zapis= new PrintWriter(plik);
			zapis.write("\t\t\t\tBANKOMAT\n");
			zapis.write("\tDATA\t\tGODZINA\t\tBANKOMAT\tOPERACJA\n");
			zapis.write("\t"+data+"\t"+g+"\t\t"+this.id_bankomatu+"\t"+this.nr_operacji+"\n");
			
			zapis.write("\n\t\tD O £ A D O W A N I E  T E L E F O N U  \n");
			zapis.write("\tRACHUNEK NR: **********************"+klient.getNumer_rachunku().substring(22)+"\n");
			zapis.write("\tNUMER KARTY: ************"+ klient.getKarta().getNumer_karty().substring(12)+"\n");
			//float stan= klient.getStan_konta();
			zapis.write("\n\tKWOTA DO£ADOWANIA: "+String.format("%.2f",(float) kwota)+" PLN\n");
			zapis.write("\n\tNR TELEFONU KOMÓRKOWEGO: "+numer+" \n");
			zapis.write("\n\tSIEÆ: "+siec+" \n");
			zapis.write("\n\n\t\tDZIÊKUJEMY I ZAPRASZAMY PONOWNIE!");
			
			zapis.close();
			
		} catch (FileNotFoundException e) {
			JOptionPane.showMessageDialog(null,e.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			System.out.println(e.getMessage());
		}
		
	}
	
	public boolean sprawdzStan(int kwota) {
		if(kwota>=this.kwota_w_bankomoacie) return false;
		ArrayList<Integer> a=ileJakichBanknotow(kwota);
		if(sz200<a.get(0)||sz100<a.get(1)||sz50<a.get(2)||sz20<a.get(3)||sz10<a.get(4))return false;
		return true;
	}
	
	
	public boolean czyMaloBanknotow() {
		if(sz200<10||sz100<10||sz50<10||sz20<10||sz10<10) {
			return true;
		}
		return false;
	}
	public void Wyplata(Klient klient, int kwota) throws ZaMaloBanknotowException, ZaMaloSrodkowNaKoncieException {
		if(klient.sprawdzStan(kwota)) {
			
			if(Main.bankomat.sprawdzStan(kwota)) {
				this.nr_operacji++;
				this.wydajPieniadze(kwota);
				this.drukujPotwierdzenieWyplaty(kwota,klient);
				
				klient.wyplacPieniadze(kwota);
				InneMetody.otworzPlik("potwierdzeniewyplaty.txt"); 
			}
			else {
				throw new ZaMaloBanknotowException("Za ma³o banknotów w banomacie!");
			}
		}
		else {
			throw new ZaMaloSrodkowNaKoncieException("Za ma³o œrodków na koncie!");
		}
	}
	
	public void Wplata(Klient klient, int kwota, ArrayList<Integer> banknoty) {
		this.nr_operacji++;
		klient.wplacPieniadze(kwota);
		przyjmijPieniadze(banknoty, kwota);
		drukujPotwierdzenieWplaty(kwota, klient, banknoty);
		InneMetody.otworzPlik("potwierdzeniewplaty.txt");
	}
	public void DoladowanieTelefonu(Klient klient, int kwota,String numer, String siec) throws ZaMaloSrodkowNaKoncieException {
		if(klient.sprawdzStan(kwota)) {
			this.nr_operacji++;
			klient.doladujTelefon(kwota);
			drukujPotwierdzenieDoladowania(klient, kwota, numer, siec);
			InneMetody.otworzPlik("potwdoladowania.txt");
		}
		else throw new ZaMaloSrodkowNaKoncieException("Za ma³o œrodków na koncie ¿eby do³adowaæ telefon! ");
	}
	
	
}
