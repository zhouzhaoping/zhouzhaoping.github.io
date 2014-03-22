import java.applet.Applet;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Random;

import javax.swing.Timer;

public class drawBrowser extends Applet
{
	Random rand;
	private final int TABLE_WIDTH = 550;
	private final int TABLE_HIGHT = 550;
	int imgN = 8;
	Image[] img = new Image[imgN];
	int[] X = new int[imgN];
	int[] Y = new int[imgN];
	int[] imgSize = new int[imgN];

	Timer timer;
	public void init()
	{
		rand = new Random();
		for (int i = 0; i < imgN; ++i)
		{
			img[i] = getImage(getCodeBase(), "images/" + (i + 1) + ".jpg");
		}

		for (int i = 0; i < imgN; ++i)
			new browser(i).start();
		
		ActionListener myPaint = new ActionListener(){
            public void actionPerformed(ActionEvent evt){
            	repaint();
            }
        };
        
        timer = new Timer(100, myPaint);
        timer.start();
	}
	public void paint(Graphics g)
	{
        super.paint(g);
        for (int i = 0; i < imgN; ++i)
        {
        	g.drawImage(img[i], X[i] - imgSize[i] / 2 + 50, Y[i] - imgSize[i] / 2 + 50, imgSize[i], imgSize[i], this);
        }
	}
	class browser extends Thread
	{
		int id;
		int minSize = 30;
		int maxSize = 80;
		browser(int _id)
		{
			id = _id;
			X[id] = rand.nextInt(500);
			Y[id] = rand.nextInt(500);
			imgSize[id] = 30;
		}

		public void run()
		{
			while (true)
			{
				while (imgSize[id] <= maxSize)
				{
					try
					{
						sleep(50);
					} catch (InterruptedException e)
					{
						e.printStackTrace();
					}
					updatePos();
					++imgSize[id];
				}
				while (imgSize[id] >= minSize)
				{
					try
					{
						sleep(50);
					} catch (InterruptedException e)
					{
						e.printStackTrace();
					}
					updatePos();
					--imgSize[id];
				}
			} 
		}
		
		void updatePos()
		{
			int deltaX = rand.nextInt(21) - 10;
			int deltaY = rand.nextInt(21) - 10;
			if (X[id] + deltaX <= 500 && X[id] + deltaX >= 0)
			{
				X[id] += deltaX;
			}
			if (Y[id] + deltaY <= 500 && Y[id] + deltaY >= 0)
			{
				Y[id] += deltaY;
			}
		}
	}
}