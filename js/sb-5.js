

let tiny_root = document.getElementById("tiny_parent");
let togg20 = document.getElementById("togg20");

let d20 = document.getElementById("d20");

togg20.addEventListener("click", () => {
  if(getComputedStyle(d20).display != "none"){
    d20.style.display = "block";
    tiny_root.style.display = "none";
  } else {
    d5.style.display = "none";
    d4.style.display = "none";
    d3.style.display = "none";
    d20.style.display = "block";
    d8.style.display = "none";
    d53.style.display = "none";
    tiny_root.style.display = "none";
  }
})

let togg8 = document.getElementById("togg8");

let d8 = document.getElementById("d8");

togg8.addEventListener("click", () => {
  if(getComputedStyle(d8).display != "none"){
    d8.style.display = "block";
    tiny_root.style.display = "none";
  } else {
    d8.style.display = "block";
    d5.style.display = "none";
    d4.style.display = "none";
    d3.style.display = "none";
    d20.style.display = "none";
    d53.style.display = "none";
    tiny_root.style.display = "none";
  }
})


let togg3 = document.getElementById("togg3");

let d3 = document.getElementById("d3");

togg3.addEventListener("click", () => {
  if(getComputedStyle(d3).display != "none"){
    d3.style.display = "block";
    tiny_root.style.display = "none";
  } else {
    d5.style.display = "none";
    d4.style.display = "none";
    d3.style.display = "block";
    d20.style.display = "none";
    d8.style.display = "none";
    d53.style.display = "none";
    tiny_root.style.display = "none";
  }
})

let togg4 = document.getElementById("togg4");

let d4 = document.getElementById("d4");

togg4.addEventListener("click", () => {
  if(getComputedStyle(d4).display != "none"){
    d4.style.display = "none";
    tiny_root.style.display = "block";
  } else {
    d5.style.display = "none";
    d4.style.display = "none";
    d3.style.display = "none";
    d20.style.display = "none";
    d8.style.display = "none";
    d53.style.display = "none";
    tiny_root.style.display = "block";
  }
})

let togg5 = document.getElementById("togg5");

let d5 = document.getElementById("d5");

togg5.addEventListener("click", () => {
  if(getComputedStyle(d5).display != "none"){
    d5.style.display = "block";
    tiny_root.style.display = "none";
  } else {
    d5.style.display = "block";
    d4.style.display = "none";
    d3.style.display = "none";
    d20.style.display = "none";
    d8.style.display = "none";
    d53.style.display = "none";
    tiny_root.style.display = "none";
  }
})

let togg53 = document.getElementById("togg53");

let d53 = document.getElementById("d53");

togg53.addEventListener("click", () => {
  if(getComputedStyle(d53).display != "none"){
    d53.style.display = "none";
    tiny_root.style.display = "block";
  } else {
    d53.style.display = "none";
    d4.style.display = "none";
    d3.style.display = "none";
    d20.style.display = "none";
    d8.style.display = "none";
    d5.style.display = "none";
    tiny_root.style.display = "block";
  }
})



