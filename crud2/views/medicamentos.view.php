<h2 class="center"> Medicamentos <a  class="btn-floating btn-large button-new tooltipped waves-effect waves-light green" data-position="top" data-delay="50" data-tooltip="Nuevo"><i class="material-icons">add</i></a></h2>

<!-- Modal Editar -->
<div id="modal-editar" class="modal">
	<div class="modal-content">
		<h4 id="id-medicamento-modificar" id-update="" >Modificar</h4>
		<div class="container">
			<form action=>
				<div class="row">
					<input id="modificar-nombre" placeholder="Nombre" type="text" class="validate">
					<input id="modificar-cantidad" placeholder="Cantidad" type="text" class="validate">
					<input id="modificar-precio" placeholder="Precio" type="number" class="validate">
				</div>
			</form>
		</div>
		<div class="container">
			<div class="modal-footer row">
				<a id="new-trigger" class="col s5 left modal-action waves-effect waves-green btn">New</a>
				<a id="update-trigger" class="col s5 right modal-action waves-effect waves-green btn">Modificar</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal Editar -->


<!-- Modal Eliminar -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<h4 id="id-medicamento-eliminar" id-delete="" >¿desea Eliminar?</h4>
		<p>si desea eliminar presione aceptar, de lo contrario presione cancelar</p>
	</div>
	<div class="modal-footer">
		<a id="delete-trigger" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
		<a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
	</div>
</div>
<!-- Modal Eliminar -->

<div class="container">
	<table class="bordered highlight centered">
		<thead>
			<tr>
				<th data-field="">Nombre</th>
				<th data-field="">Cantidad</th>
				<th data-field="">Precio</th>
				<th data-field="">opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($obj as $item): ?>
			<tr id-item = "<?= $item->id_medicamentos ?>">
				<td class="item-nombre"><?= $item->nombre ?></td>
				<td class="item-cantidad"><?= $item->cantidad ?></td>
				<td class="item-precio">$<?= $item->precio ?></td>
				<td>
					<a id-update="<?= $item->id_medicamentos ?>" class="btn-floating button-update tooltipped waves-effect waves-light teal" data-position="top" data-delay="50" data-tooltip="modificar"><i class="material-icons">update</i></a>
					<a id-delete="<?= $item->id_medicamentos ?>" class="btn-floating button-delete tooltipped waves-effect waves-light red" data-position="top" data-delay="20" data-tooltip="eliminar"><i class="material-icons">close</i></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>