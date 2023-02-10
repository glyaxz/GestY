module com.example.gesty {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.base;

    opens com.example.gesty to javafx.fxml;
    exports com.example.gesty;
}
