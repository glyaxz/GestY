/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author Javier Garcia
 */
public class User {
    //Variables
    public String email, sessionId;

    public User(String email, String sessionId){
        this.email = email;
        this.sessionId = sessionId;
    }

    //Getters and Setters
    public String getEmail(){
        return this.email;
    }
    public void setEmail(String email){
        this.email = email;
    }
    public String getSessionId(){
        return this.sessionId;
    }
    public void setSessionId(String sessionId){
        this.sessionId = sessionId;
    }
}