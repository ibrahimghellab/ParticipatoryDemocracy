import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.sql.*;
import java.util.ArrayList;

public class InterfaceProposition {
    private JList<String> listePropositions;
    private DefaultListModel<String> modelListe;
    private JLabel labelBudget;
    private JButton boutonModifier1;
    private JButton boutonModifier2; 
    private JButton boutonProp; 
    private ArrayList<String> propositions = new ArrayList<String>();

    public InterfaceProposition() {
        Login.frame.setTitle("Sélection de proposition");
        Login.frame.setSize(600, 400);
        Login.frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        Login.frame.setLayout(new BorderLayout());
        Login.clearFrame();
        Login.connect();
        
        String sql = "SELECT P.titre, P.budgetGlobal, T.budgetTheme, T.nomTheme";
        sql += " FROM Membre M";
        sql += " JOIN Proposition P ON P.idMembre = M.idMembre";
        sql += " JOIN Theme T ON T.idTheme = P.idTheme";
        sql += " WHERE M.idGroupe = " + Login.sessionIdGroupe;
        System.out.println(sql);
        int budgetGroupe = 0;
        try {
            Statement st = Login.co.createStatement();
            ResultSet rs = st.executeQuery(sql);
            while (rs.next()) {
            	budgetGroupe += rs.getInt("budgetGlobal");
                propositions.add(rs.getString("titre") + " - Budget globale : " + rs.getInt("budgetGlobal") + " - Budget du thème '"+ rs.getString("nomTheme") +"' : " + rs.getInt("budgetTheme"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        modelListe = new DefaultListModel<>();
        for (String proposition : propositions) {
            modelListe.addElement(proposition);
        }
        listePropositions = new JList<>(modelListe);
        listePropositions.setSelectionMode(ListSelectionModel.SINGLE_SELECTION);
        JScrollPane scrollPane = new JScrollPane(listePropositions);
        scrollPane.getViewport().setBackground(Color.decode("#ebf9f6"));
        listePropositions.setBackground(Color.decode("#ebf9f6"));
        Login.frame.add(scrollPane, BorderLayout.CENTER);
        

        labelBudget = new JLabel("");
        labelBudget.setText("Budget global du groupe : " + budgetGroupe );
        labelBudget.setBackground(Color.decode("#b0c6e1"));
        labelBudget.setOpaque(true);
        Login.frame.add(labelBudget, BorderLayout.NORTH);

        boutonModifier1 = new JButton("Modifier Budget Global");
        Login.frame.add(boutonModifier1, BorderLayout.SOUTH);

        boutonModifier2 = new JButton("Modifier Budget Thème");
        boutonModifier1.setBackground(Color.decode("#7190c0"));
        boutonModifier2.setBackground(Color.decode("#7190c0"));
        boutonModifier1.setForeground(Color.WHITE);
        boutonModifier2.setForeground(Color.WHITE);
        
        boutonProp = new JButton("Proposition Validé");
        boutonProp.setBackground(Color.decode("#7190c0"));
        boutonProp.setForeground(Color.WHITE);
        JPanel buttonPanel = new JPanel();
        buttonPanel.setLayout(new FlowLayout(FlowLayout.CENTER));
        buttonPanel.add(boutonModifier1);
        buttonPanel.add(boutonModifier2); 
        buttonPanel.add(boutonProp); 
        Login.frame.add(buttonPanel, BorderLayout.SOUTH);
        buttonPanel.setBackground(Color.decode("#b0c6e1"));
        
        Login.frame.setBackground(Color.decode("#b0c6e1"));

        Login.frame.repaint();
        Login.frame.revalidate();

        listePropositions.addListSelectionListener(e -> {
            if (!e.getValueIsAdjusting()) {
                String selectedProposition = listePropositions.getSelectedValue();
                if (selectedProposition != null) {
                    
                }
            }
        });

        boutonModifier1.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String selectedProposition = listePropositions.getSelectedValue();
                if (selectedProposition != null) {
                    SaisieIntProp.showInputDialog(extraireProposition(selectedProposition));
                } else {
                    JOptionPane.showMessageDialog(Login.frame, "Veuillez sélectionner une proposition avant de modifier.");
                }
            }
        });

        boutonModifier2.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String selectedProposition = listePropositions.getSelectedValue();
                if (selectedProposition != null) {
                    SaisieIntTheme.showInputDialog(extraireProposition(selectedProposition));
                } else {
                    JOptionPane.showMessageDialog(Login.frame, "Veuillez sélectionner une proposition avant de modifier.");
                }
            }
        });
        
        boutonProp.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                ListeProp.printProp();
            }
        });
    }

    public static String extraireProposition(String proposition) {
        String[] parties = proposition.split(" - ");
        return parties[0]; 
    }
}
