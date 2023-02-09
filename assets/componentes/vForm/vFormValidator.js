/* **************************************
====== VALIDADOR DE INPUT TEXT ======
*************************************** */

function vFormValidator_decimal(inputName) {
	$(inputName).keypress(function(event) {	
		if (event.keyCode == 8) {return; } //Backspace
		if (event.keyCode == 9) {return; } //Tab
		if (event.keyCode == 46) {return; } //Delete
		if (event.keyCode == 13) {return; } //Enter
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
}

function vFormValidator_number(inputName) {
	$(inputName).keypress(function(event) {	
		if (event.keyCode == 8) {return; } //Backspace
		if (event.keyCode == 9) {return; } //Tab
		if (event.keyCode == 46) {return; } //Delete
		if (event.keyCode == 13) {return; } //Enter
		if (event.which < 48 || event.which > 57) {
			event.preventDefault();
		}
	});
}