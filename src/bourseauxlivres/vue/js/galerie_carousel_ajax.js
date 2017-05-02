//On teste le browser afin de specificié l'objet XmlHttpRequest 
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest(); //Mozilla, Safari ...
	} else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP"); //IE
	} else {
		//Affiche un message d'erreur
		alert("Your browser doesn't support the XmlHttpRequest object. Votre navigateur ne supporte pas XmlHttpRequest.");
	}
}

//On créer notre objet
var xmlHTTP = getXmlHttpRequestObject();

//On initialise notre requête
function getGalerie() { 
	var url = "getImages";
	var params = "image=true";
	xmlHTTP.open("POST", url, true);

	xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xmlHTTP.onreadystatechange = function() {
		if(xmlHTTP.readyState == 4 && xmlHTTP.status == 200) {
			document.getElementById("carousel").innerHTML = xmlHTTP.responseText;
			carousel();
		}
	}
	xmlHTTP.send(params);
};

// Notre partie carousel
function carousel(){
	// on récupère le carrousel (div id carrousel)
    var $carrousel = $('#carousel'); 
    // on récupère les images du carrousel (div id carrousel img)
    var $img = $('#carousel img');
    // on définit l'index du dernier élément
    var indexImg = $img.length - 1; 
    var i = 0;
    // image courante
    var $currentImg = $img.eq(i); 

    // on cache les images
    $img.css('display', 'none');
    // on affiche seulement l'image courante
	$currentImg.css('display', 'block'); 

	$carrousel.append('<a class="prev arrow-left"><button type="button" class="carouselBoutton">&#10094;</button></a> <a class="next arrow-right"><button type="button" class="carouselBoutton">&#10095;</button></a>');

	/* Permet de passer à l'image suivante (i+1) */
	$('.next').click(function(){ // image suivante

	    if( i < indexImg ){
	        $img.css('display', 'none'); // on cache les images
	        i++; // on incrémente le compteur
	        $currentImg = $img.eq(i); // on définit la nouvelle image
	        $currentImg.css('display', 'block'); // puis on l'affiche
	    }else{
	    	$img.css('display', 'none'); // on cache les images
	        i = 0;
	        $currentImg = $img.eq(i); // on définit la nouvelle image
	        $currentImg.css('display', 'block'); // puis on l'affiche
	    }
	});

	/* Permet de revenir à l'iamge précédente (i-1) */
	$('.prev').click(function(){ // image précédente

	    if( i > 0 ){
	        $img.css('display', 'none');
	        i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
	        $currentImg = $img.eq(i);
	        $currentImg.css('display', 'block');
	    }else{
	    	$img.css('display', 'none'); // on cache les images
	        i = indexImg;
	        $currentImg = $img.eq(i); // on définit la nouvelle image
	        $currentImg.css('display', 'block'); // puis on l'affiche
	    }
	});

	function slideImg(){
	    setTimeout(function(){ // on utilise une fonction anonyme
							
	        if(i < indexImg){ // si le compteur est inférieur au dernier index
		    	i++; // on l'incrémente
			}else{ // sinon, on le remet à 0 (première image)
			    i = 0;
			}

			$img.css('display', 'none');

			$currentImg = $img.eq(i);
			$currentImg.css('display', 'block');

			slideImg(); // on relance la fonction à la fin

	    }, 7000); // on définit l'intervalle à 7000 millisecondes (7s)
	}

	slideImg(); // enfin, on lance la fonction une première fois
}

// On attend que le DOM soit bien chargé
$(document).ready(function(){
	// on fait notre appel ajax
	getGalerie();
});