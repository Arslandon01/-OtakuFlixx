 const authModal = document.querySelector('.auth-modal');
 const loginLink = document.querySelector('.Login-link');
 const registerLink = document.querySelector('.register-link');
 const loginBtnModal = document.querySelector('.login-btn-modal');
 const closeBtnModal = document.querySelector('.close-btn-modal');
 const profileBox = document.querySelector('.profile-box');
 const avatarCircle = document.querySelector('.avatar-circle');
 const alertBox = document.querySelector('.alert-box');


 registerLink.addEventListener('click',()=> authModal.classList.add('slide'));
 loginLink.addEventListener('click',()=> authModal.classList.remove('slide'));
 
 if(loginBtnModal)  loginBtnModal.addEventListener('click',()=> authModal.classList.add('show'));
 if(avatarCircle) avatarCircle.addEventListener('click',()=> profileBox.classList.toggle('show'));
 closeBtnModal.addEventListener('click',()=> authModal.classList.remove('show','slide'));

 closeBtnModal.addEventListener('click',()=> authModal.classList.remove('show','slide'));

 if(alertBox){
setTimeout(() => alertBox.classList.add('show'),50);

 setTimeout(() =>{ alertBox.classList.remove('show');
setTimeout(() => alertBox.remove(),1000)

 }, 6000); 

 }
 

$(document).ready(function () {
  // Toggle desktop dropdowns
  $('.dropdown-toggle').click(function (e) {
    e.preventDefault();

    // Close all other open dropdowns
    $('.dropdown-parent').not($(this).parent()).removeClass('open');
    $(this).parent().toggleClass('open');
  });

  // Close on outside click for desktop dropdowns
  $(document).click(function (e) {
    if (!$(e.target).closest('.dropdown-parent').length) {
      $('.dropdown-parent').removeClass('open');
    }
  });

  // ✅ Hamburger toggle (this one only)
  $('.hamburger').click(function (e) {
    e.stopPropagation(); // Prevent outside click from firing
    $('.mobile-nav').toggleClass('active');
  });

  // ✅ Optional: click outside to close mobile nav
  $(document).click(function (e) {
    if (!$(e.target).closest('.mobile-nav, .hamburger').length) {
      $('.mobile-nav').removeClass('active');
    }
  });
});

// Mobile dropdown toggle
$('.mobile-dropdown-toggle').click(function (e) {
  e.preventDefault();
  $(this).next('.mobile-dropdown-menu').slideToggle(200);
  $(this).parent().toggleClass('open');
});


// theme toggle

  $(document).ready(function() {
  const toggle = $('#theme-switch')[0];
  const body = document.body;

  if (localStorage.getItem('theme') === 'light') {
    body.classList.add('light-mode');
    toggle.checked = true;
  }

  toggle.addEventListener('change', () => {
    if (toggle.checked) {
      body.classList.add('light-mode');
      localStorage.setItem('theme', 'light');
    } else {
      body.classList.remove('light-mode');
      localStorage.setItem('theme', 'dark');
    }
  });
  
  // …existing dropdown + mobile nav JS…
});



