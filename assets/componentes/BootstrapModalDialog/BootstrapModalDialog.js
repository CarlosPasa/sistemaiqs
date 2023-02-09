/*
var types = [BootstrapDialog.TYPE_DEFAULT,
                     BootstrapDialog.TYPE_INFO,
                     BootstrapDialog.TYPE_PRIMARY,
                     BootstrapDialog.TYPE_SUCCESS,
                     BootstrapDialog.TYPE_WARNING,
                     BootstrapDialog.TYPE_DANGER];
*/

function ShowDialogError(mensajeError) {
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_DANGER,
        title: "Se ha producido un error",
        closable: false,
        message: mensajeError,
        buttons: [{
            label: 'Cerrar',
            action: function (dialogRef) {
                dialogRef.close();
            }
        }]
    });
}

function ShowDialogInformation(titulo, mensaje, destinoURL = '') {
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_INFO,
        title: titulo,
        closable: false,
        message: mensaje,
        buttons: [{
            label: 'Aceptar',
            action: function (dialogRef) {
                dialogRef.close();
				console.log(destinoURL.length);
				if (destinoURL.length > 0)
					window.location.href = destinoURL;
            }
        }]
    });
}

function ShowDialogWarning(titulo, mensaje) {
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_WARNING,
        title: titulo,
        closable: false,
        message: mensaje,
        buttons: [{
            label: 'Aceptar',
            action: function (dialogRef) {
                dialogRef.close();
            }
        }]
    });
}

function ShowDialogQuestion(titulo, mensaje, postURL='', postDATA = null, divSpin = null){
    BootstrapDialog.show({
        title: titulo,
        message: mensaje,
        closable: false,
        buttons: [{
            label: 'No',
            cssClass: 'btn-default',
            action: function(dialogItself){
                dialogItself.close();
                return false;
            }
        }, {
            label: 'Si',
            cssClass: 'btn-default',
            action: function(dialogItself){
                dialogItself.close();			
                if (postURL != '') ajaxPost(postURL, postDATA, null, divSpin);
                return true;
            }
        }]
    });
}

function ShowDialogInformationView(titulo, destinoURL) {
	var $pdf = $('<div></div>');
        $pdf.append('<object type="application/pdf" data="'+destinoURL+'" width="100%" height="400">No Support</object>');
    BootstrapDialog.show({
        size: BootstrapDialog.SIZE_WIDE,
        title: titulo,
        closable: true,
        message: $pdf
    });
}

function ShowDialogView(titulo, destinoURL) {
	var $pages = $('<div></div>');
        $pages.load(destinoURL);
    BootstrapDialog.show({
        size: BootstrapDialog.SIZE_WIDE,
        title: titulo,
        closable: true,
        message: $pages
    });
}