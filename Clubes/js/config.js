//Helper Functions
function showDom(id) {
    let arr;
    if (!Array.isArray(id)) {
        arr = [id];
    } else {
        arr = id;
    }
    arr.forEach(function (domId) {
        document.getElementById(domId).style.display = 'block';
    });
}

function hideDom(id) {
    let arr;
    if (!Array.isArray(id)) {
        arr = [id];
    } else {
        arr = id;
    }
    arr.forEach(function (domId) {
        document.getElementById(domId).style.display = 'none';
    });
}

function getUrlParams(prop) {
    let params = {},
        search = decodeURIComponent(window.location.href.slice(window.location.href.indexOf('?') + 1)),
        definitions = search.split('&');

    definitions.forEach(function (val) {
        let parts = val.split('=', 2);
        params[parts[0]] = parts[1];
    });

    return (prop && prop in params) ? params[prop] : params;
}

document.addEventListener("input", function (event) {
    if ((event.target.id === "countrySelect") && event.target.id !== null) {
        window.location.href =
            window.location.pathname +
            "?buyer-country=" +
            event.target.options[event.target.selectedIndex].value;
    }
});

ready = function (fn) {
    if (document.readyState != 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

select_country_dropdown = function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const buyer_country = urlParams.get('buyer-country')
    for (var i = 0; i < document.getElementById('countrySelect').options.length; i++) {
        if (document.getElementById('countrySelect').options[i].value == buyer_country) {
            document.getElementById('countrySelect').options[i].selected = true;
        }
    }
    apm_country_list = [
        {
            country: "DE", address: {
                address_line_1: "Bayreuther Straße 42",
                address_line_2: "",
                city: "Gmindersdorf",
                state: "Reutlingen",
                postal_code: "72760",
            }, recipient_name: "Jane Doe"
        },
        {
            country: "US", address: {
                address_line_1: "2211 North Street",
                address_line_2: "",
                city: "San Jose",
                state: "CA",
                postal_code: "95123"
            }, recipient_name: "Jane Doe"
        },
        {
            country: "BE", address: {
                address_line_1: "Putstraat 478",
                address_line_2: "",
                city: "Sint-Pauwels",
                state: "",
                postal_code: "9170"
            }, recipient_name: "Marina Beich"
        },
        {
            country: "PL", address: {
                address_line_1: "ul. Królewska 78",
                address_line_2: "",
                city: "Kraków",
                state: "",
                postal_code: "30-081"
            }, recipient_name: "August Pedersen"
        },
        {
            country: "AT", address: {
                address_line_1: "Hauptstrasse 85",
                address_line_2: "",
                city: "PULGARN",
                state: "",
                postal_code: "4221"
            }, recipient_name: "Berrie Hulstein"
        },
        {
            country: "NL", address: {
                address_line_1: "Asterstraat 135",
                address_line_2: "",
                city: "Almelo",
                state: "",
                postal_code: "7601 AK"
            }, recipient_name: "Joos Voorham"
        },
        {
            country: "IT", address: {
                address_line_1: "Via Longhena, 132",
                address_line_2: "",
                city: "Galloro RM",
                state: "",
                postal_code: "00040"
            }, recipient_name: "Colette Jalbert"
        },
        {
            country: "ES", address: {
                address_line_1: "Calle Alcalá 22",
                address_line_2: "",
                city: "Madrid",
                state: "",
                postal_code: "28055"
            }, recipient_name: "Ana García López"
        },
        {
            country: "AU", address: {
                address_line_1: "15 Mary Street",
                address_line_2: "",
                city: "North Sydney",
                state: "NSW",
                postal_code: "2001"
            }, recipient_name: "Jane Doe"
        },
        {
            country: "MX", address: {
                address_line_1: "Av. Caudillo del Sur 1234, Edificio B-5",
                address_line_2: "11560, Col. Municipio Libre, D.F.",
                city: "Mexico City",
                state: "Morelos",
                postal_code: "11560"
            }, recipient_name: "Raúl Uriarte, Jr."
        },
        {
            country: "BR", address: {
                address_line_1: "Rua da Matriz 123",
                address_line_2: "apto 25 Centro",
                city: "Rio de Janeiro",
                state: "Paraná",
                postal_code: "01000-001"
            }, recipient_name: "João da Silva"
        },
        {
            country: "JP", address: {
                address_line_1: "123-4567 東京都港区",
                address_line_2: "青山 1-1-1 ペイパルビル 1037",
                city: "港区",
                state: "東京都",
                postal_code: "104-0051"
            }, recipient_name: "山田 花子"
        },
        {
            country: "GB", address: {
                address_line_1: "1 Main Terrace",
                address_line_2: "",
                city: "Wolverhampton",
                state: "West Midlands",
                postal_code: "W12 4LQ"
            }, recipient_name: "Jane Doe"
        }
    ];
    apm_country_check = false;
    apm_country_list.forEach(function (country_object) {
        if (country_object.country === buyer_country) {
            apm_country_check = true;
            document.getElementById('recipient_name').value = country_object.recipient_name;
            document.getElementById('line1').value = country_object.address.address_line_1;
            document.getElementById('line2').value = country_object.address.address_line_2;
            document.getElementById('city').value = country_object.address.city;
            document.getElementById('state').value = country_object.address.state;
            document.getElementById('zip').value = country_object.address.postal_code;
        }
    });
    if (apm_country_check === false && buyer_country !== null) {
        document.getElementById('recipient_name').value = "Jane Doe";
        document.getElementById('line1').value =
            document.getElementById('line2').value =
            document.getElementById('city').value =
            document.getElementById('state').value =
            document.getElementById('zip').value = "";
    }
}

ready(select_country_dropdown);