<?php

    define ('Direction', [ 'col', 'row' ]);

    define ('FontWeight', [ 'fw-bold', 'fw-bolder', 'fw-semibold', 'fw-medium', 'fw-normal', 'fw-light', 'fw-lighter' ]);

    define ('LightCollection', [ 'warning', 'info', 'light', 'white' ]);
    define ('DarkCollection', [ 'black', 'primary', 'secondary', 'success', 'danger', 'dark' ]);

    define ('FullCollection', [ ...LightCollection, ...DarkCollection ]);
    define ('SmallCollection', array_values (array_filter (array_map (function ($i) { if (!in_array ($i, [ 'black', 'white' ])) return $i; }, FullCollection))));
    define ('GradientCollection', array_values (array_filter (array_map (function ($i) { if (!in_array ($i, [ 'white' ])) return $i; }, FullCollection))));

    define ('BackgroundSolid', array_map (function ($i) { return implode ('-', [ 'bg', $i ]); }, FullCollection));
    define ('BorderSolid', array_map (function ($i) { return implode ('-', [ 'border', $i ]); }, FullCollection));
    define ('ButtonSolid', array_map (function ($i) { return implode ('-', [ 'btn', $i ]); }, FullCollection));
    define ('ButtonLine', array_map (function ($i) { return implode ('-', [ 'btn', 'outline', $i ]); }, FullCollection));
    define ('LinkSolid', array_map (function ($i) { return implode ('-', [ 'link', $i ]); }, FullCollection));
    define ('TextBackground', array_map (function ($i) { return implode ('-', [ 'text', 'bg', $i ]); }, FullCollection));
    define ('TextSolid', array_map (function ($i) { return implode ('-', [ 'text', $i ]); }, FullCollection));

    define ('BackgroundGradient', array_map (function ($i) { return implode ('-', [ 'bg', $i ]); }, GradientCollection));

    define ('Alert', array_map (function ($i) { return implode ('-', [ 'alert', $i ]); }, SmallCollection));
    define ('BackgroundSubtle', array_map (function ($i) { return implode ('-', [ 'bg', $i, 'subtle' ]); }, SmallCollection));
    define ('BorderSubtle', array_map (function ($i) { return implode ('-', [ 'border', $i, 'subtle' ]); }, SmallCollection));
    define ('TextEmphasis', array_map (function ($i) { return implode ('-', [ 'text', $i, 'emphasis' ]); }, SmallCollection));

    function SetFlex ($is_input = []) {
        if (in_array ($is_input, [ 'col' ])) return [ 'flex-column' ];
        if (in_array ($is_input, [ 'row' ])) return [ 'flex-row', 'flex-wrap' ];
        return [];
    };

    function GetBootstrap () {
        return [
            SetKey ([ 'html' ]) => [ 'h-100', 'm-0', 'p-0', 'w-100' ],
            SetKey ([ 'html', 'body' ]) => [ 'h-100', 'm-0', 'p-0', 'w-100' ],
            SetKey ([ 'html', 'frame' ]) => [ 'm-0', 'p-0', 'w-100' ],
            SetKey ([ 'html', 'hr' ]) => [ 'mx-0', 'my-2', 'p-0', 'w-100' ],
            SetKey ([ 'html', 'input' ]) => [ 'form-control', 'pe-5', 'ps-2', 'py-2' ],
            SetKey ([ 'html', 'label' ]) => [ 'align-items-end', 'd-flex', 'justify-content-start', 'label', 'text-start', 'm-0', 'p-0' ],
            SetKey ([ 'html', 'table' ]) => [ 'table', 'table-striped', 'table-hover', 'm-0', 'p-0', 'row', 'w-100' ],
            SetKey ([ 'html', 'table', 'body' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
            SetKey ([ 'html', 'table', 'head' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
            SetKey ([ 'html', 'table', 'td' ]) => [ 'm-0', 'p-2', 'row', 'w-100' ],
            SetKey ([ 'html', 'table', 'th' ]) => [ 'm-0', 'p-2', 'row', 'w-100' ],
            SetKey ([ 'html', 'table', 'tr' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
        ];
    };

    function GetPool () {

        $is_array = [];

        $is_border_ = [ 'border', 'border-1' ];
        $is_button_ = [ 'btn', 'button', 'cursor-pointer', 'm-0', 'p-2' ];
        $is_text_ = [ 'd-inline', 'lh-1', 'm-0', 'p-0', 'text-center' ];
        $is_link_ = [ 'fw-medium', 'text-decoration-none', 'link-opacity-50-hover', 'nav-link' ];
        $is_wrap_ = [ 'd-flex', 'justify-content-center', 'm-0', 'w-100' ];

        foreach (FullCollection as $is_key => $is_color):
            $is_array = array_merge ($is_array, [ SetKey ([ 'button', $is_color ]) => [ ...$is_button_, ButtonSolid[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ SetKey ([ 'line', 'button', $is_color ]) => [ ...$is_button_, ButtonLine[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ SetKey ([ 'link', $is_color ]) => [ ...$is_text_, ...$is_link_, LinkSolid[$is_key] ] ]);
        endforeach;

        foreach (Direction as $is_direction)
            $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'set', $is_direction ]) => [ ...$is_wrap_, ...SetFlex ($is_direction) ] ]);

        foreach (SmallCollection as $is_key => $is_color):
            $is_emphasi = [ BackgroundSubtle[$is_key], BorderSubtle[$is_key], TextEmphasis[$is_key] ];
            $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'color', $is_color ]) => [
                    ...$is_border_,
                    ...$is_text_,
                    ...$is_emphasi,
                ],
            ]);

            $is_text = [
                ...$is_text_,
                TextEmphasis[$is_key],
            ];

            $is_array = array_merge ($is_array, [ SetKey ([ 'text', 'color', $is_color ]) => [ ...$is_text ] ]);


            foreach (range (1, 6) as $is_head):
                $is_array = array_merge ($is_array, [
                    SetKey ([ implode ('', [ 'h', $is_head ]), $is_color ]) => [
                        implode ('', [ 'h', $is_head ]),
                        ...$is_text,
                    ],
                ]);
            endforeach;


        endforeach;



        $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'set', 'alert' ]) => [
                'd-flex',
                'flex-column',
                'justify-content-center',
                'm-0',
                'p-2',
                'rounded-2',
                'shadow-sm',
            ],
        ]);



        $is_array = array_merge ($is_array, [ SetKey ([ 'text' ]) => [ ...$is_text_ ] ]);


        $is_array = array_merge ($is_array, [ SetKey ([ 'link' ]) => [ ...$is_text_, ...$is_link_ ] ]);


        foreach (range (1, 6) as $is_head):
            $is_array = array_merge ($is_array, [
                SetKey ([ implode ('', [ 'h', $is_head ]) ]) => [
                    implode ('', [ 'h', $is_head ]),
                    ...$is_text_,
                ],
            ]);
        endforeach;

        foreach (range (1, 12) as $is_col):
            $is_array = array_merge ($is_array, [ SetKey ([ 'col', str_pad ($is_col, 2, '0', STR_PAD_LEFT) ]) => [
                    implode ('-', [ 'col', 'lg', $is_col ]),
                    'col-12',
                    'd-flex',
                    'justify-content-center',
                    'm-0'
                ],
            ]);
        endforeach;

        $is_anyone = [ 'd-flex', 'flex-nowrap', 'justify-content-center', 'm-0', 'p-0' ];

        $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'set', 'button' ]) => [ 'btn-group', ...$is_anyone ] ]);
        $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'set', 'input' ]) => [ 'input-group', ...$is_anyone ] ]);
        $is_array = array_merge ($is_array, [ SetKey ([ 'wrap', 'set', 'toolbar' ]) => [ 'btn-toolbar', ...$is_anyone ] ]);

        foreach (range (0, 5) as $is_gap)
            $is_array = array_merge ($is_array, [ SetKey ([ 'gap', str_pad ($is_gap, 2, '0', STR_PAD_LEFT) ]) => [ 'grid', implode ('-', [ 'gap', $is_gap ]) ] ]);


        foreach (GetBootstrap () as $is_key => $is_value)
            $is_array = array_merge ($is_array, [ $is_key => $is_value ]);


        $is_array = [
            ...$is_array,
            SetKey ([ 'text', 'set', 'disabled' ]) => [ 'text-decoration-line-through' ],
            SetKey ([ 'text', 'set', 'mono' ]) => [ 'font-monospace', 'fw-semibold', ...$is_text_ ],
        ];


        ksort ($is_array);
        $is_result = [];
        foreach ($is_array as $is_key => $is_value):
            $is_value = array_unique ($is_value);
            sort ($is_value);
            $is_result = array_merge ($is_result, [
                $is_key => $is_value,
            ]);
        endforeach;
        return $is_result;
    };

    if (IsPathExist ('pool.json')):
        if (SetJsonFileComparator (GetPool (), 'pool.json')): else:
            SetJsonFileCreator (GetPool (), 'pool.json');
        endif;
    else:
        SetJsonFileCreator (GetPool (), 'pool.json');
    endif;

    define ('P', ConvertFileToArray ('pool.json'));

    function GetClass ($is_input = '') {
        if (is_string ($is_input))
            if (in_array ($is_input, array_keys (P)))
                return P[$is_input];
        return [];
    };

    function SetClass ($is_input = []) {
        if (IsArray (SetArray ($is_input))):
            $is_input = array_values (array_unique (SetArray ($is_input)));
            sort ($is_input);
            return SetAttrib ($is_input, 'class');
        endif;
        return [];
    };

    function SetBackground () {
        return [
            'background-attachment' => 'scroll',
            'background-position' => 'center',
            'background-repeat' => 'no-repeat',
            'background-size' => 'cover',
        ];
    };

    function GetStyle ($is_key = '', $is_input = []) {
        $is_result = [
            'box-shadow' => [ 'box-shadow' => 'inset 0 1.5rem 3rem rgba(0, 0, 0, .75)' ],
            'min-height' => [ 'height' => 'auto', 'min-height' => '30rem' ],
            'text-shadow' => [ 'text-shadow' => '0 1.5px 3px rgba(0, 0, 0, .75)' ],
            'background-image' => IsPathListExist ($is_input) ? [
                'background-image' => 'url(' . GetRandom (IsPathListExist ($is_input)) . ')',
                ...SetBackground (),
            ] : [
            ],
        ];
        if (is_string ($is_key))
            if (in_array ($is_key, array_keys ($is_result)))
                return $is_result[$is_key];
        return [];
    };

    function SetReplace ($is_input = []) {
        $is_result = $is_input;
        foreach (array_keys (GetBootstrap ()) as $is_key)
            $is_result = str_replace (implode ('', [ '<', $is_key, '>' ]), implode ('', [ '<', $is_key, ...SetClass (GetClass ($is_key)), '>' ]), $is_result);
        return $is_result;
    };

    function SetStyle ($is_input = []) {
        if (IsAssociativeArray ($is_input))
            return SetAttrib (implode (' ', array_map (function ($is_index) use ($is_input) {
                return implode ('', [ $is_index, ': ', $is_input[$is_index], ';' ]);
            }, array_keys ($is_input))), 'style');
        return [];
    };

?>