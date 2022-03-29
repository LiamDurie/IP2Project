import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;

public class Login extends JDialog {

    private JTextField emailText;
    private JLabel emailLabel;
    private JLabel passwordLabel;
    private JPasswordField loginPasswordField;
    private JPanel loginPanel;
    private JLabel newuserLabel;
    private JButton logInButton;
    private JButton backButton;
    private JButton registerButton;

    public Login(JFrame parent) {
        setTitle("Login");
        setContentPane(loginPanel);
        setMinimumSize(new Dimension(428, 926));
        setModal(true);
        setLocationRelativeTo(parent);
        setDefaultCloseOperation(DISPOSE_ON_CLOSE);

        logInButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String email = emailText.getText();
                String password = String.valueOf(loginPasswordField.getPassword());

                user = getAuthenticatedUser(email, password);

                if (user != null) {
                    dispose();
                } else {
                    JOptionPane.showMessageDialog(Login.this,
                            "Email or Password Invalid",
                            "Try again",
                            JOptionPane.ERROR_MESSAGE);
                }
            }
        });
                backButton.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        dispose();
                    }
                });

                setVisible(true);

        registerButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                dispose();
            }
        });
    }

            public User user;

            private User getAuthenticatedUser(String email, String password) {
                User user = null;

                final String DB_URL = "jdbc:mysql://localhost:3306/login";
                final String USERNAME = "root";
                final String PASSWORD = "";

                try {
                    Connection conn = DriverManager.getConnection(DB_URL, USERNAME, PASSWORD);

                    Statement stmt = conn.createStatement();
                    String sql = "SELECT * FROM users WHERE email=? AND password=?";
                    PreparedStatement preparedStatement = conn.prepareStatement(sql);
                    preparedStatement.setString(1, email);
                    preparedStatement.setString(2, password);

                    ResultSet resultSet = preparedStatement.executeQuery();

                    if (resultSet.next()) {
                        user = new User();
                        user.id = resultSet.getInt("id");
                        user.name = resultSet.getString("name");
                        user.email = resultSet.getString("email");
                        user.phone = resultSet.getString("phone");
                        user.sex = resultSet.getInt("sex");
                        user.age = resultSet.getInt("age");
                        user.password = resultSet.getString("password");
                        user.role = resultSet.getInt("role");

                    }

                    if (user.sex == 0) {
                        user.userSex = "Male";
                    } else if (user.sex == 1) {
                        user.userSex = "Female";
                    }

                    if (user.role == 0) {
                        user.userRole = "User";
                    } else if (user.role == 1) {
                        user.userRole = "Admin";
                    }

                    stmt.close();
                    conn.close();

                } catch (Exception e) {
                    e.printStackTrace();
                }
                return user;
            }

            public static void main(String[] args) {
                Login login = new Login(null);
                User user = login.user;
                if (user != null) {
                    System.out.println("Successful Authentication of: " + user.name);
                    System.out.println("          ID: " + user.id);
                    System.out.println("          Email: " + user.email);
                    System.out.println("          Phone: " + user.phone);
                    System.out.println("          Sex: " + user.userSex);
                    System.out.println("          Age: " + user.age);
                    System.out.println("          Role: " + user.userRole);
                } else {
                    System.out.println("Authentication canceled");
                }
            }
}
