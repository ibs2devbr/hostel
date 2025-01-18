import {
    GetDateFormat,
    GetElement,
    GetElementList,
    GetFieldCleaner,
    GetValidFormField,
    SetNodeContent,
    GetMaskCep,
} from './__.js';

import {
    Arrival,
    Departure,
    Events,
    Viacep,
} from './_variables.js';

export const GetFormLoaded = () => {
    document.querySelectorAll ('form').forEach (Form => {
        if (Form.querySelector ('#limpar'))
            Form.querySelector ('#limpar').addEventListener ('click', () => GetFieldCleaner (Form));
        if (Form.querySelector ('#cep')) {
            [ ...Events ].map (EventName => {
                Form.querySelector ('#cep').addEventListener (EventName, Event => {
                    Event['target']['value'] = GetMaskCep (Event['target']['value']);
                    if (Event['target']['value']['length'] !== '05109-200'['length']) {
                        Event['target']['classList'].add ('is-invalid');
                        Event['target']['classList'].remove ('is-valid');
                    };
                    fetch(`https://viacep.com.br/ws/${ Event['target']['value'] }/json`, {
                        method : 'GET',
                        mode : 'cors',
                        cache : 'default'
                    }).then (Response => {
                        if (!Response['ok'])
                            throw new Error (Response['status']);
                        return Response.json ();
                    }).then (Result => {
                        if (!Result['erro']) {
                            Form.querySelectorAll (GetElementList (Viacep)).forEach (Element => {
                                Element['classList'].add ('is-valid');
                                Element['classList'].remove ('is-invalid');
                                SetNodeContent (Element, Result[Element['id']]);
                            });
                            Event['target']['disabled'] = true;
                            if (Form.querySelector ('#number')) Form.querySelector ('#number').focus();
                        };
                        if (Result['erro']) {
                            Form.querySelectorAll (GetElementList (Viacep)).forEach (Element => SetNodeContent (Element));
                            Form.querySelectorAll (GetElementList (Viacep.filter (Index => Index !== 'cep'))).forEach (Element => Element['classList'].remove (...[ 'is-valid', 'is-invalid' ]));
                            Event['target']['classList'].add ('is-invalid');
                            Event['target']['classList'].remove ('is-valid');
                        };
                    }).catch(Error => {
                        console.error(Error['message']);
                    });
                });

            });
        };
        [ ...Arrival ].map (Arrival => {
            [ ...Departure ].map (Departure => {
                if (Form.querySelector (GetElement (Arrival)) && Form.querySelector (GetElement (Departure))) {
                    Form.querySelector (GetElement (Arrival)).addEventListener ('change', () => {
                        const Checkin = GetDateFormat (Form.querySelector (GetElement (Arrival))['value']);
                        const Checkout = GetDateFormat (Form.querySelector (GetElement (Departure))['value']);
                        const Content = new Date (Checkin).setDate (new Date (Checkin).getDate() + 1);
                        if (Checkout <= Checkin) Form.querySelector (GetElement (Departure))['value'] = GetDateFormat (Content);
                    });
                    Form.querySelector (GetElement (Departure)).addEventListener ('change', () => {
                        const Checkin = GetDateFormat (Form.querySelector (GetElement (Arrival))['value']);
                        const Checkout = GetDateFormat (Form.querySelector (GetElement (Departure))['value']);
                        const Content = new Date (Checkout).setDate (new Date (Checkout).getDate() - 1);
                        if (Checkout <= Checkin) Form.querySelector (GetElement (Arrival))['value'] = GetDateFormat (Content);
                    });
                };
            });
        });
        [ ...Events ].map (Name => {
            const Array = [ ...Arrival, ...Departure, 'birth', 'company', 'cpf', 'email', 'name', 'number', 'select', 'textarea', 'tel' ];
            [ ...Array ].map (Selector => GetValidFormField (Form, Selector, Name));
        });
    });
};