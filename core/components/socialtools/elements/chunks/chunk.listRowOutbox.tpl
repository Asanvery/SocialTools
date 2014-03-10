<div id="socDivMsg[[+id]]"><div class="social-msg [[+is_read:isequalto=`0`:then=`unread_mess`]]"  style='float:left;width:80%;padding:2px;'>
<a href='[[~739? &msgID=`[[+id]]` &action=`outbox`]]'>
<span style='display:inline-block;height:32px;'><img src='[[+sender:userinfo=`photo`:phpthumbon=`wp=32&hp=32&wl=32&hl=32&zc=1`]] ' ></span>
 <div style="display:inline-block;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;max-width:150px;height:28px;">[[+recipient:userinfo=`username`]] <b style='color:black;'>[ [[+subject]] ]:</b></div>


<div  style="display:inline-block;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;color:#9b9b9b;max-width:400px;height:28px;">
[[+message]]
</div>

 <small style='float:right'>[[+date_sent:dateAgo]]</small> 
 </a>
</div>
    <div class="btn-toolbar ">
    <a href="[[~372? &msgID=`[[+id]]`  &recipient=`[[+recipient]]`]]" class="socFormButton"  >написать</a>
             <a class="socFormButton"  onclick="SocialTools.dialog.delete([[+id]],'outbox', this, '#socDivMsg[[+id]]');"   >удалить</a>
           
    </div>
    <div style="clear:both"></div>
</div>
