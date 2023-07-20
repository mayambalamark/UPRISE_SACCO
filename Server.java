import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.*;

public class Server {
    private static final int PORT = 5555;
    private static final String DB_URL = "jdbc:mysql://localhost/upraise_sacco";
    private static final String DB_USERNAME = "MumbereJoshua";
    private static final String DB_PASSWORD = "Hazard*10";

    public static void main(String[] args) {
        try {
            ServerSocket serverSocket = new ServerSocket(PORT);
            System.out.println("=====================================================");
            System.out.println("WELCOME TO THE UPRISE SACCO SERVER");
            System.out.println("[+] Server started. Listening on port: " + PORT);
            System.out.println("=====================================================");

            while (true) {
                Socket clientSocket = serverSocket.accept();
                System.out.println("[+] Client connected: " + clientSocket.getInetAddress().getHostAddress());
                System.out.println("======================================================");

                ClientHandler clientHandler = new ClientHandler(clientSocket);
                new Thread(clientHandler).start();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private static class ClientHandler implements Runnable {
        private Socket clientSocket;
        private BufferedReader in;
        private PrintWriter out;

        private static final String LOGIN_COMMAND = "login";
        private static final String DEPOSIT_COMMAND = "deposit";
        private static final String CHECK_STATEMENT_COMMAND = "CheckStatement";
        private static final String REQUEST_LOAN_COMMAND = "requestLoan";
        private static final String LOAN_STATUS_COMMAND = "LoanRequestStatus";
        private static final String ACCEPT_LOAN_COMMAND = "accept";
        private static final String REJECT_LOAN_COMMAND = "reject";

        public ClientHandler(Socket clientSocket) {
            this.clientSocket = clientSocket;
        }

        @Override
        public void run() {
            boolean isLoggedIn = false;
            try {
                in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
                out = new PrintWriter(clientSocket.getOutputStream(), true);

                String inputLine;
                while ((inputLine = in.readLine()) != null) {
                    String[] commandArgs = inputLine.split(" ");
                    String command = commandArgs[0];

                    switch (command) {
                        case LOGIN_COMMAND:
                            String username = commandArgs[1];
                            String password = commandArgs[2];
                            isLoggedIn = handleLogin(username, password);
                            if (isLoggedIn) {
                                out.println("User Logged in Successfully");
                            } else {
                                out.println("Invalid username or password");
                            }
                            break;

                        default:
                            if (isLoggedIn) {
                                handleCommand(commandArgs);
                            } else {
                                out.println("Please log in to access commands.");
                            }
                    }
                }

                clientSocket.close();
                System.out.println("Client disconnected: " + clientSocket.getInetAddress().getHostAddress());
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

        private void handleCommand(String[] commandArgs) {
            String command = commandArgs[0];
            switch (command) {
                case DEPOSIT_COMMAND:
                    double amount = Double.parseDouble(commandArgs[1]);
                    String dateDeposited = commandArgs[2];
                    String receiptNumber = commandArgs[3];
                    handleDeposit(amount, dateDeposited, receiptNumber);
                    out.println("Your money has been deposited successfully!");
                    break;
                    case CHECK_STATEMENT_COMMAND:
                            String dateFrom = commandArgs[1];
                            String dateTo = commandArgs[2];
                            handleCheckStatement(dateFrom, dateTo);
                            break;
                            case REQUEST_LOAN_COMMAND:
                            double loanAmount = Double.parseDouble(commandArgs[1]);
                            int paymentPeriod = Integer.parseInt(commandArgs[2]);
                            handleLoanRequest(loanAmount, paymentPeriod);
                            break;
                        case LOAN_STATUS_COMMAND:
                            String loanApplicationNumber = commandArgs[1];
                            handleLoanRequestStatus(loanApplicationNumber);
                            break;
                        case ACCEPT_LOAN_COMMAND:
                            String acceptLoanApplicationNumber = commandArgs[1];
                            handleLoanAcceptance(acceptLoanApplicationNumber);
                            break;
                        case REJECT_LOAN_COMMAND:
                            String rejectLoanApplicationNumber = commandArgs[1];
                            handleLoanRejection(rejectLoanApplicationNumber);
                            break;
                // Add other allowed commands here
                default:
                    out.println("Invalid command. Please try again.");
            }
        }

        private boolean handleLogin(String username, String password) throws SQLException {
            // Perform authentication logic here
            // Retrieve user information from the database and validate credentials
            // Send appropriate responses to the client
            DatabaseConnector databaseConnector = new DatabaseConnector();
            String selectQuery = "SELECT username, password FROM users";
            ResultSet resultSet = databaseConnector.executeQuery(selectQuery);

            // Process the result set as needed
            boolean isUserValid = false;
            while (resultSet.next()) {
                // Retrieve values from the result set
                String dbusername = resultSet.getString("username");
                String dbpassword = resultSet.getString("password");

                if (username.equals(dbusername)) {
                    if (password.equals(dbpassword)) {
                        isUserValid = true;
                        break;
                    }
                }
            }

            if (isUserValid) {
                out.println("User Logged in Successfully");
                return true;
//                handleDeposit(255.0000, "Wednesday", "  QQ001");

            } else {
                out.println("Invalid username or password");
                return false;
            }

        }

        private void handleDeposit(double amount, String dateDeposited, String receiptNumber) {
            // Perform deposit logic here
            // Check if the receipt number exists in the database
            // Update the member's deposit information in the database
            // Send appropriate responses to the client
            System.out.println("MONEY HAS BEEN DEPOSITED \n"+ "Amount: "+ amount+ "\n"+ dateDeposited+ "\n"+ receiptNumber);
        }

        private void handleCheckStatement(String dateFrom, String dateTo) {
            // Perform statement checking logic here
            // Retrieve the member's statement details from the database
            // Calculate loan progress, contribution progress, and overall Sacco performance
            // Send the statement and performance information to the client
        }

        private void handleLoanRequest(double loanAmount, int paymentPeriod) {
            // Perform loan request logic here
            // Check available funds, number of loan requests, and member's loan performance
            // Generate a recommended loan amount distribution and insert it into the database
            // Send appropriate responses to the client
        }

        private void handleLoanRequestStatus(String loanApplicationNumber) {
            // Perform loan request status logic here
            // Retrieve the loan status information from the database
            // Send the loan request status to the client
        }

        private void handleLoanAcceptance(String loanApplicationNumber) {
            // Perform loan acceptance logic here
            // Update the loan status as accepted in the database
            // Send appropriate responses to the client
        }

        private void handleLoanRejection(String loanApplicationNumber) {
            // Perform loan rejection logic here
            // Reallocate the funds to other members
            // Send appropriate responses to the client
        }
    }

    private static class DatabaseConnector {
        private Connection connection;

        public DatabaseConnector() {
            try {
//                Class.forName("com.mysql.cj.jdbc.Driver");
                connection = DriverManager.getConnection(DB_URL, DB_USERNAME, DB_PASSWORD);
                System.out.println("[+] Database Connected Successfully");
            } catch (SQLException  e) {
                e.printStackTrace();
            }
        }

        public ResultSet executeQuery(String query) {
            try {
                PreparedStatement statement = connection.prepareStatement(query);
                return statement.executeQuery();
            } catch (Exception e) {
                e.printStackTrace();
            }
            return null;
        }

        public void executeUpdate(String query) {
            try {
                PreparedStatement statement = connection.prepareStatement(query);
                statement.executeUpdate();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }
}
