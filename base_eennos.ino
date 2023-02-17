#include <ESP8266WiFi.h>
 
//Konfigurasi WiFi
//IP Address Server yang terpasang XAMPP
const char *host = "103.55.39.211";

#include "DHT.h"
#define DHTPIN D5
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);
#include <WiFiClient.h>
#include <Wire.h>

extern "C" {
#include "user_interface.h"
#include "wpa2_enterprise.h"
#include "c_types.h"
}
#include <MQUnifiedsensor.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);
#include "MQ135.h"
// #define RZERO 5804.99

#define placa "Node MCU"
#define Voltage_Resolution 5
#define pin A0 //Analog input 0 of your arduino
#define type "MQ-135" //MQ135
#define ADC_Bit_Resolution 10 // For arduino UNO/MEGA/NANO
#define RatioMQ135CleanAir 3.6
MQUnifiedsensor MQ135(placa, Voltage_Resolution, ADC_Bit_Resolution, pin, type);

char ssid[] = "UNS SOLO";
// char username[] = "haydar.ally11@student.uns.ac.id";
// char identity[] = "haydar.ally11@student.uns.ac.id";
// char password[] = "Aurelia123";
char username[] = "sguritno16@student.uns.ac.id";
char identity[] = "sguritno16@student.uns.ac.id";
char password[] = "sangaji123";
uint8_t target_esp_mac[6] = {0x24, 0x0a, 0xc4, 0x9a, 0x58, 0x28};
char jenisgas[6][10] = {"CO","Alcohol","CO2","Tolueno","NH4","Aceton"};
float gasA[6] = {605.18, 77.255, 110.47, 44.947, 102.2, 34.668};
float gasB[6] = {-3.937, -3.18, -2.862, -3.445, -2.473};
int itemcheck = 2;

int MQ135Pin=A1;
int Rload = 20000;
float rO=66000;
double ppm=414.38;
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
  }

  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
 
  int value = 0;
  MQ135.setRegressionMethod(1);
  
  MQ135.init();
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

  float calcR0 = 0;
  for(int i = 1; i<=10; i ++)
  {
    MQ135.update(); // Update data, the arduino will be read the voltage on the analog pin
    calcR0 += MQ135.calibrate(RatioMQ135CleanAir);
    Serial.print(".");
  }
  MQ135.setR0(calcR0/10);
  Serial.println("  done!.");
  if(isinf(calcR0)) {Serial.println("Warning: Conection issue founded, R0 is infite (Open circuit detected) please check your wiring and supply"); while(1);}
  if(calcR0 == 0){Serial.println("Warning: Conection issue founded, R0 is zero (Analog pin with short circuit to ground) please check your wiring and supply"); while(1);}
  MQ135.serialDebug(true);

  Wire.begin (D2, D1);
  
  lcd.clear();
  lcd.setCursor(3, 0); //baris pertama
  lcd.print("EENNOS TEAM");
  delay(2000);
}

 
void loop() {
  // Proses Pengiriman -----------------------------------------------------------
  MQ135.update();
  MQ135.serialDebug();
  
  lcd.clear();
  
  int datasensor=analogRead(A0);
  Serial.println(datasensor);
 
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

  float h = dht.readHumidity();
  float t = dht.readTemperature();
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print("\n");
  Serial.print(F("  Temperature: "));
  Serial.print(t);
  Serial.print(F("°C "));
   // Update data, the arduino will be read the voltage on the analog pin
   // Configure the equation to calculate CO2 concentration value
  // MQ135.setA(gasA[itemcheck]); MQ135.setB(gasB[itemcheck]);
  // float as = MQ135.readSensor();
  // float c = (as * 1000)-250; //treshhold alat manual: 895 //thersehold sensor: 1070.00
  // Serial.print(jenisgas[itemcheck]);Serial.print(" : ");Serial.print(c);Serial.println(" PPM");
  
  // MQ135.setA(102.2); MQ135.setB(-2.473);
  // float a = MQ135.readSensor();
  // float d = (a * 1000)-250;
  // Serial.print(jenisgas[1]);Serial.print(" : ");Serial.print(d);Serial.println(" PPM");

  int adcRaw = analogRead(MQ135Pin);
  double rS = ((1024.0 * Rload) / adcRaw) - Rload;
   
  float rSrO= rS/rO;

  float ppm = a * pow((float)rS / (float)rO, b);
  averageValue.push(ppm);

  
  // MQ135.setA(102.2); MQ135.setB(-2.473); // Configure the equation to calculate NH4 concentration value
  // float NH4 = MQ135.readSensor();
  // float n = NH4 * 1000;
  // Serial.print(jenisgas[4]);Serial.print(" : ");Serial.print(n);Serial.println(" PPM");
  
// Isi Konten yang dikirim adalah alamat ip si esp -----------------------------
  lcd.clear();
  lcd.setCursor(6, 0); //baris pertama
  lcd.print(t);
  lcd.setCursor(0, 0); //baris pertama
  lcd.print("Suhu:");
  lcd.setCursor(0, 1); //baris pertama
  lcd.print("Humd:");
  lcd.setCursor(6, 1); //baris pertama
  lcd.print(h);
  lcd.setCursor(11, 0); //baris pertama
  lcd.print("^C");
  lcd.setCursor(11, 1); //baris pertama
  lcd.print("%");
  delay(2000);
  lcd.clear();
  lcd.setCursor(0, 0); //baris pertama
  lcd.print("CO2:");
  lcd.setCursor(5, 0); //baris pertama
  lcd.print(averageValue.average());
  lcd.setCursor(13, 0); //baris pertama
  lcd.print("ppm");
  delay(2000);
  // lcd.clear();
  // lcd.setCursor(0, 0); //baris pertama
  // lcd.print("Dukung..!!");
  // lcd.setCursor(0, 1); //baris pertama
  // lcd.print("Fadhil ganteng");

  String id = "5"; //ganti id sensor
  String suhu = "suhu=";
  suhu =+ t;
  String hum = "&hum=";
  hum =+ h;
  String co2 = "&co2=";
  co2 =+ averageValue.average();
  String nh4 = "&nh4=";
  nh4 =+ d;
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