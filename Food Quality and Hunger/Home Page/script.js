const coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {
  coll[i].innerHTML = '+ ' + coll[i].innerHTML;

  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    const content = this.nextElementSibling;

    // Toggle +/- sign
    if (this.textContent.trim().startsWith('+')) {
      this.innerHTML = this.innerHTML.replace('+', '–');
    } else {
      this.innerHTML = this.innerHTML.replace('–', '+');
    }

    // Fix collapsing/expanding properly
    if (content.style.maxHeight && content.style.maxHeight !== "0px") {
      content.style.maxHeight = "0px";
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

// Scroll Animation
const revealSections = document.querySelectorAll(".info, .faq");

function revealOnScroll() {
  const windowHeight = window.innerHeight;
  revealSections.forEach(section => {
    const sectionTop = section.getBoundingClientRect().top;
    if (sectionTop < windowHeight - 100) {
      section.classList.add("visible");
    }
  });
}

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);
