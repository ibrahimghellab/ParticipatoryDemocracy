import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.*;

public class Login {

    public static int sessionIdUtilisateur;
    public static int sessionIdGroupe;
    public static Connection co;
    public static JFrame frame;

    public static void main(String[] args) {
    	frame = new JFrame("Login Interface");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(350, 250); 
        frame.setLayout(new BorderLayout());
        
        
        JPanel panel = new JPanel();
        panel.setLayout(new GridLayout(3, 2, 10, 10));
        panel.setBackground(Color.decode("#b0c6e1"));
        
        JLabel emailLabel = new JLabel("Email:");
        JTextField emailField = new JTextField();
        JLabel passwordLabel = new JLabel("Password:");
        JPasswordField passwordField = new JPasswordField();

        JButton connectButton = new JButton("Connect");
        connectButton.setBackground(Color.decode("#7190c0"));
        connectButton.setForeground(Color.WHITE);

        panel.add(emailLabel);
        panel.add(emailField);
        panel.add(passwordLabel);
        panel.add(passwordField);
        panel.add(new JLabel()); 
        panel.add(connectButton);

        frame.add(panel, BorderLayout.CENTER);

        // Rendre la fenêtre visible
        frame.setVisible(true);

        connectButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String email = emailField.getText();
                char[] passwordArray = passwordField.getPassword();
                String password = new String(passwordArray);


                Login.connect();
                
                if (login(email, password)) {
                    JOptionPane.showMessageDialog(frame, "Connexion réussie!", "Succès", JOptionPane.INFORMATION_MESSAGE);
                    Login.disconnect();
                    new GroupSelector();
                } else {
                    JOptionPane.showMessageDialog(frame, "Échec de la connexion. Vérifiez vos informations.", "Erreur", JOptionPane.ERROR_MESSAGE);
                }
            }
        });
    }

    public static boolean login(String login, String password) {
    	String sql = "SELECT hash, salt FROM Internaute WHERE email = '" + login + "'";
    	try {
			Statement st = Login.co.createStatement();
			ResultSet rs = st.executeQuery(sql);
			if(!rs.next()) return false;
			String salt = rs.getString("salt");
			String hash = rs.getString("hash");
			if(!validatePassword(password, hash, salt)) {
				return false;
			}
			sql = "SELECT idInternaute FROM Internaute WHERE email = '" + login + "'";
			rs = st.executeQuery(sql);
			if(!rs.next()) return false;
			Login.sessionIdGroupe = 0;
			Login.sessionIdUtilisateur = rs.getInt("idInternaute");
			return true;
		} catch (SQLException e) {
			e.printStackTrace();
		}
    	return false;
    }
    
    public static void connect() {
        try {
			Class.forName("com.mysql.jdbc.Driver");
	        co = DriverManager.getConnection("jdbc:mysql://projets.iut-orsay.fr:3306/saes3-ttroles", "saes3-ttroles", "5zCg41+30RDKkpVl");
        } catch (ClassNotFoundException e) {
			e.printStackTrace();
		} catch (SQLException e) {
			e.printStackTrace();
		}
    }
    
    public static void disconnect() {
    	try {
			co.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
    }
    
    public static boolean validatePassword(String enteredPassword, String storedHashedPassword, String storedSalt) {
		String hashedEnteredPassword = hashPassword(enteredPassword, storedSalt);

		return hashedEnteredPassword.equals(storedHashedPassword);
    }
    
    public static String hashPassword(String password, String salt) {
        String passwordWithSalt = password + salt;
        
        MessageDigest md;
		try {
			md = MessageDigest.getInstance("SHA-256");
			byte[] hashBytes = md.digest(passwordWithSalt.getBytes());
	        
	        StringBuilder hexString = new StringBuilder();
	        for (byte b : hashBytes) {
	            hexString.append(String.format("%02x", b));
	        }
	        
	        return hexString.toString();
		} catch (NoSuchAlgorithmException e) {
			e.printStackTrace();
		}
		return null;
        
    }
	
	public static void clearFrame() {
		frame.getContentPane().removeAll(); 
		frame.revalidate(); 
		frame.repaint();
	}
   
}