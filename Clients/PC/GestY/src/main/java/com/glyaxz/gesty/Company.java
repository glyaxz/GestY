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

    /**
     * Create new company
     * @param id
     * @param name
     * @param companyRef 
     */
    public Company(int id, String name, String companyRef){
        gc = new GestyConnector();
        this.id = id;
        this.name = name;
        this.companyRef = companyRef;
        projects = new ArrayList<>();
    }

    /**
     * Create a new company from JsonObject
     * @param json 
     */
    public Company(JsonObject json){
        gc = new GestyConnector();
        id = json.get("id").getAsInt();
        name = json.get("company_name").getAsString();
        companyRef = json.get("company_ref").getAsString();
        projects = new ArrayList<>();
    }

    //Getters & Setters
    /**
     * Set a new company name
     * @param name 
     */
    public void setName(String name){
        this.name = name;
    }
    /**
     * Get company's name
     * @return 
     */
    public String getName(){
        return this.name;
    }
    /**
     * Set a new company reference
     * @param companyRef 
     */
    public void setCompanyRef(String companyRef){
        this.companyRef = companyRef;
    }
    
    /**
     * Get company's reference
     * @return String
     */
    public String getCompanyRef(){
        return this.companyRef;
    }
    
    /**
     * Set a new company ID
     * @param id 
     */
    public void setId(int id){
        this.id = id;
    }
    
    /**
     * Get company's ID
     * @return 
     */
    public int getId(){
        return this.id;
    }
    
    /**
     * Get all projects from company
     * @return List<Project>
     */
    public List<Project> getProjects(){
        return this.projects;
    }

    /**
     * Set a new project's list 
     * @param projects 
     */
    public void setProjects(List<Project> projects){
        this.projects = projects;
    }
    
    
}
