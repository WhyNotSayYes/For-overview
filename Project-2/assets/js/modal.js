const popupLinks=document.querySelectorAll('.popup-link');const body2=document.querySelector('body');const lockPadding=document.querySelectorAll('.lock-padding');let unlock=!0;const timeout=800;if(popupLinks.length>0){for(let index=0;index<popupLinks.length;index++){const popupLink=popupLinks[index];popupLink.addEventListener("click",function(e){const popupName=popupLink.getAttribute('href').replace('#','');const currentPopup=document.getElementById(popupName);popupOpen(currentPopup);e.preventDefault()})}}
const popupCloseIcon=document.querySelectorAll('.close-popup');if(popupCloseIcon.length>0){for(let index=0;index<popupCloseIcon.length;index++){const el=popupCloseIcon[index];el.addEventListener('click',function(e){popupClose(el.closest('.popup'));e.preventDefault()})}}
function popupOpen(currentPopup){if(currentPopup&&unlock){const popupActive=document.querySelector('.popup.open');if(popupActive){popupClose(popupActive,!1)}else{bodyLock()}
currentPopup.classList.add('open');currentPopup.addEventListener("click",function(e){if(!e.target.closest('.popup__content')){popupClose(e.target.closest('.popup'))}})}}
function popupClose(popupActive,doUnlock=!0){if(unlock){popupActive.classList.remove('open');if(doUnlock){bodyUnLock()}}}
function bodyLock(){const lockPaddingValue=window.innerWidth-document.querySelector('.wrapper').offsetWidth+'px';if(lockPadding.length>0){for(let index=0;index<lockPadding.length;index++){const el=lockPadding[index];el.style.paddingRight=lockPaddingValue}}
body2.style.paddingRight=lockPaddingValue;body2.classList.add('lock');unlock=!1;setTimeout(function(){unlock=!0},timeout)}
function bodyUnLock(){setTimeout(function(){if(lockPadding.length>0){for(let index=0;index<lockPadding.length;index++){const el=lockPadding[index];el.style.paddingRight='0px'}}
body2.style.paddingRight='0px';body2.classList.remove('lock')},timeout);unlock=!1;setTimeout(function(){unlock=!0},timeout)}