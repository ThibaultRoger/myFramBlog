
<div class="row">
	<div class="span13">
		<div class="page-header">
			<h1 ><?php echo $post->name; ?> <br> <small><a href="<?php echo $this->uri.'/categorie/'.$post->catslug.'-'.$post->category_id; ?>"><?php echo $post->catname; ?></a></small></h1>
		<img class="img-responsive" src="<?php echo $this->uri.'/web/img/'.$post->pathimg; ?>" width="500" height="500" title="<?php echo $post->name; ?>" alt="<?php echo $post->name; ?>">
		
		</div>
		<article><?php echo nl2br($post->content); ?></article>
	</div>
	
</div>



