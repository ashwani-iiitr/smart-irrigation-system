#include <ESP8266WiFi.h>
#include <WiFiUdp.h>
#define PUMP D2

const char* ssid = "Rn5pr0";
const char* password = "asdf1234";

WiFiUDP Udp;
unsigned int localUdpPort = 4230;  // local port to listen on
char incomingPacket[255];  // buffer for incoming packets


void setup()
{
  pinMode(PUMP, OUTPUT);
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

    if (incomingPacket[0] == 'j') //s for status
    {
      digitalWrite(PUMP, HIGH); 
    }

    else if(incomingPacket[0] == 'k')
    {
      digitalWrite(PUMP, LOW);
    }

  }
}
