<?php
/*
Plugin Name: Custom tag order
Plugin URI: http://wordpress.org/plugins/tag-sorting/
Description: This plugin for making tags custom order
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/

/**
 * @param $key_to_check : key to search
 * @param $arr :array where to search
 * @return bool: if key exists return true
 */
function sag_is_key_exists($key_to_check, $arr)
{
    foreach ($arr as $key => $item) {
        if ($key === $key_to_check) {
            return true;
        }
    }
    return false;
}

add_action('add_tag_form_fields', 'sag_tag_add_custom_field_to_adding_interface');
/**
 * Add custom field "Sorting Hat" to WP-admin Posts-Tags Adding tag interface
 */
function sag_tag_add_custom_field_to_adding_interface($tag)
{
    //get meta value kept in wp option in tag_ plus tag id
    $t_id = $tag->term_id;
    $tag_meta = get_option("tag_$t_id");
    ?>
    <div class="form-field term-sorting-hat-wrap">
        <label for="tag_meta[sorting_hat]">Sorting Hat</label>
        <input name="tag_meta[sorting_hat]" id="tag_meta[sorting_hat]" type="number" value="<?php echo $tag_meta['sorting_hat'] ? $tag_meta['sorting_hat'] : ''; ?>" size="40">
        <p>This field define the sorting order of the tags. If it empty or similar to exist key in other tag the order will return to default.</p>
    </div>
<?php }

add_action('edit_tag_form_fields', 'sag_tag_add_custom_field_to_editing_interface');
/**
 * Add custom field "Sorting Hat" to WP-admin Posts-Tags Edit tag interface
 */
function sag_tag_add_custom_field_to_editing_interface($tag)
{
    //get meta value kept in wp option in tag_ plus tag id
    $t_id = $tag->term_id;
    $tag_meta = get_option("tag_$t_id");
    ?>
    <tr class="form-field term-sorting-hat-wrap">
        <th scope="row"><label for="tag_meta[sorting_hat]">Sorting Hat</label></th>
        <td><input name="tag_meta[sorting_hat]" id="tag_meta[sorting_hat]" type="number" value="<?php echo $tag_meta['sorting_hat'] ? $tag_meta['sorting_hat'] : ''; ?>" size="40">
            <p class="description">This field define the sorting order of the tags. If it empty or similar to exist key in other tag the order will return to default.</p></td>
    </tr>

<?php }

add_action('edited_terms','sag_tag_custom_fields_save');
add_action('create_term','sag_tag_custom_fields_save');
/**
 * save tag meta data to WP option
 * @param $term_id
 */
function sag_tag_custom_fields_save($term_id)
{
    if (isset($_POST['tag_meta'])) {
        $t_id = $term_id;
        $tag_meta = get_option("tag_$t_id");
        $tag_keys = array_keys($_POST['tag_meta']);
        foreach ($tag_keys as $key) {
            if (isset($_POST['tag_meta'][$key])) {
                $tag_meta[$key] = $_POST['tag_meta'][$key];
            }
        }
        //save the option array
        update_option("tag_$t_id", $tag_meta);
    }
}


/**
 * Add custom column to in WordPress Manage Screen for TAGS
 */
add_filter('manage_edit-post_tag_columns', 'sag_tag_columns_head');
function sag_tag_columns_head($defaults) {
    $defaults['sorting_hat_column']  = 'Sorting Hat';

    /* ADD ANOTHER COLUMN (OPTIONAL) */
    // $defaults['second_column'] = 'Second Column';

    /* REMOVE DEFAULT CATEGORY COLUMN (OPTIONAL) */
    // unset($defaults['categories']);

    /* TO GET DEFAULTS COLUMN NAMES: */
    // print_r($defaults);

    return $defaults;
}

add_filter('manage_post_tag_custom_column', 'sag_tag_columns_content', 10, 3);
function sag_tag_columns_content($c, $column_name, $term_id) {
    //get meta value keeped in wp option in tag_ plus tag id
    $tag_meta = get_option("tag_$term_id");
    if ($column_name == 'sorting_hat_column') {
        echo $tag_meta['sorting_hat'];
    }
}

/**
 * make custom column sortable
 * works only for traditional fields like id, name etc...
 * for custom tags fields WordPress need to understand how to sort column
 * this is not working
 */
//add_filter( 'manage_edit-post_tag_sortable_columns', 'sag_sortable_post_tag_column' );
//function sag_sortable_post_tag_column( $columns ) {
//    $columns['sorting_hat_column'] = 'sorting_hat_column';
//
//    //To make a column 'un-sortable' remove it from the array
//    //unset($columns['date']);
//
//    return $columns;
//}

// Called in front-end via the_tags() or related variations of.
add_filter('get_the_terms', function ($terms, $post_id, $taxonomy) {
    if ($taxonomy != 'post_tag' || !$terms) {
        return $terms;
    }
//    var_dump($terms);
    //define the empty array for custom sorting tags
    $sorting_terms = [];

    foreach ($terms as $term_id => $term) {
        //get meta value kept in wp option in tag_ plus tag id
        $tag_id = $term->term_id;
        $key_to_sort = get_option("tag_$tag_id")['sorting_hat'];
        if (!empty($key_to_sort) && !sag_is_key_exists($key_to_sort, $sorting_terms)) {
            //define new key according to new custom sorting order
            $sorting_terms [$key_to_sort] = $term;
        } else {
            //if the sorting hat field empty or not set properly then do nothing
            return $terms;
        }
    }
    //sort elements of the array by key
    ksort($sorting_terms);

    if (!empty($sorting_terms)) {
        return $sorting_terms;
    } else {
        return $terms;
    }

}, 10, 3);