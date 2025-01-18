import {
    SetCarouselWrapper,
    SetCloseButton,
    SetMouseEvent,
    SetSocialNetwork,
    SetStyle,
    SetWrapper,
} from './__.js';

export const GetCarrosselLoaded = () => {
    const CarouselPath = [ '#carrossel', '.carousel' ];
    document.querySelectorAll ([ ...CarouselPath, '.carousel-inner', '.carousel-item' ].join ('>')).forEach (CarouselItem => {
        SetMouseEvent (CarouselItem);
        CarouselItem.addEventListener ('click', Event => {
            SetStyle (document['body'], { 'overflow' : 'hidden' });
            const Wrapper = SetWrapper ();
            SetCloseButton (Wrapper);
            SetSocialNetwork (Wrapper);
            if (document.querySelector ([ ...CarouselPath ].join ('>')))
                SetCarouselWrapper (Wrapper, { 'father' : document.querySelector ([ ...CarouselPath ].join ('>')) });
            SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
            Event.stopPropagation ();
        });
    });
};