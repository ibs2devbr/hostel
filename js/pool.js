import {
} from './__.js';

window.addEventListener ('DOMContentLoaded', Event => {
    document.querySelectorAll ('.group-container').forEach (GroupContainer => {
        GroupContainer.querySelector ('.group-command').addEventListener ('click', () => {
            navigator.clipboard.writeText (GroupContainer.querySelector ('.group-content')['textContent']).then (() => {
            }).catch (Error => {
                alert ('Erro na copiar');
            });
        });
    });
});

window.addEventListener ('resize', Event => {
});

window.addEventListener ('scroll', Event => {
});