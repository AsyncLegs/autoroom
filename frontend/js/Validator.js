export class Validator{
	constructor(){
		this.dataValidator = document.querySelectorAll('[data-validator]');
		this.dataValidatorLimit = document.querySelectorAll('[data-validator-limit]');
	}
	validate(){
		let dataValidator = this.dataValidator;
		let dataValidatorLimit = this.dataValidatorLimit;
		for(let i =0; i<dataValidator.length;i++){
			let validatorType = dataValidator[i].getAttribute('data-validator');
			switch (validatorType) {
				case 'latinOnly':
					this.addLatinOnlyEL(dataValidator[i]);
					break;
				case 'numbersOnly':
					this.addNumbersOnlyEL(dataValidator[i]);
					break;
				case 'latinAndNumberOnly':
					this.addLatinAndNumberOnlyEL(dataValidator[i]);
					break;
				default:
					break;
			}
		}
		for(let j =0; j<dataValidatorLimit.length;j++){
			this.addSymbolLimitedEL(dataValidatorLimit[j]);
		}
	}
	addLatinOnlyEL(target) {
		target.addEventListener("keypress", this.latinaOnlyValidation);
	}
    addLatinAndNumberOnlyEL(target) {
		target.addEventListener("keypress", this.latinaAndNumberOnlyValidation);
	}
	addNumbersOnlyEL(target) {
		target.addEventListener("keypress", this.numbersOnlyValidation);
	}
	addSymbolLimitedEL(target) {
		let limit = target.getAttribute('data-validator-limit');
		target.addEventListener("keypress", this.limitSymbolValidation.bind(null,{limit:limit,target:target}));
	}
	
	
	limitSymbolValidation(settings,event) {
		let limit = settings.limit;
		let target = settings.target;
		if(!target || !limit) return;
		if(target.value.length >= limit){
			event.preventDefault(); return false;
		}
		
	}
	latinaOnlyValidation(event) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	}
    latinaAndNumberOnlyValidation(event) {
		var regex = new RegExp("^[a-zA-Z0-9 ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	}
	numbersOnlyValidation(event) {
		var regex = new RegExp("^[0-9 ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	}
}

