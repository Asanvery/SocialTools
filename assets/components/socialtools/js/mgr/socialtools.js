var SocialTools = function(config) {
	config = config || {};
	SocialTools.superclass.constructor.call(this,config);
};
Ext.extend(SocialTools,Ext.Component,{
	page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('socialtools',SocialTools);

SocialTools = new SocialTools();