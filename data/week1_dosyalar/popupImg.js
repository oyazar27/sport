function doPopups() {
  if (!document.getElementsByTagName) return false;
  var links=document.getElementsByTagName("a");
  for (var i=0; i < links.length; i++) {
    if (links[i].className.match("popupImg")) {
      links[i].onclick=function() {
        // Below - to open a full-sized window, just use: window.open(this.href);
        window.open(this.href, "", "top=40,left=40,width=800,height=600,scrollbars");
        return false;
      }
    }
    if (links[i].className.match("popupCanliAnlatim")) {
      links[i].onclick=function() {
        // Below - to open a full-sized window, just use: window.open(this.href);
        window.open(this.href, "", "top=40,left=40,width=940,height=680,scrollbars");
        return false;
      }
    }
    
  }
}
window.onload=doPopups;