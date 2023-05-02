/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;

import java.io.IOException;
import java.util.List;
import java.util.ArrayList;
import org.apache.hc.client5.http.classic.methods.HttpPost;
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

/**
 *
 * @author bokax
 */
public class GestyConnector {
    
    /**
     * Token de conexion a la aplicacion
     */
    private final String token = "3sJak0orV9ysH0GBV2PZBDPqiIBroEZI";
    private String sessionId = "";
    Empleado logged = null;

    public Empleado login(String email, String password) {
        boolean isValid = false;
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("http://localhost:8000/api/login-user");
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
                        logged = new Empleado(email, sessionId);
                    } catch (ParseException e) {
                        e.printStackTrace();
                        isValid = false;
                    }
                }
            } finally {
                httpClient.close();
                response.close();
            }
        } catch (IOException ex) {
            ex.printStackTrace();
            return null;
        }
        return logged;
    }

    public Empleado getUserLogged(){
        return logged;
    }

    public String checkRef(String companyRef, String sessionId) {
        String isValid = null;
        CloseableHttpClient httpClient = HttpClients.createDefault();

        try {
            HttpPost request = new HttpPost("http://localhost:8000/api/check-ref");
            request.setHeader(HttpHeaders.USER_AGENT, "Mozilla/5.0");
            request.setHeader("Authorization", token);
            request.setHeader("gesty_session", sessionId);

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
}
