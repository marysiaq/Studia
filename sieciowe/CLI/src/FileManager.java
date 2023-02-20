import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Base64;

public class FileManager {
	private int firstByte;
	private int Bytes;
	private File file;
	private BufferedInputStream bis;
	private BufferedOutputStream bos;
	
	public FileManager(String filename, boolean mode){//true->odczyt pliku; false->zapis Pliku
		firstByte=0;
		try {
			file= new File("C:/Users/bm01/eclipse-workspace/CLI/Pliki/"+filename);
			
			if(mode)bis = new BufferedInputStream(new FileInputStream(file));
			else bos = new BufferedOutputStream(new FileOutputStream(file));
			
		} catch (FileNotFoundException e) {
			System.out.println("B³¹d w odczytywaniu pliku!!");
		}
	}
	public FileManager(File file, boolean mode) {
		firstByte=0;
		try {
			if(mode)bis = new BufferedInputStream(new FileInputStream(file));
			else
				bos = new BufferedOutputStream(new FileOutputStream(file));
			
		} catch (FileNotFoundException e) {
			System.out.println("B³¹d w odczytywaniu pliku!!");
		}
	}
	public boolean fileExist() {
		if(file.exists())return true;
		return false;
	}
	public String getPartOfFileInBase64() {
		 byte  [] data = new byte [512] ;
		 try {
			if(( Bytes=bis.read(data))>0) {
				firstByte+=Bytes;	
				return Base64.getEncoder().encodeToString(data);
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
		 return null;
	}
	public void savePartOfFile(String datainBase64String,int lastByte,int Bytes1) {
		byte [] data =Base64.getDecoder().decode(datainBase64String);
		try {
			bos.write(data,0,Bytes1);
			this.firstByte=this.firstByte+Bytes1;
			Bytes=Bytes1;
			
		} catch (IOException e) {
			e.printStackTrace();
		}
		
	}
	public int getFirstByte() {
		return firstByte;
	}
	public int getBytes() {
		return Bytes;
	}

	public void closeStreams() {
		
		try {
			if(bis!=null)bis.close();
			if(bos!=null)bos.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	
	
	
	
	
}
