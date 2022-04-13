<!DOCTYPE html>

<html lang="en">
<head>
    <meta name="viewport" charset="utf-8" content="width=device-width initial-scale=1, shrink-to-fit=no">
    <title>phpFTW</title>
    <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/css/custom.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

    <script src="/lib/js/jquery-3.5.1.min.js"></script>
    <script src="/lib/js/popper.min.js"></script>
    <script src="/lib/js/tooltip.min.js"></script>
    <script src="/lib/js/bootstrap.bundle.min.js"></script>
	
	<div class="container-fluid">
		<?php if(ENV != "prod" && ENV != "production"):?>
			<div class="row" style="position: fixed; top:0px;width:100%;z-index:10">
				<div class="col-lg-12 text-center mx-auto" style="background-color: red; color:white;">
					<h6 class="m-0 p-0"><?php echo ENV?></h6>
				</div>
			</div>
		<?php endif;?>
		
		<div class="row">
            <div class="col-md-5 mx-auto text-center px-5 pt-4 pb-1">
                <a href="<?php echo((!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/');?>" class="titleLink"><h1>phpFTW 1.0</h1></a>
            </div>
        </div>
		<hr class="my-1" />
		<div class="row">
			<div class="col-md-6 mx-auto justify-content-center">

				<ul class="nav justify-content-center">
					
					<li class="nav-item px-2">
						<a href="/"><div class="col-md-12">Home</div></a>
					</li>

					
				</ul>
				
			</div>
		</div>
		<hr class="mt-1 mb-5" />