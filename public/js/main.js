// ==========Burger menus for navbar=============
document.addEventListener("DOMContentLoaded", function () {
  // open
  const burger = document.querySelectorAll(".navbar-burger");
  const menu = document.querySelectorAll(".navbar-menu");

  if (burger.length && menu.length) {
    for (var i = 0; i < burger.length; i++) {
      burger[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }

  // close
  const close = document.querySelectorAll(".navbar-close");
  const backdrop = document.querySelectorAll(".navbar-backdrop");

  if (close.length) {
    for (var i = 0; i < close.length; i++) {
      close[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }

  if (backdrop.length) {
    for (var i = 0; i < backdrop.length; i++) {
      backdrop[i].addEventListener("click", function () {
        for (var j = 0; j < menu.length; j++) {
          menu[j].classList.toggle("hidden");
        }
      });
    }
  }
});
// =================navbar-close =================

// ===================validation ragester =================
const fullNameInput = document.querySelector('input[name="fullName"]');
const usernameInput = document.querySelector('input[name="username"]');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const pictureUserInput = document.querySelector('input[name="pictureUser"]');
const errorMessages = document.querySelectorAll(".errorMessage");

const form = document.querySelector("form");
let isFormValid = false;

const fullNameRegex = /^[a-zA-Z\s']+$/;
const usernameRegex = /^[a-zA-Z0-9_]+$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

const validateInput = () => {
  isFormValid = true; // Réinitialiser à true à chaque validation

  if (!fullNameRegex.test(fullNameInput.value)) {
    errorMessages[0].innerText = "Veuillez entrer un nom complet valide.";
    isFormValid = false;
  } else {
    errorMessages[0].innerText = "";
  }

  if (!usernameRegex.test(usernameInput.value)) {
    errorMessages[1].innerText = "Veuillez entrer un nom d'utilisateur valide.";
    isFormValid = false;
  } else {
    errorMessages[1].innerText = "";
  }

  if (!emailRegex.test(emailInput.value)) {
    errorMessages[2].innerText = "Veuillez entrer une adresse e-mail valide.";
    isFormValid = false;
  } else {
    errorMessages[2].innerText = "";
  }

  if (!passwordRegex.test(passwordInput.value)) {
    errorMessages[3].innerText =
      "Le mot de passe doit contenir au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.";
    isFormValid = false;
  } else {
    errorMessages[3].innerText = "";
  }
};

form.addEventListener("submit", (e) => {
  e.preventDefault();

  validateInput();

  if (isFormValid) {
    form.submit(); // Soumettre le formulaire si la validation réussit
  }
});

// Ajouter des écouteurs d'événements sur les champs pour valider à chaque saisie
fullNameInput.addEventListener("input", validateInput);
usernameInput.addEventListener("input", validateInput);
emailInput.addEventListener("input", validateInput);
passwordInput.addEventListener("input", validateInput);

// ========================================================

// ===============login validation ====================

