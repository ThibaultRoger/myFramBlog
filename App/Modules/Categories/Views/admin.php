<div class="page-header">
	<h1> Articles</h1>
</div>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Titre</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($categories as $k => $v): ?>
			<tr>
				<td><?php echo $v->id; ?></td>
				<td><?php echo $v->name; ?></td>
				<td>
					<a href="<?php echo $this->uri.'/categorie/edit/'.$v->slug.'-'.$v->id; ?>">Editer</a>
					<a onclick="return confirm('Voulez vous vraiment supprimer ce contenu'); " href="<?php echo $this->uri.'/categorie/delete/'.$v->slug.'-'.$v->id; ?>">Supprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>



<a href="<?php echo $this->uri.'/categorie/insert'; ?>" class="primary btn">Ajouter une catégorie</a>
