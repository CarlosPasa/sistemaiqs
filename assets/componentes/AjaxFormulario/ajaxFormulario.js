$("#frmFicha").submit(function (event){
		event.preventDefault();
		$("#bsubmit").toggleClass('active');
		var formData = new FormData($("#frmFicha")[0]);
		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:formData,
			cache:false,
			contentType:false,
			processData:false,
			success: function(json){
				try{
					if ("#bsubmit" != null) $("#bsubmit").toggleClass('active');
					var obj = jQuery.parseJSON(json);
					if (obj['STATUS']=='true'){
						if (obj['mensaje'] != null ){
							ShowDialogInformation('Mensaje', obj['mensaje'], obj['redirect_url'])
						}
						else{
							if (obj['redirect_url'] != null){
								window.location.href = obj['redirect_url'];
							}
						}
					}
					else {
						console.log(json);
						console.log(obj);
						ShowDialogWarning('Información', obj['mensaje'],'');
						$("#valida_errors").html(obj['mensaje']);
					}
				}catch(e) {
					ShowDialogError(e.message);
				}
			},
			error: function(request, status, error){
				console.log(request);
				if("#bsubmit" != null) $("$bsubmit").toggleClass('active');
				var $html = $('<div></div>');
				$html.append(request.responseText);
				ShowDialogError($html);
			}
		});
});

/*function ajaxFormularioEnviar2(button){
	$(button).toggleClass('active');
	var myForm = $(button).parents("form");
	var url = $(myForm).attr('action');
	var data = $(myForm).serialize();
	ajaxPost(url, data, button);
}

function ajaxFormularioEnviar(button){
	event.preventDefault();
	$(button).toggleClass('active');
	var myForm = $(button).parents("form");
	var url = $(myForm).attr('action');
	var data = new FormData($("#frmFicha"));
	console.log(data);
	ajaxPost(url, data, button);
}

function ajaxFormularioEnviar3(button){
	$(button).toggleClass('active');
	var myForm = $(button).parents("form");
	var url = $(myForm).attr('action');
	var inputFile = $('input[name=foto]');
	var data = new FormData($("#frmFicha")[0]);
	console.log(url);
	ajaxPost(url, data, button);
}
//console.log(formData);

*/



function ajaxPost(postURL, data, button, divSpin = null){
	//console.log("ajaxPost");
	//alert("#" + divSpin);
	if (divSpin != null) $("#" + divSpin).show();
	$.ajax({
			type: "POST",
			url: postURL,
			cache: false,
			data: data,
			////////////
			contectType: false,
			processData: false,
			////////////
			success: function(json){
				if (divSpin != null) $("#" + divSpin).hide();
				try{
					if (button != null) $(button).toggleClass('active');
					var obj = jQuery.parseJSON(json);
					if (obj['STATUS']=='true'){
						if (obj['mensaje'] != null ){
							ShowDialogInformation('Mensaje', obj['mensaje'], obj['redirect_url'])
						}
						else{
							if (obj['redirect_url'] != null){
								window.location.href = obj['redirect_url'];
							}
						}
						if (obj['jsFunction'] != null){
							setTimeout(obj['jsFunction'], 0);
						}
					}
					else {
						ShowDialogWarning('Información', obj['mensaje'],'');
						$("#valida_errors").html(obj['mensaje']);
					}
				}catch(e) {
					ShowDialogError(e.message);
				}
			},
			error: function(request, status, error){ 
				if (divSpin != null) $("#" + divSpin).hide();
				if (button != null) $(button).toggleClass('active');
				var $html = $('<div></div>');
				$html.append(request.responseText);
				ShowDialogError($html);
			}
		});
}
