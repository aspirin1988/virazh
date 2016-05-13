<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Красивая Работа | <?php wp_title() ?></title>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="<?php bloginfo('template_directory') ?>/public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/styles.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- начало HEADER -->
<header class="container">
	<a href="/"><img class="header__logo" src="<?=get_field('logo',4)?>" alt="Лого"></a>
	<p class="header__header-summary"><?=get_field('description',4) ?></p>
	<div class="nav-and-phonenumbers">
		<!--(начало) навменю -->
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="navbar-collapse collapse">
				<!-- Left nav -->
				<ul class="nav navbar-nav">
					<?php $menu=wp_get_nav_menu_items('main'); $title=get_post();/* print_r($menu);*/  foreach ($menu as $key=>$val) {
							if (!$val->menu_item_parent){ $class='';  $title=get_post();
								if($title->ID==$val->object_id){$class='active';} ?>
						<li class="<?php echo $class;?>"><a href="<?=$val->url?>"><?=$val->title?></a>
							<?php $col=0; foreach ($menu as $key1=>$val1) : if ($val1->menu_item_parent==$val->ID): $col++; endif; endforeach;
							if ($col) :
							?>
							<ul class="dropdown-menu">
							<?php foreach ($menu as $key1=>$val1) : if ($val1->menu_item_parent==$val->ID): ?>
								<li class="<?php echo $class;?>"><a href="<?=$val1->url?>"><?=$val1->title?></a>
									<?php $col1=0; foreach ($menu as $key2=>$val2) : if ($val2->menu_item_parent==$val1->ID): $col1++; endif; endforeach;
									if ($col1) :
										?>
										<ul class="dropdown-menu">
											<?php foreach ($menu as $key2=>$val2) : if ($val2->menu_item_parent==$val1->ID): ?>
												<li class="<?php echo $class;?>"><a href="<?=$val2->url?>"><?=$val2->title?></a></li>
											<?php endif; endforeach;?>
										</ul>
									<?php endif;?>
								</li>
							<?php endif; endforeach;?>
							</ul>
							<?php endif;?>
						</li>
					<?php }

					}
					?>

				</ul>
			</div><!--/.nav-collapse -->

		</div>
		<!--(конец) навменю -->

		<div class="tel-numbers">
			<a href="tel:<?=get_field('phone1',4) ?>" class="tel-numbers__cell-number"><?=get_field('phone1',4) ?></a>
			<a href="tel:<?=get_field('phone2',4) ?>" class="tel-numbers__fixed-number"><?=get_field('phone2',4) ?></a>
		</div>
	</div>
</header>
<!-- конец HEADER -->