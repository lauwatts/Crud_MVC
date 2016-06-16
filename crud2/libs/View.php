<?php 
// la vista puede ser una respuesta(response del server) 
class View extends Response{

	protected $template;
	protected $vars = array();	

	public function __construct($template, $vars = array())
	{
		$this->template = $template;
		$this->vars 	= $vars;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function getVars(){
		return $this->vars;
	}

	// sobre escribe el metodo abstracto execute
	public function execute(){

		//onmbre de la plantilla a renderizar
		$template 	= $this->getTemplate();
		// datos(parametros) que puede llevar la vista
		$vars 		= $this->getVars();
 
		call_user_func(function() use ($template, $vars) {
			
			extract($vars);

			//patron decorator para reutilizar codigo html
			//lee corriente(stream) de entrada para almacenarla en buffer
			ob_start();
			
			//se almacena en buffer el archivo.php
			require "views/$template.view.php";

			// obtenemos la corriente de salida(el archivo) y la almacenamos en una variable
			$view_content = ob_get_clean();

			//llamamos a la plantilla principal (layout) con la variable contentView que tiene almacenado el archivo views/$template.view.php
			require "views/layout.view.php";
		});
	}


}

 ?>