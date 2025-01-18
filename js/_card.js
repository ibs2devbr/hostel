import {
    GetClasses,
    SetAsteriskButton,
    SetCarouselWrapper,
    SetCloseButton,
    SetDisplayWrapper,
    SetHeaderWrapper,
    SetMouseEvent,
    SetSocialNetwork,
    SetStyle,
    SetStyleFilterMouseout,
    SetStyleFilterMouseover,
    SetStyleTransition,
    SetWrapper,
} from './__.js';

export const GetCardLoaded = () => {
    document.querySelectorAll ('.card-container').forEach (CardContainer => {
        CardContainer.querySelectorAll ('.card-wrapper').forEach (CardWrapper => {
            CardWrapper.querySelectorAll ([ '.carousel', '.carousel-inner', '.carousel-item' ].join ('>')).forEach (CarouselItem => {
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
                    SetStyle (document['body'], { 'overflow' : 'hidden' });
                    const Wrapper = SetWrapper ();
                    SetCloseButton (Wrapper);
                    SetSocialNetwork (Wrapper);
                    if (CardWrapper.querySelector ('.card-content'))
                        SetHeaderWrapper (Wrapper, { 'father' : CardWrapper.querySelector ('.card-content') });
                    if (CardWrapper.querySelector ('.card-content')) {
                        SetDisplayWrapper (Wrapper, {
                            'father' : CardWrapper.querySelector ('.card-content'),
                            'wrapper-mouseover' : [ 'bg-black', 'border-black', 'shadow' ],
                        });
                    };
                    if (CardWrapper.querySelector ('.carousel'))
                        SetCarouselWrapper (Wrapper, { 'father' : CardWrapper.querySelector ('.carousel') });
                    SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
                    Event.stopPropagation ();
                });
            });
            const DisplayPath = [ '.card-content', '.price-display' ];
            if (CardWrapper.querySelector ([ ...DisplayPath ].join ('>'))) {
                SetMouseEvent (CardWrapper.querySelector ([ ...DisplayPath ].join ('>')), {
                    'mouseover' : [ 'bg-white', 'border-black', 'text-black' ],
                    'mouseout' : GetClasses (CardWrapper.querySelector ([ ...DisplayPath ].join ('>'))),
                });
                SetStyleTransition (CardWrapper.querySelector ([ ...DisplayPath ].join ('>')));
                CardWrapper.querySelector ([ ...DisplayPath ].join ('>')).addEventListener ('click', Event => {
                    SetStyle (document['body'], { 'overflow' : 'hidden' });
                    const Wrapper = SetWrapper ();
                    SetCloseButton (Wrapper);
                    SetSocialNetwork (Wrapper);
                    if (CardWrapper.querySelector ('.card-content'))
                        SetAsteriskButton (Wrapper, { 'father' : CardWrapper.querySelector ('.card-content') });
                    if (CardWrapper.querySelector ('.carousel'))
                        SetCarouselWrapper (Wrapper, { 'father' : CardWrapper.querySelector ('.carousel') });
                    SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
                    Event.stopPropagation ();
                });
            };
        });
    });
};