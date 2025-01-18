<?php

    include_once ('php/_include.php');

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

    define ('Footer', [
        ...GetWrapper (GetWidgetContainer ()),
        ...GetWrapper (GetSignatureContainer ()),
    ]);

    define ('Body', [
        // ...GetWrapper (GetNavbarContainer ([ 'serviços', 'cardápio', 'empresa', 'pontos turisticos' ]), [
        //     'selector' => 'nav', 
        //     'id' => 'navbar',
        // ]),
        ...GetWrapper ([
            ...GetWrapper (Main, [ 'selector' => 'main' ]),
            ...GetWrapper (Footer, [ 'selector' => 'footer' ]),
        ], [ 'id' => 'wrapper' ]),
    ]);

    echo implode ('', GetHtmlContainer (Body, [
        'modal-container' => array_map (function ($is_index) {
            return implode ('', GetModalContainerList ($is_index));
        }, [ 'catalogo', 'contrato', 'formulario', 'institutional', 'localizacao' ]),
        'style' => 'minify.css',
    ]));

?>