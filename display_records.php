

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/modify_records.js"></script>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="wrapper">
			
			<?php
				$host="localhost";
				$username="user";
				$password="123";
				$databasename="clients";
				
				$connect=mysql_connect($host,$username,$password);
				$db=mysql_select_db($databasename);
				
				$errors = array();
				
				if (!$connect) $errors[] = 'Cannot connect to database';
				if (!$db) $errors[] = 'Cannot find database';
				
				$select = mysql_query("SELECT * FROM users");			
			?>
			
			<div class="add" id="new_row">
				<form name="addForm" action="#"  method="post">
					<div class="row hint"><span class="req">*</span> - These fields are mandatory</div>
					<div class="row">
						<div class="col-sm-6">
							<label>First Name<span class="req">*</span>
								<input id="first_name" class="info" placeholder="What is your name?" tabindex="1" type="text" required autocomplete="on" name="firstName"/>
							</label>
						</div>
						<div class="col-sm-6">
							<label>Second Name<span class="req">*</span>
								<input id="second_name" class="info" placeholder="What is your second name?" tabindex="2" type="text" required autocomplete="on" name="secondName"/>
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<label>E-mail<span class="req">*</span></label>
							<input id="mail" class="info" placeholder="What is yor e-mail?" tabindex="3" type="text" required autocomplete="on" name="mail" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="sbm-btn btn btn-lg btn-block submitbtn" name="submitbtn" value="Submit" onclick="insert_row()">Add</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<?php
					if (!empty($errors))
					{
						echo '<hr /><ul class="errors">';
						foreach ($errors as $err)
						{
							echo '<li>'.htmlspecialchars($err).'</li>';
						}
						echo '</ul>';
					}
				?>
			</div>
				<table align="center" cellpadding="10" border="1" id="user_table">
				<tr>
					<th>First Name</th>
					<th>Second Name</th>
					<th>Mail</th>
					<th>Editing</th>
					<th></th>
				</tr>
				<?php
					while ($row=mysql_fetch_array($select)) 
					{
					?>
					<tr id="row<?php echo $row['id'];?>">
						<td id="firstN_val<?php echo $row['id'];?>"><?php echo $row['FirstName'];?></td>
						<td id="secondN_val<?php echo $row['id'];?>"><?php echo $row['SecondName'];?></td>
						<td id="mail_val<?php echo $row['id'];?>"><?php echo $row['Email'];?></td>
						<td>
							<input type='button' class="edit_button btn btn-info btn-sm" id="edit_button<?php echo $row['id'];?>" value="edit" onclick="edit_row('<?php echo $row['id'];?>');">
							<input type='button' class="save_button btn btn-warning btn-sm" id="save_button<?php echo $row['id'];?>" value="save" onclick="save_row('<?php echo $row['id'];?>');">
							<input type='button' class="delete_button btn btn-danger btn-sm" id="delete_button<?php echo $row['id'];?>" value="delete" onclick="delete_row('<?php echo $row['id'];?>');">
						</td>
					</tr>
					<?php
					}
				?>
			</table>
			
		</body>
	</html>			