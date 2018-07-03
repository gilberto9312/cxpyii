var Buscador = function(botonId,logid,action) {
	$('#'+botonId).click(function(){
		var logbus = $('#'+logid);
		var texto = $('#cyaBuscarPersona_buscapersona').val();
		var lista = $('#cyaBuscarPersona_idpersona');
		lista.find('option').each(function(){ $(this).remove(); });
		logbus.html("buscando...");
		$.getJSON(action+"&texto="+texto
			, function(data) {
			lista.append("<option value=''>-seleccione-</option>");
			logbus.html("");
			var nresult=0;
			$.each(data, function(key, val) {
					lista.append("<option value='"+val.id+"'>"+val.label+" - "
						+val.extra+"</option>");
					nresult++;
			});
			if(nresult > 0)
				$('#cyaBuscarPersona_idpersona').show('fast');
		}).error(function(e){ logbus.html("error: "+e.responseText); setTimeout(function(){ logbus.html(""); 
			},5000); });
	});
	$('#cyaBuscarPersona_idpersona').hide();
};


// inserta un editbox en la ultima columna del tr, al hacer post causa:
//  [monto,Array][--2,22--][--4,44--][--5,55--][--6,--][--8,--][--9,--][listacargos,2,5][total,2444]
//  siendo: [--2,...] el idcuenta y el valor [..,22--] es texto introducido
var _comboEditBoxCGridView = function(){
	
	var _keys = new Array();
	var keys = $('#grid-consulta-cuenta .keys').find("span").each(function(n){
		var idcuenta = $(this).html();
		_keys[n] = idcuenta;
	});

	$('#grid-consulta-cuenta tbody').find('tr .primeracolumna').each(function(){
		var obj = $(this);
		obj.parent().parent().find('td.editbox').each(function(n){
			var idcuenta = _keys[n];
			var tdeditbox = $(this);
			var modelname = "CyaSeleccionaCargos[monto]["+idcuenta+"]";
			
			var input = "<input name='"+modelname+"' type='text' size=20 maxlength=10 style='text-align: right; width: 80px;'>";
			tdeditbox.html(input);
			var editbox = tdeditbox.find('input');
			
			// busca el valor en su hiddenfield correspondiente:
			// el div contiene hiddenfields con name y id = 'monto_'+idcuenta
			editbox.val($('#hiddenfieldvalues').find('#monto_'+idcuenta).val());
		});
	});
}
