
bool button=0;
bool flag=0;
int temp;
long long int cnt=0;



void setup() {
  Serial.begin(9600);
  cnt =0;
  pinMode(7,INPUT);
}


void loop() {
  
  cnt++;
  temp++;
  button = !digitalRead(7);
  /*
  if(cnt==0)
    button=1;
  if(cnt>6)
  {
    button = 0;
    cnt=-2;
  }*/

  // artificial pressing of button !!!!!!!!!!!!!!!!!!
  // uncomment is using the actual button !!!!!!!!
  if(cnt==0)
  {
    button = 1;
  }
  if(cnt>10)
  {
    button = 0;
    if(cnt>30)
      cnt=0;
  }
  
  if(temp>200)
  {
    temp=10;
  }
  Serial.print(button);
  Serial.print(',');
  Serial.println(temp);
  delay(100);
}
