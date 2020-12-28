function myFunction() {
	document.getElementById("drop2").classList.toggle("show");
	document.getElementById("drop").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn1')) {
    var myDropdown =  document.getElementById("drop2");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
  else if(!e.target.matches('.dropbtn')) {
    var myDropdown =  document.getElementById("drop");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
  
}