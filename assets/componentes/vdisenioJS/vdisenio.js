var _gridtablesufijo = "_table";
var _gridloadsufijo = "_refresh";

function vTableInit(tblObject) {
	console.log(tblObject);
    //Create object
    var divName = tblObject.nombre + _gridloadsufijo;
    var tblName = tblObject.nombre + _gridtablesufijo;
    $("#" + tblObject.nombre).html(
        "<div id='" + divName + "' style='display:none; position: absolute;top: 50%;left: 50%;width: 100%;height: 40px;font-weight: bold;color: navy;'>" +
        "<div class='fa fa-spinner fa-spin'></div><span>Actualizando...</span>" +
        "</div>" +
        "<div class='table-responsive'>"+
        "<div id='table_wrapper' class='dataTables_wrapper form-inline dt-bootstrap no-footer'>"+
        "<table id='" + tblName + "' class='table table-striped table-bordered' cellspacing='0' width='100%'>" +
        "<thead></thead>" +
        "<tbody></tbody>" +
        "</table>"+
        "</div>"+
        "</div>"
    );
    //tHead
    if (tblObject.modelField != null) {
        var thead = document.getElementById(tblName).tHead;
        var strHead = "";
        for (i = 0; i < tblObject.modelField.length; i++) {
            if (tblObject.modelField[i].nombreMostrar == null)
                tblObject.modelField[i].nombreMostrar = tblObject.modelField[i].nombre;
            strHead += '<th class="text-center">' + tblObject.modelField[i].nombreMostrar + '</th>\n';
        }
        thead.innerHTML = strHead;
    }
    //tBody
    vTableRefresh(tblObject);
}

function vTableRefresh(tblObject) {
    if (tblObject.data != null) {
        $("#" + tblObject.nombre + _gridloadsufijo).show();
        $("#" + tblObject.nombre + " tbody").empty();
        var strRow = "";
        for (i = 0; i < tblObject.data.length; i++) {
            strRow = "";
            $row = tblObject.data[i];
            $td_style = "";
            $rowBackcolor = "";
			$valueReplace = "";
            strRow += "<tr ";
            for (j = 0; j < tblObject.modelField.length; j++) {
                $item = tblObject.modelField[j];
                if ($item.arrayReglas != null) {
                    for (k = 0; k < $item.arrayReglas.length; k++) {
                        $itemRule = $item.arrayReglas[k];
                        if ($row[$item.nombreData] == $itemRule.fieldValueCase) {
                            switch ($itemRule.propertyChange) {
                                case 'Row.BackColor':
                                    $rowBackcolor = $itemRule.propertyValue;
                                    break;
                            }
                        }
                    }
                    if ($rowBackcolor != '') {
                        $td_style = "background-color:" + $rowBackcolor + ";";
                    }
                    if ($td_style != '') {
                        strRow += " style='" + $td_style + "' ";
                    }
                }
            }
            strRow += ">\n";
            for (j = 0; j < tblObject.modelField.length; j++) {
                $item = tblObject.modelField[j];
                strRow += "<td ";
                switch ($item.hAlign) {
                    case "center":
                        strRow += "class='text-center' ";
                        break;
                    case "right":
                        strRow += "class='text-right' ";
                        break;
                }
                switch ($item.ancho) {
                    case '':
                        strRow += ""; //echo "width='60px' ";	
                        break;
                    default:
                        strRow += "width='" + $item.ancho + "' ";
                        break;
                }
                strRow += ">";
                if ($item.arrayAcciones == null) {
                    switch ($item.nombreData) {
                        case '':
                        case 'per_page':

                            break;
                        case 'only_selection':
                            strRow += "<input type='radio' id='" + $item.selectionControlName + "' name='" + $item.selectionControlName + "' value='" + $row[$item.selectionControlValue] + "' />";
                            break;
                        case 'multi_selection':
                            strRow += "<input type='checkbox' name='" + $item.selectionControlName + "[]' value='" + $row[$item.selectionControlValue] + "' />";
                            break;
                        case '_arrayid_':
                            strRow += ("0" + (i + 1)).slice(-2);
                            break;
                        default:
							$valueReplace = null;
							if ($item.arrayReglas != null) {
								for (k = 0; k < $item.arrayReglas.length; k++) {
									$itemRule = $item.arrayReglas[k];
									if ($row[$item.nombreData] == $itemRule.fieldValueCase) {
										switch ($itemRule.propertyChange) {
											case 'Cell.Value':
												$valueReplace = $itemRule.propertyValue;
												break;
										}
									}
								}
							}
							if ($valueReplace == null){
								switch ($item.formato) {
									case "":
										strRow += $row[$item.nombreData];
										break;
										/*
										case "*":
											strRow += cValores($row[$item->nombreData]);
										break;
										case "dd/mm/yyyy":
											echo cFechaV($row[$item->nombreData]);
										break;
										*/
								}
							}
							else{
								strRow += $valueReplace;
							}
                            break;
                    }
                    /*
                    if ($item.nombreData != '' && $item.nombreData != 'per_page'){

                    }*/
                } else {
                    $ct = 1; //valor para la barra " | "
                    for (l = 0; l < $item.arrayAcciones.length; l++) {
                        $itemAccion = $item.arrayAcciones[l];
                        $url = "";
                        if ($itemAccion.columnNameID != "") {
                            if ($itemAccion.url != null)
                                $url = $itemAccion.url.replace("_id_", $row[$itemAccion.columnNameID]);
                        }
                        if ($itemAccion.onClick == '') {
                            //vButton("", "", $url, $itemAccion->icono, $itemAccion->class);
                        } else {
                            $url = $itemAccion.onClick;
                            $url = $itemAccion.onClick.replace("_url_", $url);
                            $url = $itemAccion.onClick.replace("_arrayid_", i);
                            $url = $itemAccion.onClick.replace("_id_", $row[$itemAccion.columnNameID]);
                            strRow += "<button type='button'" + 
											"class='" + $itemAccion.class + "' " + "onclick='javascript:" + $url + ";'" + 
											"title='" + $itemAccion.tooltip + "' " +
										" >" +
										"<i class='" + $itemAccion.icono + "'></i> " + "";
							if ($itemAccion.spinner == true)
								strRow += "<span class='spinner'><i class='fa fa-refresh fa-spin'></i></span>";
							strRow += "</button>";
                        }
                        if ($ct < $item.arrayAcciones.length)
                            strRow += ' | ';
                        $ct = $ct + 1; //aumenta en uno el contador, por ciclo
                    }
                }
                strRow += "</td>\n";
            }
            strRow += "</tr>\n";
            $('#' + tblObject.nombre).find('tbody').append(strRow);
        }
        $("#" + tblObject.nombre + _gridloadsufijo).hide();
    }
}

function vExportTableToExcel($button, $tableId) {
    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById($tableId);
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    table_html = table_html.replace("#", "%23");
    //Set data to a link
    var a = document.getElementById($button.id + '_file');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
}