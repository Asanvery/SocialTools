SocialTools.page.Home = function(config) {
	config = config || {};
	Ext.applyIf(config,{
		components: [{
			xtype: 'socialtools-panel-home'
			,renderTo: 'socialtools-panel-home-div'
		}]
	}); 
	SocialTools.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(SocialTools.page.Home,MODx.Component);
Ext.reg('socialtools-page-home',SocialTools.page.Home);