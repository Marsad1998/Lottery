<?php 
	require_once '../php_action/db_connect.php';
	@$name = $_POST['name'];
	if ($name != '') {
		$q = mysqli_query($dbc,"INSERT INTO todo (todo_name,todo_sts) VALUES ('$name',0)");
		echo 'Todo Task Added Successfully';
	}

	@$load = $_POST['load'];
	if ($load != '') {
		$q = mysqli_query($dbc,"SELECT * FROM todo ORDER BY todo_id DESC LIMIT 5");
		while ($r = mysqli_fetch_assoc($q)) {   
			if ($r['todo_sts'] == '0') {
				echo '<li class="clearfix">
						<div class="todo-check pull-left">
	                    	<input class="edit" type="checkbox" value="'.$r['todo_id'].'" id="todo-check'.$r['todo_id'].'">
	                        <label for="todo-check"></label>
	                    </div>
	                    <p class="todo-title">'.$r['todo_name'].'</p>
							<div class="todo-actionlist pull-right clearfix">
	                        <a href="#" class="todo-remove removeTodo" id="'.$r['todo_id'].'"><i class="fa fa-times"></i></a>
						</div>
	                  </li>';
			}else{
				echo '<li class="clearfix">
						<div class="todo-check pull-left">
	                    	<input type="checkbox" value="None" id="todo-check'.$r['todo_id'].'">
	                        <label for="todo-check"></label>
	                    </div>
	                    <p class="todo-title"><del>'.$r['todo_name'].'</del></p>
							<div class="todo-actionlist pull-right clearfix">
	                        <a href="#" class="todo-remove removeTodo" id="'.$r['todo_id'].'"><i class="fa fa-times"></i></a>
						</div>
	                  </li>';
			}
		}
	}	

	@$id = $_POST['id'];
	if ($id != '') {
		$q = mysqli_query($dbc,"DELETE FROM todo WHERE todo_id = '$id'");
		echo 'Task Deleted'; 
	}

	@$id2 = $_POST['id2'];
	if ($id2 != '') {
		$q = mysqli_query($dbc,"UPDATE todo SET todo_sts = '1' WHERE todo_id = '$id2'");
		echo 'Task Completed'; 
	}
?>