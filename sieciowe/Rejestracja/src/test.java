
public class test {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		BDObsluga bd= new BDObsluga();
		System.out.println(bd.czyNazwaUzytkownikaJestZajeta("asda", "asdf"));
		bd.Zarejestruj("aaaa", "abbb");
		bd.closeEverything();
		

	}

}
