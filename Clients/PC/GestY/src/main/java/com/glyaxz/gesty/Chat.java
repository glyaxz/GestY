/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package com.glyaxz.gesty;

import java.util.List;
import javax.swing.ImageIcon;
import javax.swing.UIManager;
import javax.swing.table.DefaultTableModel;
import mdlaf.MaterialLookAndFeel;
import mdlaf.themes.MaterialLiteTheme;
import org.eclipse.paho.mqttv5.common.MqttMessage;
import org.eclipse.paho.mqttv5.common.packet.UserProperty;

/**
 *
 * @author bokax
 */
public class Chat extends javax.swing.JFrame {
    Empleado logged;
    String topic;
    ChatClient cc = null;
    MQTTConnector mqttClient;
    /**
     * Creates new form Chat
     */
    public Chat(Empleado logged, String topic) {
        this.logged = logged;
        this.topic = topic;
        initComponents();
        txtEmail.setText("Hola, " + logged.getEmail());
        this.setTitle("GestY Chat");
        this.setIconImage(new ImageIcon("logo.png").getImage());
        jpLogin.setVisible(true);
        jpChat.setVisible(false);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jpLoggin = new javax.swing.JLayeredPane();
        jpChat = new javax.swing.JPanel();
        txtInput = new javax.swing.JTextField();
        jButton1 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        jtChat = new javax.swing.JTable();
        jpLogin = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        txtEmail = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        btnSubmit = new javax.swing.JButton();
        txtPass = new javax.swing.JPasswordField();
        txtFailed = new javax.swing.JLabel();

        setTitle("Gesty Chat");
        setFocusCycleRoot(false);
        setMinimumSize(new java.awt.Dimension(300, 450));

        jpLoggin.setMinimumSize(new java.awt.Dimension(300, 450));

        jpChat.setMinimumSize(new java.awt.Dimension(368, 460));
        jpChat.setPreferredSize(new java.awt.Dimension(368, 460));
        jpChat.setLayout(null);

        txtInput.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtInputActionPerformed(evt);
            }
        });
        jpChat.add(txtInput);
        txtInput.setBounds(30, 420, 250, 22);

        jButton1.setText("^");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });
        jpChat.add(jButton1);
        jButton1.setBounds(300, 420, 40, 23);

        jtChat.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null},
                {null},
                {null},
                {null}
            },
            new String[]{
                this.topic
            }
        ) {
            boolean[] canEdit = new boolean [] {
                false
            };

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        jScrollPane1.setViewportView(jtChat);

        jpChat.add(jScrollPane1);
        jScrollPane1.setBounds(30, 40, 310, 350);

        jpLoggin.add(jpChat);
        jpChat.setBounds(0, 0, 380, 460);

        jpLogin.setLayout(null);

        jLabel1.setFont(new java.awt.Font("Segoe UI", 0, 18)); // NOI18N
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("GestY Chat");
        jpLogin.add(jLabel1);
        jLabel1.setBounds(140, 90, 103, 46);

        txtEmail.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jpLogin.add(txtEmail);
        txtEmail.setBounds(80, 150, 218, 30);

        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("Introduzca su contraseña");
        jpLogin.add(jLabel2);
        jLabel2.setBounds(110, 230, 169, 16);

        btnSubmit.setText("Entrar al chat");
        btnSubmit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSubmitActionPerformed(evt);
            }
        });
        jpLogin.add(btnSubmit);
        btnSubmit.setBounds(120, 340, 140, 40);

        txtPass.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        txtPass.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                txtPassActionPerformed(evt);
            }
        });
        jpLogin.add(txtPass);
        txtPass.setBounds(90, 270, 200, 30);

        txtFailed.setForeground(new java.awt.Color(204, 0, 51));
        txtFailed.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jpLogin.add(txtFailed);
        txtFailed.setBounds(30, 190, 240, 30);

        jpLoggin.add(jpLogin);
        jpLogin.setBounds(0, 0, 380, 460);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jpLoggin, javax.swing.GroupLayout.DEFAULT_SIZE, 381, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jpLoggin, javax.swing.GroupLayout.DEFAULT_SIZE, 462, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btnSubmitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSubmitActionPerformed
        String pass = txtPass.getText();
        ChatClient cc = openChat(logged, pass);
        cc.receiveMessages();
        if(cc.connected()){
            jpLogin.setVisible(false);
            jpChat.setVisible(true);
            printChat();
        }
    }//GEN-LAST:event_btnSubmitActionPerformed

    private void txtPassActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtPassActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtPassActionPerformed

    private void txtInputActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_txtInputActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_txtInputActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        if(!txtInput.getText().equals("")){
            String message = txtInput.getText();
            txtInput.setText("");
            printOwnMessageOnChat(message);
        }
    }//GEN-LAST:event_jButton1ActionPerformed

    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            UIManager.setLookAndFeel(new MaterialLookAndFeel(new MaterialLiteTheme()));
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(App.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
    }
    
    // MQTT Client Functions 
    public ChatClient openChat(Empleado logged, String password){
        ChatClient cc = new ChatClient(logged, password,this.topic, this);
        this.cc = cc;
        mqttClient = cc.getMqttConnector();
        mqttClient.setChatPanel(this);
        return cc;
    }
    
    public void printChat(){
        DefaultTableModel model = (DefaultTableModel) jtChat.getModel();
        for( int i = model.getRowCount() - 1; i >= 0; i-- ) {
            model.removeRow(i);
        }
    }
    
    public void printOwnMessageOnChat(String message){
        mqttClient.publishMessage(topic, message);
        DefaultTableModel model = (DefaultTableModel) jtChat.getModel();
        model.addRow(new Object[]{"Tú -> " + message});
    }
    
    public static void printRemoteMessageOnChat(MqttMessage message, Chat chat){
        List<UserProperty> props = message.getProperties().getUserProperties();
        
        DefaultTableModel model = (DefaultTableModel) chat.jtChat.getModel();
        model.addRow(new Object[]{props.get(0).getValue().substring(0, props.get(0).getValue().indexOf("@")) + " -> " + message});
    }
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnSubmit;
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JPanel jpChat;
    private javax.swing.JLayeredPane jpLoggin;
    private javax.swing.JPanel jpLogin;
    private javax.swing.JTable jtChat;
    private javax.swing.JLabel txtEmail;
    public javax.swing.JLabel txtFailed;
    private javax.swing.JTextField txtInput;
    private javax.swing.JPasswordField txtPass;
    // End of variables declaration//GEN-END:variables
}
