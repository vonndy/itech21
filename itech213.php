<?php

	require 'db_connect.php';
	
	$start_date = $_GET['start_date'];
	$end_date = $_GET['end_date'];
	$date = $dbh->query("SELECT * FROM literature left join resources 
								on literature.fid_resource=resources.id_resourse 
								left join book_authors on book_authors.fid_book = literature.id_book 
								left join authors on authors.id_author = book_authors.fid_author 
								WHERE (year > '$start_date' AND year < '$end_date') OR (date > '$start_date' AND date < '$end_date')");

	$result=$date->fetchAll();	

?>

<table border = 1>

	<tr>
		<td>Name</td>
		<td>ISBN</td>
		<td>Year</td>
		<td>Number of pages</td>
		<td>Number</td>
		<td>Date</td>
		<td>Publisher</td>
		<td>Resource</td>
		<td>Author</td>
	</tr>
	
	<?php foreach ($result as $row){?>
		<tr>
			
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['isbn']; ?></td>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['quantity']; ?></td>	
			<td><?php echo $row['number']; ?></td>			
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['publisher']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['author_name']; ?></td>
			
		</tr>
	<?php } ?>
	
</table>