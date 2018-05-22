const fetchJsonp = require('fetch-jsonp');


export function getBrands() {
    return new Promise((resolve, reject) => {

        let carBrands = [];
        fetchJsonp('https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes')
            .then((response) => {

                return response.json()
            })
            .then((json) => {
                for (let brand in json.Makes) {
                    if (json.Makes.hasOwnProperty(brand)) {
                        carBrands.push(json.Makes[brand].make_display);
                    }
                }

                resolve(carBrands);
            })
            .catch((ex) => {
                console.log('parsing failed', ex);
                reject(ex);
            });
    });
}

export function getCarsByBrand(brand) {

    return new Promise((resolve, reject) => {
        let carModels = [];
        fetchJsonp('https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&make=' + brand)
            .then((response) => {

                return response.json()
            })
            .then((json) => {
                for (let model in json.Models) {
                    if (json.Models.hasOwnProperty(model)) {
                        carModels.push(json.Models[model].model_name);
                    }
                }
                resolve(carModels);
            }).catch(function (ex) {
            console.log('parsing failed', ex);
            reject(ex);
        });
    });

}