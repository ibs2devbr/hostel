<?php

    function GetCarouselIndicator ($is_input = []) {
        $is_proper = GetProper ($is_input, [ 'content', 'id' ]);
        return sizeof ($is_proper['content']) > 1 ? [
            '<div', ...SetClass ([ 'carousel-indicators', 'mx-auto', 'mb-3', ...P['Gap01'] ]), '>',
                ...array_map (function ($is_index, $is_key) use ($is_proper) {
                    return implode ('', [
                        '<button',
                            ...!$is_key ? SetAttrib ('true', 'aria-current') : [],
                            ...SetAttrib (implode (' ', [ 'Slide', ($is_key + 1) ]), 'aria-label'),
                            ...SetAttrib ([ '#', $is_proper['id'] ], 'data-bs-target'),
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
        $is_input = GetFileArray (SetJsonFilename ($is_input));
        $is_attrib = [ 'content' => $is_input, 'id' => $is_id ];
        return IsArray ($is_input) ? [
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
            ...IsArray ($is_input) ? [
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
                                    ...KeyExist ($is_index, 'gallery') ? GetStyle ('background-image', $is_index['gallery']) : [],
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
        $is_proper = GetProper ($is_input, [ 'content', 'id' ]);
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
        $is_proper = GetProper ($is_input, [ 'content', 'title', 'type' ]);
        return IsTrue ($is_proper['title']) && IsTrue ($is_proper['content']) ? [
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
                                ...SetArray ($is_proper['content']),
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
        $is_input = GetFileArray (SetJsonFilename ($is_input));
        $is_archive = '';
        if (KeyExist ($is_input, 'thumbnail'))
            $is_archive = IsPathExist ($is_input['thumbnail']);
        $is_style = [];
        if (IsString ($is_archive))
            $is_style = [
                'height' => GetHeight ($is_archive, 12.5),
                'width' => 12.5 . 'rem',
            ];
        return IsArray ($is_input) ? [
            '<div',
                ...SetAttrib ('wrap'),
                ...SetClass ([ 'flex-lg-row', 'gap-lg-3', 'p-5', ...P['WrapSetCol'] ]),
                ...SetStyle ([ ...GetStyle ('background-image', GetFilesPaths ('jpg')), ...GetStyle ('box-shadow') ]),
            '>',
                ...IsString ($is_archive) ? [
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

    function GetModalContainerList ($is_input = '') {
        return IsArray (GetJsonFile ($is_input)) ? array_map (function ($is_index) use ($is_input) {
            $is_function = SetTarget ([ 'get', 'modal', $is_input, 'container' ]);
            if (function_exists ($is_function))
                return implode ('', GetModalContainer ([ 'content' => ($is_function) ($is_index, 'modal'), 'title' => $is_index ]));
        }, GetJsonFile ($is_input)) : [];
    };

    function GetModalFormularioContainer ($is_input = '', $is_stage = 'front') {
        $is_content = GetFileArray (SetJsonFilename ($is_input));
        return IsArray ($is_content) ? [
            '<main',
                ...SetClass ([
                    ...in_array ($is_stage, [ 'card' ]) ? [ 'card-inner' ] : [],
                    ...in_array ($is_stage, [ 'modal' ]) ? [] : [],
                    ...in_array ($is_stage, [ 'front' ]) ? [ 'mt-3' ] : [],
                    ...in_array ($is_stage, [ 'inside' ]) ? [] : [],
                    ...P['Gap05'],
                    ...P['WrapSetCol'],
                    'p-0',
                ]),
            '>',
                ...array_map (function ($is_index, $is_key) use ($is_stage) {
                    return implode ('', [
                        '<section', ...SetClass ([ 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                            ...in_array ($is_stage, [ 'modal' ]) ? GetHeadline ([ 'lineup' => 'start', 'content' => $is_index, 'heading' => 3 ]) : [],
                            '<article',
                                ...SetClass ([
                                    ...in_array ($is_stage, [ 'card' ]) ? [ 'card-item' ] : [],
                                    ...in_array ($is_stage, [ 'card', 'inside' ]) ? [ ...$is_key ? [ 'mt-3' ] : [], 'p-0' ] : [],
                                    ...in_array ($is_stage, [ 'front' ]) ? [ 'p-3', ...P['WrapSetCol'], ...P['WrapColorLight'] ] : [],
                                    ...P['Gap03'],
                                ]),
                            '>',
                                ...in_array ($is_stage, [ 'card', 'inside', 'front' ]) ? GetHeadline ([ 'content' => $is_index, 'heading' => 3 ]) : [],
                                ...IsKeyTrue ($is_index, 'container') ? [
                                    '<form',
                                        ...SetClass ([ ...in_array ($is_stage, [ 'card' ]) ? [ 'card-form' ] : [], ...P['Gap02'], ...P['WrapSetCol'] ]),
                                        ...GetFormAttrib (GetProper ($is_index, [ 'action', 'id', 'method', 'target' ])),
                                    '>',
                                        ...array_map (function ($is_index) {
                                            return implode ('', IsArray ($is_index) ? [
                                                '<div', ...SetClass (P['WrapSetCol']), '>',
                                                    ...!IsButtonRow ($is_index) ? [
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
                                                                if (IsKeyTrue ($is_element, 'label')):
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
                                                    ...IsButtonRow ($is_index) ? [ '<div', ...SetClass (P['WrapSetToolbar']), '>' ] : [],
                                                        '<div', ...SetClass (IsButtonRow ($is_index) ? P['WrapSetButton'] : P['WrapSetInput']), '>',
                                                            ...array_map (function ($is_element) use ($is_index) {
                                                                $is_option = [];
                                                                if (in_array ($is_element['selector'], [ 'select' ]))
                                                                    if (KeyExist (Option, SetTarget ($is_element['label'])))
                                                                        $is_option = Option[SetTarget ($is_element['label'])];
                                                                return implode ('', [
                                                                    ...IsKeyTrue ($is_element, 'selector') ? [
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
                                                                                ...IsKeyTrue ($is_element, 'label') ? SetAttrib ($is_element['label'], 'id') : [],
                                                                                ...!IsButtonRow ($is_index) ? [
                                                                                    ...SetStyle ([ 'width' => 'calc(100% / ' . sizeof ($is_index) . ')' ]),
                                                                                ] : [
                                                                                ],
                                                                                ...IsKeyTrue ($is_element, 'disabled') ? [ ' disabled' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'input', 'textarea' ]) ? [
                                                                                    ...IsKeyTrue ($is_element, 'maxlength') ? SetAttrib (strlen ($is_element['maxlength']), 'maxlength') : [],
                                                                                    ...IsKeyTrue ($is_element, 'minlength') ? SetAttrib (strlen ($is_element['minlength']), 'minlength') : [],
                                                                                    ...IsKeyTrue ($is_element, 'placeholder') ? SetAttrib ($is_element['placeholder'], 'placeholder') : [],
                                                                                    ...!in_array ($is_element['type'], [ 'date' ]) ? IsKeyTrue ($is_element, 'value') ? SetAttrib ($is_element['value'], 'value') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...IsKeyTrue ($is_element, 'required') ? [ ' required' ] : [],
                                                                                ...in_array ($is_element['selector'], [ 'textarea' ]) ? [
                                                                                    ...IsKeyTrue ($is_element, 'rows') ? $is_element['rows'] > 1 ? SetAttrib ($is_element['rows'], 'rows') : [] : [],
                                                                                ] : [
                                                                                ],
                                                                                ...IsKeyTrue ($is_element, 'type') ? [  
                                                                                    ...in_array ($is_element['selector'], [ 'button', 'input' ]) && in_array ($is_element['type'], Type) ? SetAttrib ($is_element['type'], 'type') : [],
                                                                                    ...in_array ($is_element['selector'], [ 'input' ]) && in_array ($is_element['type'], [ 'date' ]) ? [
                                                                                        ...IsKeyTrue ($is_element, 'value') ? SetAttrib (GetDateFromExpression ($is_element['value']), [ 'min', 'value' ]) : [],
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
                                                    ...IsButtonRow ($is_index) ? [ '</div>' ] : [],
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
        return [
            ...IsArray (SetArray ($is_input)) ? [
                ...IsArray (SetArray ($is_input)) ? [
                    '<div', ...SetClass ([ 'row-gap-3', 'm-0', 'px-5', 'py-3', ...P['Gap00'], ...P['WrapSetCol'] ]), '>',
                        ...array_map (function ($is_index) use ($is_number) {
                            return implode ('', [
                                '<div', ...SetClass ([ 'p-0', ...P['Col' . $is_number], ...P['Gap01'] ]), '>',
                                    '<h5', ...SetClass ([ ...P['H5'] ]), '>', SetCamel ($is_index), '</h5>',
                                    '<div', ...SetClass ([ 'row-gap-1', ...P['Gap02'], ...P['WrapSetCol'] ]), '>',
                                        ...array_map (function ($is_index) { return implode ('', GetLink ($is_index)); }, GetJsonFile ($is_index)),
                                    '</div>',
                                '</div>',
                            ]);
                        }, SetArray ($is_input)),
                    '</div>',
                ] : [
                ],
                '<div', ...SetClass ([ 'px-5', 'pb-5', ...P['WrapSetCol'] ]), '>',
                    '<div', ...SetClass ([ 'border-top', ...P['WrapSetCol'] ]), '>',
                        '<p', ...SetClass ([ ...P['Text'] ]), '>',
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
        $is_proper = GetProper ($is_input, [ 'cnpj', 'link', 'name' ]);
        return [
            ...IsString ($is_proper['name']) || IsCNPJ ($is_proper['cnpj']) ? [
                '<div', ...SetClass ([ 'p-3', ...P['WrapSetCol'], ...P['WrapColorDark'] ]), '>',
                    '<ul', ...SetClass ([ 'navbar-nav', 'p-0', ...P['Gap01'], ...P['WrapSetCol'] ]), '>',
                        ...IsString ($is_proper['name']) ? [
                            '<li', ...SetClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...IsURL ($is_proper['link']) ? [ '<a', ...SetClass (P['Link']), ...SetAttrib ($is_proper['link'], 'href'), '>' ] : [],
                                    SetCamel ($is_proper['name']),
                                ...IsURL ($is_proper['link']) ? [ '</a>' ] : [],
                            '</li>',
                        ] : [
                        ],
                        ...IsCNPJ ($is_proper['cnpj']) ? [
                            '<li', ...SetClass ([ 'd-inline-block', 'lh-1', 'm-0', 'nav-item', 'p-0', 'text-center' ]), '>',
                                ...IsURL ($is_proper['link']) ? [ '<a', ...SetClass (P['Link']), ...SetAttrib ($is_proper['link'], 'href'), '>' ] : [],
                                    IsCNPJ ($is_proper['cnpj']),
                                ...IsURL ($is_proper['link']) ? [ '</a>' ] : [],
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
            ...IsArray (SetArray ($is_input)) ? [
                ...array_map (function ($is_index) {
                    return implode ('', [
                        '<li', ...SetClass (P['NavItem']), '>',
                            ...GetLink ($is_index),
                        '</li>',
                    ]);
                }, SetArray ($is_input)),
            ] : [
            ],
        ];
    };

    function GetNavbarContainer ($is_input = []) {
        $is_input = SetArray ($is_input);
        sort ($is_input);
        return IsArray ($is_input) ? [

            '<div',
                ...SetAttrib ('scroll-bar'),
                ...SetClass ([
                    'd-flex',
                    'justify-content-start',
                    'w-100',
                    'position-fixed',
                ]),
                ...SetStyle ([
                    'background-color' => '#000000',
                    'height' => '.5rem',
                    'top' => '0',
                    'z-index' => 1,
                ]),
            '>',
                '<div', 
                    ...SetAttrib ('scroll'),
                    ...SetClass ([
                        'd-flex',
                        'justify-content-end',
                    ]),
                    ...SetStyle ([
                        'background-color' => '#ffff00',
                        'height' => '.5rem',
                        'width' => '0',
                    ]),
                '>',
                '</div>',
            '</div>',

            '<div',
                ...SetAttrib ('menu'),
                ...SetClass ([
                    'd-flex',
                    'flex-column',
                    'justify-content-center',
                    'w-100',
                    'position-fixed',
                ]),
                ...SetStyle ([
                    'background-color' => '#f8f9fa',
                    'top' => '.5rem',
                    'z-index' => 2,
                ]),
            '>',

                '<div',
                    ...SetAttrib ('menu-icon'),
                    ...SetClass ([
                        'align-items-center',
                        // 'd-lg-none',
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
                        ...SetClass ([ 'bi-arrow-down-up', 'bi', 'fw-bold', 'text-white' ]),
                        ...SetStyle ([ 'font-size' => '1.25rem' ]),
                    '>',
                    '</i>',
                '</div>',

                '<ul',
                    ...SetStyle ([
                        'width' => '100%',
                    ]),
                '>',
                    ...array_map (function ($is_index) {
                        return implode ('', [
                            '<li', ...SetClass ([ 'nav-item', ...P['Text'] ]), '>',
                                '<a',
                                    ...SetAttrib ('#', 'href'),
                                    ...SetAttrib ([ '#', SetTarget ([ $is_index, 'target' ]) ], 'data-bs-target'),
                                    ...SetAttrib ('modal', 'data-bs-toggle'),
                                    ...SetClass (P['Link']),
                                    ...SetStyle ([ 'color' => '#212529' ]),
                                '>',
                                    SetCamel ($is_index),
                                '</a>',
                            '</li>',
                        ]);
                    }, SetArray ($is_input)),
                '</ul>',

            '</div>',

        ] : [
        ];
    };

    function GetWrapper ($is_input = [], $is_propertie = '') {
        $is_proper = GetProper ($is_propertie, [ 'selector', 'id' ], '');
        $is_selector = in_array ($is_proper['selector'], Selector) ? $is_proper['selector'] : 'section';
        return IsArray (SetArray ($is_input)) ? [
            '<',
                $is_selector,
                ...SetClass ([ ...P['WrapSetCol'] ]),
                ...$is_proper['id'] ? SetAttrib ($is_proper['id']) : [],
            '>',
                ...SetArray ($is_input),
            '</', $is_selector, '>',
        ] : [
        ];
    };

    function GetNumberFormat ($is_input = '') {
        return number_format ($is_input, 2, '.', '');
    };

    function GetDisplay ($is_input = []) {
        $is_proper = GetProper ($is_input, [ 'discount', 'url', 'value' ]);
        $is_divisor = 3;
        $is_discount = 0;
        if (is_numeric ($is_proper['discount'])):
            $is_discount = $is_proper['discount'];
        endif;
        $is_url = '';
        if (is_string ($is_proper['url'])):
            $is_url = preg_match ('/^https:\/\/mpago\.la\/[a-zA-Z0-9]+$/', $is_proper['url']) ? $is_proper['url'] : '';
        endif;
        $is_value = 0;
        if (is_numeric ($is_proper['value'])):
            $is_value = $is_proper['value'];
        endif;
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
                        '<p', ...SetClass ([ 'wrapper-principal', ...P['TextSetDisabled'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                            'R$', '<span', ...SetClass ([ 'principal' ]), '>', GetNumberFormat ($is_value), '</span>',
                        '</p>',
                    ] : [
                    ],
                    '<div', ...SetClass ([ 'wrapper-valor', ...P['WrapSetCol'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                        '<h3', ...SetClass ([ 'wrapper-negociado', ...P['H3'] ]), '>',
                            'R$', '<span', ...SetClass ([ 'negociado' ]), '>', GetNumberFormat ($is_final), '</span>',
                        '</h3>',
                        ...$is_discount ? [
                            '<h6', ...SetClass ([ 'wrapper-desconto', 'ms-1', 'mt-1', ...P['H6'] ]), '>',
                                '%off', '<span', ...SetClass ([ 'desconto' ]), '>', GetNumberFormat ($is_discount), '</span>',
                            '</h6>',
                        ] : [
                        ],
                    '</div>',
                    ...$is_divisor ? [
                        '<p', ...SetClass ([ 'wrapper-parcelado', ...P['Text'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
                            'Em ', $is_divisor, ' x R$', '<span', ...SetClass ([ 'parcelado' ]), '>', GetNumberFormat ($is_final / $is_divisor), '</span>', ' sem juros.',
                        '</p>',
                    ] : [
                    ],
                    ...$is_value - $is_final ? [
                        '<p', ...SetClass ([ 'wrapper-economia', ...P['Text'] ]), ...SetStyle ([ 'width' => 'fit-content' ]), '>',
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
        return IsArray ($is_proper['content']) ? [
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
                    return implode ('', IsString ($is_index) ? [
                        '<li',
                            ...SetClass ([
                                ...in_array ($is_proper['lineup'], [ 'start' ]) ? [ 'text-lg-start' ] : [],
                                ...in_array ($is_proper['lineup'], [ 'end' ]) ? [ 'text-lg-end' ] : [],
                                ...in_array ($is_proper['bullet'], [ 'yes' ]) ? [ 'list-group-item', 'px-0', 'py-2' ] : [ 'p-0' ],
                                ...GetSubstring (TextSolid, $is_proper['color']),
                                'bg-transparent',
                                'm-0',
                                'text-center',
                            ]),
                            ...SetStyle (in_array ($is_proper['shadow'], [ 'yes' ]) ? GetStyle ('text-shadow') : []),
                        '>',
                            ...in_array ($is_proper['bullet'], [ 'yes' ]) ? sizeof ($is_proper['content']) < 2 ? [ 'PARÁGRAFO ÚNICO: ' ] : [] : [],
                            IsURL ($is_index) ? SetLink ($is_index) : SetHighlight ($is_index),
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
        return KeyExist ($is_input['content'], 'title') ? [
            ...IsArray (SetArray ($is_input['content']['title'])) ? [
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
                }, SetArray ($is_input['content']['title'])),
            ] : [
            ],
        ] : [
        ];
    };

    function GetSubstring ($is_array = [], $is_input = '') {
        if (in_array ($is_input, [ 'white' ])) $is_input = 'light';
        if (in_array ($is_input, [ 'black' ])) $is_input = 'dark';
        if (is_array ($is_array))
            if (is_string ($is_input))
                foreach ($is_array as $is_index)
                    if (str_contains ($is_index, trim ($is_input)))
                        return [ $is_index ];
        return [];
    };

    function GetHeadlineSubtitle ($is_input = []) {
        return KeyExist ($is_input['content'], 'subtitle') ? [
            ...IsArray (SetArray ($is_input['content']['subtitle'])) ? [
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
                            SetHighlight ($is_index),
                        '</p>',
                    ]);
                }, SetArray ($is_input['content']['subtitle'])),
            ] : [
            ],
        ] : [
        ];
    };

    function GetHeadlineDescription ($is_input = []) {
        return KeyExist ($is_input['content'], 'description') ? [
            ...IsArray (SetArray ($is_input['content']['description'])) ? [
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
            if (!in_array ($is_index, SetArray ($is_excluded)))
                $is_attrib = array_merge ($is_attrib, GetProper ($is_input, $is_index));
        return $is_attrib;
    };

    function GetHeadline ($is_input = []) {
        $is_proper = GetHeadlineProper ($is_input);
        $is_subtitle = $is_description = false;
        if (KeyExist ($is_proper['content'], 'subtitle'))
            if (IsArray (SetArray ($is_proper['content']['subtitle'])))
                $is_subtitle = true;
        if (KeyExist ($is_proper['content'], 'description'))
            if (IsArray (SetArray ($is_proper['content']['description'])))
                $is_description = true;
        $is_content = [
            ...$is_description ? [ '<div', ...SetClass (P['WrapSetCol']), '>' ] : [],
                ...GetHeadlineTitle ($is_proper),
                ...GetHeadlineSubtitle ($is_proper),
            ...$is_description ? [ '</div>' ] : [],
            ...GetHeadlineDescription ($is_proper),
        ];
        return [
            ...IsArray ($is_content) ? [
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
        if (KeyExist ($is_proper['content'], 'subtitle'))
            if (IsArray (SetArray ($is_proper['content']['subtitle'])))
                $is_subtitle = true;
        if (KeyExist ($is_proper['content'], 'description'))
            if (IsArray (SetArray ($is_proper['content']['description'])))
                $is_description = true;
        $is_content = [
            ...$is_description ? [ '<div', ...SetClass (P['WrapSetCol']), '>' ] : [],
                ...$is_subtitle || $is_description ? GetHeadlineTitle ($is_proper) : [],
                ...GetHeadlineSubtitle ($is_proper),
            ...$is_description ? [ '</div>' ] : [],
            ...GetHeadlineDescription ($is_proper),
        ];
        return [
            ...IsArray ($is_content) ? [
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
            ...IsIndexedArray ($is_input) ? array_map (function ($is_index) {
                return implode ('', [ '<option', ...SetAttrib ($is_index, 'value'), '>', SetCamel ($is_index), '</option>' ]);
            }, $is_input) : array_map (function ($is_index) {
                return implode ('', [
                    ...is_string ($is_index) ? [ '<option', ...SetAttrib ($is_index, 'value'), '>', SetCamel ($is_index), '</option>' ] : [],
                    ...IsIndexedArray ($is_index) ? [
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
            ...IsArray ($is_input) ? [
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
                ...KeyExist ($is_input, 'container') ? [
                    ...HasFilledKeys ($is_input['container']) ? [
                        '<section', ...SetClass (P['WrapSetCol']), '>',
                            ...array_map (function ($is_index) use ($is_master) {
                                $is_slave = GetID ();
                                return implode ('', [
                                    '<article', ...SetClass ([ 'accordion-item', 'w-100' ]), '>',
                                        ...KeyExist ($is_index, 'title') ? [
                                            ...Istrue ($is_index['title']) ? [
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
                                        ...IsArray (GetHeadline ([ 'content' => $is_index ])) ? [
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
        return IsArray (GetHeadline ([ 'content' => $is_input ])) ? [
            '<div', ...SetClass ([ 'px-3', 'px-lg-5', ...P['WrapSetCol'] ]), '>',
                ...GetHeadline ([ 'content' => $is_input, 'heading' => $is_heading ]),
            '</div>',
        ] : [
        ];
    };

    function GetModalArticleTemplate ($is_input = []) {
        return implode ('', [
            ...IsArray ($is_input) ? [
                ...GetHeadlineTemplate ($is_input, 4),
                ...KeyExist ($is_input, 'container') ? [
                    ...IsArray ($is_input['container']) ? [
                        '<section', ...SetClass ([ 'wrapper', ...P['WrapSetCol'] ]), '>',
                            ...array_map (function ($is_index, $is_key) {
                                $is_number = GetRandom (range (0, sizeof (SmallCollection) - 1));
                                $is_classes = [ BackgroundSubtle[$is_number], BorderSubtle[$is_number], TextEmphasis[$is_number] ];
                                $is_gallery = false;
                                if (KeyExist ($is_index, 'gallery'))
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
            ...KeyExist ($is_input, 'container') ? [
                ...IsArray ($is_input['container']) ? [
                    '<section', ...SetClass ([ 'card-container', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                        ...array_map (function ($is_index) {
                            $is_gallery = [];
                            if (KeyExist ($is_index, 'gallery'))
                                $is_gallery = IsPathListExist ($is_index['gallery']);
                            $is_content = [
                                ...GetHeadline ([ 'content' => $is_index, 'heading' => 5 ]),
                                ...GetDisplay (GetProper ($is_index, [ 'discount', 'url', 'value' ])),
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
        $is_input = GetFileArray (SetJsonFilename ($is_input));
        return IsArray ($is_input) ? [
            '<section', ...SetClass ([ 'mt-3', 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...GetHeadlineTemplate ($is_index, 3),
                        ...KeyExist ($is_index, 'container') ? [
                            ...IsArray ($is_index['container']) ? array_map (function ($is_index) use ($is_function) {
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
        $is_input = GetFileArray ($is_input);
        return IsArray ($is_input) ? [
            '<main', ...SetClass ([ 'mt-3', 'p-0', ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) {
                    return implode ('', [
                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 2, 'lineup' => 'start' ]),
                        ...KeyExist ($is_index, 'container') ? [
                            ...IsArray ($is_index['container']) ? [
                                ...array_map (function ($is_index) {
                                    return implode ('', [
                                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                                        ...KeyExist ($is_index, 'container') ? [
                                            ...IsArray ($is_index['container']) ? [
                                                '<section', ...SetClass ([ ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                                                    ...array_map (function ($is_index) {
                                                        if (IsArray (GetHeadline ([ 'content' => $is_index ]))):
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
        return IsString ($is_input) ? [
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
        return array_values (array_filter (SetArray (GetFileArray (SetJsonFilename ($is_input))), function ($is_index) {
            if (IsPathExist (SetJsonFilename ($is_index)))
                return $is_index;
        }));
    };

    function GetModalContratoContent ($is_input = []) {
        return IsArray ($is_input) ? [
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
        return IsArray ($is_input) ? [
            ...KeyExist ($is_input, 'gallery') ? GetSlider ($is_input['gallery'], 15) : [],
            ...GetAccordionHeadline ([
                'bullet' => 'yes',
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),            
            ...GetDisplay (GetProper ($is_input, [ 'discount', 'url', 'value' ])),
        ] : [
        ];
    };

    function GetModalInstitutionalContent ($is_input = []) {
        return IsArray ($is_input) ? [
            ...GetAccordionHeadline ([
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),
        ] : [
        ];
    };

    function GetModalLocalizacaoContent ($is_input = []) {
        return IsArray ($is_input) ? [
            ...KeyExist ($is_input, 'gallery') ? GetSlider ($is_input['gallery'], 15) : [],
            ...GetAccordionHeadline ([
                'content' => $is_input,
                'heading' => 5,
                'lineup' => 'start',
            ]),
        ] : [
        ];
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

    function GetModalLocalizacaoContainer ($is_input = []) {
        return GetModalAccordionContentTemplate ($is_input, 'GetModalLocalizacaoContent');
    };

    function GetModalAccordionContentTemplate ($is_input = [], $is_function = '') {
        $is_input = GetFileArray (SetJsonFilename ($is_input));
        return IsArray ($is_input) ? [
            '<main', ...SetClass ([ 'm-0', 'p-0', ...P['Gap05'], ...P['WrapSetCol'] ]), '>',
                ...array_map (function ($is_index) use ($is_function) {
                    return implode ('', [
                        ...GetHeadline ([ 'content' => $is_index, 'heading' => 3, 'lineup' => 'start' ]),
                        ...KeyExist ($is_index, 'container') ? [
                            ...IsArray ($is_index['container']) ? [
                                '<section', ...SetClass ([ ...P['Gap05'], ...P['WrapSetCol'] ]), '>',
                                    ...array_map (function ($is_index) use ($is_function) {
                                        $is_master = GetID ();
                                        return implode ('', HasFilledKeys ($is_index) ? [
                                            '<article', ...SetClass ([ ...P['Gap03'], ...P['WrapSetCol'] ]), '>',
                                                ...GetHeadline ([ 'content' => $is_index, 'heading' => 4, 'lineup' => 'start' ]),
                                                ...KeyExist ($is_index, 'container') ? [
                                                    ...IsArray ($is_index['container']) ? [
                                                        '<section', ...SetAttrib ($is_master, 'id'), ...SetClass ([ 'accordion' ]), '>',
                                                            ...array_map (function ($is_index) use ($is_function, $is_master) {
                                                                $is_slave = GetID ();
                                                                return implode ('', [
                                                                    ...KeyExist ($is_index, 'title') ? [
                                                                        ...IsArray ($is_index['title']) ? [
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
            ...IsArray (GetFilesPaths ('jpg')) ? [
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
            ...GetProper ($is_proper, 'headline', 'headline.json'),
            ...GetProper ($is_proper, 'keyword'),
            ...GetProper ($is_proper, 'left-margin', 0),
            ...GetProper ($is_proper, 'modal-container'),
            ...GetProper ($is_proper, 'script', 'script.js'),
            ...GetProper ($is_proper, 'style', 'style.css'),
        ];
        $is_headline = GetFileArray ($is_proper['headline']);        
        return [
            ...IsArray (SetArray ($is_input)) ? [
                '<!doctype html>',
                '<html',
                    ...SetClass (P['Html']),
                    ' lang=\'en\'',
                    ' data-bs-theme=\'dark\'',
                    // ' data-bs-theme=\'light\'',
                '>',
                    '<head>',
                        ...IsArray (SetArray ($is_headline)) ? [
                            '<title>',
                                implode (' | ', array_map (function ($is_index) use ($is_headline) {
                                    if (KeyExist ($is_headline, $is_index))
                                        if (IsArray (SetArray ($is_headline[$is_index])))
                                            return SetCamel ($is_headline[$is_index]);
                                }, [ 'title', 'subtitle', 'description' ])),
                            '</title>',
                        ] : [
                        ],
                        '<meta', ...SetAttrib ('utf-8', 'charset'), '>',
                        ...IsArray (SetArray ($is_headline)) ? [
                            ...array_map (function ($is_index) use ($is_headline) {
                                if (KeyExist ($is_headline, $is_index)):
                                    if (IsArray (SetArray ($is_headline[$is_index]))):
                                        $is_name = [ ...in_array ($is_index, [ 'title' ]) ? [ 'author' ] : [], ...in_array ($is_index, [ 'subtitle' ]) ? [ 'description' ] : [] ];
                                        return implode ('', [ '<meta', ...SetAttrib ($is_name, 'name'), ...SetAttrib ($is_headline[$is_index], 'content'), '>' ]);
                                    endif;
                                endif;
                            }, [ 'title', 'subtitle' ]),
                        ] : [
                        ],
                        ...IsArray (SetArray ($is_proper['keyword'])) ? [
                            '<meta',
                                ...SetAttrib ('keywords', 'name'),
                                ...SetAttrib (implode (', ', SetArray ($is_proper['keyword'])), 'content'),
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
                        ...$is_proper['left-margin'] > 0 ? [
                            '<div',
                                ...SetClass ([ 'd-flex', 'flex-column', 'justify-content-center' ]),
                                ...SetStyle ([ 'width' => 'calc(100% - ' . $is_proper['left-margin'] . 'rem)' ]),
                            '>',
                        ] : [
                        ],
                            ...SetArray ($is_input),
                        ...$is_proper['left-margin'] > 0 ? [ '</div>' ] : [],
                        ...IsArray (SetArray ($is_proper['modal-container'])) ? SetArray ($is_proper['modal-container']) : [],
                        ...SetScript ($is_proper['script']),
                    '</body>',
                '</html>',
            ] : [
            ],
        ];
    };

?>