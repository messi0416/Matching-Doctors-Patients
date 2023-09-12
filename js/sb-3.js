let togg6 = document.getElementById("togg6");

let d6 = document.getElementById("d6");

togg6.addEventListener("click", () => {
  if(getComputedStyle(d6).display != "none"){
    d6.style.display = "block";
  } else {
    d6.style.display = "block";
    d7.style.display = "none";
  }
})

let togg7 = document.getElementById("togg7");

let d7 = document.getElementById("d7");

togg7.addEventListener("click", () => {
  if(getComputedStyle(d7).display != "none"){
    d7.style.display = "block";
  } else {
    d6.style.display = "none";
    d7.style.display = "block";
  }
})