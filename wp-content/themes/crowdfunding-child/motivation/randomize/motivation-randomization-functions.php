<?php
function motivation_total_randomization_process()
{
    $randomize = new Motivation_Randomize();
    $randomize->randomizeAll();
}

/*logging events*/
function motivation_logging($str = 'Nothing to say !', $onlyFile = false)
{
    //Log into file
    $td = new DateTime('now', new DateTimeZone(get_option('timezone_string')));
    $logFile = get_stylesheet_directory() . '/motivation/log/' . $td->format('d_m_Y') . '_log.txt';
    error_log('[' . $td->format('j-M-Y H:i:s e') . '] ' . $str . chr(13), 3, $logFile);

    //Echo to the display
    if (!$onlyFile) {
        echo '[' . $td->format('j-M-Y H:i:s e') . '] ' . $str;
        echo '<br>';
    }
}