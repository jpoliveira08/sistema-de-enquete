function addNewOptionToTheSurvey() {
    const surveyOptions = document.getElementById("form-box-options");
    const newOptionNumber = surveyOptions.childElementCount + 1;

    const formBox = document.createElement("div");
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

    formBox.appendChild(input);

    surveyOptions.appendChild(formBox);
}