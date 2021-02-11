class product {
	var pName:String;
	var pValues:Array;
	var pColor:String;
	var pSize:String;
	var pTextColor:String;
	
	function product(pName:String, pValues:Array, pColor:String, pSize:String, pTextColor:String) {
		this.pName = pName;
		this.pValues = pValues;
		this.pColor = pColor;
		this.pSize = pSize;
		this.pTextColor = pTextColor;
	}
	
	function getName() {
		return this.pName;
	}
	
	function getValue(ind:Number) {
		return this.pValues[ind];
	}
	
	function getColor() {
		return this.pColor;
	}
	
	function getSize() {
		return this.pSize;
	}	
	
	function getTextColor() {
		return this.pTextColor;
	}
}