

import java.awt.*;
import java.awt.event.*;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import javax.swing.*;

public class ListeProp {
	// Modèle de données pour chaque élément de la liste
    static class Item {
        String title;
        String description;
        double budget;

        public Item(String title, String description, double budget) {
            this.title = title;
            this.description = description;
            this.budget = budget;
        }

        @Override
        public String toString() {
            return title + " - " + description + " (Budget: " + budget + "€)";
        }
    }

    public static void printProp() {
        // Création de la fenêtre principale
        JFrame frame = new JFrame("Liste des projets");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(400, 400);
        ArrayList<Item> items = new ArrayList<Item>();
        // Panel principal
        JPanel panel = new JPanel();
        panel.setLayout(new BorderLayout());
        
        Login.connect();
        String sql = "SELECT P.titre, P.budgetGlobal, P.description";
        sql += " FROM Membre M";
        sql += " JOIN MembreVote MV ON MV.idMembre = M.idMembre";
        sql += " JOIN Proposition P ON P.idMembre = M.idMembre";
        sql += " JOIN Theme T ON T.idTheme = P.idTheme";
        sql += " WHERE M.idGroupe = " + Login.sessionIdGroupe + " AND P.status = 'Validé'";
        int budgetGroupe = 0;
        try {
            Statement st = Login.co.createStatement();
            ResultSet rs = st.executeQuery(sql);
            while (rs.next()) {
                items.add(new Item(rs.getString("titre"), rs.getString("description"), rs.getInt("budgetGlobal")));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        
        // Convertir l'ArrayList en tableau
        Item[] itemsArray = items.toArray(new Item[0]);

        // Créer une JList avec le tableau d'Item
        JList<Item> list = new JList<>(itemsArray);
        list.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        list.setVisibleRowCount(5); // Afficher 5 éléments à la fois
        JScrollPane scrollPane = new JScrollPane(list);

        // Ajouter la liste au panel
        panel.add(scrollPane, BorderLayout.CENTER);

        // Créer un bouton "Confirmer" qui ferme la fenêtre
        JButton confirmButton = new JButton("Confirmer");
        confirmButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Fermer la fenêtre lorsque le bouton est cliqué
                frame.dispose();
            }
        });

        // Ajouter le bouton en bas de la fenêtre
        panel.add(confirmButton, BorderLayout.SOUTH);

        // Ajouter le panel à la fenêtre
        frame.add(panel);
        
        // Afficher la fenêtre
        frame.setVisible(true);
    }

}
