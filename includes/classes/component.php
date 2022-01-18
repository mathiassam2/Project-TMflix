<?php 

function inputElement($icon, $placeholder, $name, $value){
	$ele = "
		<div class=\"input-group flex-nowrap\">
		  <span class=\"input-group-text bg-warnings\" id=\"addon-wrapping\">$icon</span>
		  <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" class=\"form-control\" placeholder='$placeholder' aria-label=\"Username\" aria-describedby=\"addon-wrapping\">
		</div>
	";
	echo $ele;
}


function inputCategory($icon, $placeholder, $name, $value){
	$ele = "
		<div class=\"input-group mb-3\">
		  <span class=\"input-group-text bg-warnings\" id=\"basic-addon3\">$icon</span>
		  <input type=\"text\" name='$name' class=\"form-control\" id=\"basic-url\" placeholder='$placeholder' aria-describedby=\"basic-addon3\">
		</div>
	";
	echo $ele;
}

function buttonElement($btnId, $sytleclass, $text, $name, $attr){
	$btn = "
		<button name='$name' '$attr' class='$sytleclass' id='$btnId'>
			$text
		</button>
	";
	echo $btn;
}


?>