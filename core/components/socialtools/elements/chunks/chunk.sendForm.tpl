<form id='socForm' method='POST' action=''>
<label>[[%socialtools_form_recipient_label]] </label><br><input type="text" name="recipient" id="recipient" value="[[+recipient]]" class="socFormInput"><br>
<label>[[%socialtools_form_subject_label]] </label><br><input type="text" id="subject" name="subject" value="" class="socFormInput" ><br>
<label>[[%socialtools_form_message_label]] </label><br><textarea id="message" name="message" rows="10" ></textarea>            
<input type="button" name="send" class="socFormButton" onclick="SocialTools.dialog.send(this.form, this);" value="[[%socialtools_form_submit_label]]" ><br>
</form>