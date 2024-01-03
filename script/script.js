document.addEventListener("DOMContentLoaded", function () {
  const passwordInput = document.getElementById("password");
  const togglePasswordButton = document.getElementById("togglePassword");

  togglePasswordButton.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
  });
});

function previewImage(event) {
  const input = event.target;
  const previewImage = document.getElementById("preview-image");
  const previewContainer = document.getElementById("preview-container");

  const file = input.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function () {
      previewImage.src = reader.result;
      previewContainer.style.display = "block";
    };

    reader.readAsDataURL(file);
  } else {
    previewImage.src = "";
    previewContainer.style.display = "none";
  }
}
