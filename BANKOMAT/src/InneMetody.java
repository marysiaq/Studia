import java.awt.Desktop;
import java.io.File;
import java.io.FileNotFoundException;

public class InneMetody {
	public static boolean sprawdzFormatKwoty(String kwota) {
		if(kwota.equals("")) {
			return false;
		}
		if(kwota.charAt(kwota.length()-1)!='0') {
			return false;
		}
		for(int i =0; i<kwota.length();i++) {
			if((int)kwota.charAt(i)<48&&(int)kwota.charAt(i)>57) {
				return false;
			}
		}
		
		return true;
		
	}
	public static void otworzPlik(String nazwaPliku) {
		try  
		{  
		
			File file = new File(nazwaPliku);   
			if(!Desktop.isDesktopSupported())
			{  
				System.out.println("not supported");  
			 
			}  
			Desktop desktop = Desktop.getDesktop();  
			if(file.exists())         
				desktop.open(file);              
			} 
		catch(FileNotFoundException e1) {
			System.out.println(e1.getMessage());
		}
		catch(Exception e1)  
		{  
			System.out.println(e1.getMessage()); 
		} 
	}
	public static boolean sprawdzFormatNumerTelefonu(String numer)  {
		if(numer.equals("")) {
			return false;
		}
		for(int i =0; i<numer.length();i++) {
			if((int)numer.charAt(i)<48&&(int)numer.charAt(i)>57) {
				
				return false;
			}
		}
		if(numer.length()!=9) {
			return false; 
		}
		return true;
		
	}
	public static boolean sprawdzFormatNumerRachunku(String numerRachunku) {
		if(numerRachunku.length()!=26) {
			return false;
		}
		for(int i =0; i<numerRachunku.length();i++) {
			if((int)numerRachunku.charAt(i)<48&&(int)numerRachunku.charAt(i)>57) {
				
				return false;
			}
		}
		
		return true;
	}
	public static boolean sprawdzFormatPin(String pin) {
		if(pin.length()!=4) {
			System.out.println("xd");
			return false;
		}
		for(int i =0; i<pin.length();i++) {
			if((int)pin.charAt(i)<48&&(int)pin.charAt(i)>57) {
				
				return false;
			}
		}
		return true;
	}
	public static boolean sprawdzFormatNumerKarty(String numer) {
		
		for(int i =0; i<numer.length();i++) {
			if((int)numer.charAt(i)<48&&(int)numer.charAt(i)>57) {
				
				return false;
			}
		}
		if(numer.length()!=16) {
			return false; 
		}
		return true;
	}
	public static boolean sprawdzCzyLitery(String ciagznakow) {
		for(int i =0; i<ciagznakow.length();i++) {
			if(!(((int)ciagznakow.charAt(i)<91&&(int)ciagznakow.charAt(i)>64)||((int)ciagznakow.charAt(i)<123&&(int)ciagznakow.charAt(i)>60))) {
				//
				return false;
			}
		}
		return true;
	}
}
