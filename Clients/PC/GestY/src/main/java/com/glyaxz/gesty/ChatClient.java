/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author bokax
 */
public class ChatClient {

    private MQTTConnector mqttClient;
    private String topic;
    private String clientId;
    private boolean connected = false;
    private Chat chat;

    public ChatClient(Empleado logged, String password, String topic, Chat chat) {
        this.topic = topic;
        this.chat = chat;
        mqttClient = new MQTTConnector(logged, password);
        mqttClient.subscribeToTopic(topic, (s, mqttMessage) -> {
            String message = new String(mqttMessage.getPayload());
            System.out.println("Received message: " + message);
        });
        
        if(mqttClient.connected()){
            this.connected = true;
        }
    }

    public void sendMessage(String message) {
        mqttClient.publishMessage(topic, message);
    }

    public void disconnect() {
        mqttClient.disconnect();
    }
    
    
    public void receiveMessages() {
        Thread t = new Thread( () -> {
            boolean connected = true;
            while(connected){
                try{
                    connected = mqttClient.subscribeToTopic(this.topic, (s, mqttMessage) -> {
                        String message = new String(mqttMessage.getPayload());
                        String props = new String(mqttMessage.getProperties().getAuthenticationData().toString());
                    });
                }catch(Exception e){
                    System.err.println("Not authorized");
                    break;
                }
                
                if(!connected){
                    chat.txtFailed.setText("Las credenciales no son válidas");
                }
                
                try {
                    Thread.sleep(1000); // Espera de 1 segundo antes de volver a verificar nuevos mensajes.
                } catch (InterruptedException e) {
                    System.err.println(e.getMessage());
                }
            }
        });
        t.start();
    }
    
    public boolean connected(){
        return this.connected;
    }
    
    public MQTTConnector getMqttConnector(){
        return this.mqttClient;
    }
}
