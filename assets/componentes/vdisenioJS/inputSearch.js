/* **************************************
====== CONTROL: INPUT TEXT ======
*************************************** */

//Establece el proceso de busqueda por ajax
function input_SetSearch(inputName, inputButtonName, urlType, urlAction, urlReturnType, ajaxSetDataFunction, ajaxSuccessFunction, ajaxErrorFunction) {
		$('#' + inputButtonName).on('click', function () {
        control_SetLoading(inputName, true);
		$("#pageSpin").show();
        $.ajax({
            type: urlType,
            url: urlAction,
            dataType: urlReturnType,
            cache: false,
            data: ajaxSetDataFunction(),
            success: function (results) {
				$("#pageSpin").hide();
				control_SetLoading(inputName, false);
                ajaxSuccessFunction(results);
            },
            error: function (ex) {
				$("#pageSpin").hide();
				control_SetLoading(inputName, false);
                ajaxErrorFunction(ex);
            }
        });
    });
	}