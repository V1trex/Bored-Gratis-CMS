<?php 
	
	function contentStart(){
		echo '<div class = "content">';
	}
	
	function contentClose(){
		echo '</div>';
	}
	
	function startLeft(){
		echo '<div class = "leftSide">';
	}
	
	function closeLeft(){
		echo '</div>';
	}
	
	function startRight(){
		echo '<div class = "rightSide">';
	}
	
	function closeRight(){
		echo '</div>';
		echo '<div class = "clear"></div>';
	}
	
	function head($title) {
		echo '<div class = "header">';
			echo "<a href = ''>$title</a>";
		echo '</div>';
	}
	
	function openTable($title,$content) {
		echo '<div class = "tableUp">
			'.$title.'
		</div>';
		echo '<div class = "tableBody">
			'.$content.'
		</div>';
		echo '<div class = "tableFoot"></div>';

	}
	
	function openSide($title,$content) {
		echo '<div class = "panelUp">
			'.$title.'
		</div>';
		echo '<div class = "panelBody">
			'.$content.'
		</div>';
		echo '<div class = "panelFoot"></div>';

	}
	
	function nav($items) {
		
		echo '<div class = "nav">';
			$navItems = explode(',',$items);
			foreach($navItems as $navItem) {
				echo '<a href = "'.strtolower($navItem).'.html" class = "nav_item" >'.$navItem.'</a>';
			}
		echo '</div>';

	}