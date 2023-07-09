


document.addEventListener("DOMContentLoaded", function(){


	let nodeList; 

	nodeList = document.querySelectorAll("a.del");



	for (let i = 0; i < nodeList.length; i++) {


				nodeList[i].addEventListener("click", function(){

							let DEL_or_NOT = confirm('do you really want to del this article');


							if (DEL_or_NOT) {


							}else{
								event.preventDefault();

							}


				});

	}




}); 







