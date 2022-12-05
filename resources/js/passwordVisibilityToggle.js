const passwordInput = document.querySelector("#password");
const confirmPasswordInput = document.querySelector("#confirm-password");

const passwordVisibilityToggle = document.querySelector(
  ".password-visibility-toggle"
);

const confirmPasswordVisibilityToggle = document.querySelector(
  ".confirm-password-visibility-toggle"
);

passwordVisibilityToggle.onclick = () => {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordVisibilityToggle.innerHTML = "Ocultar";
  } else {
    passwordInput.type = "password";
    passwordVisibilityToggle.innerHTML = "Exibir";
  }
};

confirmPasswordVisibilityToggle.onclick = () => {
  if (confirmPasswordInput.type === "password") {
    confirmPasswordInput.type = "text";
    confirmPasswordVisibilityToggle.innerHTML = "Ocultar";
  } else {
    confirmPasswordInput.type = "password";
    confirmPasswordVisibilityToggle.innerHTML = "Exibir";
  }
};
