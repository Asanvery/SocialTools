<div id="socDivMsg[[+id]]">
<div  class="social-msgRead" >

<table width='100%' style='border-bottom:1px solid #d1d1d1'>
<tr>
<td width='32'><img src='[[+sender:userinfo=`photo`]]' width='32' height='32'></td><td width='100'>[[+sender:userinfo=`username`]]</td>
<td><strong>[[+subject]]</strong></td>
<td><small style='float:right'>[[+date_sent]]</small></td>
</tr>
</table>

<div class='social-msgReadContent'>[[+message]]</div>
</div>

<div class="btn-toolbar" style='float:right'>
    <a class="socFormButton"  href="[[~formSendResourceID? &msgID=`[[+id]]`  &recipient=`[[+sender]]`]]"   >ответить</a>
    <a class="socFormButton"  onclick="SocialTools.dialog.delete([[+id]],'inbox', this, '#socDivMsg[[+id]]');"   >удалить</a>
</div>

<div id="socDivReply"></div>
</div>
