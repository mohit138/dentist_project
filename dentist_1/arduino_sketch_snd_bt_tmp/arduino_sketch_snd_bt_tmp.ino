
bool button=0;
bool flag=0;
int temp;
long long int cnt=0;

void setup() {
  Serial.begin(9600);
  cnt =0;

}


void loop() {
  cnt++;
  temp++;
  if(cnt==0)
    button=1;
  if(cnt>10)
  {
    button = 0;
    cnt=-4;
  }
  
  
  if(temp>200)
  {
    temp=10;
  }
  Serial.print(button);
  Serial.print(',');
  Serial.println(temp);
  delay(500);
}
