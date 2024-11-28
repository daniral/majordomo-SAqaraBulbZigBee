Добавление в MajorDomo простого устройства для лампочек с управлением яркостью и теплотой цвета.
С режимом включеня по датчику освещения, восходу/закату солнца или по установленному времени.
Автовыключение по заданному времени.С заданными яркостью и теплотой для дня и ночи.
Включение по времени суток(Ночь,День,Кгуглосуточно)

Надо привязать к свойствам:
    brightnessWork - brightness лампочки.
      Добавить Путь (write): zigbee2mqtt/Название устройства/set/brightness
    colorWork - color_temp лампочки.
      Добавить Путь (write): zigbee2mqtt/Название устройства/set/color_temp
    status - state лампочки.
      В статус не добовляем путь(write) так как он нужен только для обратной связи
      что бы знать включена или нет лапочка для сцен или кнопок.
  Минимальные и максимальные рабочие уровни:
    Например для лампочек Xiaomi ZigBee это:
      - brightnessWorkMax - 254
      - brightnessWorkMin - 0
      - colorWorkMax - 370
      - colorWorkMin - 153
    а для лампочек Tuta ZigBee это:
      - brightnessWorkMax - 254
      - brightnessWorkMin - 0
      - colorWorkMax - 500
      - colorWorkMin - 153


                                  ОБЫЧНЫЙ РЕЖИМ:

Включить - callMethod('имя объекта '.'turnOn'); 
  Если без параметров установит то что в brightnessLevelSeved и colorLevelSeved.
  Если brightnessLevelSeved и colorLevelSeved пусто то на полную яркость(100%) и холодный цвет(0%).
  С параметрами:
    - callMethod('имя объекта.turnOn', array('brightnessLevel'=> 1<-->100,'colorLevel'=> 0<-->100));
    - callMethod('имя объекта.turnOn', array('brightnessLevel'=> 1<-->100));
    - callMethod('имя объекта.turnOn', array('colorLevel'=> 0<-->100));

Устанавливается flag=1. Стопер который не дает запускаться методу AutoOFF.


                                 РЕЖИМ ПОДСВЕТКИ:      

Включить ночной режим - callMethod('имя объекта '.'turnOn', array('dayNight'=>1));
Включится на время которое указано в timerOFF(сек). Если 0 то включится но сам не выключится.
Если в presence(например данные с датчика присутствия) 1 то не выключится.
  Как только в presence изменися с 1 на 0 запустится метод автовыключения.
Можно включать режим подсветки Днем,Ночью или весь день.
  если в workInDai:
    0-Весь день.(Ночью ночные установки яркости и теплоты. Днем дневные.)
    1-Днем
    2-Ночью
Если по солнцу:
  после захода - ночные установки яркости (nightBrightnessLevel) и теплоты (nightColorLevel).
  после восхода - дневные (dayBrightnessLevel, dayColorLevel).
  Надо обязательно писать в свойства sunriseTime и sunsetTime время восхода и заката.
  Если не указано то то что указано в ручную.
  К восходу и закату можно прибавить или отнять время если надо чтобы включалось или выключалось раньше или позже:
   - addTimeSunrise - к рассвету в формате 05:30 (5 часов 30 минут)
     - signSunrise 0 - отнять 1 - прибавить.
   - addTimeSunset  - к закату в формате 00:30 (30 минут)
     - signSunset 0 - отнять 1 - прибавить.
Если вручную:
  после начало ночь - ночные установки яркости и теплоты.
  после начло день - дневные.
Если по датчику:
  Только ночные установки яркости и теплоты.
  Если надо можно дописать разные установки для дня и ночи.
  Всвойство illuminance надо писать данные с датчика освещения.
  если illuminance меньше чем установленно в illuminanceMax подсветка вкится.
  Работу по датчику освещения не проверял так как не имеется в наличии.
Можно запустить режим подсветки с параметпами:
  - callMethod('имя объекта.turnOn', array('dayNight'=>1, 'brightnessLevel'=> 1<--> 100,'colorLevel'=> 0<-->100));

Устанавливается flag=0. Запускается метод AutoOFF.

Методы:
  - setBrightnessLevel -  Установить яркость света.(array("value"=> 0 <--> 100 %))
                          Без  параметров то что в brightnessLevelSeved.
                          Если brightnessLevelSeved пусто то 100%.
                          flag 1 - автовыключение не запустится.
  - setColorLevel - Установить температуру.(array("value"=>0 <--> 100 %))
                    Без  параметров то что в colorLevelSeved.
                    Если colorLevelSeved пуст то 0 (холодный).
                    flag 1 - автовыключение не запустится.
  - brightnessLevelDown - Уменьшить яркость.(array("value"=>1-50)). Без  параметров -10.
  - brightnessLevelUp - Увеличить яркость.(array("value"=>1-50)). Без  параметров 10.
  - colorLevelDown - Уменьшить температуру.(array("value"=>1-50)). Без  параметров -10.
  - colorleveUp - Увеличить температуру.(array("value"=>1-50)). Без  параметров 10.
  - byDefault - Установит параметры по дефолту. Это если что-то пошло не так. 
      При первом запуске метода turnOn тоже все выставится по дефолту.
  - CommandsMenu - Создаст меню данного объекта в "Меню Управления"
  - colorPreset - Установить температуру ('C'-Холодная,'N'-Нейтральная,'W'-Теплая).
      - array('value'=>'C');


При первом запуске все нужные свойства для работы метода должны прописаться сами.
Если нужны другие то можно изменить в ручную в свойствах объекта или запустить мктод CommandsMenu.
Он сам создаст меню в "Меню Управления" и там можно все удобно настроить.
Меню будет называться по имени объекта. При желании можно изменить на любое другое.

Было проверено на лампочках Xiaomi ZigBee https://www.zigbee2mqtt.io/devices/ZNLDP12LM.html#aqara-znldp12lm
И на потолочной лампе от Tuta ZigBee https://www.zigbee2mqtt.io/devices/ZB-LZD10-RCW.html#moes-zb-lzd10-rcw