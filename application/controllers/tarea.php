<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarea extends CI_Controller {

	public function index()
	{
		
		
	}
	
	public function newTasca()
	{
		$edit 		= $_POST['edit'];
		$t_name		= $_POST['name'];
		$t_explain	= $_POST['explain'];
		$t_date_end	= $_POST['data_fi'];
		$t_durada	= $_POST['durada'];
		$t_sprint	= $_POST['sprint'];
		$t_assignada= $_POST['assignada'];
		
		$this->load->model('tasca', 'm_tasca', TRUE);
		$this->m_tasca->newTask($t_name, $t_explain, $t_date_end, $t_sprint);
		
		$lastTask = $this->m_tasca->getLastTask();
		$this->m_tasca->relationTaskUser($lastTask[0]['pk_tasca'], $t_assignada);
	}
	
	public function updateTasca() 
	{		
		$id_tasca 		= $_POST['tasca'];
		$id_usuari_from = $_POST['usr_sender'];
		$id_usuari_to	= $_POST['usr_to'];

		$this->load->model('tasca', 'm_tasca', TRUE);		
		$this->m_tasca->setTascaNewUser($id_tasca, $id_usuari_from, $id_usuari_to);
	}
	
	public function updateTimer() 
	{
		$timer	 	= 	$_POST['temps'];
		$id_tasca	=	$_POST['id_task'];
		$id_ususari	=	$_POST['id_user'];
		
		$this->load->model('tasca', 'm_tasca', TRUE);
		$this->m_tasca->updateTimerTask($id_tasca, $id_ususari, $timer);
		
		$this->load->helper('url');
		redirect(base_url().'home', 'refresh');
		
	}
}
?>