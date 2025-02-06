import javax.swing.*;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class SaisieIntProp{

	private static String titre = "";

    public static void showInputDialog(String nom) {

        String input = JOptionPane.showInputDialog(null, "Entrez un budget :");
        titre = nom;
        if (input != null) {
            try {

                int valeur = Integer.parseInt(input);
                Login.connect();
                String sql = "SELECT COUNT(*) AS cpt";
                sql += " FROM Proposition P";
                sql += " JOIN Theme T ON T.idTheme = P.idTheme";
                sql += " WHERE titre = '" + titre + "' AND budgetTheme > " + valeur;
                
                try {
                	Statement st = Login.co.createStatement();
                	ResultSet rs = st.executeQuery(sql);
                	rs.next();
                	if (rs.getInt("cpt") < 1) {
                		JOptionPane.showMessageDialog(Login.frame, "Le budget global ne doit pas dépasser au dessus du budget du theme", "Erreur", JOptionPane.INFORMATION_MESSAGE);
                		return;
                	}
                	sql = "UPDATE Proposition SET budgetGlobal = " + valeur + " WHERE titre = '" + titre + "'";
					st.execute(sql);
				} catch (SQLException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
                Login.disconnect();
            } catch (NumberFormatException e) {
                JOptionPane.showMessageDialog(null, "Veuillez entrer un entier valide.");
            }
        } else {
            JOptionPane.showMessageDialog(null, "Aucune entrée n'a été saisie.");
        }
        new InterfaceProposition();
    }
}



