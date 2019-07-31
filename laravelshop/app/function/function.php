<?php

function menuMuti($data, $parent_id = 0, $str = "--|", $select = 0)
{
	foreach ($data as $value) {
		$id = $value['id'];
		$name = $value['name'];
		if($value['parent_id'] == $parent_id){
			if($select != 0 && $id == $select){
				echo '<option value = "'.$id.'" selected>'.$str." ".$name.'<option>';
			}else{
				echo '<option value = "'.$id.'">'.$str." ".$name.'<option>';
			}
			menuMuti($data, $id,  $str."--|", $select);
		}
	}
}

?>
