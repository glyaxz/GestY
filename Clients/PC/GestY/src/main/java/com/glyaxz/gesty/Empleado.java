/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import com.google.gson.Gson;
import com.google.gson.JsonObject;

/**
 *
 * @author bokax
 */
public class Empleado extends User{
    GestyConnector gc;
    private String companyRef;

    public Empleado(String email, String sessionId) {
        super(email, sessionId);
        gc = new GestyConnector();
    }
    
    public void setCompanyRef(String companyRef){
        GestyConnector gc = new GestyConnector();
        String company = gc.checkRef(companyRef, super.getSessionId());
        Gson gson = new Gson();
        JsonObject obj = gson.fromJson(company, JsonObject.class);
        String companyName = obj.get("company_name").getAsString();
        System.out.println(companyName);
    }
    public String getCompanyRef(){
        return this.companyRef;
    }


}
