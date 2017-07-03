
EmptyCacheButton = {
	
	prefix: 'extensions.{4cc4a13b-94a6-7568-370d-5f9de54a9c7f}.',
	
	init: function() {
		if (this.getBool('firstRun24') === true) {
			this.addButton();
			this.setBool('firstRun24', false);
		}
	},
	
	getService: function(service_type) {
		switch (service_type) {
			case 'cache':
				return Components.classes["@mozilla.org/netwerk/cache-storage-service;1"]
                .getService(Components.interfaces.nsICacheStorageService);
			break;
			case 'prefs':
				return Components.classes["@mozilla.org/preferences-service;1"]
				.getService(Components.interfaces.nsIPrefBranch);
			break;
			case 'alerts':
				return Components.classes["@mozilla.org/alerts-service;1"]
				.getService(Components.interfaces.nsIAlertsService);
			break;
		}
	},
	
	getBool: function(name) {
		return this.getService('prefs').getBoolPref(this.prefix + name)
	},
	
	setBool: function(name, value) {
		return this.getService('prefs').setBoolPref(this.prefix + name, value);
	},
	
	getInt: function(name) {
		return this.getService('prefs').getIntPref(this.prefix + name)
	},
	
	addButton: function() {
		toolbarButton = 'ecb-button';
		navBar = document.getElementById('nav-bar');
		currentSet = navBar.getAttribute('currentset');
		if (!currentSet) {
			currentSet = navBar.currentSet;
		}
		curSet = currentSet.split(',');
		if (curSet.indexOf(toolbarButton) == -1) {
			set = curSet.concat(toolbarButton);
			navBar.setAttribute("currentset", set.join(','));
			navBar.currentSet = set.join(',');
			document.persist(navBar.id, 'currentset');
			try {
				BrowserToolboxCustomizeDone(true);
			} catch (e) {}
		}
	},
	
	run : function(e) {
		
		if (e == undefined) {
			a = 'default';
		} else {
			var a = e.target.getAttribute('value');
			if (a == '') a = 'default';
		}
		
		if (a == 'options') {
			window.open('chrome://emptycachebutton/content/options.xul', 'Options', 'chrome,centerscreen');
			return null;
		}
		
		if ( a == 'disk' || a == 'all' || (a == 'default' && this.getBool('removeDiskCache') === true) ) {
			this.getService('cache').clear();
		}
		
		if ( a == 'memory' || a == 'all' || (a == 'default' && this.getBool('removeMemoryCache') === true) ) {
			this.getService('cache').purgeFromMemory(3);
		}
		
		if (this.getBool('showNotification') === true) {
			this.getService('alerts').showAlertNotification(
				'chrome://emptycachebutton/skin/icon_32x32.png',
				'Success!', 'Cache has been cleared.', false, '', null, ''
			);
		}
		
		if (this.getInt('doAfterClear') == 2) {
			BrowserReloadSkipCache();
		} else if (this.getInt('doAfterClear') == 3) {
			gBrowser.reloadAllTabs();
		}
		
	}

};

window.addEventListener("load", function () { EmptyCacheButton.init(); }, false);
