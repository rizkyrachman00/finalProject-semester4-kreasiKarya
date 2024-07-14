const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

let userNama = document.getElementById("signUp-nama");
let userEmail = document.getElementById("signUp-email");
let userPass = document.getElementById("signUp-password");

let inNama = document.getElementById("signIn-nama");
let inPass = document.getElementById("signIn-password");

function signUp() {
  console.log(userNama.value);

  localStorage.setItem("username", userNama.value);
  localStorage.setItem("password", userPass.value);
}

function signIn() {
  window.location.href = "#";
}

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;
  let currentImage = document.querySelector(`.img-${index}`);

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});
