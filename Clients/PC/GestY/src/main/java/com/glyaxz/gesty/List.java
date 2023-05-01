/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author Javier Garcia
 */
public class List {
    //variables
    private String name;
    private int id;
    private Project project;

    public List(String name, int id, Project project){
        this.name = name;
        this.id = id;
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
    public void setProject(Project project){
        this.project = project;
    }
    public Project getProject(){
        return this.project;        
    }
}
