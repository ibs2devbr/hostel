<?php

    include_once ('php/_include.php');

    function SetGroupContainer ($is_input = [], $is_button = [ 'copiar' ]) {
        return [
            ...IsArray(SetArray ($is_input)) ? [ 
                '<div', ...SetClass ([ 'd-flex', 'justify-content-center', 'w-100' ]), '>',
                    '<div', ...SetClass ([ 'group-container', ...P['WrapSetInput'] ]), '>',
                        '<span', ...SetClass ([ 'group-content', 'input-group-text', 'overflow-hidden', 'p-2', 'w-100' ]), '>',
                            ...SetArray ($is_input),
                        '</span>',
                        ...array_map (function ($is_index) {
                            return implode ('', [
                                '<button',
                                    ...SetAttrib ('button', 'type'),
                                    ...SetClass ([
                                        ...in_array ($is_index, [ 'copiar' ]) ? [ 'group-command' ] : [],
                                        ...P['LineButtonSecondary'],
                                    ]),
                                '>',
                                    SetCamel ($is_index),
                                '</button>',
                            ]);
                        }, SetArray ($is_button)),
                    '</div>',
                '</div>',
            ] : [
            ],
        ];
    };

    define ('Body', [
        ...GetWrapper ([
            '<table', ...SetClass (P['HtmlTable']), '>',
                '<tbody', ...SetClass (P['HtmlTableBody']), '>',
                    ...array_map (function ($is_index, $is_key, $is_number) {
                        $is_anyone = [ 'flex-lg-row', 'flex-lg-wrap' ];
                        return implode ('', [
                            '<tr', ...SetClass (P['HtmlTableTr']), '>',
                                '<td', ...SetClass ([ ...$is_anyone, ...P['Col03'] ]), '>',
                                    ...SetGroupContainer ('...P[\'' . $is_key . '\']'),
                                '</td>',
                                '<td', ...SetClass ([ ...$is_anyone, ...P['Col03'] ]), '>',
                                    ...SetGroupContainer ('...SetClass ([ ...P[\'' . $is_key . '\'] ]),'),
                                '</td>',
                                '<td', ...SetClass ([ ...$is_anyone, ...P['Col06'] ]), '>',
                                    ...SetGroupContainer (array_map (function ($is_class, $is_key) use ($is_index) {
                                        return implode ('', [ '\'', $is_class, '\'', ...$is_key < sizeof ($is_index) - 1 ? [ ', ' ] : [] ]);
                                    }, $is_index, array_keys ($is_index))),
                                '</td>',
                            '</tr>',
                        ]);
                    }, P, array_keys (P), range (1, sizeof (P))),
                '</tbody>',
            '</table>',
        ]),
        ...GetWrapper (GetSignatureContainer ()),
    ]);

    echo implode ('', GetHtmlContainer (Body, [
        'left-margin' => 5,
        'style' => 'minify.css',
        'script' => [ 'pool.js', 'script.js' ],
    ]));

?>