/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author Javier Garcia
 */
public class Project {
    private String name;
    private int id;
    private Company company;
    private Task[] tasks;

    public Project(String name, int id, Company company){
        this.name = name;
        this.id = id;
        this.company = company;
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
}
