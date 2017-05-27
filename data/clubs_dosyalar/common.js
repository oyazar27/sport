/*  Search */

var Turkce = "tr-TR";
var English = "en-US";

function Search__CheckCharacter(control)
{
	var invalidControls = "";
	
	if(control.value.indexOf('|') > -1)
	{
		invalidControls = "| ";
	}
	else if(control.value.indexOf('.') > -1)
	{
		invalidControls += ". "
	}
	else if(control.value.indexOf('"') > -1)
	{
		invalidControls += '" '
	}
	else if(control.value.indexOf('&') > -1)
	{
		invalidControls += '& '
	}
	
	else if(control.value.indexOf(' and') > -1)
	{
		invalidControls += 'and '
	}
	
	else if(control.value.indexOf(' or') > -1)
	{
		invalidControls += 'or '
	}
	
	else if(control.value.indexOf("'") > -1)
	{
		invalidControls += "' "
	}

	if(invalidControls.length != 0)
	{
		alert("Arama yaparken " + invalidControls + " karakterlerini kullanmamalýsýnýz.");
		return false;
	}
	else
		return true;
}

function Search__GenerateSearch( resultPageId, cultureID )
{			
	
	var txt = FindObject('txtSearch');
	
	//' yerine '' kullan.. replace!!
	var expressionString = "";
	var q = txt.value;
	q = Trim(q);
		
	if ( q == "" )
	{
		if(cultureID == English)
		{
		    alert('Please Enter the Search Criteria');
		}
		else
		{
		    alert('Lütfen arama kriteri giriniz');
		}
		return false;
	}
		
	if ( q.length < 3 )
	{
		if(cultureID == English)
		{
		    alert('Please Enter at Least 3 Characters');
		}
		else
		{
		    alert('En az 3 karakter giriniz.');
		}
		return false;
	}
		
	if (q != "")
	{
		if( ! Search__CheckCharacter(txt) )
			return false;
		
		searchText = q.split(" ");
		for (i=0; i<searchText.length; i++)
		{
			if (Trim(searchText[i]) != "")
			{
			/*
				if (i < searchText.length-1)
					expressionString += "0|2|" + searchText[i].replace("'","''") + "|0|1|";
				else
					expressionString += "0|2|" + searchText[i].replace("'","''") + "|0|";
					*/
			    if (searchText.length == 1)
			        expressionString += "1|2|" + searchText[i].replace("'","''") + "|1|";
				else if (i == 0)
					expressionString += "1|2|" + searchText[i].replace("'","''") + "|0|1|";
				else if (i == searchText.length - 1)
					expressionString += "0|2|" + searchText[i].replace("'","''") + "|1|";
				else
					expressionString += "0|2|" + searchText[i].replace("'","''") + "|0|1|";
			}
		}
		window.location = 'Default.aspx?pageId=' + resultPageId + '&exp=' + escape(expressionString);
	}
	
	return false;
}
	
function Search__CheckSearchKey( resultPageId )
{
	var keyCode = event.keyCode;
	if (keyCode == 13) // enter
	{
		event.keyCode = 9; // tab
		return Search__GenerateSearch( resultPageId );
	}
	else
		return true;
}
