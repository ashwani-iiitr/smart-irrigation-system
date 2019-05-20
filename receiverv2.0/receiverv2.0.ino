#include <ESP8266WiFi.h>
#include <WiFiUdp.h>
#include <Servo.h>
#include <String.h>

const char* ssid = "Rn5pr0";
const char* password = "asdf1234";

WiFiUDP Udp;
unsigned int localUdpPort = 4220;  // local port to listen on
char incomingPacket[255];  // buffer for incoming packets
char replyPacket[] = "";  // a reply string to send back
Servo servo;

void setup()
{
  servo.attach(4);
  servo.write(15);
  delay(2000);
  Serial.begin(115200);
  Serial.println();

  Serial.printf("Connecting to %s ", ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println(" connected");

  Udp.begin(localUdpPort);
  Serial.printf("Now listening at IP %s, UDP port %d\n", WiFi.localIP().toString().c_str(), localUdpPort);
}


void loop()
{
  int packetSize = Udp.parsePacket();
  if (packetSize)
  {
    // receive incoming UDP packets
    Serial.printf("Received %d bytes from %s, port %d\n", packetSize, Udp.remoteIP().toString().c_str(), Udp.remotePort());
    Udp.read(incomingPacket, 255);

    /*if (len >= 0)
      {
      incomingPacket[len] = 0;
      }*/
    Serial.printf("UDP packet contents: %s\n", incomingPacket);

    if (incomingPacket[0] == 's') //s for status
    {
      int sensorvalue;
      sensorvalue = analogRead(A0);
      itoa(sensorvalue, replyPacket, 10);

      Udp.beginPacket(Udp.remoteIP(), Udp.remotePort());
      Udp.write(replyPacket);
      Udp.endPacket();
      delay(2000);
      Serial.println("Status value sent");
    }
    else if (incomingPacket[0] == 'o')
    {
      servo.write(90);
      Serial.println("valve opened");
      // delay(5000);
      int sensorvalue=1024;
      while (sensorvalue>500)
      {
      sensorvalue = analogRead(A0);
      delay(1000);
      }
      
      servo.write(15);
      
      
      int ss=0;
      itoa(ss, replyPacket, 10);//0 means valve closed
      Udp.beginPacket(Udp.remoteIP(), Udp.remotePort());
      Udp.write(replyPacket);
      Udp.endPacket();
      Serial.println("valve closed");
      
      //delay(5000);
    }

    else if (incomingPacket[0] == 'c'){
      servo.write(15);
      Serial.println("valve closed");
      }
    
    /* else
       {
       Serial.println("It was here");
       //delay(2000);

       }
    */

    /* // send back a reply, to the IP address and port we got the packet from
      Udp.beginPacket(Udp.remoteIP(), Udp.remotePort());
      Udp.write(replyPacket);
      Udp.endPacket();
      delay(2000);

    */
  }
}
