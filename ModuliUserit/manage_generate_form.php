<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `question_paper_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
$single_max = 3;
?>
<div class="container-fluid">
	<form action="./?page=generated_question_paper" method="POST" id="type-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		    <div class="form-group">
                <label for="level" class="control-label">choose the level of hardship</label>
                <input type="number" name="level" id="level" min= "1" max = "3" class="form-control form-control-sm rounded-0"  required/>
                <small class="text-primary"><em><?echo $single_max ?> Available Levels</em></small>
            </div>
            <button type="button" id="submit" onclick="$('#uni_modal form').submit()" class="btn btn-primary">Save</button>
            </div>
        </div>
	</form>
</div>
