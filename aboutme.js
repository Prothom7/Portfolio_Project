document.addEventListener("DOMContentLoaded", () => {
  const fills = document.querySelectorAll(".fill");

  fills.forEach(fill => {
    const percent = fill.getAttribute("data-percent");
    setTimeout(() => {
      fill.style.width = percent;
    }, 300);
  });
});