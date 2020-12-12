import de.bezier.data.sql.*;  //import the MySQL library
import processing.serial.*;   //import the Serial library
import java.lang.reflect.Array;


MySQL msql;      //Create MySQL Object
String[] a;
int flag=0;
int end = 10;    // the number 10 is ASCII for linefeed (end of serial.println), later we will look for this to break up individual messages
String serial;   // declare a new string called 'serial' . A string is a sequence of characters (data type know as "char")
Serial port;     // The serial port, this is a new instance of the Serial class (an Object)

String[] temp={"","","",""};

int teeth, side=0, side_t,u_id;

void setup() {
  String user     = "root";
  String pass     = "";
  String database = "dentist_2";
  
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
      a = split(serial, ',');  
      //println(a[0]); //print button value
      //println(a[1]); //print temp value
      
      // here a[0] is button and a[1] is value of temp.
      
      //println("yes we are trying");
      function();
    }
    delay(500);
}

void function()
{
  if ( msql.connect() )
    {
      // setting button and obtaining flag state
      msql.query("UPDATE flags SET button="+int(a[0])+" WHERE id='1'");
      msql.query("SELECT flag FROM flags WHERE id='1'");
      while(msql.next()){
        flag = msql.getInt("flag");
      }
      
      // checking teeth no. and side no.
      
      msql.query("SELECT side FROM flags WHERE id='1'");
      while(msql.next()){
        side = msql.getInt("side");
      }
      
      teeth = int(side/4) + 1;
      side_t = int(side%4) + 1;
      
      
      if(flag==0 && side<128)
      {
        
        msql.query("SELECT user_id FROM flags WHERE id='1'");
        while(msql.next()){
          u_id = msql.getInt("user_id");
        }
        
        if(int(a[0]) == 1)
        {
          //msql.query("insert into temp(temp) VALUES("+a[1]+")");
          temp[side_t-1] = a[1];
          println(temp[side_t-1]+"press detected"+a[1]);
          msql.query("UPDATE t"+teeth+" SET temp"+side_t+"="+a[1]+" WHERE t_id="+u_id+" ;");
          /*if(side_t==4)
          {
            msql.query("INSERT INTO t"+teeth+"(temp1,temp2,temp3,temp4) VALUES("+temp[0]+","+temp[1]+","+temp[2]+","+temp[3]+");");
            println("Temp must be entered");
          }*/
          msql.query("UPDATE flags SET flag=1 WHERE id='1'");
          side=side+1;
          //if(side==128) side=0;
          msql.query("UPDATE flags SET side="+side+" WHERE id='1'");
          
          
        }  
      }
        
    }
    else
    {
        // connection failed !
    }
    msql.close();  //Must close MySQL connection after Execution
}
