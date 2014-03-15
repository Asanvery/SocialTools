SocialTools = {
	initialize: function() {
		if(!jQuery().ajaxForm) {
			
			document.write('<script src="'+SocialToolsConfig.jsUrl+'lib/jquery.form.min.js"><\/script>');
		}
		
		switch(SocialToolsConfig.notify)
		{
			case 'alertify':
					document.write('<script src="'+SocialToolsConfig.jsUrl+'lib/alertify.min.js"><\/script>');
			break;
			case 'jgrowl':
			if(!jQuery().jGrowl) {
				document.write('<script src="'+SocialToolsConfig.jsUrl+'lib/jquery.jgrowl.min.js"><\/script>');
			}
			break;
			case 'default':
					document.write('<script src="'+SocialToolsConfig.jsUrl+'lib/alertify.min.js"><\/script>');
			break;
		}
		
		
	},
	dialog: {
		send: function(form,button) {
			$(form).ajaxSubmit({
				data: {action: 'dialog/send'}
				,url: SocialToolsConfig.actionUrl
				,form: form
				,button: button
				,clearForm: false
				,dataType: 'json'
				,beforeSubmit: function() {
					$(button).attr('disabled','disabled');
					return true;
				}
				,success: function(response) {
					if (response.success) {

						SocialTools.Notify.success(response.message);
						$(form).clearForm();
					}
					else {
		                SocialTools.Notify.error(response.message);
					}
				$(button).removeAttr('disabled');
				}
			});
		},
		delete: function(id,type,button,socdiv) {
			$.ajax({
				data: {action: 'dialog/'+type+'/delete',id: id}
				,url: SocialToolsConfig.actionUrl
				,dataType: 'json'
				,type:'POST'
				,success: function(response) {
					if (response.success) {
						SocialTools.Notify.success(response.message);
						$(socdiv).hide('slow');

					}
					else {
		                SocialTools.Notify.error(response.message);
					}
				
				}
			});
		}
	}
}

SocialTools.Notify = {
	success: function(message) {
		if (message) {
			switch(SocialToolsConfig.notify)
				{
					case 'alertify':
						alertify.set({ delay: 5000 });
						alertify.success(message);
						break;
					case 'jgrowl':
						$.jGrowl(message, {theme: 'socialtools-message-success'});
						break;
					case 'default':
						alertify.set({ delay: 5000 });
						alertify.success(message);
					break;
				}
		}
	}
	,error: function(message) {
		if (message) {
			switch(SocialToolsConfig.notify)
				{
					case 'alertify':
						alertify.set({ delay: 5000 });
						alertify.error(message);
						break;
					case 'jgrowl':
						$.jGrowl(message, {theme: 'socialtools-message-error'});
						break;
					case 'default':
						alertify.set({ delay: 5000 });
						alertify.error(message);
					break;
				}
		}
	}
	,info: function(message) {
		if (message) {
			switch(SocialToolsConfig.notify)
				{
					case 'alertify':
						alertify.set({ delay: 5000 });
						alertify.log(message);
						break;
					case 'jgrowl':
						$.jGrowl(message, {theme: 'socialtools-message-info'});
						break;
					case 'default':
						alertify.set({ delay: 5000 });
						alertify.success(message);
					break;
				}
		}
	}

	
};


SocialTools.initialize();