//vars
const cartBtn = document.querySelector(".cart-btn");
const toggleBtn = document.querySelector(".sidebar-toggle");
const sidebar = document.querySelector(".sidebar");
const closeCartBtn = document.querySelector(".close-cart");
const cartDOM = document.querySelector(".cart");
const cartOverlay = document.querySelector(".cart-overlay");
const cartItems = document.querySelector(".cart-content");
const searchBtn = document.querySelector(".searchBtn");
const productsDOM = document.querySelector(".products-center");
const bagBtn = document.querySelector(".bag-btn");

toggleBtn.addEventListener("click", function () {
  sidebar.classList.toggle("showCart");
  sidebar.classList.toggle("transparentBcg");
  cartOverlay.classList.toggle("cart-overlay-active");
});
closeCartBtn.addEventListener("click", function () {
  sidebar.classList.remove("transparentBcg");
  sidebar.classList.remove("showCart");
  cartOverlay.classList.remove("cart-overlay-active");
});
