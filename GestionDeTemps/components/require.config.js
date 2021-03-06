var components = {
    "packages": [
        {
            "name": "bootstrap",
            "main": "bootstrap-built.js"
        },
        {
            "name": "jquery",
            "main": "jquery-built.js"
        },
        {
            "name": "datatables-responsive",
            "main": "datatables-responsive-built.js"
        },
        {
            "name": "bootstrap-datepicker",
            "main": "bootstrap-datepicker-built.js"
        },
        {
            "name": "moment",
            "main": "moment-built.js"
        }
    ],
    "shim": {
        "bootstrap": {
            "deps": [
                "jquery"
            ]
        },
        "datatables-responsive": {
            "deps": [
                "jquery"
            ]
        }
    },
    "baseUrl": "components"
};
if (typeof require !== "undefined" && require.config) {
    require.config(components);
} else {
    var require = components;
}
if (typeof exports !== "undefined" && typeof module !== "undefined") {
    module.exports = components;
}