/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import java.io.IOException;
import java.util.List;

import java.util.ArrayList;
import org.apache.hc.client5.http.classic.methods.HttpPost;
import org.apache.hc.client5.http.classic.methods.HttpPut;
import org.apache.hc.client5.http.entity.UrlEncodedFormEntity;
import org.apache.hc.client5.http.impl.classic.CloseableHttpClient;
import org.apache.hc.client5.http.impl.classic.CloseableHttpResponse;
import org.apache.hc.client5.http.impl.classic.HttpClients;
import org.apache.hc.core5.http.HttpEntity;
import org.apache.hc.core5.http.HttpHeaders;
import org.apache.hc.core5.http.NameValuePair;
import org.apache.hc.core5.http.ParseException;
import org.apache.hc.core5.http.io.entity.EntityUtils;
import org.apache.hc.core5.http.message.BasicNameValuePair;

import com.google.gson.Gson;
import com.google.gson.JsonObject;
/**
 *
 * @author Javier Garcia
 */
public class GestyConnector {
    
    /**
     * Token de conexion a la aplicacion
     */
    private final String token = "3sJak0orV9ysH0GBV2PZBDPqiIBroEZI";
    private String sessionId = "";
    Empleado logged = null;

    public Empleado login(String email, String password) {
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("https://gesty.devf6.es/api/login-user");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);

            List<NameValuePair> params = new ArrayList<>();
            params.add(new BasicNameValuePair("email", email));
            params.add(new BasicNameValuePair("password", password));
            request.setEntity(new UrlEncodedFormEntity(params));

            CloseableHttpResponse response = httpClient.execute(request);
            try {
                HttpEntity entity = response.getEntity();
                if (entity != null) {
                    String result;
                    try {
                        result = EntityUtils.toString(entity);
                        String formatted = result.replace("\"","");
                        sessionId = formatted.substring(formatted.indexOf("|") + 1);
                        System.out.println("DEBUG: " + sessionId);
                        if(!sessionId.contains("<!DOCTYPE html>")){
                            logged = new Empleado(email, sessionId);
                            System.out.println("DEBUG: " + logged);
                            return logged;
                        }else{
                            return null;
                        } 
                    } catch (ParseException e) {
                        e.printStackTrace();
                        return null;
                    }
                }else{
                    return null;
                }
            } finally {
                httpClient.close();
                response.close();
            }
        } catch (IOException ex) {
            ex.printStackTrace();
            return null;
        }
    }
    
    public Empleado getUserLogged(){
        return logged;
    }

    public String checkRef(String companyRef, String sessionId) {
        String isValid = null;
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("https://gesty.devf6.es/api/check-ref");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);

            List<NameValuePair> params = new ArrayList<>();
            params.add(new BasicNameValuePair("companyRef", companyRef));
            request.setEntity(new UrlEncodedFormEntity(params));

            CloseableHttpResponse response = httpClient.execute(request);
            try {
                HttpEntity entity = response.getEntity();
                if (entity != null) {
                    String result = EntityUtils.toString(entity);
                    String formatted = result.replace("\"","");
                    if(!formatted.equals("")){
                        String company = formatted.substring(formatted.indexOf("|") + 1);
                        isValid = company;
                    }else{
                        isValid = null;
                    }
                }
            } finally {
                httpClient.close();
                response.close();
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        } finally {
            try {
                httpClient.close();
            } catch (IOException ex) {
                ex.printStackTrace();
            }
            return isValid;
        }
    }

    public boolean hasRef(Empleado empleado){
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("https://gesty.devf6.es/api/check-user-ref");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);

            List<NameValuePair> params = new ArrayList<>();
            params.add(new BasicNameValuePair("email", empleado.getEmail()));
            request.setEntity(new UrlEncodedFormEntity(params));

            CloseableHttpResponse response = httpClient.execute(request);
            try {
                HttpEntity entity = response.getEntity();
                if (entity != null) {
                    try{
                        String result = EntityUtils.toString(entity);
                        
                        if(!result.equals("")){
                            Gson gson = new Gson();
                            JsonObject obj =  gson.fromJson(result, JsonObject.class);
                            int setted = obj.get("company_id").getAsInt();
                            this.logged.setCompanyId(setted);
                            return true;
                        }else{
                            return false;
                        }
                    }catch(ParseException e){
                        e.printStackTrace();
                        return false;
                    }
                }
                httpClient.close();
                response.close();
                return false;
            }catch (IOException ex) {
                ex.printStackTrace();
                return false;
           }
        }catch(Exception e){
            e.printStackTrace();
            return false;
        }
    }

    public boolean setUserRef(Empleado logged, String ref){
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPut request = new HttpPut("https://gesty.devf6.es/api/set-user-ref");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);

            List<NameValuePair> params = new ArrayList<>();
            params.add(new BasicNameValuePair("company_ref", ref));
            params.add(new BasicNameValuePair("email", logged.getEmail()));
            request.setEntity(new UrlEncodedFormEntity(params));

            CloseableHttpResponse response = httpClient.execute(request);
            try {
                HttpEntity entity = response.getEntity();
                if (entity != null) {
                    String result = EntityUtils.toString(entity);
                    if(!result.equals("")){
                        logged.setCompanyRef(ref);
                        httpClient.close();
                        response.close();
                        return true;
                    }else{
                        httpClient.close();
                        response.close();
                        return false;
                    }
                }
            }catch(ParseException e){
                e.printStackTrace();
                httpClient.close();
                response.close();
                return false;
            }
        } catch (IOException ex) {
            ex.printStackTrace();
            return false;
        }
        return false;
    }

    //public Company getCompany(){
    public Company getCompany(Empleado logged){
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("https://gesty.devf6.es/api/get-company");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);

            List<NameValuePair> params = new ArrayList<>();
            params.add(new BasicNameValuePair("company_id", logged.getCompanyId()));
            request.setEntity(new UrlEncodedFormEntity(params));

            CloseableHttpResponse response = httpClient.execute(request);
            try {
                HttpEntity entity = response.getEntity();
                if (entity != null) {
                    String result = EntityUtils.toString(entity);
                    System.out.println("DEBUG: " + result);
                    if(!result.equals("")){
                        Gson gson = new Gson(); 
                        JsonObject list = gson.fromJson(result, JsonObject.class);
                        httpClient.close();
                        response.close();
                        return new Company(list);                
                    }else{
                        httpClient.close();
                        response.close();
                        return null;
                    }
                }
            }catch(ParseException e){
                e.printStackTrace();
                httpClient.close();
                response.close();
                return null;
            }
        } catch (IOException ex) {
            ex.printStackTrace();
            return null;
        }
        return null;
    }
}
