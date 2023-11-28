
//Otevření Modal okna pro Balíkovnu
function openModalBalikovna() {
	var modalOverlayBalikovna = document.querySelector(".modal-overlay-balikovna");
	var modalBoxBalikovna = document.querySelector(".modal-box-balikovna");
	modalOverlayBalikovna.style.display = "block";
	modalBoxBalikovna.style.display = "block";
}


// Přidání posluchače události na tlačítko pro otevření modálního okna
var modalButtonBalikovna = document.querySelector("#radio_12");
modalButtonBalikovna.addEventListener("click", openModalBalikovna);
// Přidání posluchače události na tlačítko pro zavření modálního okna
var closeButtonBalikovna = document.querySelector("#close-modal-balikovna-button");
closeButtonBalikovna.addEventListener("click", function () {
	var modalOverlayBalikovna = document.querySelector(".modal-overlay-balikovna");
	var modalBoxBalikovna = document.querySelector(".modal-box-balikovna");
	modalOverlayBalikovna.style.display = "none";
	modalBoxBalikovna.style.display = "none";
});

//Načtení Modal okna pro Balíkovnu
function openModalNapostu() {
	var modalOverlayNapostu = document.querySelector(".modal-overlay-napostu");
	var modalBoxNapostu = document.querySelector(".modal-box-napostu");
	modalOverlayNapostu.style.display = "block";
	modalBoxNapostu.style.display = "block";
}


// Přidání posluchače události na tlačítko pro otevření modálního okna
var modalButtonNapostu = document.querySelector("#radio_11");
modalButtonNapostu.addEventListener("click", openModalNapostu);
// Přidání posluchače události na tlačítko pro zavření modálního okna
var closeButtonNapostu = document.querySelector("#close-modal-napostu-button");
closeButtonNapostu.addEventListener("click", function () {
	var modalOverlayNapostu = document.querySelector(".modal-overlay-napostu");
	var modalBoxNapostu = document.querySelector(".modal-box-napostu");
	modalOverlayNapostu.style.display = "none";
	modalBoxNapostu.style.display = "none";
});


//Propsání výysledku do inputů a zavření Modal okna
function iframeListener(event) {
	var modalBoxBalikovna = document.querySelector(".modal-box-balikovna");
	var modalBoxNapostu = document.querySelector(".modal-box-napostu");
	if (modalBoxBalikovna.style.display === "block" && event.data.message === 'pickerResult') {


		var modalOverlayBalikovna = document.querySelector(".modal-overlay-balikovna");
		var balikovnaType = document.querySelector(".typeOfBox");
		var balikovnaID = document.querySelector(".boxID");
		var balikovnaAdress = document.querySelector(".boxAdress")

		modalOverlayBalikovna.style.display = "none";
		modalBoxBalikovna.style.display = "none";
		balikovnaType.value = 'Balikovna';
		balikovnaID.value = event.data.point.id;
		balikovnaAdress.value = event.data.point.address;
	} else if (modalBoxNapostu.style.display === "block" && event.data.message === 'pickerResult') {


		var modalOverlayNapostu = document.querySelector(".modal-overlay-napostu");
		var napostuType = document.querySelector(".typeOfBox");
		var napostuID = document.querySelector(".boxID");
		var napostuAdress = document.querySelector(".boxAdress")


		modalOverlayNapostu.style.display = "none";
		modalBoxNapostu.style.display = "none";
		napostuType.value = 'Balikovna';
		napostuID.value = event.data.point.id;
		napostuAdress.value = event.data.point.address;
	}
}
window.addEventListener('message', iframeListener);