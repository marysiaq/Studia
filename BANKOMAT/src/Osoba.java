import java.io.Serializable;

public abstract class Osoba implements Serializable {
	private String imie, nazwisko;

	public Osoba(String imie, String nazwisko) {
		this.imie = imie;
		this.nazwisko = nazwisko;
	}

	public Osoba() {
	}

	public String getImie() {
		return imie;
	}

	public String getNazwisko() {
		return nazwisko;
	}

	
	
}
