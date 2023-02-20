import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class OknoSerwisantKod extends JFrame implements ActionListener {
	JTextField kod;
	JButton potw;
	JLabel info;
	OknoSerwisantKod(){
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(200,300);
		setLayout(new FlowLayout());
		add(info= new JLabel("Podaj kod dostepu:"));
		add(kod= new JTextField(10));
		add(potw= new JButton("PotwierdŸ"));
		potw.addActionListener(this);
		
		setVisible(true);
		
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		Serwisant serwisant = new Serwisant();
		serwisant.setKod_dostepu(kod.getText());
		serwisant= (Serwisant) serwisant.znajdzWPilku();
		if(serwisant!=null) {
			dispose();
			OknoSerwisantPin o=new OknoSerwisantPin(serwisant);
		}
		else {
			JOptionPane.showMessageDialog(null,"Nieprawid³owy kod dostêpu!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);

		}
		
	}

}
