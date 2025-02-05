import javax.swing.JButton;

public class ButtonId extends JButton {
	private int id;
	
	public ButtonId(String text, int id) {
		super(text);
		this.id = id;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}
}
