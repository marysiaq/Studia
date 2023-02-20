import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;

public class OknoOpcjeKlient extends JFrame implements ActionListener{
	JButton wyplac, wplac, doladuj,drukuj;
	 Klient klient;
	OknoOpcjeKlient(Klient k){
		klient =k;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(500,200);
		setLayout(new FlowLayout());
		
		add(wyplac= new JButton("Wyp³aæ gotówkê"));
		add(wplac= new JButton("Wp³aæ gotówkê"));
		add(doladuj= new JButton("Do³aduj telefon"));
		add(drukuj =new JButton("Wydrukuj stan konta"));
		
		wyplac.addActionListener(this);
		wplac.addActionListener(this);
		doladuj.addActionListener(this);
		drukuj.addActionListener(this);
		
		setVisible(true);
	}

	
	public void actionPerformed(ActionEvent e) {
		Object source= e.getSource();
		if(source==wyplac) {
			dispose();
			OknoWyplata o=new OknoWyplata(klient);
		}
		if(source==wplac) {
			dispose();
			OknoWplata o=new OknoWplata(klient);
		}
		if(source==doladuj) {
			dispose();
			OknoDoladujTelefon o=new OknoDoladujTelefon(klient);
		}
		if(source==drukuj) {
			Main.bankomat.drukujStanKonta(klient);
			InneMetody.otworzPlik("stankonta.txt");
		}
		
	}

}
