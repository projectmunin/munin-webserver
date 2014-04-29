import java.io.*;
 
public class NetworkServerSendConfigs {

	public static void main(String args[]) throws InterruptedException {
		Thread.sleep(2000);
		for(String str : args)
		{
			System.out.println(str);
		}
		System.exit(0);
	}
}