var data = ["","",""];
var parentData = ["",""];
var counselorData = ["",""];
var teacherData = ["","",""];
var studentCount = document.getElementById('studentCount').value;
var parentCount = document.getElementById('parentCount').value;
var teacherCount = document.getElementById('teacherCount').value;
var studentDeleteCount = parseInt(document.getElementById('studentDeleteCount').value,10);
var parentDeleteCount = parseInt(document.getElementById('parentDeleteCount').value,10);
var teacherDeleteCount = parseInt(document.getElementById('teacherDeleteCount').value,10);

let counselorEditId = document.getElementById('counselor-id').value;
let hideCounselorRow = document.getElementById('realCounselorId'+counselorEditId);
hideCounselorRow.style.display = "none";
hideCounselorRow.classList.add("hidden");
hideCounselorRow.classList.remove("show");
let oldCounselorId = 'realCounselorId'+counselorEditId;

$("tr[name='counselorentry']").click(function select(){
    $(this).addClass('selected').siblings().removeClass('selected'); 
    counselorId = $(this).children().eq(0).html();   
    counselorName = $(this).children().eq(1).html();
    counselorData = [counselorId, counselorName];
    return counselorData;
});

var addCounselorButton = document.getElementById('addCounselor');
addCounselorButton.onclick = function URL() {
    let currentCounselorId = 'realCounselorId'+counselorData[0];
    oldTr = document.getElementById(oldCounselorId);
    if(oldTr != null){
        oldTr.style.display="table-row";
        oldTr.classList.add("show");
    }
    newTr = document.getElementById(currentCounselorId);
    newTr.style.display = "none";
    newTr.classList.add("hidden");
    newTr.classList.remove("show");
    if(counselorData[0]!="" && counselorData[1]!=""){
        document.getElementById('counselor-id').value = counselorData[0];
        document.getElementById('counselor').value = counselorData[1];
        modalCounselor.style.display = "none";
    }

    oldCounselorId = document.getElementById(currentCounselorId).id;
}

function searchCounselor(){
    let counselorNameFilter = document.getElementById("search-counselor-name").value.toUpperCase();
    let counselorDepartmentFilter = document.getElementById("search-counselor-department").value.toUpperCase();
    let counselorTable = document.getElementById("counselor-add-table");
    let counselorTr = counselorTable.getElementsByTagName("tr");
    for (i = 0; i < counselorTr.length; i++) {
        if(counselorTr[i].classList.contains("show")){       
            let tdCounselorName = counselorTr[i].getElementsByTagName("td")[1];
            let tdDepartmentName = counselorTr[i].getElementsByTagName("td")[2];
            
            if (tdCounselorName) {
                let nameTxtValue = tdCounselorName.textContent || tdCounselorName.innerText;
                let departmentTxtValue = tdDepartmentName.textContent || tdDepartmentName.innerText;
                if (nameTxtValue.toUpperCase().indexOf(counselorNameFilter) > -1 && departmentTxtValue.toUpperCase().indexOf(counselorDepartmentFilter) > -1) {
                    counselorTr[i].style.display = "table-row";
                } else {
                    counselorTr[i].style.display = "none";
                }
            }
        }       
    }
}

if(studentCount > -1){
    for(let i=0; i <= studentCount; i++){
        let getButton = "#studentDelButton"+i;
        let currentId = document.getElementsByName('trStudent'+i)[0].id;
        let studentRow = "studentEntryId" + currentId;
        let addThisEntry = document.getElementById(studentRow);
        $(document).on('click', getButton, function(events){
            thisStudentId = $(this).parents('tr').eq(0).attr('id');
            addThisEntry.style.display = "table-row";
            document.getElementById('studentWillDelete'+thisStudentId).value = "true";
            studentDeleteCount++;
            document.getElementById('studentDeleteCount').value = studentDeleteCount;
            document.getElementById('studentEntryId'+thisStudentId).classList.add("show");
            document.getElementById('studentEntryId'+thisStudentId).classList.remove("hidden");
            $(this).parents('tr').remove();
        });
    }
}

$("tr[name='studententry']").click(function select(){
    $(this).addClass('selected').siblings().removeClass('selected'); 
    studentId = $(this).children().eq(0).html();
    studentName = $(this).children().eq(2).html();
    studentDepartment = $(this).children().eq(3).html();
    data = [studentId, studentName, studentDepartment];
    return data;
});

var addStudentButton = document.getElementById('addStudent');
addStudentButton.onclick = function URL() {
    if(data[0]!="" && data[1]!="" && data[2]!=""){
        studentCount++;
        studentNull = document.getElementById('studentNull');
        $('<tr name="trStudent'+ studentCount +'" id="'+ data[0] + '"><td id="' + data[0] + '" style="display:none;"><input type="text" name="studentToAdd' + studentCount + '" id="studentToAdd' + studentCount + '" value="true"><input type="text" name="studentNo' + studentCount + '" id="studentNo' + studentCount + '" value="' + data[0] + '"></td><td>' + data[1] + '</td><td>' + data[2] + '</td><td style="flex:5%;"><button type="button" id="studentDelButton' + studentCount + '">X</button></tr>').insertBefore(studentNull);
        let getButton = "#studentDelButton"+studentCount;
        let studentRow = "studentEntryId" + data[0];
        let removeThisEntry = document.getElementById(studentRow);
        removeThisEntry.classList.remove("show");
        removeThisEntry.classList.add("hidden");
        $(document).on('click', getButton, function(events){
            thisStudentId = $(this).parents('tr').eq(0).attr('id');
            removeThisEntry.style.display = "table-row";
            document.getElementById('studentEntryId'+thisStudentId).classList.add("show");
            document.getElementById('studentEntryId'+thisStudentId).classList.remove("hidden");
            $(this).parents('tr').remove();
        });
        removeThisEntry.style.display = "none";
        removeThisEntry.classList.remove("selected");
        modalStudent.style.display = "none";
        document.getElementById('studentCount').value = studentCount;
    }
    else{
        alert("No Student Selected!");
    }
};

function searchStudent(){
    let studentNameFilter = document.getElementById("search-student-name").value.toUpperCase();
    let studentCollegeFilter = document.getElementById("search-student-college").value.toUpperCase();
    let studentDepartmentFilter = document.getElementById("search-student-department").value.toUpperCase();;
    let studentLevelFilter = document.getElementById("search-student-level").value.toUpperCase();
    let studentTable = document.getElementById("student-add-table");
    let studentTr = studentTable.getElementsByTagName("tr");
    for (i = 0; i < studentTr.length; i++) {
        if(studentTr[i].classList.contains("show")){       
            let tdStudentName = studentTr[i].getElementsByTagName("td")[2];
            let tdStudentDepartment = studentTr[i].getElementsByTagName("td")[3];
            let tdStudentLevel = studentTr[i].getElementsByTagName("td")[4];
            let tdStudentCollege = studentTr[i].getElementsByTagName("td")[5];
            if (tdStudentName) {
                let nameTxtValue = tdStudentName.textContent || tdStudentName.innerText;
                let departmentTxtValue = tdStudentDepartment.textContent || tdStudentDepartment.innerText;
                let levelTxtValue = tdStudentLevel.textContent || tdStudentLevel.innerText;
                let collegeTxtValue = tdStudentCollege.textContent || tdStudentCollege.innerText;
                if (nameTxtValue.toUpperCase().indexOf(studentNameFilter) > -1 && departmentTxtValue.toUpperCase().indexOf(studentDepartmentFilter) > -1 && levelTxtValue.toUpperCase().indexOf(studentLevelFilter) > -1 && collegeTxtValue.toUpperCase().indexOf(studentCollegeFilter) > -1) {
                    studentTr[i].style.display = "table-row";
                } else {
                    studentTr[i].style.display = "none";
                }
            }
        }       
    }
}

if(parentCount > -1){
    for(let i=0; i < parentCount; i++){
        let getButton = "#parentDelButton"+i;
        let currentId = document.getElementsByName('trParent'+i)[0].id;
        let parentRow = "parentEntryId" + currentId;
        let addThisEntry = document.getElementById(parentRow);
        addThisEntry.style.display = "none";
        addThisEntry.classList.add("hidden");
        addThisEntry.classList.remove("show");
        $(document).on('click', getButton, function(events){
            thisParentId = $(this).parents('tr').eq(0).attr('id');
            addThisEntry.style.display = "table-row";
            document.getElementById('parentWillDelete'+thisParentId).value = "true";
            parentDeleteCount++;
            document.getElementById('parentDeleteCount').value = parentDeleteCount;
            document.getElementById('parentEntryId'+thisParentId).classList.add("show");
            document.getElementById('parentEntryId'+thisParentId).classList.remove("hidden");
            $(this).parents('tr').remove();
        });
    }
}

$("tr[name='parententry']").click(function select(){
    $(this).addClass('selected').siblings().removeClass('selected'); 
    parentId = $(this).children().eq(0).html();
    parentName = $(this).children().eq(1).html();
    parentChild = $(this).children().eq(3).html();
    parentData = [parentId, parentName, parentChild];
    return parentData;
});

var addParentButton = document.getElementById('addParent');
addParentButton.onclick = function URL() {
    if(parentData[0]!="" && parentData[1]!="" && parentData[2]!=""){
        parentCount++;
        parentNull = document.getElementById('parentNull');
        $('<tr style="trParent'+ parentCount +'" id="' + parentData[0] + '"><td id="' + parentData[0] + '" style="display:none;"><input type="text" name="parentNo' + parentCount + '" id="parentNo' + parentCount + '" value="' + parentData[0] + '"></td><td>' + parentData[1] + '</td><td>' + parentData[2] + '</td><td style="flex:5%;"><button type="button" id="parentDelButton' + parentCount + '">X</button></tr>').insertBefore(parentNull);
        let getParentButton = "#parentDelButton"+parentCount;
        let parentRow = "parentEntryId" + parentData[0];
        let removeThisParentEntry = document.getElementById(parentRow);
        removeThisParentEntry.classList.remove("show");
        removeThisParentEntry.classList.add("hidden");
        $(document).on('click', getParentButton, function(events){
            let thisParentId = $(this).parents('tr').eq(0).attr('id');
            removeThisParentEntry.style.display = "table-row";
            let thisParent = "parentEntryId"+thisParentId;
            let restoreParentTr = document.getElementById(thisParent); 
            restoreParentTr.classList.add("show");
            restoreParentTr.classList.remove("hidden");
            $(this).parents('tr').remove();
        });
        removeThisParentEntry.style.display = "none";
        removeThisParentEntry.classList.remove("selected");
        modalParent.style.display = "none";
        document.getElementById('parentCount').value = parentCount;
    }
    else{
        alert("No Parent Selected!");
    }
};

function searchParent(){
    let parentNameFilter = document.getElementById("search-parent-name").value.toUpperCase();
    let parentChildFilter = document.getElementById("search-parent-child").value.toUpperCase();
    let parentTable = document.getElementById("parent-add-table");
    let parentTr = parentTable.getElementsByTagName("tr");
    for (i = 0; i < parentTr.length; i++) {
        if(parentTr[i].classList.contains("show")){       
            let tdParentName = parentTr[i].getElementsByTagName("td")[1];
            let tdParentChild = parentTr[i].getElementsByTagName("td")[3];
            
            if (tdParentName) {
                let nameTxtValue = tdParentName.textContent || tdParentName.innerText;
                let childTxtValue = "";
                if(tdParentChild != null){                    
                    childTxtValue = tdParentChild.textContent || tdParentChild.innerText;
                }
                if (nameTxtValue.toUpperCase().indexOf(parentNameFilter) > -1 && childTxtValue.toUpperCase().indexOf(parentChildFilter) > -1) {
                    parentTr[i].style.display = "table-row";
                } else {
                    parentTr[i].style.display = "none";
                }
            }
        }       
    }
}

if(teacherCount > -1){
    for(let i=0; i <= teacherCount; i++){
        let getButton = "#teacherDelButton"+i;
        let tempStr = 'trTeacher'+i;
        let currentId = document.getElementsByName(tempStr)[0].id;
        let teacherRow = "teacherEntryId" + currentId;
        let addThisEntry = document.getElementById(teacherRow);
        addThisEntry.style.display = "none";
        addThisEntry.classList.add("hidden");
        addThisEntry.classList.remove("show");
        $(document).on('click', getButton, function(events){
            thisTeacherId = $(this).parents('tr').eq(0).attr('id');
            addThisEntry.style.display = "table-row";
            document.getElementById('teacherWillDelete'+thisTeacherId).value = "true";
            teacherDeleteCount++;
            document.getElementById('teacherDeleteCount').value = teacherDeleteCount;
            document.getElementById('teacherEntryId'+thisTeacherId).classList.add("show");
            document.getElementById('teacherEntryId'+thisTeacherId).classList.remove("hidden");
            $(this).parents('tr').remove();
        });
    }
}

$("tr[name='teacherentry']").click(function select(){
    $(this).addClass('selected').siblings().removeClass('selected'); 
    teacherId = $(this).children().eq(0).html();   
    teacherName = $(this).children().eq(1).html();
    teacherDepartment = $(this).children().eq(2).html();
    teacherData = [teacherId, teacherName, teacherDepartment];
    return teacherData;
});

var addTeacherButton = document.getElementById('addTeacher');
addTeacherButton.onclick = function URL() {
    if(teacherData[0]!="" && teacherData[1]!="" && teacherData[2]!=""){
        teacherCount++;
        teacherNull = document.getElementById('teacherNull');
        $('<tr name="trTeacher'+ teacherCount +'" id="' + teacherData[0] + '"><td id="' + teacherData[0] + '" style="display:none;"><input type="text" name="teacherNo' + teacherCount + '" id="teacherNo' + teacherCount + '" value="' + teacherData[0] + '"></td><td>' + teacherData[1] + '</td><td>' + teacherData[2] + '</td><td style="flex:5%;"><button type="button" id="teacherDelButton' + teacherCount + '">X</button></tr>').insertBefore(teacherNull);
        let getTeacherButton = "#teacherDelButton"+teacherCount;
        let teacherRow = "teacherEntryId" + teacherData[0];
        let removeThisTeacherEntry = document.getElementById(teacherRow);
        removeThisTeacherEntry.classList.remove("show");
        removeThisTeacherEntry.classList.add("hidden");
        $(document).on('click', getTeacherButton, function(events){
            let thisTeacherId = $(this).parents('tr').eq(0).attr('id');
            removeThisTeacherEntry.style.display = "table-row";
            let thisTeacher = "teacherEntryId"+thisTeacherId;
            let restoreTeacherTr = document.getElementById(thisTeacher); 
            restoreTeacherTr.classList.add("show");
            restoreTeacherTr.classList.remove("hidden");
            $(this).parents('tr').remove();
        });
        removeThisTeacherEntry.style.display = "none";
        removeThisTeacherEntry.classList.remove("selected");
        modalTeacher.style.display = "none";
        document.getElementById('teacherCount').value = teacherCount;
    }
    else{
        alert("No Parent Selected!");
    }
};

function searchTeacher(){
    let teacherNameFilter = document.getElementById("search-teacher-name").value.toUpperCase();
    let teacherDepartmentFilter = document.getElementById("search-teacher-department").value.toUpperCase();nio
    let teacherTable = document.getElementById("teacher-add-table");
    let teacherTr = teacherTable.getElementsByTagName("tr");
    for (i = 0; i < teacherTr.length; i++) {
        if(teacherTr[i].classList.contains("show")){       
            let tdTeacherName = teacherTr[i].getElementsByTagName("td")[1];
            let tdTeacherDepartment = teacherTr[i].getElementsByTagName("td")[2]
            if (tdTeacherName) {
                let nameTxtValue = tdTeacherName.textContent || tdTeacherName.innerText;
                let departmentTxtValue = tdTeacherDepartment.textContent || tdTeacherDepartment.innerText;
                if (nameTxtValue.toUpperCase().indexOf(teacherNameFilter) > -1 &&  departmentTxtValue.toUpperCase().indexOf(teacherDepartmentFilter) > -1) {
                    teacherTr[i].style.display = "table-row";
                } else {
                    teacherTr[i].style.display = "none";
                }
            }
        }       
    }
}
