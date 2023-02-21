
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;


import javax.swing.ButtonGroup;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JRadioButton;
import javax.swing.JTextField;

public class OknoWyplata extends JFrame implements ActionListener {
	Klient klient;
	JLabel jlkwota;
	JTextField jtfkwota;
	JButton potwierdz;
	JRadioButton k50, k100,k150, k200,k300, k400,k500, inna_kwota;
	ButtonGroup jbg;
	int kwota=0;
	
	OknoWyplata(Klient k){
		klient =k;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(200,300);
		setLayout(new FlowLayout());
		add(jlkwota= new JLabel("Wybierz kwotê (z³):"));
		add(k50= new JRadioButton("50"));
		add(k100= new JRadioButton("100"));
		add(k150= new JRadioButton("150"));
		add(k200= new JRadioButton("200"));
		add(k300= new JRadioButton("300"));
		add(k400= new JRadioButton("400"));
		add(k500= new JRadioButton("500"));
		add(inna_kwota= new JRadioButton("Inna kwota:"));
		jbg=new ButtonGroup();
		jbg.add(inna_kwota);
		jbg.add(k100);
		jbg.add(k150);
		jbg.add(k200);
		jbg.add(k300);
		jbg.add(k400);
		jbg.add(k50);
		jbg.add(k500);
		
		
		add(jtfkwota= new JTextField(10));
		jtfkwota.setEditable(false);
		
		
		add(potwierdz=new JButton("Potwierdz"));
		
		inna_kwota.addActionListener(this);
		k50.addActionListener(this);
		k100.addActionListener(this);
		k150.addActionListener(this);
		k200.addActionListener(this);
		k300.addActionListener(this);
		k400.addActionListener(this);
		k500.addActionListener(this);
		potwierdz.addActionListener(this);
		
		setVisible(true);
	}
	@Override
	public void actionPerformed(ActionEvent e) {
		
		Object zrodlo= e.getSource();
		
		if(zrodlo==inna_kwota) {
			kwota=0;
			jtfkwota.setEditable(true);
			
		}
		
		if(zrodlo==k50) {
			kwota=50;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k100) {
			kwota=100;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k150) {
			kwota=150;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k200) {
			kwota=200;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k300) {
			kwota=300;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k400) {
			kwota=400;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		if(zrodlo==k500) {
			kwota=500;
			jtfkwota.setText("");
			jtfkwota.setEditable(false);
		}
		
		
		 if(zrodlo==potwierdz) {
			try {  
			 	if(kwota==0) {
			 		if(InneMetody.sprawdzFormatKwoty(jtfkwota.getText())) {
			 			kwota=Integer.parseInt(jtfkwota.getText());
			 		}
			 		else {
				 		throw new ZlyFormatException("Podana kwota jest nieprawid³owa.");
				 	}
			 	}
			 	
			 	System.out.println(kwota);
			 	System.out.println(klient.getStan_konta());
				
			 	Main.bankomat.Wyplata(klient, kwota);
			 	dispose();
				OknoStart start=new OknoStart();
			 	
				
			}
			catch(ZlyFormatException  e1) {
				JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			}
			catch(ZaMaloBanknotowException e1 ) {
				JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			}
			catch(ZaMaloSrodkowNaKoncieException e1) {
				JOptionPane.showMessageDialog(null,e1.getMessage(), "B³¹d", JOptionPane.INFORMATION_MESSAGE);
			}
			System.out.println("Po wyp³acie: "+klient.getStan_konta());
			
		 }
		}
		
	
}
