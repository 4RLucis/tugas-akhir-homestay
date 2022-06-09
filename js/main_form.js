function showPass() {
  var showPass = document.getElementById("pass");
  var togglePass = document.getElementById("togglePass");
  togglePass.classList.toggle("fa-eye-slash");
  if (showPass.type === "password") {
    showPass.type = "text";
    } else {
    showPass.type = "password"; } }

function showRePass() {
  var showRePass = document.getElementById("re_pass");
  var toggleRePass = document.getElementById("toggleRePass");
  toggleRePass.classList.toggle("fa-eye-slash");
  if (showRePass.type === "password") {
    showRePass.type = "text";
  } else {
    showRePass.type = "password"; } }

function tos() {
  var con = confirm("This is 'Terms of Service'");
  if (con == true) {
    document.getElementById("agree-term").checked = true;
  } else {
    document.getElementById("agree-term").checked = false;  } }

function valid() {
  var pass = document.getElementById("pass").value;
  var re_pass = document.getElementById("re_pass").value;
  if (re_pass !== pass || pass !== re_pass) {
    alert("password or re-password is unmatch");
    return false; }
  if (document.getElementById("agree-term").checked == false) {
    alert("Please check Terms of Service");
    return false; } }
