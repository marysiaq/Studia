import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class ObslugaBD {
	Connection conn;
	Statement stm;
	ResultSet results;
	
	public ObslugaBD(){

		try {
			conn=DriverManager.getConnection("jdbc:mysql://localhost:3306/posty","root","");
			//
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
	public String zwrocWiadomosci() {
		String sql="select nazwa_uzytkownika, zawartosc from czat order by data desc limit 10 ";
		String zawartosc="";
		try {
			results=stm.executeQuery(sql);
			while(results.next()){
				zawartosc+="#"+results.getString("nazwa_uzytkownika")+"#"+results.getString("zawartosc");
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return zawartosc;
		
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
