import IMask from "imask";

document.addEventListener("DOMContentLoaded", function () {
	let form = document.querySelector(".b-form__feedback");

	function getData(form) {
		let { elements } = form;

		let data = Array.from(elements)
			.filter((item) => !!item.name)
			.map((element) => {
				let { name, value } = element;

				return { name, value };
			});

		return data;
	}

	function validate(data) {
		let result = {
			errors: [],
		};

		data.forEach((element) => {
			element.value = element.value.replace(/ +/g, " ").trim();

			if (element.value === "") {
				result.errors.push(element.name);
			}

			if (element.name === "user_phone") {
				let phoneInput = form[element.name];

				const maskOptions = {
					mask: "+{7}(000)000-00-00",
					lazy: false,
				};

				const mask = IMask(phoneInput, maskOptions);

				if (mask.unmaskedValue.length !== 11) {
					result.errors.push(element.name);
				}
			}
		});

		result.data = data;

		return result;
	}

	function setEventInputs(inputName) {
		form[inputName].addEventListener("focus", function () {
			let parentContainer = form[inputName].parentElement;
			parentContainer.classList.remove(parentContainer.classList[1]);
		});
	}

	if (form !== null) {
		let phoneInput = form["user_phone"];

		const maskOptions = {
			mask: "+{7}(000)000-00-00",
			lazy: false,
		};

		IMask(phoneInput, maskOptions);

		form.addEventListener("submit", function () {
			let data = getData(form);

			data = validate(data);

			if (Object.keys(data.errors).length !== 0) {
				event.preventDefault();

				for (let name of data.errors) {
					let errorBlock = document.querySelector("." + name);

					let parentClassName =
						errorBlock.parentElement.className.trim();

					let errorClass = " " + parentClassName + "--error";
					errorBlock.parentElement.className += errorClass;

					setEventInputs(name);
				}
			}
		});
	}
});
