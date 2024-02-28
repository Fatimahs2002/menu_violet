var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});


// Theme switcher function
//const switchTheme = () => {
	// Get root element and data-theme value
	//const rootElem = document.documentElement
	//let dataTheme = rootElem.getAttribute('data-theme'),
		//newTheme

	//newTheme = (dataTheme === 'light') ? 'dark' : 'light'

	// Set the new HTML attribute
	//rootElem.setAttribute('data-theme', newTheme)

	// Set the new local storage item
	//localStorage.setItem("theme", newTheme)
//}

// Add the event listener for the theme switcher
//document.querySelector('#theme-switcher').addEventListener('click', switchTheme)