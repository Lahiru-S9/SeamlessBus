
var qrcode = new QRCode("qrcode");

function makeCode () {    
  var elText = document.getElementById("text");
  
  if (!elText.value) {
    alert("Input a text");
    elText.focus();
    return;
  }
  
  qrcode.makeCode(elText.value);
}

makeCode();

$("#text")
  .on("blur", function () {
    makeCode();
  })
  .on("keydown", function (e) {
    if (e.keyCode == 13) {
      makeCode();
    }
  });


function togglePopup() {
  var popup = document.getElementById('popup-1');
    if (popup.style.display === 'none' || popup.style.display === '') {
        popup.style.display = 'block';
        makeCode(); // Generate QR code when showing the popup
    } else {
        popup.style.display = 'none';
    }
}
