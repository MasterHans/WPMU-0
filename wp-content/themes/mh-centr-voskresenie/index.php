<?php
/*
 * Template Name: Главная страница
 */
?>
<?php get_header() ?>
	<div class="slider">
		<div class="rev_slider_wrapper">
				<div id="slider1" class="rev_slider"  data-version="5.0">
					<ul>
						<li data-transition="zoomout" data-slotamount="10" data-masterspeed="3000" >
							<img src="<?php echo get_template_directory_uri() ?>/img/res/nebo-nemn-golub2.jpg"  alt="Наша цель - ВАШЕ ВЫЗДОРОВЛЕНИЕ" title="МЫ ВАМ ПОМОЖЕМ" class="rev-slidebg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina />
							<div class="tp-caption slide-title1 tp-resizeme rs-parallaxlevel-2" data-x="['120','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['60','60','60','60']" data-voffset="['0','0','0','0']" data-fontsize="['49','49','29','19']" data-lineheight="['49','49','29','19']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:90;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1700" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="; white-space: nowrap;">МЫ ВАМ <span>ПОМОЖЕМ</span></div>

							<div class="tp-caption slide-subtitle1 tp-resizeme rs-parallaxlevel-2" data-x="['120','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['120','140','140','140']" data-voffset="['0','0','0','0']" data-fontsize="['20','25','15','15']" data-lineheight="['25','25','15','15']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:45;rZ:30;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">Целью работы центра является</div>
							<div class="tp-caption slide-subtitle1 tp-resizeme rs-parallaxlevel-2" data-x="['120','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['150','150','150','150']" data-voffset="['0','0','0','0']" data-fontsize="['20','25','15','15']" data-lineheight="['25','25','15','15']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:45;rZ:30;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">выздоровление людей страдающих</div>
							<div class="tp-caption slide-subtitle1 tp-resizeme rs-parallaxlevel-2" data-x="['120','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['180','180','180','180']" data-voffset="['0','0','0','0']" data-fontsize="['20','25','15','15']" data-lineheight="['25','25','15','15']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:45;rZ:30;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">наркотической и алкогольной зависимостью.</div>

							<?php
							$idObj = get_category_by_slug('o-tsentre');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
							?>

							<a href="<?php echo get_category_link($id) ?>" title="<?php echo get_cat_name($id) ?>" class="tp-caption slide-button colored-box tp-resizeme rs-parallaxlevel-2" data-x="['120','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['220','220','220','220']" data-voffset="['0','0','0','0']" data-fontsize="['13','13','13','13']" data-lineheight="['15','15','13','13']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="y:bottom(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">УЗНАТЬ БОЛЬШЕ</a>

							<!--<div class="tp-caption tp-resizeme rs-parallaxlevel-2" data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-transform_idle="o:1;" data-transform_in="y:bottom(R);z:0;rX:90;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Elastic.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2300" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-no-retina><img src="img/res/zdorovie-ludi.png" alt="" data-ww="['635px','635px','200px','170px']" data-hh="['445px','445px','251px','213px']" itemprop="image" data-no-retina /></div>-->
							<div class="tp-caption tp-resizeme rs-parallaxlevel-2" data-x="['500','right','right','right']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-transform_idle="o:1;" data-transform_in="y:bottom(R);z:0;rX:90;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Elastic.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2300" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-no-retina><img src="<?php echo get_template_directory_uri() ?>/img/res/zdorovie-ludi2.png" alt="" data-ww="['749px','749px','10px','10px']" data-hh="['410px','410px','10px','10px']" itemprop="image" data-no-retina /></div>
						</li>

						<li data-transition="zoomin" data-slotamount="10" data-masterspeed="3000" >
							<img src="<?php echo get_template_directory_uri() ?>/img/res/komfort-i-uyut.jpg"  alt="Реабилитация в Центре" title="Рабилитация в центре Воскресение" class="rev-slidebg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina />
							<div class="tp-caption slide-title2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['100','100','100','100']" data-voffset="['0','0','0','0']" data-fontsize="['37','37','27','27']" data-lineheight="['37','37','27','27']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:1.5;sY:0.9;skX:0.9;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1700" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="; white-space: nowrap;">РЕАБИЛИТАЦИЯ <span>В ЦЕНТРЕ</span></div>

							<div class="tp-caption colored-box slide-subtitle2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['175','170','170','170']" data-voffset="['0','0','0','0']" data-fontsize="['19','19','15','15']" data-lineheight="['25','25','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap; color: #ffffff;">3-х, 6-ти месячная уникальная программа реабилитации</div>
							<div class="tp-caption colored-box slide-subtitle2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['215','170','170','170']" data-voffset="['0','0','0','0']" data-fontsize="['19','19','15','15']" data-lineheight="['25','25','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap; color: #ffffff;">в комфорте и уюте нашего Центра.</div>

							<div class="tp-caption white-bg slide-subtitle2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['255','220','220','220']" data-voffset="['0','0','0','0']" data-fontsize="['18','18','15','15']" data-lineheight="['25','25','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">Программа воскрешает, исцеляет и преображает.</div>

							<?php
							$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
							?>

							<a href="<?php echo get_category_link($id) . '#usloviya-progiv' ?>" title="Условия проживания" class="tp-caption dark-bg slide-button slide-button2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['335','300','300','300']" data-voffset="['0','0','0','0']" data-fontsize="['14','14','13','13']" data-lineheight="['15','15','13','13']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:-45;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2300" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">УЗНАТЬ БОЛЬШЕ</a>
						</li>

						<li data-transition="fade" data-slotamount="10" data-masterspeed="3000" >
							<img src="<?php echo get_template_directory_uri() ?>/img/res/domashnya-kuhnya.jpg"  alt="Качественное питание в центре Воскресенье" title="Домашняя кухня в Центре Воскресенье" class="rev-slidebg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina />
							<div class="tp-caption slide-title3 tp-resizeme rs-parallaxlevel-2" data-x="['500','500','500','500']" data-hoffset="['0','0','0','0']" data-y="['100','100','100','100']" data-voffset="['0','0','0','0']" data-fontsize="['36','36','26','26']" data-lineheight="['36','36','26','26']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="1700" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="; white-space: nowrap;">Домашняя атмосфера центра</div>

							<div class="tp-caption light-bg slide-subtitle3 tp-resizeme rs-parallaxlevel-2" data-x="['500','500','500','500']" data-hoffset="['0','0','0','0']" data-y="['170','170','170','170']" data-voffset="['0','0','0','0']" data-fontsize="['26','26','20','20']" data-lineheight="['26','26','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">Включает не только теплые отношения,</div>
							<div class="tp-caption light-bg slide-subtitle3 tp-resizeme rs-parallaxlevel-2" data-x="['500','500','500','500']" data-hoffset="['0','0','0','0']" data-y="['213','213','213','213']" data-voffset="['0','0','0','0']" data-fontsize="['26','26','20','20']" data-lineheight="['26','26','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space:">но и домашнее питание,</div>
							<div class="tp-caption light-bg slide-subtitle3 tp-resizeme rs-parallaxlevel-2" data-x="['500','500','500','500']" data-hoffset="['0','0','0','0']" data-y="['256','213','213','213']" data-voffset="['0','0','0','0']" data-fontsize="['26','26','20','20']" data-lineheight="['26','26','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space:">дающее силы для выздоровления.</div>

							<?php
							$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
							?>

							<a href="<?php echo get_category_link($id) . '#usloviya-pitaniya' ?>" title="Условия питания" class="tp-caption dark-bg slide-button slide-button2 tp-resizeme rs-parallaxlevel-2" data-x="['500','500','500','500']" data-hoffset="['0','0','0','0']" data-y="['333','300','300','300']" data-voffset="['0','0','0','0']" data-fontsize="['14','14','13','13']" data-lineheight="['15','15','13','13']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:-45;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:right(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2300" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">УЗНАТЬ БОЛЬШЕ</a>
						</li>

						<li data-transition="zoomin" data-slotamount="10" data-masterspeed="3000" >
							<img src="<?php echo get_template_directory_uri() ?>/img/res/ruka-pomoshi2.jpg"  alt="Наш центр – это школа любви и дружбы" title="Наш центр – это школа любви и дружбы" class="rev-slidebg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-no-retina />
							<div class="tp-caption slide-title2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['100','100','100','100']" data-voffset="['0','0','0','0']" data-fontsize="['37','37','27','27']" data-lineheight="['37','37','27','27']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:1.5;sY:0.9;skX:0.9;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1700" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="; white-space: nowrap;">ШКОЛА <span>ЛЮБВИ И ДРУЖБЫ</span></div>

							<div class="tp-caption colored-box slide-subtitle2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['170','170','170','170']" data-voffset="['0','0','0','0']" data-fontsize="['18','18','15','15']" data-lineheight="['25','25','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="1900" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap; color: #ffffff;">Мы вместе восстанавливаем разрушенные семейные отношения, обретаем радость трезвой жизни.</div>

							<div class="tp-caption white-bg slide-subtitle2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['220','220','220','220']" data-voffset="['0','0','0','0']" data-fontsize="['18','18','15','15']" data-lineheight="['25','25','20','20']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">«…ибо этот сын мой был мертв и ожил, пропадал и нашелся». Лука (15:24)</div>

							<?php
							$idObj = get_category_by_slug('kak-myi-rabotaem');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
							?>

							<a href="<?php echo get_category_link($id) ?>" title="<?php echo get_cat_name($id) ?>" class="tp-caption dark-bg slide-button slide-button2 tp-resizeme rs-parallaxlevel-2" data-x="['80','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['300','300','300','300']" data-voffset="['0','0','0','0']" data-fontsize="['14','14','13','13']" data-lineheight="['15','15','13','13']" data-width="['none','none','none','400']" data-height="none" data-whitespace="['nowrap','nowrap','nowrap','normal']" data-transform_idle="o:1;" data-transform_in="z:0;rX:-45;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:2000;e:Back.easeInOut;" data-transform_out="x:left(R);s:2000;e:Back.easeIn;s:1000;e:Back.easeIn;" data-start="2300" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="white-space: nowrap;">УЗНАТЬ БОЛЬШЕ</a>
						</li>

					</ul>

				</div>
		</div><!-- REVOLUTION SLIDER -->
	</div>

<section>
	<div class="block whitish">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax6.jpg);"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="welcome">
						<!--<h2>МИТРОПОЛИЧИЙ РЕАБИЛИТАЦИОННЫЙ</h2>-->
						<h1>ЭКСКУРСИЯ ПО ЦЕНТРУ<span> "ВОСКРЕСЕНИЕ"</span></h1>
						<?php
							$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
							$id = $idObj->term_id;
						?>
							<a href="<?php echo get_category_link($id) ?>" title="<?php echo get_cat_name($id) ?>">ВОЙТИ В ЦЕНТР</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Три кита-->
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Как мы работаем</h2></div>

					<?php
						$idObj = get_category_by_slug('kak-myi-rabotaem');/*Получаем категорию по слагу*/
						$cat_id = $idObj->term_id;
						$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							//стандартный вывод записей
					?>
						<div class="col-md-4 column">
							<div class="service-block">

								<div class="service-image">
									<?php the_post_thumbnail( [355,148],['alt'=>get_the_title()] ); ?>
									<i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i>
								</div>

								<h3><?php the_title() ?></h3>
								<?php the_excerpt(); ?>
								<a href="<?php echo get_category_link($cat_id) . '#' . $post->post_name; ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
							</div>
						</div>
					<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
			</div>
		</div>
	</div>
</section>

<!-- комфортные условия проживания, домашняя кухня, Физкультура и спортивные игры-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Наши условия размещения</h2></div>
				<?php
				$idObj = get_category_by_slug('ekskursiya-po-tsentru');/*Получаем категорию по слагу*/
				$parent_cat_id = $idObj->term_id;
				$categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0' . '&exclude=41');
				$my_cats = [];
				//Сортировка по произвольному полю категории cat_sort
				foreach ($categories as $category) {
					$cat_data = get_option("category_" . $category -> term_id);
					$my_cats[(int)$cat_data['cat_sort']] = $category->term_id;
				}
				ksort($my_cats);
				//Основной цикл
				foreach ($my_cats as $child_cat_id) { ?>
					<div class="col-md-4 column">
						<div class="service-block">
							<div class="service-image">
								<?php $current_alt = get_cat_name($child_cat_id); ?>
								<?php the_term_thumbnail( $child_cat_id, [355,148], ['alt'=>$current_alt] ) ?>
								<i class="fa <?php echo get_option("category_" . $child_cat_id)['font_awesome']; ?>"></i>
							</div>
							<h3><?php echo get_cat_name($child_cat_id); ?></h3>
							<p><?php echo category_description($child_cat_id); ?></p>
							<?php $thisCat = get_category($child_cat_id); ?>

							<a href="<?php echo get_category_link($parent_cat_id) . '#' . $thisCat -> slug; ?>" title="<?php echo get_cat_name($child_cat_id) ?>">УЗНАТЬ БОЛЬШЕ</a>
						</div>
					</div>
				<?php }; ?>
			</div>
		</div>
	</div>
</section>

<!--Активный отдых и развлечения-->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Активный отдых и развлечения</h2></div>

				<?php
				$idObj = get_category_by_slug('aktivnyiy-otdyih-i-razvlecheniya');/*Получаем категорию по слагу*/
				$cat_id = $idObj->term_id;
				$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
				$myposts = get_posts( $args );
				foreach( $myposts as $post ){ setup_postdata($post);
					//стандартный вывод записей
					?>
					<div class="col-md-4 column">
						<div class="service-block">

							<div class="service-image">
								<?php the_post_thumbnail( [355,148],['alt'=>get_the_title()] ); ?>
								<i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i>
							</div>

							<h3><?php the_title() ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
						</div>
					</div>
				<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
			</div>
		</div>
	</div>
</section>

<!--Квалифицированный персонал,исповедь и причастие, психологическая помощь -->
<section>
	<div class="block remove-gap">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Наш персонал</h2></div>
				<?php
				$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
				$parent_cat_id = $idObj->term_id;
				$categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0');
				$my_cats = [];
				//Сортировка по произвольному полю категории cat_sort
				foreach ($categories as $category) {
					$cat_data = get_option("category_" . $category -> term_id);
					$my_cats[(int)$cat_data['cat_sort']] = $category->term_id;
				}

				ksort($my_cats);
				//Основной цикл
				foreach ($my_cats as $child_cat_id) { ?>
					<div class="col-md-4 column">
						<div class="service-block">
							<div class="service-image">
								<?php $current_alt = get_cat_name($child_cat_id); ?>
								<?php the_term_thumbnail( $child_cat_id, [355,148], ['alt'=>$current_alt] ) ?>
								<i class="fa <?php echo get_option("category_" . $child_cat_id)['font_awesome']; ?>"></i>
							</div>
							<h3><?php echo get_cat_name($child_cat_id); ?></h3>
							<p><?php echo category_description($child_cat_id); ?></p>
							<?php $thisCat = get_category($child_cat_id); ?>

							<a href="<?php echo get_category_link($parent_cat_id) . '#' . $thisCat -> slug; ?>" title="<?php echo get_cat_name($child_cat_id) ?>">УЗНАТЬ БОЛЬШЕ</a>
						</div>
					</div>
				<?php }; ?>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block blackish">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax3.jpg);"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="pastors-carousel">

						<?php
						$idObj = get_category_by_slug('nasha-komanda');/*Получаем категорию по слагу*/
						$cat_id = $idObj->term_id;
						$args = ['category' => $cat_id, 'include' => '127,195,1037', 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'showposts' => '3'];
						$myposts = get_posts( $args );
						foreach( $myposts as $post ){ setup_postdata($post);
							//стандартный вывод записей
							?>
							<div class="pastors-message">
								<div class="row">
									<div class="col-md-3">
										<?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'middle-size-image', NULL, NULL); ?>
									</div>
									<div class="col-md-9">
										<h4><?php the_title() ?></h4>
										<span><?php echo get_post_meta($post->ID,'dolgnost',true); ?></span>
										<p><?php echo get_post_meta($post->ID,'description',true); ?></p>
									</div>
								</div>
							</div>
						<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="title4"><h2 class="block-header">Лечение наркомании и алкоголизма</h2></div>

				<?php
					$idObj = get_category_by_slug('kak-myi-lechim');/*Получаем категорию по слагу*/
					$cat_id = $idObj->term_id;
					$args = ['category' => $cat_id, 'meta_key' => 'post_sort_num', 'orderby' => 'meta_value_num', 'order' => 'ASC'];
					$myposts = get_posts( $args );
					foreach( $myposts as $post ){ setup_postdata($post);
						//стандартный вывод записей
				?>
					<div class="col-md-4 column">
						<div class="service-block">

							<div class="service-image">
								<?php the_post_thumbnail( [355,148], ['alt'=>get_the_title()] ); ?>
								    <i><img src="<?php echo get_template_directory_uri() . '/img/res/' . get_post_meta($post->ID,'font_awesome',true)?>" alt="<?php the_title() ?>" title="<?php the_title() ?>" /></i>
							</div>

							<h3><?php the_title() ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">УЗНАТЬ БОЛЬШЕ</a>
						</div>
					</div>
				<?php } wp_reset_postdata(); // сбрасываем переменную $post ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>