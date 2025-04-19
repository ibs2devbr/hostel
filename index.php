<?php

    foreach (getFileArray ([ 'search' => 'define' ]) as $is_index):
        define (setTarget ($is_index, '-'), setJson2Array ($is_index));
    endforeach;

    define ('definePeriodo', array_map (function ($i) {
        return implode (' ', [ 'dás', $i * 6 . 'h', 'às', $i * 6 + 6 . 'h' ]);
    }, range (1, 3)));

    define ('defineFaturamento', [
        implode ('', [ 'r$', number_format (1, 2, ',', '.'), ' a r$', number_format (pow (1 * 10, 5), 2, ',', '.') ]),
        ...array_map (function ($i) {
            return implode ('', [ 'r$', number_format ($i * pow (1 * 10, 5) + 1, 2, ',', '.'), ' a r$', number_format ($i * pow (1 * 10, 5) + pow (1 * 10, 5), 2, ',', '.') ]);
        }, range (1, 9)),
    ]);

    define ('defineFuncionario', [
        implode (' ', [ 1, ' a ', 10, ' funcionarios.' ]),
        ...array_map (function ($i) {
            return implode ('', [ ($i * 10 + 1), ' a ', ($i * 10), ' funcionarios.' ]);
        }, range (1, 9)),
    ]);

    define ('defineAdultos', array_map (function ($i) { return strval ($i); }, range (1, 10)));

    define ('defineBackground', [
        'background-attachment' => 'scroll',
        'background-position' => 'center',
        'background-repeat' => 'no-repeat',
        'background-size' => 'cover',
    ]);

    define ('defineOption', [
        'funcionario' => defineFuncionario,
        'dia' => defineDia,
        'mes' => defineMes,
        'primeiroContato' => definePrimeiroContato,
        'genero' => defineGenero,
        'cargo' => defineCargo,
        'periodo' => definePeriodo,
        'segmento' => defineSegmento,
        'comoVoceNosConheceu' => defineComoVoceNosConheceu,
        'faturamento' => defineFaturamento,
        'assunto' => defineAssunto,
        'voluntario' => defineVoluntario,
        'groupAdults' => defineAdultos,
        'adultos' => defineAdultos,
    ]);

    function setHighlighted (array|string $is_input = ''): string {
        $is_lighted = array_unique (defineHighlighted);
        return isArray (setArray ($is_input)) ? preg_replace_callback (implode ('', [
            '/\b(', implode ('|', [ ...array_map ('strtolower', $is_lighted), ...array_map ('strtoupper', $is_lighted), ...array_map ('ucfirst', $is_lighted), ...array_map ('ucwords', $is_lighted) ]), ')\b/i'
        ]), function ($is_index) { return implode ('', [ '<em>', '<b>', ucwords ($is_index[0]), '</b>', '</em>' ]); }, implode ('', setArray ($is_input))) : '';
    };

    function isKeyExist (array $is_input = [], string $is_key = ''): bool {
        if (!isset ($is_input)) return false;
        if (!array_key_exists ($is_key, $is_input)) return false;
        return true;
    };

    function isKeyTrue (array $is_input = [], string $is_key = ''): bool {
        if (!isKeyExist ($is_input, $is_key)) return false;
        if (!isTrue ($is_input[$is_key])) return false;
        return true;
    };

    function isTrue (array|string|object $is_input = []): bool {
        if (!isset ($is_input)) return false;
        if (empty ($is_input)) return false;
        return true;
    };

    function getFilledKeys (array $is_input = []): bool {
        foreach ($is_input as $is_key_i => $is_value_i):
            if (isArray ($is_value_i)):
                if (array_is_list ($is_value_i)): return true; else:
                    foreach ($is_value_i as $is_key_j => $is_value_j):
                        if (getFilledKeys ($is_value_j)):
                            return true;
                        endif;
                    endforeach;
                endif;
            elseif (isTrue ($is_value_i)):
                return true;
            endif;
        endforeach;
        return false;
    };

    function getOnlyButtonsRow (array $is_input = []): bool {
        if (!isArray ($is_input)) return false;
        if (!array_is_list ($is_input)) return false;
        foreach ($is_input as $is_index):
            if (isKeyTrue ($is_index, 'selector')):
                if (!in_array ($is_index['selector'], [ 'button' ])):
                    return false;
                endif;
            endif;
        endforeach;
        return true;
    };

    function setArray (array|string $is_input = []): bool|array {
        return array_values (array_filter ([
            ...isString ($is_input) ? [ $is_input ] : [],
            ...isArray ($is_input) ? [ ...array_is_list ($is_input) ? $is_input : [] ] : [],
        ], function ($is_index) {
            if (isString ($is_index))
                return $is_index;
        }));
    };

    function setObjectVar ($is_input = []) {
        return is_object ($is_input) ? get_object_vars ($is_input) : $is_input;
    };

    function isArray (mixed $is_input = []): bool {
        $is_input = setObjectVar ($is_input);
        return isTrue ($is_input) && is_array ($is_input);
    };

    function isString (mixed $is_input = ''): bool {
        return isTrue ($is_input) && is_string ($is_input);
    };

    function getKeyValue (array $is_input = [], string $is_key = '', array|float|string $is_backup = []): array|string {
        $is_input = setObjectVar ($is_input);
        if (isKeyTrue ($is_input, $is_key))
            if (isTrue (setObjectVar ($is_input[$is_key])))
                return setObjectVar ($is_input[$is_key]);
        return $is_backup;
    };

    function setProper (array $is_input = [], array|string $is_key = '', array|float|string $is_backup = []): array {
        $is_result = [];
        if (isArray ($is_key)):
            foreach ($is_key as $is_index):
                $is_result[$is_index] = getKeyValue ($is_input, $is_index, $is_backup);
            endforeach;
        endif;
        if (isString ($is_key)):
            $is_result[$is_key] = getKeyValue ($is_input, $is_key, $is_backup);
        endif;
        return $is_result;
    };

    function isNumber (float|string $is_input = ''): float {
        if (is_float (floatval ($is_input)))
            return floatval ($is_input);
        return 1;
    };

    function isURL (string $is_input = ''): bool {
        return preg_match ('/^(https?|ftp|file):\/\/(www\.)?/', $is_input);
    };

    function isURLExist (string $is_input = ''): bool|string {
        if (!isURL ($is_input)) return false;
        $ch = curl_init ();
        curl_setopt ($ch, CURLOPT_URL, $is_input);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
        $html = curl_exec ($ch);
        $is_http = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        return $is_http === 200 ? $is_input : false;
    };

    function isPhone (string $is_input = ''): string {
        $is_number = preg_replace ('/[^\d]/', '', $is_input);
        $is_ddd = implode ('|', array_map (function ($is_index) {
            return implode ('|', array_filter (array_map (function ($is_index) { return $is_index; }, range ($is_index[0], $is_index[1])), function ($is_index) {
                if (!in_array ($is_index, [ 25, 26, 29, 36, 46, 52, 56, 57, 58, 59, 66, 76 ]))
                    return $is_index;
            }));
        }, [ [ 11, 19 ], [ 21, 28 ], [ 31, 39 ], [ 41, 49 ], [ 51, 55 ], [ 61, 69 ], [ 71, 79 ], [ 81, 89 ], [ 91, 99 ] ]));
        if (preg_match ('/^55?:' . $is_ddd . '[2-9]{8}$/', $is_number) || preg_match ('/^55?:' . $is_ddd . '9[0-9]{8}$/', $is_number))
            return $is_number;
    };

    function isExpression (string $is_input = ''): bool|string {
        $is_pattern = '/^';
        $is_pattern .= '[+-]?';
        $is_pattern .= ' ';
        $is_pattern .= '(0|[1-9][0-9]{0,2})';
        $is_pattern .= ' ';
        $is_pattern .= '[+\-*\/]';
        $is_pattern .= ' ';
        $is_pattern .= '(0|[1-9][0-9]{0,2})';
        $is_pattern .= '$/';
        $is_input = preg_replace ('/\s+/', ' ', trim ($is_input));
        if (preg_match ($is_pattern, $is_input)):
            if (!in_array (substr ($is_input, 0, 1), [ '+', '-' ])):
                return implode (' ', [ '+', $is_input ]);
            else:
                return $is_input;
            endif;
        endif;
        return false;
    };

    function setExpression (string $is_input = '- 1 * 18'): string {
        if (isExpression ($is_input)):
            $is_result = 0;
            date_default_timezone_set ('America/Sao_Paulo');
            $is_array = explode (' ', isExpression ($is_input));
            for ($i = 0; $i < sizeof ($is_array); $i++):
                if (in_array ($is_array[$i], [ '+' ])) $is_result += floatval ($is_array[$i + 1]);
                if (in_array ($is_array[$i], [ '-' ])) $is_result -= floatval ($is_array[$i + 1]);
                if (in_array ($is_array[$i], [ '*' ])) $is_result *= floatval ($is_array[$i + 1]);
                if (in_array ($is_array[$i], [ '/' ])) $is_result /= floatval ($is_array[$i + 1]);
            endfor;
            $is_result *= 365;
            return date ('Y-m-d', strtotime (implode ('', [ isNumber ($is_result) < 0 ? '-' : '+', - 1 * isNumber ($is_result), ' day' ]), strtotime (date ('Y-m-d'))));
        endif;
        return date ('Y-m-d');
    };

    function setRandomPassword (float $is_input = 12): string {
        $is_letter = implode ('', range ('a', 'z'));
        return implode ('', array_map (function ($is_index) use ($is_letter) {
            return $is_letter[rand (0, strlen ($is_letter) - 1)];
        }, range (0, $is_input)));
    };

    function getArrayRandomIndex (array|string $is_input = []): bool|string {
        $is_input = setArray ($is_input);
        if (isArray ($is_input))
            return $is_input[array_rand ($is_input)];
        return false;
    };

    function setStyleArray (string $is_input = 'style.json'): array {
        $is_input = [ ...setJson2Array ($is_input), ...getPathArray ([ 'dir' => 'css' ]) ];
        if (isArray (setArray ($is_input))):
            return array_map (function ($is_index) {
                return implode ('', [
                    '<link',
                        ' href=\'', $is_index, '\'', 
                        ' rel=\'stylesheet\'',
                        ' crossorigin=\'anonymous\'',
                    '>',
                ]);
            }, setArray ($is_input));
        endif;
        return [];
    };

    function setScriptArray (string $is_input = 'script.json'): array {
        $is_input = [ ...setJson2Array ($is_input), ...getPathArray ([ 'dir' => 'js' ]) ];
        if (isArray (setArray ($is_input))):
            return array_map (function ($is_index) {
                return implode ('', [
                    '<script',
                        ' src=\'', $is_index, '\'',
                        ' crossorigin=\'anonymous\'',
                        ...!isURL ($is_index) ? [ ' type=\'module\'' ] : [],
                    '></script>',
                ]);
            }, setArray ($is_input));
        endif;
        return [];
    };

    function getRootAddress (): string {
        return getServerAddress ('DOCUMENT_ROOT');
    };

    function getHostAddress (): string {
        return getServerAddress ('HTTP_HOST');
    };

    function setAttrib (array|string $is_input = '', string $is_attrib = 'id'): array {
        return [
            ...isArray (setArray ($is_input)) && isString ($is_attrib) ? [
                ' ', setID ($is_attrib), '=\'', implode (in_array ($is_attrib, [ 'class', 'style' ]) ? ' ' : '', setArray ($is_input)), '\''
            ] : [
            ],
        ];
    };

    function setID (array|string $is_input = ''): string {
        $is_input = implode ('-', setArray ($is_input));
        if (isKeyTrue (pathinfo ($is_input), 'extension')) $is_input = pathinfo ($is_input)['filename'];
        $is_input = setTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z_]/i', '-', $is_input);
        $is_input = preg_replace ('/-+/', '-', $is_input);
        return strtolower (trim ($is_input, '-'));
    };

    function setTarget (array|string $is_input = '', string $is_between = ' '): string {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = setTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z]/i', $is_between, $is_input);
        $is_input = preg_replace ('/\s+/', $is_between, $is_input);
        $is_input = explode ($is_between, trim ($is_input));
        return implode ('', array_map (function ($i, $k) { return !$k ? strtolower ($i) : ucfirst ($i); }, $is_input, array_keys ($is_input)));
    };

    function setCamelcase (array|string $is_input = ''): string {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        return implode (' ', array_map (function ($i) { return in_array ($i, defineLowercase) ? strtolower ($i) : ucfirst ($i); }, explode (' ', trim ($is_input))));
    };

    function setTonicSyllable (string $is_input = ''): string {
        foreach ([
            'A' => '/(' . implode ('|', [ 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å' ]) . ')/',
            'E' => '/(' . implode ('|', [ 'È', 'É', 'Ê', 'Ë' ]) . ')/',
            'I' => '/(' . implode ('|', [ 'Ì', 'Í', 'Î', 'Ï' ]) . ')/',
            'O' => '/(' . implode ('|', [ 'Ò', 'Ó', 'Ô', 'Õ' ]) . ')/',
            'U' => '/(' . implode ('|', [ 'Ù', 'Ú', 'Û', 'Ü' ]) . ')/',
            'C' => '/(' . implode ('|', [ 'Ç' ]) . ')/',
            'N' => '/(' . implode ('|', [ 'Ñ' ]) . ')/',
            'Y' => '/(' . implode ('|', [ 'Ÿ' ]) . ')/',
            'a' => '/(' . implode ('|', [ 'à', 'á', 'â', 'ã', 'ä', 'å' ]) . ')/',
            'e' => '/(' . implode ('|', [ 'è', 'é', 'ê', 'ë' ]) . ')/',
            'i' => '/(' . implode ('|', [ 'ì', 'í', 'î', 'ï' ]) . ')/',
            'o' => '/(' . implode ('|', [ 'ò', 'ó', 'ô', 'õ' ]) . ')/',
            'u' => '/(' . implode ('|', [ 'ù', 'ú', 'û', 'ü' ]) . ')/',
            'c' => '/(' . implode ('|', [ 'ç' ]) . ')/',
            'n' => '/(' . implode ('|', [ 'ñ' ]) . ')/',
            'y' => '/(' . implode ('|', [ 'ÿ' ]) . ')/',
        ] as $is_replace => $is_pattern)
            $is_input = preg_replace ($is_pattern, $is_replace, $is_input);
        return trim ($is_input);
    };

    function hasValidPath (array|string $is_input = []): array {
        return isArray (setArray ($is_input)) ? array_values (array_map (function ($is_index) {
            if (isPathExist ($is_index)) return isPathExist ($is_index);
            if (isURLExist ($is_index)) return isURLExist ($is_index);
        }, setArray ($is_input))) : [];
    };

    function setDir (string $is_input = ''): string {
        $is_result = implode ('/', [ '.', setID ($is_input) ]);
        if (!is_dir ($is_result))
            mkdir ($is_result, 0777, true);
        return $is_result;
    };

    function setArray2Json (array $is_array = [], string $is_filename = '') {
        if (isArray ($is_array) && isString ($is_filename)):
            $is_fopen = fopen (implode ('/', [
                '.',
                ...isKeyTrue (pathinfo ($is_filename), 'extension') ? [
                    ...isTrue (pathinfo ($is_filename)['extension'] === 'json') ? [
                        setDir (pathinfo ($is_filename)['extension']), pathinfo ($is_filename)['basename']
                    ] : [
                        setDir ('json'), setID ($is_filename) . 'json'
                    ],
                ] : [
                    setDir ('json'), setID ($is_filename) . 'json'
                ],
            ]), 'w');
            fwrite ($is_fopen, json_encode ($is_array));
            fclose ($is_fopen);
        endif;
    };

    function isPathExist (string $is_input = ''): string {
        return file_exists (setPath ($is_input)) ? setPath ($is_input) : '';
    };

    function setAttribForm (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'action', 'id', 'method', 'target' ]);
        return [
            ...isString ($is_proper['id']) ? setAttrib ($is_proper['id']) : [],
            ...setAttrib ('multipart/form-data', 'enctype'),
            ...setAttrib ('utf-8', 'accept-charset'),
            ...setAttrib (in_array ($is_proper['method'], defineMethod) ? $is_proper['method'] : 'POST', 'method'),
            ...setAttrib (in_array ($is_proper['target'], defineTarget) ? '_' . $is_proper['target'] : '_self', 'target'),
            ...setAttrib (isString ($is_proper['action']) ? $is_proper['action'] : $_SERVER['PHP_SELF'], 'action'),
        ];
    };    

    function IsCNPJ (string $is_input = ''): bool|string {
        $is_input = preg_replace ('/[^0-9]/', '', $is_input);
        if (strlen ($is_input) != 14) return false;
        if (preg_match ('/^(\d)\1{13}$/', $is_input)) return false;
        $tamanho = 12;
        $soma = $resto = 0;
        for ($i = 0; $i < $tamanho; $i++) $soma += $is_input[$i] * (($tamanho + 1) - $i);
        $resto = $soma % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto;
        $tamanho = 11;
        $soma = $resto = 0;
        for ($i = 0; $i < $tamanho; $i++) $soma += $is_input[$i] * (($tamanho + 1) - $i);
        $soma += $digito1 * 2;
        $resto = $soma % 11;
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        // if ($digito1 != $is_input[12]) return false;
        if ($digito2 != $is_input[13]) return false;
        return implode ('', [
            substr ($is_input, 0, 2), '.',
            substr ($is_input, 2, 3), '.',
            substr ($is_input, 5, 3), '/',
            substr ($is_input, 8, 4), '-',
            substr ($is_input, -2),
        ]);
    };

    function getCarouselIndicator (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'content', 'id' ]);
        return sizeof ($is_proper['content']) > 1 ? [
            '<div', ...setClass ([ 'carousel-indicators', 'mx-auto', 'mb-3', getClass ('gap01') ]), '>',
                ...array_map (function ($is_index, $is_key) use ($is_proper) {
                    return implode ('', [
                        '<button',
                            ' data-bs-slide-to=\'', $is_key, '\'',
                            ...!$is_key ? setAttrib ('true', 'aria-current') : [],
                            ...setAttrib ('button', 'type'),
                            ...setAttrib ([ '#', $is_proper['id'] ], 'data-bs-target'),
                            ...setAttrib ([ 'Slide ', ($is_key + 1) ], 'aria-label'),
                            ...setClass ([ ...!$is_key ? [ 'active' ] : [], 'border', 'border-0' ]),
                        '>',
                        '</button>',
                    ]);
                }, $is_proper['content'], array_keys ($is_proper['content'])),
            '</div>',
        ] : [
        ];
    };

    function getGalleryContainer (array $is_input = [], float $is_height = 30): array {
        $is_id = setID (setRandomPassword ());
        $is_input = isKeyTrue ($is_input, 'gallery') ? hasValidPath ($is_input['gallery']) : [];
        return [
            ...isArray ($is_input) ? [
                '<div', ...setAttrib ($is_id), ...setClass (setCarouselWrapper ()), ...setStyle ([ 'min-height' => $is_height . 'rem' ]), '>',
                    ...getCarouselIndicator ([ 'content' => $is_input, 'id' => $is_id ]),
                    ...getGalleryInner ([ 'content' => $is_input, 'height' => $is_height ]),
                    ...getCarouselButton ([ 'content' => $is_input, 'id' => $is_id ]),
                '</div>',
            ] : [
            ],
        ];
    };

    function getCarouselContainer (string $is_input = '', float $is_height = 30): array {
        $is_id = setID (setRandomPassword ());
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                '<div', ...setAttrib ($is_id), ...setClass (setCarouselWrapper ()), ...setStyle ([ 'min-height' => $is_height . 'rem' ]), '>',
                    ...getCarouselIndicator ([ 'content' => $is_input, 'id' => $is_id ]),
                    ...getCarouselInner ([ 'content' => $is_input, 'height' => $is_height ]),
                    ...getCarouselButton ([ 'content' => $is_input, 'id' => $is_id ]),
                '</div>',
            ] : [
            ],
        ];
    };

    function getDivider (): array {
        return [
            '<div',
                ...setStyle ([
                    'background-color' => 'rgba(0, 0, 0, .1)',
                    'border-width' => '1px 0',
                    'border' => 'solid rgba(0, 0, 0, .15)',
                    'box-shadow' => 'inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15)',
                    'height' => '3rem',
                    'width' => '100%',
                ]),
            '>',
            '</div>',
        ];
    };

    function getCarouselButton (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'content', 'id' ]);
        return [
            ...sizeof ($is_proper['content']) > 1 ? [
                ...array_map (function ($is_index) use ($is_proper) {
                    return implode ('', [
                        '<button',
                            ...setAttrib ('button', 'type'),
                            ...setAttrib ([ '#', setID ($is_proper['id']) ], 'data-bs-target'),
                            ...setAttrib ($is_index, 'data-bs-slide'),
                            ...setClass ([ setID ([ 'carousel', 'control', $is_index ]), 'mx-3', 'p-0' ]),
                            ...setStyle ([ 'width' => 'auto' ]),
                        '>',
                            '<span', ...setAttrib ('true', 'aria-hidden'), ...setClass (setID ([ 'carousel', 'control', $is_index, 'icon' ])), '></span>',
                            '<span class=\'visually-hidden\'></span>',
                        '</button>',
                    ]);
                }, [ 'prev', 'next' ]),
            ] : [
            ]
        ];
    };

    function getModalArray (string $is_input = 'modal'): array {
        return array_map (function ($is_index) use ($is_input) {
            return implode ('', array_map (function ($is_title) use ($is_index) {
                $is_function = setTarget ([ 'get', $is_index, 'container' ]);
                if (function_exists ($is_function))
                    return implode ('', getModalTemplate ([ 'content' => ($is_function) ($is_title), 'title' => $is_title ]));
            }, getJsonArray ($is_index)));
        }, getFileArray ([ 'search' => $is_input ]));
    };

    function getModalTemplate (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'content', 'title' ]);
        return [
            ...isTrue ($is_proper['title']) && isTrue ($is_proper['content']) ? [
                '<div',
                    ...setAttrib ('-1', 'tabindex'),
                    ...setAttrib ('true', 'aria-hidden'),
                    ...setAttrib (setTarget ([ $is_proper['title'], 'label' ]), 'aria-labelledby'),
                    ...setAttrib (setTarget ([ $is_proper['title'], 'target' ])),
                    ...setClass ([ 'modal', 'fade' ]),
                '>',
                    '<div', ...setClass ([ 'modal-dialog-centered', 'modal-dialog-scrollable', 'modal-dialog', 'modal-fullscreen' ]), '>',
                        '<div', ...setClass ([ 'modal-content', getClass ('wrapSetCol') ]), '>',
                            '<button',
                                ...setClass ([ 'btn-close', 'position-absolute', 'z-3' ]),
                                ...setStyle ([ 'right' => '24px', 'top' => '12px' ]),
                                ...setAttrib ('modal', 'data-bs-dismiss'),
                                ...setAttrib ('button', 'type'),
                            '>',
                            '</button>',
                            '<div', ...setClass ([ 'modal-body', 'modal-center', 'px-3', 'px-lg-5', 'py-5' ]), '>',
                                '<div', ...setClass ([ getClass ('wrapSetCol'), getClass ('gap05') ]), '>',
                                    ...setArray ($is_proper['content']),
                                '</div>',
                            '</div>',
                        '</div>',
                    '</div>',
                '</div>',
            ] : [
            ],
        ];
    };

    function setSizePicture (string $is_input = '', float $is_width = 12.5): array {
        $is_input = isPathExist ($is_input);
        if (isString ($is_input)):
            return [
                'height' => strval (getimagesize ($is_input)[1]) * $is_width / strval (getimagesize ($is_input)[0]) . 'rem',
                'width' => $is_width . 'rem'
            ];
        endif;
        return [];
    };

    function setAttribPicture (string $is_input = ''): array {
        $is_input = isPathExist ($is_input);
        if (isString ($is_input)):
            return [
                ...setAttrib (strval (getimagesize ($is_input)[1]), 'data-height'),
                ...setAttrib (strval (getimagesize ($is_input)[0]), 'data-width'),
                ...setAttrib ($is_input, 'data-url'),
            ];
        endif;
        return [];
    };

    function getHeaderContainer (string $is_input = ''): array {
        $is_input = setJson2Array ($is_input);
        $is_thumbnail = isKeyTrue ($is_input, 'thumbnail') ? isPathExist ($is_input['thumbnail']) : '';
        $is_style = setSizePicture ($is_thumbnail, 12.5);
        return [
            ...isArray ($is_input) ? [
                '<div',
                    ...setAttrib ('wrap'),
                    ...setClass ([ 'flex-lg-row', 'gap-lg-3', 'p-5', getClass ('wrapSetCol') ]),
                    ...setStyle (getStyle ('background-image', getPathArray ([ 'dir' => 'jpg' ]))),
                '>',
                    ...isString ($is_thumbnail) ? [
                        '<div', ...setAttrib ('brand'), ...setStyle ($is_style), '>',
                            '<div', ...setStyle ([ ...$is_style, ...getStyle ('background-image', $is_thumbnail) ]), '>',
                            '</div>',
                        '</div>',
                    ] : [
                    ],
                    ...getHeadlineTemplate ([
                        'color' => 'white',
                        'content' => $is_input,
                        'heading' => 1,
                        'lineup' => 'start',
                        'shadow' => 'yes',
                        'weight' => 'bolder',
                    ]),
                '</div>',
            ] : [
            ],
        ];
    };

    function getModalFormularioContainer ($is_input = '', $is_stage = 'front') {
        $is_content = setJson2Array ($is_input);
        return isArray ($is_content) ? [
            '<main',
                ...setClass ([ 'mt-3', 'p-0', getClass ('gap05'), getClass ('wrapSetCol') ]),
            '>',
                ...array_map (function ($is_index, $is_key) use ($is_stage) {
                    return implode ('', [
                        '<section', ...setClass ([ 'p-0', getClass ('gap03'), getClass ('wrapSetCol') ]), '>',
                            ...in_array ($is_stage, [ 'modal' ]) ? getHeadlineTemplate ([ 'lineup' => 'start', 'content' => $is_index, 'heading' => 3 ]) : [],
                            '<article',
                                ...setClass ([ 'p-3', getClass ('wrapSetCol'), getClass ('wrapColorLight'), getClass ('gap03') ]),
                            '>',
                                ...getHeadlineTemplate ([ 'content' => $is_index, 'heading' => 3 ]),
                                ...isKeyTrue ($is_index, 'container') ? [
                                    '<form',
                                        ...setClass ([ getClass ('gap02'), getClass ('wrapSetCol') ]),
                                        ...setAttribForm (setProper ($is_index, [ 'action', 'id', 'method', 'target' ])),
                                    '>',
                                        ...array_map (function ($is_index) {
                                            return implode ('', isArray ($is_index) ? [
                                                '<div', ...setClass (getClass ('wrapSetCol')), '>',
                                                    ...!getOnlyButtonsRow ($is_index) ? [
                                                        '<div', ...setClass (getClass ('wrapSetRow')), ...setStyle ([ 'min-height' => '12px' ]), '>',
                                                            ...array_map (function ($is_element) use ($is_index) {
                                                                $is_title = $is_element['label'];
                                                                if (in_array ($is_element['label'], [ 'arrival', 'checkin' ])) $is_title = 'Data de chegada';
                                                                if (in_array ($is_element['label'], [ 'birth' ])) $is_title = 'Data de nascimento';
                                                                if (in_array ($is_element['label'], [ 'departure', 'checkout' ])) $is_title = 'Data de saida';
                                                                if (in_array ($is_element['label'], [ 'group_adults' ])) $is_title = 'Adultos';
                                                                if (in_array ($is_element['label'], [ 'name' ])) $is_title = 'Nome completo';
                                                                if (in_array ($is_element['label'], [ 'number' ])) $is_title = 'Número';
                                                                if (in_array ($is_element['label'], [ 'tel' ])) $is_title = 'Whatsapp';
                                                                if (isKeyTrue ($is_element, 'label')):
                                                                    return implode ('', [
                                                                        '<label',
                                                                            ...setAttrib ($is_element['label'], 'for'),
                                                                            ...setClass ([ 'px-2', getClass ('htmlLabel') ]),
                                                                            ...setStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')', 'min-height' => '12px' ]),
                                                                        '>',
                                                                            ...!in_array ($is_element['type'], [ 'button', 'submit' ]) ? [
                                                                                '<p', ...setClass (getClass ('text')), ...setStyle ([ 'min-height' => '12px' ]), '>',
                                                                                    setCamelcase ($is_title),
                                                                                '</p>',
                                                                            ] : [
                                                                            ],
                                                                        '</label>',
                                                                    ]);
                                                                endif;
                                                            }, $is_index),
                                                        '</div>',
                                                    ] : [
                                                    ],
                                                    ...getOnlyButtonsRow ($is_index) ? [ '<div', ...setClass (getClass ('wrapSetToolbar')), '>' ] : [],
                                                        '<div', ...setClass (getOnlyButtonsRow ($is_index) ? getClass ('wrapSetButton') : getClass ('wrapSetInput')), '>',
                                                            ...array_map (function ($is_element) use ($is_index) {
                                                                $is_option = [];
                                                                if (in_array ($is_element['selector'], [ 'select' ]))
                                                                    if (isKeyTrue (defineOption, setTarget ($is_element['label'])))
                                                                        $is_option = defineOption[setTarget ($is_element['label'])];
                                                                return implode ('', [
                                                                    ...isKeyTrue ($is_element, 'selector') ? [
                                                                        ...in_array ($is_element['selector'], [ 'button', 'input', 'select', 'textarea' ]) ? [
                                                                            '<',
                                                                                $is_element['selector'],
                                                                                ...in_array ($is_element['selector'], [ 'button' ]) ? [
                                                                                    ...setClass (getClass ('lineButtonLight')),
                                                                                    ...in_array ($is_element['label'], [ 'fechar' ]) ? setAttrib ('modal', 'data-bs-dismiss') : [],
                                                                                ] : [
                                                                                ],
                                                                                ...!in_array ($is_element['selector'], [ 'button' ]) ? [
                                                                                    ...setClass (getClass ('htmlInput')),
                                                                                    ...setAttrib ($is_element['label'], 'name'),
                                                                                ] : [
                                                                                ],
                                                                                ...isKeyTrue ($is_element, 'label') ? setAttrib ($is_element['label'], 'id') : [],
                                                                                ...!getOnlyButtonsRow ($is_index) ? [
                                                                                    ...setStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')' ]),
                                                                                ] : [
                                                                                ],
                                                                                ...isKeyTrue ($is_element, 'disabled') ? [ ' disabled' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'input', 'textarea' ]) ? [
                                                                                    ...isKeyTrue ($is_element, 'maxlength') ? setAttrib (strlen ($is_element['maxlength']), 'maxlength') : [],
                                                                                    ...isKeyTrue ($is_element, 'minlength') ? setAttrib (strlen ($is_element['minlength']), 'minlength') : [],
                                                                                    ...isKeyTrue ($is_element, 'placeholder') ? setAttrib ($is_element['placeholder'], 'placeholder') : [],
                                                                                    ...!in_array ($is_element['type'], [ 'date' ]) ? isKeyTrue ($is_element, 'value') ? setAttrib ($is_element['value'], 'value') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...isKeyTrue ($is_element, 'required') ? [ ' required' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'textarea' ]) ? [
                                                                                    ...isKeyTrue ($is_element, 'rows') ? $is_element['rows'] > 1 ? setAttrib ($is_element['rows'], 'rows') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...isKeyTrue ($is_element, 'type') ? [  
                                                                                    ...in_array ($is_element['selector'], [ 'button', 'input' ]) && in_array ($is_element['type'], defineType) ? setAttrib ($is_element['type'], 'type') : [],
                                                                                    ...in_array ($is_element['selector'], [ 'input' ]) && in_array ($is_element['type'], [ 'date' ]) ? [
                                                                                        ...isKeyTrue ($is_element, 'value') ? setAttrib (setExpression ($is_element['value']), 'min') : [],
                                                                                        ...isKeyTrue ($is_element, 'value') ? setAttrib (setExpression ($is_element['value']), 'value') : [],
                                                                                    ] : [
                                                                                    ],
                                                                                ] : [
                                                                                ],
                                                                            '>',
                                                                            ...in_array ($is_element['selector'], [ 'select' ]) ? [ ...GetOption ($is_option), '</select>' ] : [],
                                                                            ...in_array ($is_element['selector'], [ 'button', 'input', 'textarea' ]) ? [
                                                                                ...in_array ($is_element['selector'], [ 'button' ]) ? [ setCamelcase ($is_element['label']) ] : [],
                                                                                '</', $is_element['selector'], '>',
                                                                            ] : [
                                                                            ],
                                                                        ] : [
                                                                        ],
                                                                    ] : [
                                                                    ],
                                                                ]);
                                                            }, $is_index),
                                                        '</div>',
                                                    ...getOnlyButtonsRow ($is_index) ? [ '</div>' ] : [],
                                                '</div>',
                                            ] : [
                                                '<hr', ...setClass (getClass ('htmlHr')), ...setStyle ([ 'border-top' => 'dotted 2px #000' ]), '>',
                                            ]);
                                        }, $is_index['container']),
                                    '</form>',
                                ] : [
                                ],
                            '</article>',
                        '</section>',
                    ]);
                }, $is_content, array_keys ($is_content)),
            '</main>',
        ] : [
        ];
    };

    function getModalCardContainer ($is_input = []) {
        return getModalContainer ($is_input, 'getModalCardTemplate');
    };

    function getModalAccordionContainer ($is_input = []) {
        return getModalContainer ($is_input, 'getModalAccordionTemplate');
    };

    function getModalArticleContainer ($is_input = []) {
        return getModalContainer ($is_input, 'getModalArticleTemplate');
    };

    function getModalContainer (string $is_input = '', string $is_function = ''): array {
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                '<section', ...setClass ([ 'mt-3', 'p-0', getClass ('gap03'), getClass ('wrapSetCol') ]), '>',
                    ...array_map (function ($is_index) use ($is_function) {
                        return implode ('', [
                            ...getHeadlineContainer ($is_index, 3),
                            ...isKeyTrue ($is_index, 'container') ? array_map (function ($is_index) use ($is_function) {
                                return $is_function ($is_index);
                            }, $is_index['container']) : [],
                        ]);
                    }, $is_input),
                '</section>',
            ] : [
            ],
        ];
    };

    function setHyperlink (string $is_href = '', string $is_node = ''): string {
        return isURL ($is_href) ? implode ('', [
            '<a', ...setAttrib ($is_href, 'href'), ...setAttrib ('_blank', 'target'), '>',
                isString ($is_node) ? setCamelcase ($is_node) : $is_href,
            '</a>',
        ]) : '';
    };

    function getDataToggle (string $is_input = ''): array {
        return [
            ...isString ($is_input) ? [
                '<a',
                    ...setAttrib ('#', 'href'),
                    ...setAttrib ('modal', 'data-bs-toggle'),
                    ...setAttrib ([ '#', setTarget ([ $is_input, 'target' ]) ], 'data-bs-target'),
                    ...setClass (getClass ('link')),
                '>',
                    setCamelcase ($is_input),
                '</a>',
            ] : [
            ],
        ];
    };

    function setWordEraser (string $is_result = '', array $is_input = []): string {
        $is_proper = setProper ($is_input, 'delete');
        if (isArray (setArray ($is_proper['delete']))):
            foreach (setArray ($is_proper['delete']) as $is_index)
                $is_result = preg_replace ('/\b' . preg_quote ($is_index, '/') . '\b/', ' ', $is_result);
            $is_result = preg_replace ('/-+/', ' ', $is_result);
            $is_result = preg_replace ('/\s+/', ' ', $is_result);
            return strtolower (trim ($is_result));
        endif;
        return $is_result;
    };

    function getPathProper (array $is_input = []): array {
        return [
            ...setProper ($is_input, 'dir', 'json'),
            ...setProper ($is_input, 'pathinfo', 'filename'),
            ...setProper ($is_input, 'search', ''),
        ];
    };

    function getPathArray (array $is_input = []): array {
        $is_proper = getPathProper ($is_input);
        return array_map (function ($is_index) {
            return isPathExist ($is_index);
        }, getFileArray ([ 'dir' => $is_proper['dir'], 'pathinfo' => 'basename', 'search' => $is_proper['search'] ]));
    };

    function getFileContent (string $is_input = '', string $is_extension = 'json'): string {
        return isFileExist ($is_input, $is_extension) ? file_get_contents (isFileExist ($is_input, $is_extension)) : '';
    };

    function isFileExist (string $is_input = '', string $is_extension = 'json'): string {
        return isKeyTrue (pathinfo ($is_input), 'extension') ? isPathExist (pathinfo ($is_input)['basename'])
        : isPathExist (implode ('.', [ setID ($is_input), $is_extension ]));
    };

    function getFileArray (array $is_input = []): array {
        $is_proper = getPathProper ($is_input);
        $is_array = array_values (array_filter (scandir (setDir ($is_proper['dir'])), function ($is_index) use ($is_proper) {
            if (isKeyTrue (pathinfo ($is_index), 'extension')):
                if (isTrue (pathinfo ($is_index)['extension'] === $is_proper['dir'])):
                    if (!in_array (substr ($is_index, 0, 1), [ '_' ])):
                        if (isString ($is_proper['search'])):
                            if (str_contains ($is_index, $is_proper['search'])):
                                if (getFileContent ($is_index)):
                                    return $is_index;
                                endif;
                            endif;
                        elseif (getFileContent ($is_index)):
                            return $is_index;
                        endif;
                    endif;
                endif;
            endif;
        }));
        $is_result = [];
        foreach ($is_array as $is_index):
            $is_result[] = pathinfo ($is_index)[$is_proper['pathinfo']];
        endforeach;
        return $is_result;
    };

    function getWidgetContainer (string $is_input = 'widget'): array {
        $is_array = getFileArray ([ 'search' => $is_input ]);
        sort ($is_array);
        $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_array) % 2 === 0) $is_number = str_pad (6, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_array) % 3 === 0) $is_number = str_pad (4, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_array) % 4 === 0) $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        $is_number = setTarget ([ 'col', $is_number ]);
        return [
            ...isArray (setArray ($is_array)) ? [
                '<div', ...setClass ([ 'row-gap-3', 'm-0', 'px-5', 'py-3', getClass ('gap00'), getClass ('wrapSetRow') ]), '>',
                    ...array_map (function ($is_index) use ($is_input, $is_number) {
                        return implode ('', [
                            '<div', ...setClass ([ 'p-0', 'flex-column', getClass ($is_number), getClass ('gap01') ]), '>',
                                '<h5', ...setClass ([ 'text-lg-start', getClass ('h5') ]), '>',
                                    setCamelcase (setWordEraser ($is_index, [ 'delete' => $is_input ])),
                                '</h5>',
                                '<div', ...setClass ([ 'justify-content-center', 'justify-content-lg-start', 'row-gap-1', getClass ('gap02'), getClass ('wrapSetRow') ]), '>',
                                    ...array_map (function ($is_index) {
                                        return implode ('', getDataToggle ($is_index));
                                    }, getJsonArray ($is_index)),
                                '</div>',
                            '</div>',
                        ]);
                    }, setArray ($is_array)),
                '</div>',
            ] : [
            ],
            '<div', ...setClass ([ 'px-5', 'pb-5', getClass ('wrapSetCol') ]), '>',
                '<div', ...setClass ([ 'border-top', getClass ('wrapSetCol') ]), '>',
                    '<p', ...setClass ([ 'text-lg-start', getClass ('text') ]), '>',
                        implode (' ', [ '©', date ('Y'), 'Company,', 'Inc.', 'All', 'rights', 'reserved.' ]),
                    '</p>',
                '</div>',
            '</div>',
        ];
    };

    function getSignatureContainer (array $is_input = [ 'name' => 'Fábio de Almeida Ribeiro', 'cnpj' => '37.717.827/0001-20', 'link' => 'https://www.linkedin.com/in/ibs2devbr/' ]): array {
        $is_proper = setProper ($is_input, [ 'cnpj', 'link', 'name' ]);
        $is_true = isString ($is_proper['name']) && IsCNPJ ($is_proper['cnpj']) && isURL ($is_proper['link']);
        function setUnit (string $is_content = '', string $is_hyperlink = ''): array {
            return [
                ...isString ($is_content) && isString ($is_hyperlink) ? [
                    '<li', ...setClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                        '<a', ...setAttrib ('_blank', 'target'), ...setAttrib ($is_hyperlink, 'href'), ...setClass (getClass ('link')), '>',
                            $is_content,
                        '</a>',
                    '</li>',
                ] : [
                ],
            ];
        };
        return [
            ...isTrue ($is_true) ? [
                '<div', ...setClass ([ 'p-3', getClass ('wrapSetCol'), getClass ('wrapColorDark') ]), '>',
                    '<ul', ...setClass ([ 'navbar-nav', 'p-0', getClass ('gap01'), getClass ('wrapSetCol') ]), '>',
                        ...setUnit (setCamelcase ($is_proper['name']), $is_proper['link']),
                        ...setUnit (IsCNPJ ($is_proper['cnpj']), $is_proper['link']),
                    '</ul>',
                '</div>',
            ] : [
            ],
        ];
    };

    function getScrollbar (): array {
        return [
            '<div',
                ...setAttrib ('scroll-bar'),
                ...setClass ([ 'bg-black', 'd-flex', 'fixed-top', 'justify-content-start', 'position-fixed', 'start-0', 'top-0', 'w-100' ]),
                ...setStyle ([ 'height' => '.5rem', 'z-index' => 5 ]),
            '>',
                '<div', 
                    ...setAttrib ('scroll'),
                    ...setClass ([ 'd-flex', 'justify-content-end' ]),
                    ...setStyle ([ 'background-color' => '#ffc107', 'height' => '.25rem', 'width' => '0' ]),
                '>',
                '</div>',
            '</div>',
        ];
    };

    function GetDotButton ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'class', 'id' ], '');
        return [
            ...isString ($is_proper['class']) ? [
                '<div',
                    ...setAttrib ($is_proper['id']),
                    ...setClass ([
                        'align-items-center',
                        'd-flex',
                        'justify-content-center',
                        'bg-secondary',
                    ]),
                    ...setStyle ([
                        'border-radius' => '50%', 
                        'cursor' => 'default', 
                        'height' => '3rem',
                        'width' => '3rem',
                    ]),
                '>',
                    '<i',
                        ...setClass ([ 'bi', 'fw-bold', 'text-white', $is_proper['class'] ]),
                        ...setStyle ([ 'font-size' => '1.25rem' ]),
                    '>',
                    '</i>',
                '</div>',
            ] : [
            ],
        ];
    };

    function setNavbarContainer (string $is_input = 'navbar'): array {
        $is_array = [];
        foreach (getFileArray ([ 'search' => $is_input ]) as $is_index)
            $is_array = array_merge ($is_array, getJsonArray ($is_index));
        sort ($is_array);
        return [
            ...isArray ($is_array) ? [
                ...getScrollbar (),
                '<div',
                    ...setAttrib ('navbar-container'),
                    ...setClass ([
                        'align-items-center',
                        'd-flex',
                        'flex-column',
                        'justify-content-center',
                        'px-3',
                        'py-0',
                        'position-fixed',
                        'w-100',
                    ]),
                    ...setStyle ([
                        'background-color' => '#f8f9fa',
                        'top' => '.25rem',
                        'z-index' => 5,
                    ]),
                '>',
    
                    '<div', ...setClass ([ 'align-items-center', 'd-flex', 'd-lg-none', 'flex-column', 'justify-content-center', 'my-3', 'w-100' ]), '>',
                        ...GetDotButton ([ 'class' => 'bi-arrow-down-up', 'id' => 'navbar-icon' ]),
                    '</div>',
    
                    '<div',
                        ...setAttrib ('hidden'),
                        ...setClass ([ 'd-flex', 'flex-column', 'justify-content-center', 'overflow-hidden', 'w-100' ]),
                        // ...setStyle ([ 'height' => '0' ]),
                    '>',
                        '<div',
                            ...setClass ([
                                'd-flex',
                                'flex-column',
                                'flex-lg-row',
                                'flex-lg-wrap',
                                'gap-3',
                                'row-gap-2',
                                'grid',
                                'justify-content-center',
                                'm-0',
                                'w-100',
                            ]),
                        '>',
                            ...array_map (function ($is_index) { return implode ('', getDataToggle ($is_index)); }, setArray ($is_array)),
                        '</div>',
                    '</div>',
                '</div>',
            ] : [
            ],
        ];
    };

    function setWrapper (array $is_input = [], array $is_attrib = []): array {
        $is_proper = setProper ($is_attrib, [ 'id', 'wrap' ]);
        $is_wrap = in_array ($is_proper['wrap'], defineSeletor) ? $is_proper['wrap'] : 'div';
        return [
            ...isArray ($is_input) ? [
                '<', $is_wrap, ...setClass (getClass ('wrapSetCol')), ...setAttrib ($is_proper['id']), '>',
                    ...$is_input,
                '</', $is_wrap, '>',
            ] : [
            ],
        ];
    };

    function setNumberFormat (float|string $is_input = ''): string {
        return number_format ($is_input, 2, '.', '');
    };

    function getDisplayTemplate (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'discount', 'url', 'value' ], '');
        $is_divisor = 3;
        $is_discount = is_numeric ($is_proper['discount']) ? $is_proper['discount'] : 0;
        $is_url = preg_match ('/^https:\/\/mpago\.la\/[a-zA-Z0-9]+$/', $is_proper['url']) ? $is_proper['url'] : '';
        $is_value = is_numeric ($is_proper['value']) ? $is_proper['value'] : 0;
        $is_final = $is_value - $is_value / 100 * $is_discount;
        return [
            ...isTrue ($is_final) && isTrue ($is_url) ? [
                '<section',
                    ...setClass ([
                        'align-items-center',
                        'bg-dark-subtle',
                        'border-1',
                        'border-dark-subtle',
                        'border',
                        'd-flex',
                        'flex-column',
                        'justify-content-start',
                        'p-2',
                        'price-display',
                        'rounded-2',
                    ]),
                    ...setStyle ([ 'width' => 'fit-content' ]),
                '>',
                    ...isTrue ($is_discount) ? [
                        '<p', ...setClass ([ 'wrapper-principal', getClass ('textSetDisabled'), getClass ('textSetMono') ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                            'R$', '<span', ...setClass ([ 'principal' ]), '>', setNumberFormat ($is_value), '</span>',
                        '</p>',
                    ] : [
                    ],
                    '<div', ...setClass ([ 'wrapper-valor', getClass ('wrapSetRow') ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                        '<h3', ...setClass ([ 'wrapper-negociado', getClass ('h3'), getClass ('textSetMono') ]), '>',
                            'R$', '<span', ...setClass ([ 'negociado' ]), '>', setNumberFormat ($is_final), '</span>',
                        '</h3>',
                        ...isTrue ($is_discount) ? [
                            '<h6', ...setClass ([ 'wrapper-desconto', 'ms-1', 'mt-1', getClass ('h6'), getClass ('textSetMono') ]), '>',
                                '%off', '<span', ...setClass ([ 'desconto' ]), '>', setNumberFormat ($is_discount), '</span>',
                            '</h6>',
                        ] : [
                        ],
                    '</div>',
                    ...isTrue ($is_divisor) ? [
                        '<p', ...setClass ([ 'wrapper-parcelado', getClass ('text'), getClass ('textSetMono') ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                            'Em ', $is_divisor, ' x R$', '<span', ...setClass ([ 'parcelado' ]), '>', setNumberFormat ($is_final / $is_divisor), '</span>', ' sem juros.',
                        '</p>',
                    ] : [
                    ],
                    ...isTrue ($is_value - $is_final) ? [
                        '<p', ...setClass ([ 'wrapper-economia', getClass ('text'), getClass ('textSetMono') ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                            'Economia de R$', '<span', ...setClass ([ 'economia' ]), '>', setNumberFormat ($is_value - $is_final), '</span>', '.',
                        '</p>',
                    ] : [
                    ],
                '</section>',
                '<section', ...setClass ([ 'btn-toolbar' ]), '>',
                    '<div', ...setClass ([ 'btn-group' ]), '>',
                        '<a',
                            ...setAttrib ('_blank', 'target'),
                            ...setAttrib ($is_url, 'href'),
                            ...setClass ([ 'btn', 'btn-outline-light' ]),
                        '>',
                            'Pagar',
                        '</a>',
                    '</div>',
                '</section>',
            ] : [
            ],
        ];
    };
                    
    function setCarouselWrapper (): array {
        return [
            'carousel-dark',
            'carousel-fade',
            'carousel',
            'overflow-hidden',
            'h-100',
            'm-0',
            'p-0',
            'slide',
            'w-100',
        ];
    };

    function getCarouselInner (array $is_input = []): array {
        $is_proper = [
            ...setProper ($is_input, 'content'),
            ...setProper ($is_input, 'height', 30),
        ];
        return [
            ...isArray ($is_proper['content']) ? [
                '<article', ...setClass ([ 'carousel-inner', 'h-100', 'w-100' ]), ...setStyle ([ 'min-height' => $is_proper['height'] . 'rem' ]), '>',
                    ...array_map (function ($is_index, $is_key) use ($is_proper) {
                        return implode ('', [
                            '<div',
                                ...setAttrib (5000, 'data-bs-interval'),
                                ...setClass ([ ...!$is_key ? [ 'active' ] : [], 'carousel-item', 'h-100', 'w-100' ]),
                                ...setStyle ([ 'min-height' => $is_proper['height'] . 'rem', ...getStyle ('background-image', $is_index['gallery']) ]),
                            '>',
                                '<div',
                                    ...setClass ([
                                        'align-items-center',
                                        'carousel-caption',
                                        'd-flex',
                                        'justify-content-center',
                                        'justify-content-lg-start',
                                        'm-0',
                                        'p-0',
                                    ]),
                                    ...setStyle ([
                                        'bottom' => '0',
                                        'left' => '50%',
                                        'min-height' => $is_proper['height'] . 'rem',
                                        'right' => '0',
                                        'top' => '50%',
                                        'transform' => 'translate(-50%, -50%)',
                                        'width' => 'calc(100% - 4rem * 2)',
                                    ]),
                                '>',
                                    '<div', ...setClass (getClass ('col06')), '>',
                                        ...getHeadlineTemplate ([
                                            'color' => 'white',
                                            'content' => $is_index,
                                            'heading' => 2,
                                            'lineup' => 'start',
                                            'shadow' => 'yes',
                                            'weight' => 'bolder',
                                        ]),
                                    '</div>',
                                '</div>',
                            '</div>',
                        ]);
                    }, $is_proper['content'], array_keys ($is_proper['content'])),
                '</article>',
            ] : [
            ],
        ];
    };

    function getGalleryInner (array $is_input = []): array {
        $is_proper = [
            ...setProper ($is_input, 'content'),
            ...setProper ($is_input, 'height', 30),
        ];
        return [
            ...isArray ($is_proper['content']) ? [
                '<div', ...setClass ([ 'carousel-inner', 'h-100', 'w-100' ]), '>',
                    ...array_map (function ($is_index, $is_key) use ($is_proper) {
                        return implode ('', [
                            '<div',
                                ...setAttrib (5000, 'data-bs-interval'),
                                ...setClass ([ ...!$is_key ? [ 'active' ] : [], 'carousel-item', 'h-100', 'w-100' ]),
                                ...setStyle ([ 'min-height' => $is_proper['height'] . 'rem', ...getStyle ('background-image', $is_index) ]),
                            '>',
                            '</div>',
                        ]);
                    }, $is_proper['content'], array_keys ($is_proper['content'])),
                '</div>',
            ] : [
            ],
        ];
    };

    function GetOrdered ($is_input = [], $is_number = 0) {
        $is_proper = getHeadlineProper ($is_input);
        return isArray ($is_proper['content']) ? [
            '<ul',
                ...setClass ([
                    'bg-transparent',
                    'd-flex',
                    'flex-column',
                    'justify-content-center',
                    'list-unstyled',
                    'm-0',
                    'p-0',
                    ...in_array ($is_proper['lineup'], [ 'start' ]) ? [ 'justify-content-lg-start', ...$is_number > 0 ? [ 'ps-lg-3' ] : [] ] : [],
                    ...in_array ($is_proper['lineup'], [ 'end' ]) ? [ 'justify-content-lg-end', ...$is_number > 0 ? [ 'pe-lg-3' ] : [] ] : [],
                    ...in_array ($is_proper['bullet'], [ 'yes' ]) ? [
                        ...sizeof ($is_proper['content']) > 1 ? [
                            'border',
                            'border-0',
                            'list-group',
                            'list-group-numbered',
                            'list-group-flush',
                        ] : [
                        ],
                    ] : [
                    ],
                ]),
            '>',
                ...array_map (function ($is_index, $is_key) use ($is_proper, $is_number) {
                    $is_number++;
                    return implode ('', isString ($is_index) ? [
                        '<li',
                            ...setClass ([
                                ...in_array ($is_proper['lineup'], [ 'start' ]) ? [ 'text-lg-start' ] : [],
                                ...in_array ($is_proper['lineup'], [ 'end' ]) ? [ 'text-lg-end' ] : [],
                                ...in_array ($is_proper['bullet'], [ 'yes' ]) ? [ 'list-group-item', 'px-0', 'py-2' ] : [ 'p-0' ],
                                ...setSubstring (defineTextSolid, $is_proper['color']),
                                'bg-transparent',
                                'd-inline',
                                'lh-1',
                                'm-0',
                                'text-center',
                            ]),
                            ...in_array ($is_proper['shadow'], [ 'yes' ]) ? setStyle (getStyle ('text-shadow')) : [],
                        '>',
                            ...in_array ($is_proper['bullet'], [ 'yes' ]) ? sizeof ($is_proper['content']) < 2 ? [ 'PARÁGRAFO ÚNICO: ' ] : [] : [],
                            isURL ($is_index) ? setHyperlink ($is_index) : setHighlighted ($is_index),
                            ...GetOrdered ([
                                ...getHeadlineProper ($is_proper, 'content'),
                                'content' => $is_proper['content'][$is_key + 1 < sizeof ($is_proper['content']) ? $is_key + 1 : $is_key],
                            ], $is_number),
                        '</li>',
                    ] : [
                    ]);
                }, $is_proper['content'], array_keys ($is_proper['content'])),
            '</ul>',
        ] : [
        ];
    };

    function getHeadlineTitle ($is_input = []) {
        return isKeyTrue ($is_input['content'], 'title') ? [
            ...array_map (function ($is_index) use ($is_input) {
                $is_head = in_array ($is_input['heading'], range (1, 6)) ? 'h' . $is_input['heading'] : 'p';
                return implode ('', [
                    '<', $is_head,
                        ...setClass ([
                            ...in_array ($is_input['lineup'], [ 'end' ]) ? [ 'text-lg-end' ] : [],
                            ...in_array ($is_input['lineup'], [ 'start' ]) ? [ 'text-lg-start' ] : [],
                            ...setSubstring (defineFontWeight, $is_input['weight']),
                            ...setSubstring (defineTextSolid, $is_input['color']),
                            $is_head === 'p' ? getClass ('text') : getClass ($is_head),                            
                            'title',
                        ]),
                        ...setStyle (in_array ($is_input['shadow'], [ 'yes' ]) ? getStyle ('text-shadow') : []),
                    '>',
                        setCamelcase ($is_index),
                    '</', $is_head, '>'
                ]);
            }, setArray ($is_input['content']['title'])),
        ] : [
        ];
    };

    function setSubstring (array $is_array = [], array|string $is_input = ''): array {
        if (in_array ($is_input, [ 'white' ])) $is_input = 'light';
        if (in_array ($is_input, [ 'black' ])) $is_input = 'dark';
        if (isArray ($is_array))
            if (isString ($is_input))
                foreach ($is_array as $is_index)
                    if (str_contains ($is_index, trim ($is_input)))
                        return [ $is_index ];
        return [];
    };

    function getHeadlineSubtitle (array $is_input = []): array {
        return [
            ...isKeyTrue ($is_input, 'content') ? [
                ...isKeyTrue ($is_input['content'], 'subtitle') ? [
                    ...array_map (function ($is_index) use ($is_input) {
                        return implode ('', [
                            '<p',
                                ...setClass ([
                                    ...setSubstring (defineFontWeight, $is_input['weight']),
                                    ...setSubstring (defineTextSolid, $is_input['color']),
                                    getClass ('text'),
                                    'subtitle',
                                ]),
                                ...setStyle (in_array ($is_input['shadow'], [ 'yes' ]) ? getStyle ('text-shadow') : []),
                            '>',
                                setHighlighted ($is_index),
                            '</p>',
                        ]);
                    }, setArray ($is_input['content']['subtitle'])),
                ] : [
                ],
            ] : [
            ],
        ];
    };

    function getHeadlineDescription (array $is_input = []): array {
        return [
            ...isKeyTrue ($is_input, 'content') ? [
                ...isKeyTrue ($is_input['content'], 'description') ? [
                    ...GetOrdered ([
                        ...getHeadlineProper ($is_input, 'content'),
                        'content' => $is_input['content']['description'],
                    ]),
                ] : [
                ],
            ] : [
            ],
        ];
    };

    function getHeadlineProper (array $is_input = [], string $is_excluded = ''): array {
        $is_attrib = [];
        foreach ([ 'background', 'bullet', 'color', 'content', 'heading', 'lineup', 'padding', 'shadow', 'weight' ] as $is_index):
            if (!in_array ($is_index, setArray ($is_excluded))):
                $is_attrib = array_merge ($is_attrib, setProper ($is_input, $is_index));
            endif;
        endforeach;
        return $is_attrib;
    };

    function getHeadlineHeader (array $is_input = []): array {
        return [
            ...isArray ($is_input) ? [
                '<header',
                    ...setClass ([ 'px-5', getClass ('gap01'), getClass ('wrapSetCol') ]), 
                    ...setStyle ([ 'width' => 'fit-content' ]),
                '>',
                    ...$is_input,
                '</header>',
            ] : [
            ],
        ];
    };

    function getHeadlineTemplate (array $is_input = []): array {
        $is_proper = getHeadlineProper ($is_input);
        $is_subtitle = isKeyTrue ($is_proper['content'], 'subtitle');
        $is_description = isKeyTrue ($is_proper['content'], 'description');
        $is_content = [
            ...isTrue ($is_description) ? [ '<div', ...setClass (getClass ('wrapSetCol')), '>' ] : [],
                ...getHeadlineTitle ($is_proper),
                ...getHeadlineSubtitle ($is_proper),
            ...isTrue ($is_description) ? [ '</div>' ] : [],
            ...getHeadlineDescription ($is_proper),
        ];
        return getHeadlineHeader ($is_content);
    };

    function getAccordionHeadlineTemplate (array $is_input = []): array {
        $is_proper = getHeadlineProper ($is_input);
        $is_subtitle = isKeyTrue ($is_proper['content'], 'subtitle');
        $is_description = isKeyTrue ($is_proper['content'], 'description');
        $is_content = [
            ...isTrue ($is_description) ? [ '<div', ...setClass (getClass ('wrapSetCol')), '>' ] : [],
                ...isTrue ($is_subtitle) || isTrue ($is_description) ? getHeadlineTitle ($is_proper) : [],
                ...getHeadlineSubtitle ($is_proper),
            ...isTrue ($is_description) ? [ '</div>' ] : [],
            ...getHeadlineDescription ($is_proper),
        ];
        return getHeadlineHeader ($is_content);
    };

    function GetOption ($is_input = []) {
        return [
            '<option disabled selected value=\'\'></option>',
            ...is_array ($is_input) ? array_map (function ($is_index) {
                return implode ('', [ '<option', ...setAttrib ($is_index, 'value'), '>', setCamelcase ($is_index), '</option>' ]);
            }, $is_input) : array_map (function ($is_index) {
                return implode ('', [
                    ...is_string ($is_index) ? [ '<option', ...setAttrib ($is_index, 'value'), '>', setCamelcase ($is_index), '</option>' ] : [],
                    ...is_array ($is_index) ? [
                        '<optgroup', ...setAttrib ($is_index[0], 'label'), '>',
                            ...array_map (function ($is_index, $is_key) {
                                if ($is_key)
                                    return implode ('', [ '<option', ...setAttrib ($is_index, 'value'), '>', setCamelcase ($is_index), '</option>' ]);
                            }, $is_index, array_keys ($is_index)),
                        '</optgroup>',
                    ] : [
                    ],
                ]);
            }, $is_input),
        ];
    };

    function getAccordionBody (array $is_input = []): array {
        return [
            ...isArray ($is_input) ? [
                '<div',
                    ...setClass ([
                        getClass ('gap03'),
                        getClass ('wrapSetCol'),
                        getClass ('wrapColorLight'),
                        'accordion-body',
                        'm-0',
                        'p-3',
                    ]),
                '>',
                    ...$is_input,
                '</div>',
            ] : [
            ],
        ];
    };

    function getHeadlineContainer ($is_input = [], float $is_heading = 4): array {
        return [
            ...isArray (getHeadlineTemplate ([ 'content' => $is_input ])) ? [
                '<div', ...setClass ([ 'px-3', 'px-lg-5', getClass ('wrapSetCol') ]), '>',
                    ...getHeadlineTemplate ([ 'content' => $is_input, 'heading' => $is_heading ]),
                '</div>',
            ] : [
            ],
        ];
    };

    function getModalArticleTemplate (array $is_input = []): string {
        return implode ('', [
            ...isArray ($is_input) ? [
                ...getHeadlineContainer ($is_input, 4),
                ...isKeyTrue ($is_input, 'container') ? [
                    '<section', ...setClass ([ 'wrapper', getClass ('wrapSetCol') ]), '>',
                        ...array_map (function ($is_index, $is_key) {
                            $is_number = getArrayRandomIndex (range (0, sizeof (defineSmallCollection) - 1));
                            $is_gallery = [
                                ...isArray (isKeyTrue ($is_index, 'gallery') ? hasValidPath ($is_index['gallery']) : []) ? [
                                    '<div',
                                        ...setClass ([ 'gallery', getClass ('col06') ]),
                                        ...setStyle ([ 'height' => 'auto', 'min-height' => '30rem' ]),
                                    '>',
                                        ...getGalleryContainer ($is_index),
                                    '</div>',
                                ] : [
                                ],
                            ];
                            $is_content = [
                                ...isArray (getHeadlineTemplate ([ 'content' => $is_index ])) ? [
                                    '<div',
                                        ...setClass ([
                                            ...isArray ($is_gallery) ? [
                                                ...!($is_key % 2) ? [ 'align-items-lg-end', 'order-lg-first' ] : [ 'align-items-lg-start' ],
                                                'col-lg-6',
                                            ] : [
                                            ],
                                            defineBackgroundSubtle[$is_number],
                                            defineBorderSubtle[$is_number],
                                            defineTextEmphasis[$is_number],
                                            'headline',
                                            'border-1',
                                            'border',
                                            'col-12',
                                            'd-flex',
                                            'flex-column',
                                            'justify-content-center',
                                            'm-0',
                                            'p-5',
                                        ]),
                                        ...setStyle ([
                                            ...isArray ($is_gallery) ? [ 'min-height' => '30rem' ] : [],
                                            'height' => 'auto',
                                        ]),
                                    '>',
                                        ...getHeadlineTemplate ([                                                    
                                            'content' => $is_index,
                                            'heading' => 3,
                                            ...isArray ($is_gallery) ? [ 'lineup' => !($is_key % 2) ? 'end' : 'start' ] : [],
                                        ]),
                                    '</div>',
                                ] : [
                                ],
                            ];
                            if (isArray ([ ...$is_gallery, ...$is_content ])):
                                return implode ('', [
                                    '<article', ...setClass ([ 'wrap', getClass ('wrapSetRow') ]), '>',
                                        ...$is_gallery,
                                        ...$is_content,
                                    '</article>',
                                ]);
                            endif;
                        }, $is_input['container'], array_keys ($is_input['container'])),
                    '</section>',
                ] : [
                ],
            ] : [
            ],
        ]);
    };

    function getModalCardTemplate (array $is_input = []): string {
        return implode ('', [
            ...getHeadlineContainer ($is_input, 4),
            ...isKeyTrue ($is_input, 'container') ? [
                '<section', ...setClass ([ 'card-container', getClass ('gap03'), getClass ('wrapSetCol') ]), '>',
                    ...array_map (function ($is_index) {
                        $is_gallery = [
                            ...isArray (isKeyTrue ($is_index, 'gallery') ? hasValidPath ($is_index['gallery']) : []) ? [
                                ...getGalleryContainer ($is_index),
                            ] : [
                            ],
                        ];
                        $is_content = [
                            ...getHeadlineTemplate ([ 'content' => $is_index, 'heading' => 5 ]),
                            ...getDisplayTemplate (setProper ($is_index, [ 'discount', 'url', 'value' ])),
                        ];
                        $is_content = [
                            ...isArray ($is_content) ? [
                                '<div', ...setClass ([ 'align-items-center', 'card-content', 'p-3', getClass ('gap02'), getClass ('wrapSetCol') ]), '>',
                                    ...$is_content,
                                '</div>',
                            ] : [
                            ],
                        ];
                        if (isArray ([ ...$is_gallery, ...$is_content ])):
                            return implode ('', [
                                '<article', ...setClass ([ 'card-wrapper', 'overflow-hidden', 'p-0', getClass ('wrapSetCol'), getClass ('wrapColorLight') ]), '>',
                                    ...$is_gallery,
                                    ...$is_content,
                                '</article>',
                            ]);
                        endif;
                    }, $is_input['container']),
                '</section>',
            ] : [
            ],
        ]);        
    };

    
    
    function getCollapse (string $is_input = ''): array {
        return [
            ...isString ($is_input) ? [
                ...setAttrib ($is_input, 'aria-controls'),
                ...setAttrib ('false', 'aria-expanded'),
                ...setAttrib ('Toggle navigation', 'aria-label'),
                ...setAttrib ([ '#', $is_input ], 'data-bs-target'),
                ...setAttrib ('collapse', 'data-bs-toggle'),
                ...setAttrib ('button', 'type'),
            ] : [
            ],
        ];
    };

    function isFileType (string $is_input = '', string $is_extension = 'json'): bool {
        if (isKeyTrue (pathinfo ($is_input), 'extension'))
            if (pathinfo ($is_input)['extension'] === $is_extension )
                return true;
        return false;
    };

    function setObject2Array (array|object $is_input = []): array {
        $is_result = [];
        foreach ($is_input as $is_key => $is_value):
            if (is_object ($is_value)): $is_result[$is_key] = setObject2Array (get_object_vars ($is_value));
            elseif (is_array ($is_value)): $is_result[$is_key] = setObject2Array ($is_value);
            else: $is_result[$is_key] = $is_value; endif;
        endforeach;
        return $is_result;
    };

    function setResizePicture (string $is_input = '', string $is_extension = 'jpg'): bool|string {
        $is_dir = implode ('/', [ '.', 'temp' ]);
        if (!is_dir ($is_dir))
            mkdir ($is_dir, 0777, true);
        if (isFileType ($is_input, $is_extension)):
            $is_from = getRootAddress () . implode ('/', [ pathinfo ($is_input)['extension'], pathinfo ($is_input)['basename'] ]);
            $is_to = getRootAddress () . implode ('/', [ 'temp', pathinfo ($is_input)['basename'] ]);
            if (!file_exists ($is_to))
                imagewebp (imagecreatefromjpeg ($is_from), $is_to, 10);
            return str_replace (getRootAddress (), './', $is_to);
        endif;
        return false;
    };

    function getServerAddress (string $is_input = 'DOCUMENT_ROOT'): string {
        $is_server = $_SERVER[$is_input] . $_SERVER['REQUEST_URI'];
        return isKeyTrue (pathinfo ($is_server), 'extension') ? implode ('/', array_slice (explode ('/', $is_server)), 0, - 1) . '/' : $is_server;
    };

    

    function setJson2Array (string $is_input = ''): array {
        $is_input = getFileContent ($is_input, 'json');
        return isString ($is_input) ? setObject2Array (json_decode ($is_input)) : [];
    };

    function getJsonArray (string $is_input = ''): array {
        return array_values (array_filter (setJson2Array ($is_input), function ($is_index) {
            if (isFileExist ($is_index, 'json'))
                return $is_index;
        }));
    };

    function isArrayLikeJson (array $is_array = [], string $is_filename = ''): bool {
        if (isArray ($is_array))
            return json_decode (getFileContent ($is_filename)) === json_encode ($is_array);
        return false;
    };

    function setPath (string $is_input = ''): string {
        return isKeyTrue (pathinfo ($is_input), 'extension') ? implode ('/', [ setDir (pathinfo ($is_input)['extension']), pathinfo ($is_input)['basename'] ]) : '';
    };

    function getModalContratoContainer (string $is_input = ''): array {
        return getModalAccordionContentTemplate ($is_input, 'getModalContratoContent');
    };

    function getModalCatalogoContainer (string $is_input = ''): array {
        return getModalAccordionContentTemplate ($is_input, 'getModalCatalogoContent');
    };

    function getModalInstitutionalContainer (string $is_input = ''): array {
        return getModalAccordionContentTemplate ($is_input, 'getModalInstitutionalContent');
    };

    function getModalContratoContent (array $is_input = []): array {
        return [
            ...isArray ($is_input) ? [
                ...getAccordionHeadlineTemplate ([
                    'bullet' => 'yes',
                    'content' => $is_input,
                    'heading' => 5,
                    'lineup' => 'start',
                ]),
            ] : [
            ]
        ];
    };

    function getModalCatalogoContent (array $is_input = []): array {
        return [
            ...isArray ($is_input) ? [
                ...getGalleryContainer ($is_input, 15),
                ...getAccordionHeadlineTemplate ([
                    'bullet' => 'yes',
                    'content' => $is_input,
                    'heading' => 5,
                    'lineup' => 'start',
                ]),
            ] : [
            ]
        ];
    };

    function getModalInstitutionalContent (array $is_input = []): array {
        return [
            ...isArray ($is_input) ? [
                ...getAccordionHeadlineTemplate ([
                    'content' => $is_input,
                    'heading' => 5,
                    'lineup' => 'start',
                ]),
            ] : [
            ]
        ];
    };

    function getModalAccordionTemplate (array $is_input = []): string {
        $is_master = setRandomPassword ();
        return implode ('', [
            '<article', ...setAttrib ($is_master, 'id'), ...setClass ([ 'accordion', getClass ('col12'), getClass ('gap03') ]), '>',
                ...getHeadlineContainer ($is_input, 4),
                ...isKeyTrue ($is_input, 'container') ? [
                    '<section', ...setClass (getClass ('wrapSetCol')), '>',
                        ...array_map (function ($is_index) use ($is_master) {
                            $is_slave = setRandomPassword ();
                            $is_title = [
                                ...isKeyTrue ($is_index, 'title') ? [
                                    '<h2', ...setClass ([ 'accordion-header', 'm-0', 'p-0' ]), '>',
                                        '<button', ...setClass ([ 'accordion-button', 'collapsed' ]), ...getCollapse ($is_slave), '>',
                                            setCamelcase ($is_index['title']),
                                        '</button>',
                                    '</h2>',
                                ] : [
                                ],
                            ];
                            $is_content = [
                                ...isArray (getHeadlineTemplate ([ 'content' => $is_index ])) ? [
                                    '<div',
                                        ...setAttrib ($is_slave, 'id'),
                                        ...setAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                        ...setClass ([ 'accordion-collapse', 'collapse' ]),
                                    '>',
                                        ...getAccordionBody (getHeadlineTemplate ([ 'content' => $is_index, 'heading' => 5, 'lineup' => 'start' ])),
                                    '</div>',
                                ] : [
                                ],
                            ];
                            if (isArray ([ ...$is_title, ...$is_content ])):
                                return implode ('', [
                                    '<article', ...setClass ([ 'accordion-item', 'w-100' ]), '>',
                                        ...$is_title,
                                        ...$is_content,
                                    '</article>',
                                ]);
                            endif;
                        }, $is_input['container']),
                    '</section>',
                ] : [
                ],
            '</article>',
        ]);
    };

    function getModalAccordionContentTemplate (string $is_input = '', string $is_function = ''): array {
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                '<main', ...setClass ([ 'm-0', 'p-0', getClass ('gap05'), getClass ('wrapSetCol') ]), '>',
                    ...array_map (function ($is_index) use ($is_function) {
                        return implode ('', [
                            ...getHeadlineTemplate ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                            ...isKeyTrue ($is_index, 'container') ? [
                                '<section', ...setClass ([ 'm-0', 'p-0', getClass ('gap05'), getClass ('wrapSetCol') ]), '>',
                                    ...array_map (function ($is_index) use ($is_function) {
                                        $is_master = setRandomPassword ();
                                        return implode ('', getFilledKeys ($is_index) ? [
                                            '<article', ...setClass ([ 'm-0', 'p-0', getClass ('gap03'), getClass ('wrapSetCol') ]), '>',
                                                ...getHeadlineTemplate ([ 'content' => $is_index, 'heading' => 4, 'lineup' => 'start' ]),
                                                ...isKeyTrue ($is_index, 'container') ? [
                                                    '<section', ...setAttrib ($is_master, 'id'), ...setClass ([ 'accordion' ]), '>',
                                                        ...array_map (function ($is_index) use ($is_function, $is_master) {
                                                            $is_slave = setRandomPassword ();
                                                            $is_title = [
                                                                ...isKeyTrue ($is_index, 'title') ? [
                                                                    '<h2', ...setClass ([ 'accordion-header' ]), '>',
                                                                        '<button',
                                                                            ...setClass ([
                                                                                ...!($is_function) ($is_index) ? [ getClass ('textSetDisabled') ] : [],
                                                                                'accordion-button',
                                                                                'collapsed',
                                                                            ]),
                                                                            ...getCollapse ($is_slave),
                                                                        '>',
                                                                            setCamelcase ($is_index['title']),
                                                                        '</button>',
                                                                    '</h2>',
                                                                ] : [
                                                                ],
                                                            ];
                                                            $is_content = [
                                                                ...isArray (($is_function) ($is_index)) ? [
                                                                    '<div',
                                                                        ...setAttrib ($is_slave, 'id'),
                                                                        ...setAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                                                        ...setClass ([ 'accordion-collapse', 'collapse' ]),
                                                                    '>',
                                                                        ...getAccordionBody (($is_function) ($is_index)),
                                                                    '</div>',
                                                                ] : [
                                                                ],
                                                            ];
                                                            if (isArray ([ ...$is_title, ...$is_content ])):
                                                                return implode ('', [
                                                                    '<article', ...setClass ([ 'accordion-item', 'w-100' ]), '>',
                                                                        ...$is_title,
                                                                        ...$is_content,
                                                                    '</article>',
                                                                ]);
                                                            endif;
                                                        }, $is_index['container']),
                                                    '</section>',
                                                ] : [
                                                ],
                                            '</article>',
                                        ] : [
                                        ]);
                                    }, $is_index['container']),
                                '</section>',
                            ] : [
                            ],
                        ]);
                    }, $is_input),
                '</main>',
            ] : [
            ],
        ];
    };

    function getModalThumbnailContainer (string $is_input = 'jpg'): array {
        $is_input = getPathArray ([ 'dir' => $is_input ]);
        return [
            ...isArray (setArray ($is_input)) ? [
                '<article', ...setClass ([ 'd-flex', 'flex-wrap', 'justify-content-center', 'mt-3', 'thumbnail-inner' ]), '>',
                    ...array_map (function ($is_index) {
                        $is_index = setResizePicture ($is_index);
                        return implode ('', [
                            '<div',
                                ...setClass ([ 'col-12', 'col-lg-3', 'col-sm-6', 'overflow-hidden', 'position-relative', 'thumbnail-item' ]),
                                ...setStyle ([ 'min-height' => '20rem' ]),
                            '>',
                                '<div',
                                    ...setClass ([ 'bg-black', 'h-100', 'position-absolute', 'thumbnail-filter', 'w-100' ]),
                                    ...setStyle ([ 'inset' => 0, 'min-height' => '20rem', 'opacity' => 0, 'z-index' => 2 ]),
                                '>',
                                '</div>',
                                '<div',
                                    ...setAttribPicture ($is_index),
                                    ...setClass ([ 'h-100', 'position-absolute', 'thumbnail-background', 'w-100' ]),
                                    ...setStyle ([
                                        ...defineBackground,
                                        'background-image' => 'url(' . $is_index . ')',
                                        'inset' => 0,
                                        'min-height' => '20rem',
                                        'z-index' => 1,
                                    ]),
                                '>',
                                '</div>',
                            '</div>',
                        ]);
                    }, setArray ($is_input)),
                '</article>',
            ] : [
            ],
        ];
    };

    define ('defineDarkCollection', [ 'black', 'primary', 'secondary', 'success', 'danger', 'dark' ]);
    define ('defineDirection', [ 'col', 'row' ]);
    define ('defineFontWeight', [ 'fw-bold', 'fw-bolder', 'fw-semibold', 'fw-medium', 'fw-normal', 'fw-light', 'fw-lighter' ]);
    define ('defineLightCollection', [ 'warning', 'info', 'light', 'white' ]);

    define ('defineFullCollection', [ ...defineLightCollection, ...defineDarkCollection ]);
    define ('defineSmallCollection', array_values (array_filter (array_map (function ($i) { if (!in_array ($i, [ 'black', 'white' ])) return $i; }, defineFullCollection))));

    define ('defineBackgroundSubtle', array_map (function ($i) { return implode ('-', [ 'bg', $i, 'subtle' ]); }, defineSmallCollection));
    define ('defineBorderSubtle', array_map (function ($i) { return implode ('-', [ 'border', $i, 'subtle' ]); }, defineSmallCollection));
    define ('defineButtonLine', array_map (function ($i) { return implode ('-', [ 'btn', $i, 'outline' ]); }, defineFullCollection));
    define ('defineButtonSolid', array_map (function ($i) { return implode ('-', [ 'btn', $i ]); }, defineFullCollection));
    define ('defineLinkSolid', array_map (function ($i) { return implode ('-', [ 'link', $i ]); }, defineFullCollection));
    define ('defineTextEmphasis', array_map (function ($i) { return implode ('-', [ 'text', $i, 'emphasis' ]); }, defineSmallCollection));
    define ('defineTextSolid', array_map (function ($i) { return implode ('-', [ 'text', $i ]); }, defineFullCollection));

    function getBootstrap (): array {
        return [
            setTarget ([ 'html' ]) => [ 'h-100', 'm-0', 'p-0', 'w-100' ],
            setTarget ([ 'html', 'body' ]) => [ 'h-100', 'm-0', 'p-0', 'w-100' ],
            setTarget ([ 'html', 'frame' ]) => [ 'm-0', 'p-0', 'w-100' ],
            setTarget ([ 'html', 'hr' ]) => [ 'mx-0', 'my-2', 'p-0', 'w-100' ],
            setTarget ([ 'html', 'input' ]) => [ 'form-control', 'pe-5', 'ps-2', 'py-2' ],
            setTarget ([ 'html', 'label' ]) => [ 'align-items-end', 'd-flex', 'justify-content-start', 'label', 'text-start', 'm-0', 'p-0' ],
            setTarget ([ 'html', 'table' ]) => [ 'table', 'table-striped', 'table-hover', 'm-0', 'p-0', 'row', 'w-100' ],
            setTarget ([ 'html', 'table', 'body' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
            setTarget ([ 'html', 'table', 'head' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
            setTarget ([ 'html', 'table', 'td' ]) => [ 'm-0', 'p-2', 'row', 'w-100' ],
            setTarget ([ 'html', 'table', 'th' ]) => [ 'm-0', 'p-2', 'row', 'w-100' ],
            setTarget ([ 'html', 'table', 'tr' ]) => [ 'm-0', 'p-0', 'row', 'w-100' ],
        ];
    };

    define ('defineBorder', [ 'border', 'border-1' ]);
    define ('defineButton', [ 'btn', 'button', 'cursor-pointer', 'm-0', 'p-2' ]);
    define ('defineText', [ 'd-inline', 'lh-1', 'm-0', 'p-0', 'text-center' ]);
    define ('defineLink', [ 'fw-medium', 'text-decoration-none', 'link-opacity-50-hover', 'nav-link', ...defineText ]);
    define ('defineWrap', [ 'd-flex', 'justify-content-center', 'm-0', 'w-100' ]);

    function getPool (): array {
        $is_array = [];
        foreach (defineFullCollection as $is_key => $is_value):
            $is_array = array_merge ($is_array, [ setTarget ([ 'button', $is_value ]) => [ ...defineButton, defineButtonSolid[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ setTarget ([ 'line', 'button', $is_value ]) => [ ...defineButton, defineButtonLine[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ setTarget ([ 'link', $is_value ]) => [ ...defineLink, defineLinkSolid[$is_key] ] ]);
        endforeach;
        foreach (defineDirection as $is_index):
            $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', $is_index ]) => [
                    ...defineWrap,
                    ...in_array ($is_index, [ 'col' ]) ? [ 'flex-column' ] : [],
                    ...in_array ($is_index, [ 'row' ]) ? [ 'flex-row', 'flex-wrap' ] : [],
                ],
            ]);
        endforeach;
        foreach (defineSmallCollection as $is_key => $is_value):
            $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'color', $is_value ]) => [
                    ...defineBorder,
                    ...defineText,
                    defineBackgroundSubtle[$is_key],
                    defineBorderSubtle[$is_key],
                    defineTextEmphasis[$is_key],
                ],
            ]);
            $is_array = array_merge ($is_array, [ setTarget ([ 'text', 'color', $is_value ]) => [
                    ...defineText,
                    defineTextEmphasis[$is_key],
                ],
            ]);
            foreach (range (1, 6) as $is_index):
                $is_array = array_merge ($is_array, [
                    setTarget ([ 'h' . $is_index, $is_value ]) => [
                        ...defineText,
                        defineTextEmphasis[$is_key],
                        'h' . $is_index,
                    ],
                ]);
            endforeach;
        endforeach;
        $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', 'alert' ]) => [
                'd-flex',
                'flex-column',
                'justify-content-center',
                'm-0',
                'p-2',
                'rounded-2',
                'shadow-sm',
            ],
        ]);
        $is_array = array_merge ($is_array, [ setTarget ([ 'text' ]) => defineText ]);
        $is_array = array_merge ($is_array, [ setTarget ([ 'link' ]) => defineLink ]);
        foreach (range (1, 6) as $is_index):
            $is_array = array_merge ($is_array, [
                setTarget ([ 'h' . $is_index ]) => [
                    ...defineText,
                    'h' . $is_index
                ],
            ]);
        endforeach;
        foreach (range (1, 12) as $is_index):
            $is_array = array_merge ($is_array, [ setTarget ([ 'col', str_pad ($is_index, 2, '0', STR_PAD_LEFT) ]) => [
                    'col-12',
                    'col-lg-' . $is_index,
                    'd-flex',
                    'justify-content-center',
                    'm-0'
                ],
            ]);
        endforeach;
        $is_anyone = [ 'd-flex', 'flex-nowrap', 'justify-content-center', 'm-0', 'p-0' ];
        $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', 'button' ]) => [ 'btn-group', ...$is_anyone ] ]);
        $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', 'input' ]) => [ 'input-group', ...$is_anyone ] ]);
        $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', 'toolbar' ]) => [ 'btn-toolbar', ...$is_anyone ] ]);
        foreach (range (0, 5) as $is_index):
            $is_array = array_merge ($is_array, [ setTarget ([ 'gap', str_pad ($is_index, 2, '0', STR_PAD_LEFT) ]) => [
                    'grid', 'gap-' . $is_index,
                ],
            ]);
        endforeach;
        foreach (getBootstrap () as $is_key => $is_value):
            $is_array = array_merge ($is_array, [ $is_key => $is_value ]);
        endforeach;
        $is_array = [
            ...$is_array,
            setTarget ([ 'text', 'set', 'disabled' ]) => [ 'text-decoration-line-through' ],
            setTarget ([ 'text', 'set', 'mono' ]) => [ ...defineText, 'font-monospace', 'fw-semibold' ],
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

    function getJsonCreator (array $is_array = [], string $is_filename = '') {
        if (isFileType ($is_filename, 'json')):
            if (isPathExist ($is_filename)):
                if (!isArrayLikeJson ($is_array, $is_filename)):
                    setArray2Json ($is_array, $is_filename);
                endif;
            else:
                setArray2Json ($is_array, $is_filename);
            endif;
        endif;
    };

    getJsonCreator (getPool (), 'pool.json');

    define ('POOL', setJson2Array ('pool.json'));

    function getClass (string $is_input = ''): string {
        if (isKeyTrue (POOL, $is_input)):
            $is_array = POOL[$is_input];
            sort ($is_array);
            return implode (' ', $is_array);
        endif;
        return '';
    };

    function setClass (array|string $is_input = []): array {
        if (isArray (setArray ($is_input))):
            $is_input = implode (' ', setArray ($is_input));
            $is_input = array_values (array_unique (explode (' ', $is_input)));
            sort ($is_input);
            return setAttrib ($is_input, 'class');
        endif;
        return [];
    };

    function getStyle (string $is_key = '', $is_input = []): array {
        $is_result = [
            'text-shadow' => [ 'text-shadow' => '0 1.5px 3px rgba(0, 0, 0, .75)' ],
            'background-image' => hasValidPath ($is_input) ? [
                'background-image' => 'url(' . getArrayRandomIndex (hasValidPath ($is_input)) . ')',
                ...defineBackground,
            ] : [
            ],
        ];
        if (isKeyTrue ($is_result, $is_key))
            return $is_result[$is_key];
        return [];
    };

    function setStyle (array $is_input = []): array {
        if (!array_is_list ($is_input))
            return setAttrib (implode (' ', array_map (function ($is_index) use ($is_input) {
                return implode ('', [ $is_index, ': ', $is_input[$is_index], ';' ]);
            }, array_keys ($is_input))), 'style');
        return [];
    };

    define ('defineBodyContent', [
        ...setWrapper (setNavbarContainer (), [ 'wrap' => 'nav' ]),
        ...setWrapper ([
            ...setWrapper ([
                ...setWrapper (getHeaderContainer ('headline'), [ 'wrap' => 'header' ]),
                ...setWrapper (getCarouselContainer ('carrossel')),
                ...setWrapper ([
                    '<div', ...setClass ([ 'd-flex', 'flex-wrap' ]), '>',
                        '<div', ...setClass ([ 'col-0', 'col-lg-2', 'd-lg-flex', 'd-none' ]), '>', '</div>',
                        '<div', ...setClass ([ 'col-12', 'col-lg-8', 'd-flex', 'flex-column', 'px-3', 'px-lg-0' ]), '>',
                            ...getModalFormularioContainer ('booking'),
                            ...getModalCardContainer ('cartoes'),
                        '</div>',
                        '<div', ...setClass ([ 'col-0', 'col-lg-2', 'd-lg-flex', 'd-none' ]), '>', '</div>',
                    '</div>',
                ]),
                ...setWrapper (getModalThumbnailContainer (), [
                    'id' => 'thumbnail',
                ]),
                ...setWrapper (getModalArticleContainer ('pontos turísticos')),
            ], [ 'wrap' => 'main' ]),
            ...setWrapper ([
                ...setWrapper (getWidgetContainer ()),
                ...setWrapper (getSignatureContainer ()),
            ], [ 'wrap' => 'footer' ]),
        ], [ 'id' => 'wrapper' ]),
    ]);

    function setMetaWrapper (array $is_input = []): array {
        return [
            ...isArray (setArray ($is_input)) ? [ '<meta', ...setArray ($is_input), '>' ] : [],
        ];
    };

    function setMetaDescription (string $is_input = 'headline.json'): array {
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                ...array_map (function ($is_index) use ($is_input) {
                    if (isKeyTrue ($is_input, $is_index)):
                        $is_name = [ 
                            ...in_array ($is_index, [ 'title' ]) ? [ 'author' ] : [],
                            ...in_array ($is_index, [ 'subtitle' ]) ? [ 'description' ] : [],
                        ];
                        return implode ('', setMetaWrapper ([ ...setAttrib ($is_name, 'name'), ...setAttrib ($is_input[$is_index], 'content') ]));
                    endif;
                }, [ 'title', 'subtitle' ]),
            ] : [
            ],
        ];
    };

    function setMetaKeyword (string $is_input = 'keyword.json'): array {
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                ...setMetaWrapper ([ ...setAttrib ('keywords', 'name'), ...setAttrib (implode (', ', $is_input), 'content') ])
            ] : [
            ],
        ];
    };

    function setMetaViewport (): array {
        $is_input = [ 'width=device-width', 'initial-scale=1', 'shrink-to-fit=no' ];
        return setMetaWrapper ([ ...setAttrib ('viewport', 'name'), ...setAttrib (implode (', ', $is_input), 'content') ]);
    };

    function setMetaArray (): array {
        return [
            ...setMetaWrapper (setAttrib ('utf-8', 'charset')),
            ...setMetaViewport (),
            ...setMetaDescription (),
            ...setMetaKeyword (),
        ];
    };

    function setTitleContainer (string $is_input = 'headline.json'): array {
        $is_input = setJson2Array ($is_input);
        return [
            ...isArray ($is_input) ? [
                '<title>',
                    implode (' | ', array_map (function ($is_index) use ($is_input) {
                        if (isKeyTrue ($is_input, $is_index))
                            return setCamelcase ($is_input[$is_index]);
                    }, [ 'title', 'subtitle', 'description' ])),
                '</title>',
            ] : [
            ],
        ];
    };

    function setHeadContainer (): array {
        return setWrapper ([ ...setMetaArray (), ...setTitleContainer (), ...setStyleArray () ], [
            'wrap' => 'head',
        ]);
    };

    function setBodyContainer (): array {
        return setWrapper ([
            ...defineBodyContent,
            ...getModalArray (),
            ...setScriptArray (),
        ], [
            'wrap' => 'body',
        ]);
    };

    function setHTMLContainer (): array {
        return [
            '<!doctype html>',
            '<html',
                ...setClass (getClass ('html')),
                ' data-bs-theme=\'dark\'',
                // ' data-bs-theme=\'light\'',
                ' lang=\'en\'',
            '>',
                ...setHeadContainer (),
                ...setBodyContainer (),
            '</html>',
        ];
    };

    echo implode ('', setHTMLContainer ());

?>