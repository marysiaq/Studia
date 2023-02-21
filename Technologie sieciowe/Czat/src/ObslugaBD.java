import java.sql.Connection;
	import java.sql.DriverManager;
	import java.sql.ResultSet;
	import java.sql.SQLException;
	import java.sql.Statement;
public class ObslugaBD {
	

		Connection conn;
		Statement stm;
		//ResultSet results;
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
		public boolean ZapiszWiadomoscDoBD(String nazwa, String wiadmosc) {
			String sql="insert into czat (nazwa_uzytkownika, zawartosc) values ('"+nazwa+"','"+wiadmosc+"')";
			try {
				stm.executeUpdate(sql);	
			} catch (SQLException e) {
				e.printStackTrace();
				return false;
			}
			return true;
		}
		public void closeEverything() {
			try {
				conn.close();
				stm.close();
				//results.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}


