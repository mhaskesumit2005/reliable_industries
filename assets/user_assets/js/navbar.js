/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
  const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId)

  toggle.addEventListener('click', () =>{
      // Add show-menu class to nav menu
      nav.classList.toggle('show-menu')

      // Add show-icon to show and hide the menu icon
      toggle.classList.toggle('show-icon')
  })
}

showMenu('nav-toggle','nav-menu')

/*=================== RESPONSIVE MENU =====================*/
document.addEventListener('DOMContentLoaded', () => {
   // Handle dropdown items for main menu
   const dropdownItems = document.querySelectorAll('.dropdown__item');
 
   dropdownItems.forEach((item) => {
     const link = item.querySelector('.nav__link');
     const menu = item.querySelector('.dropdown__menu');
 
     link.addEventListener('click', (e) => {
       e.preventDefault(); // Prevent default link behavior
 
       // Toggle the current menu
       menu.classList.toggle('active');
 
       // Close other dropdown menus
       dropdownItems.forEach((otherItem) => {
         if (otherItem !== item) {
           const otherMenu = otherItem.querySelector('.dropdown__menu');
           otherMenu?.classList.remove('active');
         }
       });
     });
   });
 
   // Handle dropdown sub-items
   const dropdownSubItems = document.querySelectorAll('.dropdown__subitem');
 
   dropdownSubItems.forEach((subItem) => {
     const link = subItem.querySelector('.dropdown__link');
     const submenu = subItem.querySelector('.dropdown__submenu');
 
     link.addEventListener('click', (e) => {
       e.preventDefault(); // Prevent default link behavior
 
       // Toggle the current submenu
       submenu.classList.toggle('active');
 
       // Close other submenus within the same parent
       const parentMenu = subItem.closest('.dropdown__menu');
       parentMenu.querySelectorAll('.dropdown__submenu').forEach((otherSubmenu) => {
         if (otherSubmenu !== submenu) {
           otherSubmenu.classList.remove('active');
         }
       });
     });
   });
 });
 