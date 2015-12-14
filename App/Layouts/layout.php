<?php
Namespace Layouts
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thibault Roger </title>

     <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->uri.'/web/css/bootstrap.css'; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->uri.'/web/css/blog-home.css' ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
 <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <p class="navbar-brand" >Thibault Roger Blog </p>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo $this->uri; ?>">Blog</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              

               
                <?php echo $this->Session->flash(); ?>
        	<?php echo $content_for_layout; ?>

              
             
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                 <div class="well">
                    <h4>Recherche</h4>
                    <form action="<?php echo $this->uri.'/posts/search'; ?>" method="post" >
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Categories</h4>
                    <div class="row">
                        <div >
                           <?php $categories = $this->call('Categories','index', 'Categories'); ?>
                           
                                
                                <?php foreach ($categories as $k => $v): ?>
			                <a class="list-group-item" href="<?php echo $this->uri.'/categorie/'.$v->slug.'-'.$v->id; ?>" ><?php echo $v->name; ?></a></li>	
		                     <?php endforeach ?> 
                        </div>
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Derniers Articles</h4>
                     <div class="row">
                         <?php $lastposts = $this->call('Posts','last','Posts'); ?>
                                
                                <?php foreach ($lastposts as $k => $v): ?>
			               <li>   <a href="<?php echo $this->uri.'/posts/'.$v->slug.'-'.$v->id; ?>"><?php echo $v->name; ?></a></li>	
		                     <?php endforeach ?> 
                        </div>
                        
                        <!-- /.col-lg-6 -->
                    </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php $this->uri.'/web/js/jquery.js'; ?>" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=""<?php echo $this->uri.'/web/js/bootstrap.min.js'; ?>""></script>

</body>

</html>










