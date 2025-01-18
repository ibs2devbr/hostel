import {
    GetAge,
    GetClasses,
    GetDateFormat,
    GetDateRange,
    GetElementList,
    GetFieldCleaner,
    GetHeading,
    GetLastCharacter,
    GetMoneyFormat,
    GetValidField,
    IsArray,
    SetAsteriskButton,
    SetCapital,
    SetCarouselWrapper,
    SetCloseButton,
    SetHeaderWrapper,
    SetMouseEvent,
    SetPriceDisplayWrapper,
    SetSocialNetwork,
    SetStyle,
    SetStyleFilterMouseout,
    SetStyleFilterMouseover,
    SetStyleTransition,
    SetWrapper,
} from './__.js';

import {
    PriceDisplayList,
} from './_variables.js';

export const GetCardLoaded = () => {
    document.querySelectorAll ('.card').forEach (Container => {



        const Target = [];
        PriceDisplayList.forEach (Element => Target[SetCapital (Element)] = Container.querySelector ('.' + Element) ? Number (Container.querySelector ('.' + Element)['textContent']) : 0);
        Container.querySelectorAll ([ '.wrapper', '.content', '.card-inner', '.card-item' ].join ('>')).forEach (Item => {




            // const Form = Item.querySelector ('form');
            // if (Form) {
            //     Form.querySelectorAll (GetElementList ([ 'adultos', 'checkin', 'checkout' ])).forEach (Checking => {
            //         Checking.addEventListener ('change', () => {
            //             const Checkin = Form.querySelector ('#checkin')['value'];
            //             const Checkout = Form.querySelector ('#checkout')['value'];
            //             const Range = new Date (Checkout).getTime () > new Date (Checkin).getTime () ? GetDateRange (Checkin, Checkout) : 1;
            //             let Adult = 1;
            //             [ '#adultos' ].forEach (Element => {
            //                 if (Form.querySelector (Element)) {
            //                     if (![ ' ', '', 0 ].includes (Form.querySelector (Element)['value']))
            //                         Adult = Number(Form.querySelector (Element)['value']);
            //                 };
            //             });
            //             CardContent.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => Element['textContent'] = (Target[ SetCapital (Element.getAttribute ('class')) ] * Range * Adult).toFixed (2));
            //         });
            //     });
            //     const Limpar = Form.querySelector ('#limpar');
            //     if (Limpar)
            //         Limpar.addEventListener ('click', () => CardContent.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => Element['textContent'] = Target[ SetCapital (Element.getAttribute ('class')) ].toFixed (2)));
            //     Form.addEventListener ('submit', async Event => {
            //         Event.preventDefault();
            //         const Field = new FormData ();
            //         const Data = new FormData (Event['target']);
            //         if (Container.querySelector ('.card-content')) {
            //             if (Container.querySelector ('.card-content').querySelector ('.card-headline')) {
            //                 if (Container.querySelector ('.card-content').querySelector ('.card-headline').querySelector ('header')) {
            //                     let Title = [];
            //                     let Array = Container.querySelector ('.card-content').querySelector ('.card-headline').querySelector ('header').querySelectorAll (GetHeading());
            //                     Array.forEach ((Element, Index) => Title[Index] = Element['textContent']);
            //                     Field.append ('01) Produto:', Title.filter(Index => Index).join(' '));
            //                 };
            //             };
            //             if (Container.querySelector ('.card-content').querySelector ('.card-headline').querySelector ('article')) {
            //                 if (Container.querySelector ('.card-content').querySelector ('.card-headline').querySelector ('article').querySelector ('ul')) {
            //                     let Description = [];
            //                     let Array = Container.querySelector ('.card-content').querySelector ('.card-headline').querySelector ('article').querySelector ('ul').querySelectorAll ('li');
            //                     Array.forEach ((Element, Index) => {
            //                         Description[Index] = [
            //                             Number (Index + 1).toString().padStart(2, '0') + ') ',
            //                             GetLastCharacter (Element['textContent']),
            //                             Index < Array['length'] - 1 ? ';' : '.'
            //                         ].join('');
            //                     });
            //                     Field.append ('02) Descrição:', Description.filter(Index => Index).join(' '));
            //                 };
            //             };
            //         };
            //         if (Data.has('name')) Field.append ('03) Nome:', Data.get ('name'));
            //         if (Data.has('birth')) {
            //             Field.append ('04) Data de nascimento:', GetDateFormat (Data.get ('birth'), 'br'));
            //             Field.append ('05) Idade:', [ GetAge (Data.get ('birth')), ' anos.' ].join(''));
            //         };
            //         if (Data.has('gender')) Field.append ('06) Gênero:', Data.get ('gender'));
            //         if (Data.has('cpf')) Field.append('07) CPF:', Data.get ('cpf'));
            //         if (Data.has('email')) Field.append('08) E-mail:', Data.get ('email'));
            //         if (Data.has('whatsapp')) Field.append('09) Whatsapp:', Data.get ('whatsapp'));
            //         if (Data.has('group_adults') && Data.has('checkin') && Data.has('checkout')) {
            //             Field.append('10) Check-in:', GetDateFormat (Data.get ('checkin'), 'br'));
            //             Field.append('11) Check-out:', GetDateFormat (Data.get ('checkout'), 'br'));
            //             const Range = GetDateRange (Data.get ('checkin'), Data.get ('checkout'));
            //             Field.append('12) Número de dias:', [ Range, ' dia', ...Range > 1 ? [ 's' ] : [], '.' ].join(''));
            //             const Adult = Number(Data.get ('group_adults'));
            //             Field.append('13) Número de pessoas:', [ Adult, ' pessoa', ...Adult > 1 ? [ 's' ] : [], '.' ].join(''));
            //             const Total = Range * Adult;
            //             if (IsArray(PriceDisplayList)) {
            //                 if (PriceDisplayList['length'] > 0) {
            //                     for (let i = 0; i < PriceDisplayList['length']; i++) {
            //                         let Index = SetString (PriceDisplayList[i], 'capital');
            //                         if (Target[Index] * Total > 0) {
            //                             let ParamI = [ (14 + i).toString().padStart(2, '0'), ') ', Index, ':' ].join('');
            //                             let ParamII = GetMoneyFormat (Target[Index] * Total);
            //                             Field.append (ParamI, ParamII);
            //                         };
            //                     };
            //                 };
            //             };
            //         };
            //         if (GetValidField (Event['target'])) {
            //             const ID = 'make booking alert';
            //             fetch (Event['target']['action'], {
            //                 method : SetString (Event['target']['method'], 'upper'),
            //                 body : Field,
            //                 headers : { 'Accept': 'application/json' }
            //             }).then (Response => {
            //                 if (Response['ok']) {
            //                     GetAlertContainer ({ id : ID, textnode : 'As suas informações foram enviadas com sucesso.' });
            //                     Container.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => {
            //                         Element['textContent'] = Target[ SetString (Element.getAttribute ('class'), 'capital') ].toFixed (2);
            //                     });
            //                     GetFieldCleaner (Event['target']);
            //                     Event['target'].reset();
            //                 } else {
            //                     Response.json().then (Data => {
            //                         if (Object.hasOwn(Data, 'errors')) {
            //                             GetAlertContainer ({ classes : [ 'alert-danger' ], id : ID, textnode : Data['errors'].map (Error => Error['message']).join(', ') });
            //                             Container.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => {
            //                                 Element['textContent'] = Target[ SetString (Element.getAttribute ('class'), 'capital') ].toFixed (2);
            //                             });
            //                             GetFieldCleaner (Event['target']);
            //                         } else {
            //                             GetAlertContainer ({ classes : [ 'alert-danger' ], id : ID, textnode : 'Ops!' });
            //                             Container.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => {
            //                                 Element['textContent'] = Target[ SetString (Element.getAttribute ('class'), 'capital') ].toFixed (2);
            //                             });
            //                             GetFieldCleaner (Event['target']);
            //                         };
            //                     });
            //                 };
            //             }).catch(Error => {
            //                 GetAlertContainer ({ classes : [ 'alert-danger' ], id : ID, textnode : 'Ops!' });
            //                 Container.querySelectorAll (GetElementList (PriceDisplayList, '.')).forEach (Element => {
            //                     Element['textContent'] = Target[ SetString (Element.getAttribute ('class'), 'capital') ].toFixed (2);
            //                 });
            //                 GetFieldCleaner (Event['target']);
            //             });
            //         };
            //     });
            // };





        });
        const ContentPath = [ '.card-wrapper', '.card-content' ];
        const DisplayPath = [ ...ContentPath, '.price-display' ];
        const CarouselPath = [ '.card-wrapper', '.carousel', '.carousel-inner' ];
        Container.querySelectorAll ([ ...CarouselPath, '.carousel-item' ].join ('>')).forEach (CarouselItem => {
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
                if (Container.querySelector ([ ...ContentPath ].join ('>'))) {
                    SetHeaderWrapper (Wrapper, { 'father' : Container.querySelector ([ ...ContentPath ].join ('>')) });
                };
                if (Container.querySelector ([ ...ContentPath ].join ('>'))) {
                    SetPriceDisplayWrapper (Wrapper, {
                        'father' : Container.querySelector ([ ...ContentPath ].join ('>')),
                        'wrapper-mouseover' : [ 'bg-black', 'border-black', 'shadow' ],
                    });
                };
                if (Container.querySelector ([ ...ContentPath ].join ('>'))) {
                    SetCarouselWrapper (Wrapper, { 'father' : Container.querySelector ([ ...CarouselPath ].join ('>')) });
                };
                SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
                Event.stopPropagation ();
            });
        });
        if (Container.querySelector ([ ...DisplayPath ].join ('>'))) {
            SetMouseEvent (Container.querySelector ([ ...DisplayPath ].join ('>')), {
                'mouseover' : [ 'bg-white', 'border-black', 'text-black' ],
                'mouseout' : GetClasses (Container.querySelector ([ ...DisplayPath ].join ('>'))),
            });
            SetStyleTransition (Container.querySelector ([ ...DisplayPath ].join ('>')));
            Container.querySelector ([ ...DisplayPath ].join ('>')).addEventListener ('click', Event => {
                SetStyle (document['body'], { 'overflow' : 'hidden' });
                const Wrapper = SetWrapper ();
                SetCloseButton (Wrapper);
                SetSocialNetwork (Wrapper);
                if (Container.querySelector ([ ...ContentPath ].join ('>'))) {
                    SetAsteriskButton (Wrapper, { 'father' : Container.querySelector ([ ...ContentPath ].join ('>')) });
                };
                if (Container.querySelector ([ ...CarouselPath ].join ('>'))) {
                    SetCarouselWrapper (Wrapper, { 'father' : Container.querySelector ([ ...CarouselPath ].join ('>')) });
                };
                SetStyle (Wrapper, { 'opacity' : 1, 'zIndex' : 2000 });
                Event.stopPropagation ();
            });
        };
    });
};