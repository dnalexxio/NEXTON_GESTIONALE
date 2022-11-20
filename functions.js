//boh
function getHTTPObject() {
	var http = false;
	//Use IE's ActiveX items to load the file.
	if(typeof ActiveXObject != 'undefined') {
		try {http = new ActiveXObject("Msxml2.XMLHTTP");}
		catch (e) {
			try {http = new ActiveXObject("Microsoft.XMLHTTP");}
			catch (E) {http = false;}
		}
	//If ActiveX is not available, use the XMLHttpRequest of Firefox/Mozilla etc. to load the document.
	} else if (XMLHttpRequest) {
		try {http = new XMLHttpRequest();}
		catch (e) {http = false;}
	}
	return http;
}
var http = getHTTPObject();
function handler() { //Call a function when the state changes.
document.getElementById('docpane').innerHTML = "Loading";
	if(http.readyState == 4 && http.status == 200) {
		document.getElementById('docpane').innerHTML = http.responseText;
	}
}


function get(params) {
	var http = getHTTPObject();
	var url = "newrequest.php";
		
	http.open("GET", url+"?"+params, true);
	
	http.send(null);
}

function getpage(url) {
	http.open("GET", url, true);
	http.onreadystatechange = handler;
	http.send(null);
	
}

function getimg(params) {
	var http = getHTTPObject();
	var url = params;
	http.open("GET", url, true);
	http.send(null);
}

function dojoForm(form) {
				var kw = {
					mimetype: "text/plain",
					url: "newrequest.php",
					method: "POST",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						if(allora==null) allora=dojo.byId('note') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}


function dojoForm2(form) {
				var kw = {
					mimetype: "text/plain",
					url: "newrequest.php",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML="loading..";
						allora.innerHTML=txt;
												
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}
function dojoForm3(form,dest_pane) {
				var kw = {
					mimetype: "text/plain",
					url: "newrequest.php",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId(dest_pane) ;
						allora.innerHTML="loading..";
						allora.innerHTML=txt;
												
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}
			
function dojoFormseek(form) {
				var kw = {
					mimetype: "text/plain",
					url: "seek.php",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML=txt;
												
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}

function dojoeditForm(chi,dove,cosa) {
				var kw = {
					mimetype: "text/plain",
					method: "POST",
					content: { "chi": chi , "campo" : dove, "cosa" : cosa },
					url: "editreq.php",
					load: function(t, txt, e) {
					
						var allora=dojo.byId('debug') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}


			

function dojodel(codice) {
				var kw = {
					mimetype: "text/plain",
					method: "POST",
					content: { "delproduct": codice },
					url: "newrequest.php",
					load: function(t, txt, e) {
					
						var allora=dojo.byId('debug') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}
function dojodel2(ordine,codice) {
				var kw = {
					mimetype: "text/plain",
					method: "POST",
					content: { "order" : ordine, "delproduct": codice },
					url: "newrequest.php",
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML=txt;
						location.reload();
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}


function dojoForm4(form) {
				var kw = {
					mimetype: "text/plain",
					url: "carrello.php",
					method: "POST",
					formNode: form,
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}

function magicForm(form) {  var x = new dojo.io.FormBind({    // reference your form    
formNode: form,
url: "newrequest.php",
mimetype: "text/javascript",
	    load: function(load, data, e) { 
     // what to do when the form finishes      // for example, populate a DIV:      
var allora=dojo.widget.byId('note');
allora.setContent(data);

    } 
 });
}
function controlla(form){
var dacon=document.getElementById("dacon");
if(dacon.nome1.value!="" && dacon.nome2.value!="" && dacon.nome3.value!="") return true;
else { alert("inserisci valori"); }

}


function dojoTOT(name) {
				var kw = {
					mimetype: "text/plain",
					url: "newrequest.php",
					method: "POST",
					content: { "findtotal": name },
					load: function(t, txt, e) {
					
						var allora=dojo.byId('docpane') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
			}

function dojoFastBuy(quantity,id,nname,categoria,price,code) {
				var kw = {
					mimetype: "text/plain",
					method: "POST",
					content: { 
							"id": id , "nname" : nname , "categoria" : categoria,
							 "price" : price, "code" :code , "quantity" : quantity,
							
						},
					url: "newrequest.php",
					load: function(t, txt, e) {
					
						var allora=dojo.byId('debug') ;
						allora.innerHTML=txt;
						
					
								},
					error: function(t, e) {
						dojo.debug("Error!... " + e.message);
					}
				};
				dojo.io.bind(kw);
				
}

var i = 1;
function changeiframe(i) {
    if (i<7 && i> 0) switch (i)
    {
        case 1:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/0MUfp8G8410";
            break;
        case 2:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/XwUe8E3wH-k";
            break;
        case 3:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/ANu47DJHST";
            break;
        case 4:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/D4L26IQ--vM";
            break;
        case 5:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/nbBZRyb3vok";
            break;
        case 6:
            document.getElementById("iframe1").src = "http://www.youtube.com/embed/0MUfp8G8410";
            break;
    }
    else i=1;
    
}


function animatediv(menu_item) {
    document.getElementById(1).className = "";
    document.getElementById(2).className = "";
    document.getElementById(3).className = "";
    document.getElementById(4).className = "";
    document.getElementById(5).className = "";

    document.getElementById(menu_item).className = "active";
}

function transform(id){
alert('you have pressed'+id);
}
