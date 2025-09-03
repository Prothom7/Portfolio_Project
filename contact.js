document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("messageForm");
  const status = document.getElementById("form-status");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Simulate form submission
    status.textContent = "Sending...";
    setTimeout(() => {
      status.textContent = "Message sent successfully!";
      form.reset();
    }, 1500);
  });
});