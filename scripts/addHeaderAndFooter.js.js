document.addEventListener("DOMContentLoaded", function() {
    // Function to dynamically load the header and footer
    function includeHTML() {
        // Include header
        var headerElement = document.querySelector("header");
        if (headerElement) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "header.html", true); // Corrected path
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    headerElement.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Include footer
        var footerElement = document.querySelector("footer");
        if (footerElement) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "footer.html", true); // Corrected path
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    footerElement.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    }

    // Call the function to include header and footer
    includeHTML();
});
