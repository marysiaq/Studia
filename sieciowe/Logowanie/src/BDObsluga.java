import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class BDObsluga {
	Connection conn;
	Statement stm;
	ResultSet results;
	
	public BDObsluga(){
		try {
			conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/uzytkownicy","root","");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			System.out.println("DB not connected!");
		}
		try {
			stm=conn.createStatement();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	
	public boolean Logowanie(String nazwa, String haslo) {
		
		String sql="select * from uzytkownicy where nazwa='"+nazwa+"' and haslo='"+haslo +"'";
		
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
