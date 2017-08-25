<?php

require_once ( get_stylesheet_directory() . '/theme-options.php' );

function setup() {

    /*Добавляем меню*/
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(
            array(
                'menu_1' => 'Menu 1'
            )
        );
    };

    /*Добавляем мобильное меню*/
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(
            array(
                'menu_mobile' => 'Menu Mobile'
            )
        );
    };
    /*Добавить миниатюру*/
    // ...

    add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme
    // To enable only for posts:
    //add_theme_support( 'post-thumbnails', array( 'post' ) );
    // To enable only for posts and custom post types:
    //add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

    // Register a new image size.
    // This means that WordPress will create a copy of the post image with the specified dimensions
    // when you upload a new image. Register as many as needed.
    // Adding custom image sizes (name, width, height, crop)
//    add_image_size( 'featured-image-66-66', 66, 66, true );
    add_image_size( 'featured-image-74-67', 74, 67, true );
    add_image_size( 'featured-image-84-80', 84, 80, true );
    add_image_size( 'featured-image-97-97', 97, 97, true );
//    add_image_size( 'featured-image-270-288', 270, 288, true );
    add_image_size( 'featured-image-355-148', 355, 148, true );
    add_image_size( 'featured-image-370-164', 370, 164, true );
    add_image_size( 'featured-image-370-253', 370, 253, true );
//    add_image_size( 'featured-image-370-403', 370, 403, true );
//    add_image_size( 'featured-image-468-320', 468, 320, true );
//    add_image_size( 'featured-image-770-500', 770, 500, true );
//    add_image_size( 'featured-image-770-324', 770, 324, true );

    // ...
}
add_action( 'after_setup_theme', 'setup' );

function custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
//        'featured-image-66-66' => 'Featured Image 66x66',
        'featured-image-74-67' => 'Featured Image 74x67',
        'featured-image-84-80' => 'Featured Image 84x80',
        'featured-image-97-97' => 'Featured Image 97x97',
//        'featured-image-270-288' => 'Featured Image 270x288',
        'featured-image-355-148' => 'Featured Image 355x148',
        'featured-image-370-164' => 'Featured Image 370x164',
        'featured-image-370-253' => 'Featured Image 370x253',
//        'featured-image-370-403' => 'Featured Image 370x403',
//        'featured-image-468-320' => 'Featured Image 468x320',
//        'featured-image-770-500' => 'Featured Image 770x500'
//        'featured-image-770-324' => 'Featured Image 770x324'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );

/*Добавить несколько миниатюр класс MultiPostThumbnails
  Вызов:
  1) MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, NULL)
     Здесь картинку обрезать до реального размера вручную - возьмёт на весь размер картинки
  2) MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image',NULL,'featured-image-770-500')
     Здесь предустановленный размер картинки автоматом получается при загрузки в библиотеку
*/

if (class_exists('MultiPostThumbnails')) {
    $types = array('post', 'page', 'my_post_type');
    foreach($types as $type) {
        new MultiPostThumbnails(array(
                'label' => 'Миниатюра средний размер',
                'id' => 'middle-size-image',
                'post_type' => $type
            )
        );
    }
}


if (class_exists('MultiPostThumbnails')) {
    $types = array('post', 'page', 'my_post_type');
    foreach($types as $type) {
        new MultiPostThumbnails(array(
                'label' => 'Миниатюра полный размер',
                'id' => 'full-size-image',
                'post_type' => $type
            )
        );
    }
}


function category_custom_fields_form($tag)
{
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('Поле сортировки'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[cat_sort]" id="Cat_meta[cat_sort]" size="25" style="width:60%;" value="<?php echo
            $cat_meta['cat_sort'] ? $cat_meta['cat_sort'] : ''; ?>"><br />
            <span class="description"><?php _e('Поле сортировки категории'); ?></span>
        </td>

    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('font_awesome'); ?></label></th>
        <td>
            <input type="text" name="Cat_meta[font_awesome]" id="Cat_meta[font_awesome]" size="25" style="width:60%;" value="<?php echo
            $cat_meta['font_awesome'] ? $cat_meta['font_awesome'] : ''; ?>"><br />
            <span class="description"><?php _e('Иконка FontAwesome'); ?></span>
        </td>

    </tr>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="extra1"><?php _e('Содержание'); ?></label></th>
        <td>
            <textarea type="textarea" name="Cat_meta[cat_content]" id="Cat_meta[cat_content]" style="width:95%;" rows="5"><?php echo
                $cat_meta['cat_content'] ? $cat_meta['cat_content'] : ''; ?></textarea><br />
            <span class="description"><?php _e('Содержание'); ?></span>
        </td>

    </tr>


    <?php
}

function category_custom_fields_save($term_id)
{
    if (isset($_POST['Cat_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Cat_meta'][$key])) {
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}

// функция расширения функционала административного раздела
function category_custom_fields()
{
    // добавления действия после отображения формы ввода параметров категории
    add_action('edit_category_form_fields', 'category_custom_fields_form');
    // добавления действия при сохранении формы ввода параметров категории
    add_action('edited_category', 'category_custom_fields_save');
}
// добавляет вызов функции при инициализации административного раздела
add_action('admin_init', 'category_custom_fields', 1);

function get_post_by_slug($slug){
    $myposts = get_posts(array(
        'name' => $slug,
        'post_type' => 'post',
        'post_status' => 'publish'
    ));

    if(! $myposts ) {
        throw new Exception("NoSuchPostBySpecifiedID");
    }
    return $myposts[0];
}

# Breadcrumb
//<span class='divider'></span>
function the_breadcrumb() {
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home').'">';
        echo 'Главная';
        echo "</a></li> ";
        if (is_category()) {
            echo "<li>";
            single_cat_title();
            echo "</li>";

        } else if (is_single()) {
            echo "<li>";
            the_category(', ');
            echo "</li><li>";
            the_title();
            echo "</li>";

        } elseif (is_page()) {
            echo "<li>";
            the_title();
            echo "</li>";
        }
    }
//        elseif (is_tag()) {
//            echo 'Записи с меткой "';
//            single_tag_title();
//            echo '"'; }
//        elseif (is_day()) {echo "Архив за"; the_time('  jS F Y');}
//        elseif (is_month()) {echo "Архив "; the_time(' F  Y');}
//        elseif (is_year()) {echo "Архив за "; the_time(' Y');}
//        elseif (is_author()) {echo "Архив автора";}
//        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Архив блога";}
//        elseif (is_search()) {echo "Результаты поиска";}
//        elseif (is_404()) {	echo '404 - Страница не найдена';

}

/**
 * Define a constant path to our single template folder
 */
define('SINGLE_PATH', TEMPLATEPATH . '/single');


/**
 * Single template function which will choose our template
 */
function my_single_template($single)
{
    global $wp_query, $post;

    /**
     * Checks for single template by category
     * Check by category slug and ID
     */
    foreach ((array)get_the_category() as $cat) :

        if (file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php')) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

        } else {
            return SINGLE_PATH . '/single-cats-others-all.php';
        }

    endforeach;
}

/**
 * Filter the single_template with our custom function
 */
add_filter('single_template', 'my_single_template');

/*Цитата в тексте Родителям, Справочная, Лечение.*/
function pull_quote_sc($atts, $content = null) {
    return '<blockquote><div class="parallax" style="background:url(' .  get_template_directory_uri() .'/images/parallax2.jpg);"></div>
							<i class="fa fa-quote-left"></i>' . $content . '<i class="fa fa-quote-right"></i></blockquote>';

}
add_shortcode("note", "pull_quote_sc");

/*Цитата в тексте Родителям, Справочная, Лечение.*/
function pull_quote_zhizn_tsentra($atts, $content = null) {
    $post = get_post_by_slug('o-ioann-suvorov');
    $post_id = $post -> ID;

    $thumb_id = get_post_thumbnail_id($post_id);
    $thumb_url = wp_get_attachment_image_src($thumb_id,[97,97], true);


    $res = '
                            <div class="pastor-info">
                                <img src="' . $thumb_url[0] . '" alt="" />
                                <h4>' . get_the_title($post_id) . '<span>' . get_post_meta($post->ID,'dolgnost',true) . '</span></h4>
                                <p>' . $content . '</p>
                            </div><!-- PASTOR INFO -->';
    wp_reset_postdata();
    return $res;
}
add_shortcode("otec", "pull_quote_zhizn_tsentra");

function kriesi_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class='pagination'>";
        /*if($paged > 2 && $paged > $range+1 && $showitems < $pages)*/ echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
        /*if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)*/ echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
        echo "</div>\n";
    }
}

remove_shortcode("gallery");
add_shortcode("gallery","sag_gallery");

function sag_gallery($atts){
    $img_id = explode(',', $atts['ids']);
    $img_id = array_map('trim', $img_id );

    if(!$img_id[0]) {
        return '<div class="no-img-gallery">No images</div>';
    }

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $pictures = get_posts( array(
        'posts_per_page' => -1,
        'post__in' => $img_id,
        'post_type'      => 'attachment',
        'orderby'        => 'post__in',
    ) );

    $html = '<section>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 column">
                                <div class="gallery lightbox">';
    foreach ($pictures as $item){

        $img_desc = $item->post_content;
        $img_caption = $item->post_excerpt;
        $img_title = $item->post_title;
        $img_thumb = wp_get_attachment_image_src($item->ID,[370,253]);
        $img_full = wp_get_attachment_image_src($item->ID,[1024,1024]);

        $html .='
		<div class="col-md-6">
            <div class="service-block">
                <div class="service-image">
                    <a href="'. $img_full[0] . '">
                        <img src="' . $img_thumb[0] . '" width="' . $img_thumb[1] . '" height="' . $img_thumb[2] . '" alt="' . $img_title . '" title="' . $img_title . '">'
        //			<div class="desc-wrap">
        //					<strong class='title-img'>{$img_title}</strong>
        //					<span class='desc-img'>{$img_desc}</span>
        //				</div>
                 . '</a>
                    <h5>' . $img_title . '</h5>
                </div>
            </div>
		</div>';

    }

                     $html .= "</div>
                            </div>
                        </div>
                    </div>

            </section>";


    return $html;

}

function add_poptrox($content) {
    global $post;
    $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<div class="gallery lightbox-without-nav"><a$1href=$2$3.$4$5$6>$7</a></div>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

add_filter('the_content', 'add_poptrox');

function short_exerpt($str, $col_symbols, $dots) {
    if (!empty($dots)){
        return mb_substr($str,0,$col_symbols - 3,'UTF-8') . $dots;
    } else {
        return mb_substr($str,0,$col_symbols - 3,'UTF-8');
    }
}