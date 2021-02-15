# Teeth Temperature Measurement Interface Design 
This project handles the structure from taking sensory data from Arduino and showcasing it simultaneously on a locally hosted webpage. A local medical student approached me with the problem of interfacing Arduino to a webpage. This project would be fused with a sensor, to get side temperatures of teeth in a human mouth, and keep a visual track of the temperatures.

This project has been simplified into 4 main sections and each was implemented in an ordered fashion, to finish the project:
![alt text](DENTIST/images/structure1.png?raw=true)

Arduino - This stage takes up sensory data and transmits it to the processing sketch via the Serial port. 

Processing Sketch - This sketch is responsible for communicating with the local database. With a press of a button, it registers the temperature into the appropriate place in the database. (Processing 2.2.1 was used for this project)

The Database - It has a structure, which allows smooth transmission of data between processing sketch and the webpage. Xampp has been used to create a local database. 

![alt text](DENTIST/images/Screenshot%20(123).png?raw=true)

The Webpage - It has 2 major functions. First one is to take up the patient data and the second one is to display registered temperatures of the teeth of the patient. A reset database page has also been created for user convenience.

![alt text](DENTIST/images/Screenshot%20(106).png?raw=true)

![alt text](DENTIST/images/Screenshot%20(117).png?raw=true)

*Main code resides in DENTIST folder.*
