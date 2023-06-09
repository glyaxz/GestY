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
public class Project {
    private String name;
    private int id;
    private Company company;
    private List<Task> tasks;
    GestyConnector gc;

    public Project(String name, int id, Company company){
        this.name = name;
        this.id = id;
        this.company = company;
        this.gc = new GestyConnector();
        tasks = new ArrayList<>();
    }

    public Project(JsonObject json, Empleado logged){
        this.gc = new GestyConnector();
        this.name = json.get("project_name").getAsString();
        this.id = json.get("project_id").getAsInt();
        this.company = logged.getCompany();
        tasks = new ArrayList<>();

    }

    public void setName(String name){
        this.name = name;        
    }
    public String getName(){
        return this.name;        
    }
    public void setId(int id){
        this.id = id;
    }
    public int getId(){
        return this.id;
    }
    public void setCompany(Company company){
        this.company = company;
    }
    public Company getCompany(){
        return this.company;
    }
    public void setTasks(List<Task> tasks){
        this.tasks = tasks;
    }
    
    /**
     * Get a list of Tasks assigned to this project
     * @param logged logged 
     * @return tasks
     */
    public List<Task> getTasks(Empleado logged){
        this.tasks = gc.getTasks(this, logged);
        return this.tasks;
    }
    public List<Task> getTasks(){
        return this.tasks;
    }
}
