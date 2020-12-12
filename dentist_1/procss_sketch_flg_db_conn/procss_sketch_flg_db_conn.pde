
import de.bezier.data.sql.*;  //import the MySQL library
import processing.serial.*;   //import the Serial library

MySQL msql;      //Create MySQL Object
String[] a;
int flag=0;
int end = 10;    // the number 10 is ASCII for linefeed (end of serial.println), later we will look for this to break up individual messages
String serial;   // declare a new string called 'serial' . A string is a sequence of characters (data type know as "char")
Serial port;     // The serial port, this is a new instance of the Serial class (an Object)

void setup() {
  String user     = "root";
  String pass     = "";
  String database = "dentist_1";
  
  msql = new MySQL( this, "localhost", database, user, pass );
    
  port = new Serial(this, Serial.list()[2], 9600); // initializing the object by assigning a port and baud rate (must match that of Arduino)
  port.clear();  // function from serial library that throws out the first reading, in case we started reading in the middle of a string from Arduino
  serial = port.readStringUntil(end); // function that reads the string from serial port until a println and then assigns string to our string variable (called 'serial')
  serial = null; // initially, the string will be null (empty)
}

void draw() 
{
  
  while (port.available() > 0) 
  { 
    //as long as there is data coming from serial port, read it and store it 
    serial = port.readStringUntil(end);
  }
    if (serial != null) 
    {  
      //if the string is not empty, print the following
      //Note: the split function used below is not necessary if sending only a single variable. However, it is useful for parsing (separating) messages when
      //reading from multiple inputs in Arduino. Below is example code for an Arduino sketch
    
      //str = serial;
      a = split(serial, ',');  //a new array (called 'a') that stores values into separate cells (separated by commas specified in your Arduino program)
      println(a[0]); //print LDR value
      println(a[1]); //print LM35 value
      
      // here a[0] is button and a[1] is value of temp.
      
      //println("yes we are trying");
      function();
    }
}

void function()
{
  if ( msql.connect() )
    {
      msql.query("UPDATE flag SET button="+int(a[0])+" WHERE id='1'");
      msql.query("SELECT flag FROM `flag` WHERE id='1'");
      while(msql.next()){
        flag = msql.getInt("flag");
      }
      if(flag==0)
      {
        if(int(a[0]) == 1)
        {
          msql.query("insert into temp(temp) VALUES("+a[1]+")");
          msql.query("UPDATE flag SET flag=1 WHERE id='1'");
        }  
      }
      
       // msql.query( "insert into data(LDR,Temp)values("+a[0]+","+a[1]+")" );      
    }
    else
    {
        // connection failed !
    }
    msql.close();  //Must close MySQL connection after Execution
}
