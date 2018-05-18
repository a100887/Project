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
public class DeleteClientTest {
    
    public DeleteClientTest() {
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
     * Test of delClient method, of class DeleteClient.
     */
    @Test
    public void testDelClient() {
        System.out.println("delClient");
        String cId = "20";
        DeleteClient instance = new DeleteClient();
        instance.delClient(cId);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of isNotEmpty method, of class DeleteClient.
     */
    @Test
    public void testIsNotEmpty() {
        System.out.println("isNotEmpty");
        String cId = "";
        DeleteClient instance = new DeleteClient();
        boolean expResult = false;
        boolean result = instance.isNotEmpty(cId);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }

    /**
     * Test of main method, of class DeleteClient.
     */
    @Test
    public void testMain() {
        System.out.println("main");
        String[] args = null;
        DeleteClient.main(args);
        // TODO review the generated test code and remove the default call to fail.
        fail("The test case is a prototype.");
    }
    
}
