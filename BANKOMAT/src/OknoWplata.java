import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class OknoWplata extends JFrame implements ActionListener  {
	Klient klient;
	JLabel jl,jlile10,jlile20,jlile50,jlile100, jlile200,jlkwota;
	JTextField ile10,ile20,ile50,ile100, ile200;
	JButton bpotwierdz;
	int kwota=0;
	OknoWplata(Klient k){
		klient =k;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(800,200);
		setLayout(new FlowLayout());
		add(jl=new JLabel("Podaj iloœæ banknotów: "));
		add(jlile10=new JLabel("10 PLN: "));
		add(ile10=new JTextField(5));
		add(jlile20=new JLabel("20 PLN: "));
		add(ile20=new JTextField(5));
		add(jlile50=new JLabel("50 PLN: "));
		add(ile50=new JTextField(5));
		add(jlile100=new JLabel("100 PLN: "));
		add(ile100=new JTextField(5));
		add(jlile200=new JLabel("200 PLN: "));
		add(ile200=new JTextField(5));
		
		add(bpotwierdz=new JButton("Potwierdz"));
		bpotwierdz.addActionListener(this);
		
		
		
		
		setVisible(true);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		ArrayList<Integer> banknoty= new ArrayList<Integer>();
		banknoty.add(0);
		banknoty.add(0);
		banknoty.add(0);
		banknoty.add(0);
		banknoty.add(0);
		try {
			if(!ile200.getText().equals("")) banknoty.set(0, Integer.parseInt(ile200.getText()));
			
			if(!ile100.getText().equals("")) banknoty.set(1, Integer.parseInt(ile100.getText()));
			if(!ile50.getText().equals("")) banknoty.set(2, Integer.parseInt(ile50.getText()));
			if(!ile20.getText().equals("")) banknoty.set(3, Integer.parseInt(ile20.getText()));
			if(!ile10.getText().equals("")) banknoty.set(4, Integer.parseInt(ile10.getText()));
			
			kwota= (200*banknoty.get(0))+(100*banknoty.get(1))+(50*banknoty.get(2))+(20*banknoty.get(3))+(10*banknoty.get(4));
			if(kwota!=0) {
				
				
				
				System.out.println("Przed wp³at¹ "+klient.getStan_konta());
				
				Main.bankomat.Wplata(klient, kwota, banknoty);
				
				System.out.println("Po wplacie "+klient.getStan_konta());
				
				
				
				
				dispose();
				OknoStart start= new OknoStart();
			}
			else {
				JOptionPane.showMessageDialog(null,"Kwota wp³aty wynosi 0 PLN!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			}
		}
		catch(NumberFormatException e1) {
			JOptionPane.showMessageDialog(null,"Wpisano nieprawid³owe dane!", "B³¹d", JOptionPane.INFORMATION_MESSAGE);
		}
		
		
	}
}
