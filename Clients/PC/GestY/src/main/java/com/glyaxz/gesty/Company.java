/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import java.util.List;

import com.google.gson.JsonObject;
import java.util.ArrayList;

/**
 *
 * @author Javier Garcia
 */
public class Company {
    //Variables
    private GestyConnector gc;
    private String name, companyRef;
    private int id;
    private List<Project> projects;

    public Company(int id, String name, String companyRef){
        gc = new GestyConnector();
        this.id = id;
        this.name = name;
        this.companyRef = companyRef;
        projects = new ArrayList<>();
    }

    public Company(JsonObject json){
        gc = new GestyConnector();
        id = json.get("id").getAsInt();
        name = json.get("company_name").getAsString();
        companyRef = json.get("company_ref").getAsString();
        projects = new ArrayList<>();
    }

    //Getters & Setters
    public void setName(String name){
        this.name = name;
    }
    public String getName(){
        return this.name;
    }
    public void setCompanyRef(String companyRef){
        this.companyRef = companyRef;
    }
    public String getCompanyRef(){
        return this.companyRef;
    }
    public void setId(int id){
        this.id = id;
    }
    public int getId(){
        return this.id;
    }
    public List<Project> getProjects(){
        return this.projects;
    }

    public void setProjects(List<Project> projects){
        this.projects = projects;
        
    }
    
    
}
