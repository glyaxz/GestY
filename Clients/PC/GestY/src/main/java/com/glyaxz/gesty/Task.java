/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import com.google.gson.JsonObject;

/**
 *
 * @author Javier Garcia
 */
public class Task {
    private String name;
    private String description;
    private int id;
    private Project project;

    public Task(String name, String desc, int id){
        this.name = name;
        this.description = desc;
        this.id = id;
    }

    public Task(JsonObject json, Project project){
        this.name = json.get("task_name").getAsString();
        this.description = json.get("task_desc").getAsString();
        this.id = json.get("id").getAsInt();
        this.project = project;
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
    public void setDesc(String desc){
        this.description = desc;
    }
    public String getDesc(){
        return this.description;
    }
}
