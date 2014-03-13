## SocialTools 
SocialTools -  это компонент с социальным функционалом для CMS / CMF MODX. С помощью него можно отправлять и читать сообщения, получать списки входящих и исходящих сообщений.
### Примеры
* Для отправления сообщения
Создайте ресурс со снипетом ``[[!socDialogForm]]``
* для списка входящих сообщения 
 
 *в данном примере используется pdoPage, вы также можете использыватья getPage*
 ``[[!pdoPage?
  &element=`socDialogList` 
  &action= `inbox` 
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


#### обязательно перед работой нужно поправить  чанки по умолчанию
* ~readMsgResourceID - изменить на ресурс со снипетом `` [[!socDialogReceive]] ``

* ~formSendResourceID - изменить на ресурс со снипетом `` [[!socDialogForm]] ``

## SocialTools 
SocialTools - a component of the social functionality for CMS / CMF MODX. With it you can send and read messages, get a list of incoming and outgoing messages.


