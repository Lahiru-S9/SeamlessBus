function filterFunction() {
  var input, filter, div, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("dropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }          
}

function showDropdown() {
  document.getElementById("dropdown").style.display = "block";
}

function selectValue(value) {
  document.getElementById("myInput").value = value;
  document.getElementById("dropdown").style.display = "none";
}
