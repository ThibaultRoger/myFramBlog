
<div class="page-header">
	<h1>Ajouter / Editer une catégorie</h1>
</div>

<form action="<?php  if(isset($value)) { echo $this->uri.'/categorie/edit/'.$value->slug.'-'.$value->id; } else {  echo $this->uri.'/categorie/insert'; } ?>" method="post">
	
	 <p>
        <label>Titre</label> : <input type="text" name="name" <?php  if(isset($value)) { ?> value="<?php echo $value->name; ?>"  <?php } ?>/>
    </p>
	 
	 
	 <p>
        <label>Slug</label> : <input type="text" name="slug"  <?php  if(isset($value)) { ?> value="<?php echo $value->slug; ?>" <?php } ?> />
    </p>
	
	<?php  if(isset($value)) { ?> <input type="hidden" name="id" value="<?php echo $value->id; ?>" />  <?php } ?>
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>



