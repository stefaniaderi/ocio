
//MENU
const header_dropdown = document.querySelector('.header');
const agenda = document.querySelector('.agenda');
const menu_button = document.querySelector('.menu');
const bio = document.querySelector('.bio');
const menu = document.querySelector('.menu_dropdown');
const logo = document.querySelector('.logo');
const filter = document.querySelector('.filter');
const page_title = document.querySelector('.page_title');

/*if ( bio != null) {
	bio.addEventListener('mouseover', openbio);
	function openbio() {
		bio.classList.toggle('open');
	}
}*/

menu_button.addEventListener("click", dropdownMenu);

function dropdownMenu(){
	menu_button.classList.toggle('menu_open');
	console.log(menu);
	menu.classList.toggle('show');
	agenda.classList.toggle('hide');
	header_dropdown.classList.toggle('header_open');

}
if ( document.querySelector('.filter_toggle') != null) {
   		document.querySelector('.filter_toggle').addEventListener("click", filterOpen);
	};

function filterOpen(){

	filter.classList.toggle('show');
	this.classList.toggle('filter_toggle_open');

}
//SCROLL HEADER APPEAR
// Get the button:
let mybutton = document.getElementById("scroll_top");
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
const mediaQuery = window.matchMedia('(max-width: 700px)');

window.onscroll = function() {
	var lemmas=document.getElementsByClassName("lemma_singolo");

	for (var i = 0; i < lemmas.length; i++) {
	  lemmas[i].style.opacity="0";
	}

	//TOP BUTTON APPEARS
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    mybutton.style.display = "block";
    mybutton.style.opacity = "1";
  } else {
    mybutton.style.display = "none";
    mybutton.style.opacity = "0";
  }
   /*if ( bio != null) {
		if (document.body.scrollTop > bio.offsetHeight || document.documentElement.scrollTop > bio.offsetHeight) {
   		bio.style.opacity ="0";
    	bio.style.display ="none";
    	header_dropdown.style.opacity = "1";

    } else {
    	/*header_dropdown.style.opacity = "1";
    }
	}*/

  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    header_dropdown.style.top = "0";
    header_dropdown.style.opacity = "1";
    //IF MENU OPEN EXISTS
    if (menu != null) {
		menu.style.display = "none";	
	}
    //IF FILTER EXISTS
    if ( filter != null) {
   		filter.style.top = "calc(var(--header-height) + 2 * var(--padding))";
	};
    //IF PAGE TITLE EXISTS
    if ( page_title != null) {
   		page_title.style.top = "calc(var(--header-height) + 3 * var(--padding))";
   		if (mediaQuery.matches) {
  			// Then trigger an alert
  			document.querySelector('.page_title ').style.top = "inherit";
  			document.querySelector('.page_title ').style.opacity = "1";
		}
	};
    
  } else {
    header_dropdown.style.top = "calc(0px - var(--header-height) - var(--padding) * 2)";
    header_dropdown.style.opacity = "0";
    //IF FILTER EXISTS
    if ( filter != null) {
   		filter.style.top = "0";
	};
    //IF PAGE TITLE EXISTS
    if ( page_title != null) {
   		page_title.style.top = "var(--padding)";
   		page_title.style.opacity = "1";
   		if (mediaQuery.matches) {
  			// Then trigger an alert
  			document.querySelector('.page_title ').style.top = "-10rem";
  			document.querySelector('.page_title ').style.opacity = "0";
		}
	}
    
  }
  prevScrollpos = currentScrollPos;
}


// SCROLL TO TOP



// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//FILTER POST

filterSelection("all")
function filterSelection(c) {
	console.log(this);
	var x, i;
	x = document.getElementsByClassName("loop_single");
	console.log(x);
	if (c == "all") c = "";
	// Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected

	  for (i = 0; i < x.length; i++) {
	    w3RemoveClass(x[i], "show");
	    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
	  }
  	
}
var btns = document.getElementsByClassName("filter_single");
for (var i = 0; i < btns.length; i++) {

	btns[i].addEventListener("click", function() {
  		console.log(i);
  		var current = document.getElementsByClassName("active");
  		current[0].className = current[0].className.replace(" active", "");
  		this.className += " active";
  	});
}
// Show filtered elements
function w3AddClass(element, name) {
	var i, arr1, arr2;
	arr1 = element.className.split(" ");
	arr2 = name.split(" ");
	for (i = 0; i < arr2.length; i++) {
	  if (arr1.indexOf(arr2[i]) == -1) {
	    element.className += " " + arr2[i];
	  }
	}
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
	var i, arr1, arr2;
	arr1 = element.className.split(" ");
	arr2 = name.split(" ");
	for (i = 0; i < arr2.length; i++) {
	  while (arr1.indexOf(arr2[i]) > -1) {
	    arr1.splice(arr1.indexOf(arr2[i]), 1);
	  }
	}
	element.className = arr1.join(" ");
}




function showDiz(e){

var lemmas=document.getElementsByClassName("lemma_singolo");

for (var i = 0; i < lemmas.length; i++) {
  lemmas[i].style.opacity="0";
  lemmas[i].style.display="none";
}

name = e;
document.getElementById(name).style.opacity="1"
document.getElementById(name).style.zIndex= "900000";
document.getElementById(name).style.display="block"



}

function hideDiz(e){

name = e;


document.getElementById(name).style.opacity="0"
document.getElementById(name).style.zIndex= "0";


}


//FILTERS

/*const button = document.querySelector('.filter-category__title');

button.addEventListener("click", dropdown);

function dropdown() {
	console.log("Button clicked");
	document.querySelector('.filter-category__dropdown').style.display = "block";
}
*/


/*const filters = Array.from(document.getElementsByClassName('.filter-category__title'));

for (i=0; i< filters.length(); i++){
	filters[i].addEventListener('click', function{
		this.classList.toggle("filter-category__dropdown");
	});
}*/

/*const categories = document.querySelectorAll('.filter-category__title')
/*category.addEventListener('click', function(){
	this.toggle('.filter-category__title_open');
})

categories.forEach(category => {
  category.addEventListener('click', function () {
    category.toggle('.filter-category__title_open');
  });
});*/

//FILTER OPEN

/*var category_title = document.querySelectorAll('.filter-category__title');
var categories = document.querySelectorAll('.filter-category');
console.info(category_title);
for (var i = 0; i < category_title.length; i++){
	category_title[i].addEventListener('click', function () {
		this.parentElement.classList.toggle('filter-category--open');
		const dropdown = this.nextElementSibling;
		if (dropdown.style.display === "none") {
				dropdown.style.display = "block";	
		} else {
			dropdown.style.display = "none";
		}
	})
}*/



