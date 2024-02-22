// Function to generate navigation bar
function generateNavBar(nav, linkNames, linkHREFs) {
    for (let i = 0; i < linkNames.length; i++) {
        let link = document.createElement("a");
        link.innerHTML = linkNames[i];
        link.href = linkHREFs[i];
        nav.append(link);
    }
}

// Function to add header
function addHeader() {
    // Create header element at the top of the body
    const header = document.createElement("header");
    document.body.prepend(header);

    // Apply CSS styles to header
    header.classList.add("your-header-css-class"); // Add your header CSS class here

    // Add content to header
    const h1 = document.createElement("h1");
    const name = "Laura Fauzia";
    const course = "WEB250";
    h1.innerHTML = `${name} || Legendary Fox || ${course}`;
    header.append(h1);

    // Add navigation container
    const nav = document.createElement("nav");
    header.append(nav);

    // Add navigation links
    const headerLinkNames = ["Home", "Introduction", "Contract", "Brand"];
    const headerLinkHREFs = [
        "https://lfauzia.github.io/web250/index.html",
        "https://lfauzia.github.io/web250/introduction.html",
        "https://lfauzia.github.io/web250/contract.html",
        "https://lfauzia.github.io/web250/brand.html"
    ];
    generateNavBar(nav, headerLinkNames, headerLinkHREFs);
}

// Function to add footer
function addFooter() {
    // Create footer element at the end of the body
    const footer = document.createElement("footer");
    document.body.append(footer);

    // Apply CSS styles to footer
    footer.classList.add("your-footer-css-class"); // Add your footer CSS class here

    // Add content to footer
    const p = document.createElement("p");
    p.innerHTML = "&copy; 2024 Allé Youpi. All rights reserved.";
    footer.append(p);

    // Add validation links
    const validationLinks = document.createElement("div");
    footer.append(validationLinks);

    const htmlValidationLink = document.createElement("a");
    htmlValidationLink.href = "https://validator.w3.org/nu/?doc=" + encodeURIComponent(document.URL);
    htmlValidationLink.innerHTML = "<img src='images/button_validation_html5.png' width='88' height='31' alt='Validate webpage HTML.'>";
    validationLinks.append(htmlValidationLink);

    const cssValidationLink = document.createElement("a");
    cssValidationLink.href = "https://jigsaw.w3.org/css-validator/validator?uri=" + encodeURIComponent(document.URL);
    cssValidationLink.innerHTML = "<img src='images/button_validation_css.png' width='88' height='31' alt='Validate webpage CSS.'>";
    validationLinks.append(cssValidationLink);
}

// Call functions to add header and footer when the window loads
window.onload = function() {
    addHeader();
    addFooter();
};
