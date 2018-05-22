import {Validator} from "./Validator";

require('imaskjs/dist/imask');
window.Pikaday = require('pikaday');

document.addEventListener("DOMContentLoaded", function () {
    const dateInputs = document.getElementsByClassName('datepicker');

    initAllTelInputs();
    initDatePickers(dateInputs, 'DD-MM-YYYY', new Date());


    let validate = new Validator();
    validate.validate();

});


export function initDatePickers(elements, dateFormat, minDate) {
    for (let m = 0; m < elements.length; m++) {
        let currentElement = elements[m];
        new Pikaday(
            {
                field: currentElement,
                firstDay: 1,
                minDate: minDate,
                format: dateFormat,
                i18n: {
                    previousMonth: 'Предыдущий месяц',
                    nextMonth: 'Следующий месяц',
                    months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                    weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                    weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']
                }

            });
    }

}

export function initAllTelInputs() {
    const telInputs = document.querySelectorAll('[type="tel"]');
    for (let m = 0; m < telInputs.length; m++) {
        new IMask(telInputs[m], {
                mask: '+{380}(00)000-00-00',
            });
        telInputs[m].addEventListener("focus", myScript);
    }
}
function myScript(e){
    let target = e.target;
    // debugger;
    if(!target.value || target.value.length <5){
        target.value = "+380("
    }
    // console.log(e);
}

export function clearErrorClassOnAllInputs() {
    let inputs = document.getElementsByTagName('input');

    for (let input in inputs) {
        if (inputs.hasOwnProperty(input)) {
            let parent = inputs[input].parentElement;
            if (parent) {
                parent.classList.remove('has-error');
            }
        }
    }
}

require('./requests.js');
