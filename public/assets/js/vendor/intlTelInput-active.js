(function () {
    "use strict";

    /* intl-tel-input Basic */
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        initialCountry: "us",
        utilsScript: "assets/js/plugins/utils.js"
    });
    /* intl-tel-input Basic */

    /* intl-tel-input with Validation */
    const input1 = document.querySelector("#phone-validation");
    const button = document.querySelector("#btn");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    const iti = window.intlTelInput(input1, {
        initialCountry: "us",
        utilsScript: "assets/js/plugins/utils.js"
    });

    const reset = () => {
        input1.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    const showError = (msg) => {
        input1.classList.add("error");
        errorMsg.innerHTML = msg;
        errorMsg.classList.remove("hide");
    };

    // on click button: validate
    button.addEventListener('click', () => {
        reset();
        if (!input1.value.trim()) {
            showError("Required");
        } else if (iti.isValidNumberPrecise()) {
            validMsg.classList.remove("hide");
        } else {
            const errorCode = iti.getValidationError();
            const msg = errorMap[errorCode] || "Invalid number";
            showError(msg);
        }
    });

    // on keyup / change flag: reset
    input1.addEventListener('change', reset);
    input1.addEventListener('keyup', reset);
    /* intl-tel-input with Validation */

    /* intl-tel-input with Hidden Input */
    const input4 = document.querySelector("#phone-hidden-input");
    const form = document.querySelector("#form");
    const message = document.querySelector("#message");

    const iti1 = window.intlTelInput(input4, {
        initialCountry: "us",
        hiddenInput: () => "full_phone",
        utilsScript: "assets/js/plugins/utils.js" // just for formatting/placeholders etc
    });

    form.onsubmit = () => {
        if (!iti1.isValidNumber()) {
            message.innerHTML = "Invalid number. Please try again.";
            return false;
        }
    };

    const urlParams = new URLSearchParams(window.location.search);
    const fullPhone = urlParams.get('full_phone')
    if (fullPhone) {
        message.innerHTML = `Submitted hidden input value: ${fullPhone}`;
    }
    /* intl-tel-input with Hidden Input */

    /* intl-tel-input with Existing Number */
    const input5 = document.querySelector("#phone-existing-number");
    window.intlTelInput(input5, {
        initialCountry: "us",
        utilsScript: "assets/js/plugins/utils.js" // just for formatting/placeholders etc
    });
    /* intl-tel-input with Existing Number */


})();