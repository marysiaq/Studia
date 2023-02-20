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

public class OknoSerwisantPin extends JFrame implements ActionListener, KeyListener{
	JTextField tfpin;
	JButton potw;
	JLabel info;
	Serwisant serwisant;
	String pin="";
	String gwiazdki="";
	OknoSerwisantPin(Serwisant s){
		serwisant =s;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(200,300);
		setLayout(new FlowLayout());
		add(info= new JLabel("Podaj pin:"));
		add(tfpin= new JTextField(10));
		tfpin.setEditable(false);
		tfpin.addKeyListener(this);
		add(potw= new JButton("PotwierdŸ"));
		potw.addActionListener(this);
		
		setVisible(true);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		if(serwisant.PotwierdzPin(pin)) {
			dispose();
			OknoOpcjeSerwisant o = new OknoOpcjeSerwisant(serwisant);
		}
		else {
			JOptionPane.showMessageDialog(null,"Nieprawid³owy pin!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			dispose();
			OknoStart start=new OknoStart();
		}
		
	}
	@Override
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
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
		tfpin.setText(gwiazdki);
		
	}
	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

}
