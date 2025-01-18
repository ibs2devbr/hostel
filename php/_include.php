<?php

    define ('File', array_values (array_filter (scandir ('php'), function ($is_index) {
        if (!preg_match ('/^_/', $is_index))
            return pathinfo ($is_index, PATHINFO_EXTENSION) === 'php';
    })));

    if (!empty (File))
        for ($i = 0; $i < sizeof (File); $i++)
            include_once (implode ('/', [ '.', 'php', File[$i] ]));

?>