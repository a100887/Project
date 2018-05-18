/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Silvan Vella <your.name at your.org>
 */
public class InsertProductTest {
    
    public InsertProductTest() {
    }
    
    @BeforeClass
    public static void setUpClass() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }
    
    @Before
    public void setUp() {
    }
    
    @After
    public void tearDown() {
    }

    /**
     * Test of isNotEmpty method, of class InsertProduct.
     */
    @Test
    public void testIsNotEmpty() {
        System.out.println("isNotEmpty");
        String name = "";
        String stock = "";
        String price = "";
        String image = "";
        String description = "";
        InsertProduct instance = new InsertProduct();
        boolean expResult = false;
        boolean result = instance.isNotEmpty(name, stock, price, image, description);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of isAlphabetic method, of class InsertProduct.
     */
    @Test
    public void testIsAlphabetic() {
        System.out.println("isAlphabetic");
        String data = "abc";
        InsertProduct instance = new InsertProduct();
        boolean expResult = true;
        boolean result = instance.isAlphabetic(data);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of insertProduct method, of class InsertProduct.
     */
    @Test
    public void testInsertProduct() {
        System.out.println("insertProduct");
        String name = "";
        String stock = "";
        String price = "";
        String image = "";
        String description = "";
        int category = 0;
        int manufacturer = 0;
        int colour = 0;
        InsertProduct instance = new InsertProduct();
        instance.insertProduct(name, stock, price, image, description, category, manufacturer, colour);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of getCategory method, of class InsertProduct.
     */
    @Test
    public void testGetCategory() {
        System.out.println("getCategory");
        InsertProduct instance = new InsertProduct();
        instance.getCategory();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getManufacturer method, of class InsertProduct.
     */
    @Test
    public void testGetManufacturer() {
        System.out.println("getManufacturer");
        InsertProduct instance = new InsertProduct();
        instance.getManufacturer();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of getColour method, of class InsertProduct.
     */
    @Test
    public void testGetColour() {
        System.out.println("getColour");
        InsertProduct instance = new InsertProduct();
        instance.getColour();
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of main method, of class InsertProduct.
     */
    @Test
    public void testMain() {
        System.out.println("main");
        String[] args = null;
        InsertProduct.main(args);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }
    
}
