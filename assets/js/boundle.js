$ (document).ready (function () {
	boundle = {};
	boundable = "[data-boundle]";
	
	reBoundle = function (element) {
		if (!$ (element).data ("boundle-to")) {
			return true;
		}
		
		toBoundle = $ (element).data ("boundle-to");
		
		fromTag = $ (element).prop ("tagName");
		
		if (fromTag == "INPUT" || 
		fromTag == "SELECT" || 
		fromTag == "TEXTAREA") {
			if (typeof $ (element).attr ("type") == "undefined") {
				inputType = "text";
				
				fromValue = $ (element).val ();
			}
			else {
				inputType = $ (element).attr ("type");
			}
			
			if (inputType == "checkbox") {
				fromValue = $ (element).prop ("checked");
			} else if (inputType == "radio") {
				fromValue = $ (element).prop ("checked");
			} else {
				fromValue = $ (element).val ();
			}
		} else {
			fromValue = $ (element).text ();
		}
		
		$ (toBoundle).each (function (index, value) {
			toTag = $ (value).prop ("tagName");
			
			if (toTag == "INPUT" || toTag == "SELECT" || toTag == "TEXTAREA") {
				if (typeof $ (value).attr ("type") == "undefined") {
					inputType = "text";
					
					$ (value).val (fromValue);
				}
				else {
					inputType = $ (value).attr ("type");
				}
				
				if (inputType == "checkbox") {
					$ (value).prop ("checked", fromValue);
				} else if (inputType == "radio") {
					$ (value).prop ("checked", fromValue);
				} else {
					$ (value).val (fromValue);
				}
			} else {
				$ (value).text (fromValue);
			}
		});
	};
	
	getBoundle = function (element) {
		var key = $ (element).attr ("data-boundle");
		
		reBoundle (element);
		
		var elementTag = $ (element).prop ("tagName");
		var elementType = $ (element).attr ("type");
		
		if (elementTag == "INPUT") {
			// EXCEPT PASSWORD (DOESN'T PROVIDE VALUE), BUTTON, SUBMIT, ...
			if (elementType == "button" || elementType == "submit" || elementType == "password") return true;
			
			if (elementType == "checkbox") {
				boundle [key] = $ (element).prop ("checked");
			} else if (elementType == "radio") {
				boundle [key] = $ (element).prop ("checked");
			} else {
				boundle [key] = $ (element).val ();
			}
		} else if (elementTag == "SELECT") {
			boundle [key] = $ (element).val ();
		} else if (elementTag == "TEXTAREA") {
			boundle [key] = $ (element).val ();
		}
		else {
			boundle [key] = $ (element).text ();
		}
	};
	
	setBoundle = function (merge) {
		for (key in merge) {
			boundle [key] = merge [key];
		}
		
		for (id in boundle) {
			selector = "[data-boundle=" + id + "]";
			
			$ (selector).val (boundle [id]);
		}
	};
	
	boundleForms = function () {
		var formElements = "textarea, input";
		
		$ (formElements).each (function (index, value) {
			if (!$ (this).attr ("data-boundle")) {
				var boundleName = "boundle-" + $ ("[data-boundle]").length;
				
				if ($ (this).attr ("id")) {
					boundleName = $ (this).attr ("id");
				} else if ($ (this).attr ("name")) {
					boundleName = $ (this).attr ("name");
				}
				
				$ (this).attr ("data-boundle", boundleName);
			}
		});

		initializeBoundle ();
	};

	var initializeBoundle = function () {
		$ (boundable).each (function (index, value) {
			// console.log (this);
			
			getBoundle (value);
		});
		
		$ (boundable).change (function (e) {
			getBoundle (this);
		});
		
		$ (boundable).keyup (function (e) {
			getBoundle (this);
		});
		
		$ (boundable).blur (function (e) {
			getBoundle (this);
		});
	};
	
	initializeBoundle ();
});