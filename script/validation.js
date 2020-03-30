const form =document.getElementById('form');
const name= document.getElementById('name');
const age = document.getElementById('age');
const salary = document.getElementById('salary');
const des =document.getElementById('designation');

form.addEventListener("submit", function (e){
  // console.log(name.value.length);
  if (name.value.length>12){
    e.preventDefault();
    // console.log(name.value.length);
    parent= name.parentElement;
    parent.classList.add("error");
    parent.children[2].textContent=`${name.id} is invalid.It must be less than 12.`;
  }
  // console.log("error");
  if (age.value>60){
    e.preventDefault();
    parent= age.parentElement;
    parent.classList.add("error");
    parent.children[2].textContent=`${age.id} must be atmost 60 years.`;
  }
  // console.log("error");
  if (salary.value<5000){
    e.preventDefault();
    parent= salary.parentElement;
    parent.classList.add("error");
    parent.children[2].textContent=`${salary.id} must be atleast 5000.`;
  }
});
