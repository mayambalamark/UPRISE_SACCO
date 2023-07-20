import java.sql.*;
public class DatabaseConnector{

    Connection conn;
    public static void main(String[] args) {

    }

    public static void connectDatabase() {

        //register the class driver
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            String url = "jdbc:mysql://localhost/sacco_db";
            Connection conn = DriverManager.getConnection(url, "root", "Codezilla@21");
            System.out.println("[+] Db Connection Successful");
            conn.close();

        } catch (ClassNotFoundException ex) {
            ex.printStackTrace();
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }

    }

    public  ResultSet userDetails() throws SQLException {
        Statement statement = conn.createStatement();
        String query = "SELECT username, password FROM users";
        ResultSet result = statement.executeQuery(query);
        return result;
    }

}
