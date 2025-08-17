const btt1 =document.getElementById("btt1");
const profileContainer =document.getElementById("profileContainer");
function visible(){
    profileContainer.style.visibility = 'visible';
    
}
function invisible(){
    profileContainer.style.visibility = 'hidden';
    
}

let selectedDay = null;
let selectedTime = null;

function changeColour(button,avail) {
    let set_avail=document.getElementById('availability')
    // Reset colours of all day buttons
    document.querySelectorAll('#daynavi button').forEach(btn => btn.style.color = '');
    // Set colour of the selected button
    button.style.color = 'yellow';
    selectedDay = button.innerText;
    document.getElementById('selectedDay').value = selectedDay;
    console.log(selectedDay)
    set_avail.innerHTML="Availability "+avail+"/3"
}

// Add event listeners to time buttons
document.querySelectorAll('#timeBox button').forEach(button => {
    button.addEventListener('click', function() {
        // Reset colours of all time buttons
        document.querySelectorAll('#timeBox button').forEach(btn => btn.style.color = '');
        // Set colour of the selected button
        button.style.color = 'yellow';
        selectedTime = button.innerText;
        document.getElementById('selectedTime').value = selectedTime;
    });
});




// Add event listener to the Confirm button is now handled by the form submission
//Set All Children Color.
function setAllChildrenColor(color) {
    for (let i = 0; i < statusBar.children.length; i++) {
        statusBar.children[i].style.backgroundColor = color;
    }
}
function ProcessChangeColour(process){
    const wordContainer = document.getElementById('Word-Container');
    const statusBar = document.getElementById("statusBar");
    wordContainer.innerHTML = "";

    if (process == 'Check'){
        setAllChildrenColor('rgb(70, 66, 66)');
        statusBar.children[3].style.borderTopRightRadius = '30px';
        statusBar.children[3].style.borderBottomRightRadius = '30px';
        statusBar.children[0].style.borderTopLeftRadius = '30px';
        statusBar.children[0].style.borderBottomLeftRadius = '30px';
        statusBar.children[0].style.backgroundColor = 'green';

        const word = document.createElement('div');
        word.innerText = 'We are checking your car condition. (1/2-1 hours)';
        word.style.color = 'white';
        wordContainer.appendChild(word);

    }else if(process == 'Fix'){
        setAllChildrenColor('rgb(70, 66, 66)');
        statusBar.children[0].style.borderTopLeftRadius = '30px';
        statusBar.children[0].style.borderBottomLeftRadius = '30px';
        statusBar.children[3].style.borderTopRightRadius = '30px';
        statusBar.children[3].style.borderBottomRightRadius = '30px';
        statusBar.children[0].style.backgroundColor = 'green';
        statusBar.children[1].style.backgroundColor = 'green';

        const word = document.createElement('div');
        word.innerText = 'We are fixing your car. (1-2 days)';
        word.style.color = 'white';
        wordContainer.appendChild(word);
    }else if(process == 'Test'){
        setAllChildrenColor('rgb(70, 66, 66)');
        statusBar.children[0].style.borderTopLeftRadius = '30px';
        statusBar.children[0].style.borderBottomLeftRadius = '30px';
        statusBar.children[3].style.borderTopRightRadius = '30px';
        statusBar.children[3].style.borderBottomRightRadius = '30px';
        statusBar.children[0].style.backgroundColor = 'green';
        statusBar.children[1].style.backgroundColor = 'green';
        statusBar.children[2].style.backgroundColor = 'green';

        const word = document.createElement('div');
        word.innerText = 'We are testing your car, make sure it was good to drive (1/2-1 hours)';
        word.style.color = 'white';
        wordContainer.appendChild(word);
    }else{
        statusBar.children[0].style.borderTopLeftRadius = '30px';
        statusBar.children[0].style.borderBottomLeftRadius = '30px';
        statusBar.children[3].style.borderTopRightRadius = '30px';
        statusBar.children[3].style.borderBottomRightRadius = '30px';
        setAllChildrenColor('green');

        const word = document.createElement('div');
        word.innerText = 'Your car was ready to collect';
        word.style.color = 'white';
        wordContainer.appendChild(word);

        const button = document.createElement('input');
        button.type = 'button';
        button.value = 'Okay';
        button.id = 'OkayButton';
        button.style.marginTop = '20px';
        button.addEventListener("click",function remove(){
            fetch('Drop_approved_list.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
            location.href="car Status.php";
            
        })
        wordContainer.appendChild(button);


    }
}

function retry(ID){
    console.log(ID)

    fetch("retry.php",{
        method: "POST",
        headers:{'Content-Type': 'application/json'},
        body: JSON.stringify({ 
            UserID: ID,
        })
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
    location.href="Appoinment.php";

}

//Service
const Text1 = document.getElementById('Text1');


//Console Log the value 
async function storeValue(userID,username,usercar){
    const textArea = document.getElementById('textArea');
    const UserQuestion = textArea.value;
    console.log(userID,username,usercar,UserQuestion);
    if(UserQuestion==""){
        alert("Text box not allow null !!!")
    }
    else{
        if (UserQuestion === "") {
    alert("Text box not allowed to be null !!!");
} else {
    try {
        const response = await fetch('servicefetch.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                ID: userID,
                name: username,
                car: usercar,  // Ensure consistent naming (userCar instead of usercar)
                Qs: UserQuestion
            })
        });

        if (response.ok) {
            location.href = "Service.php";  // Ensure the filename is correct and consistent
        } else {
            console.error('Failed to submit the appointment request');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}



}}
//For append divs purpose
function createTextBox(AdminName,UserName,UserInput,AdminInput){
    
    const container = document.createElement('div');
    container.className = 'FAQContainer';
    Text1.appendChild(container);

    const userBox = document.createElement("div");
    userBox.style.borderBottom = '3px solid orange';
    container.appendChild(userBox);
    const userName = document.createElement("div");
    userName.innerText = UserName+": ";
    userBox.appendChild(userName);
    const userInput = document.createElement("div");
    userInput.innerText = UserInput;
    userBox.appendChild(userInput);

    const adminBox = document.createElement("div");
    container.appendChild(adminBox);
    const adminName = document.createElement("div");
    console.log(AdminName);
    if(AdminName == ""){
        adminName.innerText = "Waiting For Admin Reply";
    }else{
        adminName.innerText = AdminName+": ";
    }
    adminBox.appendChild(adminName);
    const adminInput = document.createElement("div");
    adminInput.innerText = AdminInput;
    adminBox.appendChild(adminInput);

}