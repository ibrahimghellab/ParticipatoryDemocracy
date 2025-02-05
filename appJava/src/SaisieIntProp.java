import javax.swing.*;
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
                String sql = "UPDATE Proposition SET budgetGlobal = " + valeur + " WHERE titre = '" + titre + "'";
                try {
					Statement st = Login.co.createStatement();
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



