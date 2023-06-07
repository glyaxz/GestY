/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import com.google.gson.Gson;
import com.google.gson.JsonObject;
import java.util.List;
import javax.swing.JDialog;

/**
 *
 * @author Javier Garcia
 */
public class Empleado extends User{
    private GestyConnector gc;
    private String companyId;
    private Company company;

    public Empleado(String email, String sessionId, String companyId) {
        super(email, sessionId);
        this.companyId = companyId;
        this.company = null;
        gc = new GestyConnector();
    }

    public Empleado(String email, String sessionId) {
        super(email, sessionId);
        this.companyId = null;
        gc = new GestyConnector();
        this.company = gc.getCompany(this);
    }
    
    public void setCompanyRef(String companyId){
        GestyConnector gc = new GestyConnector();
        String company = gc.checkRef(companyId, super.getSessionId());
        Gson gson = new Gson();
        JsonObject obj = gson.fromJson(company, JsonObject.class);
        String companyName = obj.get("company_name").getAsString();
    }
    
    public String getCompanyId(){
        return this.companyId;
    }
    
    public void setCompanyId(int id){
        this.companyId = String.valueOf(id);
    }

    @Override
    public String toString(){
        return "email: " + this.getEmail() + ", sessionId: " + this.getSessionId();
    }

    public Company getCompany(){
        return this.company;
    }

    public void setCompany(){
        this.company = gc.getCompany(this);
    }
    
    public void setProjects(){
        List<Project> projects = gc.getProjects(this);
        this.company.setProjects(projects);
        
    }
    public List<Project> getProjects(){
        return this.company.getProjects();
    }
    
    public Project getProjectFromName(String param){
        Project[] valid = new Project[1];
        List<Project> projects = company.getProjects();
        projects.forEach(p -> {
            if(p.getName().equals(param)){ valid[0] = p; }
        });
        return valid[0];
    }
    
    public Task getTaskFromName(String param, String projectName){
        Task task;
        Project p = getProjectFromName(projectName);
        List<Task> tasks = p.getTasks();
        task = tasks.stream().filter(t -> t.getName() == param).findAny().get();
        return task;
    }
}
