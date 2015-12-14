


<?php 

foreach ($posts as $k => $v)  { ?>

<h2>
                    <a href="<?php echo $this->uri.'/posts/'.$v->slug.'-'.$v->id; ?>"><?php echo $v->name; ?></a>
                </h2>
                <p class="lead">
                    <a href="<?php echo  $this->uri.'/categorie/'.$v->catslug.'-'.$v->category_id; ?>"><?php echo $v->catname; ?></a>
                </p>
                
               
                <img class="img-responsive"  width="300" height="300" src="<?php echo $this->uri.'/web/img/'.$v->pathimg; ?>"  title="<?php echo $v->name; ?>" alt="<?php echo $v->name; ?>" >
                <hr>
                <p><?php echo substr(wordwrap(strip_tags($v->content), 100, '<br />', true),0,300); ?>...</p>
                 <hr>
                <a class="btn btn-primary" href="<?php echo $this->uri.'/posts/'.$v->slug.'-'.$v->id; ?>">Lire la suite <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
                
                      
               
<?php } ?>










