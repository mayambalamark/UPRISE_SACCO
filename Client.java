import java.io.*;
import java.net.Socket;
import java.util.Scanner;

public class Client {
    public static void main(String[] args) {

        Socket socket = null;
        InputStreamReader inputStreamReader = null;
        OutputStreamWriter outputStreamWriter = null;
        BufferedReader bufferedReader = null;
        BufferedWriter bufferedWriter = null;

        try {
            //create  a new socket and bind the host to its port
            socket = new Socket("localhost", 5555);
            //create the streams that will allow character type data to be sent and received through the network
            inputStreamReader = new InputStreamReader(socket.getInputStream());
            outputStreamWriter = new OutputStreamWriter(socket.getOutputStream());
            //a buffer that stores the char streams until they fill the buffers before sent into the streams
            bufferedReader = new BufferedReader(inputStreamReader);
            bufferedWriter = new BufferedWriter(outputStreamWriter);
            //create  anew scanner class to pick input text from the commandline

            Scanner scanner = new Scanner(System.in);

            //while loop to keep the server running forever
            while(true){
                //variable to hold the messages sent from the commandline
                System.out.println("========================================");
                System.out.println("UPRISE SACCO CLIENT MENU");
                System.out.println("========================================");
                System.out.println("Commands     Usage");
                System.out.println("a.login             login <username> <password>");
                System.out.println("b.deposit           deposit <amount> <dateDeposited> <receiptNumber>");
                System.out.println("c.checkStatement    checkStatement <dateFrom> <dateTo>");
                System.out.println("d.requestLoan       requestLoan <loanAmount> <paymentPeriodInMonths>");
                System.out.println("e.LoanRequestStatus LoanRequestStatus <loanApplicationNumber>");
                System.out.println("f.accept            accept <loanApplicationNumber>");
                System.out.println("g.reject            reject <loanApplicationNumber>");
                System.out.print("Enter Command here >: ");



                String messageSent = scanner.nextLine();
                //write the messages got from the commandline into the created buffers
                bufferedWriter.write(messageSent);
                // send a next line bse the buffer rarely sends the new line with the characters into the stream
                bufferedWriter.newLine();
                //after the text is sent into the stream, make the buffer empty so that we add new data into it
                bufferedWriter.flush();
                //show the message sent by the server
                System.out.println("*******************************************");
                System.out.println("[****]Server: "+ bufferedReader.readLine());
                System.out.println("*******************************************");

                //stop the client when the user types in quit
                if(messageSent.equalsIgnoreCase("QUIT")) {
                    break;
                }
            }

        }catch (IOException e) {
            throw new RuntimeException(e);
        }finally {
            //we should ensure that we close the socket connections when we are done using the application
            //so to save memory and the buffer
            try {
                if(socket != null){
                    socket.close();
                }
                if(inputStreamReader != null){
                    inputStreamReader.close();
                }
                if(outputStreamWriter != null){
                    outputStreamWriter.close();
                }
                if(bufferedWriter != null){
                    bufferedWriter.close();
                }
                if(bufferedReader != null){
                    bufferedReader.close();
                }
            }catch (IOException e){
                e.printStackTrace();
            }
    }
    }
}