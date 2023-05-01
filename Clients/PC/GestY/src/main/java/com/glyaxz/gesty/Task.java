/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

/**
 *
 * @author Javier Garcia
 */
public class Task {
    private String name;
    private int id;
    private List list;

    public Task(String name, int id, List list){
        this.name = name;
        this.id = id;
        this.list = list;
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
    public void setList(List list){
        this.list = list;
    }
    public List getList(){
        return this.list;
    }
}
