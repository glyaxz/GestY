/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import com.google.gson.Gson;
import com.google.gson.JsonObject;

/**
 *
 * @author Javier Garcia
 */
public class Empleado extends User{
    GestyConnector gc;
    private String companyId;

    public Empleado(String email, String sessionId, String companyId) {
        super(email, sessionId);
        this.companyId = companyId;
        gc = new GestyConnector();
    }

    public Empleado(String email, String sessionId) {
        super(email, sessionId);
        this.companyId = null;
        gc = new GestyConnector();
    }
    
    public void setCompanyRef(String companyId){
        GestyConnector gc = new GestyConnector();
        String company = gc.checkRef(companyId, super.getSessionId());
        Gson gson = new Gson();
        JsonObject obj = gson.fromJson(company, JsonObject.class);
        String companyName = obj.get("company_name").getAsString();
        System.out.println("DEBUG: " + companyName);
    }
    public String getCompanyId(){
        return this.companyId;
    }
    
    public void setCompanyId(int id){
        this.companyId = String.valueOf(id);
    }

    @Override
    public String toString(){
        return "email: " + this.getEmail() + ", sessionId: " + this.getSessionId();
    }
}
