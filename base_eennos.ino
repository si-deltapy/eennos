#include <ESP8266WiFi.h>
#include "DHT.h"
#define DHTPIN D5
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

extern "C" {
#include "user_interface.h"
#include "wpa2_enterprise.h"
#include "c_types.h"
}
#include <WiFiClient.h>
#include "Arduino.h"
#include <AverageValue.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);

const char *host = "103.55.39.211";
char ssid[] = "UNS SOLO";
// char username[] = "haydar.ally11@student.uns.ac.id";
// char identity[] = "haydar.ally11@student.uns.ac.id";
// char password[] = "Aurelia123";
char username[] = "sguritno16@student.uns.ac.id";
char identity[] = "sguritno16@student.uns.ac.id";
char password[] = "sangaji123";
uint8_t target_esp_mac[6] = {0x24, 0x0a, 0xc4, 0x9a, 0x58, 0x28};
int itemcheck = 2;

int MQ135Pin=A0;
int Rload = 20000;
float rO=590000;
double ppm=419.47;
float a = 110.7432567;
float b = -2.856935538;
float minppm=0;
float maxppm=0;
const long MAX_VALUES_NUM = 10;
AverageValue<long> averageValue(MAX_VALUES_NUM);

void setup() {
  dht.begin();
  lcd.begin (); //LCD untuk ukuran 16x2
  lcd.backlight();
  pinMode(MQ135Pin, INPUT);
  Serial.begin(9600);
 
   minppm=pow((1000/110.7432567),1/-2.856935538);
      //max[Rs/Ro]=(min[ppm]/a)^(1/b)
   maxppm=pow((10/110.7432567),1/-2.856935538); 

  lcd.setCursor(0, 0); //baris pertama
  lcd.print("Connecting...");
  lcd.setCursor(0, 1); //baris pertama
  lcd.print("to Wifi");
  WiFi.mode(WIFI_STA);
  Serial.setDebugOutput(true);
  Serial.printf("SDK version: %s\n", system_get_sdk_version());
  Serial.printf("Free Heap: %4d\n",ESP.getFreeHeap());
  
  // Setting ESP into STATION mode only (no AP mode or dual mode)
  wifi_set_opmode(STATION_MODE);

  struct station_config wifi_config;

  memset(&wifi_config, 0, sizeof(wifi_config));
  strcpy((char*)wifi_config.ssid, ssid);
  strcpy((char*)wifi_config.password, password);

  wifi_station_set_config(&wifi_config);
  wifi_set_macaddr(STATION_IF,target_esp_mac);
  

  wifi_station_set_wpa2_enterprise_auth(1);

  // Clean up to be sure no old data is still inside
  wifi_station_clear_cert_key();
  wifi_station_clear_enterprise_ca_cert();
  wifi_station_clear_enterprise_identity();
  wifi_station_clear_enterprise_username();
  wifi_station_clear_enterprise_password();
  wifi_station_clear_enterprise_new_password();
  
  wifi_station_set_enterprise_identity((uint8*)identity, strlen(identity));
  wifi_station_set_enterprise_username((uint8*)username, strlen(username));
  wifi_station_set_enterprise_password((uint8*)password, strlen((char*)password));
  
  wifi_station_connect();
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
    lcd.clear();
    lcd.setCursor(0, 0); //baris pertama
    lcd.print("Try Again");
  }

  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
 
  int value = 0;
  
  lcd.clear();
  Serial.print("Calibrating please wait.");
  lcd.setCursor(0, 0); //baris pertama
  lcd.print("Calibrating.");
  delay(1000);
  lcd.setCursor(12, 0); //baris pertama
  lcd.print(".");
  delay(1500);
  lcd.setCursor(13, 0); //baris pertama
  lcd.print(".");
  delay(1500);

  Wire.begin (D2, D1);
  
  lcd.clear();
  lcd.setCursor(3, 0); //baris pertama
  lcd.print("EENNOS TEAM");
  delay(2000);
}

 
void loop() {
  lcd.clear();
  Serial.print("connecting to ");
  Serial.println(host);
 
// Mengirimkan ke alamat host dengan port 80 -----------------------------------
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    lcd.clear();
    lcd.setCursor(0, 0); //baris pertama
    lcd.print("connection failed");
    return;
  }
// sensor suhu humidity -----------------------------------------------
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print("\n");
  Serial.print(F("  Temperature: "));
  Serial.print(t);
  Serial.print(F("°C "));

// sensor co2 -------------------------------------------------------
  int adcRaw = analogRead(MQ135Pin);
  double rS = ((1024.0 * Rload) / adcRaw) - Rload;
  float rSrO= rS/rO;  
  float ppm = a * pow((float)rS / (float)rO, b);

  averageValue.push(ppm);
  Serial.println(averageValue.average());
  
// print layar lcd -----------------------------
  lcd.clear();
  lcd.setCursor(6, 0); 
  lcd.print(t);
  lcd.setCursor(0, 0); 
  lcd.print("Suhu:");
  lcd.setCursor(0, 1); 
  lcd.print("Humd:");
  lcd.setCursor(6, 1); 
  lcd.print(h);
  lcd.setCursor(11, 0); 
  lcd.print("^C");
  lcd.setCursor(11, 1); 
  lcd.print("%");
  delay(2000);
  lcd.clear();
  lcd.setCursor(0, 0); 
  lcd.print("CO2:");
  lcd.setCursor(5, 0); 
  lcd.print(averageValue.average());
  lcd.setCursor(13, 0);
  lcd.print("ppm");
  delay(2000);

  // send data to database -------------------------------------------------------------
  // | id | nama_tempat ``|
  // |____|_______________|
  // | 1  | Gedung A``````|
  // | 2``| Gerbang Depan |
  // | 3  | Rektorat``````|
  // | 4``| Gerbang BLKNG |
  // | 5  | Mobile  ``````|
  // | ?``| Gerbang Depan |
  
  String id = "4"; //ganti id sensor sesuai atas
  String suhu = "suhu=";
  suhu =+ t;
  String hum = "&hum=";
  hum =+ h;
  String co2 = "&co2=";
  co2 =+ averageValue.average();
  String url = "http://eennos.online/post-data.php?id=" + id + "&suhu=" + suhu + "&hum=" + hum +"&co2=" + co2;
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
// Mengirimkan Request ke Server -----------------------------------------------
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 1000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
 
// Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  lcd.clear();
  lcd.setCursor(0, 0); //baris pertama
  lcd.print("Send To Databse..");
  Serial.println();
  Serial.println("closing connection");
  delay(5000);
}






