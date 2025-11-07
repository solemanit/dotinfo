(function () {
    "use strict";
    /* Auto Complete Basic */
    const autoCompleteJS = new autoComplete({
        selector: "#autoComplete",
        placeHolder: "Search for Food & Drinks Combo",
        data: {
            src: ['Pizza, Soda',
                'Burger, Milkshake',
                'Tacos, Margarita',
                'Pasta, Red Wine',
                'Sushi, Green Tea',
                'Steak, Whiskey',
                'Salad, Sparkling Water',
                'Chicken Wings, Beer',
                'Fish and Chips, Lemonade',
                'Burrito, Iced Tea'],
            cache: true,
        },
        resultItem: {
            highlight: true
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    autoCompleteJS.input.value = selection;
                }
            }
        }
    });
    /* Auto Complete Basic */

    /* Auto Complete Advanced */
    const autoCompleteJS1 = new autoComplete({
        selector: "#autoComplete-color",
        placeHolder: "Search For Advanced Colors...",
        data: {
            src: ['Lavender',
                'Turquoise',
                'Coral',
                'Sapphire',
                'Emerald',
                'Rose Gold',
                'Azure',
                'Goldenrod',
                'Amethyst',
                'Crimson',
                'Periwinkle',
                'Mint Green',
                'Tangerine',
                'Charcoal',
                'Champagne',
                'Aqua',
                'Ruby',
                'Topaz',
                'Cerulean',
                'Pearl',],
            cache: true,
        },
        resultsList: {
            element: (list, data) => {
                const info = document.createElement("p");
                if (data.results.length > 0) {
                    info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
                } else {
                    info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
                }
                list.prepend(info);
            },
            noResults: true,
            maxResults: 15,
            tabSelect: true
        },
        resultItem: {
            highlight: true
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    autoCompleteJS1.input.value = selection;
                }
            }
        }
    });
    /* Auto Complete Advanced */


})();