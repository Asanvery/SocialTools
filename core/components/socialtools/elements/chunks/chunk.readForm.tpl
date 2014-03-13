<div id="socDivMsg[[+id]]"><table width="100%"><tr><td>
<div  class="social-msgRead" >

     <table cellpadding="2" cellspacing="0" width="100%"><tr>
     <td width="100px" rowspan="2" align="center" valign="top">
     [[+sender:userinfo=`username`]] <br>
     <!-- for photo you can use extra phpthumbon or phpthumbof  //  exmaple [[+sender:userinfo=`photo:phpthumbon=`wp=100&hp=120&wl=100&hl=120`]]  -->
     <img src='[[+sender:userinfo=`photo`]]' width="100">
     </td>
     <td  align="left" valign="top" height='20px'>
     <strong>[[+subject]]:</strong> 

     </td>
     <td align="right" valign="top">
     <!--  for best view date_sent you can use dateAgo extra from Vasiliy Naumkin  // exmaple [[+date_sent:dateAgo]] -->
      <small style='float:right'>[[+date_sent]] </small> 

     </td></tr>
     <tr><td colspan="2" valign="top">
     [[+message]]
     </td></tr>
     </table>

</div>
</td>
</tr>
<tr><td colspan="2" align="right">
<table><tr>
<td >
<div class="btn-toolbar ">
    <a class="socFormButton"  href="[[~formSendResourceID? &msgID=`[[+id]]`  &recipient=`[[+sender]]`]]"   >ответить</a>
    <a class="socFormButton"  onclick="SocialTools.dialog.delete([[+id]],'inbox', this, '#socDivMsg[[+id]]');"   >удалить</a>
</div>
</td></tr></table>
</td></tr></table>
<div id="socDivReply"></div>
</div>
