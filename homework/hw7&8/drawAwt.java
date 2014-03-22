import java.applet.Applet;
import java.awt.*;

public class drawAwt extends Applet
{
    public void paint(Graphics g)
    {
    	g.setColor(Color.black);
		g.drawRect(10, 10, 420, 200);
		
		g.setColor(Color.red);
        g.drawRect(30, 30, 180, 160);
		g.fillRect(50, 50, 140, 120);
		
		g.setColor(Color.green);
        g.drawOval(200 + 30, 30, 180, 160);
		g.fillOval(200 + 50, 50, 140, 120);
    }
}