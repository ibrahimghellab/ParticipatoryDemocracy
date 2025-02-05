import java.awt.*;
import java.awt.event.*;
import java.sql.*;

import javax.swing.*;

public class GroupSelector {
	private JPanel buttonPanel;
	
	private Boolean isDecideur(int groupeid) {
		Login.connect();
		String sql = " SELECT COUNT(*) AS cpt";
		sql += " FROM Membre M";
		sql += " JOIN Role R ON R.idRole = M.idRole";
		sql += " WHERE idInternaute = " + Login.sessionIdUtilisateur + " AND idGroupe = " + groupeid + " AND nomRole = 'Decideur'";
		System.out.println(sql);
		
		try {
			Statement st = Login.co.createStatement();
			ResultSet rs = st.executeQuery(sql);
			rs.next();
			return rs.getInt("cpt") > 0;
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return false;
	}

    public GroupSelector() {
    	Login.frame.setTitle("Select your group");
    	Login.frame.setSize(400, 300);

        buttonPanel = new JPanel();
        buttonPanel.setLayout(new GridLayout(0, 1, 10, 10)); // Une colonne, plusieurs lignes
        
        Login.connect();

        String sql = "SELECT G.idGroupe, G.nomGroupe, G.couleurGroupe";
        sql += " FROM Groupe G";
        sql += " JOIN Membre M ON M.idGroupe = G.idGroupe";
        sql += " WHERE M.idInternaute = " + Login.sessionIdUtilisateur;
        Statement st;
		try {
			st = Login.co.createStatement();
			ResultSet rs = st.executeQuery(sql);

	        while(rs.next()) {
	            ButtonId button = new ButtonId(rs.getString("nomGroupe"), rs.getInt("idGroupe"));
	            button.setBackground(Color.decode(rs.getString("couleurGroupe")));
	            button.setOpaque(true);
	            button.setBorderPainted(false);
	            button.addActionListener(new ActionListener() {
	                @Override
	                public void actionPerformed(ActionEvent e) {
	                	ButtonId clickedButton = (ButtonId) e.getSource();
	                	if(!isDecideur(clickedButton.getId())) {
	                		JOptionPane.showMessageDialog(Login.frame, "Veuillez choisir un groupe où vous êtes décideur", "Erreur", JOptionPane.INFORMATION_MESSAGE);
	                		return;
	                	}
	                    Login.sessionIdGroupe = clickedButton.getId();
	                    new InterfaceProposition();
	                }
	            });
	            buttonPanel.add(button);
	        }
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
        Login.disconnect();
        Login.clearFrame();
        Login.frame.add(new JScrollPane(buttonPanel), BorderLayout.CENTER);
    }
}
