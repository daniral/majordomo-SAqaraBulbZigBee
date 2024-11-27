<?php

/*
Создает меню управления.(Запускать 1 раз для каждого объекта).
*/


$sqlQuery="SELECT MAX(id) FROM commands";
$data = SQLSelect($sqlQuery);
$insertID=($data[0]['MAX(id)'])+1;
$objctName=$this->object_title;


//Menu-0
$Record = Array();
$Record['ID']=$insertID;
$Record['TITLE']=$objctName;
$Record['PARENT_ID']=0;
$Record['SUB_LIST']=($insertID+1).",".($insertID+2).",".($insertID+3).",".($insertID+4).",".($insertID+5).",".($insertID+6).",".($insertID+7).",".($insertID+8).",".($insertID+9).",".($insertID+10).",".($insertID+11).",".($insertID+12).",".($insertID+13).",".($insertID+14).",".($insertID+15).",".($insertID+16).",".($insertID+17).",".($insertID+18).",".($insertID+19).",".($insertID+20).",".($insertID+21).",".($insertID+22);
$Record['PARENT_LIST']='0';
$Record['PRIORITY']=10;
$Record['SUB_PRELOAD']=1;
$R=SQLInsert('commands', $Record);
//Menu-1
$Record = Array();
$Record['ID']=($insertID+1);
$Record['TITLE']='Автовключение';
$Record['PARENT_ID']=$insertID;
$Record['SUB_LIST']=($insertID+2).",".($insertID+3).",".($insertID+4);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=50;
$Record['SUB_PRELOAD']=1;
$R1=SQLInsert('commands', $Record);
//Menu-2
$Record = Array();
$Record['ID']=($insertID+2);
$Record['TITLE']='Вкл/Выкл';
$Record['PARENT_ID']=($insertID+1);
$Record['SUB_LIST']=($insertID+2);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['TYPE']='switch';
$Record['CUR_VALUE']='1';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='autoOnOff';
$R2=SQLInsert('commands', $Record);
//Menu-3
$Record = Array();
$Record['ID']=($insertID+3);
$Record['TITLE']='Задержка(сек)';
$Record['PARENT_ID']=($insertID+1);
$Record['SUB_LIST']=($insertID+3);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='plusminus';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=10000;
$Record['CUR_VALUE']='40';
$Record['STEP_VALUE']=5;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='timerOFF';
$R3=SQLInsert('commands', $Record);
//Menu-4
$Record = Array();
$Record['ID']=($insertID+4);
$Record['TITLE']='Время Суток';
$Record['PARENT_ID']=($insertID+1);
$Record['SUB_LIST']=($insertID+4);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='radiobox';
$Record['CUR_VALUE']='2';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='workInDai';
$Record['DATA']="1=День\r\n2=Ночь\r\n0=День/Ночь";
$R4=SQLInsert('commands', $Record);
//Menu-5
$Record = Array();
$Record['ID']=($insertID+5);
$Record['TITLE']='По Солнцу';
$Record['PARENT_ID']=$insertID;
$Record['SUB_LIST']=($insertID+6).",".($insertID+7).",".($insertID+8).",".($insertID+9).",".($insertID+10);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=40;
$Record['SUB_PRELOAD']=1;
$R5=SQLInsert('commands', $Record);
//Menu-6
$Record = Array();
$Record['ID']=($insertID+6);
$Record['TITLE']='Вкл/Выкл';
$Record['PARENT_ID']=($insertID+5);
$Record['SUB_LIST']=($insertID+6);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=50;
$Record['TYPE']='switch';
$Record['CUR_VALUE']='1';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='bySunTime';
$R6=SQLInsert('commands', $Record);
//Menu-7
$Record = Array();
$Record['ID']=($insertID+7);
$Record['TITLE']='Восход';
$Record['PARENT_ID']=($insertID+5);
$Record['SUB_LIST']=($insertID+7);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=40;
$Record['TYPE']='timebox';
$Record['MIN_VALUE']=-21600;
$Record['MAX_VALUE']=21600;
$Record['CUR_VALUE']='00:00';
$Record['STEP_VALUE']=60;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='addTimeSunrise';
$R7=SQLInsert('commands', $Record);
//Menu-8
$Record = Array();
$Record['ID']=($insertID+8);
$Record['TITLE']='Прибавить/Отнять';
$Record['PARENT_ID']=($insertID+5);
$Record['SUB_LIST']=($insertID+8);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['TYPE']='selectbox';
$Record['CUR_VALUE']='1';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='signSunrise';
$Record['DATA']="1=Прибавить\r\n0=Отнять";
$R8=SQLInsert('commands', $Record);
//Menu-9
$Record = Array();
$Record['ID']=($insertID+9);
$Record['TITLE']='Закат';
$Record['PARENT_ID']=($insertID+5);
$Record['SUB_LIST']=($insertID+9);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='timebox';
$Record['MIN_VALUE']=-21600;
$Record['MAX_VALUE']=21600;
$Record['CUR_VALUE']='00:30';
$Record['STEP_VALUE']=60;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='addTimeSunset';
$R9=SQLInsert('commands', $Record);
//Menu-10
$Record = Array();
$Record['ID']=($insertID+10);
$Record['TITLE']='Прибавить/Отнять';
$Record['PARENT_ID']=($insertID+5);
$Record['SUB_LIST']=($insertID+10);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='selectbox';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='signSunset';
$Record['DATA']="1=Прибавить\r\n0=Отнять";
$R10=SQLInsert('commands', $Record);
//Menu-11
$Record = Array();
$Record['ID']=($insertID+11);
$Record['TITLE']='По Датчику';
$Record['PARENT_ID']=$insertID;
$Record['SUB_LIST']=($insertID+12).",".($insertID+13);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['SUB_PRELOAD']=1;
$R11=SQLInsert('commands', $Record);
//Menu-12
$Record = Array();
$Record['ID']=($insertID+12);
$Record['TITLE']='Вкл/Выкл';
$Record['PARENT_ID']=$insertID+11;
$Record['SUB_LIST']=$insertID+12;
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='switch';
$Record['CUR_VALUE']='0';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='bySensor';
$R12=SQLInsert('commands', $Record);
//Menu-13
$Record = Array();
$Record['ID']=($insertID+13);
$Record['TITLE']='Макс.Освещение';
$Record['PARENT_ID']=$insertID+11;
$Record['SUB_LIST']=$insertID+13;
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='plusminus';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=500;
$Record['CUR_VALUE']='15';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='illuminanceMax';
$R13=SQLInsert('commands', $Record);
//Menu-14
$Record = Array();
$Record['ID']=($insertID+14);
$Record['TITLE']='В ручную';
$Record['PARENT_ID']=$insertID;
$Record['SUB_LIST']=($insertID+15).",".($insertID+16).",".($insertID+17);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['SUB_PRELOAD']=1;
$R14=SQLInsert('commands', $Record);
//Menu-15
$Record = Array();
$Record['ID']=($insertID+15);
$Record['TITLE']='Вкл/Выкл';
$Record['PARENT_ID']=$insertID+14;
$Record['SUB_LIST']=$insertID+15;
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['TYPE']='switch';
$Record['CUR_VALUE']='0';
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='byManually';
$R12=SQLInsert('commands', $Record);
//Menu-16
$Record = Array();
$Record['ID']=($insertID+16);
$Record['TITLE']='Начало Ночь';
$Record['PARENT_ID']=($insertID+14);
$Record['SUB_LIST']=($insertID+16);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='timebox';
$Record['MIN_VALUE']=-21600;
$Record['MAX_VALUE']=21600;
$Record['CUR_VALUE']='18:00';
$Record['STEP_VALUE']=60;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='nightBegin';
$R15=SQLInsert('commands', $Record);
//Menu-17
$Record = Array();
$Record['ID']=($insertID+17);
$Record['TITLE']='Начало День';
$Record['PARENT_ID']=($insertID+14);
$Record['SUB_LIST']=($insertID+17);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='timebox';
$Record['MIN_VALUE']=-21600;
$Record['MAX_VALUE']=21600;
$Record['CUR_VALUE']='08:00';
$Record['STEP_VALUE']=60;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='dayBegin';
$R16=SQLInsert('commands', $Record);
//Menu-18
$Record = Array();
$Record['ID']=($insertID+18);
$Record['TITLE']='Цвет';
$Record['PARENT_ID']=$insertID;
$Record['SUB_LIST']=($insertID+19).",".($insertID+24);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['SUB_PRELOAD']=1;
$R17=SQLInsert('commands', $Record);
//Menu-19
$Record = Array();
$Record['ID']=($insertID+19);
$Record['TITLE']='Яркость';
$Record['PARENT_ID']=$insertID+18;
$Record['SUB_LIST']=($insertID+20).",".($insertID+21).",".($insertID+22).",".($insertID+23);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['SUB_PRELOAD']=1;
$R17=SQLInsert('commands', $Record);
//Menu-20
$Record = Array();
$Record['ID']=($insertID+20);
$Record['TITLE']='Днем';
$Record['PARENT_ID']=($insertID+19);
$Record['SUB_LIST']=($insertID+20);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=40;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=100;
$Record['CUR_VALUE']='100';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='dayBrightnessLevel';
$R18=SQLInsert('commands', $Record);
//Menu-21
$Record = Array();
$Record['ID']=($insertID+21);
$Record['TITLE']='Ночью';
$Record['PARENT_ID']=($insertID+19);
$Record['SUB_LIST']=($insertID+21);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=100;
$Record['CUR_VALUE']='10';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='nightBrightnessLevel';
$R20=SQLInsert('commands', $Record);
//Menu-22
$Record = Array();
$Record['ID']=($insertID+22);
$Record['TITLE']='Максимальная';
$Record['PARENT_ID']=($insertID+19);
$Record['SUB_LIST']=($insertID+22);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=1000;
$Record['CUR_VALUE']='254';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='brightnessWorkMax';
$R20=SQLInsert('commands', $Record);
//Menu-23
$Record = Array();
$Record['ID']=($insertID+23);
$Record['TITLE']='Минимальная';
$Record['PARENT_ID']=($insertID+19);
$Record['SUB_LIST']=($insertID+23);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=1000;
$Record['CUR_VALUE']='0';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='brightnessWorkMin';
$R20=SQLInsert('commands', $Record);
//Menu-24
$Record = Array();
$Record['ID']=($insertID+24);
$Record['TITLE']='Температура';
$Record['PARENT_ID']=$insertID+18;
$Record['SUB_LIST']=($insertID+25).",".($insertID+26).",".($insertID+27).",".($insertID+28);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['SUB_PRELOAD']=1;
$R17=SQLInsert('commands', $Record);
//Menu-25
$Record = Array();
$Record['ID']=($insertID+25);
$Record['TITLE']='Днем';
$Record['PARENT_ID']=($insertID+24);
$Record['SUB_LIST']=($insertID+25);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=40;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=100;
$Record['CUR_VALUE']='0';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='dayColorLevel';
$R19=SQLInsert('commands', $Record);
//Menu-26
$Record = Array();
$Record['ID']=($insertID+26);
$Record['TITLE']='Ночью';
$Record['PARENT_ID']=($insertID+24);
$Record['SUB_LIST']=($insertID+26);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=30;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=0;
$Record['MAX_VALUE']=100;
$Record['CUR_VALUE']='100';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='nightColorLevel';
$R21=SQLInsert('commands', $Record);
//Menu-27
$Record = Array();
$Record['ID']=($insertID+27);
$Record['TITLE']='Максимальная';
$Record['PARENT_ID']=($insertID+24);
$Record['SUB_LIST']=($insertID+27);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=20;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=1;
$Record['MAX_VALUE']=1000;
$Record['CUR_VALUE']='370';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='colorWorkMax';
$R19=SQLInsert('commands', $Record);
//Menu-28
$Record = Array();
$Record['ID']=($insertID+28);
$Record['TITLE']='Минимальная';
$Record['PARENT_ID']=($insertID+24);
$Record['SUB_LIST']=($insertID+28);
$Record['PARENT_LIST']=$insertID;
$Record['PRIORITY']=10;
$Record['TYPE']='sliderbox';
$Record['MIN_VALUE']=1;
$Record['MAX_VALUE']=1000;
$Record['CUR_VALUE']='153';
$Record['STEP_VALUE']=1;
$Record['LINKED_OBJECT']=$objctName;
$Record['LINKED_PROPERTY']='colorWorkMin';
$R21=SQLInsert('commands', $Record);