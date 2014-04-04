<div id='socDivMsg[[+id]]'>
<div class="social-msg"  >

<a href='[[~6? &msgID=`[[+id]]` &action=`outbox`]]'>
<!-- for photo you can use extra phpthumbon or phpthumbof  //  exmaple [[+sender:userinfo=`photo:phpthumbon=`wp=32&hp=32&wl=32&hl=32&zc=1`]]  -->
<span class='social-photo'><img src='[[+sender:userinfo=`photo`]]'  width="32" height="32"></span>
 <div  class="social-listheader">[[+recipient:userinfo=`username`]] <b>[ [[+subject]] ]:</b></div>


<div  class="social-msgcontent">
[[+message]]
</div>
<!--  for best view date_sent you can use dateAgo extra from Vasiliy Naumkin  // exmaple [[+date_sent:dateAgo]] -->
 <small style='float:right'>[[+date_sent:dateAgo]]</small> 
 </a>
</div>
    <div class="btn-toolbar ">
    <a href="[[~3? &msgID=`[[+id]]`  &recipient=`[[+recipient]]`]]" class="socFormButton"  >[[%socialtools_form_button_answer]]</a>
             <a class="socFormButton"  onclick="SocialTools.message.delete([[+id]],'outbox', socDivMsg[[+id]]);"   >[[%socialtools_form_button_delete]]</a>
           
    </div>
    <div style="clear:both"> </div>
</div>
