## SocialTools 
SocialTools -  это компонент с социальным функционалом для CMS / CMF MODX. С помощью него можно отправлять и читать сообщения, получать списки входящих и исходящих сообщений.
### Примеры
* Для отправления сообщения
Создайте ресурс со снипетом ``[[!socDialogForm]]``
* для списка входящих сообщения 
 
 *в данном примере используется pdoPage, вы также можете использовать getPage*
 ``[[!pdoPage?
  &element=`socDialogList` 
  &action=`inbox` 
]]
``
* для списка исходящих сообщения

 ``[[!pdoPage?
  &element=`socDialogList` 
  &action=`outbox` 
]]
``
* Для чтения сообщений

  `` [[!socDialogReceive]] `` 


#### обязательно перед работой нужно исправить чанки по умолчанию
* ~readMsgResourceID - изменить на ресурс со сниппетом `` [[!socDialogReceive]] ``

* ~formSendResourceID - изменить на ресурс со сниппетом `` [[!socDialogForm]] ``

## SocialTools 
SocialTools - a component of the social functionality for CMS / CMF MODX. With it you can send and read messages, get a list of incoming and outgoing messages.

### Examples
* To send a message
Create a resource with Snippets ``[[!socDialogForm]]``
* for a list of incoming messages 
 
 *used in this example pdoPage, you can also use getPage*
 ``[[!pdoPage?
  &element=`socDialogList` 
  &action=`inbox` 
]]
``
* for a list of outgoing messages

 ``[[!pdoPage?
  &element=`socDialogList` 
  &action=`outbox` 
]]
``
* To read messages

  `` [[!socDialogReceive]] `` 


#### necessarily need to be corrected before work chunks default
* ~readMsgResourceID - change in the resource with snippet `` [[!socDialogReceive]] ``

* ~formSendResourceID - change in the resource with snippet `` [[!socDialogForm]] ``


