(function () {
    "use strict";
    $(".js-example-basic-single").select2({
        dir: "ltr",
    });
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true,
        dir: "ltr",
    });

    /* basic select2 */
    $(".js-example-basic-single").select2({
        dir: "ltr",
    });

    /* multiple select */
    $(".js-example-basic-multiple").select2({
        dir: "ltr",
    });

    /* single select with placeholder */
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true,
        dir: "ltr",
    });

    /* multiple select with placeholder */
    $(".js-example-placeholder-multiple").select2({
        placeholder: "Select a state",
        dir: "ltr",
    });

    /* templating */
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "assets/images/select2/index.html";
        var $state = $(
            '<span><img src="' +
            baseUrl +
            "/" +
            state.element.value.toLowerCase() +
            '.webp" class="img-flag" /> ' +
            state.text +
            "</span>"
        );
        return $state;
    }
    $(".js-example-templating").select2({
        templateResult: formatState,
        placeholder: "Choose Customer",
        dir: "ltr",
    });

    /* with images */
    function selectClient(client) {
        if (!client.id) {
            return client.text;
        }
        var $client = $(
            '<span><img src="assets/images/select2/' +
            client.element.value.toLowerCase() +
            '.webp" /> ' +
            client.text +
            "</span>"
        );
        return $client;
    }
    $(".select2-client-search").select2({
        templateResult: selectClient,
        templateSelection: selectClient,
        placeholder: "Choose Client",
        dir: "ltr",
        escapeMarkup: function (m) {
            return m;
        },
    });

    /* max selections limiting */
    $(".js-example-basic-multiple-limit-max").select2({
        maximumSelectionLength: 3,
        placeholder: "Choose Person",
        dir: "ltr",
    });

    /* Disablind select 2 controls */
    $(".js-example-disabled").select2({
        dir: "ltr",
    });
    $(".js-example-disabled-multi").select2({
        dir: "ltr",
    });

    $(".js-programmatic-enable").on("click", function () {
        $(".js-example-disabled").prop("disabled", false);
        $(".js-example-disabled-multi").prop("disabled", false);
    });
    $(".js-programmatic-disable").on("click", function () {
        $(".js-example-disabled").prop("disabled", true);
        $(".js-example-disabled-multi").prop("disabled", true);
    });

})();