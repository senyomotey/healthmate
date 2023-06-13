
// get modal element
var modal = document.getElementById('modalBox');

// get open modal button
var modalBtn = document.getElementById('modalBtn');

// get close modal button 
var closeBtn = document.getElementsByClassName('closeBtn')[0];



// listen for open click
modalBtn.addEventListener('click', openModal);

// listen for close click
closeBtn.addEventListener('click', closeModal);



// function to open modal
function openModal(){
	modal.style.display = 'block';
}

// function to close modal
function closeModal(){
	modal.style.display = 'none';
}



		filterSelection("all") //Execute the function and displays all
		function filterSelection(c){
			var x, i;
			x= document.getElementsByClassName("column");
			if (c == "all") c = "";
			// Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the 
			//elements that are not selected
			for (i = 0; i < x.length; i++){
				w3RemoveClass(x[i], "show");
				if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
			} 
		}

		// Show filtered elements
		function w3AddClass(element, name){
			var i, arr1, arr2;
			arr1 = element.className.split(" ");
			arr2 = name.split(" ");
			for (i = 0; i < arr2.length; i++){
				if (arr1.indexOf(arr2[i]) == -1){
					element.className += " " + arr2[i];
				}
			}
		}

		// Hide elements that are not selected
		function w3RemoveClass(element, name){
			var i, arr1, arr2;
			arr1 = element.className.split(" ");
			arr2 = name.split(" ");
			for (i = 0; i < arr2.length; i++){
				while (arr1.indexOf(arr2[i]) > -1){
					arr1.splice(arr1.indexOf(arr2[i]), 1);
				}
			}
			element.className = arr1.join(" ");
		}

		//Add active class to the current button (highlight it)
		var btnContainer = document.getElementById("myBtnConatainer");
		var btns = btnContainer.getElementsByClassName("btn");
		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener("click", function(){
				var current = document.getElementsByClassName("active");
				current[0].className = current[0].className.replace("active", "");
				this.className += "active";
			});
		}

		/*
		//slideshow js
		var index = 1;

		function plusIndex(n){
			index = index + 1;
			showImage(index);
		}

		showImage(1);

		function showImage(n){
			var i;
			var x = document.getElementsByClassName("slides");
			if(n > x.lenght){ index = 1};
			if(n < 1){ index = x.lenght};
			for(i=0;i<x.lenght;i++)
				{
					x[i].style.display = "none";
				}
			x[index-1].style.display = "block";
		}
		*/

		
















