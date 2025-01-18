import {
    SetMouseEvent,
    SetStyleTransition,
} from './__.js';

export const GetNavLinkLoaded = () => {
    document.querySelectorAll ('.nav-link').forEach (NavLink => {
        SetStyleTransition (NavLink);
        SetMouseEvent (NavLink, {
            'mouseover' : [ 'text-danger' ]
        });
    });
};