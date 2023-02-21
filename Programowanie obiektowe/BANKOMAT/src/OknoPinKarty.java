import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class OknoPinKarty extends JFrame implements ActionListener,KeyListener{
	JTextField numer_pin;
	JButton potwierdz;
	JLabel etykieta;
	Klient klient;
	String pin="";
	String gwiazdki="";
	OknoPinKarty(Klient k){
		klient =k;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(500,200);
		setLayout(new FlowLayout());
		add(etykieta= new JLabel("Podaj numer PIN karty:"));
		add(numer_pin= new JTextField(10));
		numer_pin.setEditable(false);
		add(potwierdz= new JButton("PotwierdŸ"));
		numer_pin.addKeyListener(this);
		potwierdz.addActionListener(this);
		setVisible(true);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		if(klient.getKarta().PotwierdzPin(pin)) {
			
			dispose();
			OknoOpcjeKlient o=new OknoOpcjeKlient(klient);
		}
		else {
				
				dispose();
				OknoStart start=new OknoStart();
		}
		
	}
	@Override
	public void keyTyped(KeyEvent e) {
		
		
		
	}
	@Override
	public void keyPressed(KeyEvent e) {
		
		if(e.getKeyChar()>=48&&e.getKeyChar()<=57) {
			pin=pin+e.getKeyChar();
			gwiazdki=gwiazdki+"*";
			
		}
		if(e.getKeyCode()==8) {
			try {
				pin=pin.substring(0,pin.length()-1);
				gwiazdki=gwiazdki.substring(0,gwiazdki.length()-1);
			}catch(StringIndexOutOfBoundsException e1) {
				
			}
		}
		System.out.println(e.getKeyCode());
		numer_pin.setText(gwiazdki);
		
	}
	@Override
	public void keyReleased(KeyEvent e) {
		
		
	}
}
