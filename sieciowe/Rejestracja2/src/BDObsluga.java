import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class BDObsluga {
	Connection conn;
	Statement stm;
	ResultSet results;
	
	public BDObsluga() throws ClassNotFoundException{
		try {
			//Class.forName("com.mysql.cj.jdbc.Driver");
			conn=DriverManager.getConnection("jdbc:mysql://db:3306/uzytkownicy","root","root");
			//
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			System.out.println("DB not connected!");
			e.printStackTrace();
		}
		
		try {
			stm=conn.createStatement();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		
	}
	
	public boolean czyNazwaUzytkownikaJestZajeta(String nazwa, String haslo) {
		
		String sql="select * from uzytkownicy where nazwa='"+nazwa+"'";
		
		boolean records;
		try {
			results= stm.executeQuery(sql);
			records = results.next();
			return records;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return false;
	}
	public boolean Zarejestruj(String nazwa, String haslo) {
		String sql="insert into uzytkownicy (nazwa, haslo) values ('"+nazwa+"','"+haslo+"')";
		try {
			stm.executeUpdate(sql);	
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			return false;
			//e.printStackTrace();
		}
		return true;
	}
	public void closeEverything() {
		try {
			conn.close();
			stm.close();
			results.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	}

}
