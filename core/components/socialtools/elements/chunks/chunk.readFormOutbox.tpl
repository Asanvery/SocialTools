<div id="socDivMsg[[+id]]">
<div  class="social-msgRead" >

<table width='100%' style='border-bottom:1px solid #d1d1d1'>
<tr>
<td width='32'><img src='[[+sender:userinfo=`photo`]]' width='32' height='32'></td><td width='100'>[[+sender:userinfo=`username`]]</td>
<td><strong>[[+subject]]</strong></td>
<td><small style='float:right'>[[+date_sent:dateAgo]]</small></td>
</tr>
</table>

<div class='social-msgReadContent'>[[+message]]</div>
</div>

<div class="btn-toolbar" style='float:right'>
    <a class="socFormButton"  href="[[~3? &msgID=`[[+id]]`  &recipient=`[[+sender]]`]]"   >[[%socialtools_form_button_answer]]</a>
    <a class="socFormButton"  onclick="SocialTools.message.delete([[+id]],'outbox', socDivMsg[[+id]]);"   >[[%socialtools_form_button_delete]]</a>
</div>
</div>
