<script type="text/javascript" src="<?php echo $this->uri.'/web/js/tinymce.min.js' ?>"></script>
<script type="text/javascript">
tinymce.init({
   selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<div class="page-header">
	<h1>Ajouter / Editer un article</h1>
</div>

<form action="<?php  if(isset($value)) { echo $this->uri.'/posts/edit/'.$value->slug.'-'.$value->id; } else {  echo $this->uri.'/posts/insert'; } ?>" enctype="multipart/form-data" method="post">
	
	 <p>
        <label>Titre</label> : <input type="text" name="name" <?php  if(isset($value)) { ?> value="<?php echo $value->name; ?>"  <?php } ?>/>
    </p>
	 
	 
	 <p>
        <label>Slug</label> : <input type="text" name="slug"  <?php  if(isset($value)) { ?> value="<?php echo $value->slug; ?>" <?php } ?> />
    </p>
	
	
	 <p>
        <label>Categorie</label> : <input type="text" name="category_id"  <?php  if(isset($value)) { ?> value="<?php echo $value->category_id; ?>" <?php } ?> />
    </p>
    
     <p>
        <label>Date de création</label> : <input type="date" name="created" <?php  if(isset($value)) { ?> value="<?php echo $value->created; ?>" <?php } ?> />
    </p>
   
   <?php  if(isset($value) && isset($value->pathimg)) { ?> <img class="img-responsive"  width="300" height="300" src="<?php echo $this->uri.'/web/img/'.$value->pathimg; ?>"  ><?php } ?>
     <p>
        <label>Path to image</label> : <input type="file"  name="pathimg" <?php  if(isset($value)) { ?> value="<?php echo $value->pathimg; ?>"  <?php } ?> />
    </p>
 
       <p>
        <label>Contenu</label> : <textarea rows="10" name="content" style="width:60%;"> <?php  if(isset($value)) { ?> <?php echo $value->content; ?> <?php } ?> </textarea>
    </p>
    <input type="hidden" name="online" value="2" />
	  <input type="checkbox"   name="online" <?php if( isset($value) && $value->online == 1) { ?> checked="checked" value="<?php echo $value->online; ?>" <?php } ?> /> <label >En ligne</label>
	<?php  if(isset($value)) { ?> <input type="hidden" name="id" value="<?php echo $value->id; ?>" /> <input type="hidden" name="purge" value="<?php echo $value->slug; ?>" />   <input type="hidden" name="img" value="<?php echo $value->pathimg; ?>" /><?php } ?>
	
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>



