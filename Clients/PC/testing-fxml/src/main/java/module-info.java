module com.example.testing.fxml {
    requires javafx.controls;
    requires javafx.fxml;

    opens com.example.testing.fxml to javafx.fxml;
    exports com.example.testing.fxml;
}
