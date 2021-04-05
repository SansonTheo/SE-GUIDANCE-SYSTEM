let editStudent = () => {
    let toggleTemporaryAddress = false;
    let toggleSpouseInfo = false;
    //Function for adding and removing new siblings, creates new forms per click, 
    let siblingCount = document.getElementById('siblingCount').value;
    let existingSiblings = siblingCount;
    let siblingToDeleteCount = 0;
    let familyWindowHeight = 2000; //Variable to save Family Window Height 
    
    let residentValue = document.getElementById('isBoarder').value;
    let getTempData = document.querySelectorAll("#boarderAddress");
    if (toggleTemporaryAddress === false && residentValue !== "resident") {
        let arrayLength = getTempData.length;
        for (let i = 0; i < arrayLength; i++) {
            getTempData[i].style.display = "flex";
            getTempData[i].style.visibility = "visible";
        }
        toggleTemporaryAddress = true;
    }

    if (siblingCount > -1) {
        for (let i = 0; i <= siblingCount; i++) {
            familyWindowHeight = familyWindowHeight + 300;
        }
    };

    let status = document.getElementById('civilStatus').value;
    let getSpouseData = document.querySelectorAll("#spouseInfo");    
    let arrayLength = getSpouseData.length;
    if(toggleSpouseInfo===false && status ==="Married"){
        familyWindowHeight = familyWindowHeight + 550;
        for(let i=0; i< arrayLength; i++){
            getSpouseData[i].style.display = "flex";
            getSpouseData[i].style.visibility = "visible";
        }
        toggleSpouseInfo = true;
    };

    $("#addSibling").click(function () {
        let getWindow = document.querySelector(".window-content");
        let windowHeight = parseInt(getWindow.style.height);
        let newWindowHeight = parseInt(windowHeight) + 300;
        getWindow.style.height = newWindowHeight + "px";
        familyWindowHeight = newWindowHeight;
        let navButtons = document.getElementById("nav-buttons");
        siblingCount++;
        $('<span id="siblingSpan'+siblingCount+'" style="display:none;"><input type="text" id="siblingId'+siblingCount+'" name="siblingId'+siblingCount+'" value=""></span><span id="siblingSpan' + (siblingCount) + '" style="height:10px;"></span><span id="siblingSpan' + (siblingCount) + '"><label>Firstname</label><input type="text" id="siblingFirstname' + (siblingCount) + '" name="siblingFirstname' + (siblingCount) + '"></span><span id="siblingSpan' + (siblingCount) + '"><label>Middlename</label><input type="text" id="siblingMiddlename' + (siblingCount) + '" name="siblingMiddlename' + (siblingCount) + '"></span><span id="siblingSpan' + (siblingCount) + '"><label>Lastname</label><input type="text" id="siblingLastname' + (siblingCount) + '" name="siblingLastname' + (siblingCount) + '"></span><span id="siblingSpan' + (siblingCount) + '"><label>Sibling relation</label><select name="siblingRelation' + (siblingCount) + '" id="siblingRelation' + (siblingCount) + '"><option value="Brother">Brother</option><option value="Sister">Sister</option></select></span><span id="siblingSpan' + (siblingCount) + '" style="height:5px;"></span>').insertBefore(navButtons);    
        document.getElementById("siblingCount").value = siblingCount;
    });

    $("#removeSibling").click(function () {
        if (siblingCount > -1 && siblingCount > existingSiblings) {
            let lastSibling = document.querySelectorAll("#siblingSpan" + siblingCount);
            for (let i = 0; i < lastSibling.length; i++) {
                $(lastSibling[i]).remove();
            }
            let getWindow = document.querySelector(".window-content");
            let windowHeight = parseInt(getWindow.style.height);
            let newWindowHeight = parseInt(windowHeight) - 300;
            getWindow.style.height = newWindowHeight + "px";
            familyWindowHeight = newWindowHeight;
            siblingCount--;
            document.getElementById("siblingCount").value = siblingCount;
        }
    });

    var removeSiblingSpecificOnClick = function(){
            if (siblingCount > -1) {
                let thisSibling = parseInt(this.name);
                let thisSiblingSpan = document.querySelectorAll("#siblingSpan" + thisSibling);
                for (let i = 0; i <= thisSiblingSpan.length; i++) {
                    $(thisSiblingSpan[i]).remove();
                }
                document.getElementById('siblingWillDelete'+ thisSibling).value = "true";
                for(let i = thisSibling + 1; i <= siblingCount; i++ ){
                    let moveSiblingSpan = document.querySelectorAll("#siblingSpan"+i);
                    let lastMoveSibling = i - 1;
                    for (let i = 0; i < moveSiblingSpan.length; i++) {
                        moveSiblingSpan[i].id = "siblingSpan" + (lastMoveSibling);
                    }
                    booleCheckId = document.getElementById('siblingId' + i).value; 
                    if(booleCheckId != ""){
                        document.getElementsByName(i)[0].name = lastMoveSibling;
                    }
                    document.getElementById('siblingId'+ i).name = ("siblingId" + lastMoveSibling);
                    document.getElementById('siblingId'+ i).id = ("siblingId" + lastMoveSibling);
                    document.getElementById('siblingFirstname'+ i).name = ("siblingFirstname" + lastMoveSibling);
                    document.getElementById('siblingFirstname'+ i).id = ("siblingFirstname" + lastMoveSibling);
                    document.getElementById('siblingMiddlename'+ i).name = ("siblingMiddlename" + lastMoveSibling);
                    document.getElementById('siblingMiddlename'+ i).id = ("siblingMiddlename" + lastMoveSibling);
                    document.getElementById('siblingLastname'+ i).name = ("siblingLastname" + lastMoveSibling);
                    document.getElementById('siblingLastname'+ i).id = ("siblingLastname" + lastMoveSibling);
                    document.getElementById('siblingRelation'+ i).name = ("siblingRelation" + lastMoveSibling);
                    document.getElementById('siblingRelation'+ i).id = ("siblingRelation" + lastMoveSibling);
                }

                let getWindow = document.querySelector(".window-content");
                let windowHeight = parseInt(getWindow.style.height);
                let newWindowHeight = parseInt(windowHeight) - 300;
                getWindow.style.height = newWindowHeight + "px";
                familyWindowHeight = newWindowHeight;
                siblingCount--;
                document.getElementById('siblingCount').value = siblingCount;
                document.getElementById('siblingToDeleteCount').value = siblingToDeleteCount + 1;
                existingSiblings--;
            }
    };

    let removeSiblingSpecificButton = document.querySelectorAll("#removeSiblingSpecific");
    for (let j = 0; j <= siblingCount; j++){
        siblingId = removeSiblingSpecificButton[j].name;
        removeSiblingSpecificButton[j].onclick = removeSiblingSpecificOnClick;
    }

    // Function to show temporary address field when residency type != resident
    document.getElementById("isBoarder").onchange = boarderHandleChange;
    function boarderHandleChange(Select) {
        let value = Select.target.value;
        let getWindow = document.querySelector(".window-content");
        let getTempData = document.querySelectorAll("#boarderAddress");
        if (toggleTemporaryAddress === false && value !== "resident") {
            getWindow.style.height = "1000px";
            let arrayLength = getTempData.length;
            for (let i = 0; i < arrayLength; i++) {
                getTempData[i].style.display = "flex";
                getTempData[i].style.visibility = "visible";
            }
            toggleTemporaryAddress = true;
        }
        else if (toggleTemporaryAddress === true && value === "resident") {
            getWindow.style.height = "650px";
            let arrayLength = getTempData.length;
            for (let i = 0; i < arrayLength; i++) {
                getTempData[i].style.display = "none";
                getTempData[i].style.visibility = "hidden";
            }
            toggleTemporaryAddress = false;
        }
    }

    // Function for changing the pages in the Add Form
    $(".form-nav-button").click(function(){
        let ID = this.id;
        let getForm = document.querySelectorAll(".form-nav-button");
        let getFormBiographics = document.querySelector("#biographics");
        let getFormAddress = document.querySelector("#address");
        let getFormEducation = document.querySelector("#education");
        let getFormPersonal = document.querySelector("#personal-data");
        let getFormFamily = document.querySelector("#family");
        let getWindow = document.querySelector(".window-content");
        let hideForm = function () {
            let getForm = document.querySelectorAll(".add-form");
            let arrayLength = getForm.length;
            for (let i = 0; i < arrayLength; i++) {
                getForm[i].style.visibility = "hidden";
                getForm[i].style.display = "none";
            }
        };
        switch (ID) {
            case "prev-2":
                hideForm();
                getFormBiographics.style.height = "100%";
                getFormBiographics.style.width = "80%";
                getFormBiographics.style.visibility = "visible";
                getFormBiographics.style.display = "flex";
                getWindow.style.height = "600px";
                break;
            case "next-1":
            case "prev-3":
                hideForm();
                getFormAddress.style.height = "100%";
                getFormAddress.style.width = "80%";
                getFormAddress.style.visibility = "visible";
                getFormAddress.style.display = "flex";
                if (toggleTemporaryAddress === true) {
                    getWindow.style.height = "1000px";
                }
                else{
                    getWindow.style.height = "650px";
                }
                break;
            case "next-2":
            case "prev-4":
                hideForm();
                getFormEducation.style.height = "100%";
                getFormEducation.style.width = "80%";
                getFormEducation.style.visibility = "visible";
                getFormEducation.style.display = "flex";
                getWindow.style.height = "600px";
                break;
            case "next-3":
            case "prev-5":
                hideForm();
                getFormPersonal.style.height = "100%";
                getFormPersonal.style.width = "80%";
                getFormPersonal.style.visibility = "visible";
                getFormPersonal.style.display = "flex";
                getWindow.style.height = "670px";
                break;
            case "next-4":
                hideForm();
                getFormFamily.style.height = "100%";
                getFormFamily.style.width = "80%";
                getFormFamily.style.visibility = "visible";
                getFormFamily.style.display = "flex";
                getWindow.style.height = familyWindowHeight + "px";
                break;
            default:
        }
    });

    

    // Function to add spouse inputs in case of non-single status
    document.getElementById("civilStatus").onchange = marriedHandleChange;
    function marriedHandleChange(isMarried){
        let status = isMarried.target.value;    
        let getWindow = document.querySelector(".window-content");
        let windowHeight = parseInt(getWindow.style.height);
        let getSpouseData = document.querySelectorAll("#spouseInfo");    
        let arrayLength = getSpouseData.length;
        if(toggleSpouseInfo===false && status ==="Married"){
            getWindow.style.height = windowHeight + 550 + "px";
            for(let i=0; i< arrayLength; i++){
                getSpouseData[i].style.display = "flex";
                getSpouseData[i].style.visibility = "visible";
            }
            toggleSpouseInfo = true;
            familyWindowHeight = parseInt(getWindow.style.height);
        }
        else if(toggleSpouseInfo===true && status !=="Married"){
            getWindow.style.height = windowHeight - 550 + "px";
            for(let i=0; i< arrayLength; i++){
                getSpouseData[i].style.display = "none";
                getSpouseData[i].style.visibility = "hidden";
            }
            toggleSpouseInfo = false;
            familyWindowHeight = parseInt(getWindow.style.height);
        }
    }

    
}