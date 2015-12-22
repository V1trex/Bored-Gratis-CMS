<?php 

	class template{
		
		function __construct($currPage) {
			$this->setUpMeta($currPage);
				$this->GenerateTemplate();
		}
		
		function setUpMeta($pageTitle) {
			$curr = $pageTitle;
			include TEMPLATE.'meta.php';
		}
		
		function closePage() {
			include TEMPLATE.'footer.php';
		}
		
		function GenerateTemplate() {
			include TEMPLATE.'tpl.php';
		}
	}