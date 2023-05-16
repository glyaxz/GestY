/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.glyaxz.gesty;
import javax.swing.JTextField;
import javax.swing.text.AttributeSet;
import javax.swing.text.BadLocationException;
import javax.swing.text.PlainDocument;
/**
 *
 * @author Javier Garcia
 */


public class LimitedTextField extends JTextField {
    private static final long serialVersionUID = 1L;
    private int limit;

    public LimitedTextField(int limit) {
        super();
        this.limit = limit;
        this.setDocument(new LimitedDocument());
    }

    private class LimitedDocument extends PlainDocument {
        private static final long serialVersionUID = 1L;

        @Override
        public void insertString(int offset, String str, AttributeSet attr) throws BadLocationException {
            if (str == null) {
                return;
            }

            if ((getLength() + str.length()) <= limit) {
                super.insertString(offset, str, attr);
            }
        }
    }

    public int getLimit() {
        return limit;
    }

    public void setLimit(int limit) {
        this.limit = limit;
    }

}

