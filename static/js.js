window.onload = function() {
	var projects = document.querySelectorAll("#GP li");
	for (index=0; index<projects.length; index++) {
		projects[index].addEventListener("click", function() {

			var projectChilds = this.parentNode.childNodes
			for (id=0; id<projectChilds.length; id++) {
				child = projectChilds[id];
				if (child.className != "show") {
					child.className = "show";
				} else {
					child.className = "";
				}
			}
		});
	}
	console.log(projects);
}