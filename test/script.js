document.addEventListener('DOMContentLoaded', () => {
    new Splide( '.splide', {
    breakpoints: {
        560: {
            perPage: 2,
        },
        640: {
            perPage: 3,
        },
        760: {
            perPage: 4,
        },
        980: {
            perPage: 5,
        },
        1180: {
            perPage: 6,
        },
        xxx: {
            perPage: 3,
        },
        xxx: {
            perPage: 3,
        },
        xxx: {
            perPage: 3,
        },

    },
    rewind: false,
    arrows: false,
    pagination: false,
    perPage: 9,

    }).mount();

})