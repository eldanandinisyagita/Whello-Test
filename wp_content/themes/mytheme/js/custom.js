// for humburger menu //
function toggleMenu() {
    var menu = document.getElementById("navbar-menu");
    menu.classList.toggle("active");
}

// for the add to cart menu, an alert will pop up when the button is clicked //
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".add-to-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            alert("Product added to cart!");
        });
    });
});
