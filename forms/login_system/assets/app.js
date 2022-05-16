const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


let input1 = document.querySelector(".input-field1 input");
let showbtn1 = document.querySelector(".input-field1 label");

showbtn1.onclick = function () {

  if(input1.type === "password"){

    input1.type = "text";
    showbtn1.classList.add('active');
  }
  else{

    input1.type = "password";
    showbtn1.classList.remove('active');
  }
}




let input2 = document.querySelector(".input-field2 input");
let showbtn2 = document.querySelector(".input-field2 label");

showbtn2.onclick = function () {

  if(input2.type === "password"){

    input2.type = "text";
    showbtn2.classList.add('active');
  }
  else{

    input2.type = "password";
    showbtn2.classList.remove('active');
  }
}


let input3 = document.querySelector(".input-field3 input");
let showbtn3 = document.querySelector(".input-field3 label");

showbtn3.onclick = function () {

  if(input3.type === "password"){

    input3.type = "text";
    showbtn3.classList.add('active');
  }
  else{

    input3.type = "password";
    showbtn3.classList.remove('active');
  }
}


