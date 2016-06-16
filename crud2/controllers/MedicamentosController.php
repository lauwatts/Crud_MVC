<?php 
	
class MedicamentosController
{
	public function indexAction()
	{	
		// accediendo al modelo medicamentos y se ejecuta la funcion listar()
		$medicamentos = new Medicamentos();
		$array = $medicamentos->listar();
		//devuelve el objeto vista con los parametros de esta
		return new View('medicamentos', ['obj' => $array]);
	}

	public function pruebaAction($nombre){
		$medicamentos = new Medicamentos();
		$array = $medicamentos->obtener($nombre);
		return ['arr' => $array];
	}

	public function registrarAction($nombre, $cantidad, $precio){
		$medicamentos = new Medicamentos();
		$elimino = $medicamentos->registrar($nombre, $cantidad, $precio);
		return new View('redireccionar');
	}

	public function updateAction($id,$nombre, $cantidad, $precio)
	{
		$medicamentos = new Medicamentos();
		$bool = $medicamentos->actualizar($id,$nombre, $cantidad, $precio);
		return new View('redireccionar');
	}

	public function eliminarAction($id)
	{
		$medicamentos = new Medicamentos();
		$elimino = $medicamentos->eliminar($id);
		return ['elimino' => $elimino];
	}
}

?>