import {
    GetComputedStyle,
    GetGradient,
    GetScreenSize,
    GetScrollNumber,
    SetStyle,
    SetStyleTransition,
    GetRGBArray,
    SetRGBToHex
} from './__.js';

// export const ScrollBar = '#scroll';
// export const Menu = '#menu';
// export const PlusButton = '#plusbutton';
// export const Wrapper = '#wrapper';

export const ScrollColor = {
    Start : SetRGBToHex (GetRGBArray (GetComputedStyle (document.querySelector ('#scroll'), 'background-color'))),
    End : '#dc3545',
};

export const ScrollGradient = GetGradient (ScrollColor['Start'], ScrollColor['End']);

export const GetScroller = () => {
    const ScrollNumber = GetScrollNumber () < 100 ? GetScrollNumber () : 100;
    SetStyle (document.querySelector ('#scroll'), {
        'backgroundColor' : ScrollGradient[ScrollNumber],
        'width' : ScrollNumber + '%',
    });
};

// export const PlusButtonBackground = {
    // Start : GetComputedStyle (document.querySelector (Menu), 'background-color'),
//     End : 'rgba(255, 255, 255, calc(.5 + .25 / 2))',
// };

// let Larger = 8 * 7;
// let Smaller = parseInt (GetComputedStyle (document.querySelector (PlusButton), 'height').replace (/\D/g, ''));
//     Smaller += 8 * 5;

// export const SetPlusButton = (Input = 'Start') => {
//     const True = [ 'Start' ].includes (Input);
//     if (document.querySelector (Menu))
//         SetStyle (document.querySelector (Menu), {
//             'backgroundColor' : True ? PlusButtonBackground['Start'] : PlusButtonBackground['End'],
//             'boxShadow' : True ? '0 0 5px 0 rgba(0, 0, 0, 0)' : '0 0 5px 0 rgba(0, 0, 0, calc(.75 + .25 / 2))',
//         });
// };

// export const SetInner = (Input = '') => {
//     SetStyle (document.querySelector (Menu), { 'height' : 'calc(' + Input + ')' });
//     SetStyle (document.querySelector (Wrapper), { 'margin' : 'calc(8px + ' + Input + ') 0 0 0' });
// };

// export const SetLarger = () => SetInner ('8px * 6');

// export const SetSmaller = () => SetInner ('30px + 8px * 4');

// export const SetEveryone = () => {
//     if (window['innerWidth'] > GetScreenSize ()) {
//         SetLarger ();
//         if (window['pageYOffset'] < Larger) SetPlusButton ('Start');
//         if (window['pageYOffset'] > Larger) SetPlusButton ('End');
//     };
//     if (window['innerWidth'] <= GetScreenSize ()) {
//         SetSmaller ();
//         if (window['pageYOffset'] < Smaller) SetPlusButton ('Start');
//         if (window['pageYOffset'] > Smaller) SetPlusButton ('End');
//     };
//     document.querySelector (PlusButton).addEventListener ('mouseover', () => {
//         window.scrollTo ({ top: 0, behavior: 'smooth' });
//     });
//     let Status = false;
//     document.querySelector (PlusButton).addEventListener ('click', () => {
//         Status = !Status ? true : false;
//         if (window['innerWidth'] > GetScreenSize ()) SetLarger ();
//         if (window['innerWidth'] <= GetScreenSize ()) {
//             if (!Status) SetSmaller ();
//             if (Status) {
//                 const Height = '30px + 8px * ' + (document.querySelectorAll ([ Menu, 'ul', 'li' ].join ('>'))['length'] * 2 + 9);
//                 SetStyle (document.querySelector (Menu), { 'height' : 'calc(' + Height + ')' });
//                 SetStyle (document.querySelector (Wrapper), { 'margin' : 'calc(8px + ' + Height + ') 0 0 0' });
//             };
//         };
//     });
// };

export const GetNavbarLoaded = () => {
    // if (document.querySelector ('#navbar')) {
    //     SetEveryone ();
    //     SetStyleTransition (document.querySelector (Menu));
    //     SetStyleTransition (document.querySelector (Wrapper));
    // };
};

export const GetNavbarResize = () => {
    // if (document.querySelector ('#navbar')) {
    //     SetEveryone ();
    //     window.scrollTo ({ top : 0, behavior : 'smooth' });
    // };
};

export const GetNavbarScroll = () => {
    // SetEveryone ();
    GetScroller ();
};