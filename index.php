<?php

    define ('defineDay', [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ]);

    define ('defineShortDay', array_map (function ($i) { return substr ($i, 0, 2); }, defineDay));

    define ('defineMediumDay', array_map (function ($i) { return substr ($i, 0, 3); }, defineDay));

    define ('defineMonth', [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ]);

    define ('defineMediumMonth', array_map (function ($i) { return substr ($i, 0, 3); }, defineMonth));

    define ('definePrimeiroContato', [
        'Whatsapp',
        'Email',
        'Telefone'
    ]);

    define ('defineGenero', [
        'Feminino',
        'Masculino',
        'Gênero Não-Binário',
        'Agênero',
        'Gênero Fluido',
        'Bigênero',
        'Transgênero',
        'Travesti',
        'Queer',
        'Intersexo'
    ]);

    define ('defineCargo', [
        'Diretor Executivo',
        'Diretor de Operações',
        'Diretor Financeiro',
        'Diretor de Tecnologia',
        'Diretor de Marketing',
        'Diretor de Recursos Humanos',
        [
            'Outros cargos',
            'Diretor de Segurança da Informação',
            'Diretor Jurídico',
            'Diretor de Comunicação'
        ]
    ]);

    define ('definePeriodo', array_map (function ($i) {
        return implode (' ', [ 'dás', $i * 6 . 'h', 'às', $i * 6 + 6 . 'h' ]);
    }, range (1, 3)));

    define ('defineSegmento', [
        [
            'Agronegócio',
            'Agricultura',
            'Pecuária',
            'Pesca',
            'Florestal'
        ],
        [
            'Indústria',
            'Alimentícia',
            'Têxtil',
            'Automotiva',
            'Metalúrgica',
            'Química e petroquímica',
            'Eletroeletrônica'
        ],
        [
            'Comércio',
            'Comércio varejista',
            'Comércio atacadista',
            'Comércio exterior',
            'Veículos automotores'
        ],
        [
            'Serviços',
            'Serviços financeiros',
            'Serviços profissionais',
            'Serviços de informação e comunicação',
            'Serviços de transporte',
            'Serviços de turismo',
            'Serviços de saúde'
        ],
        [
            'Administração Pública',
            'Governo Federal'
        ]
    ]);

    define ('defineAssunto', [
        'O meu site está com defeito',
        'Eu preciso atualizar o meu site',
        'O meu site está fora do ar',
        'Eu Preciso regularizar o(s) pagamento(s) da hospedagem'
    ]);

    define ('defineComoVoceNosConheceu', [
        'Facebook',
        'YouTube',
        'WhatsApp',
        'Instagram',
        'TikTok',
        [
            'Outras',
            'Telegram',
            'Snapchat',
            'Pinterest',
            'LinkedIn',
            'Twitter',
            'Kwai',
            'Weibo',
            'VK',
            'Reddit',
        ]
    ]);

    define ('defineFaturamento', [
        implode ('', [ 'r$', number_format (1, 2, ',', '.'), ' a r$', number_format (pow (1 * 10, 5), 2, ',', '.') ]),
        ...array_map (function ($i) {
            return implode ('', [ 'r$', number_format ($i * pow (1 * 10, 5) + 1, 2, ',', '.'), ' a r$', number_format ($i * pow (1 * 10, 5) + pow (1 * 10, 5), 2, ',', '.') ]);
        }, range (1, 9)),
    ]);

    define ('defineFuncionarios', [
        implode (' ', [ 1, ' a ', 10, ' funcionarios.' ]),
        ...array_map (function ($i) {
            return implode ('', [ ($i * 10 + 1), ' a ', ($i * 10), ' funcionarios.' ]);
        }, range (1, 9)),
    ]);

    define ('defineVoluntario', [
        [
            'Auxílio em creches e escolas',
            'Brincarm as crianças',
            'Auxiliar nas tarefas escolares',
            'Apoiar na organização da sala de aula',
            'Auxiliar na alimentação das crianças',
        ],
        [
            'Trabalho com idosos',
            'Fazer companhia',
            'Conversar e ouvir os idosos',
            'Auxiliar nas atividades diárias',
            'Organizar atividades de lazer',
        ],
        [
            'Apoio a pessoas com deficiência',
            'Auxiliar na locomoção',
            'Praticar atividades físicas',
            'Ensinar novas habilidades',
            'Oferecer apoio emocional',
        ],
        [
            'Trabalho com animais',
            'Cuidar dos animais',
            'Levar os animais para passear',
            'Auxiliar na limpeza dos abrigos',
            'Brincar com os animais',
        ],
        [
            'Trabalho com o meio ambiente',
            'Limpeza de áreas verdes',
            'Plantio de árvores',
            'Participação em campanhas de conscientização',
            'Monitoramento ambiental',
        ],
        [
            'Auxílio em eventos beneficentes',
            'Venda de produtos',
            'Recepção de doações',
            'Divulgação do evento',
            'Auxílio na organização do evento',
        ],
    ]);

    define ('defineAdultos', array_map (function ($i) { return strval ($i); }, range (1, 10)));

    define ('defineOption', [
        'Funcionarios' => defineFuncionarios,
        'Dia' => defineDay,
        'Mes' => defineMonth,
        'PrimeiroContato' => definePrimeiroContato,
        'Genero' => defineGenero,
        'Cargo' => defineCargo,
        'Periodo' => definePeriodo,
        'Segmento' => defineSegmento,
        'ComoVoceNosConheceu' => defineComoVoceNosConheceu,
        'Faturamento' => defineFaturamento,
        'Assunto' => defineAssunto,
        'Voluntario' => defineVoluntario,
        'GroupAdults' => defineAdultos,
        'Adultos' => defineAdultos,
    ]);

    define ('defineHighlighted', [
        'check-in',
        'check-out',
        'hóspede',
        'hóspedes',
        'hostel',
        'perdizes',
        'são paulo',
        'vila madalena',
        'viva hostel design',
    ]);

    define ('defineMethod', [
        'GET',
        'POST',
    ]);

    define ('defineSelector', [
        ...array_map (function ($i) { return implode ('', [ 'h', $i ]); }, range (1, 6)),
        'a',
        'abbr',
        'acronym',
        'address',
        'area',
        'article',
        'aside',
        'audio',
        'b',
        'base',
        'bdi',
        'bdo',
        'big',
        'blockquote',
        'body',
        'br',
        'button',
        'canvas',
        'caption',
        'center',
        'cite',
        'code',
        'col',
        'colgroup',
        'data',
        'datalist',
        'dd',
        'del',
        'details',
        'dfn',
        'dialog',
        'dir',
        'dl',
        'dt',
        'em',
        'embed',
        'fencedframe',
        'fieldset',
        'figcaption',
        'figure',
        'font',
        'footer',
        'form',
        'frame',
        'frameset',
        'head',
        'header',
        'hgroup',
        'hr',
        'html',
        'i',
        'iframe',
        'img',
        'input',
        'ins',
        'kbd',
        'label',
        'legend',
        'li',
        'link',
        'main',
        'map',
        'mark',
        'marquee',
        'menu',
        'menuitem',
        'meta',
        'meter',
        'nav',
        'nobr',
        'noembed',
        'noframes',
        'noscript',
        'object',
        'ol',
        'optgroup',
        'option',
        'output',
        'p',
        'param',
        'picture',
        'plaintext',
        'portal',
        'pre',
        'progress',
        'q',
        'rb',
        'rt',
        'rtc',
        'ruby',
        's',
        'samp',
        'script',
        'search',
        'section',
        'select',
        'slot',
        'small',
        'source',
        'span',
        'strike',
        'strong',
        'style',
        'sub',
        'summary',
        'sup',
        'svg',
        'table',
        'tbody',
        'td',
        'template',
        'textarea',
        'tfoot',
        'th',
        'thead',
        'time',
        'title',
        'tr',
        'track',
        'tt',
        'u',
        'ul',
        'var',
        'video',
        'wbr',
        'wbr',
        'xmp'
    ]);

    define ('defineTarget', [
        'blank',
        'new',
        'parent',
        'self',
        'top'
    ]);

    define ('defineLowercase', [
        'a',
        'à',
        'ante',
        'ao',
        'aos',
        'após',
        'as',
        'às',
        'até',
        'by',
        'com',
        'contra',
        'da',
        'das',
        'de',
        'desde',
        'do',
        'dos',
        'dum',
        'duma',
        'dumas',
        'duns',
        'e',
        'em',
        'entre',
        'na',
        'não',
        'nas',
        'no',
        'nos',
        'num',
        'numa',
        'numas',
        'nuns',
        'o',
        'os',
        'para',
        'perante',
        'por',
        'sem',
        'sim',
        'sob',
        'sobre',
        'trás',
        'um',
        'uma',
        'umas',
        'uns',
        'qui',
        'são',
        'me',
        'que',
        'uma',
        'se',
        'sua',
        'seu',
        'tem',
    ]);

    define ('defineSpecialCharacter', [
        '',
        '_',
        '-',
        ',',
        ';',
        ':',
        '!',
        '?',
        '.',
        '\'',
        '\\',
        '(',
        ')',
        '[',
        ']',
        '{',
        '}',
        '@',
        '*',
        '/',
        '\\',
        '&amp;',
        '&gt;',
        '&lt;',
        '#',
        '%',
        '`',
        '^',
        '+',
        '=',
        '|',
        '~',
        '$',
    ]);

    define ('defineType', [
        'button',
        'checkbox',
        'color',
        'date',
        'datetime-local',
        'email',
        'file',
        'hidden',
        'image',
        'Mes',
        'number',
        'password',
        'radio',
        'range',
        'reset',
        'search',
        'submit',
        'tel',
        'text',
        'time',
        'url',
        'week'
    ]);

    function setHighlighted (array|string $is_input = ''): string {
        $is_highlight = array_unique (defineHighlighted);
        $is_array = implode ('', [
            '/\b(',
                implode ('|', [
                    ...array_map ('strtolower', $is_highlight),
                    ...array_map ('strtoupper', $is_highlight),
                    ...array_map ('ucfirst', $is_highlight),
                    ...array_map ('ucwords', $is_highlight),
                ]),
            ')\b/i'
        ]);
        if (isArray (setArray ($is_input))):
            return preg_replace_callback ($is_array, function ($is_index) {
                return implode ('', [ '<em>', '<b>', ucwords ($is_index[0]), '</b>', '</em>' ]);
            }, implode ('', setArray ($is_input)));
        endif;
        return '';
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

    function isButtonRow (array $is_input = []): bool {
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
        return [
            ...isString ($is_input) ? [ $is_input ] : [],
            ...isArray ($is_input) ? [ ...array_is_list ($is_input) ? $is_input : [] ] : [],
        ];
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

    function getKeyValue (array $is_input = [], string $is_key = '', array|string $is_backup = []): array|string {
        $is_input = setObjectVar ($is_input);
        if (isKeyTrue ($is_input, $is_key))
            if (isTrue (setObjectVar ($is_input[$is_key])))
                return setObjectVar ($is_input[$is_key]);
        return $is_backup;
    };

    function setProper (array $is_input = [], array|string $is_key = '', array|string $is_backup = []): array {
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
        return preg_match ('/^(https?|ftp|file):\/\/(www\.)?/', trim ($is_input));
    };

    function isURLExist (string $is_input = ''): bool|string {
        if (isURL ($is_input)) return false;
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
        if (isArray ($is_input)) return $is_input[array_rand ($is_input)];
        return false;
    };

    function setStyleArray (string $is_input = 'style.json'): array {
        $is_input = [ ...setJson2Array ($is_input), ...isAnyPathExist ('css') ];
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
        $is_input = [ ...setJson2Array ($is_input), ...isAnyPathExist ('js') ];
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
        $is_input = in_array ($is_attrib, [ 'class', 'style' ]) ? implode (' ', setArray ($is_input)) : implode ('', setArray ($is_input));
        return [ ' ', setID ($is_attrib), '=\'', $is_input, '\'' ];
    };

    function setID (array|string $is_input = ''): string {
        $is_input = implode ('-', setArray ($is_input));
        if (isKeyTrue (pathinfo ($is_input), 'extension')) $is_input = pathinfo ($is_input)['filename'];
        $is_input = setTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z_]/i', '-', $is_input);
        $is_input = preg_replace ('/-+/', '-', $is_input);
        $is_input = trim ($is_input, '-');
        return strtolower ($is_input);
    };

    function setTarget (array|string $is_input = ''): string {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = setTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z]/i', ' ', $is_input);
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = array_map (function ($i) { return ucfirst ($i); }, explode (' ', $is_input));
        return implode ('', $is_input);
    };

    function setCamelcase (array|string $is_input = ''): string {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = explode (' ', $is_input);
        return implode (' ', array_map (function ($is_index) use ($is_input) {
            if (in_array ($is_index, defineLowercase)) return strtolower ($is_index);
            return ucfirst ($is_index);
        }, $is_input));
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
        if (isArray (setArray ($is_input))):
            return array_values (array_map (function ($is_index) {
                if (isPathExist ($is_index)) return isPathExist ($is_index);
                if (isURLExist ($is_index)) return isURLExist ($is_index);
            }, setArray ($is_input)));
        endif;
        return [];
    };

    function setDir (string $is_input = ''): string {
        $is_result = implode ('/', [ '.', setID ($is_input) ]);
        if (!is_dir ($is_result))
            mkdir ($is_result, 0777, true);
        return $is_result;
    };

    function setArray2Json (array $is_array = [], string $is_filename = '') {
        $is_path = [
            ...isTrue (pathinfo ($is_filename)['extension'] === 'json')
            ? [ setDir (pathinfo ($is_filename)['extension']), pathinfo ($is_filename)['basename'] ]
            : [ setDir ('json'), setID ($is_filename) . 'json' ],
        ];
        if (isArray ($is_array)):
            $is_fopen = fopen (implode ('/', [ '.', ...$is_path ]), 'w');
            fwrite ($is_fopen, json_encode ($is_array));
            fclose ($is_fopen);
        endif;
    };

    function getPathArray (string $is_input = 'html'): array {
        if (isString ($is_input))
            return array_values (array_filter (scandir (setDir ($is_input)), function ($is_index) use ($is_input) {
                if (in_array (pathinfo ($is_index)['extension'], [ $is_input ]))
                    if (!in_array (substr ($is_index, 0, 1), [ '_' ]))
                        if (getFileContent ($is_index))
                            return $is_index;
            }));
        return [];
    };


    function isPathExist (string $is_input = ''): string {
        return file_exists (setPath ($is_input)) ? setPath ($is_input) : '';
    };

    function isAnyPathExist (string $is_input = 'html'): array {
        return array_values (array_filter (array_map (function ($i) { return isPathExist ($i); }, getPathArray ($is_input)), function ($i) {
            if (isString ($i)) return $i;
        }));
    };

    function formAttrib (array $is_input = []): array {
        $is_proper = setProper ($is_input, [ 'action', 'id', 'method', 'target' ]);
        return [
            ...setAttrib ('utf-8', 'accept-charset'),
            ...setAttrib (isString ($is_proper['action']) ? $is_proper['action'] : $_SERVER['PHP_SELF'], 'action'),
            ...setAttrib ('multipart/form-data', 'enctype'),
            ...isString ($is_proper['id']) ? setAttrib ($is_proper['id']) : [],
            ...setAttrib (in_array ($is_proper['method'], defineMethod) ? $is_proper['method'] : 'POST', 'method'),
            ...setAttrib (in_array ($is_proper['target'], defineTarget) ? '_' . $is_proper['target'] : '_self', 'target'),
        ];
    };

    function setLink (string $is_href = '', string $is_node = ''): string {
        return isURL ($is_href) ? implode ('', [
            '<a', ...setAttrib ($is_href, 'href'), ...setAttrib ('_blank', 'target'), '>',
                isString ($is_node) ? setCamelcase ($is_node) : $is_href,
            '</a>',
        ]) : '';
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
            '<div', ...setClass ([ 'carousel-indicators', 'mx-auto', 'mb-3', ...POOL['Gap01'] ]), '>',
                ...array_map (function ($is_index, $is_key) use ($is_proper) {
                    return implode ('', [
                        '<button',
                            ...!$is_key ? setAttrib ('true', 'aria-current') : [],
                            ...setAttrib ([ 'Slide ', ($is_key + 1) ], 'aria-label'),
                            ...setAttrib ([ '#', $is_proper['id'] ], 'data-bs-target'),
                            ...setAttrib ('button', 'type'),
                            ...setClass ([ 'border', 'border-0', ...!$is_key ? [ 'active' ] : [] ]),
                            ' data-bs-slide-to=\'', $is_key, '\'',
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
                    'height' => '3rem',
                    'width' => '100%',
                    'background-color' => 'rgba(0, 0, 0, .1)',
                    'border' => 'solid rgba(0, 0, 0, .15)',
                    'border-width' => '1px 0',
                    'box-shadow' => 'inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15)',
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
                            ...setAttrib ($is_index, 'data-bs-slide'),
                            ...setAttrib ([ '#', setID ($is_proper['id']) ], 'data-bs-target'),
                            ...setClass ([ implode ('-', [ 'carousel', 'control', $is_index ]), 'mx-3', 'p-0' ]),
                            ...setStyle ([ 'width' => 'auto' ]),
                        '>',
                            '<span', ...setAttrib ('true', 'aria-hidden'), ...setClass (implode ('-', [ 'carousel', 'control', $is_index, 'icon' ])), '></span>',
                            '<span class=\'visually-hidden\'></span>',
                        '</button>',
                    ]);
                }, [ 'prev', 'next' ]),
            ] : [
            ]
        ];
    };

    function getModalContainer ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'content', 'title', 'type' ]);
        return isTrue ($is_proper['title']) && isTrue ($is_proper['content']) ? [
            '<div',
                ...setClass ([ 'modal', 'fade' ]),
                ...setAttrib (setTarget ([ $is_proper['title'], 'label' ]), 'aria-labelledby'),
                ...setAttrib ('true', 'aria-hidden'),
                ...setAttrib ('-1', 'tabindex'),
                ' id=\'', setTarget ([ $is_proper['title'], 'target' ]), '\'',
            '>',
                '<div', ...setClass ([ 'modal-dialog-centered', 'modal-dialog-scrollable', 'modal-dialog', 'modal-fullscreen' ]), '>',
                    '<div', ...setClass ([ 'modal-content', ...POOL['WrapSetCol'] ]), '>',
                        '<button',
                            ...setClass ([ 'btn-close', 'position-absolute', 'z-3' ]),
                            ...setStyle ([ 'right' => '24px', 'top' => '12px' ]),
                            ...setAttrib ('modal', 'data-bs-dismiss'),
                            ...setAttrib ('button', 'type'),
                        '>',
                        '</button>',
                        '<div', ...setClass ([ 'modal-body', 'modal-center', 'px-3', 'px-lg-5', 'py-5' ]), '>',
                            '<div', ...setClass ([ ...POOL['WrapSetCol'], ...POOL['Gap05'] ]), '>',
                                ...setArray ($is_proper['content']),
                            '</div>',
                        '</div>',
                    '</div>',
                '</div>',
            '</div>',
        ] : [
        ];
    };

    function GetHeight ($is_archive = [], $is_width = '') {
        return strval (getimagesize ($is_archive)[1]) * $is_width / strval (getimagesize ($is_archive)[0]) . 'rem';
    };

    function getHeaderContainer ($is_input = []) {
        $is_input = setJson2Array ($is_input);
        $is_archive = isKeyTrue ($is_input, 'thumbnail') ? isPathExist ($is_input['thumbnail']) : '';
        $is_style = [];
        if (isString ($is_archive))
            $is_style = [
                'height' => GetHeight ($is_archive, 12.5),
                'width' => 12.5 . 'rem',
            ];
        return isArray ($is_input) ? [
            '<div',
                ...setAttrib ('wrap'),
                ...setClass ([ 'flex-lg-row', 'gap-lg-3', 'p-5', ...POOL['WrapSetCol'] ]),
                ...setStyle ([ ...getStyle ('background-image', isAnyPathExist ('jpg')), ...getStyle ('box-shadow') ]),
            '>',
                ...isString ($is_archive) ? [
                    '<div', ...setAttrib ('brand'), ...setStyle ($is_style), '>',
                        '<div', ...setStyle ([ ...$is_style, ...getStyle ('background-image', $is_archive) ]), '>',
                        '</div>',
                    '</div>',
                ] : [
                ],
                ...getHeadline ([
                    'color' => 'white',
                    'content' => $is_input,
                    'heading' => 1,
                    'lineup' => 'start',
                    'shadow' => 'yes',
                    'weight' => 'bolder',
                ]),
            '</div>',
        ] : [
        ];
    };

    // FABIO

    function getModalContainerArray (string $is_input = ''): array {
        return array_map (function ($is_index) use ($is_input) {
            $is_function = setTarget ([ 'get', 'modal', $is_input, 'container' ]);
            if (function_exists ($is_function))
                return implode ('', getModalContainer ([ 'content' => ($is_function) ($is_index), 'title' => $is_index ]));
        }, getJsonList ($is_input));
    };

    function getModalFormularioContainer ($is_input = '', $is_stage = 'front') {
        $is_content = setJson2Array ($is_input);
        return isArray ($is_content) ? [
            '<main',
                ...setClass ([ 'mt-3', 'p-0', ...POOL['Gap05'], ...POOL['WrapSetCol'] ]),
            '>',
                ...array_map (function ($is_index, $is_key) use ($is_stage) {
                    return implode ('', [
                        '<section', ...setClass ([ 'p-0', ...POOL['Gap03'], ...POOL['WrapSetCol'] ]), '>',
                            ...in_array ($is_stage, [ 'modal' ]) ? getHeadline ([ 'lineup' => 'start', 'content' => $is_index, 'heading' => 3 ]) : [],
                            '<article',
                                ...setClass ([ 'p-3', ...POOL['WrapSetCol'], ...POOL['WrapColorLight'], ...POOL['Gap03'] ]),
                            '>',
                                ...getHeadline ([ 'content' => $is_index, 'heading' => 3 ]),
                                ...isKeyTrue ($is_index, 'container') ? [
                                    '<form',
                                        ...setClass ([ ...POOL['Gap02'], ...POOL['WrapSetCol'] ]),
                                        ...formAttrib (setProper ($is_index, [ 'action', 'id', 'method', 'target' ])),
                                    '>',
                                        ...array_map (function ($is_index) {
                                            return implode ('', isArray ($is_index) ? [
                                                '<div', ...setClass (POOL['WrapSetCol']), '>',
                                                    ...!isButtonRow ($is_index) ? [
                                                        '<div', ...setClass (POOL['WrapSetRow']), ...setStyle ([ 'min-height' => '12px' ]), '>',
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
                                                                            ...setClass ([ 'px-2', ...POOL['HtmlLabel'] ]),
                                                                            ...setStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')', 'min-height' => '12px' ]),
                                                                        '>',
                                                                            ...!in_array ($is_element['type'], [ 'button', 'submit' ]) ? [
                                                                                '<p', ...setClass (POOL['Text']), ...setStyle ([ 'min-height' => '12px' ]), '>',
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
                                                    ...isButtonRow ($is_index) ? [ '<div', ...setClass (POOL['WrapSetToolbar']), '>' ] : [],
                                                        '<div', ...setClass (isButtonRow ($is_index) ? POOL['WrapSetButton'] : POOL['WrapSetInput']), '>',
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
                                                                                    ...setClass (POOL['LineButtonLight']),
                                                                                    ...in_array ($is_element['label'], [ 'fechar' ]) ? setAttrib ('modal', 'data-bs-dismiss') : [],
                                                                                ] : [
                                                                                ],
                                                                                ...!in_array ($is_element['selector'], [ 'button' ]) ? [
                                                                                    ...setClass (POOL['HtmlInput']),
                                                                                    ...setAttrib ($is_element['label'], 'name'),
                                                                                ] : [
                                                                                ],
                                                                                ...isKeyTrue ($is_element, 'label') ? setAttrib ($is_element['label'], 'id') : [],
                                                                                ...!isButtonRow ($is_index) ? [
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
                                                    ...isButtonRow ($is_index) ? [ '</div>' ] : [],
                                                '</div>',
                                            ] : [
                                                '<hr', ...setClass (POOL['HtmlHr']), ...setStyle ([ 'border-top' => 'dotted 2px #000' ]), '>',
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
        return getModalContainerTemplate ($is_input, 'getModalCardTemplate');
    };

    function getModalAccordionContainer ($is_input = []) {
        return getModalContainerTemplate ($is_input, 'getModalAccordionTemplate');
    };

    function getModalArticleContainer ($is_input = []) {
        return getModalContainerTemplate ($is_input, 'getModalArticleTemplate');
    };

    function getWidgetContainer () {
        $is_input = [ 'contrato', 'formulario' ];
        $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 2 === 0) $is_number = str_pad (6, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 3 === 0) $is_number = str_pad (4, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 4 === 0) $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        $is_number = setTarget ([ 'Col', $is_number ]);
        return [
            ...isArray (setArray ($is_input)) ? [
                '<div', ...setClass ([ 'row-gap-3', 'm-0', 'px-5', 'py-3', ...POOL['Gap00'], ...POOL['WrapSetRow'] ]), '>',
                    ...array_map (function ($is_index) use ($is_number) {
                        return implode ('', [
                            '<div', ...setClass ([ 'p-0', 'flex-column', ...POOL[$is_number], ...POOL['Gap01'] ]), '>',
                                '<h5', ...setClass ([ 'text-lg-start', ...POOL['H5'] ]), '>', setCamelcase ($is_index), '</h5>',
                                '<div', ...setClass ([ 'justify-content-center', 'justify-content-lg-start', 'row-gap-1', ...POOL['Gap02'], ...POOL['WrapSetRow'] ]), '>',
                                    ...array_map (function ($is_index) {
                                        return implode ('', [
                                            '<a',
                                                ...setAttrib ('#', 'href'),
                                                ...setAttrib ([ '#', setTarget ([ $is_index, 'target' ]) ], 'data-bs-target'),
                                                ...setAttrib ('modal', 'data-bs-toggle'),
                                                ...setClass ([ 'text-lg-start', ...POOL['Link'] ]),
                                            '>',
                                                setCamelcase ($is_index),
                                            '</a>',
                                        ]);
                                    }, getJsonList ($is_index)),
                                '</div>',
                            '</div>',
                        ]);
                    }, setArray ($is_input)),
                '</div>',
            ] : [
            ],
            '<div', ...setClass ([ 'px-5', 'pb-5', ...POOL['WrapSetCol'] ]), '>',
                '<div', ...setClass ([ 'border-top', ...POOL['WrapSetCol'] ]), '>',
                    '<p', ...setClass ([ 'text-lg-start', ...POOL['Text'] ]), '>',
                        implode (' ', [ '©', date ('Y'), 'Company,', 'Inc.', 'All', 'rights', 'reserved.' ]),
                    '</p>',
                '</div>',
            '</div>',
        ];
    };

    function getSignatureContainer () {
        $is_input = [
            'name' => 'Fábio de Almeida Ribeiro',
            'cnpj' => '37.717.827/0001-20',
            'link' => 'https://www.linkedin.com/in/fabiodealmeidaribeiro/',
        ];
        $is_proper = setProper ($is_input, [ 'cnpj', 'link', 'name' ]);
        return [
            ...isString ($is_proper['name']) || IsCNPJ ($is_proper['cnpj']) ? [
                '<div', ...setClass ([ 'p-3', ...POOL['WrapSetCol'], ...POOL['WrapColorDark'] ]), '>',
                    '<ul', ...setClass ([ 'navbar-nav', 'p-0', ...POOL['Gap01'], ...POOL['WrapSetCol'] ]), '>',
                        ...isString ($is_proper['name']) ? [
                            '<li', ...setClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...isURL ($is_proper['link']) ? [ '<a', ...setClass (POOL['Link']), ...setAttrib ($is_proper['link'], 'href'), '>' ] : [],
                                    setCamelcase ($is_proper['name']),
                                ...isURL ($is_proper['link']) ? [ '</a>' ] : [],
                            '</li>',
                        ] : [
                        ],
                        ...IsCNPJ ($is_proper['cnpj']) ? [
                            '<li', ...setClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...isURL ($is_proper['link']) ? [ '<a', ...setClass (POOL['Link']), ...setAttrib ($is_proper['link'], 'href'), '>' ] : [],
                                    IsCNPJ ($is_proper['cnpj']),
                                ...isURL ($is_proper['link']) ? [ '</a>' ] : [],
                            '</li>',
                        ] : [
                        ],
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

    function setNavbarContainer ($is_input = []) {
        $is_input = setArray ($is_input);
        sort ($is_input);
        return isArray ($is_input) ? [
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
                        ...array_map (function ($is_index) {
                            return implode ('', [
                                '<a',
                                    ...setClass ([ ...POOL['Link'] ]),
                                    ...setAttrib ('#', 'href'),
                                    ...setAttrib ([ '#', setTarget ([ $is_index, 'target' ]) ], 'data-bs-target'),
                                    ...setAttrib ('modal', 'data-bs-toggle'),
                                    ...setStyle ([ 'color' => '#212529' ]),
                                '>',
                                    setCamelcase ($is_index),
                                '</a>',
                            ]);
                        }, setArray ($is_input)),
                    '</div>',
                '</div>',
            '</div>',
        ] : [
        ];
    };

    // FABIO

    function setWrapper (array $is_input = [], array $is_attrib = []): array {
        $is_proper = setProper ($is_attrib, [ 'id', 'wrap' ]);
        $is_wrap = in_array ($is_proper['wrap'], defineSelector) ? $is_proper['wrap'] : 'div';
        return [
            ...isArray ($is_input) ? [
                '<',
                    $is_wrap,
                    ...setClass ([ ...POOL['WrapSetCol'] ]),
                    ...isString ($is_proper['id']) ? setAttrib ($is_proper['id']) : [],
                '>',
                    ...$is_input,
                '</', $is_wrap, '>',
            ] : [
            ],
        ];
    };

    function setNumberFormat ($is_input = ''): string {
        return number_format ($is_input, 2, '.', '');
    };

    function GetDisplay ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'discount', 'url', 'value' ]);
        $is_divisor = 3; $is_discount = 0; $is_url = ''; $is_value = 0;
        if (is_numeric ($is_proper['discount'])): $is_discount = $is_proper['discount']; endif;
        if (is_string ($is_proper['url'])): $is_url = preg_match ('/^https:\/\/mpago\.la\/[a-zA-Z0-9]+$/', $is_proper['url']) ? $is_proper['url'] : ''; endif;
        if (is_numeric ($is_proper['value'])): $is_value = $is_proper['value']; endif;
        $is_final = $is_value - $is_value / 100 * $is_discount;
        return [
            ...$is_final && $is_url ? [
                '<section',
                    ...setClass ([
                        ...[ 'bg-dark-subtle', 'border-dark-subtle' ],
                        'align-items-center',
                        'border-1',
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
                    ...$is_discount ? [
                        '<p', ...setClass ([ 'wrapper-principal', ...POOL['TextSetDisabled'], ...POOL['TextSetMono'] ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                            'R$', '<span', ...setClass ([ 'principal' ]), '>', setNumberFormat ($is_value), '</span>',
                        '</p>',
                    ] : [
                    ],
                    '<div', ...setClass ([ 'wrapper-valor', ...POOL['WrapSetRow'] ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                        '<h3', ...setClass ([ 'wrapper-negociado', ...POOL['H3'], ...POOL['TextSetMono'] ]), '>',
                            'R$', '<span', ...setClass ([ 'negociado' ]), '>', setNumberFormat ($is_final), '</span>',
                        '</h3>',
                        ...$is_discount ? [
                            '<h6', ...setClass ([ 'wrapper-desconto', 'ms-1', 'mt-1', ...POOL['H6'], ...POOL['TextSetMono'] ]), '>',
                                '%off', '<span', ...setClass ([ 'desconto' ]), '>', setNumberFormat ($is_discount), '</span>',
                            '</h6>',
                        ] : [
                        ],
                    '</div>',
                    ...$is_divisor ? [
                        '<p', ...setClass ([ 'wrapper-parcelado', ...POOL['Text'], ...POOL['TextSetMono'] ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
                            'Em ', $is_divisor, ' x R$', '<span', ...setClass ([ 'parcelado' ]), '>', setNumberFormat ($is_final / $is_divisor), '</span>', ' sem juros.',
                        '</p>',
                    ] : [
                    ],
                    ...$is_value - $is_final ? [
                        '<p', ...setClass ([ 'wrapper-economia', ...POOL['Text'], ...POOL['TextSetMono'] ]), ...setStyle ([ 'width' => 'fit-content' ]), '>',
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
                                    '<div', ...setClass (POOL['Col06']), '>',
                                        ...getHeadline ([
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
                                ...GetSubstring (TextSolid, $is_proper['color']),
                                'bg-transparent',
                                'd-inline',
                                'lh-1',
                                'm-0',
                                'text-center',
                            ]),
                            ...in_array ($is_proper['shadow'], [ 'yes' ]) ? setStyle (getStyle ('text-shadow')) : [],
                        '>',
                            ...in_array ($is_proper['bullet'], [ 'yes' ]) ? sizeof ($is_proper['content']) < 2 ? [ 'PARÁGRAFO ÚNICO: ' ] : [] : [],
                            isURL ($is_index) ? setLink ($is_index) : setHighlighted ($is_index),
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
                            'title',
                            ...GetSubstring (FontWeight, $is_input['weight']),
                            ...GetSubstring (TextSolid, $is_input['color']),
                            ...in_array ($is_input['lineup'], [ 'start' ]) ? [ 'text-lg-start' ] : [],
                            ...in_array ($is_input['lineup'], [ 'end' ]) ? [ 'text-lg-end' ] : [],
                            ...$is_head === 'p' ? POOL['Text'] : POOL[ucfirst ($is_head) . ''],
                        ]),
                        ...setStyle ([
                            ...in_array ($is_input['shadow'], [ 'yes' ]) ? getStyle ('text-shadow') : [],
                        ]),
                    '>',
                        setCamelcase ($is_index),
                    '</', $is_head, '>'
                ]);
            }, setArray ($is_input['content']['title'])),
        ] : [
        ];
    };

    function GetSubstring ($is_array = [], $is_input = '') {
        if (in_array ($is_input, [ 'white' ])) $is_input = 'light';
        if (in_array ($is_input, [ 'black' ])) $is_input = 'dark';
        if (is_array ($is_array))
            if (isString ($is_input))
                foreach ($is_array as $is_index)
                    if (str_contains ($is_index, trim ($is_input)))
                        return [ $is_index ];
        return [];
    };

    function getHeadlineSubtitle ($is_input = []) {
        return isKeyTrue ($is_input['content'], 'subtitle') ? [
            ...array_map (function ($is_index) use ($is_input) {
                return implode ('', [
                    '<p',
                        ...setClass ([
                            'subtitle',
                            ...GetSubstring (FontWeight, $is_input['weight']),
                            ...GetSubstring (TextSolid, $is_input['color']),
                            ...in_array ($is_input['lineup'], [ 'start' ]) ? POOL['Text'] : [],
                            ...in_array ($is_input['lineup'], [ 'end' ]) ? POOL['Text'] : [],
                            ...!in_array ($is_input['lineup'], [ 'start', 'end' ]) ? POOL['Text'] : [],
                        ]),
                        ...in_array ($is_input['shadow'], [ 'yes' ]) ? setStyle (getStyle ('text-shadow')) : [],
                    '>',
                        setHighlighted ($is_index),
                    '</p>',
                ]);
            }, setArray ($is_input['content']['subtitle'])),
        ] : [
        ];
    };

    function getHeadlineDescription ($is_input = []) {
        return isKeyTrue ($is_input['content'], 'description') ? [
            ...GetOrdered ([
                ...getHeadlineProper ($is_input, 'content'),
                'content' => $is_input['content']['description'],
            ]),
        ] : [
        ];
    };

    function getHeadlineProper ($is_input = [], $is_excluded = '') {
        $is_attrib = [];
        foreach ([ 'background', 'bullet', 'color', 'content', 'heading', 'lineup', 'padding', 'shadow', 'weight' ] as $is_index)
            if (!in_array ($is_index, setArray ($is_excluded)))
                $is_attrib = array_merge ($is_attrib, setProper ($is_input, $is_index));
        return $is_attrib;
    };

    function getHeadline (array $is_input = []): array {
        $is_proper = getHeadlineProper ($is_input);
        $is_subtitle = isKeyTrue ($is_proper['content'], 'subtitle');
        $is_description = isKeyTrue ($is_proper['content'], 'description');
        $is_content = [
            ...isTrue ($is_description) ? [ '<div', ...setClass (POOL['WrapSetCol']), '>' ] : [],
                ...getHeadlineTitle ($is_proper),
                ...getHeadlineSubtitle ($is_proper),
            ...isTrue ($is_description) ? [ '</div>' ] : [],
            ...getHeadlineDescription ($is_proper),
        ];
        return [
            ...isArray ($is_content) ? [
                '<header',
                    ...setClass ([
                        ...POOL['Gap01'],
                        ...POOL['WrapSetCol'],
                        ...in_array ($is_proper['padding'], range (1, 5)) ? [ 'px-' . $is_proper['padding'] ] : [],
                    ]),
                '>',
                    ...$is_content,
                '</header>',
            ] : [
            ],
        ];
    };

    function getAccordionHeadline ($is_input = []) {
        $is_proper = getHeadlineProper ($is_input);
        $is_subtitle = isKeyTrue ($is_proper['content'], 'subtitle');
        $is_description = isKeyTrue ($is_proper['content'], 'description');
        $is_content = [
            ...isTrue ($is_description) ? [ '<div', ...setClass (POOL['WrapSetCol']), '>' ] : [],
                ...isTrue ($is_subtitle) || isTrue ($is_description) ? getHeadlineTitle ($is_proper) : [],
                ...getHeadlineSubtitle ($is_proper),
            ...isTrue ($is_description) ? [ '</div>' ] : [],
            ...getHeadlineDescription ($is_proper),
        ];
        return [
            ...isArray ($is_content) ? [
                '<header',
                    ...setClass ([
                        ...POOL['Gap01'],
                        ...POOL['WrapSetCol'],
                        ...in_array ($is_proper['padding'], range (1, 5)) ? [ 'px-' . $is_proper['padding'] ] : [],
                    ]),
                    ...setStyle ([ 'width' => 'fit-content' ]),
                '>',
                    ...$is_content,
                '</header>',
            ] : [
            ],
        ];
    };

    function GetOption ($is_input = []) {
        return [
            '<option disabled selected value=\'\'></option>',
            ...array_is_list ($is_input) ? array_map (function ($is_index) {
                return implode ('', [ '<option', ...setAttrib ($is_index, 'value'), '>', setCamelcase ($is_index), '</option>' ]);
            }, $is_input) : array_map (function ($is_index) {
                return implode ('', [
                    ...is_string ($is_index) ? [ '<option', ...setAttrib ($is_index, 'value'), '>', setCamelcase ($is_index), '</option>' ] : [],
                    ...array_is_list ($is_index) ? [
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
                '<div', ...setClass ([ 'accordion-body', 'm-0', 'p-3', ...POOL['Gap03'], ...POOL['WrapSetCol'], ...POOL['WrapColorLight'] ]), '>',
                    ...$is_input,
                '</div>',
            ] : [
            ],
        ];
    };

    function getModalAccordionTemplate ($is_input = []) {
        $is_master = setRandomPassword ();
        return implode ('', [
            '<article', ...setAttrib ($is_master, 'id'), ...setClass ([ 'accordion', ...POOL['Col12'], ...POOL['Gap03'] ]), '>',
                ...getHeadlineContainer ($is_input, 4),
                ...isKeyTrue ($is_input, 'container') ? [
                    '<section', ...setClass (POOL['WrapSetCol']), '>',
                        ...array_map (function ($is_index) use ($is_master) {
                            $is_slave = setRandomPassword ();
                            return implode ('', [
                                '<article', ...setClass ([ 'accordion-item', 'w-100' ]), '>',
                                    ...isKeyTrue ($is_index, 'title') ? [
                                        '<h2', ...setClass ([ 'accordion-header', 'm-0', 'p-0' ]), '>',
                                            '<button',
                                                ...setClass ([ 'accordion-button', 'collapsed' ]),
                                                ...getCollapse ($is_slave),
                                            '>',
                                                setCamelcase ($is_index['title']),
                                            '</button>',
                                        '</h2>',
                                    ] : [
                                    ],
                                    ...isArray (getHeadline ([ 'content' => $is_index ])) ? [
                                        '<div',
                                            ...setAttrib ($is_slave, 'id'),
                                            ...setAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                            ...setClass ([ 'accordion-collapse', 'collapse' ]),
                                        '>',
                                            ...getAccordionBody (getHeadline ([ 'content' => $is_index, 'heading' => 5, 'lineup' => 'start' ])),
                                        '</div>',
                                    ] : [
                                    ],
                                '</article>',
                            ]);
                        }, $is_input['container']),
                    '</section>',
                ] : [
                ],
            '</article>',
        ]);
    };

    function getHeadlineContainer ($is_input = [], $is_heading = 4) {
        return isArray (getHeadline ([ 'content' => $is_input ])) ? [
            '<div', ...setClass ([ 'px-3', 'px-lg-5', ...POOL['WrapSetCol'] ]), '>',
                ...getHeadline ([ 'content' => $is_input, 'heading' => $is_heading ]),
            '</div>',
        ] : [
        ];
    };

    function getModalArticleTemplate ($is_input = []) {
        return implode ('', [
            ...isArray ($is_input) ? [
                ...getHeadlineContainer ($is_input, 4),
                ...isKeyTrue ($is_input, 'container') ? [
                    '<section', ...setClass ([ 'wrapper', ...POOL['WrapSetCol'] ]), '>',
                        ...array_map (function ($is_index, $is_key) {
                            $is_number = getArrayRandomIndex (range (0, sizeof (SmallCollection) - 1));
                            $is_gallery = isKeyTrue ($is_index, 'gallery') ? hasValidPath ($is_index['gallery']) : [];
                            $is_content = getHeadline ([ 'content' => $is_index ]);
                            if (isArray ([ ...$is_gallery, ...$is_content ])):
                                return implode ('', [
                                    '<article', ...setClass ([ 'wrap', ...POOL['WrapSetRow'] ]), '>',
                                        ...isArray ($is_gallery) ? [
                                            '<div',
                                                ...setClass ([ 'gallery', ...POOL['Col06'] ]),
                                                ...setStyle ([ 'height' => 'auto', 'min-height' => '30rem' ]),
                                            '>',
                                                ...getGalleryContainer ($is_index),
                                            '</div>',
                                        ] : [
                                        ],
                                        ...isArray ($is_content) ? [
                                            '<div',
                                                ...setClass ([
                                                    BackgroundSubtle[$is_number],
                                                    BorderSubtle[$is_number],
                                                    TextEmphasis[$is_number],
                                                    'headline',
                                                    'border-1',
                                                    'border',
                                                    'col-12',
                                                    'd-flex',
                                                    'flex-column',
                                                    'justify-content-center',
                                                    'm-0',
                                                    'p-5',
                                                    ...isArray ($is_gallery) ? [
                                                        'col-lg-6',
                                                        ...!($is_key % 2) ? [ 'align-items-lg-end', 'order-lg-first' ] : [ 'align-items-lg-start' ],
                                                    ] : [
                                                    ],
                                                ]),
                                                ...setStyle ([
                                                    ...isArray ($is_gallery) ? [ 'min-height' => '30rem' ] : [],
                                                    'height' => 'auto',
                                                ]),
                                            '>',
                                                ...getHeadline ([                                                    
                                                    'content' => $is_index,
                                                    'heading' => 3,
                                                    ...isArray ($is_gallery) ? [ 'lineup' => !($is_key % 2) ? 'end' : 'start' ] : [],
                                                ]),
                                            '</div>',
                                        ] : [
                                        ],
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
                '<section', ...setClass ([ 'card-container', ...POOL['Gap03'], ...POOL['WrapSetCol'] ]), '>',
                    ...array_map (function ($is_index) {
                        $is_gallery = isKeyTrue ($is_index, 'gallery') ? hasValidPath ($is_index['gallery']) : [];
                        $is_content = [
                            ...getHeadline ([ 'content' => $is_index, 'heading' => 5 ]),
                            ...GetDisplay (setProper ($is_index, [ 'discount', 'url', 'value' ])),
                        ];
                        if (isArray ([ ...$is_gallery, ...$is_content ])):
                            return implode ('', [
                                '<article', ...setClass ([ 'card-wrapper', 'overflow-hidden', 'p-0', ...POOL['WrapSetCol'], ...POOL['WrapColorLight'] ]), '>',
                                    ...isArray ($is_gallery) ? getGalleryContainer ($is_index) : [],
                                    ...isArray ($is_content) ? [
                                        '<div', ...setClass ([ 'align-items-center', 'card-content', 'p-3', ...POOL['Gap02'], ...POOL['WrapSetCol'] ]), '>',
                                            ...$is_content,
                                        '</div>',
                                    ] : [
                                    ],
                                '</article>',
                            ]);
                        endif;
                    }, $is_input['container']),
                '</section>',
            ] : [
            ],
        ]);        
    };

    function getModalContainerTemplate (string $is_input = '', string $is_function = ''): array {
        $is_input = setJson2Array ($is_input);
        return isArray ($is_input) ? [
            '<section', ...setClass ([ 'mt-3', 'p-0', ...POOL['Gap03'], ...POOL['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...getHeadlineContainer ($is_index, 3),
                        ...isKeyTrue ($is_index, 'container') ? [
                            ...array_map (function ($is_index) use ($is_function) {
                                return $is_function ($is_index);
                            }, $is_index['container']),
                        ] : [
                        ],
                    ]);
                }, $is_input),
            '</section>',
        ] : [
        ];
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










    

    


    function getExtension (): array {
        return [ 'html', 'jpeg', 'jpg', 'json', 'php', 'png', 'txt' ];
    };


    function getFileContent (string $is_input = '', string $is_extension = 'json'): string {
        return isFileExist ($is_input, $is_extension) ? file_get_contents (isFileExist ($is_input, $is_extension)) : '';
    };

    

    
    

    

    

    

    function isFileType (string $is_input = '', string $is_extension = 'json'): bool {
        if (isKeyTrue (pathinfo ($is_input), 'extension'))
            if (in_array ($is_extension, getExtension ()))
                if (in_array (pathinfo ($is_input)['extension'], [ $is_extension ]))
                    return true;
        return false;
    };

    

    function object2Array (array|object $is_input = []): array {
        $is_result = [];
        foreach ($is_input as $is_key => $is_value):
            if (is_object ($is_value)): $is_result[$is_key] = object2Array (get_object_vars ($is_value));
            elseif (is_array ($is_value)): $is_result[$is_key] = object2Array ($is_value);
            else: $is_result[$is_key] = $is_value; endif;
        endforeach;
        return $is_result;
    };

    function isFileExist (string $is_input = '', string $is_extension = 'json'): string {
        if (isKeyTrue (pathinfo ($is_input), 'extension')):
            return isPathExist (pathinfo ($is_input)['basename']);
        else:
            return in_array ($is_extension, getExtension ()) ? isPathExist (implode ('.', [ setID ($is_input), $is_extension ])) : '';
        endif;
        return '';
    };

    function resizePicture (string $is_input = '', string $is_extension = 'jpg'): bool|string {
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

    function isJsonExist (string $is_input = ''): string {
        if (isKeyTrue (pathinfo ($is_input), 'extension')):
            if (in_array (pathinfo ($is_input)['extension'], [ 'json' ])):
                return isPathExist (pathinfo ($is_input)['basename']);
            endif;
        else:
            return isPathExist (implode ('.', [ setID ($is_input), 'json' ]));
        endif;
        return '';
    };

    function setJson2Array (string $is_input = ''): array {
        $is_input = getFileContent (isJsonExist ($is_input));
        return isString ($is_input) ? object2Array (json_decode ($is_input)) : [];
    };

    function getJsonList (string $is_input = ''): array {
        if (isJsonExist ($is_input)):
            return array_values (array_filter (setJson2Array ($is_input), function ($is_index) {
                if (isJsonExist ($is_index))
                    return $is_index;
            }));
        endif;
        return [];
    };

    function isTheSame (array $is_array = [], string $is_filename = ''): bool {
        if (isArray ($is_array))
            if (isFileExist ($is_filename, 'json'))
                return json_decode (getFileContent ($is_filename)) === json_encode ($is_array);
        return false;
    };

    function setPath (string $is_input = ''): string {
        if (isKeyTrue (pathinfo ($is_input), 'extension'))
            return implode ('/', [ '.', setDir (pathinfo ($is_input)['extension']), pathinfo ($is_input)['basename'] ]);
        return '';
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
                ...getAccordionHeadline ([
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
            ...getGalleryContainer ($is_input, 15),
            ...isArray ($is_input) ? [
                ...getAccordionHeadline ([
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
                ...getAccordionHeadline ([
                    'content' => $is_input,
                    'heading' => 5,
                    'lineup' => 'start',
                ]),
            ] : [
            ]
        ];
    };

    function getModalAccordionContentTemplate ($is_input = [], $is_function = '') {
        $is_input = setJson2Array ($is_input);
        return isArray ($is_input) ? [
            '<main', ...setClass ([ 'm-0', 'p-0', ...POOL['Gap05'], ...POOL['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...getHeadline ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                        ...isKeyTrue ($is_index, 'container') ? [
                            '<section', ...setClass ([ ...POOL['Gap05'], ...POOL['WrapSetCol'] ]), '>',
                                ...array_map (function ($is_index) use ($is_function) {
                                    $is_master = setRandomPassword ();
                                    return implode ('', getFilledKeys ($is_index) ? [
                                        '<article', ...setClass ([ ...POOL['Gap03'], ...POOL['WrapSetCol'] ]), '>',
                                            ...getHeadline ([ 'content' => $is_index, 'heading' => 4, 'lineup' => 'start' ]),
                                            ...isKeyTrue ($is_index, 'container') ? [
                                                '<section', ...setAttrib ($is_master, 'id'), ...setClass ([ 'accordion' ]), '>',
                                                    ...array_map (function ($is_index) use ($is_function, $is_master) {
                                                        $is_slave = setRandomPassword ();
                                                        return implode ('', [
                                                            ...isKeyTrue ($is_index, 'title') ? [
                                                                '<article', ...setClass ([ 'accordion-item' ]), '>',
                                                                    '<h2', ...setClass ([ 'accordion-header' ]), '>',
                                                                        '<button',
                                                                            ...setClass ([ 'accordion-button', 'collapsed', ...!($is_function) ($is_index) ? POOL['TextSetDisabled'] : [] ]),
                                                                            ...getCollapse ($is_slave),
                                                                        '>',
                                                                            setCamelcase ($is_index['title']),
                                                                        '</button>',
                                                                    '</h2>',
                                                                    ...isArray (($is_function) ($is_index)) ? [
                                                                        '<div',
                                                                            ...setAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                                                            ...setAttrib ($is_slave, 'id'),
                                                                            ...setClass ([ 'accordion-collapse', 'collapse' ]),
                                                                        '>',
                                                                            ...getAccordionBody (($is_function) ($is_index)),
                                                                        '</div>',
                                                                    ] : [
                                                                    ],
                                                                '</article>',
                                                            ] : [
                                                            ],
                                                        ]);
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
        ];
    };



    

    function getModalThumbnailContainer () {
        return [
            ...isArray (isAnyPathExist ('jpg')) ? [
                '<article', ...setClass ([ 'thumbnail-inner', 'mt-3', ...POOL['WrapSetCol'] ]), '>',
                    ...array_map (function ($is_index) {
                        $is_index = resizePicture ($is_index);
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
                                    ...setAttrib (strval (getimagesize ($is_index)[1]), 'data-height'),
                                    ...setAttrib ($is_index, 'data-url'),
                                    ...setAttrib (strval (getimagesize ($is_index)[0]), 'data-width'),
                                    ...setClass ([ 'h-100', 'position-absolute', 'thumbnail-background', 'w-100' ]),
                                    ...setStyle ([
                                        ...setBackgroundStyle (),
                                        'background-image' => 'url(' . $is_index . ')',
                                        'inset' => 0,
                                        'min-height' => '20rem',
                                        'z-index' => 1,
                                    ]),
                                '>',
                                '</div>',
                            '</div>',
                        ]);
                    }, isAnyPathExist ('jpg')),
                '</article>',
            ] : [
            ],
        ];
    };

    

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

    function getPool () {

        $is_array = [];

        $is_border_ = [ 'border', 'border-1' ];
        $is_button_ = [ 'btn', 'button', 'cursor-pointer', 'm-0', 'p-2' ];
        $is_text_ = [ 'd-inline', 'lh-1', 'm-0', 'p-0', 'text-center' ];
        $is_link_ = [ 'fw-medium', 'text-decoration-none', 'link-opacity-50-hover', 'nav-link' ];
        $is_wrap_ = [ 'd-flex', 'justify-content-center', 'm-0', 'w-100' ];

        foreach (FullCollection as $is_key => $is_color):
            $is_array = array_merge ($is_array, [ setTarget ([ 'button', $is_color ]) => [ ...$is_button_, ButtonSolid[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ setTarget ([ 'line', 'button', $is_color ]) => [ ...$is_button_, ButtonLine[$is_key] ] ]);
            $is_array = array_merge ($is_array, [ setTarget ([ 'link', $is_color ]) => [ ...$is_text_, ...$is_link_, LinkSolid[$is_key] ] ]);
        endforeach;

        foreach (Direction as $is_direction)
            $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'set', $is_direction ]) => [ ...$is_wrap_, ...SetFlex ($is_direction) ] ]);

        foreach (SmallCollection as $is_key => $is_color):
            $is_emphasi = [ BackgroundSubtle[$is_key], BorderSubtle[$is_key], TextEmphasis[$is_key] ];
            $is_array = array_merge ($is_array, [ setTarget ([ 'wrap', 'color', $is_color ]) => [
                    ...$is_border_,
                    ...$is_text_,
                    ...$is_emphasi,
                ],
            ]);

            $is_text = [
                ...$is_text_,
                TextEmphasis[$is_key],
            ];

            $is_array = array_merge ($is_array, [ setTarget ([ 'text', 'color', $is_color ]) => [ ...$is_text ] ]);


            foreach (range (1, 6) as $is_head):
                $is_array = array_merge ($is_array, [
                    setTarget ([ implode ('', [ 'h', $is_head ]), $is_color ]) => [
                        implode ('', [ 'h', $is_head ]),
                        ...$is_text,
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



        $is_array = array_merge ($is_array, [ setTarget ([ 'text' ]) => [ ...$is_text_ ] ]);


        $is_array = array_merge ($is_array, [ setTarget ([ 'link' ]) => [ ...$is_text_, ...$is_link_ ] ]);


        foreach (range (1, 6) as $is_head):
            $is_array = array_merge ($is_array, [
                setTarget ([ implode ('', [ 'h', $is_head ]) ]) => [
                    implode ('', [ 'h', $is_head ]),
                    ...$is_text_,
                ],
            ]);
        endforeach;

        foreach (range (1, 12) as $is_col):
            $is_array = array_merge ($is_array, [ setTarget ([ 'col', str_pad ($is_col, 2, '0', STR_PAD_LEFT) ]) => [
                    implode ('-', [ 'col', 'lg', $is_col ]),
                    'col-12',
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

        foreach (range (0, 5) as $is_gap)
            $is_array = array_merge ($is_array, [ setTarget ([ 'gap', str_pad ($is_gap, 2, '0', STR_PAD_LEFT) ]) => [ 'grid', implode ('-', [ 'gap', $is_gap ]) ] ]);


        foreach (getBootstrap () as $is_key => $is_value)
            $is_array = array_merge ($is_array, [ $is_key => $is_value ]);


        $is_array = [
            ...$is_array,
            setTarget ([ 'text', 'set', 'disabled' ]) => [ 'text-decoration-line-through' ],
            setTarget ([ 'text', 'set', 'mono' ]) => [ 'font-monospace', 'fw-semibold', ...$is_text_ ],
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
                if (!isTheSame ($is_array, $is_filename)):
                    setArray2Json ($is_array, $is_filename);
                endif;
            else:
                setArray2Json ($is_array, $is_filename);
            endif;
        endif;
    };

    getJsonCreator (getPool (), 'pool.json');

    define ('POOL', setJson2Array ('pool.json'));

    function getClass (string $is_input = ''): array {
        if (isKeyTrue (POOL, $is_input)) return POOL[$is_input];
        return [];
    };

    function setClass (array|string $is_input = []): array {
        if (isArray (setArray ($is_input))):
            $is_input = array_values (array_unique (setArray ($is_input)));
            sort ($is_input);
            return setAttrib ($is_input, 'class');
        endif;
        return [];
    };

    function setBackgroundStyle (): array {
        return [
            'background-attachment' => 'scroll',
            'background-position' => 'center',
            'background-repeat' => 'no-repeat',
            'background-size' => 'cover',
        ];
    };

    function getStyle (string $is_key = '', $is_input = []): array {
        $is_result = [
            'text-shadow' => [ 'text-shadow' => '0 1.5px 3px rgba(0, 0, 0, .75)' ],
            'background-image' => hasValidPath ($is_input) ? [
                'background-image' => 'url(' . getArrayRandomIndex (hasValidPath ($is_input)) . ')',
                ...setBackgroundStyle (),
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
        ...setWrapper (setNavbarContainer ([ ...getJsonList ('catalogo'), ...getJsonList ('institutional') ]), [ 'wrap' => 'nav' ]),
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
                // ...setWrapper (getModalThumbnailContainer (), [
                //     'id' => 'thumbnail',
                // ]),
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
            ...array_map (function ($is_index) {
                return implode ('', getModalContainerArray ($is_index));
            }, [ 'catalogo', 'contrato', 'formulario', 'institutional' ]),
            ...setScriptArray (),
        ], [
            'wrap' => 'body',
        ]);
    };

    function setHTMLContainer (): array {
        return [
            '<!doctype html>',
            '<html',
                ...setClass (POOL['Html']),
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