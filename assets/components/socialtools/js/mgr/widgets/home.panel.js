SocialTools.panel.Home = function(config) {
	config = config || {};
	Ext.apply(config,{
		border: false
		,baseCls: 'modx-formpanel'
		,items: [{
			html: '<h2>'+_('socialtools')+'</h2>'
			,border: false
			,cls: 'modx-page-header container'
		},{
			xtype: 'modx-tabs'
			,bodyStyle: 'padding: 10px'
			,defaults: { border: false ,autoHeight: true }
			,border: true
			,activeItem: 0
			,hideMode: 'offsets'
			,items: [{
				title: _('socialtools_items')
				,items: [{
					html: _('socialtools_intro_msg')
					,border: false
					,bodyCssClass: 'panel-desc'
					,bodyStyle: 'margin-bottom: 10px'
				},{
					xtype: 'socialtools-grid-items'
					,preventRender: true
				}]
			}]
		}]
	});
	SocialTools.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(SocialTools.panel.Home,MODx.Panel);
Ext.reg('socialtools-panel-home',SocialTools.panel.Home);
