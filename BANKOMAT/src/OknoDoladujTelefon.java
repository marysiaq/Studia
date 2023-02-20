import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class OknoDoladujTelefon extends JFrame implements ActionListener{
	JButton bpotwierdz;
	JTextField numer, tfkwota;
	JComboBox sieci;
	JLabel jl1, jl2, jl3;
	Klient klient;
	int kwota;
	
	OknoDoladujTelefon(Klient k){
		klient =k;
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(200,300);
		setLayout(new FlowLayout());
		add(jl1=new JLabel("Wprowadz numer:"));
		add(numer= new JTextField(10));
		add(jl2=new JLabel("Podaj kwot� do�adowania:"));
		add(tfkwota= new JTextField(10));
		
		add(jl2=new JLabel("Wybierz sie�:"));
		
		sieci=new JComboBox();
		sieci.addItem("T-mobile");
		sieci.addItem("Plus");
		sieci.addItem("Orange");
		sieci.addItem("Play");
		sieci.addItem("Inna");
		add(sieci);
		add(bpotwierdz= new JButton("Potwierdz"));
		bpotwierdz.addActionListener(this);
		
		setVisible(true);
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		try {
			String siec=String.valueOf(sieci.getSelectedItem());
			kwota=Integer.parseInt(tfkwota.getText());
			
			if(InneMetody.sprawdzFormatNumerTelefonu(numer.getText())) {
				
				
				Main.bankomat.DoladowanieTelefonu(klient, kwota, numer.getText(), siec);
				
			}
			else {
				throw new ZlyFormatException("Podany numer telefonu jest nieprawid�owy!");
			}
			
			
			
			
			dispose();
			OknoStart start= new OknoStart();
		}
		catch(NumberFormatException  e1) {
			JOptionPane.showMessageDialog(null,"Nieprawid�owa kwota do�adowania!", "B��d", JOptionPane.INFORMATION_MESSAGE);
		}
		catch(ZlyFormatException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B��d", JOptionPane.INFORMATION_MESSAGE);
			
		} catch (ZaMaloSrodkowNaKoncieException e1) {
			JOptionPane.showMessageDialog(null,e1.getMessage(), "B��d", JOptionPane.INFORMATION_MESSAGE);
		}
		
	}
}
