import {
    SetColorMouseover,
    SetMouseEvent,
    SetStyleTransition,
} from './__.js';

export const GetAccordionLoaded = () => {
    document.querySelectorAll ('.accordion-button').forEach (AccordionButton => {
        SetMouseEvent (AccordionButton, {
            'mouseover' : AccordionButton['classList'].contains ('text-decoration-line-through') ? SetColorMouseover ('danger') : SetColorMouseover ('primary'),
        });
        SetStyleTransition (AccordionButton);
    });
};