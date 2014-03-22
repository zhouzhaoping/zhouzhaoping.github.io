import java.applet.*;
import javax.swing.*;
import java.awt.*;

public class HelloWorld2 extends JApplet {
  Container messageArea = getContentPane();
  MessagePanel myMessagePanel = new MessagePanel();
  public void init() {
    messageArea.add(myMessagePanel);
  }
}
class MessagePanel extends JPanel {
  public void paintComponent(Graphics grafObj) {
    super.paintComponent(grafObj);
    grafObj.drawString("Hello World! From y2013g61.",50,25);
  }
}