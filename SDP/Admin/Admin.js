//add appoinment
function addappoinmentlist(UserID,Maintanance,Day,Time,value){
    const User_ID=document.getElementById("UserID");
    const Maintenance=document.getElementById("Maintenance");
    const Day_el=document.getElementById("Day");
    const Time_el=document.getElementById("Time");
    const Selection=document.getElementById("Selection");
    
    const id = document.createElement('div');
    id.innerText = UserID;
    User_ID.appendChild(id);

    const maintanance = document.createElement('div');
    maintanance.innerText = Maintanance;
    Maintenance.appendChild(maintanance);

    const day = document.createElement('div');
    day.innerText = Day;
    Day_el.appendChild(day);

    const time = document.createElement('div');
    time.innerText = Time;
    Time_el.appendChild(time);

    const bar = document.createElement('div');
    bar.className="bar"
    Selection.appendChild(bar);

    const approvedButton = document.createElement('button');
    approvedButton.value = value;
    approvedButton.innerText = 'Approve';
    approvedButton.addEventListener('click', async function approved() {
        const app = approvedButton.value.split(",");
        const UserID = app[0];
        const Maintenance = app[1];
        const Day = app[2];
        const Time = app[3].replace(/:/g, '');
        console.log(UserID);
        console.log(Maintenance);
        console.log(Time);
        console.log(Day);
        
        // Sending ID to the PHP script using fetch
        try {
            const response = await fetch('Appoinment Review2.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    UserID: UserID,
                    Maintenance: Maintenance,
                    Time: Time,
                    Day: Day
                })
            });

            if (response.ok) {
                location.href = "Appoinment Review.php";
            } else {
                console.error('Failed to approve the appointment');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    bar.appendChild(approvedButton);

    const rejectButton = document.createElement('button');
    rejectButton.value = value;
    rejectButton.className = "Reject";
    rejectButton.innerText = 'Reject';
    rejectButton.addEventListener('click', async function reject() {
        const app = rejectButton.value.split(",");
        const UserID = app[0];
        console.log(UserID);
        
        try {
            const response = await fetch('Appoinment Review2.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    UserID: UserID,
                })
            });

            if (response.ok) {
                location.href = "Appoinment Review.php";
            } else {
                console.error('Failed to reject the appointment');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    bar.appendChild(rejectButton);

    }





    //add admin
    const OuterBox =document.getElementById("OuterBox");
    function createAdmin(adminID,Name,Email,Value){
        const AdminContainer = document.createElement('div');
        AdminContainer.className = 'AdminContainer';
        OuterBox.appendChild(AdminContainer);

        const id = document.createElement('div');
        id.innerText = adminID;
        AdminContainer.appendChild(id);

        const name = document.createElement('div');
        name.innerText = Name;
        AdminContainer.appendChild(name);

        const email = document.createElement('div');
        email.innerText = Email;
        AdminContainer.appendChild(email);

        const removeButton = document.createElement('button');
        removeButton.value= Value;
        removeButton.innerText = 'Remove';
        removeButton.addEventListener("click",function remove_admin(){
            const Addlist = removeButton.value.split(",");
            const AdminID = Addlist[0];
            fetch('Adminfetch.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    AdminID: AdminID,
                })
            })
            window.location.reload();

        })
        AdminContainer.appendChild(removeButton);
}

// Add User Car Status Function
let users = [];

function createUserCarStatus(UserID, Name, Car, Problem) {
    const OuterBox2 = document.getElementById('OuterBox2');
    if (!OuterBox2) {
        console.error('OuterBox2 element not found');
        return;
    }

    // Create main container for user car status
    const UserCarStatus = document.createElement('div');
    UserCarStatus.className = 'UserCarStatus';
    OuterBox2.appendChild(UserCarStatus);

    // Create sub-container for user information and buttons
    const Box = document.createElement('div');
    UserCarStatus.appendChild(Box);

    // Create a light indicator
    const light = document.createElement('div');
    light.id = 'light-indicator'; // Ensure unique ID if multiple lights
    Box.appendChild(light);

    // Add user ID
    const ID = document.createElement('div');
    ID.innerText = UserID;
    Box.appendChild(ID);

    // Add user name
    const name = document.createElement('div');
    name.innerText = Name;
    Box.appendChild(name);

    // Add car information
    const car = document.createElement('div');
    car.innerText = Car;
    Box.appendChild(car);

    // Add car problem description
    const problem = document.createElement('div');
    problem.innerText = Problem;
    Box.appendChild(problem);

    // Create container for buttons
    const Buttons = document.createElement('div');
    Buttons.className = UserID;
    Box.appendChild(Buttons);

    // Create and append buttons
    const buttons = ['Check', 'Fix', 'Test', 'Done'];
    buttons.forEach(buttonText => {
        const button = document.createElement('button');
        button.style.background = "none"; 
        button.style.color = "white"; 
        button.style.border = "none"; 
        button.style.borderRadius = "20px"; 
        button.innerText = buttonText;
        Buttons.appendChild(button);

        // Add event listener to the button
        button.addEventListener('click', function() {
            // Reset colors of all buttons within this specific Buttons container
            Buttons.querySelectorAll('button').forEach(btn => {
                btn.style.backgroundColor = 'black';
                btn.style.color = 'white';
            });
            // Set color of the selected button
            button.style.backgroundColor = 'yellow';
            button.style.color = 'black';

            // Debugging: log button click
            console.log('Button clicked:', buttonText);

            // Update the users array with the action
            users = users.filter(userAction => userAction[0] !== UserID);
            const list = [UserID, buttonText];
            const ID = list[0];
            const text = list[1];


            fetch('status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    ID: ID,
                    text: text,
                })
            })
            .then(response => {
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

            if (buttonText === 'Done') {
                light.style.backgroundColor = 'lightgreen';
            } else {
                // Reset the light indicator if any other button is clicked
                light.style.backgroundColor = '';
            }
        });
    });
}

//Review Customer functions
function AppendUsers(userID, username, usercar, adminID) {
    const UsersContainer = document.getElementById('UsersContainer');

    const UserBox = document.createElement('div');
    UserBox.className = 'UserBox';
    UsersContainer.appendChild(UserBox);

    const UserProfile = document.createElement('div');
    UserProfile.className = 'UserProfile';
    UserBox.appendChild(UserProfile);

    // User's data
    const UserID = document.createElement('div');
    UserID.innerText = "UserID: " + userID;
    UserProfile.appendChild(UserID);

    const UserName = document.createElement('div');
    UserName.innerText = "Name: " + username;
    UserProfile.appendChild(UserName);

    const UserCar = document.createElement('div');
    UserCar.innerText = "Car Type: " + usercar;
    UserProfile.appendChild(UserCar);

    const Button = document.createElement('input');
    Button.type = 'button';
    Button.value = 'Chat';
    Button.className = 'ChatButton';  
    Button.style.padding = '5px 10px';
    Button.onclick = function() {
        window.location.href =`Review Customer2.php?userID=${encodeURIComponent(userID)}&adminID=${encodeURIComponent(adminID)}`;
    };
    UserBox.appendChild(Button);
}


// Function to get query parameters by name
//function getQueryParameter(name) {
   // const urlParams = new URLSearchParams(window.location.search);
    //return urlParams.get(name);
//}
// Get the userID from the query parameters

//const user_ID = getQueryParameter('userID');
//const admin_ID = getQueryParameter('adminID');
//console.log(user_ID,admin_ID);

let chatBoxCounter = 0;

function AppendChatHistory(UserID,username, userchat, adminname, adminchat,AdminID,Current_AN) {
    chatBoxCounter++;
    const Outline = document.getElementById('Outline');
    const ChatBox = document.createElement("div");
    ChatBox.className = 'ChatBox';
    ChatBox.id = `ChatBox${chatBoxCounter}`;
    Outline.appendChild(ChatBox);

    const UserChatBox = document.createElement('div');
    UserChatBox.innerHTML = `<span style="color: orange; font-weight: bold;">${username}</span>:&nbsp;&nbsp;&nbsp;&nbsp;${userchat}`;
    UserChatBox.style.fontSize = '20px';
    UserChatBox.style.borderBottom = '3px solid white';
    UserChatBox.style.paddingBottom = '20px';
    ChatBox.appendChild(UserChatBox);

    const AdminChatBox = document.createElement('div');
    AdminChatBox.style.float = 'right';
    AdminChatBox.style.fontSize = '20px';
    AdminChatBox.style.paddingTop = '20px';
    ChatBox.appendChild(AdminChatBox);

    if (adminname === '') {
        AdminChatBox.innerHTML = '';
        const AdminInputBox = document.createElement('input');
        AdminInputBox.id = "AdminInputBox";  // Unique ID for each input box
        AdminInputBox.type = 'text';
        AdminInputBox.placeholder = 'Say something....';
        AdminInputBox.style.width = '70%';
        AdminInputBox.style.height = '30px';
        AdminInputBox.style.marginTop = '20px';
        AdminInputBox.style.marginLeft = '100px';
        ChatBox.appendChild(AdminInputBox);

        const SubmitButton = document.createElement('input');
        SubmitButton.type = 'button'; 
        SubmitButton.value = 'Submit';
        SubmitButton.style.marginLeft = '50px';
        SubmitButton.onclick = function() {
            updateChatHistory(UserID,userchat,"AdminInputBox",AdminID,Current_AN);
        };
        ChatBox.appendChild(SubmitButton);
    } else {
        AdminChatBox.innerHTML = `${adminchat}&nbsp;&nbsp;&nbsp;&nbsp;: <span style="color: orange; font-weight: bold;">${adminname}</span>`;
    }
}

async function updateChatHistory(UserID,userchat, inputBoxId,AdminID,Current_AN) {
    const AdminInputBox = document.getElementById(inputBoxId);
    const AdminInputValue = AdminInputBox.value;
    console.log(AdminInputValue)
    if (AdminInputBox.value !== "") {
        try{
            const a = await fetch("chatupdate.php",{
                method: "POST",
                headers:{"Content-Type": "application/json"},
                body: JSON.stringify({
                    User_ID: UserID,
                    US_chat: userchat,
                    AD_chat: AdminInputValue,
                    AD_ID: AdminID,
                    AD_name: Current_AN,
                })
            })
            if (a.ok) {
                window.location.reload(); // Ensure the filename is correct and consistent
            } else {
                console.error('Failed to submit the appointment request');
            }
        }catch (error) {
            console.error('Error:', error);
        }
    }
    
}