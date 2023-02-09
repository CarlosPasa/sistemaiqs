/* **************************************
====== CONTROL: SELECT ======
*************************************** */

//Obtiene el valor del elemento selecionado del control
function select_GetSelectedValue(selectObjectName) {
    var _ComboBox = document.getElementById(selectObjectName);
    if (_ComboBox == null)
        return 0;
    else
        return (_ComboBox.options[_ComboBox.selectedIndex].value);
}

function select_GetSelectedText(selectObjectName) {
    var _ComboBox = document.getElementById(selectObjectName);
    if (_ComboBox == null)
        return "";
    else
        return (_ComboBox.options[_ComboBox.selectedIndex].innerHTML);
}

//Muestra / Oculta la animación de loading del control
function control_SetLoading(controlName, estado) {
    var _control = document.getElementById(controlName);
    if (estado == true)
        $('#' + controlName).addClass('loading');
    else
        $('#' + controlName).removeClass('loading');
    _control.disabled = estado;
}

//Establece la relacion de dependencia entre dos controles Select
function select_SetCascade(selectOrigenName, selectDestinoName, urlType, urlAction, urlReturnType, ajaxSetDataFunction, ajaxSuccessFunction, ajaxErrorFunction, divSpin = null) {
    $('#' + selectOrigenName).on('change', function () {
		if (divSpin != null) $('#' + divSpin).show();
        $('#' + selectDestinoName).empty();
        control_SetLoading(selectDestinoName, true);
        $.ajax({
            type: urlType,
            url: urlAction,
            dataType: urlReturnType,
            cache: false,
            data: ajaxSetDataFunction(),
            success: function (results) {
				if (divSpin != null) $('#' + divSpin).hide();
                ajaxSuccessFunction(results);
            },
            error: function (ex) {
				if (divSpin != null) $('#' + divSpin).hide();
                ajaxErrorFunction(ex);
            }
        });
    });
}