import {
    SetSocialNetwork,
} from './__.js';

import {
    GetAccordionLoaded,
} from './_accordion.js';

import {
    GetArticleLoaded,
} from './_article.js';

import {
    GetCardLoaded
} from './_card.js';

import {
    GetFormLoaded
} from './_form.js';

import {
    GetHeadlineLoaded
} from './_headline.js';

import {
    GetListGroupLoaded,
} from './_list-group.js';

import {
    GetNavbarLoaded,
    GetNavbarResize,
    GetNavbarScroll,
} from './_navbar.js';

import {
    GetNavLinkLoaded,
} from './_navlink.js';

import {
    GetCarrosselLoaded,
} from './_carrossel.js';

import {
    GetThumbnailLoaded,
    GetThumbnailResize,
} from './_thumbnail.js';

window.addEventListener ('DOMContentLoaded', Event => {
    document['body']['style']['userSelect'] = 'none';
    document.addEventListener ('oncontextmenu', Event => false);
    document.addEventListener ('oncopy', Event => Event.preventDefault ());
    document.addEventListener ('onselectstart', Event => false);
    document.addEventListener ('selectstart', Event => Event.preventDefault ());
    GetAccordionLoaded ();
    GetArticleLoaded ();
    GetNavLinkLoaded ();
    GetCardLoaded ();
    GetFormLoaded ();
    GetHeadlineLoaded ();
    GetListGroupLoaded ();
    GetNavbarLoaded ();
    GetCarrosselLoaded ();
    GetThumbnailLoaded ();
    SetSocialNetwork (document['body']);
});

window.addEventListener ('resize', Event => {
    GetNavbarResize ();
    GetThumbnailResize ();
});

window.addEventListener ('scroll', Event => {
    GetNavbarScroll ();
});