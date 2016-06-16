<?php 
	
class HomeController
{
	public function indexAction()
	{	
		$medicamentos = new Medicamentos();
		$array = $medicamentos->listar();
		return new View('home', ['obj' => $array]);
	}
}

?>