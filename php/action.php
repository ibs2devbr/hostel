<?php

    // function IsCNPJ ($is_input = '') {
    //     $is_input = preg_replace ('/\D/', '', $is_input);
    //     if (strlen ($is_input) != 14) return false;
    //     for ($i = 0, $j = 5, $is_sum = 0; $i < 12; $i++):
    //         $is_sum += $is_input[$i] * $j;
    //         $j = ($j == 2) ? 9 : $j - 1;
    //     endfor;
    //     $is_rest = $is_sum % 11;
    //     if ($is_input[12] != ($is_rest < 2 ? 0 : 11 - $is_rest)) return false;
    //     for ($i = 0, $j = 6, $is_sum = 0; $i < 13; $i++):
    //         $is_sum += $is_input[$i] * $j;
    //         $j = ($j == 2) ? 9 : $j - 1;
    //     endfor;
    //     $is_rest = $is_sum % 11;
    //     return $is_input[13] == ($is_rest < 2 ? 0 : 11 - $is_rest);
    // };

    function SetCNPJ ($is_input = '') {
        $is_input = preg_replace ('/\D/', '', $is_input);
        return implode ('', [
            substr ($is_input, 0, 2), '.',
            substr ($is_input, 2, 3), '.',
            substr ($is_input, 5, 3), '/',
            substr ($is_input, 8, 4), '-',
            substr ($is_input, 12, 2),
        ]);
    };

    function SetHighlight ($is_input = '') {
        $is_highlight = array_unique (Highlight);
        $is_array = implode ('', [ '/\b(', implode ('|', [
            ...array_map ('strtolower', $is_highlight),
            ...array_map ('strtoupper', $is_highlight),
            ...array_map ('ucfirst', $is_highlight),
            ...array_map ('ucwords', $is_highlight),
        ]), ')\b/i' ]);
        return preg_replace_callback ($is_array, function ($is_index) {
            return implode ('', [ '<em>', '<b>', ucwords ($is_index[0]), '</b>', '</em>' ]);
        }, implode ('', SetArray ($is_input)));
    };

    function KeyExist ($is_input = [], $is_key = '') {
        if (!isset ($is_input)) return false;
            if (!is_array ($is_input)) return false;
                if (!array_key_exists ($is_key, $is_input)) return false;
        return true;
    };

    function IsKeyTrue ($is_input = [], $is_key = '') {
        if (!isset ($is_input)) return false;
            if (!is_array ($is_input)) return false;
                if (!array_key_exists ($is_key, $is_input)) return false;
                    if (empty ($is_input[$is_key])) return false;
        return true;
    };

    function HasFilledKeys ($is_input = []) {
        foreach ($is_input as $is_key_i => $is_value_i):
            if (IsArray ($is_value_i)):
                if (IsIndexedArray ($is_value_i)): return true; else:
                    foreach ($is_value_i as $is_key_j => $is_value_j):
                        if (HasFilledKeys ($is_value_j)):
                            return true;
                        endif;
                    endforeach;
                endif;
            elseif (IsTrue ($is_value_i)):
                return true;
            endif;
        endforeach;        
        return false;
    };

    function IsButtonRow ($is_input = []) {
        if (isset ($is_input))
            if (is_array ($is_input))
                if (!empty ($is_input))
                    foreach ($is_input as $is_index)
                        if (array_key_exists ('selector', $is_index))
                            if (!in_array ($is_index['selector'], [ 'button' ]))
                                return false;
        return true;
    };

    function isAssociativeArray ($is_input = []) {
        foreach (array_keys ($is_input) as $is_index):
            if (!is_numeric ($is_index)):
                return true;
            endif;
        endforeach;
        return false;
    };

    function IsIndexedArray ($is_input = []) {
        return !isAssociativeArray ($is_input);
    };

    function SetArray ($is_input = []) {
        return [
            ...IsArray ($is_input) ? IsIndexedArray ($is_input) ? $is_input : [] : [],
            ...IsString ($is_input) ? [ $is_input ] : [],
        ];
    };

    

    function IsTrue ($is_input = []) {
        if (!isset ($is_input)) return false;
            if (empty ($is_input)) return false;
        return true;
    };

    function Object2Array ($is_input = []) {
        $is_array = [];
        foreach ($is_input as $is_key => $is_value):
            if (is_object ($is_value)): $is_array[$is_key] = Object2Array (get_object_vars ($is_value));
            elseif (is_array ($is_value)): $is_array[$is_key] = Object2Array ($is_value);
            else: $is_array[$is_key] = $is_value; endif;
        endforeach;
        return $is_array;
    };

    function GetObjectVars ($is_input = []) {
        return is_object ($is_input) ? get_object_vars ($is_input) : $is_input;
    };

    function IsArray ($is_input = []) {
        $is_input = GetObjectVars ($is_input);
        return IsTrue ($is_input) && is_array ($is_input);
    };

    function IsString ($is_input = '') {
        return IsTrue ($is_input) && is_string ($is_input);
    };

    function GetKeyValue ($is_input = [], $is_key = '', $is_backup = []) {
        $is_input = GetObjectVars ($is_input);
        if (KeyExist ($is_input, $is_key))
            if (IsTrue (GetObjectVars ($is_input[$is_key])))
                return GetObjectVars ($is_input[$is_key]);
        return $is_backup;
    };

    function GetProper ($is_input = [], $is_key = [], $is_backup = []) {
        $is_result = [];
        if (IsArray ($is_key)):
            foreach ($is_key as $is_index):
                $is_result[$is_index] = GetKeyValue ($is_input, $is_index, $is_backup);
            endforeach;
        endif;
        if (IsString ($is_key)):
            $is_result[$is_key] = GetKeyValue ($is_input, $is_key, $is_backup);
        endif;
        return $is_result;
    };

    function IsNumber ($is_input = '') {
        if (is_int (floatval ($is_input)))
            return floatval ($is_input);
        return 1;
    };

    function IsFunction ($is_input = '') {
        return is_callable ($is_input);
    };

    function GetServerAddress ($is_input = 'DOCUMENT_ROOT') {
        $is_server = $_SERVER[$is_input] . $_SERVER['REQUEST_URI'];
        $is_address = array_values (array_filter (explode ('/', $is_server)));
        $is_filename = $is_address[array_key_last ($is_address)];
        $is_extension = KeyExist (pathinfo ($is_filename), 'extension') ? pathinfo ($is_filename)['extension'] : '';
        return in_array ($is_extension, [ 'php' ]) ? implode ('/', array_slice ($is_address, 0, - 1)) . '/' : $is_server;
    };

    function GetRootAddress () {
        return GetServerAddress ('DOCUMENT_ROOT');
    };

    function GetHostAddress () {
        return GetServerAddress ('HTTP_HOST');
    };

    function IsURL ($is_input = '') {
        return preg_match ('/^(https?|ftp|file):\/\/(www\.)?/', $is_input);
    };

    function GetURL ($is_input = '') {
        if (IsURL ($is_input)) return false;
        $ch = curl_init ();
        curl_setopt ($ch, CURLOPT_URL, $is_input);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
        $html = curl_exec ($ch);
        $is_http = curl_getinfo ($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        return $is_http === 200 ? $is_input : false;
    };

    function IsPhone ($is_input = '') {
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
        return date ('Y-m-d', strtotime (implode ('', [ IsNumber ($is_result) < 0 ? '-' : '+', - 1 * IsNumber ($is_result), ' day' ]), strtotime (date ('Y-m-d'))));
    };

    function GetID ($is_input = 12) {
        $is_letter = implode ('', range ('a', 'z'));
        return implode ('', array_map (function ($is_index) use ($is_letter) {
            return $is_letter[rand (0, strlen ($is_letter) - 1)];
        }, range (0, $is_input)));
    };

    function GetRandom ($is_input = []) {
        $is_input = SetArray ($is_input);
        if (IsArray ($is_input))
            return $is_input[array_rand ($is_input)];
    };

    function SetStylesheet ($is_input = []) {
        $is_input = [
            ...GetFileArray ('style.json'),
            // ...GetFilesPaths ('css'),
            ...IsPathListExist ($is_input),
        ];
        return IsArray (SetArray ($is_input)) ? array_map (function ($is_index) {
            return implode ('', [ '<link href=\'', $is_index, '\' rel=\'stylesheet\' crossorigin=\'anonymous\'>' ]);
        }, SetArray ($is_input)) : [];
    };

    function SetScript ($is_input = []) {
        $is_input = [ 
            ...GetFileArray ('script.json'),
            // ...GetFilesPaths ('js'),
            ...IsPathListExist ($is_input),
        ];
        return IsArray (SetArray ($is_input)) ? array_map (function ($is_index) {
            return implode ('', [ '<script src=\'', $is_index, '\' crossorigin=\'anonymous\'', ...!IsURL ($is_index) ? [ ' type=\'module\'' ] : [], '></script>' ]);
        }, SetArray ($is_input)) : [];
    };

    function SetResize ($is_input = '') {
        if (!is_dir ('./temp'))
            mkdir ('./temp', 0777, true);
        $is_filename = pathinfo ($is_input)['filename'] . '.' . pathinfo ($is_input)['extension'];
        $is_from = GetRootAddress () . pathinfo ($is_input)['extension'] . '/' . $is_filename;
        $is_to = GetRootAddress () . 'temp' . '/' . $is_filename;
        if (!file_exists ($is_to))
            imagewebp (imagecreatefromjpeg ($is_from), $is_to, 10);
        return str_replace (GetRootAddress (), './', $is_to);
    };

    function SetAttrib ($is_input = '', $is_attrib = 'id') {
        return [
            ...array_map (function ($is_index) use ($is_input) {
                return implode ('', [
                    ' ', $is_index, '=\'', implode ('', SetArray ($is_input)), '\'',
                ]);
            }, SetArray ($is_attrib)),
        ];
    };

    function SetID ($is_input = '') {
        $is_input = implode ('-', SetArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^a-zA-Z_]/i', '-', $is_input);
        $is_input = preg_replace ('/\s+/', '-', $is_input);
        $is_input = trim ($is_input, '-');
        return strtolower ($is_input);
    };

    function SetFilename ($is_input = '') {
        $is_input = implode ('-', SetArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^a-zA-Z.]/i', '-', $is_input);
        $is_input = preg_replace ('/\s+/', '-', $is_input);
        $is_input = trim ($is_input, '-');
        return strtolower ($is_input);
    };

    function SetTarget ($is_input = '') {
        $is_input = implode (' ', SetArray ($is_input));
        $is_input = SetTonicSyllable ($is_input);
        $is_input = preg_replace ('/[^a-zA-Z]/i', ' ', $is_input);
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = explode (' ', $is_input);
        $is_input = array_map (function ($is_index) { return ucfirst ($is_index); }, $is_input);
        return implode ('', $is_input);
    };

    function SetKey ($is_input = '') {
        $is_input = implode (' ', SetArray ($is_input));
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input, ' ');
        $is_input = explode (' ', $is_input);
        $is_input = array_map (function ($is_index) { return ucfirst ($is_index); }, $is_input);
        return implode ('', $is_input);
    };

    function SetCamel ($is_input = '') {
        $is_input = implode (' ', SetArray ($is_input));
        $is_input = preg_replace ('/\s+/', ' ', $is_input);
        $is_input = trim ($is_input);
        $is_input = explode (' ', $is_input);
        return implode (' ', array_map (function ($is_index) use ($is_input) {
            if (sizeof ($is_input) < 2): return ucfirst ($is_index);
            elseif (in_array ($is_index, Pretext)): return strtolower ($is_index);
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

    function GetFileArray ($is_filename = []) {
        return GetFileContent ($is_filename) ? Object2Array (json_decode (GetFileContent ($is_filename))) : [];
    };

    function GetFileContent ($is_input = '') {
        if (IsPathExist ($is_input))
            return file_get_contents (IsPathExist ($is_input));
        return '';
    };

    function GetJsonFileCreator ($is_array = [], $is_filename = '') {
        $is_result = [];
        foreach ($is_array as $is_key => $is_value)
            $is_result = array_merge ($is_result, [ $is_key => $is_value ]);
        $is_dir = GetDir (pathinfo ($is_filename)['extension']);
        if (!is_dir ($is_dir))
            mkdir ($is_dir, 0755, true);
        $is_path = implode ('/', [ $is_dir, $is_filename ]);
        $is_fopen = fopen ($is_path, 'w');
        fwrite ($is_fopen, json_encode ($is_result));
        fclose ($is_fopen);
    };

    function GetJsonFileComparator ($is_array = [], $is_filename = '') {
        if (IsArray ($is_array))
            return json_decode (GetFileContent ($is_filename)) === json_encode ($is_array);
        return false;
    };

    function IsPathExist ($is_filename = []) {
        return file_exists (SetPath ($is_filename)) ? SetPath ($is_filename) : '';
    };

    function IsPathListExist ($is_input = []) {
        return array_values (array_map (function ($is_index) {
            if (IsPathExist ($is_index)) return IsPathExist ($is_index);
            if (GetURL ($is_index)) return GetURL ($is_index);
            return '';
        }, SetArray ($is_input)));
    };

    function SetPath ($is_filename = '') {
        if (IsFile ($is_filename))
            return implode ('/', [ GetDir (pathinfo ($is_filename)['extension']), IsFile ($is_filename) ]);
        return '';
    };

    function IsFile ($is_input = '') {
        if (IsString ($is_input)):
            $is_input = explode ('/', $is_input);
            $is_input = $is_input[array_key_last ($is_input)];
            if (KeyExist (pathinfo ($is_input), 'extension')):
                $is_sampler = implode ('.', array_map (function ($is_index) use ($is_input) {
                    return pathinfo ($is_input)[$is_index];
                }, [ 'filename', 'extension' ]));
                return $is_sampler === $is_input ? $is_input : '';
            endif;
        endif;
        return '';
    };

    function GetDir ($is_input = '') {
        $is_result = [];
        $is_input = explode ('/', $is_input);
        if (IsFile ($is_input[array_key_last ($is_input)])):
            $is_input = array_filter (array_map (function ($is_index, $is_key) use ($is_input) {
                if ($is_key < sizeof ($is_input) - 1) return SetID ($is_index);
            }, $is_input, array_keys ($is_input)));
        endif;
        foreach ($is_input as $is_index):
            if (in_array ($is_index, [ '.', '..' ])): else:
                $is_result[] = SetID ($is_index);
            endif;
        endforeach;
        $is_result = implode ('/', [ '.', ...$is_result ]);
        if (!is_dir ($is_result))
            mkdir ($is_result, 0777, true);
        return $is_result;
    };

    function IsPathsExist ($is_input = []) {
        return array_map (function ($is_index) { return IsPathExist ($is_index); }, SetArray ($is_input));
    };

    function GetFiles ($is_input = 'html', $is_excluded = []) {
        $is_input = SetID ($is_input);
        return array_values (array_filter (scandir (GetDir ($is_input)), function ($is_index) use ($is_input, $is_excluded) {
            if (in_array (pathinfo ($is_index)['extension'], [ $is_input ]))
                if (!in_array (substr ($is_index, 0, 1), [ '_' ]))
                    if (!in_array ($is_index, $is_excluded))
                        if (GetFileContent (SetPath ($is_index)))
                            return $is_index;
        }));
    };

    function GetFilesPaths ($is_input = 'html', $is_excluded = []) {
        return IsPathsExist (GetFiles ($is_input, $is_excluded));
    };

    function GetFormAttrib ($is_input = []) {
        $is_proper = GetProper ($is_input, [ 'action', 'id', 'method', 'target' ]);
        return [
            ...SetAttrib ('utf-8', 'accept-charset'),
            ...SetAttrib (IsString ($is_proper['action']) ? $is_proper['action'] : $_SERVER['PHP_SELF'], 'action'),
            ...SetAttrib ('multipart/form-data', 'enctype'),
            ...IsString ($is_proper['id']) ? SetAttrib ($is_proper['id']) : [],
            ...SetAttrib (in_array ($is_proper['method'], Method) ? $is_proper['method'] : 'POST', 'method'),
            ...SetAttrib (in_array ($is_proper['target'], Target) ? '_' . $is_proper['target'] : '_self', 'target'),
        ];
    };

    function SetLink ($is_href = '', $is_textnode = '') {
        if (IsURL ($is_href))
            return implode ('', [
                '<a', ...SetAttrib ($is_href, 'href'), ...SetAttrib ('_blank', 'target'), ...SetClass (GetPool ('a')), '>',
                    IsString ($is_textnode) ? SetCamel ($is_textnode) : SetCamel ($is_href),
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

    define ('Dia', [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ]);

    define ('Mes', [
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

    define ('ShortDay', array_map (function ($is_index) { return substr ($is_index, 0, 2); }, Dia));

    define ('MediumDay', array_map (function ($is_index) { return substr ($is_index, 0, 3); }, Dia));
    
    define ('MediumMonth', array_map (function ($is_index) { return substr ($is_index, 0, 3); }, Mes));

    define ('PrimeiroContato', [
        'Whatsapp',
        'Email',
        'Telefone'
    ]);

    define ('Genero', [
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

    define ('Cargo', [
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

    define ('Periodo', array_map (function ($is_index) {
        return implode (' ', [ 'dás', $is_index * 6 . 'h', 'às', $is_index * 6 + 6 . 'h' ]);
    }, range (1, 3)));

    define ('Segmento', [
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

    define ('Assunto', [
        'O meu site está com defeito',
        'Eu preciso atualizar o meu site',
        'O meu site está fora do ar',
        'Eu Preciso regularizar o(s) pagamento(s) da hospedagem'
    ]);

    define ('ComoVoceNosConheceu', [
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

    define ('Faturamento', [
        implode ('', [ 'r$', number_format (1, 2, ',', '.'), ' a r$', number_format (pow (1 * 10, 5), 2, ',', '.') ]),
        ...array_map (function ($is_index) {
            return implode ('', [ 'r$', number_format ($is_index * pow (1 * 10, 5) + 1, 2, ',', '.'), ' a r$', number_format ($is_index * pow (1 * 10, 5) + pow (1 * 10, 5), 2, ',', '.') ]);
        }, range (1, 9)),
    ]);

    define ('Funcionarios', [
        implode (' ', [ 1, ' a ', 10, ' funcionarios.' ]),
        ...array_map (function ($is_index) {
            return implode ('', [ ($is_index * 10 + 1), ' a ', ($is_index * 10), ' funcionarios.' ]);
        }, range (1, 9)),
    ]);

    define ('Voluntario', [
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

    define ('Adultos', array_map (function ($is_index) { return strval ($is_index); }, range (1, 10)));

    define ('Option', [
        'Funcionarios' => Funcionarios,
        'Dia' => Dia,
        'Mes' => Mes,
        'PrimeiroContato' => PrimeiroContato,
        'Genero' => Genero,
        'Cargo' => Cargo,
        'Periodo' => Periodo,
        'Segmento' => Segmento,
        'ComoVoceNosConheceu' => ComoVoceNosConheceu,
        'Faturamento' => Faturamento,
        'Assunto' => Assunto,
        'Voluntario' => Voluntario,
        'GroupAdults' => Adultos,
        'Adultos' => Adultos,
    ]);

    define ('Highlight', [
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

    define ('Method', [
        'GET',
        'POST',
    ]);

    define ('Selector', [
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

    define ('Target', [
        'blank',
        'new',
        'parent',
        'self',
        'top'
    ]);

    define ('Pretext', [
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

    define ('SpecialChar', [
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

    define ('Type', [
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

?>