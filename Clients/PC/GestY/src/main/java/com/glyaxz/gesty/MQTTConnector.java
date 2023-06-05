/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import java.util.ArrayList;
import java.util.List;
import org.eclipse.paho.mqttv5.client.*;
import org.eclipse.paho.mqttv5.client.persist.MemoryPersistence;
import org.eclipse.paho.mqttv5.common.*;
import org.eclipse.paho.mqttv5.common.packet.MqttProperties;
import org.eclipse.paho.mqttv5.common.packet.UserProperty;

/**
 *
 * @author Javier Garcia
 */
public class MQTTConnector {
    
    private MqttClient mqttClient;
    private boolean connected = false;
    private Empleado logged;
    private String password;
    MemoryPersistence mp = new MemoryPersistence();
    private Chat chat;
    
    public MQTTConnector(Empleado logged, String password) {
        this.logged = logged;
        this.password = password;
        try {
            mqttClient = new MqttClient("ssl://e7fa393ea4af4647a2482dffccd1d654.s2.eu.hivemq.cloud:8883", logged.getSessionId(), mp);
            MqttConnectionOptions options = new MqttConnectionOptions();
            options.setCleanStart(true);
            options.setUserName(logged.getEmail());
            options.setPassword(password.getBytes());
            
            mqttClient.setCallback(new MqttCallback() {
                public void connectionLost(Throwable cause) {
                    System.out.println("Lost connection");
                    cause.printStackTrace(); //EOFException thrown here within a few seconds
                }

                @Override
                public void messageArrived(String topic, MqttMessage message) throws Exception {
                    System.out.println("Ha llegado un mensaje: " + message.toString());
                    List<UserProperty> userProps = message.getProperties().getUserProperties();
                    UserProperty up = userProps.get(0);
                    if(!up.getValue().equals(logged.getEmail())){ 
                        Chat.printRemoteMessageOnChat(message, chat);
                    }
                }
                
                public void deliveryComplete(IMqttDeliveryToken token) {
                    System.out.println("Delivery Done!  ");
                }

                @Override
                public void disconnected(MqttDisconnectResponse mdr) {
                    System.out.println(mdr.getReasonString());
                    disconnect();
                }

                @Override
                public void mqttErrorOccurred(MqttException me) {
                    throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
                }

                @Override
                public void deliveryComplete(IMqttToken imt) {
                    throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
                }

                @Override
                public void connectComplete(boolean bln, String string) {
                    throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
                }

                @Override
                public void authPacketArrived(int i, MqttProperties mp) {
                    throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
                }
            });
            IMqttToken token = mqttClient.connectWithResult(options);
            
            token.waitForCompletion();
            this.connected = mqttClient.isConnected();
            

        } catch (MqttException e) {
            System.out.println("error");
            e.printStackTrace();
        }
    }

    public boolean subscribeToTopic(String topic, IMqttMessageListener listener) {
        try {
            mqttClient.subscribe(topic, 1);
            return true;
        } catch (MqttException e) {
            System.err.println("No posible");
            return false;
        }
    }

    public void publishMessage(String topic, String message) {
        try {
            MqttMessage mqttMessage = new MqttMessage(message.getBytes());
            MqttProperties props = new MqttProperties();
            List<UserProperty> userprop = new ArrayList<>();
            userprop.add(new UserProperty("user", logged.getEmail()));
            props.setUserProperties(userprop);
            mqttMessage.setProperties(props);
            System.out.println(mqttMessage.getProperties().toString());
            mqttClient.publish(topic, mqttMessage);
        } catch (MqttException e) {
            e.printStackTrace();
        }
    }

    public void disconnect() {
        try {
            mqttClient.disconnect();
        } catch (MqttException e) {
            e.printStackTrace();
        }
    }
    
    public boolean connected(){
        return this.connected;
    }
    
    public void setChatPanel(Chat chat){
        this.chat = chat;
    }
}
