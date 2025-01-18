import {
    GetClasses,
    SetCarouselWrapper,
    SetCloseButton,
    SetHeaderWrapper,
    SetMouseEvent,
    SetSocialNetwork,
    SetStyle,
    SetStyleFilterMouseout,
    SetStyleFilterMouseover,
    SetStyleTransition,
    SetWrapper,
} from './__.js';

export const GetArticleLoaded = () => {
    document.querySelectorAll ('.wrapper').forEach (WrapperElement => {
        WrapperElement.querySelectorAll ('.wrap').forEach (WrapElement => {
            function SetEventListener () {
                SetStyle (document['body'], { 'overflow' : 'hidden' });
                const Wrapper = SetWrapper ();
                SetCloseButton (Wrapper);
                SetSocialNetwork (Wrapper);
                if (WrapElement.querySelector ('.headline'))
                    SetHeaderWrapper (Wrapper, { 'father' : WrapElement.querySelector ('.headline') });
                if (WrapElement.querySelector ([ '.gallery', '.carousel' ].join ('>')))
                    SetCarouselWrapper (Wrapper, { 'father' : WrapElement.querySelector ([ '.gallery', '.carousel' ].join ('>')) });
                SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
            };
            if (WrapElement.querySelector ('.headline')) {
                SetMouseEvent (WrapElement.querySelector ('.headline'), {
                    'mouseover' : [ 'bg-white', 'border-black', 'text-black' ],
                    'mouseout' : GetClasses (WrapElement.querySelector ('.headline')),
                });
                SetStyleTransition (WrapElement.querySelector ('.headline'));
                WrapElement.querySelector ('.headline').addEventListener ('click', Event => {
                    SetEventListener ();
                    Event.stopPropagation ();
                });
            };
            if (WrapElement.querySelector ('.gallery')) {
                WrapElement.querySelectorAll ([ '.gallery', '.carousel', '.carousel-inner', '.carousel-item' ].join ('>')).forEach (CarouselItem => {
                    SetStyleTransition (CarouselItem);
                    CarouselItem.addEventListener ('mouseover', Event => {
                        SetStyleFilterMouseover (CarouselItem);
                        Event.stopPropagation ();
                    });
                    CarouselItem.addEventListener ('mouseout', Event => {
                        SetStyleFilterMouseout (CarouselItem);
                        Event.stopPropagation ();
                    });
                    CarouselItem.addEventListener ('click', Event => {
                        SetEventListener ();
                        Event.stopPropagation ();
                    });
                });
            };
        });
    });
};