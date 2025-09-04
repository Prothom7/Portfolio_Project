document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("messageForm");
  const status = document.getElementById("form-status");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    status.textContent = "Sending...";

    fetch("contact.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.text())
      .then(result => {
        if (result.trim() === "success") {
          status.textContent = "Message sent successfully!";
          form.reset();
        } else if (result.trim() === "invalid") {
          status.textContent = "Please fill in all fields.";
        } else {
          status.textContent = "Something went wrong. Try again.";
        }
      })
      .catch(error => {
        console.error("Error:", error);
        status.textContent = "Server error. Please try later.";
      });
  });
});