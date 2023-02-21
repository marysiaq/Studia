import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;



public class OknoStart extends JFrame implements ActionListener, KeyListener {
	JButton start;
	OknoStart(){
	setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	setSize(200,200);
	setLayout(new FlowLayout());
	
	addKeyListener(this);
	
	add(start=new JButton("Start"));
	start.addActionListener(this);
	start.addKeyListener(this);
	
	
	
	setVisible(true);
	if(Main.bankomat.isCzy_awaria()) {
		start.setEnabled(false);
		JOptionPane.showMessageDialog(null,"Bankomat uleg³ awarii!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
	}
	else {
		start.setEnabled(true);
	}
	if(Main.bankomat.czyMaloBanknotow()) {
		JOptionPane.showMessageDialog(null,"Ma³o banknotów w bankomacie!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
	}
	}
	
	public void keyTyped(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void keyPressed(KeyEvent e) {
		
		if(e.isShiftDown()&&e.getKeyCode()==32) {
			dispose();
			OknoSerwisantKod o=new OknoSerwisantKod();
		}
		/*else if(e.getKeyCode()==27) {
			dispose();
			OknoDodaj o=new OknoDodaj();
		}*/
		

		
	}

	@Override
	public void keyReleased(KeyEvent e) {
		// TODO Auto-generated method stub
		
	}
	public void actionPerformed(ActionEvent e) {
			dispose();
			OknoNumerKarty o =new OknoNumerKarty();
		
			
	}
}
