import java.util.Scanner;

public class AreaCirculo 
{
    
    public static void main (String [] args)
    {
        int Radio;     
        System.out.println("Ingresa el valor: ");

        Scanner radio = new Scanner(System.in);
        
        Radio = radio.nextInt();
        double Area = Math.PI * Math.pow(Radio, 2) ; 
        
        System.out.println("El área del circulo es de " + Area);
               
     }
    
}