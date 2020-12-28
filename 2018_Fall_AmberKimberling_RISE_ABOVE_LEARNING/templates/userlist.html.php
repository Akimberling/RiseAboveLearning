<aside>
	<div class="contain3">
		<h4>"There are many problems, but I think there is a solution to all these problems; it's just one, and it's education."</h4>
		<h5>- <i>Malala Yousafzai</i></h5>
	</div>
</aside>
<main>
	<div class="contain2">
		<h1>USERS</h1>
			<table>
				<thead>
					<th>FIRST</th>
					<th>LAST</th>
					<th class="small">EMAIL</th>
					<th>EDIT</th>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?=$user->fname;?></td>
						<td><?=$user->lname;?></td>							
						<td class="small"><?=$user->email;?></td>
						<td><a class="perm" href="index.php?user/permissions?id=<?=$user->id;?>">Permissions</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
<div class="clear"></div>
</main>
<div class="clear"></div>


