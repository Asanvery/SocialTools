## SocialTools 
SocialTools -  это компонент с социальным функционалом для CMS / CMF MODX. С помощью него можно отправлять и читать сообщения, получать списки входящих и исходящих сообщений.
### Примеры
* Для отправления сообщения cоздайте ресурс со снипетом ``[[!socDialogForm]]``

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


#### Обязательно перед работой нужно исправить чанки по умолчанию
* ~readMsgResourceID - изменить идентификатор на ресурс в котором вызывается  сниппетом `` [[!socDialogReceive]] ``

* ~formSendResourceID - изменить идентификатор на ресурс в котором вызывается  сниппетом `` [[!socDialogForm]] ``

## SocialTools 
SocialTools - a component of the social functionality for CMS / CMF MODX. With it you can send and read messages, get a list of incoming and outgoing messages.

### Examples
* To send a message
Create a resource with Snippets ``[[!socDialogForm]]``
* for a list of incoming messages 
 
 *this example used pdoPage, you can also use getPage*
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


#### Necessarily need to be corrected before work chunks default
* ~readMsgResourceID - change the resource identifier where calls snippet `` [[!socDialogReceive]] ``

* ~formSendResourceID - change the resource identifier where calls snippet `` [[!socDialogForm]] ``


