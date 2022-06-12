function addNewOptionToTheSurvey() {
    const surveyOptions = document.getElementById("form-box-options");
    const newOptionNumber = surveyOptions.childElementCount + 1;

    const formBox = document.createElement("div");
    formBox.setAttribute("id", "option"+newOptionNumber);
    formBox.classList.add("form-box");
    formBox.classList.add("form-box-options");
    const label = document.createElement("label");
    label.innerHTML = `Opção ${newOptionNumber}`;
    label.setAttribute("for", "options[][name]");

    formBox.appendChild(label);

    const input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", "options[][name]");
    input.setAttribute("placeholder", `Opção ${newOptionNumber}`);

    const deleteOptionButton = document.createElement("button");
    deleteOptionButton.innerHTML = "X";
    deleteOptionButton.type = "button"
    deleteOptionButton.classList.add('btn-danger');
    deleteOptionButton.setAttribute("onclick", `deleteDiv(option${newOptionNumber})`);

    formBox.appendChild(input);
    formBox.appendChild(deleteOptionButton);
    surveyOptions.appendChild(formBox);
}

function deleteDiv(divId) {
    divId.remove();
}