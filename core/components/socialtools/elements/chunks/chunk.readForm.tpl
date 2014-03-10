<div id="socDivMsg[[+id]]"><table width="100%"><tr><td>
<div  class="social-msgRead" >

     <table cellpadding="2" cellspacing="0" width="100%"><tr>
     <td width="100px" rowspan="2" align="center" valign="top">
     [[+sender:userinfo=`username`]] <br>
     <img src='[[+sender:userinfo=`photo`:phpthumbon=`wp=100&hp=120&wl=100&hl=120`]]' >
     </td>
     <td  align="left" valign="top" height='20px'>
     <strong>[[+subject]]:</strong> 

     </td>
     <td align="right" valign="top">
      <small style='float:right'>[[+date_sent:dateAgo]] </small> 

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
    <a class="socFormButton"  href="[[~372? &msgID=`[[+id]]`  &recipient=`[[+sender]]`]]"   >ответить</a>
    <a class="socFormButton"  onclick="SocialTools.dialog.delete([[+id]],'inbox', this, '#socDivMsg[[+id]]');"   >удалить</a>
</div>
</td></tr></table>
</td></tr></table>
<div id="socDivReply"></div>
</div>
