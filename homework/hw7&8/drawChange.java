import java.applet.Applet;
import java.awt.*;

public class drawChange extends Applet
{
    public void paint(Graphics g)
    {
    	String myColor = getParameter("color");
		String myShape = getParameter("shape");
		String myFill = getParameter("fill");
		
		if (myColor.equals("black"))
			g.setColor(Color.black);
		else if (myColor.equals("red"))
			g.setColor(Color.red);
		else if (myColor.equals("green"))
			g.setColor(Color.green);
		else if (myColor.equals("blue"))
			g.setColor(Color.blue);
		
		if (myFill.equals("no"))
		{
			if (myShape.equals("round"))
				g.drawOval(20, 20, 160, 160);
			else if (myShape.equals("rectangle"))
				g.drawRect(20, 20, 160, 160);
		}
		else if (myFill.equals("yes"))
		{
			if (myShape.equals("round"))
				g.fillOval(20, 20, 160, 160);
			else if (myShape.equals("rectangle"))
				g.fillRect(20, 20, 160, 160);
		}
    }
}