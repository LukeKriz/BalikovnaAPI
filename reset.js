//RESET INPUTU PŘI KLIKU NA JINÝ RADIO INPUT
//MŮŽE BÝT NAČTENO V PROJEKTU JEN JEDNOU - DÁVAT POZOR PŘI POUŽITÍ PPL PARCELSHOP

// resetování inputu na default

const rOne = document.querySelector("#radio_1");
const rTwo = document.querySelector("#radio_2");
const rThree = document.querySelector("#radio_3");

function resetToDefault() {

	const defType = document.querySelector(".typeOfBox");
	const defID = document.querySelector(".boxID");
	const defAdress = document.querySelector(".boxAdress");
	defType.value = "";
	defID.value = "";
	defAdress.value = "";
}
;

rOne.addEventListener("click", resetToDefault);
rTwo.addEventListener("click", resetToDefault);
rThree.addEventListener("click", resetToDefault);

