 function toggleInterviewSheet() {
  var children = document.getElementById("interviewSheetChildren");
  var arrowIcon = document.getElementById("arrowIcon");

  if (children.style.display === "none") {
    children.style.display = "block";
    arrowIcon.classList.add("open");
  } else {
    children.style.display = "none";
    arrowIcon.classList.remove("open");
  }
}
function toggleInputState(checkbox, inputbox){
    var inputbox = document.getElementById(inputbox);
    var checkbox = document.getElementById(checkbox);

    inputbox.disabled = !checkbox.checked;
}

function toggleState(checkbox) {
    var celldate = document.getElementById("cellDate");
    var yes = document.getElementById("yes");
    var no = document.getElementById("no");
    var otherCheckbox = checkbox.id === "yes" ? no : yes;
    otherCheckbox.checked = !checkbox.checked;

    celldate.disbled = !yes.checked;
    celldate.disabled = no.checked;
    
}

function clientInitial(){
    var panel = document.getElementById("panel");
    panel.innerHTML = '<object id="dashid" type="text/html" data="./pages/interviewsheet.php" style="width: 100%; height: 92vh"></object>';
}

function logout() {
  // Show the Bootstrap modal
  var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
  logoutModal.show();

  // Add event listener for the confirm logout button
  document.getElementById('confirmLogout').addEventListener('click', function() {
      localStorage.removeItem('selectedPage');
      localStorage.removeItem('userType');
      window.location.href = "../../index.php";
  }, { once: true });
}


let originalSpanContents = {};
let originalSpanTexts = {};

function toggleSidebar() {

  const sidebar = document.getElementById("sidebar");
  const spans = sidebar.querySelectorAll("span");
  const icon = document.getElementById("iconToggle");
  // Check if the screen size is small
  const isSmallScreen = window.innerWidth < 768;
 
  if (!isSmallScreen) {
    // Default behavior for larger screens 
    sidebar.classList.toggle("collapsed-sidebar");
  
    if (sidebar.classList.contains("collapsed-sidebar")) {
      // Collapse: Store original content and remove it
      spans.forEach((span, index) => {
        const spanId = index.toString(); // Using index as the span ID
        originalSpanContents[spanId] = span.innerHTML;
        originalSpanTexts[spanId] = span.innerText;
        span.innerHTML = '';
      });
      icon.classList.remove("fa-angle-double-left");
      icon.classList.add("fa-angle-double-right");
    } else {
      // Expand: Restore original content
      spans.forEach((span, index) => {
        const spanId = index.toString(); // Using index as the span ID
        span.innerHTML = originalSpanContents[spanId] || '';
        span.innerText = originalSpanTexts[spanId] || '';
      });
      //pageName.innerText = localStorage.getItem('selectedPage');
      icon.classList.remove("fa-angle-double-right");
      icon.classList.add("fa-angle-double-left");
    }
  }
}

function storeUserType(){
  var userType = document.getElementById("userType").value;
  // Store userType in localStorage
  localStorage.setItem('userType', userType);
}

function changeloginfield(usertype){
  var body = document.getElementById("initialbody");
  body.innerHTML = '<object type="text/html" data="./components/loginstart.php" style="width:100%; height:100vh;"></object>';
  showLoginField(usertype);
}

function showLoginField(userType){
  var signuplink = document.getElementById("sul");
  var card = document.getElementById("cardl");
  signuplink.style.display = (userType.value === 'Client') ? 'block' : 'none';
  card.style.height = (userType.value === 'Client') ? '107%' : '112%';
}

function toggleP(id, idp){
document.getElementById(id).addEventListener('click', function() {
    const passwordField = document.getElementById(idp);
    const currentType = passwordField.getAttribute('type');
    const newType = currentType === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', newType);
    if (newType === "password") {
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
    } else {
        this.classList.remove("fa-eye-slash");
        this.classList.add("fa-eye");
    }
});
}

function showlabeltop(inputId, labelId) {
  var inputElement = document.getElementById(inputId);
  var labelElement = document.getElementById(labelId);
  
  if (inputElement && labelElement)
    labelElement.style.display = inputElement.value !== '' ? "block" : "none";
  
}

function sectionSelector(sectionstate, page, targetpage) {
  var pageCard = document.getElementById(page);
 // Retrieve checkbox states from localStorage
 //var id1 = localStorage.getItem('icard1') === 'true';
 //var id2 = localStorage.getItem('icard2') === 'true';
 var id3 = localStorage.getItem('icard3') === 'true';
 var id4 = localStorage.getItem('icard4') === 'true';
 var id5 = localStorage.getItem('icard5') === 'true';

 // Determine the correct target page based on localStorage values
 if (sectionstate === 'next'){
    /*if (!id1 && targetpage === 'section3') 
        targetpage = 'section4';
    if (!id2 && targetpage === 'section4') 
        targetpage = 'section5';*/
    if (!id3 && targetpage === 'section5') 
        targetpage = 'section6';
    if (!id4 && targetpage === 'section6') 
      targetpage = 'section7';
    if (!id5 && targetpage === 'section7') 
      targetpage = 'section8';
 } else if (sectionstate === 'prev')
  {
    /*if (!id1 && targetpage === 'section3')
        targetpage = 'section2';
    if (!id2 && targetpage === 'section4')
        targetpage = 'section3';*/
    if (!id3 && targetpage === 'section5') 
        targetpage = 'section4';
    if (!id4 && targetpage === 'section6') 
      targetpage = 'section5';
    if (!id5 && targetpage === 'section7')
      targetpage = 'section6';
    if (!id5 && targetpage === 'section5')
      targetpage = 'section4';
    console.log(targetpage);
  }
 // Update the targetPageCard based on the new targetpage value
 var targetPageCard = document.getElementById(targetpage);

  if (sectionstate === 'next') {
    targetPageCard.classList.remove('showprev');
    targetPageCard.classList.add('shownext');
    pageCard.style.display = 'none';
    targetPageCard.style.display = 'block';
  } else if (sectionstate === 'prev') {
    targetPageCard.classList.remove('shownext');
    targetPageCard.classList.add('showprev');
    pageCard.style.display = 'none';
    targetPageCard.style.display = 'block';
  }
}

function carddefiner() {
  // Define the checkbox IDs
  const ids = ["icard3", "icard4", "icard5"];
  
  // Iterate over the IDs
  ids.forEach(id => {
    // Get the checkbox element
    const checkbox = document.getElementById(id);
    
    // Set the value to the checkbox checked state or 'false' if null
    const value = checkbox ? (checkbox.checked ? 'true' : 'false') : 'false';
    
    // Save the value in localStorage
    localStorage.setItem(id, value);
  });

  sectionSelector('next', 'section4', 'section5');
}

function checkPasswordStrength(id, confirmId) {
  var password = document.getElementById(id).value;
  var confirmPassword = document.getElementById(confirmId).value;
  var card = document.getElementById('cardo');
  var strengthBar = document.getElementById('password-strength');
  var strength = 0;
  card.style.height = '128%';
  if (password === '') {
    strengthBar.style.display = 'none';
    return; // Exit the function early
  }

  strengthBar.style.display = 'block';
  
  if (password.length >= 8) {
    strength += 1;
  }
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[\W]+/)) {
    strength += 1;
  }
  
  // Check if confirmPassword is not empty and matches password
  if(confirmPassword!=''&&confirmPassword !== password){
    strength =7;
  }else strength +=1;

  switch (strength) {
    case 0:
    case 1:
    case 2:
      strengthBar.innerHTML = '<span class="strength-weak">Password is Weak</span>';
      localStorage.setItem('validity', false);
      card.style.height = '123%';
      break;
    case 3:
    case 4:
      strengthBar.innerHTML = '<span class="strength-normal">Password is Normal</span>';
      localStorage.setItem('validity', true);
      card.style.height = '123%';
      break;
    case 5:
    case 6:
      strengthBar.innerHTML = '<span class="strength-strong">Password is Strong</span>';
      localStorage.setItem('validity', true);
      card.style.height = '123%';
      break;
    case 7:
      strengthBar.innerHTML = '<span class="strength-weak">Passwords do not match</span>'; 
      localStorage.setItem('validity', false);
      card.style.height = '123%';
      break;
  }
}

function validateNumberInput(input) {
  input.value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
  if (input.value.length > 11) {
      input.value = input.value.slice(0, 11); // Trim to 11 digits
  }
}
