import {
    GetStyle,
    GetURLImage,
    SetCloseButton,
    SetDropWrapper,
    SetHeadlineWrapper,
    SetMouseEvent,
    SetSocialNetwork,
    SetStyle,
    SetStyleTransition,
    SetWrapper,
    SetWrapperCleaner,
} from './__.js'
export const HeadlinePath = [ '#headline', '#wrap' ];
export const HeadlineBrandPath = [ ...HeadlinePath, '#brand' ];
export const HeadlineHeaderPath = [ ...HeadlinePath, 'header' ];
export const GetHeadlineLoaded = () => {
    const SetHeadlineHeader = (Element = '', CallBack = () => {}) => {
        if (Element instanceof HTMLElement) {
            SetMouseEvent (Element);
            Element.addEventListener ('click', Event => {
                CallBack ();
                Event.stopPropagation ();
            });
        };
    };
    const SetHeadlineBrand = (Element = '', CallBack = () => {}) => {
        if (Element instanceof HTMLElement) {
            Element.addEventListener ('mouseover', Event => {
                SetStyle (Element, { 'cursor' : 'pointer' });
                Element['style']['filter'] = 'drop-shadow(0 0 25px rgba(255, 255, 255, 1))';
                Event.stopPropagation ();
            });
            Element.addEventListener ('mouseout', Event => {
                SetStyle (Element, { 'cursor' : 'default' });
                Element['style']['filter'] = '';
                Event.stopPropagation ();
            });
            Element.addEventListener ('click', Event => {
                CallBack ();
                Event.stopPropagation ();
            });
        };
    };
    const SetWrapperCreator = () => {
        SetStyle (document['body'], { 'overflow' : 'hidden' });
        const Wrapper = SetWrapper ({
            'background-image' : GetURLImage (document.querySelector ([ ...HeadlinePath ].join ('>'))),
        });
        SetCloseButton (Wrapper);
        SetDropWrapper (Wrapper);
        SetSocialNetwork (Wrapper);
        const Wrap = document.createElement ('div');
        Wrapper.appendChild (Wrap);
        Wrap['classList'].add (...[
            'align-items-center',
            'd-flex',
            'flex-column',
            'flex-lg-row',
            'gap-lg-3',
            'justify-content-center',
            'justify-content-lg-start',
        ]);
        SetStyle (Wrap, {
            'height' : 'calc(100% - 5rem * 2)',
            'left' : '50%',
            'position' : 'fixed',
            'top' : '50%',
            'transform' : 'translate(-50%, -50%)',
            'width' : 'calc(100% - 5rem * 2)',
        });
        if (document.querySelector ([ ...HeadlineBrandPath ].join ('>'))) {
            const HeadlineBrandStyle = GetStyle (document.querySelector ([ ...HeadlineBrandPath, 'div' ].join ('>')));
            const HeadlineBrand = document.createElement ('div');
            Wrap.appendChild (HeadlineBrand);
            SetStyle (HeadlineBrand, {
                ...'height' in HeadlineBrandStyle ? { 'height' : HeadlineBrandStyle['height'] } : {},
                ...'width' in HeadlineBrandStyle ? { 'width' : HeadlineBrandStyle['width'] } : {},
            });
            SetStyleTransition (HeadlineBrand);
            SetHeadlineBrand (HeadlineBrand, () => {
                SetWrapperCleaner (Wrapper);
            });
            const HeadlineBrandImage = document.createElement ('div');
            HeadlineBrand.appendChild (HeadlineBrandImage);
            SetStyle (HeadlineBrandImage, HeadlineBrandStyle);
        };
        if (document.querySelector ([ ...HeadlineHeaderPath ].join ('>'))) {
            const HeadlineHeader = document.createElement ('header');
            Wrap.appendChild (HeadlineHeader);
            SetHeadlineWrapper (HeadlineHeader, {
                'father' : document.querySelector ([ ...HeadlinePath ].join ('>')),
                'flush' : false,
            });
            SetHeadlineHeader (HeadlineHeader, () => {
                SetWrapperCleaner (Wrapper);
            });
        };
        SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
    };
    if (document.querySelector ([ ...HeadlineBrandPath ].join ('>'))) {
        const HeadlineBrand = document.querySelector ([ ...HeadlineBrandPath ].join ('>'));
        SetStyleTransition (HeadlineBrand);
        SetHeadlineBrand (HeadlineBrand, () => {
            SetWrapperCreator ();
        });
    };
    if (document.querySelector ([ ...HeadlineHeaderPath ].join ('>'))) {
        const HeadlineHeader = document.querySelector ([ ...HeadlineHeaderPath ].join ('>'));
        SetHeadlineHeader (HeadlineHeader, () => {
            SetWrapperCreator ();
        });
    };
};