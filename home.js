document.addEventListener("DOMContentLoaded", () => {
  const photo = document.querySelector(".profile-photo");

  photo.addEventListener("click", () => {
    photo.classList.toggle("active");
  });
});