<?php

    $is_array = array_values (array_filter (scandir ('php'), function ($is_index) {
        if (!preg_match ('/^_/', $is_index))
            return pathinfo ($is_index)['extension'] === 'php';
    }));
    
    if (!empty ($is_array))
        for ($i = 0; $i < sizeof ($is_array); $i++)
            include_once (implode ('/', [ '.', 'php', $is_array[$i] ]));

?>