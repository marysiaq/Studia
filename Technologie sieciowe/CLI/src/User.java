
public class User {
    private boolean state;
    private String username;
    
    public User() {
    	state =false;
    	username= null;
    }
    public void LogIn(String username) {
    	this.state=true;
    	this.username=username;
    	 
    }
    public void LogOut() {
    	this.state=false;
    	this.username=null;
    }
    public boolean isUserLoggedIn() {
    	return state;
    }
    public String getUsername() {
    	return username;
    }
}
