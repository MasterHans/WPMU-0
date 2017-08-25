<?php
/**
 * Created by PhpStorm.
 * User: sag
 * Date: 20.08.2017
 * Time: 9:53
 */

/*
Plugin Name: Wise Thoughts
Plugin URI: http://wordpress.org/plugins/wise-thoughts/
Description: This plugin sends to you most brilliant idea and statement of scientist, actors, artists, ancient wise man quotes.
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/

/**
 * All thoughts list as a string.
 * Returns the string with random picked up thought
 */

function getOneThought(){
    $allThoughtsInString = [' An error doesn\'t become a mistake until you refuse to correct it.',
                            ' If not you, then who? If not now, then when?',
                            'As a wise man once said: Wherever you go, there you are.',
    ];

    // And then randomly choose a line
    return wptexturize( $allThoughtsInString[ mt_rand( 0, count( $allThoughtsInString ) - 1 ) ] );
};


// This just echoes the chosen line, we'll position it later
function outputThePhrase() {
    $chosen = getOneThought();
    echo "<p id='wise_thought'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_dolly' );