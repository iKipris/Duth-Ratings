const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

var id1 = document.getElementById('welcome-message').innerText;

console.log(id1);
if (id1 > "") {
    document.getElementById("welcome-message").hidden = false;
    document.getElementById("hero-item-text1").hidden = true;
} else {
    document.getElementById("welcome-message").hidden = true;
    document.getElementById("hero-item-text1").hidden = false;
}

