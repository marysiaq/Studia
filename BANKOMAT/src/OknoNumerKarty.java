import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class OknoNumerKarty  extends JFrame implements ActionListener{
	JTextField numer_karty;
	JButton potwierdz;
	JLabel etykieta;
	OknoNumerKarty(){
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(500,200);
		setLayout(new FlowLayout());
		add(etykieta= new JLabel("Podaj numer karty:"));
		add(numer_karty= new JTextField(40));
		add(potwierdz= new JButton("Potwierd�"));
		potwierdz.addActionListener(this);
		setVisible(true);
	}
	
	public void actionPerformed(ActionEvent e) {
		Klient klient= new Klient();
		Karta karta=new Karta();
		karta.setNumer_karty(numer_karty.getText());
		klient.setKarta(karta);
		
		klient=(Klient) klient.znajdzWPilku();
		
		if(klient!=null) {
			System.out.println("Dzia�a :D");
			dispose();
			OknoPinKarty o=new OknoPinKarty(klient);
		}
		else{
			JOptionPane.showMessageDialog(null,"Nie znaleziono karty o podanym numerze!", "B��d", JOptionPane.INFORMATION_MESSAGE);
			dispose();
			OknoStart start=new OknoStart();
			
		}
	}
	
}
