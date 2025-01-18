import {
    SetColorMouseover,
    SetMouseEvent,
    SetStyleTransition,
} from './__.js';

export const GetListGroupLoaded = () => {
    document.querySelectorAll ('.list-group-item').forEach (ListGroupItem => {
        SetMouseEvent (ListGroupItem, {
            'mouseover' : [ 'px-3', 'px-lg-3', 'shadow-sm', ...SetColorMouseover ('primary') ],
        });
        SetStyleTransition (ListGroupItem);
    });
};