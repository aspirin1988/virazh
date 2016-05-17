<?php include_once ('woo_cat.php')?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Вираж | Главная</title>

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="<?php bloginfo('template_directory') ?>/public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/animate.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory') ?>/public/css/styles.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<header>
	<div class="container">
		<div class="header__phone-numbers">
			<p><a href="tel:<?=get_field('phone1',4)?>"><?=get_field('phone1',4)?></a></p>
			<p><a href="tel:<?=get_field('phone2',4)?>"><?=get_field('phone2',4)?></a></p>
		</div>
		<a href="/"> <img class="header__logo" src="<?=get_field('logo',4)?>" alt="Лого"></a>
		<form class="header__search-form" action="?">
			<input type="text" placeholder="Поиск по сайту">
			<input type="submit" value="Поиск">
		</form>
	</div>
</header>

<div class="content"><!--НАЧАЛО .content - общий див для контента ниже хедера и выше футера для sticky-navbar'a -->

	<!--НАЧАЛО навбар-->
	<nav class="navbar container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>


		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
		<?php $menu=wp_get_nav_menu_items('main'); /*print_r($menu);*/ $title=get_post();/* print_r($menu);*/
		foreach ($menu as $key=>$val) {
			if ($val->menu_item_parent==0){ $class='';  $title=get_post();
				if($title->ID==$val->object_id){$class='active';} ?>
				<li class="<?=$class?>" >
					<a href="<?=$val->url?>"><?=$val->title?></a>
					<?php if (isset_child($menu,$val->ID)){?>
						<div class="submenu subcatalog row">
						<?php $child=get_child($menu,$val->ID);
								$size=12/count($child);
								foreach ( $child as $key1=>$val1):
						?>
						<div class="col-sm-<?=$size?>">
							<ul>
								<li><h5><a href="<?=$val1->url?>"><?=$val1->title?></a></h5></li>
								<?php if (isset_child($menu,$val1->ID)){?>
									<?php $child=get_child($menu,$val1->ID);
									foreach ( $child as $key2=>$val2):
										?>
									<li><a href="<?=$val2->url?>"><?=$val2->title?></a></li>
									<?php endforeach; ?>

								<?php }?>
							</ul>
						</div>
						<?php endforeach; ?>
						</div>
					<?php }?>
				</li>
			<?php }

		}
		?>

				<li>
					<a href="#">Финансовые продукты</a>
					<div class="submenu subfinancial row">
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Кредит</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Рассрочка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Лизинг</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Сервис</a>
					<div class="submenu subservice row">
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Зап. части</a>
					<div class="submenu subautoparts row">
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Акции</a>
					<div class="submenu subakcii row">
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Субссылка</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Новости</a>
					<div class="submenu subnews row">
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Раздел новостей</a></h5></li>
								<li><a href="articles.html">Каталог статьей</a></li>
								<li><a href="single_article.html">Одная статья</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Раздел новостей</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul>
								<li><h5><a href="#">Раздел новостей</a></h5></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
								<li><a href="#">Ссылка</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
	<!--КОНЕЦ навбар-->

	<?php
woocommerce_breadcrumb(array('delimiter'=>' > ', 'home'=>'Главная' ));


/*function the_breadcrumb() {
	if (!is_front_page()) {
		echo '<a href="';
		echo get_option('home');
		echo '">Главная';
		echo "</a> » ";
		if ((is_category() || is_single())) {
			the_category(' ');
			if (is_single()) {
				echo " » ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
	else {
		echo 'Главная';
	}
}

the_breadcrumb();*/

function isset_child($menu,$parent=0)
{
	$col = 0;
	foreach ($menu as $key => $value) {
		if ($value->menu_item_parent == $parent) {
			$col++;
		}
	}
	if ($col) {
		return true;
	} else {
		return false;
	}
}

function get_child($menu,$parent=0)
{
	$child = array();
	foreach ($menu as $key => $value) {
		if ($value->menu_item_parent == $parent) {
			$child[] = $value;
		}
	}
	return $child;
}
?>