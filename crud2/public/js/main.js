$(document).ready(inicio())

function inicio(){
	$('.tooltipped').tooltip();

	// disparadores que activan la peticion
	deleteTrigger()
	updateTrigger()
	newTrigger()

	// metodos para abrir modales
	openModalModificar()
	openModalNew()
	openModalEliminar()
}

function openModalNew(){
	// accedemos al boton
	$('.button-new').click(function(){
		$('#id-medicamento-modificar').text('Registrar')
		cleanModal();
		$('#modal-editar').openModal();
	})
}

function cleanModal(){
	$('#modificar-nombre').val(undefined)
	$('#modificar-cantidad').val(undefined)
	$('#modificar-precio').val(undefined)
}

function openModalModificar(){
	$('.button-update').click(function(){
		var idUpdate 	= $(this).attr('id-update')
		var nombre 		=$(`tr[ id-item = ${idUpdate} ] .item-nombre`).text()
		var cantidad 	=$(`tr[ id-item = ${idUpdate} ] .item-cantidad`).text()
		var precio 		=$(`tr[ id-item = ${idUpdate} ] .item-precio`).text().substr(1)

		$('#id-medicamento-modificar').text('Modificar')
		$('#id-medicamento-modificar').attr('id-update', idUpdate)
		$('#modificar-nombre').val(nombre)
		$('#modificar-cantidad').val(cantidad)
		$('#modificar-precio').val(parseInt(precio, 10))
		$('#modal-editar').openModal();
	})
}

function newTrigger(){
	$('#new-trigger').click(function(){
		var nombre 		= $('#modificar-nombre').val()
		var cantidad 	= $('#modificar-cantidad').val()
		var precio 		= $('#modificar-precio').val()
		
		if ( nombre && cantidad && precio ){
			window.location = `http://localhost/crud2/medicamentos/registrar/${nombre}/${cantidad}/${precio}`
		} else {
			Materialize.toast('Hay campos vacios!',2000)
		}

	})
}

function updateTrigger(){
	$('#update-trigger').click(function(){
		var nombre 		= $('#modificar-nombre').val()
		var cantidad 	= $('#modificar-cantidad').val()
		var precio 		= $('#modificar-precio').val()
		var id 			= $('#id-medicamento-modificar').attr('id-update');

		if ( nombre && cantidad && precio ){
			// sendAjaxUpdate('medicamentos', 'update', id, nombre, cantidad, precio )
			window.location = `http://localhost/crud2/medicamentos/update/${id}/${nombre}/${cantidad}/${precio}`
		} else {
			Materialize.toast('Hay campos vacios', 2000)
		}
	})
}

function openModalEliminar(){
	$('.button-delete').click(function(){
		$('#id-medicamento-eliminar').attr('id-delete', $(this).attr('id-delete'))
		$('#modal1').openModal();
	})
}

function deleteTrigger(){
	$('#delete-trigger').click(function(){
		var id 			= $('#id-medicamento-eliminar').attr('id-delete'),
			controller 	= 'medicamentos',
			action 		= 'eliminar'
		sendAjaxDelete(controller, action, id)
	})
}

function sendAjaxUpdate(controller,action, id, nombre, cantidad, precio){
	$.get(`${controller}/${action}/${id}/${nombre}/${cantidad}/${precio}`, function(res){
		response = JSON.parse(res);
		console.log(response)
	})
}

function sendAjaxDelete(controller,action,id){
	$.get(`${controller}/${action}/${id}`, function(res){
		response = JSON.parse(res);
		if (response.elimino){
			location.reload()
		}
	})
}