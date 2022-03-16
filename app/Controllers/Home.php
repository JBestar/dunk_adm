<?php 
namespace App\Controllers;

use App\Models\ConfSite_Model;
use App\Models\Member_Model;

class Home extends BaseController
{
	public function index()
	{
		if(is_login())
		{		
			return $this->response->redirect(base_url().'home/conf_password', 'refresh');
		}
		else {
			return $this->response->redirect(base_url().'pages/login', 'refresh');
		}	
	}

	
	public function conf_site(){
		if(is_login())
		{

			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_site'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();

			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;
			
			if($objUser->mb_level >= LEVEL_ADMIN){
				$arrConfig = $confsiteModel->findAll();
				// $arrConfig = $confsiteModel->gets();
				$arrData['arrConfig'] = $arrConfig;
				$arrData['mb_level'] = $objUser->mb_level;
				
				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_site', $arrData);
				echo view('footer');
				
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');

		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}

	
	public function conf_maintain(){
		if(is_login())
		{

			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_site'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();

			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;
			
			if($objUser->mb_level >= LEVEL_ADMIN){
				
				$arrConfig = $confsiteModel->getMaintainConfig();
				$arrData['arrConfig'] = $arrConfig;

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_maintain', $arrData);
				echo view('footer');
				
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');

		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}


	public function conf_betsite(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = " style=\"display:block\"";
			$arrSidebar['conf_site'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_betsite', array("mb_level"=>$objUser->mb_level));
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}
	

	public function conf_powerball(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_game'] = " sidebar-a-active";

			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_powerball');
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}

	public function conf_kenoladder(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_game'] = " sidebar-a-active";

			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_kenoladder');
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}

	public function conf_powerladder(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_game'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_powerladder');
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}


	public function conf_bogleball(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_game'] = " sidebar-a-active";

			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_bogleball');
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}

	
	public function conf_bogleladder(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_game'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			if($objUser->mb_level >= LEVEL_ADMIN){

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_bogleladder');
				echo view('footer');
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}

	public function conf_sound(){
		if(is_login())
		{

			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = "style=\"display:block\"";
			$arrSidebar['conf_other'] = " sidebar-a-active";
			
			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();

			$strUid = $this->session->username;
			$objUser = $memberModel->getInfo($strUid);
			$arrSidebar['mb_level'] = $objUser->mb_level;
			
			if($objUser->mb_level >= LEVEL_ADMIN){
				
				$arrConfig = $confsiteModel->gets();
				$arrData['arrConfig'] = $arrConfig;

				$strSiteName = $confsiteModel->getSiteName();

				echo view('header', array("site_name"=>$strSiteName));	
				echo view('include/sidebar', $arrSidebar);
				echo view('include/main_navbar', array("mb_level"=>$objUser->mb_level));
				echo view('home/conf_sound', $arrData);
				echo view('footer');
				
			} else  $this->response->redirect( base_url().'pages/nopermit', 'refresh');

		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}
	public function conf_password(){
		if(is_login())
		{
			$arrSidebar = getSidebarLinkArray();
			$arrSidebar['confdropdownbtn'] = " main-dropdown-active-btn";
			$arrSidebar['confdropdown'] = " style=\"display:block\"";
			$arrSidebar['conf_password'] = " sidebar-a-active";

			$memberModel = new Member_Model();
			$confsiteModel = new ConfSite_Model();
			$user_id = $this->session->username;
			$objUser = $memberModel->getInfo($user_id);
			$arrSidebar['mb_level'] = $objUser->mb_level;

			$strSiteName = $confsiteModel->getSiteName();

			echo view('/header', ['site_name'=>$strSiteName]);	
			echo view('/include/sidebar', $arrSidebar);
			echo view('/include/main_navbar', array("mb_level"=>$objUser->mb_level));
			echo view('/home/conf_password');
			echo view('/footer');
		}
		else {
			$this->response->redirect( base_url().'pages/login', 'refresh');
		}	
	}
}