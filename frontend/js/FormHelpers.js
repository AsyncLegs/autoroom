import {closeSuccessPopup, showSuccessPopup} from "./notifications";
const autoComplete = require('js-autocomplete');

export function sendRequest(request, form, formName) {
    let data = new FormData(form);
    request('POST',
        form.action,
        {form: data})
        .done((res) => {
            let response = JSON.parse(res.getBody());
            if (response.status === 'error') {
                const errors = response.errors;
                for (let k in errors) {
                    let element = document.forms[form.name].querySelector('[name="' + formName + '[' + k + ']"]');
                    let parent = element.parentElement;
                    if (parent){
                        parent.classList.add('has-error');
                        parent.querySelector('.error-span').innerHTML = errors[k];
                    }
                    // console.log(element);
                    // console.log(parent);
                }
            } else {
                showSuccessPopup();
                setTimeout(() => {
                    closeSuccessPopup()
                }, 5000);
            }
        });
}

export function initializeAutoComplete(elements, choicesData, callback) {
    for (let element in elements) {
        if (elements.hasOwnProperty(element)) {
            let current = elements[element];
            new autoComplete({
                selector: current,
                minChars: 1,
                delay: 0,
                source: function (term, suggest) {
                    term = term.toLowerCase();
                    let choices = choicesData;
                    let matches = [];
                    for (let i = 0; i < choices.length; i++)
                        if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                    suggest(matches);
                },
                onSelect: callback
            });
        }
    }
}