class product {
	var pName:String;
	var pValue:String;
	var pColor:String;
	var pUrl:String;
	var pUrlTarget:String;
	
	function product(pName:String, pValue:String, pColor:String, pUrl:String, pUrlTarget:String) {
		this.pName = pName;
		this.pValue = pValue;
		this.pColor = pColor;
		this.pUrl = pUrl;
		this.pUrlTarget = pUrlTarget;
	}
	
	function getName() {
		return this.pName;
	}
	
	function getValue() {
		return this.pValue;
	}
	
	function getColor() {
		return this.pColor;
	}
	
	function getUrl() {
		return this.pUrl;
	}
	
	function getUrlTarget() {
		return this.pUrlTarget;
	}
	
}