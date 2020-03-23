function dropDown()
{
	document.getElementById("myDropdown").classlist.toggle("show");
}

window.onclick = function(event) 
{
	if(!event.target.matches('.dropdownbtn')) 
	{
		var dropdownItems = document.getElementsByClassName("dropdown-content");
		var i;
		for(i=0; i < dropdownItems.length; i++)
		{
			var openDropdown = dropdownItems[i];
			if (openDropdown.classList.contains('show'))
			{
				openDropdown.classList.remove('show');
			}
		}    
	}		
}

			