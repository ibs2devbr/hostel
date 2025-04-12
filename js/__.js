import {
    Arrival,
    Attribute,
    AttributeCamelCase,
    Departure,
    Special,
    Validation,
    Viacep,
} from './_variables.js';

export const ButtonMargin = '1rem';

export const ButtonWidth = '3rem';

export const IsTrue = (Input = []) => {
    return Input === true;
};

export const IsDefined = (Input = []) => {
    if (Input !== null || typeof Input !== 'undefined') {
        return true;
    };
};

export const IsValid = (Input = []) => {
    if (IsTrue (Input) || IsDefined (Input)) {
        return true;
    };
};

export const IsString = (Input = '') => {
    if (IsValid (Input)) {
        if (typeof Input === 'string') {
            if (Input !== '') {
                return true;
            };
        };
    };
};

export const IsFull = (Input = []) => {
    if (Input !== 0 || Input !== '') {
        return true;
    };
};

export const IsArray = (Input = []) => {
    if (IsValid (Input)) {
        if (Array.isArray (Input)) {
            return true;
        };
    };
};

export const IsObject = (Input = []) => {
    if (IsValid(Input)) {
        if (typeof Input === 'object') {
            if (!Array.isArray(Input)) {
                if (Object.keys(Input)['length']) {
                    return true;
                };
            };
        };
    };
};

export const IsSomething = (Input = []) => {
    return IsArray (Input) || IsString (Input) || IsObject (Input);
};

export const IsBoolean = (Input = []) => {
    if (IsDefined (Input)) {
        if (typeof Input === 'boolean') {
            return true;
        };
    };
};

export const IsDate = (Input = '') => {
    if (IsValid (Input)) {
        const Value = Date.parse (Input);
        return !isNaN (Value) && isFinite (Value) && typeof Value === 'number' ;
    };
    return false;
};

export const IsNumber = (Input = []) => {
    if (IsValid (Input)) {
        if (typeof Number (Input) === 'number') {
            return true;
        };
    };
};

export const GetLastCharacter = (Input = '') => {
    if (IsString (Input)) {
        return Special.includes (Input.charAt (Input['length'] - 1)) ? Input.substring (0, Input['length'] - 1) : Input;
    };
    return '';
};

export const IsFunction = (Input = []) => {
    if (IsValid (Input)) {
        if (typeof Input === 'function') {
            const Treat = Input.toString ().replace (/\s+/g, '');
            return !(Treat === 'function(){}' || Treat === '()=>{}' || Treat === '(Input)=>{}' || Treat === 'Input=>{}');
        };
    };
};

export const SetNodeContent = (Element = '', Value = '') => Element['textContent'] = Element['innerText'] = Element['value'] = Value;

export const GetMillisecond = () => 1000 * 60 * 60 * 24;

export const GetDayTime = (Input = 0) => {
    if (IsNumber (Input)) return GetMillisecond () * Input;
    return 0;
};

export const GetMonthTime = (Input = 0) => {
    if (IsNumber (Input)) return GetMillisecond () * (365 / 12) * Input;
    return 0;
};

export const GetYearTime = (Input = 0) => {
    if (IsNumber (Input)) return GetMillisecond () * 365 * Input;
    return 0;
};

export const GetAge = (Input = '') => {
    if (IsDate (Input)) {
        const Account = new Date ().getTime () - new Date (Input).getTime ();
        return Math.floor (Account / GetYearTime (1));
    };
    return 1;
};

export const GetDateRange = (Start = '', End = '') => {
    if (IsDate (Start) && IsDate (End)) {
        const Account = new Date (End).getTime () - new Date (Start).getTime ();
        return Math.floor (Account / GetDayTime (1));
    };
    return 1;
};

export const GetLocalTime = () => new Date ().getTime () + new Date ().getTimezoneOffset () * 60 * 1000;

export const GetDateFormat = (Input = '', Format = 'usa') => {
    if (Format === 'usa')
        return new Date (Input).toISOString ().slice (0, 10);
    if (Format === 'br')
        return [
            new Date (Date.parse (Input)).getDate ().toString ().padStart (2, '0'),
            (new Date (Date.parse (Input)).getMonth () + 1).toString ().padStart (2, '0'),
            new Date (Date.parse (Input)).getFullYear (),
        ].join('/');
};

export const GetValidField = (Input = '') => {
    for (const Element of Input.querySelectorAll ([ 'input', 'select', 'textarea' ].join (','))) {
        if (Element['classList'].contains ('is-invalid')) return false;
        if (Element['value'] === '') return false;
    };
    return true;
};

export const GetMoneyFormat = (Input = 1) => [ 'r$', Number (Input).toFixed (2) ].join ('').toString ();

export const GetValidTelCarrier = (Input = '') => {
    let Array = {};
    for (let i = 1; i <= 9; i++) {
        if (![ 2, 3, 5 ].includes(i)) {
            for (let j = 1; j <= 9; j++) {
                Array[ [i] + [j] ] = [
                    ...[ 2, 5, 9 ].includes (j) ? [ 'TIM' ] : [],
                    ...[ 3, 6 ].includes (j) ? [ 'Vivo' ] : [],
                    ...[ 1, 7 ].includes (j) ? [ 'Claro' ] : [],
                    ...[ 4, 8 ].includes (j) ? [ 'Oi' ] : [],
                ].join ('');
            };
        };
    };
    const Prefix = {
        ...Array,
        ...{
            '21' : 'Claro',
            '22' : 'TIM',
            '27' : 'Vivo',
            '28' : 'Oi',
        },
        ...{
            '31' : 'TIM',
            '32' : 'Vivo',
            '33' : 'Claro',
            '34' : 'Oi',
            '35' : 'TIM',
            '37' : 'Vivo',
            '38' : 'Oi',
        },
        ...{
            '50' : 'Vivo',
            '51' : 'Claro',
            '53' : 'Oi',
            '54' : 'TIM',
            '55' : 'Vivo',
        },
    };
    const Result = Prefix[GetNumber (Input).substring ('55119'['length'], '55119XX'['length'])];
    if (Result)
        return Result;
    return false;
};

export const GetRange = (Start = 0, End = 1, Prefix = '', Step = 1) => {
    const Array = [];
    for (let i = Start; i <= End; i += Step)
        Array.push ([ ...Prefix !== '' ? [ Prefix.toLowerCase ().replace (/\s+/, '') ] : [], i ].join (''));
    return Array.filter (Index => Index);
};

export const GetHeading = () => GetRange (1, 6, 'h').join (',');

export const GetAllElement = () => {
    return [
        ...GetRange (1, 6, 'h'),
        'a', 'abbr', 'acronym', 'address', 'area', 'article', 'aside', 'audio',
        'b', 'base', 'bdi', 'bdo', 'big', 'blockquote', 'body', 'br', 'button',
        'canvas', 'caption', 'center', 'cite', 'code', 'col', 'colgroup',
        'data', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'dir', 'dl', 'dt',
        'em', 'embed',
        'fencedframe', 'fieldset', 'figcaption', 'figure', 'font', 'footer', 'form', 'frame', 'frameset',
        'head', 'header', 'hgroup', 'hr', 'html',
        'i', 'iframe', 'img', 'input', 'ins',
        'kbd',
        'label', 'legend', 'li', 'link',
        'main', 'map', 'mark', 'marquee', 'menu', 'menuitem', 'meta', 'meter',
        'nav', 'nobr', 'noembed', 'noframes', 'noscript',
        'object', 'ol', 'optgroup', 'option', 'output',
        'p', 'param', 'picture', 'plaintext', 'portal', 'pre', 'progress',
        'q',
        'rb', 'rt', 'rtc', 'ruby',
        's', 'samp', 'script', 'search', 'section', 'select', 'slot', 'small', 'source', 'span', 'strike', 'strong', 'style', 'sub', 'summary', 'sup', 'svg',
        'table', 'tbody', 'td', 'template', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'track', 'tt',
        'u', 'ul',
        'var', 'video',
        'wbr', 'wbr',
        'xmp',
    ];
};

export const GetElement = (Input = '', Type = '#') => {
    if (Input !== '') {
        if (GetAllElement ().includes (Input)) {
            return Input;
        } else if  ([ '#', '.' ].includes (Type)) {
            return [ Type, Input ].join ('').toLowerCase ().replace (/\s+/, '');
        };
    };
    return '';
};

export const GetElementList = (Input = [], Type = '#') => {
    const Array = [];
    for (let i = 0; i < Input['length']; i++)
        Array.push (GetElement (Input[i], Type));
    return Array.join (',');
};

export const GetClasses = (Input = '') => {
    return [
        ...Array.from (Input['classList']).filter (Index => /^bg-.*-subtle$/g.test (Index)),
        ...Array.from (Input['classList']).filter (Index => /^border-.*-subtle$/g.test (Index)),
        ...Array.from (Input['classList']).filter (Index => /^text-.*-emphasis$/g.test (Index)),
        ...Array.from (Input['classList']).filter (Index => /^bg-.*$/g.test (Index)),
        ...Array.from (Input['classList']).filter (Index => /^border-.*$/g.test (Index)),
        ...Array.from (Input['classList']).filter (Index => /^text-.*$/g.test (Index)),
    ];
};

export const SetFadeout = (Element = '', CallBack = () => {}) => {
    const Interval = setInterval (() => {
        if (!parseFloat (getComputedStyle (Element)['opacity'])) {
            clearInterval (Interval);
            CallBack ();
        };
    }, 100);
};

export const GetRemoveChild = Element => {
    if (Element instanceof HTMLElement)
        Element.parentNode.removeChild (Element);
};

export const GetFieldCleaner = (Form = '') => {
    Form.querySelectorAll ([ 'input', 'select', 'textarea' ].join (',')).forEach (Element => {
        Element['classList'].remove (...Validation);
        Element['disabled'] = false;
        Element['value'] = '';
    });
    Form.querySelectorAll (GetElementList (Viacep.filter (Index => Index !== 'cep'))).forEach (Element => Element['disabled'] = true);
    Form.querySelectorAll ('#birth').forEach (Element => SetNodeContent (Element, GetDateFormat (GetLocalTime () - GetYearTime (18))));
    [ ...Arrival, ...Departure ].map (Index => Form.querySelectorAll (GetElement (Index)).forEach (Element => SetNodeContent (Element, GetDateFormat (GetLocalTime () + GetDayTime ([ ...Arrival ].includes (Index) ? 1 : 2)))));
};

export const GetFormFieldCleaner = Form => document.querySelectorAll (Form).forEach (Form => GetFieldCleaner (Form));

export const SetCamel = (Proper = '') => {
    return Proper.replace (/[\s-]([a-z])/g, (Match, Letter) => Letter.toUpperCase ());
};

export const GetStyle = (Element = '') => {
    const Object = {};
    if (Element instanceof HTMLElement) {
        const Style = Element['style'];
        for (let i = 0; i < Style['length']; i++) {
            const Proper = Style.item (i);
            Object[SetCamel (Proper)] = Style.getPropertyValue (Proper);
        };
    };
    return Object;
};

export const SetCapital = (Input = '') => [ Input.toUpperCase ().charAt (0), Input.toLowerCase ().slice (1) ].join ('');

export const SetDragging = (Element = '') => {
    let Dragging = false, OffsetX, OffsetY;
    if (Element instanceof HTMLElement) {
        Element.addEventListener ('mousedown', Event => {
            Dragging = true;
            OffsetX = Event['clientX'] - Element['offsetLeft'];
            OffsetY = Event['clientY'] - Element['offsetTop'];
        });
        document.addEventListener ('mouseup', Event => {
            Dragging = false;
        });
        document.addEventListener ('mousemove', Event => {
            if (Dragging) {
                SetStyle (Element, {
                    'left' : (Event['clientX'] - OffsetX) + 'px',
                    'top' : (Event['clientY'] - OffsetY) + 'px',
                });
            };
        });
    };
};

export const SetTextContent = (Element = '', TextNode = '') => Element.appendChild (document.createTextNode (TextNode['textContent']));

export const SetStyleBackground = (Element = '', Propertie = {}) => {
    const Proper = {
        'background-image' : 'background-image' in Propertie ? Propertie['background-image'] : '',
    };
    if (Proper['background-image'] !== '') {
        SetStyle (Element, {
            'backgroundAttachment' : 'scroll',
            'backgroundImage' : 'url(' + Proper['background-image'] + ')',
            'backgroundPosition' : 'center center',
            'backgroundRepeat' : 'no-repeat',
            'backgroundSize' : 'cover',
        });
    };
};

export const GetURLImage = Element => window.getComputedStyle (Element)['backgroundImage'].replace (/^url\(['"](.+)['"]\)$/i, '$1');

export const SetStyleTransition = (Element = '', Propertie = []) => {
    const Time = [ '.35s', 'ease-in-out' ];
    if (Element instanceof HTMLElement) {
        [ '-moz-transition', '-ms-transition', '-o-transition', '-webkit-transition', 'transition' ].map (Key => {
            SetStyle (Element, {
                [ Key ] : [ Propertie['length'] ? Propertie.map (Proper => [ Proper, ...Time ].join (' ')) : [ 'all', ...Time ].join (' ') ].join (', ')
            });
        });
    };
};

export const SetRemoveProperty = (Element = '', Property = 'transition') => {
    if (Element instanceof HTMLElement)
        Element['style'].removeProperty (Property);
};

export const GetDocumentHeight = () => Math.max (document['body']['offsetHeight'], document['body']['scrollHeight'], document['documentElement']['clientHeight']);

export const GetScrollNumber = () => Math.round (GetScrollTop () / (GetDocumentHeight () - GetWindowHeight ()) * 100);

export const GetScrollPercent = () => [ GetScrollNumber (), '%' ].join('');

export const GetScrollTop = () => Math.max (window['pageYOffset'], document['documentElement']['scrollTop']);

export const GetWindowHeight = () => Math.max (window['innerHeight'], window['screen']['height']);

export const GetWindowWidth = () => Math.max (window['innerWidth'], window['screen']['width']);

// export const GetFunction = {
//     'IsArray' : (Input = '') => IsArray (Input),
//     'IsBoolean' : (Input = '') => IsBoolean (Input),
//     'IsNumber' : (Input = '') => IsNumber (Input),
//     'IsString' : (Input = '') => IsString (Input),
// };

export const GetNumber = (Input = '') => Input ? Input.match (/\d+/g).join ('') : Input;

export const GetLetter = (Input = '') => Input.replace (/[^a-zA-Z]/, '').toString ();

export const SetHexToRGB = (Input = '#ffffff') => {
    if (!/^#[0-9a-fA-F]{6}$/.test (Input)) return false;
    const HexColor = Input.replace ('#', '');
    return {
        Red : parseInt (HexColor.slice (0, 2), 16),
        Green : parseInt (HexColor.slice (2, 4), 16),
        Blue : parseInt (HexColor.slice (4, 6), 16),
    };
};

export const SetRGBToHex = (Color = []) => {
    const R = Color[0].toString (16).padStart (2, '0');
    const G = Color[1].toString (16).padStart (2, '0');
    const B = Color[2].toString (16).padStart (2, '0');
    return `#${ R }${ G }${ B }`;
};

export const GetRGBArray = (Color = '') => {
    const Array = Color.match (/\d+/g);
    return Array ? Array.map (Number) : null;
};

export const GetGradient = (StartColor = '#ffff00', EndColor = '#ff0000', Step = 100) => {
    const Array = [], Interval = {}, Gap = {}, Key = [ 'Red', 'Green', 'Blue' ], Start = SetHexToRGB (StartColor), End = SetHexToRGB (EndColor);
    for (let i = 0; i < Key['length']; i++) {
        const Index = Key[i];
        Interval[Index] = (End[Index] - Start[Index]) / Step,
        Gap[Index] = Interval[Index] < 0 ? Math.round (Interval[Index]) : Math.floor (Interval[Index]);
    };
    for (let i = 0; i < Step; i++) {
        const Target = {}, Color = {};
        for (let j = 0; j < Key['length']; j++) {
            const Index = Key[j];
            Color[Index] = Start[Index] + Gap[Index] * i;
            Target[Index] = Gap[Index] <= 0 ? (Color[Index] <= 0 ? 0 : Color[Index]) : (Color[Index] <= 255 ? Color[Index] : 255);
        };
        Array.push (SetRGBToHex ([ Target['Red'], Target['Green'], Target['Blue'] ]));
    };
    return Array;
};

export const SetAttribNode = (Propertie = {}) => {
    const Proper = {
        'attribute' : 'attribute' in Propertie ? Propertie['attribute'] : 'type',
        'element' : 'element' in Propertie ? Propertie['element'] : '',
        'value' : 'value' in Propertie ? Propertie['value'] : 'button',
    };
    var Attrib = document.createAttribute (Proper['attribute']);
    Attrib['value'] = Proper['value'];
    Proper['element'].setAttributeNode (Attrib);
};

export const SetStyle = (Element = '', Propertie = {}) => {
    Object.keys (Propertie).map (Key => {
        if (AttributeCamelCase.includes (Key))
            if (Element instanceof HTMLElement)
                Element['style'][Key] = Propertie[Key];
    });
};

export const GetComputedStyle = (Element = '', Key = '') => {
    if (Attribute.includes (Key)) {
        if (Element instanceof HTMLElement)
            return window.getComputedStyle (Element)[Key];
    };
    return '';
};

export const SetStyleFilterMouseover = (Element = '') => {
    SetStyle (Element, {
        'cursor' : 'pointer',
        'filter' : 'invert(100%) grayscale(50%) sepia(30%)',
        'transform' : 'scale(1.25, 1.25)',
    });
};

export const SetStyleFilterMouseout = (Element = '') => {
    SetStyle (Element, {
        'cursor' : 'default',
        'filter' : '',
        'transform' : '',
    });
};

export const SetHeaderWrapper = (Append = '', Propertie = {}) => {
    const Proper = {
        'father' : 'father' in Propertie ? Propertie['father'] : '',
        'flush' : 'flush' in Propertie ? Propertie['flush'] : true,
    };
    const HeaderWrapperMouseout = [ 'bg-transparent', 'border-white' ];
    const HeaderWrapperMouseover = [ 'bg-black', 'border-black', 'shadow' ];
    if (Proper['father'] instanceof HTMLElement) {
        if (Proper['father'].querySelector ('header')) {
            const HeaderContainer = document.createElement ('div');
            HeaderContainer['classList'].add (...[
                'd-flex',
                'justify-content-center',
            ]);
            function SetResize () {
                SetStyle (HeaderContainer, {
                    ...window['innerWidth'] <= GetScreenSize () ? { 'width' : 'calc(100% - (' + ButtonWidth + ' + ' + ButtonMargin + ' * 2) * 2)' } : {},
                    ...window['innerWidth'] > GetScreenSize () ? { 'width' : 'fit-content' } : {},
                    ...SetCenterPosition (),
                    'zIndex' : 2,
                });
            };
            SetResize ();
            window.addEventListener ('resize', () => SetResize ());
            SetStyleTransition (HeaderContainer);
            if (Append instanceof HTMLElement)
                Append.appendChild (HeaderContainer);
            const HeaderWrapper = document.createElement ('header');
            HeaderContainer.appendChild (HeaderWrapper);
            HeaderWrapper['classList'].add (...[
                'd-flex',
                'flex-column',
                'w-100',
                ...Proper['flush'] === true ? [ 'border-1', 'border', 'gap-1', 'grid', 'p-2', 'rounded-2', ...HeaderWrapperMouseout ] : [],
                ...Proper['flush'] === false ? [ 'p-0' ] : [],
            ]);
            if (Proper['flush'] === true) {
                SetStyleTransition (HeaderWrapper);
                SetMouseEvent (HeaderWrapper, { 'mouseover' : HeaderWrapperMouseover, 'mouseout' : HeaderWrapperMouseout });
            };
            SetHeadlineWrapper (HeaderWrapper, {
                'father' : Proper['father'],
                'flush' : Proper['flush'],
            });
        };
    };
};

export const SetAsteriskButtonStartPosition = () => {
    return {
        'height' : ButtonWidth,
        'left' : ButtonMargin,
        'position' : 'fixed',
        'top' : ButtonMargin,
        'width' : ButtonWidth,
    };
};

export const OffCanvasWrapperWidth = window['innerWidth'] / 4;

export const SetOffCanvasWrapperStartPosition = () => {
    return {
        'height' : '100%',
        'left' : 'calc(-' + OffCanvasWrapperWidth + 'px)',
        'position' : 'fixed',
        'top' : 0,
        'width' : 'calc(' + OffCanvasWrapperWidth + 'px)',
    };
};

export const SetCenterPosition = () => {
    return {
        'left' : '50%',
        'position' : 'fixed',
        'top' : '50%',
        'transform' : 'translate(-50%, -50%)',
    };
};

export const SetTableWrapperStartPosition = () => {
    return {
        ...window['innerWidth'] <= GetScreenSize () ? { 'width' : 'calc(100% - (' + ButtonWidth + ' + ' + ButtonMargin + ' * 2) * 2)' } : {},
        ...window['innerWidth'] > GetScreenSize () ? { 'width' : 'calc(100% - ' + OffCanvasWrapperWidth + 'px - (' + ButtonWidth + ' + ' + ButtonMargin + ' * 2) * 2)' } : {},
        'height' : 'calc(100% - (' + ButtonWidth + ' + ' + ButtonMargin + ' * 2) * 2)',
        ...SetCenterPosition (),
    };
};

export const SetDisplayStartPosition = () => {
    return {
        'left' : ButtonMargin,
        'position' : 'fixed',
        'top' : ButtonMargin,
    };
};

export const GetScreenSize = (Key = '') => {
    const Screen = {
        'sm' : 576,
        'md' : 768,
        'lg' : 992,
        'xl' : 1200,
        'xxl' : 1400,
    };
    if (Key in Screen)
        return Screen[Key];
    return Screen['lg'];
};

export const Bootstrap = [ 'danger', 'dark', 'info', 'light', 'primary', 'secondary', 'success', 'warning' ];

export const SetColorMouseover = (Color = 'primary') => {
    return [ ...Bootstrap ].includes (Color) ? [
        [ 'bg', Color, 'subtle' ].join ('-'),
        [ 'text', Color, 'emphasis' ].join ('-'),
    ] : [
    ];
};

export const SetColorButtonMenu = (Append = '') => {
    for (let i = 0; i < Bootstrap['length']; i++) {
        const Button = SetButtonCreator ({
            'borderRadius' : '50%',
            'height' : ButtonWidth,
            'left' : 'calc(100% - ' + ButtonMargin + ' - ' + ButtonWidth + ')',
            'position' : 'fixed',
            'top' : 'calc(' + ButtonMargin + ' * 2 + ' + ButtonWidth + ' + (' + ButtonMargin + ' + ' + ButtonWidth + ') * ' + i + ')',
            'width' : ButtonWidth,
            'zIndex' : 5,
        }, () => {
            if (Array.from (Append['classList']).filter (Index => /^bg-.*$/g.test (Index))[0] !== [ 'bg', Bootstrap[i] ].join ('-')) {
                Append['classList'].remove (Array.from (Append['classList']).filter (Index => /^bg-.*$/g.test (Index))[0]);
                Append['classList'].add (...[ [ 'bg', Bootstrap[i] ].join ('-') ]);
            };
        });
        if (Append instanceof HTMLElement)
            Append.appendChild (Button);
        const ButtonTitle = document.createElement ('h5');
        ButtonTitle['textContent'] = SetCapital (Bootstrap[i].slice (0, 3));
        ButtonTitle['classList'].add (...[
            'text-white',
            'd-inline-block',
            'fw-light',
            'h5',
            'lh-1',
            'm-0',
            'p-0',
            'text-start',
        ]);
        Button.appendChild (ButtonTitle);
    };
};

export const SetMouseEvent = (Element = '', Propertie = {}) => {
    const Proper = {
        'mouseover' : 'mouseover' in Propertie ? Propertie['mouseover'] : [],
        'mouseout' : 'mouseout' in Propertie ? Propertie['mouseout'] : [],
        'stop-propagation' : 'stop-propagation' in Propertie ? Propertie['stop-propagation'] : true,
    };
    if (Element instanceof HTMLElement) {
        Element.addEventListener ('mouseover', Event => {
            SetStyle (Element, { 'cursor' : 'pointer' });
            if (Proper['mouseout']['length'])
                Element['classList'].remove (...Proper['mouseout']);
            if (Proper['mouseover']['length'])
                Element['classList'].add (...Proper['mouseover']);
            if (([ true, false ].includes (Proper['stop-propagation']) ? Proper['stop-propagation'] : true))
                Event.stopPropagation ();
        });
        Element.addEventListener ('mouseout', Event => {
            SetStyle (Element, { 'cursor' : 'default' });
            if (Proper['mouseover']['length'])
                Element['classList'].remove (...Proper['mouseover']);
            if (Proper['mouseout']['length'])
                Element['classList'].add (...Proper['mouseout']);
            if (([ true, false ].includes (Proper['stop-propagation']) ? Proper['stop-propagation'] : true))
                Event.stopPropagation ();
        });
    };
};

export const SetHeadlineWrapper = (Append ='', Propertie = {}) => {
    const Proper = {
        'father' : 'father' in Propertie ? Propertie['father'] : '',
        'flush' : 'flush' in Propertie ? Propertie['flush'] : true,
    };
    const TextFrame = [ 'd-inline-block', 'lh-1', 'm-0' ];
    const TextSetup = [
        ...Proper['flush'] === true ? [ 'text-start', 'text-white' ] : [],
        ...Proper['flush'] === false ? [ 'text-white', 'text-center', 'text-lg-start' ] : [],
        ...TextFrame,
    ];
    const HeadlineDescriptionClasses = [
        ...Proper['flush'] === true ? [ 'list-group-flush', 'list-group-numbered', 'list-group' ] : [],
        ...Proper['flush'] === false ? [ 'justify-content-center', 'justify-content-lg-start' ] : [],
        'd-flex',
        'flex-column',
        'list-unstyled',
        'm-0',
        'p-0',
    ];
    const HeadlineDescriptionListMouseout = [ 'bg-transparent', 'px-0' ];
    const HeadlineDescriptionListMouseover = [ 'bg-info', 'px-2' ];
    const HeadlineDescriptionListClasses = [
        ...Proper['flush'] === true ? [ 'border-white', 'fw-medium', 'list-group-item', 'py-2', 'text-start', ...HeadlineDescriptionListMouseout ] : [],
        ...Proper['flush'] === false ? [ 'bg-transparent', 'p-0', 'text-center', 'text-lg-start' ] : [],
        ...TextFrame,
        'text-white',
    ];
    const TextShadow = { 'textShadow' : '0 1.5px 3px rgba(0, 0, 0, .75)' };
    if (Proper['father'] instanceof HTMLElement) {
        if (Proper['father'].querySelector ('header').querySelector ('div')) {
            const HeadlineWrap = document.createElement ('div');
            HeadlineWrap['classList'].add (...[ 'd-flex', 'flex-column', 'justify-content-start', 'w-100' ]);
            [ ...GetRange (1, 6, 'h') ].map (Heading => {
                if (Proper['father'].querySelector ('header').querySelector ('div').querySelector (Heading)) {
                    const HeadlineTitle = document.createElement (Heading);
                    HeadlineTitle['classList'].add (...[ 'fw-bolder', Heading, ...TextSetup ]);
                    if (Proper['flush'] === false) SetStyle (HeadlineTitle, { ...TextShadow });
                    SetTextContent (HeadlineTitle, Proper['father'].querySelector ('header').querySelector ('div').querySelector (Heading));
                    HeadlineWrap.appendChild (HeadlineTitle);
                };
            });
            if (Proper['father'].querySelector ('header').querySelector ('div').querySelector ('p')) {
                const HeadlineSubtitle = document.createElement ('p');
                HeadlineSubtitle['classList'].add (...[ 'fw-medium', ...TextSetup ]);
                if (Proper['flush'] === false) SetStyle (HeadlineSubtitle, { ...TextShadow });
                SetTextContent (HeadlineSubtitle, Proper['father'].querySelector ('header').querySelector ('div').querySelector ('p'));
                HeadlineWrap.appendChild (HeadlineSubtitle);
            };
            if (Append instanceof HTMLElement)
                Append.appendChild (HeadlineWrap);
        };
    };
    if (Proper['father'].querySelector ('header').querySelector ('ul')) {
        const HeadlineDescription = document.createElement ('ul');
        HeadlineDescription['classList'].add (...HeadlineDescriptionClasses);
        Proper['father'].querySelector ('header').querySelector ('ul').querySelectorAll ('li').forEach (List => {
            const HeadlineDescriptionList = document.createElement ('li');
            HeadlineDescriptionList['classList'].add (...HeadlineDescriptionListClasses);
            HeadlineDescription.appendChild (HeadlineDescriptionList);
            if (Proper['flush'] === true) {
                SetMouseEvent (HeadlineDescriptionList, {
                    'mouseover' : HeadlineDescriptionListMouseover,
                    'mouseout' : HeadlineDescriptionListMouseout,
                    'stop-propagation' : false,
                });
                SetStyleTransition (HeadlineDescriptionList);
            };
            SetTextContent (HeadlineDescriptionList, List);
            if (Proper['flush'] === false) SetStyle (HeadlineDescriptionList, { ...TextShadow });
        });
        if (Append instanceof HTMLElement)
            Append.appendChild (HeadlineDescription);
    };
};

export const SetInterest = (Propertie = {}) => {
    const Proper = {
        'period' : 'period' in Propertie ? Propertie['period'] : 1,
        'taxa' : 'taxa' in Propertie ? Propertie['taxa'] : 0,
        'value' : 'value' in Propertie ? Propertie['value'] : 1000,
        'key' : 'key' in Propertie ? Propertie['key'] : '',
    };
    let Total = parseFloat (Proper['value']) * Math.pow (1 + Proper['taxa'], Proper['period']);
    let Final = Proper['period'] < 3 ? parseFloat (Proper['value']) : Total;
    let Plot = Final / (Proper['period'] + 1);
    const Result = {
        'total' : Total.toFixed (2),
        'final' : Final.toFixed (2),
        'plot' : Plot.toFixed (2),
    };
    if (Proper['key'] in Result)
        return Result[Proper['key']];
    return '';
};

export const SetAsteriskButton = (Append = '', Propertie = {}) => {
    const Proper = {
        'father' : 'father' in Propertie ? Propertie['father'] : '',
        'z-index' : 'z-index' in Propertie ? Propertie['z-index'] : 5,
    };
    let Path = [ '.price-display', '.wrapper-valor', '.wrapper-negociado', '.negociado' ];
    let TableValue = 1;
    if (Proper['father'] instanceof HTMLElement)
        if (Proper['father'].querySelector ([ ...Path ].join ('>')))
            TableValue = Proper['father'].querySelector ([ ...Path ].join ('>'))['textContent'];
    const TableColumn = 3, TableRow = 24;
    const TableWrapper = document.createElement ('div');
    if (Append instanceof HTMLElement)
        Append.appendChild (TableWrapper);
    SetStyleTransition (TableWrapper);
    SetStyle (TableWrapper, {
        ...SetTableWrapperStartPosition (),
        'zIndex' : Proper['z-index'] + 1,
    });
    TableWrapper['classList'].add (...[ 'bg-white', 'border-1', 'border-dark', 'border', 'overflow-hidden', 'rounded-2', 'shadow' ]);
    const TableWrap = document.createElement ('div');
    TableWrap['classList'].add (...[ 'h-100', 'table-responsive', 'w-100' ]);
    SetStyle (TableWrap, { 'overflow-x' : 'auto' });
    TableWrapper.appendChild (TableWrap);
    const Table = document.createElement ('table');
    Table['classList'].add (...[ 'table-bordered', 'table-dark', 'table-hover', 'table-striped', 'table', 'w-100' ]);
    TableWrap.appendChild (Table);
        const Thead = document.createElement ('thead');
        Table.appendChild (Thead);
            const TrThead = document.createElement ('tr');
            Thead.appendChild (TrThead);
                for (let i = 0; i < TableColumn; i++) {
                    const Th = document.createElement ('th');
                    Th['classList'].add (...[ 'p-0' ]);
                    SetStyle (Th, { 'width' : 'calc(100% / ' + TableColumn + ')' });
                    TrThead.appendChild (Th);
                        const Div = document.createElement ('div');
                        Div['classList'].add (...[ 'd-flex', 'justify-content-center', 'p-2', 'w-100' ]);
                        Th.appendChild (Div);
                            const P = document.createElement ('p');
                            P['classList'].add (...[ 'd-inline-block', 'lh-1', 'm-0', 'p-0', 'text-center' ]);
                            if (i === 0) P['innerText'] = 'Número';
                            if (i === 1) P['innerText'] = 'Parcela';
                            if (i === 2) P['innerText'] = 'Total';
                            Div.appendChild (P);
                };
        const Tbody = document.createElement ('tbody');
        Table.appendChild (Tbody);
        for (let i = 0; i < TableRow; i++) {
            const TrTbody = document.createElement ('tr');
            Tbody.appendChild (TrTbody);
                for (let j = 0; j < TableColumn; j++) {
                    const Td = document.createElement ('th');
                    Td['classList'].add (...[ 'p-0', ...i < 3 ? [ 'table-light' ] : [] ]);
                    SetStyle (Td, { 'width' : 'calc(100% / ' + TableColumn + ')' });
                    TrTbody.appendChild (Td);
                        const Div = document.createElement ('div');
                        Div['classList'].add (...[ 'd-flex', 'justify-content-center', 'p-2', 'w-100' ]);
                        Td.appendChild (Div);
                            async function Paragraph () {
                                const P = document.createElement ('p');
                                P['classList'].add (...[ 'd-inline-block', 'lh-1', 'm-0', 'p-0', 'text-center' ]);
                                if (j === 0) P['innerText'] = (i + 1).toString ().padStart (Number (TableRow.toString ()['length']), '0');
                                const Jsonfile = await GetJsonfile ('./json/indice-financeiro.json');
                                const Key = {
                                    'period' : i,
                                    'taxa' : 'taxa' in Jsonfile ? Jsonfile['taxa'] : 0,
                                    'value' : TableValue,
                                };
                                if (j === 1) P['innerText'] = SetInterest ({ ...Key, 'key' : 'plot' });
                                if (j === 2) P['innerText'] = SetInterest ({ ...Key, 'key' : 'final' });
                                Div.appendChild (P);
                            };
                            Paragraph ();
                };
        };
    const OffCanvasWrapper = document.createElement ('div');
    if (Append instanceof HTMLElement)
        Append.appendChild (OffCanvasWrapper);
    OffCanvasWrapper['classList'].add (...[ 'bg-black' ]);
    SetStyleTransition (OffCanvasWrapper);
    SetStyle (OffCanvasWrapper, {
        ...SetOffCanvasWrapperStartPosition (),
        'zIndex' : Proper['z-index'],
    });
    const OffCanvasWrap = document.createElement ('div');
    OffCanvasWrapper.appendChild (OffCanvasWrap);
    OffCanvasWrap['classList'].add (...[ 'd-flex', 'flex-column', 'justify-content-start', 'grid', 'gap-2' ]);
    SetStyle (OffCanvasWrap, {
        'height' : 'calc(100% - ' + ButtonWidth + ' - ' + ButtonMargin + ' * 3)',
        'left' : '50%',
        'position' : 'absolute',
        'top' : 'calc(' + ButtonWidth + ' + ' + ButtonMargin + ' * 2)',
        'transform' : 'translateX(-50%)',
        'width' : 'calc(100% - ' + ButtonMargin + ' * 2)',
    });
    SetHeadlineWrapper (OffCanvasWrap, {
        'father' : Proper['father'],
    });
    SetDisplayWrapper (OffCanvasWrap, {
        'father' : Proper['father'],
    }, () => {
        return {
        };
    });
    const Button = SetButtonCreator ({
        'borderRadius' : '50%',
        ...SetAsteriskButtonStartPosition (),
        'zIndex' : Proper['z-index'] + 2,
    }, () => {
        if (window['innerWidth'] > GetScreenSize ()) {
            if (!Button['classList'].contains ('active')) {
                Button['classList'].add ('active');
                SetStyle (Button, { 'left' : 'calc(' + OffCanvasWrapperWidth + 'px - ' + ButtonWidth + ' - ' + ButtonMargin + ')', 'top' : ButtonMargin });
                SetStyle (OffCanvasWrapper, { 'left' : 0 });
                let TableWrapperEndPosition = OffCanvasWrapperWidth;
                TableWrapperEndPosition += (window['innerWidth'] - OffCanvasWrapperWidth - TableWrapper.getBoundingClientRect ()['width']) / 2;
                SetStyle (TableWrapper, {
                    'left' : 'calc(' + TableWrapperEndPosition + 'px)',
                    'transform' : 'translate(0, -50%)',
                    'top' : '50%',
                });
            } else if (Button['classList'].contains ('active')) {
                SetStartPosition ();
            };
        } else if (window['innerWidth'] <= GetScreenSize ()) {
        };
    });
    if (Append instanceof HTMLElement) Append.appendChild (Button);
    const ButtonIcon = SetButtonIconCreator ('bi-asterisk');
    Button.appendChild (ButtonIcon);
    Button.addEventListener ('mouseover', Event => {
        Button['classList'].remove (...[ 'bg-transparent' ]);
        Button['classList'].add (...[ ...Button['classList'].contains ('active') ? [ 'bg-info' ] : [ 'bg-black' ], 'shadow' ]);
        SetStyle (Button, { 'cursor' : 'pointer' });
        Event.stopPropagation ();
    });
    Button.addEventListener ('mouseout', Event => {
        Button['classList'].remove (...[ 'bg-black', 'bg-info', 'shadow' ]);
        Button['classList'].add (...SetButtonMouseout ());
        SetStyle (Button, { 'cursor' : 'default' });
        Event.stopPropagation ();
    });
    function SetStartPosition () {
        Button['classList'].remove ('active');
        SetStyle (Button, SetAsteriskButtonStartPosition ());
        SetStyle (OffCanvasWrapper, SetOffCanvasWrapperStartPosition ());
        SetStyle (TableWrapper, SetTableWrapperStartPosition ());
    };
    window.addEventListener ('resize', () => SetStartPosition ());
};

export const SetAdjustButton = (Append = '', CallBack = () => {}) => {
    const Button = SetButtonCreator ({
        'borderRadius' : '50%',
        'height' : ButtonWidth,
        'left' : ButtonMargin,
        'position' : 'fixed',
        'top' : 'calc(100% - ' + ButtonMargin + ' - ' + ButtonWidth + ')',
        'width' : ButtonWidth,
        'zIndex' : 5,
    }, () => {
        CallBack ();
    });
    if (Append instanceof HTMLElement) Append.appendChild (Button);
    const ButtonIcon = SetButtonIconCreator ('bi-arrows-fullscreen');
    Button.appendChild (ButtonIcon);
};

export const GetRandomNumber = (Max = 1, Min = 0) => Math.floor (Math.random () * (Max - Min + 1)) + Min;

export const GetRandomDecimal = (Max = 1, Min = 0) => (Math.random () * (Max - Min) + Min).toFixed (2);

export const GetRandomPassword = (Length = 12) => {
    let Password = '';
    const Alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const Character = [ Alphabet.toLowerCase (), Alphabet.toUpperCase () ].join ('');
    for (let i = 0; i < Length; i++)
        Password += Character.charAt (Math.floor (Math.random () * Character['length']));
    return Password;
};

export const SetDropWrapper = (Append = '', Propertie = {}) => {
    const Proper = {
        'number' : 'number' in Propertie ? Propertie['number'] : 256,
    };
    for (let i = 0; i < Proper['number']; i++) {
        const Drop = document.createElement ('div');
        Drop['classList'].add (...[ 'bg-white', 'drop' ]);
        if (Append instanceof HTMLElement)
            Append.appendChild (Drop);
        SetMouseEvent (Drop);
        SetDragging (Drop);
        const Width = GetRandomDecimal (8, 8 / 5);
        SetStyle (Drop, {
            'borderRadius' : '50%',
            'height' : Width + 'px',
            'left' : GetRandomDecimal (window['innerWidth']) + 'px',
            'opacity' : GetRandomDecimal (1),
            'position' : 'fixed',
            'top' : GetRandomDecimal (window['innerHeight']) + 'px',
            'width' : Width + 'px',
            'zIndex' : GetRandomNumber (Proper['number']),
        });
    };
};

export const SetButtonMouseout = () => {
    return [ 'bg-secondary' ];
};

export const SetButtonCreator = (Propertie = {}, CallBack = () => {}) => {
    const Button = document.createElement ('div');
    Button['classList'].add (...[ 'align-items-center', 'd-flex', 'justify-content-center', ...SetButtonMouseout () ]);
    SetStyleTransition (Button);
    if (Object.keys (Propertie)['length']) SetStyle (Button, Propertie);
    SetMouseEvent (Button, { 'mouseover' : [ 'bg-black', 'shadow' ], 'mouseout' : SetButtonMouseout () });
    Button.addEventListener ('click', Event => {
        CallBack ();
        Event.stopPropagation ();
    });
    return Button;
};

export const SetButtonIconCreator = (Input = '') => {
    const ButtonIcon = document.createElement ('i');
    let Class = '';
    if (typeof Input === 'string')
        if (Input !== '')
            Class = Input;
    ButtonIcon['classList'].add (...[ ...Class ? [ Class ] : [], 'bi', 'fw-bold', 'text-white' ]);
    SetStyle (ButtonIcon, { 'fontSize' : 'calc(1.25rem)' });
    return ButtonIcon;
};

export const SetCloseButton = (Append = '') => {    
    const Button = SetButtonCreator ({
        'borderRadius' : '50%',
        'height' : ButtonWidth,
        'left' : 'calc(100% - ' + ButtonMargin + ' - ' + ButtonWidth + ')',
        'position' : 'fixed',
        'top' : ButtonMargin,
        'width' : ButtonWidth,
        'zIndex' : 5,
    }, () => {
        SetWrapperCleaner (Append);
    });
    if (Append instanceof HTMLElement) Append.appendChild (Button);
    const ButtonIcon = SetButtonIconCreator ('bi-arrows-angle-contract');
    Button.appendChild (ButtonIcon);
};

export const SetSocialNetworkButton = (Append = '', Propertie = {}) => {
    const Proper = {
        'social-network' : 'social-network' in Propertie ? Propertie['social-network'] : [],
    };
    function IsValid (url) {
        return new RegExp (/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/@\w \.-]*)*\/?$/).test (url);
    };
    const Verified = [];
    const Link = Array.isArray (Proper['social-network']) ? Proper['social-network'] : [];
    const Title = [ 'amazon', 'facebook', 'linkedin', 'messenger', 'whatsapp', 'youtube' ];
    for (let i = 0; i < Title['length']; i++) {
        for (let j = 0; j < Link['length']; j++) {
            if (IsValid (Link[j])) {
                if (Link[j].includes (Title[i])) {
                    Verified.push ({ 'class' : [ 'bi', Title[i] ].join ('-'), 'link' : Link[j] });
                };
            };
        };
    };
    const ButtonObject = {
        'borderRadius' : '50%',
        'height' : ButtonWidth,
        'left' : 'calc(100% - ' + ButtonMargin + ' - ' + ButtonWidth + ')',
        'position' : 'fixed',
        'width' : ButtonWidth,
        'zIndex' : 5,
    };
    if (Append instanceof HTMLBodyElement) {
        const Button = SetButtonCreator ({
            ...ButtonObject,
            'top' : 'calc(100% - ' + ButtonMargin + ' - ' + ButtonWidth + ')',
        }, () => {
            if (Button['classList'].contains ('top-position')) {
                Button['classList'].remove ('top-position');
                window.scrollTo ({
                    top : document.documentElement.scrollHeight,
                    behavior : 'smooth',
                });
            } else if (!Button['classList'].contains ('top-position')) {
                Button['classList'].add ('top-position');
                window.scrollTo ({ top : 0, behavior : 'smooth' });
            };
        });
        if (Append instanceof HTMLElement)
            Append.appendChild (Button);
        const ButtonIcon = SetButtonIconCreator ('bi-arrow-down-up');
        Button.appendChild (ButtonIcon);
    };
    if (Verified['length']) {
        for (let i = 0; i < Verified['length']; i++) {
            const ButtonLevel = Append instanceof HTMLBodyElement ? 2 : 1;
            const Button = SetButtonCreator ({
                ...ButtonObject,
                'top' : 'calc(100% - ' + ButtonMargin + ' / 2 - (' + ButtonMargin + ' / 2 + ' + ButtonWidth + ') * ' + (ButtonLevel + i) + ')',
            }, () => {
                window.open (Verified[i]['link'], '_blank');
            });
            if (Append instanceof HTMLElement)
                Append.appendChild (Button);
            const ButtonIcon = SetButtonIconCreator (Verified[i]['class']);
            Button.appendChild (ButtonIcon);
        };
    };
};

export const GetJsonfile = async (Url = '') => {
    try {
        const Response = await fetch (Url);
        if (!Response['ok']) throw new Error (Response['status']);
        const Data = await Response.json ();
        return Data;
    } catch (erro) {
        return null;
    };
};

export const SetSocialNetwork = async (Element) => {
    const Jsonfile = await GetJsonfile ('./json/rede-social.json');
    if (Jsonfile) {
        SetSocialNetworkButton (Element, {
            'social-network' : Jsonfile,
        });
    };
};

export const SetWrapperCleaner = (Append = '') => {
    if (Append instanceof HTMLElement) {
        SetStyle (Append, { 'opacity' : 0 });
        SetFadeout (Append, () => {
            SetStyle (Append, { 'zIndex' : - 3 });
            SetStyle (document['body'], { 'overflow' : 'auto' });
            GetRemoveChild (Append);
        });
    };
};

export const SetWrapper = (Propertie = {}) => {
    const Proper = {
        'background-image' : 'background-image' in Propertie ? Propertie['background-image'] : '',
    };
    const Wrapper = document.createElement ('div');
    document['body'].appendChild (Wrapper);
    Wrapper['classList'].add (...[ 'bg-white', 'h-100', 'overflow-hidden', 'position-fixed', 'start-0', 'top-0', 'w-100' ]);
    SetStyle (Wrapper, { 'opacity' : 0, 'zIndex' : - 3 });
    if (Proper['background-image'] !== '') SetStyleBackground (Wrapper, { 'background-image' : Proper['background-image'] });
    SetStyleTransition (Wrapper);
    return Wrapper;
};

export const SetPuzzleWrapper = (Append = '') => {
    const GalleryWrapper = document.createElement ('div');
    if (Append instanceof HTMLElement)
        Append.appendChild (GalleryWrapper);
    SetAttribNode ({ 'element' : GalleryWrapper, 'attribute' : 'id', 'value' : 'gallery-wrapper' });
    GalleryWrapper['classList'].add (...[ 'h-100', 'w-100' ]);
    SetStyle (GalleryWrapper, {
        ...SetCenterPosition (),
        'display' : 'grid',
        'gridAutoFlow' : 'dense',
        'gridAutoRows' : ButtonWidth,
        'gridGap' : '0',
        'gridTemplateColumns' : 'repeat(auto-fit,minmax(' + ButtonWidth + ',1fr))',
        'zIndex' : 2,
    });
    function SetResize () {
        for (let i = 0; i < 50; i++) {
            const PuzzleWrapper = document.createElement ('div');
            GalleryWrapper.appendChild (PuzzleWrapper);
            PuzzleWrapper['classList'].add (...[
                [ 'bg', Bootstrap[GetRandomNumber (Bootstrap['length'])] ].join ('-'),
                'puzzle',
            ]);
            const Grid = 'span 2';
            const Attribute = [
                { 'gridColumn' : Grid },
                { 'gridColumn' : Grid, 'gridRow' : Grid },
                { 'gridRow' : Grid },
                {},
            ];
            SetStyle (PuzzleWrapper, {
                ...Attribute[GetRandomNumber (Attribute['length'])],
            });
        };
        const Opacity = 1;
        const PuzzleStyle = [];
        GalleryWrapper.querySelectorAll ('.puzzle').forEach (Element => {
            PuzzleStyle.push ({
                'height' : Element.getBoundingClientRect ()['height'] + 'px',
                'left' : Element.getBoundingClientRect ()['left'] + 'px',
                'opacity' : Opacity,
                'position' : 'fixed',
                'top' : Element.getBoundingClientRect ()['top'] + 'px',
                'width' : Element.getBoundingClientRect ()['width'] + 'px',
                'zIndex' : GetRandomNumber (GalleryWrapper.querySelectorAll ('.puzzle')['length']),
            });
        });
        GalleryWrapper.querySelectorAll ('.puzzle').forEach ((Element, Index) => {
            Element.removeAttribute ('style');
            SetDragging (Element);
            SetStyle (Element, PuzzleStyle[Index]);
            Element.addEventListener ('mouseover', Event => {
                SetStyle (Element, { 'cursor' : 'pointer', 'opacity' : 1 });
                Event.stopPropagation ();
            });
            Element.addEventListener ('mouseout', Event => {
                SetStyle (Element, { 'cursor' : 'default', 'opacity' : Opacity });
                Event.stopPropagation ();
            });
        });
        SetAdjustButton (Append, () => {
            GalleryWrapper.querySelectorAll ('.puzzle').forEach ((Element, Index) => {
                SetStyle (Element, PuzzleStyle[Index]);
            });
        });
    };
    SetResize ();
    window.addEventListener ('resize', () => {
        Append.querySelector ('#gallery-wrapper')['innerHTML'] = '';
        SetResize ();
    });
};

export const SetCarouselWrapper = (Append = '', Propertie = {}) => {
    const Proper = {
        'fade' : 'fade' in Propertie ? Propertie['fade'] : true,
        'father' : 'father' in Propertie ? Propertie['father'] : '',
        'z-index' : 'z-index' in Propertie ? Propertie['z-index'] : 1,
    };
    if (Proper['father'] instanceof HTMLElement) {
        let Active = 0, Database = [];
        Proper['father'].querySelectorAll ([ '.carousel-inner', '.carousel-item' ].join ('>')).forEach ((Element, Index) => {
            if (Element) {
                Database.push ({ 'background-image' : GetURLImage (Element) });
                if (Element['classList'].contains ('active'))
                    Active = Index;
            };
        });
        Proper['father'].querySelectorAll ([ '.thumbnail-inner', '.thumbnail-item' ].join ('>')).forEach ((Element, Index) => {
            if (Element) {
                Database.push ({ 'background-image' : GetURLImage (Element.querySelector ('.thumbnail-background')) });
                if (Element['classList'].contains ('active'))
                    Active = Index;
            };
        });
        const ID = GetRandomPassword ();
        const CarouselWrapper = document.createElement ('div');
        if (Append instanceof HTMLElement)
            Append.appendChild (CarouselWrapper);
        SetStyle (CarouselWrapper, {
            ...SetCenterPosition (),
            'height' : '100%',
            'width' : '100%',
            'zIndex' : Proper['z-index'],
        });
        CarouselWrapper['classList'].add (...[
            ...[ true, false ].includes (Proper['fade']) ? Proper['fade'] === true ? [ 'carousel-fade' ] : [] : [],
            'carousel-dark',
            'carousel',
            'm-0',
            'p-0',
            'slide',
        ]);
        if ([ true, false ].includes (Proper['fade'])) {
            if (Proper['fade'] === false) {
                SetAttribNode ({ 'element' : CarouselWrapper, 'attribute' : 'data-bs-ride', 'value' : 'true' });
            };
        };
        SetAttribNode ({ 'element' : CarouselWrapper, 'attribute' : 'id', 'value' : ID });
        const CarouselIndicator = document.createElement ('div');
        CarouselWrapper.appendChild (CarouselIndicator);
        CarouselIndicator['classList'].add (...[ 'carousel-indicators', 'gap-1', 'grid', 'mb-3', 'mx-auto' ]);
        for (let i = 0; i < Database['length']; i++) {
            const IsTrue = Active === i;
            const CarouselIndicatorButton = document.createElement ('button');
            CarouselIndicatorButton['classList'].add (...[ ...IsTrue ? [ 'active' ] : [], 'border', 'border-0' ]);
            if (IsTrue) SetAttribNode ({ 'element' : CarouselIndicatorButton, 'attribute' : 'aria-current', 'value' : 'true' });
            SetAttribNode ({ 'element' : CarouselIndicatorButton, 'attribute' : 'aria-label', 'value' : [ 'Slide', i + 1 ].join (' ') });
            SetAttribNode ({ 'element' : CarouselIndicatorButton, 'attribute' : 'data-bs-slide-to', 'value' : i });
            SetAttribNode ({ 'element' : CarouselIndicatorButton, 'attribute' : 'data-bs-target', 'value' : [ '#', ID ].join ('') });
            SetAttribNode ({ 'element' : CarouselIndicatorButton, 'attribute' : 'type', 'value' : 'button' });
            CarouselIndicator.appendChild (CarouselIndicatorButton);
        };
        const CarouselInner = document.createElement ('div');
        CarouselInner['classList'].add (...[ 'carousel-inner', 'h-100', 'w-100' ]);
        CarouselWrapper.appendChild (CarouselInner);
        for (let i = 0; i < Database['length']; i++) {
            const IsTrue = Active === i;
            const CarouselItem = document.createElement ('div');
            CarouselInner.appendChild (CarouselItem);
            CarouselItem['classList'].add (...[ ...IsTrue ? [ 'active' ] : [], 'carousel-item', 'h-100', 'w-100' ]);
            SetAttribNode ({ 'element' : CarouselItem, 'attribute' : 'data-bs-interval', 'value' : 10000 / 2 });
            SetStyleBackground (CarouselItem, { 'background-image' : Database[i]['background-image'] });
            if (Proper['father'].querySelectorAll ('.carousel-item')[i]) {
                if (Proper['father'].querySelectorAll ('.carousel-item')[i].querySelector ([ '.carousel-caption', 'div' ].join ('>'))) {
                    SetHeaderWrapper (CarouselItem, {
                        'father' : Proper['father'].querySelectorAll ('.carousel-item')[i].querySelector ([ '.carousel-caption', 'div' ].join ('>')),
                    });
                };
            };
        };
        const ButtonClasses = [ 'carousel-button', 'mx-3', 'p-0' ];
        [ 'prev', 'next' ].map (Index => {
            const Button = document.createElement ('button');
            Button['classList'].add (...[ 'carousel-control-' + Index, ...ButtonClasses ]);
            SetStyle (Button, { 'width' : 'auto' });
            SetAttribNode ({ 'element' : Button, 'attribute' : 'type', 'value' : 'button' });
            SetAttribNode ({ 'element' : Button, 'attribute' : 'data-bs-slide', 'value' : Index });
            SetAttribNode ({ 'element' : Button, 'attribute' : 'data-bs-target', 'value' : [ '#', ID ].join ('') });
            CarouselWrapper.appendChild (Button);
            let CarouselSpan = document.createElement ('span');
            CarouselSpan['classList'].add ('carousel-control-' + Index + '-icon');
            SetAttribNode ({ 'element' : CarouselSpan, 'attribute' : 'aria-hidden', 'value' : 'true' });
            Button.appendChild (CarouselSpan);
            CarouselSpan = document.createElement ('span');
            CarouselSpan['classList'].add ('visually-hidden');
            Button.appendChild (CarouselSpan);
        });
    };
};

export const SetGlobalVariable = (Variable = '', Value = '') => {
    if (/^[a-zA-Z_$][a-zA-Z0-9_$]*$/.test (Variable)) {
        window[Variable] = Value;
    };
};

export const SetDisplayWrapper = (Append = '', Propertie = {}, CallBack = () => SetDisplayStartPosition ()) => {
    const Proper = {
        'father' : 'father' in Propertie ? Propertie['father'] : '',
        'mouseout' : 'mouseout' in Propertie ? Propertie['mouseout'] : [ 'bg-transparent', 'border-white' ],
        'mouseover' : 'mouseover' in Propertie ? Propertie['mouseover'] : [ 'bg-info', 'border-info', 'shadow' ],
    };
    const DisplayWrapperMouseout = Proper['mouseout'];
    const DisplayWrapperMouseover = Proper['mouseover'];
    const TextFrame = [ 'd-inline-block', 'font-monospace', 'fw-semibold', 'lh-1', 'm-0', 'p-0', 'text-white', 'text-start' ];
    const TextColorMouseout = [];
    const TextColorMouseover = [];
    const DisplayPrincipalMouseout = [ ...TextColorMouseout ];
    const DisplayNegociadoMouseout = [ ...TextColorMouseout ];
    const DisplayDescontoMouseout = [ ...TextColorMouseout ];
    const DisplayParceladoMouseout = [ ...TextColorMouseout ];
    const DisplayEconomiaMouseout = [ ...TextColorMouseout ];
    const DisplayPrincipalMouseover = [ ...TextColorMouseover ];
    const DisplayNegociadoMouseover = [ ...TextColorMouseover ];
    const DisplayDescontoMouseover = [ ...TextColorMouseover ];
    const DisplayParceladoMouseover = [ ...TextColorMouseover ];
    const DisplayEconomiaMouseover = [ ...TextColorMouseover ];
    if (Proper['father'] instanceof HTMLElement) {
        const Display = Proper['father'].querySelector ('.price-display');
        if (Display) {
            const DisplayWrapper = document.createElement ('div');
            if (Append instanceof HTMLElement)
                Append.appendChild (DisplayWrapper);
            DisplayWrapper['classList'].add (...[
                'border-1',
                'border',
                'd-flex',
                'flex-column',
                'justify-content-start',
                'rounded-2',
                ...DisplayWrapperMouseout,
            ]);
            SetAttribNode ({ 'element' : DisplayWrapper, 'attribute' : 'id', 'value' : Proper['id'] });
            SetStyle (DisplayWrapper, {
                ...CallBack (),
                'overflow' : 'hidden',
                'width' : 'fit-content',
                'zIndex' : 3,
            });
            const DisplayWrap = document.createElement ('div');
            DisplayWrapper.appendChild (DisplayWrap);
            DisplayWrap['classList'].add (...[ 'd-flex', 'flex-column', 'justify-content-start', 'm-0', 'p-2' ]);
            SetStyle (DisplayWrap, { 'opacity' : 1, 'width' : 'fit-content' });
            SetStyleTransition (DisplayWrap);
                const DisplayPrincipal = document.createElement ('p');
                DisplayPrincipal['classList'].add (...[ 'text-decoration-line-through', ...TextFrame, ...DisplayPrincipalMouseout ]);
                SetTextContent (DisplayPrincipal, Proper['father'].querySelector ('.wrapper-principal'));
                const DisplayValor = document.createElement ('div');
                DisplayValor['classList'].add (...[ 'd-flex', 'flex-row', 'flex-wrap', 'justify-content-start', 'w-100' ]);
                    const DisplayNegociado = document.createElement ('h3');
                    DisplayNegociado['classList'].add (...[ 'h3', ...TextFrame, ...DisplayNegociadoMouseout ]);
                    SetTextContent (DisplayNegociado, Proper['father'].querySelector ([ '.wrapper-valor', '.wrapper-negociado' ].join ('>')));
                    const DisplayDesconto = document.createElement ('h6');
                    DisplayDesconto['classList'].add (...[ 'h6', 'ms-1', 'mt-1', ...TextFrame, ...DisplayDescontoMouseout ]);
                    SetTextContent (DisplayDesconto, Proper['father'].querySelector ([ '.wrapper-valor', '.wrapper-desconto' ].join ('>')));
                const DisplayParcelado = document.createElement ('h6');
                DisplayParcelado['classList'].add (...[ 'h6', ...TextFrame, ...DisplayParceladoMouseout ]);
                SetTextContent (DisplayParcelado, Proper['father'].querySelector ('.wrapper-parcelado'));
                const DisplayEconomia = document.createElement ('p');
                DisplayEconomia['classList'].add (...[ ...TextFrame, ...DisplayEconomiaMouseout]);
                SetTextContent (DisplayEconomia, Proper['father'].querySelector ('.wrapper-economia'));
                if (Proper['father'].querySelector ('.wrapper-principal')) DisplayWrap.appendChild (DisplayPrincipal);
                if (Proper['father'].querySelector ('.wrapper-valor')) {
                    DisplayWrap.appendChild (DisplayValor);
                    if (Proper['father'].querySelector ('.wrapper-negociado')) DisplayValor.appendChild (DisplayNegociado);
                    if (Proper['father'].querySelector ('.wrapper-desconto')) DisplayValor.appendChild (DisplayDesconto);
                };
                if (Proper['father'].querySelector ('.wrapper-parcelado')) DisplayWrap.appendChild (DisplayParcelado);
                if (Proper['father'].querySelector ('.wrapper-economia')) DisplayWrap.appendChild (DisplayEconomia);
            let DisplayElement = [ 'Wrapper', 'Principal', 'Negociado', 'Desconto', 'Parcelado', 'Economia' ];
            DisplayElement = [ ...DisplayElement ].map (Index => 'Display' + Index);
            [ ...DisplayElement ].forEach (Element => {
                if (eval (Element))
                    SetStyleTransition (eval (Element));
            });
            DisplayWrapper.addEventListener ('mouseover', Event => {
                [ ...DisplayElement ].forEach (Element => {
                    const Mouseout = IsDefined (eval (Element + 'Mouseout')) ? eval (Element + 'Mouseout') : [];
                    const Mouseover = IsDefined (eval (Element + 'Mouseover')) ? eval (Element + 'Mouseover') : [];
                    if (eval (Element)) {
                        eval (Element)['classList'].remove (...Mouseout);
                        eval (Element)['classList'].add (...Mouseover);
                    };
                });
                SetStyle (DisplayWrapper, { 'cursor' : 'pointer' });
                Event.stopPropagation ();
            });
            DisplayWrapper.addEventListener ('mouseout', Event => {
                [ ...DisplayElement ].forEach (Element => {
                    const Mouseout = IsDefined (eval (Element + 'Mouseout')) ? eval (Element + 'Mouseout') : [];
                    const Mouseover = IsDefined (eval (Element + 'Mouseover')) ? eval (Element + 'Mouseover') : [];
                    if (eval (Element)) {
                        eval (Element)['classList'].remove (...Mouseover);
                        eval (Element)['classList'].add (...Mouseout);
                    };
                });
                SetStyle (DisplayWrapper, { 'cursor' : 'default' });
                Event.stopPropagation ();
            });
        };
    };
};

export const GetValidTel = (Input = '') => {
    if (!GetValidTelCarrier (Input))
        return false;
    if (Input['length'] < '+55 (11) 9 9163-3880'['length'])
        return false;
    const Array = [];
    const Excluded = [
        '25', '26', '29',
        '36',
        '46',
        '52', '56', '57', '58', '59',
        '66',
        '76',
    ];
    for (let i = 1; i <= 9; i++)
        for (let j = 1; j <= 9; j++)
            if (![ ...Excluded ].includes ([i] + [j])) Array.push([i] + [j]);
    const DDD = Input.substring ('+55 ('['length'], '+55 (XX'['length']);
    if (Array.includes (DDD))
        return new RegExp (`^\\+55 \\(${ DDD }\\) 9 [1-9]{1}[0-9]{3}-[0-9]{4}$`).test(Input);
};

export const GetValidCpf = (Input = '') => {
    Input = GetNumber (Input);
    if (Input['length'] !== 11 || /^(.)\1+$/.test(Input)) return false;
    let Sum = 0;
    for (let i = 0; i < 9; i++) Sum += parseInt (Input.charAt (i)) * (10 - i);
    let Rest = Sum % 11;
    let ni = Rest < 2 ? 0 : 11 - Rest;
    Sum = 0;
    for (let i = 0; i < 10; i++) Sum += parseInt (Input.charAt (i)) * (11 - i);
    Rest = Sum % 11;
    let nii = Rest < 2 ? 0 : 11 - Rest;
    return (parseInt (Input.charAt (9)) === ni && parseInt (Input.charAt (10)) === nii);
};

const GetTime = {
    'GetYearTime' : (Input = '') => GetYearTime (Input),
    'GetDayTime' : (Input = '') => GetDayTime (Input),
};

export const GetValidDate = (Input = '', Function = '', Time = 18) => {
    const Value = new Date (Input);
    if (isNaN (Value.getTime ()))
        return false;
    if (Input !== GetDateFormat (Value))
        return false;
    const Content = new Date (new Date ().getTime () - GetTime[Function](Time));
    if (Value > GetDateFormat (Content))
        return false;
    return true;
};

export const GetValidBirth = (Input = '', Year = 18) => GetValidDate (Input, 'GetYearTime', Year);

export const GetValidChecking = (Input = '', Day = 1) => GetValidDate (Input, 'GetDayTime', Day);

export const GetValidName = (Input = '', Number = 2) => Input.split (/\s+/).filter (Index => Index)['length'] >= Number;

export const GetValidEmail = (Input = '') => /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test (Input);

export const GetValidSelect = (Input = '') => ![ 'Escolha uma opção', '', ' ' ].includes (Input);

export const GetValidNumber = (Input = '') => Input > 0;

export const MaskObject = {
    'GetMaskCep' : (Input = '') => GetMaskCep (Input),
    'GetMaskCompany' : (Input = '') => GetMaskName (Input),
    'GetMaskCpf' : (Input = '') => GetMaskCpf (Input),
    'GetMaskName' : (Input = '') => GetMaskName (Input),
    'GetMaskTextarea' : (Input = '') => GetMaskTextarea (Input),
    'GetMaskTel' : (Input = '') => GetMaskTel (Input),
};

export const ValidObject = {
    'GetValidArrival' : (Input = '') => GetValidChecking (Input, 1),
    'GetValidBirth' : (Input = '') => GetValidBirth (Input, 18),
    'GetValidCheckin' : (Input = '') => GetValidChecking (Input, 1),
    'GetValidCheckout' : (Input = '') => GetValidChecking (Input, 2),
    'GetValidCompany' : (Input = '') => GetValidName (Input, 1),
    'GetValidCpf' : (Input = '') => GetValidCpf (Input),
    'GetValidDeparture' : (Input = '') => GetValidChecking (Input, 2),
    'GetValidEmail' : (Input = '') => GetValidEmail (Input),
    'GetValidName' : (Input = '') => GetValidName (Input, 2),
    'GetValidNumber' : (Input = '') => GetValidNumber (Input),
    'GetValidSelect' : (Input = '') => GetValidSelect (Input),
    'GetValidTextarea' : (Input = '') => GetValidName (Input, 10),
    'GetValidTel' : (Input = '') => GetValidTel (Input),
};

export const GetValidFormField = (Form = '', Selector = '', Name = '') => {
    Form.querySelectorAll (GetElement (Selector)).forEach (Element => {
        Element.addEventListener (Name, Event => {
            const MaskTitle = [ 'GetMask', SetCapital (Selector) ].join('');
            const ValidTitle = [ 'GetValid', SetCapital (Selector) ].join('');
            if (MaskTitle in MaskObject)
                Event['target']['value'] = MaskObject[MaskTitle](Event['target']['value']);
            if (ValidTitle in ValidObject) {
                if (ValidObject[ValidTitle](Event['target']['value'])) {
                    Element['classList'].add ('is-valid');
                    Element['classList'].remove ('is-invalid');
                    if ([ 'cpf', 'tel', 'whatsapp' ].includes (Selector))
                        Element['disabled'] = true;
                }
                if (!ValidObject[ValidTitle](Event['target']['value'])) {
                    Element['classList'].add ('is-invalid');
                    Element['classList'].remove ('is-valid');
                };
            };
        });
    });
};

export const GetMaskText = (Input = []) => {
    for (var i = 0; i < Input['length']; i++)
        Input[i] = Input[i]['length'] > 2 ? SetCapital (Input[i]) : Input[i].toLowerCase ();
    return Input.join (' ');
};

export const GetMaskTextarea = (Input = '') => GetMaskText (Input.split (/\s+/));

export const GetMaskName = (Input = '') => GetMaskText ((Input.match (/\d+/g) ? Input.replace (/\d+/g, '') : Input).split (/\s+/));

export const GetMaskCpf = (Input = '') => {
    let Value = GetNumber (Input);
    if (Value['length'] === GetNumber ('012.3')['length'])
        return Value.replace (/(\d{3})(\d{1})/, '$1.$2');
    if (Value['length'] === GetNumber ('012.34')['length'])
        return Value.replace (/(\d{3})(\d{2})/, '$1.$2');
    if (Value['length'] === GetNumber ('012.345')['length'])
        return Value.replace (/(\d{3})(\d{3})/, '$1.$2');
    if (Value['length'] === GetNumber ('012.345.6')['length'])
        return Value.replace (/(\d{3})(\d{3})(\d{1})/, '$1.$2.$3');
    if (Value['length'] === GetNumber ('012.345.67')['length'])
        return Value.replace (/(\d{3})(\d{3})(\d{2})/, '$1.$2.$3');
    if (Value['length'] === GetNumber ('012.345.678')['length'])
        return Value.replace (/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3');
    if (Value['length'] === GetNumber ('012.345.678-9')['length'])
        return Value.replace (/(\d{3})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
    if (Value['length'] === GetNumber ('012.345.678-90')['length'])
        return Value.replace (/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    return Value;
};

export const GetMaskCep = (Input = '') => {
    let Value = GetNumber (Input);
    if (Value['length'] === GetNumber ('05109-2')['length'])
        return Value.replace (/(\d{5})(\d{1})/, '$1-$2');
    if (Value['length'] === GetNumber ('05109-20')['length'])
        return Value.replace (/(\d{5})(\d{2})/, '$1-$2');
    if (Value['length'] === GetNumber ('05109-200')['length'])
        return Value.replace (/(\d{5})(\d{3})/, '$1-$2');
    return Value;
};

export const GetMaskTel = (Input = '') => {
    let Value = GetNumber (Input);
    if (Value['length'] === GetNumber ('+5')['length'])
        return Value.replace (/(\d{1})/, '+$1');
    if (Value['length'] === GetNumber ('+55')['length'])
        return Value.replace (/(\d{2})/, '+$1');
    if (Value['length'] === GetNumber ('+55 (1')['length'])
        return Value.replace (/(\d{2})(\d{1})/, '+$1 ($2');
    if (Value['length'] === GetNumber ('+55 (11')['length'])
        return Value.replace (/(\d{2})(\d{2})/, '+$1 ($2');
    if (Value['length'] === GetNumber ('+55 (11) 9')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})/, '+$1 ($2) $3');
    if (Value['length'] === GetNumber ('+55 (11) 9 9')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{1})/, '+$1 ($2) $3 $4');
    if (Value['length'] === GetNumber ('+55 (11) 9 91')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{2})/, '+$1 ($2) $3 $4');
    if (Value['length'] === GetNumber ('+55 (11) 9 916')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{3})/, '+$1 ($2) $3 $4');
    if (Value['length'] === GetNumber ('+55 (11) 9 9163')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{4})/, '+$1 ($2) $3 $4');
    if (Value['length'] === GetNumber ('+55 (11) 9 9163 3')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{4})(\d{1})/, '+$1 ($2) $3 $4-$5');
    if (Value['length'] === GetNumber ('+55 (11) 9 9163 38')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{4})(\d{2})/, '+$1 ($2) $3 $4-$5');
    if (Value['length'] === GetNumber ('+55 (11) 9 9163 388')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{4})(\d{3})/, '+$1 ($2) $3 $4-$5');
    if (Value['length'] === GetNumber ('+55 (11) 9 9163 3880')['length'])
        return Value.replace (/(\d{2})(\d{2})(\d{1})(\d{4})(\d{4})/, '+$1 ($2) $3 $4-$5');
    return Value;
};

// export async function IsLight (Input = '') {
//     function IsLightPromise (Input) {
//         return new Promise ((Resolve, Reject) => {
//             setTimeout (() => {
//                 Resolve ();
//             }, 2000);
//         });
//     };
//     const Result = await IsLightPromise (Input);
//     return Result;
// };