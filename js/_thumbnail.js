import {
    SetCarouselWrapper,
    SetCloseButton,
    SetSocialNetwork,
    SetStyle,
    SetStyleFilterMouseout,
    SetStyleFilterMouseover,
    SetStyleTransition,
    SetWrapper,
} from './__.js';

export const GetThumbnailLoaded = () => {
    document.querySelectorAll ([ '#thumbnail', '.thumbnail-inner', '.thumbnail-item' ].join ('>')).forEach (Element => {
        if (Element) {
            const ThumbnailFilter = Element.querySelector ('.thumbnail-filter');
            const ThumbnailBackground = Element.querySelector ('.thumbnail-background');
            SetStyleTransition (ThumbnailFilter);
            SetStyleTransition (ThumbnailBackground);
            const ThumbnailWidth = Element.getBoundingClientRect ()['width'] + 'px';
            SetStyle (Element, { 'height' : ThumbnailWidth });
            Element.addEventListener ('mouseover', Event => {
                Element['classList'].add ('active');
                SetStyle (Element, { 'cursor' : 'pointer' });
                SetStyleFilterMouseover (ThumbnailBackground);
                ThumbnailFilter['style']['opacity'] = 1 / 2 / 2 / 2;
                Event.stopPropagation ();
            });
            Element.addEventListener ('mouseout', Event => {
                Element['classList'].remove ('active');
                SetStyle (Element, { 'cursor' : 'default' });
                SetStyleFilterMouseout (ThumbnailBackground);
                ThumbnailFilter['style']['opacity'] = 0;
                Event.stopPropagation ();
            });
            Element.addEventListener ('click', Event => {
                SetStyle (document['body'], { 'overflow' : 'hidden' });
                const Wrapper = SetWrapper ();
                SetCloseButton (Wrapper);
                SetSocialNetwork (Wrapper);
                SetCarouselWrapper (Wrapper, {
                    'father' : document.querySelector ([ '#thumbnail', '.thumbnail-inner' ].join ('>')),
                });
                SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
                Event.stopPropagation ();
            });
        };
    });
};

export const GetThumbnailResize = () => {
    document.querySelectorAll ([ '#thumbnail', '.thumbnail-inner', '.thumbnail-item' ].join ('>')).forEach (Element => {
        if (Element) {
            const ThumbnailWidth = Element.getBoundingClientRect ()['width'] + 'px';
            SetStyle (Element, { 'height' : ThumbnailWidth });
        };
    });
};