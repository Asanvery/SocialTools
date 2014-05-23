**SocialTools** -  это компонент с социальным функционалом для CMS / CMF MODX.
С его помощью можно отправлять и читать сообщения, получать списки входящих и исходящих сообщений.

### 5 шагов для быстрого начала:

**1. Создать ресурс с формой отправки сообщений.**

```
[[!socDialogForm]]
```
**2. Создать ресурс со списком входящих сообщений.**

*В данном примере используется pdoPage, вы можете использовать getPage*

```
[[!pdoPage?
	&element=`socDialogList`
	&action=`inbox`
]]

[[+page.nav]]
```

**3. Создать ресурс со списком исходящих сообщений.**

*В данном примере используется pdoPage, вы можете использовать getPage*

```
[[!pdoPage?
	&element=`socDialogList`
	&action=`outbox`
]]

[[+page.nav]]
```

**4. Создать ресурс для чтения сообщения**

```
[[!socDialogReceive]]
```

**5. Сделать правки в чанках по умолчанию.**

Изменить readMsgResourceID - на id вашего ресурса с вызовом сниппета для чтения сообщений.

Изменить formSendResourceID - на id вашего ресурса с вызовом сниппета для формы отправки сообщения.

### Дополнения

* Установить компоненты [dateAgo][0], и [phpthumbon][1] для приятного отображения даты отправки сообщения и аватара пользователя в чанках.
* Вывод плейсхолдера непрочитанных сообщений по умолчанию
```
[[!+socIsRead:notempty=`Новые сообщения! ([[!+socIsRead]])`]]
```
* Заключать все вызовы в div с классом social-container, у этого класса фиксированая ширина, с помощью него вы легко сможете настроить ширину под свой сайт в CSS
* Полезные классы в CSS `social-listheader`, `social-msgcontent` - параметр max-width, определяет максимальную ширину этих полей, все что больше будет обрезаться и ставиться многоточие.
Они используется для отображения списка сообщений.
Если вы изменяете параметры класса `social-container`, то значения в `social-listheader`, `social-msgcontent` так же нужно настроить под ваш CSS.

[![](http://file.modx.pro/files/c/2/c/c2ca21272e774ac13d6c9d7bcaaa9bc1s.jpg)](http://file.modx.pro/files/c/2/c/c2ca21272e774ac13d6c9d7bcaaa9bc1.jpg)

*Вы всегда можете сделать свои чанки, с собственным CSS, на основе чанков по умолчанию*




**SocialTools** - a component of the social functionality for CMS / CMF MODX.
With it you can send and read messages, get a list of incoming and outgoing messages.

### 5 steps for quick start:

**1. Create a resource with a form of sending messages.**

```
[[!socDialogForm]]
```
**2. Create a resource with the list of inbox messages.**

*In this example pdoPage is used, you can use getPage*

```
[[!pdoPage?
	&element=`socDialogList`
	&action=`inbox`
]]

[[+page.nav]]
```

**3. Create a resource with the list of outbox messages**

*In this example pdoPage is used, you can use getPage*

```
[[!pdoPage?
	&element=`socDialogList`
	&action=`outbox`
]]

[[+page.nav]]
```

**4. Create a resource for read message and call snippet**

```
[[!socDialogReceive]]
```

**5. Make editings in the chunks by default.**

Change readMsgResourceID - the id of the resource to call your snippet to read messages

Change formSendResourceID - the id of the resource to call your snippet to send form message

### Addons

* Install package [dateAgo][0], and [phpthumbon][1] for beautiful visualisation date of sent and avatar user in chunks.
* Placeholder for unread message by default
```
[[!+socIsRead:notempty=`New Messages! ([[!+socIsRead]])`]]
```
* To conclude all calls in div with the class 'social-container', at this class the fixed width, by means of it you will be able easily to adjust width under the site in CSS
* Useful classes in CSS 'social-listheader', 'social-msgcontent' - the 'max-width' parameter, determines the maximum width of this field, all that more dots will be cut off and put. They it is used for display of the list of soobshcheniiya. If you change class social-container parameters, values in social-listheader, social-msgcontent as it is necessary to adjust under your CSS.

[![](http://file.modx.pro/files/c/2/c/c2ca21272e774ac13d6c9d7bcaaa9bc1s.jpg)](http://file.modx.pro/files/c/2/c/c2ca21272e774ac13d6c9d7bcaaa9bc1.jpg)

*You can always make your chunks, with its own CSS, based on the default chunks*


[0]: http://store.simpledream.ru/dateago
[1]: http://modx.com/extras/package/phpthumbon

[0]: http://store.simpledream.ru/dateago
[1]: http://modx.com/extras/package/phpthumbon
