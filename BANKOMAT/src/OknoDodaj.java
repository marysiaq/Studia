import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;


public class OknoDodaj  extends JFrame implements ActionListener{
	JTextField tfimie, tfnazwisko, tfnr_rachunku, tfstankonta, tfnumerkarty, tfpink,tfpins, tfkoddostepu;
	JButton dodaj_serwisanta, dodaj_klienta;
	JLabel limie, lnazwisko, lnr_rachunku, lstankonta, lnumerkarty, lpins, lpink,lkoddostepu,info1, info2;
	OknoDodaj(){
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(350,600);
		setLayout(new FlowLayout());
		add(limie=new JLabel("Imie:"));
		add(tfimie=new JTextField(30));
		add(lnazwisko=new JLabel("Nazwisko:"));
		
		add(tfnazwisko=new JTextField(30));
		add(info1=new JLabel("               	         Dane dla klienta:                          "));
		add(lnr_rachunku=new JLabel("Numer Rachunku:"));
		add(tfnr_rachunku=new JTextField(30));
		add(lstankonta=new JLabel("Stan konta:"));
		add(tfstankonta=new JTextField(30));
		add(lnumerkarty=new JLabel("Numer karty:"));
		add(tfnumerkarty=new JTextField(30));
		add(lpink=new JLabel("Pin karty:"));
		add(tfpink=new JTextField(30));
		add(dodaj_klienta=new JButton("Dodaj klienta"));
		add(info2=new JLabel("              	         Dane dla serwisanta:                          "));
		add(lkoddostepu=new JLabel("Kod dostêpu:"));
		add(tfkoddostepu=new JTextField(30));
		add(lpins=new JLabel("Pin serwisanta:"));
		add(tfpins=new JTextField(30));
		add(dodaj_serwisanta=new JButton("Dodaj serwisanta"));
		
		dodaj_klienta.addActionListener(this);
		dodaj_serwisanta.addActionListener(this);
		
		setVisible(true);
		}

	@Override
	public void actionPerformed(ActionEvent e) {
		Object source= e.getSource();
		try {
			if(source== dodaj_klienta) {
				if(InneMetody.sprawdzFormatNumerKarty(tfnumerkarty.getText())&&InneMetody.sprawdzFormatNumerRachunku(tfnr_rachunku.getText())&&InneMetody.sprawdzFormatPin(tfpink.getText())&&InneMetody.sprawdzCzyLitery(tfimie.getText())&&InneMetody.sprawdzCzyLitery(tfnazwisko.getText())) {
					Karta karta= new Karta(tfnumerkarty.getText(),tfpink.getText());
					Klient klient=new Klient(tfimie.getText(), tfnazwisko.getText(), Float.parseFloat(tfstankonta.getText()), tfnr_rachunku.getText(),karta);
					klient.zapiszDoPliku();
					//System.out.println("+");
				}
				else {
					//System.out.println("!");
					throw new ZlyFormatException("Podano nieprawid³owe dane!");}
			}
			if(source== dodaj_serwisanta) {
				if(InneMetody.sprawdzFormatPin(tfpins.getText())&&InneMetody.sprawdzCzyLitery(tfimie.getText())&&InneMetody.sprawdzCzyLitery(tfnazwisko.getText())) {
					Serwisant s=new Serwisant(tfimie.getText(), tfnazwisko.getText(),tfkoddostepu.getText(),tfpins.getText());
					s.zapiszDoPliku();
					//System.out.println("+");
				}
				else throw new ZlyFormatException("Podano nieprawid³owe dane!");
			}
		}
		catch(ZlyFormatException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);

		}
		catch(NumberFormatException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);

		}
		
	}
}
