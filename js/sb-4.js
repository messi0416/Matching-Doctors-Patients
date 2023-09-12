let togg9 = document.getElementById("togg9");

let d9 = document.getElementById("d9");

togg9.addEventListener("click", () => {
  if(getComputedStyle(d9).display != "none"){
    d9.style.display = "block";
  } else {

    d9.style.display = "block";
    d10.style.display = "none";

  }
})

let togg10 = document.getElementById("togg10");

let d10 = document.getElementById("d10");

togg10.addEventListener("click", () => {
  if(getComputedStyle(d10).display != "none"){
    d10.style.display = "block";
  } else {

    d10.style.display = "block";
    d9.style.display = "none";

  }
})