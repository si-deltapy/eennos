#include <Wire.h> 
#include <LiquidCrystal_I2C.h>
#include "Arduino.h"
#include <AverageValue.h>
LiquidCrystal_I2C lcd(0x3F,16,2); 

int MQ135Pin=A0;
int Rload = 20000;
double ppm=416.38;
float a = 110.7432567;
float b = -2.856935538;
const long MAX_VALUES_NUM = 10;
AverageValue<long> averageValue(MAX_VALUES_NUM);
            
void setup() {
Serial.begin(9600);
lcd.backlight();
}

void loop() {

  float adcRaw = analogRead(MQ135Pin);
  float rS = ((1024.0 * Rload) / adcRaw) - Rload;
  float rO=rS * exp(log(a/ppm) / b );
  averageValue.push(rO);
  lcd.setCursor(0,0);
  lcd.print(averageValue.average());
  Serial.println(averageValue.average());
  delay(1000);
  }
