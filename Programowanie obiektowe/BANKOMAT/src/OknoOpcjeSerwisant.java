import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;

public class OknoOpcjeSerwisant extends JFrame implements ActionListener{
	Serwisant serwisant;
	JButton napraw, uzupelnijbanknoty;
	OknoOpcjeSerwisant(Serwisant s){
		serwisant=s;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(200,300);
		setLayout(new FlowLayout());
		
		add(napraw= new JButton("Napraw awarie"));
		add(uzupelnijbanknoty= new JButton("Uzupe³nij banknoty"));
		napraw.addActionListener(this);
		uzupelnijbanknoty.addActionListener(this);
		
		setVisible(true);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		Object source=e.getSource();
		if(source==napraw) {
			serwisant.naprawAwarie(Main.bankomat);
			dispose();
			OknoStart start=new OknoStart();
		}
		if(source==uzupelnijbanknoty) {
			serwisant.uzupelnijBanknoty(Main.bankomat);
			dispose();
			OknoStart start=new OknoStart();
		}
		
	}

}
