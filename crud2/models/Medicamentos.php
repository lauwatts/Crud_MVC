<?php

	class Medicamentos{
		private $pdo;
		public  $nombre;
		public 	$cantidad;
		public 	$precio;

		public function __construct(){
			try{
				$this->pdo = Database::conectar();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function listar(){
			try
			{
				$result = array();
				
				$stm = $this->pdo->prepare("SELECT * FROM medicamentos");

				$stm->execute();
			
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch(Exception $e){
				die($e->getMessage());
			}
		}



		public function eliminar($id_medicamento)
		{
			try
			{
				$stm = $this->pdo->prepare("DELETE FROM medicamentos WHERE id_medicamentos = ?");
				$stm->execute(array($id_medicamento));
				return true;
			} catch (Exception $e){
				die($e->getMessage());
			}
		}

		 public function obtener($nombre) 
		{ 
			try 
			{ 
				$stm = $this->pdo->prepare("SELECT * FROM medicamentos WHERE nombre = ?"); 
				$stm->execute(array($nombre));
				return $stm->fetch(PDO::FETCH_OBJ); 
			} 
			catch (Exception $e) 
			{ 
				die($e->getMessage()); 
			} 
		}

		public function registrar($nombre, $cantidad, $precio) 
		{ 
			if ( $this->obtener($nombre) == false ){
				try 
				{ 
				$sql = "INSERT INTO medicamentos (nombre,cantidad,precio) 
				VALUES (?, ?, ?)"; 
				$this->pdo->prepare($sql)->execute(array( $nombre, $cantidad, $precio));
				return true; 
				} catch (Exception $e) 
				{ 
				die($e->getMessage()); 
				} 
			}
		}

		public function actualizar($id, $nombre, $cantidad, $precio) 
		{ 
			try 
			{ 
				$sql = "UPDATE medicamentos SET 
				nombre          = ?, 
				cantidad		= ?, 
				precio			= ? 
				WHERE id_medicamentos = ?"; 
				$this->pdo->prepare($sql)->execute(array($nombre, $cantidad, $precio, $id ) );
					return true;
			} 
			catch (Exception $e) 
			{ 
				die($e->getMessage()); 
			} 
		} 



	}
 ?>