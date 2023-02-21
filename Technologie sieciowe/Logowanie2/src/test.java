
public class test {

	public static void main(String[] args) {
		BDObsluga bd = new BDObsluga ();
		System.out.println(bd.Logowanie("eeee","rrrr"));
		bd.closeEverything();
	}

}
