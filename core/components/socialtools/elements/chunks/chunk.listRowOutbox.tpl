<div id='socDivMsg[[+id]]'>
<div class="social-msg"  >

<a href='[[~readMsgResourceID? &msgID=`[[+id]]` &action=`outbox`]]'>
<!-- for photo you can use extra phpthumbon or phpthumbof  //  exmaple [[+sender:userinfo=`photo:phpthumbon=`wp=32&hp=32&wl=32&hl=32&zc=1`]]  -->
<span class='soc-photo'><img src='[[+sender:userinfo=`photo`]]'  width="32" height="32"></span>
 <div  class="soc-listheader">[[+recipient:userinfo=`username`]] <b>[ [[+subject]] ]:</b></div>


<div  class="soc-msgcontent">
[[+message]]
</div>
<!--  for best view date_sent you can use dateAgo extra from Vasiliy Naumkin  // exmaple [[+date_sent:dateAgo]] -->
 <small style='float:right'>[[+date_sent]]</small> 
 </a>
</div>
    <div class="btn-toolbar ">
    <a href="[[~formSendResourceID? &msgID=`[[+id]]`  &recipient=`[[+recipient]]`]]" class="socFormButton"  >ответить</a>
             <a class="socFormButton"  onclick="SocialTools.dialog.delete([[+id]],'outbox', this, '#socDivMsg[[+id]]');"   >удалить</a>
           
    </div>
    <div style="clear:both"></div>
</div>
