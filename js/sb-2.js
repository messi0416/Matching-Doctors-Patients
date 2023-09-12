let togg1 = document.getElementById("togg1");

let d1 = document.getElementById("d1");

togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "block";
  } else {
    d2.style.display = "none";
    d1.style.display = "block";
  }
})

let togg2 = document.getElementById("togg2");

let d2 = document.getElementById("d2");

togg2.addEventListener("click", () => {
  if(getComputedStyle(d2).display != "none"){
    d2.style.display = "block";
  } else {
    d2.style.display = "block";
    d1.style.display = "none";
  }
})

