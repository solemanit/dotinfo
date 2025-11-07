(function () {
    "use strict";

    const tour = new Shepherd.Tour({
        defaultStepOptions: {
            cancelIcon: {
                enabled: true
            },
            classes: 'class-1 class-2',
            scrollTo: { behavior: 'smooth', block: 'center' }
        },
        useModalOverlay: {
            enabled: true,
        }
    });

    tour.addStep({
        id: 'step-1',
        title: "Welcome To Our Premium Tour Experience",
        text: 'Discover how our expertly curated travel platform transforms your vacation dreams into extraordinary reality with personalized itineraries.',
        attachTo: {
            element: '#step-1',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-2',
        title: "Select Your Dream Destination",
        text: 'Browse our collection of handpicked global destinations, each offering unique cultural, natural, and luxury experiences.',
        attachTo: {
            element: '#step-2',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-3',
        title: "Customize Your Travel Budget",
        text: 'Set your ideal investment range and let our system recommend premium experiences that deliver exceptional value.',
        attachTo: {
            element: '#step-3',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-4',
        title: "Luxury Transportation Options",
        text: 'Choose from our exclusive network of premium carriers and private transfer services for seamless travel.',
        attachTo: {
            element: '#step-4',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-5',
        title: "Design Your Experience Itinerary",
        text: 'Craft your perfect schedule with VIP access to attractions, private tours, and authentic local encounters.',
        attachTo: {
            element: '#step-5',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-6',
        title: "Finalize Your Journey Details",
        text: 'Review and confirm all arrangements with our dedicated concierge team available around the clock.',
        attachTo: {
            element: '#step-6',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Next',
                action: tour.next,
            },
        ],
    });

    tour.addStep({
        id: 'step-7',
        title: "Begin Your Unforgettable Adventure",
        text: 'Your personalized travel experience is ready - embark on a journey crafted exclusively for you.',
        attachTo: {
            element: '#step-7',
            on: 'bottom',
        },
        buttons: [
            {
                text: 'Finish',
                action: tour.next,
            },
        ],
    });

    tour.start();

})();