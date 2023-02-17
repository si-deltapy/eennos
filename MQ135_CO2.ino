/*SANSJAYA CHANNEL --->>> credit for DAVIDE GERONI*/

#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include "Arduino.h"
#include <AverageValue.h>
LiquidCrystal_I2C lcd(0x3F,16,2); 

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

void setup() 
{
    lcd.init();
    lcd.backlight();
    lcd.setCursor(0,0);
    pinMode(MQ135Pin, INPUT);
    Serial.begin(9600);
    
     //min[Rs/Ro]=(max[ppm]/a)^(1/b)
       minppm=pow((1000/110.7432567),1/-2.856935538);
      //max[Rs/Ro]=(min[ppm]/a)^(1/b)
       maxppm=pow((10/110.7432567),1/-2.856935538);
}

void loop() {
  
    int adcRaw = analogRead(MQ135Pin);
    double rS = ((1024.0 * Rload) / adcRaw) - Rload;
   
    float rSrO= rS/rO;
    if(rSrO < maxppm && rSrO > minppm) 
    {
    float ppm = a * pow((float)rS / (float)rO, b);
    averageValue.push(ppm);
    lcd.setCursor(0,0);
    lcd.print("Rs/Ro:");
    lcd.setCursor(7,0);
    lcd.print(rSrO);
    lcd.setCursor(0,1);
    lcd.print("Co2:");
    lcd.setCursor(5,1);
    lcd.print(averageValue.average());  
    lcd.setCursor(11,1);
    lcd.print("ppm");
    delay(1000);
     } else {
     lcd.clear();
     lcd.setCursor(4,0);
     lcd.print("di luar");
      lcd.setCursor(3,1);
      lcd.print("jangkauan");
    }
    }
