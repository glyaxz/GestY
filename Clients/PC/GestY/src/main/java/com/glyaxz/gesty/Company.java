/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author Javier Garcia
 */
public class Company {
    //Variables
    private String name, companyRef;
    private int id;

    public Company(int id, String name, String companyRef){
        this.id = id;
        this.name = name;
        this.companyRef = companyRef;
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
}
