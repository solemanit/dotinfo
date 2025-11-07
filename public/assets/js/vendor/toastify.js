function basicToast() {
    Toastify({ text: "This is a basic toast" }).showToast();
}

function bgColorToast() {
    Toastify({
        text: "Custom background color",
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    }).showToast();
}

function linkToast() {
    Toastify({
        text: "Click here to visit Google",
        destination: "https://google.com",
        newWindow: true,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
    }).showToast();
}

function durationToast() {
    Toastify({
        text: "Visible for 5 seconds",
        duration: 5000,
    }).showToast();
}

function closeButtonToast() {
    Toastify({
        text: "Closable toast",
        close: true,
    }).showToast();
}

function bottomLeftToast() {
    Toastify({
        text: "Bottom Left Toast",
        gravity: "bottom",
        position: "left",
    }).showToast();
}

function noAutoCloseToast() {
    Toastify({
        text: "Click close button to dismiss",
        duration: -1,
        close: true,
    }).showToast();
}

function stopOnFocusToast() {
    Toastify({
        text: "Toast stays if focused",
        duration: 4000,
        stopOnFocus: true,
    }).showToast();
}

function callbackToast() {
    Toastify({
        text: "Toast with callback",
        duration: 3000,
        callback: function () {
            alert("Toast dismissed");
        }
    }).showToast();
}

function avatarToast() {
    Toastify({
        text: "Toast with avatar",
        avatar: "assets/images/avatar/avatar-thumb-001.webp",
    }).showToast();
}

function showToast(message, gravity, position) {
    Toastify({
        text: message,
        gravity: gravity,
        position: position,
        duration: 3000,
        close: true,
    }).showToast();
}

function middleToast(message, alignment) {
    const toast = Toastify({
        text: message,
        duration: 3000,
        close: true,
        className: `toast-middle ${alignment}`
    });

    toast.showToast();
}