<?php 
require_once CORE.'template.class.php';

	class wPage extends template{
		
		protected $_url;
		
		function __construct()  {
			
			// lets check if website maintenance system is on or of
			require_once CONFIGS.'main.php';
			if($cfg['maintenance'] == 0) {
			
				// lets make sure that we gather all available values
				$this->_url = isset($_GET['url']) ? $_GET['url'] : '';
				
				if(!empty($this->_url)) {
					
					// filesystem, checks if there is a file with requested page, if not throw 404
					if(file_exists(PAGES.$this->_url.'.php')) {
						// require fle with data handle
						require_once PAGES.$this->_url.'.php';
						// require file with template data
						// craete template class so we don't need craete in every new page template file
						$tpl = new template($this->_url);
						include TPL.$this->_url.'.php';
						$this->closePage();
					} else {
						die('We are sorry , page you requested can\'t be loaded');
					}
					
				} else  {
					// if page is empty that means client requests index.
					require_once PAGES.'index.php';
					// require file with template data
					// craete template class so we don't need craete in every new page template file
					$tpl = new template($cfg['pageTitle']);
					include TPL.'index.php';
					$this->closePage();
				}
				
			} else {
				require_once PAGES.'maintenance.php';
				// require file with template data
				// craete template class so we don't need craete in every new page template file
				$tpl = new template('Maintenance');
				include TPL.'maintenance.php';
				$this->closePage();
			}
			
		}
		
	}