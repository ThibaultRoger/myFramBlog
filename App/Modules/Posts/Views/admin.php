<div class="page-header">
	<h1> Articles</h1>
</div>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>En ligne ?</th>
			<th>Titre</th>
			<th>Catégorie</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $k => $v): ?>
			<tr>
				<td><?php echo $v->id; ?></td>
				<td><span class="label <?php echo ($v->online==1)?'success':'error'; ?>"><?php echo ($v->online==1)?'En ligne':'Hors ligne'; ?></span></td>
				<td><?php echo $v->name; ?></td>
				<td><?php echo $v->catname; ?></td>
				<td>
					<a href="<?php echo $this->uri.'/posts/edit/'.$v->slug.'-'.$v->id; ?>">Editer</a>
					<a onclick="return confirm('Voulez vous vraiment supprimer cet article'); " href="<?php echo $this->uri.'/posts/delete/'.$v->slug.'-'.$v->id; ?>">Supprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>



<a href="<?php echo $this->uri.'/posts/insert'; ?>" class="primary btn">Ajouter un article</a>
