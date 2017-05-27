var isNS = (navigator.appName.indexOf("Netscape")!=-1); 

// JavascriptStore

function OpenDialogWindow(url, name, w, h)
{
	t = (screen.height/2)-(h/2);
	l = (screen.width/2)-(w/2);	
	win = window.open(url, name, 'toolbar=0, status=1, menubar=0, location=0, resizable=1, scrollbars=auto, dependent=1, width=' + w + ', height=' + h + ', top=' + t + ', left=' + l);
	win.focus();
}

function SendDialogResult(command, parameter)
{
	FindObject('DialogResultCommand').value=command;
	FindObject('DialogResultParameter').value=parameter;
	FindObject('DialogResultIsReceived').value='1';
	FindObject('Form1').submit();
}

function Popup(url,name,w,h,rs,sc,mn)
{
	t = (screen.height/2)-(h/2);
	l = (screen.width/2)-(w/2);
	var newwindow = window.open(url,name,'toolbar=0, status=1, menubar=' + mn + ', location=0, resizable=' + rs + ', scrollbars=' + sc + ', dependent=1, width=' + w + ', height=' + h + ', top=' + t + ', left=' + l);
    if (window.focus) { newwindow.focus() }
            return false;
}

function Popup2(url,w,h)
{
	Popup(url, '', w, h, 0, 0, 0);
}

// End Javascript store

// BasePage Scripts

function ScreenLock__()
{
	var myDiv = FindObject('__prcssDiv');
	myDiv.style.display = 'block'; 
	myDiv.style.height = window.screen.availHeight;   
	myDiv.style.width = window.screen.width;
	myDiv.style.top = document.body.scrollTop;
	theForm = document.forms[0];
	for (i = 0; i < theForm.elements.length; i++) 
	{
		element = theForm.elements[i];
		if (element.tagName.toLowerCase() == 'select')
			element.style.visibility = 'hidden';
	}
}

function EnableScreenLock__()
{
	window.onbeforeunload = ScreenLock__;
}

function SendXMLRequest(params, pageNameToRequest)
{
	var pageUrl = pageNameToRequest + '?callback=true&param=' + params;
	var xmlRequest;

	if (window.XMLHttpRequest) 
		xmlRequest = new XMLHttpRequest();
	else if (window.ActiveXObject) 
		xmlRequest = new ActiveXObject('Microsoft.XMLHTTP');
		
	xmlRequest.open('POST', pageUrl, false);
	xmlRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlRequest.send(null);

	return xmlRequest;
}

// --

function AvoidHistoryBack__()
{
	if (window.history.length > 0)
		window.history.forward();
}

// --

function SendWindowClosed__() 
{
	if (window.event.clientX < 0 && window.event.clientY < 0)
	{
		//Popup('SignOut.aspx',200,200,0,0)
		SendXMLRequest('WindowClosed',window.document.location);
	}
	return true;
}

function EnableWindowClosed__()
{
	window.onunload = SendWindowClosed__;
}
		
// END BasePageScripts			

function FindObject(n, d)
{
	var p,i,x;  if(!d) d=document; 
	if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; 
		n=n.substring(0,p);
	}
	if(!(x=d[n])&&d.all) x=d.all[n]; 
		for (i=0;!x&&i<d.forms.length;i++) 
			x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++)
			x=FindObject(n,d.layers[i].document);
	if(!x && document.getElementById) 
		x=document.getElementById(n); 
	return x;
}

function DocumentWrite(script)
{
	document.write(script);
}

function __PressTabForEnter()
{
	if(document.layers)
			document.captureEvents(Event.KEYDOWN)
	document.onkeydown=__HandleKeyPress;
}
	
function __HandleKeyPress(e){
	keyCode=(document.layers)?e.which:window.event.keyCode
	if (keyCode == 13)
		window.event.keyCode = 9;
	return true;
}

function IsAlphanumeric(alphane)
{
	var numaric = alphane;
	for(var j=0; j<numaric.length; j++)
	{
		var alphaa = numaric.charAt(j);
		var hh = alphaa.charCodeAt(0);
		if((hh > 47 && hh<59) || (hh > 64 && hh<91) || (hh > 96 && hh<123) || (hh == 32))
		{
		}
		else	
		{
			return false;
		}
	}
	return true;
}

function Trim(s) 
{
		// Remove leading spaces and carriage returns
		while ((s.substring(0,1) == ' ') || (s.substring(0,1) == '\n') || (s.substring(0,1) == '\r'))
		{ s = s.substring(1,s.length); }
	     
		// Remove trailing spaces and carriage returns
		while ((s.substring(s.length-1,s.length) == ' ') || (s.substring(s.length-1,s.length) == '\n') || (s.substring(s.length-1,s.length) == '\r'))
		{ s = s.substring(0,s.length-1); }
	     
		return s;
}