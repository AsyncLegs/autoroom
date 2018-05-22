const request = require('then-request');

import {sendRequest, initializeAutoComplete} from "./FormHelpers";
import {clearErrorClassOnAllInputs} from "./application";
import {getBrands, getCarsByBrand} from "./api/CarQuery";

let brandsSelectors = document.getElementsByClassName('brands-selector');

let carsSelectors = document.getElementsByClassName('cars-selector');

getBrands().then((brands) => {

    initializeAutoComplete(brandsSelectors, brands, (e, term, item) => {
        let selectedBrand = item.getAttribute('data-val');
        getCarsByBrand(selectedBrand)
            .then((cars) => {
                initializeAutoComplete(carsSelectors, cars, (e, term, item) => {
                });
            });
    })

});
let callbackRequestForm = document.querySelector('#back-call-form-right');
let callbackRequestFormBottom = document.querySelector('#back-call-form-bottom');
let maintenanceRequestForm = document.querySelector('#maintenance-form-right');
let maintenanceRequestFormBottom = document.querySelector('#maintenance-form-bottom');
let vehiclePartsRequestForm = document.querySelector('#vehicle-parts-form-right');


let vehiclePartsRequestFormBottom = document.querySelector('#vehicle-parts-form-bottom');


if (vehiclePartsRequestForm) {
    vehiclePartsRequestForm.getElementsByTagName('button')[0].addEventListener('click', (e) => {
        e.preventDefault();
        clearErrorClassOnAllInputs();
        sendRequest(request, vehiclePartsRequestForm, 'vehicle_parts_request_form');
    })
}
if (vehiclePartsRequestFormBottom) {
    vehiclePartsRequestFormBottom.getElementsByTagName('button')[0].addEventListener('click', (e) => {
        e.preventDefault();
        clearErrorClassOnAllInputs();
        sendRequest(request, vehiclePartsRequestFormBottom, 'vehicle_parts_request_form');
    })
}

if (maintenanceRequestForm) {
    maintenanceRequestForm.getElementsByTagName('button')[0].addEventListener('click', () => {
        clearErrorClassOnAllInputs();
        sendRequest(request, maintenanceRequestForm, 'maintenance_request_form');
    })
}
if (maintenanceRequestFormBottom) {
    maintenanceRequestFormBottom.getElementsByTagName('button')[0].addEventListener('click', () => {
        clearErrorClassOnAllInputs();
        sendRequest(request, maintenanceRequestFormBottom, 'maintenance_request_form');
    })
}

if (callbackRequestForm) {
    callbackRequestForm.getElementsByTagName('button')[0].addEventListener('click', () => {
        clearErrorClassOnAllInputs();
        sendRequest(request, callbackRequestForm, 'callback_request_form');
    });
}
if (callbackRequestFormBottom) {
    callbackRequestFormBottom.getElementsByTagName('button')[0].addEventListener('click', () => {
        clearErrorClassOnAllInputs();
        sendRequest(request, callbackRequestFormBottom, 'callback_request_form');
    });
}




