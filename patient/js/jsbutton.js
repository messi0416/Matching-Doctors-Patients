let togg1 = document.getElementById("togg1");
let d1 = document.getElementById("d1");

togg1.addEventListener("click", () => {
  d1.style.display = getComputedStyle(d1).display != "none" ? "none" : "block";
  d2.style.display = "none";
  d3.style.display = "none";
})

let togg2 = document.getElementById("togg2");
let d2 = document.getElementById("d2");

togg2.addEventListener("click", () => {
  d2.style.display = getComputedStyle(d2).display != "none" ? "none" : "block";
  d1.style.display = "none";
  d3.style.display = "none";
})

let togg3 = document.getElementById("togg3");
let d3 = document.getElementById("d3");

togg3.addEventListener("click", () => {
  d3.style.display = getComputedStyle(d3).display != "none" ? "none" : "block";
  d1.style.display = "none";
  d2.style.display = "none";
})
