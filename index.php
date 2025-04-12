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
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
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

    function setCNPJ (string $is_input = ''): string {
        $is_input = preg_replace ('/\D/', '', $is_input);
        return implode ('', [
            substr ($is_input, 0, 2), '.',
            substr ($is_input, 2, 3), '.',
            substr ($is_input, 5, 3), '/',
            substr ($is_input, 8, 4), '-',
            substr ($is_input, 12, 2),
        ]);
    };

    function setHighlight (array|string $is_input = ''): string {
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

    function isTheKeyExists (array $is_input = [], string $is_key = ''): bool {
        if (!isset ($is_input)) return false;
        if (!array_key_exists ($is_key, $is_input)) return false;
        return true;
    };

    function isTheKeyFilled (array $is_input = [], string $is_key = ''): bool {
        if (!isTheKeyExists ($is_input, $is_key)) return false;
        if (empty ($is_input[$is_key])) return false;
        return true;
    };

    function thereAreFilledKeys (array $is_input = []): bool {
        foreach ($is_input as $is_key_i => $is_value_i):
            if (isArray ($is_value_i)):
                if (array_is_list ($is_value_i)): return true; else:
                    foreach ($is_value_i as $is_key_j => $is_value_j):
                        if (thereAreFilledKeys ($is_value_j)):
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

    function theButtonRow (array $is_input = []): bool {
        if (!isArray ($is_input)) return false;
        if (!array_is_list ($is_input)) return false;
        foreach ($is_input as $is_index):
            if (isTheKeyExists ($is_index, 'selector')):
                if (!in_array ($is_index['selector'], [ 'button' ])):
                    return false;
                endif;
            endif;
        endforeach;
        return true;
    };

    function setArray (array|string $is_input = []): array {
        return [
            ...isString ($is_input) ? [ $is_input ] : [],
            ...isArray ($is_input) ? [ ...array_is_list ($is_input) ? $is_input : [] ] : [],
        ];
    };

    function isTrue (mixed $is_input = []): bool {
        if (!isset ($is_input)) return false;
        if (empty ($is_input)) return false;
        return true;
    };

    function objectToArray (array|object $is_input = []): array {
        $is_result = [];
        foreach ($is_input as $is_key => $is_value):
            if (is_object ($is_value)): $is_result[$is_key] = objectToArray (get_object_vars ($is_value));
            elseif (is_array ($is_value)): $is_result[$is_key] = objectToArray ($is_value);
            else: $is_result[$is_key] = $is_value; endif;
        endforeach;
        return $is_result;
    };

    function getObjectVar ($is_input = []) {
        return is_object ($is_input) ? get_object_vars ($is_input) : $is_input;
    };

    function isArray (mixed $is_input = []): bool {
        $is_input = getObjectVar ($is_input);
        return isTrue ($is_input) && is_array ($is_input);
    };

    function isString (mixed $is_input = ''): bool {
        return isTrue ($is_input) && is_string ($is_input);
    };

    function getKeyValue (array $is_input = [], string $is_key = '', array|string $is_backup = []): array|string {
        $is_input = getObjectVar ($is_input);
        if (isTheKeyExists ($is_input, $is_key))
            if (isTrue (getObjectVar ($is_input[$is_key])))
                return getObjectVar ($is_input[$is_key]);
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

    function serverAddress (string $is_input = 'DOCUMENT_ROOT'): string {
        $is_server = $_SERVER[$is_input] . $_SERVER['REQUEST_URI'];
        $is_address = array_values (array_filter (explode ('/', $is_server)));
        $is_filename = $is_address[array_key_last ($is_address)];
        $is_extension = isTheKeyExists (pathinfo ($is_filename), 'extension') ? pathinfo ($is_filename)['extension'] : '';
        return in_array ($is_extension, [ 'php' ]) ? implode ('/', array_slice ($is_address, 0, - 1)) . '/' : $is_server;
    };

    function rootAddress (): string {
        return serverAddress ('DOCUMENT_ROOT');
    };

    function hostAddress (): string {
        return serverAddress ('HTTP_HOST');
    };

    function isURL (string $is_input = ''): bool {
        return preg_match ('/^(https?|ftp|file):\/\/(www\.)?/', trim ($is_input));
    };

    function getURL (string $is_input = ''): bool|string {
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

    function isPhone ($is_input = '') {
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

    function GetDateFromExpression ($is_input = '- 1 * 18 * 365') {
        $is_result = 0;
        date_default_timezone_set ('America/Sao_Paulo');
        $is_array = explode (' ', in_array (substr (trim ($is_input), 0, 1), range (0, 9)) ? implode (' ', [ '+', trim ($is_input) ]) : trim ($is_input));
        for ($i = 0; $i < sizeof ($is_array); $i++):
            if (in_array ($is_array[$i], [ '+' ])) $is_result += floatval ($is_array[$i + 1]);
            if (in_array ($is_array[$i], [ '-' ])) $is_result -= floatval ($is_array[$i + 1]);
            if (in_array ($is_array[$i], [ '*' ])) $is_result *= floatval ($is_array[$i + 1]);
            if (in_array ($is_array[$i], [ '/' ])) $is_result /= floatval ($is_array[$i + 1]);
        endfor;
        return date ('Y-m-d', strtotime (implode ('', [ isNumber ($is_result) < 0 ? '-' : '+', - 1 * isNumber ($is_result), ' day' ]), strtotime (date ('Y-m-d'))));
    };

    function GetID ($is_input = 12) {
        $is_letter = implode ('', range ('a', 'z'));
        return implode ('', array_map (function ($is_index) use ($is_letter) {
            return $is_letter[rand (0, strlen ($is_letter) - 1)];
        }, range (0, $is_input)));
    };

    function GetRandom ($is_input = []) {
        $is_input = setArray ($is_input);
        if (isArray ($is_input))
            return $is_input[array_rand ($is_input)];
    };

    function SetStylesheet ($is_input = []) {
        $is_input = [
            ...ConvertFileToArray ('style.json'),
            // ...GetFilesPaths ('css'),
            ...IsPathListExist ($is_input),
        ];
        return isArray (setArray ($is_input)) ? array_map (function ($is_index) {
            return implode ('', [ '<link href=\'', $is_index, '\' rel=\'stylesheet\' crossorigin=\'anonymous\'>' ]);
        }, setArray ($is_input)) : [];
    };

    function SetScript ($is_input = []) {
        $is_input = [ 
            ...ConvertFileToArray ('script.json'),
            // ...GetFilesPaths ('js'),
            ...IsPathListExist ($is_input),
        ];
        return isArray (setArray ($is_input)) ? array_map (function ($is_index) {
            return implode ('', [ '<script src=\'', $is_index, '\' crossorigin=\'anonymous\'', ...!isURL ($is_index) ? [ ' type=\'module\'' ] : [], '></script>' ]);
        }, setArray ($is_input)) : [];
    };

    function SetResize ($is_input = '') {
        if (!is_dir ('./temp'))
            mkdir ('./temp', 0777, true);
        $is_filename = pathinfo ($is_input)['filename'] . '.' . pathinfo ($is_input)['extension'];
        $is_from = rootAddress () . pathinfo ($is_input)['extension'] . '/' . $is_filename;
        $is_to = rootAddress () . 'temp' . '/' . $is_filename;
        if (!file_exists ($is_to))
            imagewebp (imagecreatefromjpeg ($is_from), $is_to, 10);
        return str_replace (rootAddress (), './', $is_to);
    };

    function SetAttrib ($is_input = '', $is_attrib = 'id') {
        $is_input = setArray ($is_input);
        return [
            ...isArray ($is_input) ? [
                ...isArray (setArray ($is_attrib)) ? [
                    ...array_map (function ($is_index) use ($is_input) {
                        return implode ('', [
                            ' ', $is_index, '=\'',
                                in_array ($is_index, [ 'class', 'style' ]) ? implode (' ', $is_input) : implode ('', $is_input),
                            '\'',
                        ]);
                    }, setArray ($is_attrib)),
                ] : [
                ],
            ] : [
            ],
        ];
    };

    function SetID ($is_input = '') {
        $is_input = implode ('-', setArray ($is_input));
        if (isTheKeyExists (pathinfo ($is_input), 'extension')) $is_input = pathinfo ($is_input)['filename'];
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z_]/i', '-', $is_input);
        $is_input = preg_replace ('/\s+/', '-', $is_input);
        $is_input = trim ($is_input, '-');
        return strtolower ($is_input);
    };

    function SetFilename ($is_input = '') {
        $is_input = implode ('-', setArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z.]/i', '-', $is_input);
        $is_input = preg_replace ('/\s+/', '-', $is_input);
        $is_input = trim ($is_input, '-');
        return strtolower ($is_input);
    };

    function SetTarget ($is_input = '') {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z]/i', ' ', $is_input);
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = array_map (function ($is_index) { return ucfirst ($is_index); }, explode (' ', $is_input));
        return implode ('', $is_input);
    };

    function SetKey ($is_input = '') {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^0-9a-zA-Z]/i', ' ', $is_input);
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = array_map (function ($is_index) { return ucfirst ($is_index); }, explode (' ', $is_input));
        return implode ('', $is_input);
    };

    function SetCamel ($is_input = '') {
        $is_input = implode (' ', setArray ($is_input));
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = explode (' ', $is_input);
        return implode (' ', array_map (function ($is_index) use ($is_input) {
            if (sizeof ($is_input) < 2): return ucfirst ($is_index);
            elseif (in_array ($is_index, defineLowercase)): return strtolower ($is_index);
            else: return ucfirst ($is_index); endif;
        }, $is_input));
    };

    function SetHead ($is_input = [], $is_head = 5) {
        $is_head = in_array ($is_head, range (1, 6)) ? $is_head : 5;
        return [ '<h' . $is_head, ...SetClass (P['H' . $is_head]), '>', SetCamel ($is_input), '</h' . $is_head . '>' ];
    };

    function SetTonicSyllable ($is_input = '') {
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
        ] as $is_replace => $is_pattern) $is_input = preg_replace ($is_pattern, $is_replace, $is_input);
        return trim ($is_input);
    };

    function ConvertFileToArray ($is_filename = []) {
        return GetFileContent ($is_filename) ? objectToArray (json_decode (GetFileContent ($is_filename))) : [];
    };

    function GetFileContent ($is_input = '') {
        if (IsPathExist ($is_input))
            return file_get_contents (IsPathExist ($is_input));
        return [];
    };

    function SetJsonFileCreator ($is_array = [], $is_filename = '') {
        if (isTheKeyExists (pathinfo ($is_filename), 'extension')):
            if (pathinfo ($is_filename)['extension'] === 'json'):
                $is_dir = GetDir (pathinfo ($is_filename)['extension']);
                if (!is_dir ($is_dir)) mkdir ($is_dir, 0755, true);
                $is_path = implode ('/', [ $is_dir, $is_filename ]);
                $is_fopen = fopen ($is_path, 'w');
                fwrite ($is_fopen, json_encode ($is_array));
                fclose ($is_fopen);
            endif;
        endif;
    };

    function SetJsonFileComparator ($is_array = [], $is_filename = '') {
        if (isArray ($is_array))
            return json_decode (GetFileContent ($is_filename)) === json_encode ($is_array);
        return false;
    };

    function IsPathExist ($is_filename = []) {
        return file_exists (SetPath ($is_filename)) ? SetPath ($is_filename) : '';
    };

    function IsPathListExist ($is_input = []) {
        return array_values (array_map (function ($is_index) {
            if (IsPathExist ($is_index)) return IsPathExist ($is_index);
            if (getURL ($is_index)) return getURL ($is_index);
            return '';
        }, setArray ($is_input)));
    };

    function SetPath ($is_filename = '') {
        if (IsFile ($is_filename))
            return implode ('/', [ GetDir (pathinfo ($is_filename)['extension']), IsFile ($is_filename) ]);
        return '';
    };

    function IsFile ($is_input = '') {
        if (isString ($is_input)):
            $is_input = explode ('/', $is_input);
            $is_input = $is_input[array_key_last ($is_input)];
            if (isTheKeyExists (pathinfo ($is_input), 'extension')):
                $is_sampler = implode ('.', array_map (function ($is_index) use ($is_input) {
                    return pathinfo ($is_input)[$is_index];
                }, [ 'filename', 'extension' ]));
                return $is_sampler === $is_input ? $is_input : '';
            endif;
        endif;
        return '';
    };

    function GetDir ($is_input = '') {
        $is_result = implode ('/', [ '.', SetID ($is_input) ]);
        if (!is_dir ($is_result)) mkdir ($is_result, 0777, true);
        return $is_result;
    };

    function IsPathsExist ($is_input = []) {
        return array_map (function ($is_index) { return IsPathExist ($is_index); }, setArray ($is_input));
    };

    function GetFiles ($is_input = 'html', $is_excluded = []) {
        return array_values (array_filter (scandir (GetDir ($is_input)), function ($is_index) use ($is_input, $is_excluded) {
            if (in_array (pathinfo ($is_index)['extension'], [ $is_input ]))
                if (!in_array (substr ($is_index, 0, 1), [ '_' ]))
                    if (!in_array ($is_index, $is_excluded))
                        if (GetFileContent ($is_index))
                            return $is_index;
        }));
    };

    function GetFilesPaths ($is_input = 'html', $is_excluded = []) {
        return IsPathsExist (GetFiles ($is_input, $is_excluded));
    };

    function GetFormAttrib ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'action', 'id', 'method', 'target' ]);
        return [
            ...SetAttrib ('utf-8', 'accept-charset'),
            ...SetAttrib (isString ($is_proper['action']) ? $is_proper['action'] : $_SERVER['PHP_SELF'], 'action'),
            ...SetAttrib ('multipart/form-data', 'enctype'),
            ...isString ($is_proper['id']) ? SetAttrib ($is_proper['id']) : [],
            ...SetAttrib (in_array ($is_proper['method'], defineMethod) ? $is_proper['method'] : 'POST', 'method'),
            ...SetAttrib (in_array ($is_proper['target'], defineTarget) ? '_' . $is_proper['target'] : '_self', 'target'),
        ];
    };

    function SetLink ($is_href = '', $is_textnode = '') {
        if (isURL ($is_href))
            return implode ('', [
                '<a', ...SetAttrib ($is_href, 'href'), ...SetAttrib ('_blank', 'target'), '>',
                    isString ($is_textnode) ? SetCamel ($is_textnode) : SetCamel ($is_href),
                '</a>',
            ]);
        return '';
    };

    function IsCNPJ ($is_input = '') {
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

    function GetCarouselIndicator ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'content', 'id' ]);
        return sizeof ($is_proper['content']) > 1 ? [
            '<div', ...SetClass ([ 'carousel-indicators', 'mx-auto', 'mb-3', ...P['Gap01'] ]), '>',
                ...array_map (function ($is_index, $is_key) use ($is_proper) {
                    return implode ('', [
                        '<button',
                            ...!$is_key ? SetAttrib ('true', 'aria-current') : [],
                            ...SetAttrib (implode (' ', [ 'Slide', ($is_key + 1) ]), 'aria-label'),
                            ...SetAttrib (implode ('', [ '#', $is_proper['id'] ]), 'data-bs-target'),
                            ...SetAttrib ('button', 'type'),
                            ...SetClass ([ 'border', 'border-0', ...!$is_key ? [ 'active' ] : [] ]),
                            ' data-bs-slide-to=\'', $is_key, '\'',
                        '>',
                        '</button>',
                    ]);
                }, $is_proper['content'], array_keys ($is_proper['content'])),
            '</div>',
        ] : [
        ];
    };

    function GetCarouselContainer ($is_input = []) {
        $is_id = GetID ();
        $is_input = ConvertFileToArray (SetJsonFilename ($is_input));
        $is_attrib = [ 'content' => $is_input, 'id' => $is_id ];
        return isArray ($is_input) ? [
            '<div', ...SetAttrib ($is_id, 'id'), ...SetClass (SetCarouselWrapper ()), '>',
                ...GetCarouselIndicator ($is_attrib),
                ...GetCarouselInner ($is_input),
                ...GetCarouselButton ($is_attrib),
            '</div>',
        ] : [
        ];
    };

    function GetDivider () {
        return [
            '<div',
                ...SetStyle ([
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

    function GetCarouselInner ($is_input = []) {
        return [
            ...isArray ($is_input) ? [
                '<article',
                    ...SetClass ([ 'carousel-inner', 'h-100', 'w-100' ]),
                    ...SetStyle (GetStyle ('min-height')),
                '>',
                    ...array_map (function ($is_index, $is_key) {
                        return implode ('', [
                            '<div',
                                ...SetAttrib (5000, 'data-bs-interval'),
                                ...SetClass ([ ...!$is_key ? [ 'active' ] : [], 'carousel-item', 'h-100', 'w-100' ]),
                                ...SetStyle ([
                                    ...GetStyle ('box-shadow'),
                                    ...GetStyle ('min-height'),
                                    ...isTheKeyExists ($is_index, 'gallery') ? GetStyle ('background-image', $is_index['gallery']) : [],
                                ]),
                            '>',
                                '<div',
                                    ...SetClass ([
                                        'align-items-center',
                                        'carousel-caption',
                                        'd-flex',
                                        'justify-content-center',
                                        'justify-content-lg-start',
                                        'm-0',
                                        'p-0',
                                    ]),
                                    ...SetStyle ([
                                        ...GetStyle ('min-height'),
                                        'bottom' => '0',
                                        'left' => '50%',
                                        'right' => '0',
                                        'top' => '50%',
                                        'transform' => 'translate(-50%, -50%)',
                                        'width' => 'calc(100% - 4rem * 2)',
                                    ]),
                                '>',
                                    '<div', ...SetClass (P['Col06']), '>',
                                        ...GetHeadline ([
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
                    }, $is_input, array_keys ($is_input)),
                '</article>',
            ] : [
            ],
        ];
    };

    function GetCarouselButton ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'content', 'id' ]);
        return sizeof ($is_proper['content']) > 1 ? array_map (function ($is_index) use ($is_proper) {
            return implode ('', [
                '<button',
                    ...SetClass ([ implode ('-', [ 'carousel', 'control', $is_index ]), 'mx-3', 'p-0' ]),
                    ...SetStyle ([ 'width' => 'auto' ]),
                    ...SetAttrib ('button', 'type'),
                    ...SetAttrib ($is_index, 'data-bs-slide'),
                    ...SetAttrib ([ '#', $is_proper['id'] ], 'data-bs-target'),
                '>',
                    '<span',
                        ...SetAttrib ('true', 'aria-hidden'),
                        ...SetClass ([ implode ('-', [ 'carousel', 'control', $is_index, 'icon' ]) ]),
                    '>',
                    '</span>',
                    '<span class=\'visually-hidden\'>', '</span>',
                '</button>',
            ]);
        }, [ 'prev', 'next' ]) : [
        ];
    };

    function GetModalContainer ($is_input = []) {
        $is_proper = setProper ($is_input, [ 'content', 'title', 'type' ]);
        return isTrue ($is_proper['title']) && isTrue ($is_proper['content']) ? [
            '<div',
                ...SetClass ([ 'modal', 'fade' ]),
                ...SetAttrib (SetTarget ([ $is_proper['title'], 'label' ]), 'aria-labelledby'),
                ...SetAttrib ('true', 'aria-hidden'),
                ...SetAttrib ('-1', 'tabindex'),
                ' id=\'', SetTarget ([ $is_proper['title'], 'target' ]), '\'',
            '>',
                '<div', ...SetClass ([ 'modal-dialog-centered', 'modal-dialog-scrollable', 'modal-dialog', 'modal-fullscreen' ]), '>',
                    '<div', ...SetClass ([ 'modal-content', ...P['WrapSetCol'] ]), '>',
                        '<button',
                            ...SetClass ([ 'btn-close', 'position-absolute', 'z-3' ]),
                            ...SetStyle ([ 'right' => '24px', 'top' => '12px' ]),
                            ...SetAttrib ('modal', 'data-bs-dismiss'),
                            ...SetAttrib ('button', 'type'),
                        '>',
                        '</button>',
                        '<div', ...SetClass ([ 'modal-body', 'modal-center', 'px-3', 'px-lg-5', 'py-5' ]), '>',
                            '<div', ...SetClass ([ ...P['WrapSetCol'], ...P['Gap05'] ]), '>',
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

    function GetHeaderContainer ($is_input = []) {
        $is_input = ConvertFileToArray (SetJsonFilename ($is_input));
        $is_archive = '';
        if (isTheKeyExists ($is_input, 'thumbnail'))
            $is_archive = IsPathExist ($is_input['thumbnail']);
        $is_style = [];
        if (isString ($is_archive))
            $is_style = [
                'height' => GetHeight ($is_archive, 12.5),
                'width' => 12.5 . 'rem',
            ];
        return isArray ($is_input) ? [
            '<div',
                ...SetAttrib ('wrap'),
                ...SetClass ([ 'flex-lg-row', 'gap-lg-3', 'p-5', ...P['WrapSetCol'] ]),
                ...SetStyle ([ ...GetStyle ('background-image', GetFilesPaths ('jpg')), ...GetStyle ('box-shadow') ]),
            '>',
                ...isString ($is_archive) ? [
                    '<div', ...SetAttrib ('brand'), ...SetStyle ($is_style), '>',
                        '<div', ...SetStyle ([ ...$is_style, ...GetStyle ('background-image', $is_archive) ]), '>',
                        '</div>',
                    '</div>',
                ] : [
                ],
                ...GetHeadline ([
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

    function GetModalListContainer ($is_input = '') {
        return isArray (GetJsonFile ($is_input)) ? array_map (function ($is_index) use ($is_input) {
            $is_function = SetTarget ([ 'get', 'modal', $is_input, 'container' ]);
            if (function_exists ($is_function))
                return implode ('', GetModalContainer ([ 'content' => ($is_function) ($is_index), 'title' => $is_index ]));
        }, GetJsonFile ($is_input)) : [];
    };

    function GetModalFormularioContainer ($is_input = '', $is_stage = 'front') {
        $is_content = ConvertFileToArray (SetJsonFilename ($is_input));
        return isArray ($is_content) ? [
            '<main',
                ...SetClass ([ 'mt-3', 'p-0', ...P['Gap05'], ...P['WrapSetCol'] ]),
            '>',
                ...array_map (function ($is_index, $is_key) use ($is_stage) {
                    return implode ('', [
                        '<section', ...SetClass ([ 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                            ...in_array ($is_stage, [ 'modal' ]) ? GetHeadline ([ 'lineup' => 'start', 'content' => $is_index, 'heading' => 3 ]) : [],
                            '<article',
                                ...SetClass ([ 'p-3', ...P['WrapSetCol'], ...P['WrapColorLight'], ...P['Gap03'] ]),
                            '>',
                                ...GetHeadline ([ 'content' => $is_index, 'heading' => 3 ]),
                                ...isTheKeyFilled ($is_index, 'container') ? [
                                    '<form',
                                        ...SetClass ([ ...P['Gap02'], ...P['WrapSetCol'] ]),
                                        ...GetFormAttrib (setProper ($is_index, [ 'action', 'id', 'method', 'target' ])),
                                    '>',
                                        ...array_map (function ($is_index) {
                                            return implode ('', isArray ($is_index) ? [
                                                '<div', ...SetClass (P['WrapSetCol']), '>',
                                                    ...!theButtonRow ($is_index) ? [
                                                        '<div', ...SetClass (P['WrapSetRow']), ...SetStyle ([ 'min-height' => '12px' ]), '>',
                                                            ...array_map (function ($is_element) use ($is_index) {
                                                                $is_title = $is_element['label'];
                                                                if (in_array ($is_element['label'], [ 'arrival', 'checkin' ])) $is_title = 'Data de chegada';
                                                                if (in_array ($is_element['label'], [ 'birth' ])) $is_title = 'Data de nascimento';
                                                                if (in_array ($is_element['label'], [ 'departure', 'checkout' ])) $is_title = 'Data de saida';
                                                                if (in_array ($is_element['label'], [ 'group_adults' ])) $is_title = 'Adultos';
                                                                if (in_array ($is_element['label'], [ 'name' ])) $is_title = 'Nome completo';
                                                                if (in_array ($is_element['label'], [ 'number' ])) $is_title = 'Número';
                                                                if (in_array ($is_element['label'], [ 'tel' ])) $is_title = 'Whatsapp';
                                                                if (isTheKeyFilled ($is_element, 'label')):
                                                                    return implode ('', [
                                                                        '<label',
                                                                            ...SetAttrib ($is_element['label'], 'for'),
                                                                            ...SetClass ([ 'px-2', ...P['HtmlLabel'] ]),
                                                                            ...SetStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')', 'min-height' => '12px' ]),
                                                                        '>',
                                                                            ...!in_array ($is_element['type'], [ 'button', 'submit' ]) ? [
                                                                                '<p', ...SetClass (P['Text']), ...SetStyle ([ 'min-height' => '12px' ]), '>',
                                                                                    SetCamel ($is_title),
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
                                                    ...theButtonRow ($is_index) ? [ '<div', ...SetClass (P['WrapSetToolbar']), '>' ] : [],
                                                        '<div', ...SetClass (theButtonRow ($is_index) ? P['WrapSetButton'] : P['WrapSetInput']), '>',
                                                            ...array_map (function ($is_element) use ($is_index) {
                                                                $is_option = [];
                                                                if (in_array ($is_element['selector'], [ 'select' ]))
                                                                    if (isTheKeyExists (defineOption, SetTarget ($is_element['label'])))
                                                                        $is_option = defineOption[SetTarget ($is_element['label'])];
                                                                return implode ('', [
                                                                    ...isTheKeyFilled ($is_element, 'selector') ? [
                                                                        ...in_array ($is_element['selector'], [ 'button', 'input', 'select', 'textarea' ]) ? [
                                                                            '<',
                                                                                $is_element['selector'],
                                                                                ...in_array ($is_element['selector'], [ 'button' ]) ? [
                                                                                    ...SetClass (P['LineButtonLight']),
                                                                                    ...in_array ($is_element['label'], [ 'fechar' ]) ? SetAttrib ('modal', 'data-bs-dismiss') : [],
                                                                                ] : [
                                                                                ],
                                                                                ...!in_array ($is_element['selector'], [ 'button' ]) ? [
                                                                                    ...SetClass (P['HtmlInput']),
                                                                                    ...SetAttrib ($is_element['label'], 'name'),
                                                                                ] : [
                                                                                ],
                                                                                ...isTheKeyFilled ($is_element, 'label') ? SetAttrib ($is_element['label'], 'id') : [],
                                                                                ...!theButtonRow ($is_index) ? [
                                                                                    ...SetStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')' ]),
                                                                                ] : [
                                                                                ],
                                                                                ...isTheKeyFilled ($is_element, 'disabled') ? [ ' disabled' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'input', 'textarea' ]) ? [
                                                                                    ...isTheKeyFilled ($is_element, 'maxlength') ? SetAttrib (strlen ($is_element['maxlength']), 'maxlength') : [],
                                                                                    ...isTheKeyFilled ($is_element, 'minlength') ? SetAttrib (strlen ($is_element['minlength']), 'minlength') : [],
                                                                                    ...isTheKeyFilled ($is_element, 'placeholder') ? SetAttrib ($is_element['placeholder'], 'placeholder') : [],
                                                                                    ...!in_array ($is_element['type'], [ 'date' ]) ? isTheKeyFilled ($is_element, 'value') ? SetAttrib ($is_element['value'], 'value') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...isTheKeyFilled ($is_element, 'required') ? [ ' required' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'textarea' ]) ? [
                                                                                    ...isTheKeyFilled ($is_element, 'rows') ? $is_element['rows'] > 1 ? SetAttrib ($is_element['rows'], 'rows') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...isTheKeyFilled ($is_element, 'type') ? [  
                                                                                    ...in_array ($is_element['selector'], [ 'button', 'input' ]) && in_array ($is_element['type'], defineType) ? SetAttrib ($is_element['type'], 'type') : [],
                                                                                    ...in_array ($is_element['selector'], [ 'input' ]) && in_array ($is_element['type'], [ 'date' ]) ? [
                                                                                        ...isTheKeyFilled ($is_element, 'value') ? SetAttrib (GetDateFromExpression ($is_element['value']), [ 'min', 'value' ]) : [],
                                                                                    ] : [
                                                                                    ],
                                                                                ] : [
                                                                                ],
                                                                            '>',
                                                                            ...in_array ($is_element['selector'], [ 'select' ]) ? [ ...GetOption ($is_option), '</select>' ] : [],
                                                                            ...in_array ($is_element['selector'], [ 'button', 'input', 'textarea' ]) ? [
                                                                                ...in_array ($is_element['selector'], [ 'button' ]) ? [ SetCamel ($is_element['label']) ] : [],
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
                                                    ...theButtonRow ($is_index) ? [ '</div>' ] : [],
                                                '</div>',
                                            ] : [
                                                '<hr', ...SetClass (P['HtmlHr']), ...SetStyle ([ 'border-top' => 'dotted 2px #000' ]), '>',
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

    function GetModalCardContainer ($is_input = []) {
        return GetModalContainerTemplate ($is_input, 'GetModalCardTemplate');
    };

    function GetModalAccordionContainer ($is_input = []) {
        return GetModalContainerTemplate ($is_input, 'GetModalAccordionTemplate');
    };

    function GetModalArticleContainer ($is_input = []) {
        return GetModalContainerTemplate ($is_input, 'GetModalArticleTemplate');
    };

    function GetLink ($is_input = []) {
        return [
            '<a',
                ...SetClass ([ ...P['Link'] ]),
                ...SetAttrib ('#', 'href'),
                ...SetAttrib ([ '#', SetTarget ([ $is_input, 'target' ]) ], 'data-bs-target'),
                ...SetAttrib ('modal', 'data-bs-toggle'),
            '>',
                SetCamel ($is_input),
            '</a>',
        ];
    };

    function GetWidgetContainer () {
        $is_input = [ 'contrato', 'formulario' ];
        $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 2 === 0) $is_number = str_pad (6, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 3 === 0) $is_number = str_pad (4, 2, '0', STR_PAD_LEFT);
        if (sizeof ($is_input) % 4 === 0) $is_number = str_pad (3, 2, '0', STR_PAD_LEFT);
        $is_number = SetTarget ([ 'Col', $is_number ]);
        return [
            ...isArray (setArray ($is_input)) ? [
                ...isArray (setArray ($is_input)) ? [
                    '<div', ...SetClass ([ 'row-gap-3', 'm-0', 'px-5', 'py-3', ...P['Gap00'], ...P['WrapSetRow'] ]), '>',
                        ...array_map (function ($is_index) use ($is_number) {
                            return implode ('', [
                                '<div', ...SetClass ([ 'p-0', 'flex-column', ...P[$is_number], ...P['Gap01'] ]), '>',
                                    '<h5', ...SetClass ([ 'text-lg-start', ...P['H5'] ]), '>', SetCamel ($is_index), '</h5>',
                                    '<div', ...SetClass ([ 'justify-content-center', 'justify-content-lg-start', 'row-gap-1', ...P['Gap02'], ...P['WrapSetRow'] ]), '>',
                                        ...array_map (function ($is_index) {
                                            return implode ('', [
                                                '<a',
                                                    ...SetClass ([ 'text-lg-start', ...P['Link'] ]),
                                                    ...SetAttrib ('#', 'href'),
                                                    ...SetAttrib ([ '#', SetTarget ([ $is_index, 'target' ]) ], 'data-bs-target'),
                                                    ...SetAttrib ('modal', 'data-bs-toggle'),
                                                '>',
                                                    SetCamel ($is_index),
                                                '</a>',
                                            ]);
                                        }, GetJsonFile ($is_index)),
                                    '</div>',
                                '</div>',
                            ]);
                        }, setArray ($is_input)),
                    '</div>',
                ] : [
                ],
                '<div', ...SetClass ([ 'px-5', 'pb-5', ...P['WrapSetCol'] ]), '>',
                    '<div', ...SetClass ([ 'border-top', ...P['WrapSetCol'] ]), '>',
                        '<p', ...SetClass ([ 'text-lg-start', ...P['Text'] ]), '>',
                            implode (' ', [ '©', date ('Y'), 'Company,', 'Inc.', 'All', 'rights', 'reserved.' ]),
                        '</p>',
                    '</div>',
                '</div>',
            ] : [
            ],
        ];
    };

    function GetSignatureContainer () {
        $is_input = [
            'name' => 'Fábio de Almeida Ribeiro',
            'cnpj' => '37.717.827/0001-20',
            'link' => 'https://www.linkedin.com/in/fabiodealmeidaribeiro/',
        ];
        $is_proper = setProper ($is_input, [ 'cnpj', 'link', 'name' ]);
        return [
            ...isString ($is_proper['name']) || IsCNPJ ($is_proper['cnpj']) ? [
                '<div', ...SetClass ([ 'p-3', ...P['WrapSetCol'], ...P['WrapColorDark'] ]), '>',
                    '<ul', ...SetClass ([ 'navbar-nav', 'p-0', ...P['Gap01'], ...P['WrapSetCol'] ]), '>',
                        ...isString ($is_proper['name']) ? [
                            '<li', ...SetClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...isURL ($is_proper['link']) ? [ '<a', ...SetClass (P['Link']), ...SetAttrib ($is_proper['link'], 'href'), '>' ] : [],
                                    SetCamel ($is_proper['name']),
                                ...isURL ($is_proper['link']) ? [ '</a>' ] : [],
                            '</li>',
                        ] : [
                        ],
                        ...IsCNPJ ($is_proper['cnpj']) ? [
                            '<li', ...SetClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...isURL ($is_proper['link']) ? [ '<a', ...SetClass (P['Link']), ...SetAttrib ($is_proper['link'], 'href'), '>' ] : [],
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

    function GetList ($is_input = []) {
        return [
            ...isArray (setArray ($is_input)) ? [
                ...array_map (function ($is_index) {
                    return implode ('', [
                        '<li', ...SetClass (P['NavItem']), '>',
                            ...GetLink ($is_index),
                        '</li>',
                    ]);
                }, setArray ($is_input)),
            ] : [
            ],
        ];
    };

    // FABIO

    function GetScrollBar () {
        return [
            '<div',
                ...SetAttrib ('scroll-bar'),
                ...SetClass ([ 'bg-black', 'd-flex', 'fixed-top', 'justify-content-start', 'position-fixed', 'start-0', 'top-0', 'w-100' ]),
                ...SetStyle ([ 'height' => '.5rem', 'z-index' => 5 ]),
            '>',
                '<div', 
                    ...SetAttrib ('scroll'),
                    ...SetClass ([ 'd-flex', 'justify-content-end' ]),
                    ...SetStyle ([ 'background-color' => '#ffc107', 'height' => '.25rem', 'width' => '0' ]),
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
                    ...SetAttrib ($is_proper['id']),
                    ...SetClass ([
                        'align-items-center',
                        'd-flex',
                        'justify-content-center',
                        'bg-secondary',
                    ]),
                    ...SetStyle ([
                        'border-radius' => '50%', 
                        'cursor' => 'default', 
                        'height' => '3rem',
                        'width' => '3rem',
                    ]),
                '>',
                    '<i',
                        ...SetClass ([ 'bi', 'fw-bold', 'text-white', $is_proper['class'] ]),
                        ...SetStyle ([ 'font-size' => '1.25rem' ]),
                    '>',
                    '</i>',
                '</div>',
            ] : [
            ],
        ];
    };

    function GetNavbarContainer ($is_input = []) {
        $is_input = setArray ($is_input);
        sort ($is_input);
        return isArray ($is_input) ? [
            ...GetScrollBar (),
            '<div',
                ...SetAttrib ('navbar-container'),
                ...SetClass ([
                    'align-items-center',
                    'd-flex',
                    'flex-column',
                    'justify-content-center',
                    'px-3',
                    'py-0',
                    'position-fixed',
                    'w-100',
                ]),
                ...SetStyle ([
                    'background-color' => '#f8f9fa',
                    'top' => '.25rem',
                    'z-index' => 5,
                ]),
            '>',

                '<div', ...SetClass ([ 'align-items-center', 'd-flex', 'd-lg-none', 'flex-column', 'justify-content-center', 'my-3', 'w-100' ]), '>',
                    ...GetDotButton ([ 'class' => 'bi-arrow-down-up', 'id' => 'navbar-icon' ]),
                '</div>',

                '<div',
                    ...SetAttrib ('hidden'),
                    ...SetClass ([ 'd-flex', 'flex-column', 'justify-content-center', 'overflow-hidden', 'w-100' ]),
                    // ...SetStyle ([ 'height' => '0' ]),
                '>',
                    '<div',
                        ...SetClass ([
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
                                    ...SetClass ([ ...P['Link'] ]),
                                    ...SetAttrib ('#', 'href'),
                                    ...SetAttrib ([ '#', SetTarget ([ $is_index, 'target' ]) ], 'data-bs-target'),
                                    ...SetAttrib ('modal', 'data-bs-toggle'),
                                    ...SetStyle ([ 'color' => '#212529' ]),
                                '>',
                                    SetCamel ($is_index),
                                '</a>',
                            ]);
                        }, setArray ($is_input)),
                    '</div>',
                '</div>',
            '</div>',
        ] : [
        ];
    };

    function GetWrapper ($is_input = [], $is_propertie = []) {
        $is_proper = setProper ($is_propertie, [ 'selector', 'id' ], '');
        $is_id = is_string ($is_proper['id']) ? $is_proper['id'] : '';
        $is_selector = in_array ($is_proper['selector'], defineSelector) ? $is_proper['selector'] : 'section';
        return isArray (setArray ($is_input)) ? [
            '<',
                $is_selector,
                ...SetClass ([ ...P['WrapSetCol'] ]),
                ...$is_id ? SetAttrib ($is_id) : [],
            '>',
                ...setArray ($is_input),
            '</', $is_selector, '>',
        ] : [
        ];
    };

    function GetNumberFormat ($is_input = '') {
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
                    ...SetClass ([
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
                    ...SetStyle ([ 'width' => 'fit-content' ]),
                '>',
                    ...$is_discount ? [
                        '<p', ...SetClass ([ 'wrapper-principal', ...P['TextSetDisabled'], ...P['TextSetMono'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                            'R$', '<span', ...SetClass ([ 'principal' ]), '>', GetNumberFormat ($is_value), '</span>',
                        '</p>',
                    ] : [
                    ],
                    '<div', ...SetClass ([ 'wrapper-valor', ...P['WrapSetRow'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                        '<h3', ...SetClass ([ 'wrapper-negociado', ...P['H3'], ...P['TextSetMono'] ]), '>',
                            'R$', '<span', ...SetClass ([ 'negociado' ]), '>', GetNumberFormat ($is_final), '</span>',
                        '</h3>',
                        ...$is_discount ? [
                            '<h6', ...SetClass ([ 'wrapper-desconto', 'ms-1', 'mt-1', ...P['H6'], ...P['TextSetMono'] ]), '>',
                                '%off', '<span', ...SetClass ([ 'desconto' ]), '>', GetNumberFormat ($is_discount), '</span>',
                            '</h6>',
                        ] : [
                        ],
                    '</div>',
                    ...$is_divisor ? [
                        '<p', ...SetClass ([ 'wrapper-parcelado', ...P['Text'], ...P['TextSetMono'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                            'Em ', $is_divisor, ' x R$', '<span', ...SetClass ([ 'parcelado' ]), '>', GetNumberFormat ($is_final / $is_divisor), '</span>', ' sem juros.',
                        '</p>',
                    ] : [
                    ],
                    ...$is_value - $is_final ? [
                        '<p', ...SetClass ([ 'wrapper-economia', ...P['Text'], ...P['TextSetMono'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                            'Economia de R$', '<span', ...SetClass ([ 'economia' ]), '>', GetNumberFormat ($is_value - $is_final), '</span>', '.',
                        '</p>',
                    ] : [
                    ],
                '</section>',
                '<section', ...SetClass ([ 'btn-toolbar' ]), '>',
                    '<div', ...SetClass ([ 'btn-group' ]), '>',
                        '<a',
                            ...SetAttrib ('_blank', 'target'),
                            ...SetAttrib ($is_url, 'href'),
                            ...SetClass ([ 'btn', 'btn-outline-light' ]),
                        '>',
                            'Pagar',
                        '</a>',
                    '</div>',
                '</section>',
            ] : [
            ],
        ];
    };
                    
    function SetCarouselWrapper () {
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

    function GetSlider ($is_input = [], $is_height = 30) {
        $is_id = GetID ();
        $is_input = IsPathListExist ($is_input);
        $is_attrib = [ 'content' => $is_input, 'id' => $is_id ];
        return [ ...$is_input ] ? [
            '<div', ...SetAttrib ($is_id), ...SetClass (SetCarouselWrapper ()), ...SetStyle ([ 'min-height' => $is_height . 'rem' ]), '>',
                ...GetCarouselIndicator ($is_attrib),
                '<div', ...SetClass ([ 'carousel-inner', 'h-100', 'w-100' ]), '>',
                    ...array_map (function ($is_index, $is_key) use ($is_height) {
                        return implode ('', [
                            '<div',
                                ...SetClass ([ ...!$is_key ? [ 'active' ] : [], 'carousel-item', 'h-100', 'w-100' ]),
                                ...SetStyle ([
                                    ...GetStyle ('background-image', $is_index),
                                    'min-height' => $is_height . 'rem',
                                ]),
                            '>',
                            '</div>',
                        ]);
                    }, $is_input, array_keys ($is_input)),
                '</div>',
                ...GetCarouselButton ($is_attrib),
            '</div>',
        ] : [
        ];
    };

    function GetOrdered ($is_input = [], $is_number = 0) {
        $is_proper = GetHeadlineProper ($is_input);
        return isArray ($is_proper['content']) ? [
            '<ul',
                ...SetClass ([
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
                            ...SetClass ([
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
                            ...in_array ($is_proper['shadow'], [ 'yes' ]) ? SetStyle (GetStyle ('text-shadow')) : [],
                        '>',
                            ...in_array ($is_proper['bullet'], [ 'yes' ]) ? sizeof ($is_proper['content']) < 2 ? [ 'PARÁGRAFO ÚNICO: ' ] : [] : [],
                            isURL ($is_index) ? SetLink ($is_index) : setHighlight ($is_index),
                            ...GetOrdered ([
                                ...GetHeadlineProper ($is_proper, 'content'),
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

    function GetHeadlineTitle ($is_input = []) {
        return isTheKeyExists ($is_input['content'], 'title') ? [
            ...isArray (setArray ($is_input['content']['title'])) ? [
                ...array_map (function ($is_index) use ($is_input) {
                    $is_head = in_array ($is_input['heading'], range (1, 6)) ? 'h' . $is_input['heading'] : 'p';
                    return implode ('', [
                        '<', $is_head,
                            ...SetClass ([
                                'title',
                                ...GetSubstring (FontWeight, $is_input['weight']),
                                ...GetSubstring (TextSolid, $is_input['color']),
                                ...in_array ($is_input['lineup'], [ 'start' ]) ? [ 'text-lg-start' ] : [],
                                ...in_array ($is_input['lineup'], [ 'end' ]) ? [ 'text-lg-end' ] : [],
                                ...$is_head === 'p' ? P['Text'] : P[ucfirst ($is_head) . ''],
                            ]),
                            ...SetStyle ([
                                ...in_array ($is_input['shadow'], [ 'yes' ]) ? GetStyle ('text-shadow') : [],
                            ]),
                        '>',
                            SetCamel ($is_index),
                        '</', $is_head, '>'
                    ]);
                }, setArray ($is_input['content']['title'])),
            ] : [
            ],
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

    function GetHeadlineSubtitle ($is_input = []) {
        return isTheKeyExists ($is_input['content'], 'subtitle') ? [
            ...isArray (setArray ($is_input['content']['subtitle'])) ? [
                ...array_map (function ($is_index) use ($is_input) {
                    return implode ('', [
                        '<p',
                            ...SetClass ([
                                'subtitle',
                                ...GetSubstring (FontWeight, $is_input['weight']),
                                ...GetSubstring (TextSolid, $is_input['color']),
                                ...in_array ($is_input['lineup'], [ 'start' ]) ? P['Text'] : [],
                                ...in_array ($is_input['lineup'], [ 'end' ]) ? P['Text'] : [],
                                ...!in_array ($is_input['lineup'], [ 'start', 'end' ]) ? P['Text'] : [],
                            ]),
                            ...in_array ($is_input['shadow'], [ 'yes' ]) ? SetStyle (GetStyle ('text-shadow')) : [],
                        '>',
                            setHighlight ($is_index),
                        '</p>',
                    ]);
                }, setArray ($is_input['content']['subtitle'])),
            ] : [
            ],
        ] : [
        ];
    };

    function GetHeadlineDescription ($is_input = []) {
        return isTheKeyExists ($is_input['content'], 'description') ? [
            ...isArray (setArray ($is_input['content']['description'])) ? [
                ...GetOrdered ([
                    ...GetHeadlineProper ($is_input, 'content'),
                    'content' => $is_input['content']['description'],
                ]),
            ] : [
            ],
        ] : [
        ];
    };

    function GetHeadlineProper ($is_input = [], $is_excluded = '') {
        $is_attrib = [];
        foreach ([ 'background', 'bullet', 'color', 'content', 'heading', 'lineup', 'padding', 'shadow', 'weight' ] as $is_index)
            if (!in_array ($is_index, setArray ($is_excluded)))
                $is_attrib = array_merge ($is_attrib, setProper ($is_input, $is_index));
        return $is_attrib;
    };

    function GetHeadline ($is_input = []) {
        $is_proper = GetHeadlineProper ($is_input);
        $is_subtitle = $is_description = false;
        if (isTheKeyExists ($is_proper['content'], 'subtitle'))
            if (isArray (setArray ($is_proper['content']['subtitle'])))
                $is_subtitle = true;
        if (isTheKeyExists ($is_proper['content'], 'description'))
            if (isArray (setArray ($is_proper['content']['description'])))
                $is_description = true;
        $is_content = [
            ...$is_description ? [ '<div', ...SetClass (P['WrapSetCol']), '>' ] : [],
                ...GetHeadlineTitle ($is_proper),
                ...GetHeadlineSubtitle ($is_proper),
            ...$is_description ? [ '</div>' ] : [],
            ...GetHeadlineDescription ($is_proper),
        ];
        return [
            ...isArray ($is_content) ? [
                '<header',
                    ...SetClass ([
                        ...P['Gap01'],
                        ...P['WrapSetCol'],
                        ...in_array ($is_proper['padding'], range (1, 5)) ? [ 'px-' . $is_proper['padding'] ] : [],
                    ]),
                '>',
                    ...$is_content,
                '</header>',
            ] : [
            ],
        ];
    };

    function GetAccordionHeadline ($is_input = []) {
        $is_proper = GetHeadlineProper ($is_input);
        $is_subtitle = $is_description = false;
        if (isTheKeyExists ($is_proper['content'], 'subtitle'))
            if (isArray (setArray ($is_proper['content']['subtitle'])))
                $is_subtitle = true;
        if (isTheKeyExists ($is_proper['content'], 'description'))
            if (isArray (setArray ($is_proper['content']['description'])))
                $is_description = true;
        $is_content = [
            ...$is_description ? [ '<div', ...SetClass (P['WrapSetCol']), '>' ] : [],
                ...$is_subtitle || $is_description ? GetHeadlineTitle ($is_proper) : [],
                ...GetHeadlineSubtitle ($is_proper),
            ...$is_description ? [ '</div>' ] : [],
            ...GetHeadlineDescription ($is_proper),
        ];
        return [
            ...isArray ($is_content) ? [
                '<header',
                    ...SetClass ([
                        ...P['Gap01'],
                        ...P['WrapSetCol'],
                        ...in_array ($is_proper['padding'], range (1, 5)) ? [ 'px-' . $is_proper['padding'] ] : [],
                    ]),
                    ...SetStyle ([ 'width' => 'fit-content' ]),
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
                return implode ('', [ '<option', ...SetAttrib ($is_index, 'value'), '>', SetCamel ($is_index), '</option>' ]);
            }, $is_input) : array_map (function ($is_index) {
                return implode ('', [
                    ...is_string ($is_index) ? [ '<option', ...SetAttrib ($is_index, 'value'), '>', SetCamel ($is_index), '</option>' ] : [],
                    ...array_is_list ($is_index) ? [
                        '<optgroup', ...SetAttrib ($is_index[0], 'label'), '>',
                            ...array_map (function ($is_index, $is_key) {
                                if ($is_key)
                                    return implode ('', [ '<option', ...SetAttrib ($is_index, 'value'), '>', SetCamel ($is_index), '</option>' ]);
                            }, $is_index, array_keys ($is_index)),
                        '</optgroup>',
                    ] : [
                    ],
                ]);
            }, $is_input),
        ];
    };

    function GetAccordionBody ($is_input = []) {
        return [
            ...isArray ($is_input) ? [
                '<div', ...SetClass ([ 'accordion-body', 'm-0', 'p-3', ...P['Gap03'], ...P['WrapSetCol'], ...P['WrapColorLight'] ]), '>',
                    ...$is_input,
                '</div>',
            ] : [
            ],
        ];
    };

    function GetModalAccordionTemplate ($is_input = []) {
        $is_master = GetID ();
        return implode ('', [
            '<article', ...SetAttrib ($is_master, 'id'), ...SetClass ([ 'accordion', ...P['Col12'], ...P['Gap03'] ]), '>',
                ...GetHeadlineTemplate ($is_input, 4),
                ...isTheKeyExists ($is_input, 'container') ? [
                    ...thereAreFilledKeys ($is_input['container']) ? [
                        '<section', ...SetClass (P['WrapSetCol']), '>',
                            ...array_map (function ($is_index) use ($is_master) {
                                $is_slave = GetID ();
                                return implode ('', [
                                    '<article', ...SetClass ([ 'accordion-item', 'w-100' ]), '>',
                                        ...isTheKeyExists ($is_index, 'title') ? [
                                            ...istrue ($is_index['title']) ? [
                                                '<h2', ...SetClass ([ 'accordion-header', 'm-0', 'p-0' ]), '>',
                                                    '<button',
                                                        ...SetClass ([ 'accordion-button', 'collapsed' ]),
                                                        ...GetCollapse ($is_slave),
                                                    '>',
                                                        SetCamel ($is_index['title']),
                                                    '</button>',
                                                '</h2>',
                                            ] : [
                                            ],
                                        ] : [
                                        ],
                                        ...isArray (GetHeadline ([ 'content' => $is_index ])) ? [
                                            '<div',
                                                ...SetAttrib ($is_slave, 'id'),
                                                ...SetAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                                ...SetClass ([ 'accordion-collapse', 'collapse' ]),
                                            '>',
                                                ...GetAccordionBody (GetHeadline ([ 'content' => $is_index, 'heading' => 5, 'lineup' => 'start' ])),
                                            '</div>',
                                        ] : [
                                        ],
                                    '</article>',
                                ]);
                            }, $is_input['container']),
                        '</section>',
                    ] : [
                    ],
                ] : [
                ],
            '</article>',
        ]);
    };

    function GetHeadlineTemplate ($is_input = [], $is_heading = 4) {
        return isArray (GetHeadline ([ 'content' => $is_input ])) ? [
            '<div', ...SetClass ([ 'px-3', 'px-lg-5', ...P['WrapSetCol'] ]), '>',
                ...GetHeadline ([ 'content' => $is_input, 'heading' => $is_heading ]),
            '</div>',
        ] : [
        ];
    };

    function GetModalArticleTemplate ($is_input = []) {
        return implode ('', [
            ...isArray ($is_input) ? [
                ...GetHeadlineTemplate ($is_input, 4),
                ...isTheKeyExists ($is_input, 'container') ? [
                    ...isArray ($is_input['container']) ? [
                        '<section', ...SetClass ([ 'wrapper', ...P['WrapSetCol'] ]), '>',
                            ...array_map (function ($is_index, $is_key) {
                                $is_number = GetRandom (range (0, sizeof (SmallCollection) - 1));
                                $is_classes = [ BackgroundSubtle[$is_number], BorderSubtle[$is_number], TextEmphasis[$is_number] ];
                                $is_gallery = false;
                                if (isTheKeyExists ($is_index, 'gallery'))
                                    if (IsPathListExist ($is_index['gallery']))
                                        $is_gallery = true;
                                return implode ('', [
                                    '<article', ...SetClass ([ 'wrap', ...P['WrapSetRow'] ]), '>',
                                        ...$is_gallery ? [
                                            '<div',
                                                ...SetClass ([ 'gallery', ...P['Col06'] ]),
                                                ...SetStyle ([ 'height' => 'auto', 'min-height' => '30rem' ]),
                                            '>',
                                                ...GetSlider ($is_index['gallery']),
                                            '</div>',
                                        ] : [
                                        ],
                                        ...GetHeadline ([ 'content' => $is_index ]) ? [
                                            '<div',
                                                ...SetClass ([
                                                    ...$is_classes,
                                                    'headline',
                                                    'border-1',
                                                    'border',
                                                    'col-12',
                                                    'd-flex',
                                                    'flex-column',
                                                    'justify-content-center',
                                                    'm-0',
                                                    'p-5',
                                                    ...$is_gallery ? [
                                                        'col-lg-6',
                                                        ...!($is_key % 2) ? [ 'align-items-lg-end', 'order-lg-first' ] : [ 'align-items-lg-start' ],
                                                    ] : [
                                                    ],
                                                ]),
                                                ...SetStyle ([ 'height' => 'auto', ...$is_gallery ? [ 'min-height' => '30rem' ] : [] ]),
                                            '>',
                                                ...GetHeadline ([                                                    
                                                    'content' => $is_index,
                                                    'heading' => 3,
                                                    ...$is_gallery ? [
                                                        ...!($is_key % 2) ? [ 'lineup' => 'end' ] : [ 'lineup' => 'start' ],
                                                    ] : [
                                                    ],
                                                ]),
                                            '</div>',
                                        ] : [
                                        ],
                                    '</article>',
                                ]);
                            }, $is_input['container'], array_keys ($is_input['container'])),
                        '</section>',
                    ] : [
                    ],
                ] : [
                ],
            ] : [
            ],
        ]);
    };

    function GetModalCardTemplate ($is_input = []) {
        return implode ('', [
            ...GetHeadlineTemplate ($is_input, 4),
            ...isTheKeyExists ($is_input, 'container') ? [
                ...isArray ($is_input['container']) ? [
                    '<section', ...SetClass ([ 'card-container', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                        ...array_map (function ($is_index) {
                            $is_gallery = [];
                            if (isTheKeyExists ($is_index, 'gallery'))
                                $is_gallery = IsPathListExist ($is_index['gallery']);
                            $is_content = [
                                ...GetHeadline ([ 'content' => $is_index, 'heading' => 5 ]),
                                ...GetDisplay (setProper ($is_index, [ 'discount', 'url', 'value' ])),
                            ];
                            return implode ('', [
                                ...[ ...$is_gallery, ...$is_content ] ? [
                                    '<article', ...SetClass ([ 'card-wrapper', 'overflow-hidden', 'p-0', ...P['WrapSetCol'], ...P['WrapColorLight'] ]), '>',
                                        ...$is_gallery ? GetSlider ($is_gallery, 15) : [],
                                        ...$is_content ? [
                                            '<div', ...SetClass ([ 'align-items-center', 'card-content', 'p-3', ...P['Gap02'], ...P['WrapSetCol'] ]), '>',
                                                ...$is_content,
                                            '</div>',
                                        ] : [
                                        ],
                                    '</article>',
                                ] : [
                                ],
                            ]);
                        }, $is_input['container']),
                    '</section>',
                ] : [
                ],
            ] : [
            ],
        ]);        
    };

    function GetModalContainerTemplate ($is_input = [], $is_function = '') {
        $is_input = ConvertFileToArray (SetJsonFilename ($is_input));
        return isArray ($is_input) ? [
            '<section', ...SetClass ([ 'mt-3', 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...GetHeadlineTemplate ($is_index, 3),
                        ...isTheKeyExists ($is_index, 'container') ? [
                            ...isArray ($is_index['container']) ? array_map (function ($is_index) use ($is_function) {
                                    return $is_function ($is_index);
                                }, $is_index['container']) : [
                            ],
                        ] : [
                        ],
                    ]);
                }, $is_input),
            '</section>',
        ] : [
        ];
    };

    function GetAboutContainer ($is_input = []) {
        $is_input = SetJsonFilename ($is_input);
        $is_input = ConvertFileToArray ($is_input);
        return isArray ($is_input) ? [
            '<main', ...SetClass ([ 'mt-3', 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) {
                    return implode ('', [
                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 2, 'lineup' => 'start' ]),
                        ...isTheKeyExists ($is_index, 'container') ? [
                            ...isArray ($is_index['container']) ? [
                                ...array_map (function ($is_index) {
                                    return implode ('', [
                                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                                        ...isTheKeyExists ($is_index, 'container') ? [
                                            ...isArray ($is_index['container']) ? [
                                                '<section', ...SetClass ([ ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                                                    ...array_map (function ($is_index) {
                                                        if (isArray (GetHeadline ([ 'content' => $is_index ]))):
                                                            return implode ('', [
                                                                '<article', ...SetClass ([ 'p-3', ...P['WrapSetCol'] ]), '>',
                                                                    ...GetHeadline ([ 'content' => $is_index, 'heading' => 4, 'lineup' => 'start' ]),
                                                                '</article>',
                                                            ]);
                                                        endif;
                                                    }, $is_index['container']),
                                                '</section>',
                                            ] : [
                                            ],
                                        ] : [
                                        ],
                                    ]);
                                }, $is_index['container']),
                            ] : [
                            ],
                        ] : [
                        ],
                    ]);
                }, $is_input),
            '</main>',
        ] : [
        ];
    };

    function GetCollapse ($is_input = '') {
        return isString ($is_input) ? [
            ...SetAttrib ($is_input, 'aria-controls'),
            ...SetAttrib ('false', 'aria-expanded'),
            ...SetAttrib ('Toggle navigation', 'aria-label'),
            ...SetAttrib ([ '#', $is_input ], 'data-bs-target'),
            ...SetAttrib ('collapse', 'data-bs-toggle'),
            ...SetAttrib ('button', 'type'),
        ] : [
        ];
    };

    function SetJsonFilename ($is_input = '') {
        $is_input = implode ('.', [ SetID ($is_input), 'json' ]);
        if (IsPathExist ($is_input))
            return $is_input;
        return '';
    };

    function GetJsonFile ($is_input = []) {
        return array_values (array_filter (setArray (ConvertFileToArray (SetJsonFilename ($is_input))), function ($is_index) {
            if (IsPathExist (SetJsonFilename ($is_index)))
                return $is_index;
        }));
    };

    function GetModalContratoContainer ($is_input = []) {
        return GetModalAccordionContentTemplate ($is_input, 'GetModalContratoContent');
    };

    function GetModalCatalogoContainer ($is_input = []) {
        return GetModalAccordionContentTemplate ($is_input, 'GetModalCatalogoContent');
    };

    function GetModalInstitutionalContainer ($is_input = []) {
        return GetModalAccordionContentTemplate ($is_input, 'GetModalInstitutionalContent');
    };

    function GetModalContratoContent ($is_input = []) {
        return isArray ($is_input) ? [
            ...GetAccordionHeadline ([
                'bullet' => 'yes',
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),
        ] : [
        ];
    };

    function GetModalCatalogoContent ($is_input = []) {
        return isArray ($is_input) ? [
            ...isTheKeyExists ($is_input, 'gallery') ? GetSlider ($is_input['gallery'], 15) : [],
            ...GetAccordionHeadline ([
                'bullet' => 'yes',
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),
        ] : [
        ];
    };

    function GetModalInstitutionalContent ($is_input = []) {
        return isArray ($is_input) ? [
            ...GetAccordionHeadline ([
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),
        ] : [
        ];
    };

    function GetModalAccordionContentTemplate ($is_input = [], $is_function = '') {
        $is_input = ConvertFileToArray (SetJsonFilename ($is_input));
        return isArray ($is_input) ? [
            '<main', ...SetClass ([ 'm-0', 'p-0', ...P['Gap05'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                        ...isTheKeyExists ($is_index, 'container') ? [
                            ...isArray ($is_index['container']) ? [
                                '<section', ...SetClass ([ ...P['Gap05'], ...P['WrapSetCol'] ]), '>',
                                    ...array_map (function ($is_index) use ($is_function) {
                                        $is_master = GetID ();
                                        return implode ('', thereAreFilledKeys ($is_index) ? [
                                            '<article', ...SetClass ([ ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                                                ...GetHeadline ([ 'content' => $is_index, 'heading' => 4, 'lineup' => 'start' ]),
                                                ...isTheKeyExists ($is_index, 'container') ? [
                                                    ...isArray ($is_index['container']) ? [
                                                        '<section', ...SetAttrib ($is_master, 'id'), ...SetClass ([ 'accordion' ]), '>',
                                                            ...array_map (function ($is_index) use ($is_function, $is_master) {
                                                                $is_slave = GetID ();
                                                                return implode ('', [
                                                                    ...isTheKeyExists ($is_index, 'title') ? [
                                                                        ...isArray ($is_index['title']) ? [
                                                                            '<article', ...SetClass ([ 'accordion-item' ]), '>',
                                                                                '<h2', ...SetClass ([ 'accordion-header' ]), '>',
                                                                                    '<button',
                                                                                        ...SetClass ([ 'accordion-button', 'collapsed', ...!($is_function) ($is_index) ? P['TextSetDisabled'] : [] ]),
                                                                                        ...GetCollapse ($is_slave),
                                                                                    '>',
                                                                                        SetCamel ($is_index['title']),
                                                                                    '</button>',
                                                                                '</h2>',
                                                                                ...($is_function) ($is_index) ? [
                                                                                    '<div',
                                                                                        ...SetClass ([ 'accordion-collapse', 'collapse' ]),
                                                                                        ...SetAttrib ([ '#', $is_master ], 'data-bs-parent'),
                                                                                        ...SetAttrib ($is_slave, 'id'),
                                                                                    '>',
                                                                                        ...GetAccordionBody (($is_function) ($is_index)),
                                                                                    '</div>',
                                                                                ] : [
                                                                                ],
                                                                            '</article>',
                                                                        ] : [
                                                                        ],
                                                                    ] : [
                                                                    ],
                                                                ]);
                                                            }, $is_index['container']),
                                                        '</section>',
                                                    ] : [
                                                    ],
                                                ] : [
                                                ],
                                            '</article>',
                                        ] : [
                                        ]);
                                    }, $is_index['container']),
                                '</section>',
                            ] : [
                            ],
                        ] : [
                        ],
                    ]);
                }, $is_input),
            '</main>',
        ] : [
        ];
    };

    function GetModalThumbnailContainer () {
        return [
            ...isArray (GetFilesPaths ('jpg')) ? [
                '<article', ...SetClass ([ 'thumbnail-inner', 'mt-3', ...P['WrapSetCol'] ]), '>',
                    ...array_map (function ($is_index) {
                        $is_index = SetResize ($is_index);
                        return implode ('', [
                            '<div',
                                ...SetClass ([ 'col-12', 'col-lg-3', 'col-sm-6', 'overflow-hidden', 'position-relative', 'thumbnail-item' ]),
                                ...SetStyle ([ 'min-height' => '20rem' ]),
                            '>',
                                '<div',
                                    ...SetClass ([ 'bg-black', 'h-100', 'position-absolute', 'thumbnail-filter', 'w-100' ]),
                                    ...SetStyle ([ 'inset' => 0, 'min-height' => '20rem', 'opacity' => 0, 'z-index' => 2 ]),
                                '>',
                                '</div>',
                                '<div',
                                    ...SetAttrib (strval (getimagesize ($is_index)[1]), 'data-height'),
                                    ...SetAttrib ($is_index, 'data-url'),
                                    ...SetAttrib (strval (getimagesize ($is_index)[0]), 'data-width'),
                                    ...SetClass ([ 'h-100', 'position-absolute', 'thumbnail-background', 'w-100' ]),
                                    ...SetStyle ([
                                        ...SetBackground (),
                                        'background-image' => 'url(' . $is_index . ')',
                                        'inset' => 0,
                                        'min-height' => '20rem',
                                        'z-index' => 1,
                                    ]),
                                '>',
                                '</div>',
                            '</div>',
                        ]);
                    }, GetFilesPaths ('jpg')),
                '</article>',
            ] : [
            ],
        ];
    };

    function GetHtmlContainer ($is_input = [], $is_proper = []) {
        $is_proper = [
            ...setProper ($is_proper, 'headline', 'headline.json'),
            ...setProper ($is_proper, [ 'container', 'keyword' ]),
            ...setProper ($is_proper, 'margin', 0),
            ...setProper ($is_proper, 'script', 'script.js'),
            ...setProper ($is_proper, 'style', 'style.css'),
        ];
        $is_headline = ConvertFileToArray ($is_proper['headline']);        
        return [
            ...isArray (setArray ($is_input)) ? [
                '<!doctype html>',
                '<html',
                    ...SetClass (P['Html']),
                    ' lang=\'en\'',
                    ' data-bs-theme=\'dark\'',
                    // ' data-bs-theme=\'light\'',
                '>',
                    '<head>',
                        ...isArray (setArray ($is_headline)) ? [
                            '<title>',
                                implode (' | ', array_map (function ($is_index) use ($is_headline) {
                                    if (isTheKeyExists ($is_headline, $is_index))
                                        if (isArray (setArray ($is_headline[$is_index])))
                                            return SetCamel ($is_headline[$is_index]);
                                }, [ 'title', 'subtitle', 'description' ])),
                            '</title>',
                        ] : [
                        ],
                        '<meta', ...SetAttrib ('utf-8', 'charset'), '>',
                        ...isArray (setArray ($is_headline)) ? [
                            ...array_map (function ($is_index) use ($is_headline) {
                                if (isTheKeyExists ($is_headline, $is_index)):
                                    if (isArray (setArray ($is_headline[$is_index]))):
                                        $is_name = [ ...in_array ($is_index, [ 'title' ]) ? [ 'author' ] : [], ...in_array ($is_index, [ 'subtitle' ]) ? [ 'description' ] : [] ];
                                        return implode ('', [ '<meta', ...SetAttrib ($is_name, 'name'), ...SetAttrib ($is_headline[$is_index], 'content'), '>' ]);
                                    endif;
                                endif;
                            }, [ 'title', 'subtitle' ]),
                        ] : [
                        ],
                        ...isArray (setArray ($is_proper['keyword'])) ? [
                            '<meta',
                                ...SetAttrib ('keywords', 'name'),
                                ...SetAttrib (implode (', ', setArray ($is_proper['keyword'])), 'content'),
                            '>',
                        ] : [
                        ],
                        '<meta',
                            ...SetAttrib ('viewport', 'name'),
                            ...SetAttrib (implode (', ', [ 'width=device-width', 'initial-scale=1', 'shrink-to-fit=no' ]), 'content'),
                        '>',
                        ...SetStylesheet ($is_proper['style']),
                    '</head>',
                    '<body', ...SetClass (P['HtmlBody']), '>',
                        ...$is_proper['margin'] > 0 ? [
                            '<div',
                                ...SetClass ([ 'd-flex', 'flex-column', 'justify-content-center' ]),
                                ...SetStyle ([ 'width' => 'calc(100% - ' . $is_proper['margin'] . 'rem)' ]),
                            '>',
                        ] : [
                        ],
                            ...setArray ($is_input),
                        ...$is_proper['margin'] > 0 ? [ '</div>' ] : [],
                        ...isArray (setArray ($is_proper['container'])) ? setArray ($is_proper['container']) : [],
                        ...SetScript ($is_proper['script']),
                    '</body>',
                '</html>',
            ] : [
            ],
        ];
    };

?>

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
        if (isArray (setArray ($is_input))):
            $is_input = array_values (array_unique (setArray ($is_input)));
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
        if (!array_is_list ($is_input))
            return SetAttrib (implode (' ', array_map (function ($is_index) use ($is_input) {
                return implode ('', [ $is_index, ': ', $is_input[$is_index], ';' ]);
            }, array_keys ($is_input))), 'style');
        return [];
    };

?>

<?php
    define ('Footer', [
        ...GetWrapper (GetWidgetContainer ()),
        ...GetWrapper (GetSignatureContainer ()),
    ]);

    define ('Main', [
        
        ...GetWrapper (GetHeaderContainer ('headline'), [
            'selector' => 'header',
            'id' => 'headline',
        ]),

        ...GetWrapper (GetCarouselContainer ('carrossel'), [
            'id' => 'carrossel',
        ]),

        ...GetWrapper ([
            '<div', ...SetClass ([ 'd-flex', 'flex-wrap' ]), '>',
                '<div', ...SetClass ([ 'col-0', 'col-lg-2', 'd-lg-flex', 'd-none' ]), '>', '</div>',
                '<div', ...SetClass ([ 'col-12', 'col-lg-8', 'd-flex', 'flex-column', 'px-3', 'px-lg-0' ]), '>',
                    ...GetModalFormularioContainer ('booking'),
                    ...GetModalCardContainer ('cartoes'),
                '</div>',
                '<div', ...SetClass ([ 'col-0', 'col-lg-2', 'd-lg-flex', 'd-none' ]), '>', '</div>',
            '</div>',
        ]),

        // ...GetWrapper (GetModalThumbnailContainer (), [
        //     'id' => 'thumbnail',
        // ]),

        ...GetWrapper (GetModalArticleContainer ('pontos turísticos')),

    ]);

    define ('Body', [
        ...GetWrapper (GetNavbarContainer ([ ...GetJsonFile ('catalogo'), ...GetJsonFile ('institutional') ]), [
            'selector' => 'nav', 
            'id' => 'navbar',
        ]),
        ...GetWrapper ([
            ...GetWrapper (Main, [ 'selector' => 'main' ]),
            ...GetWrapper (Footer, [ 'selector' => 'footer' ]),
        ], [ 'id' => 'wrapper' ]),
    ]);

    echo implode ('', GetHtmlContainer (Body, [
        'container' => [
            ...array_map (function ($is_index) {
                return implode ('', GetModalListContainer ($is_index));
            }, [ 'catalogo', 'contrato', 'formulario', 'institutional' ])
        ],
        'style' => 'minify.css',
    ]));

?>