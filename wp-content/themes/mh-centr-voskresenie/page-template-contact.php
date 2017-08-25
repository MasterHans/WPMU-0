<?php
/*
Template Name: Контакты
*/
?>

<?php get_header() ?>

<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container"> 
		<h1>СВЯЖИТЕСЬ <span>С НАМИ</span></h1>
		<ul>
			<?php the_breadcrumb(); ?>
		</ul>
	</div>
</div><!--- PAGE TOP -->

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="map">
						<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=Xsn0OiIj-HuxajoRfPgtrfgiRO6pTOnE&width=1170&height=400&lang=ru_RU&sourceType=constructor"></script>
					</div><!--- GOOGLE MAP -->
				</div>
			</div>
		</div>
	</div>
</section>


<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title2">
						<span>Задайте интерсующий вас вопрос</span>
						<h2>ДАВАЙТЕ <span>БУДЕМ НА СВЯЗИ</span></h2>
					</div>

					<div class="row">
						<div class="col-md-6 column">
							<h4>Контактная информация</h4>
							<div class="space"></div>
							<p>Вы можете получить консультацию по ICQ 651641911.

								Также можно обращаться в Марфо-Мариинский женский монастырь по адресу:

								308015, г.Белгород, Марфо-Мариинский женский монастырь , ул.Пушкина, 19.</p>
							<div class="space"></div>
							<!--<p>The emerald peacock empire of the sun, etihad stadium movida swanston spiegeltent fr	on bogans, dandenong neatly trimmed moustaches hu tong dumplings rooftop bars chapel street, east brunswick club mamasita the G’ kylie minogue trams.</p>-->
							<div class="space"></div>

						</div><!--- CONTACT INFORMATION -->
						<div class="col-md-6 column">
							<h4>Заполните поля формы</h4>
							<div class="space"></div>
							<div id="message"></div>
							<form class="theme-form" method="post" action="<?php echo get_template_directory_uri() ?>/contact.php" name="contactform" id="contactform">
								<input name="name" class="half-field form-control" type="text" id="name"  placeholder="Имя" />
								<input name="email" class="half-field form-control" type="text" id="email" placeholder="Email" />
								<textarea name="comments" class="form-control" id="comments" placeholder="Текст сообщения" ></textarea>
								<input class="submit" type="submit"  id="submit" value="ОТПРАВИТЬ" />
							</form><!--- FORM -->
						</div>
					</div>
					<!--Реквезиты нашего Центра-->
					<div class="row">
						<div class="col-md-12 column">

							<?php the_content() ?>

						</div><!--- CONTACT INFORMATION -->

					</div>

				</div>
			</div>
		</div>
	</div>
</section>	

<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-info">
						<div class="col-md-3">
							<div class="info-block">
								<i class="fa fa-home"></i>
								<p>Россия, Белгородская область, Прохоровский район, с. Малые Маячки, ул. Центральная 29</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="info-block">
								<i class="fa fa-info"></i>
								<p>centr-voskresenie.ru</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="info-block">
								<i class="fa fa-envelope-o"></i>
								<p>trezvenie31@yandex.ru</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="info-block">
								<i class="fa fa-mobile"></i>
								<p>8 (4722) 37-21-30</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--- CONTACT INFORMATION -->

<?php get_footer() ?>