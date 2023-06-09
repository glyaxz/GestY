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
     * Create a new company
     * @param id id
     * @param name name
     * @param companyRef conpanyRef
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
     * @param json json
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
     * @param name name
     */
    public void setName(String name){
        this.name = name;
    }
    /**
     * Get company name
     * @return name
     */
    public String getName(){
        return this.name;
    }
    /**
     * Set a new company reference
     * @param companyRef companyRef
     */
    public void setCompanyRef(String companyRef){
        this.companyRef = companyRef;
    }
    
    /**
     * Get company reference
     * @return String companyRef
     */
    public String getCompanyRef(){
        return this.companyRef;
    }
    
    /**
     * Set a new company ID
     * @param id  id
     */
    public void setId(int id){
        this.id = id;
    }
    
    /**
     * Get company ID
     * @return id
     */
    public int getId(){
        return this.id;
    }
    
    /**
     * Get all projects from company
     * @return projects
     */
    public List<Project> getProjects(){
        return this.projects;
    }

    /**
     * Set a new projects list 
     * @param projects projects
     */
    public void setProjects(List<Project> projects){
        this.projects = projects;
    }
    
    
}
