import { get30DaysUsers, getTotalUsers } from "./admin_dashboard";

async function addToTable(tableBodyId, response){

    const tb = document.getElementById(tableBodyId);
    for (const user of response){
        const tr = document.createElement('tr');

        const id_td = document.createElement('td');
        id_td.textContent = user['id'];
        tr.appendChild(id_td);

        const name_td = document.createElement('td');
        name_td.textContent = `${user['firstName']} ${user['lastName']}`;
        tr.appendChild(user_td);

        const role_td = document.createElement('td');
        role_td.textContent = user['role'];
        tr.appendChild(destination_td);


        const button = document.createElement('button');
        button.classList.add('btn', 'btn-sm', 'btn-danger', 'trip-action-btn');
        button.setAttribute('title', 'Delete User');

        const i = document.createElement('i');
        i.classList.add('fas', 'fa-times-circle');

        button.appendChild(i);


        const button_td = document.createElement('td');
        const div = document.createElement('div');
        div.classList.add('btn-group');
        div.setAttribute('role', 'group');

        div.appendChild(button);

        button_td.appendChild(div);

        tr.appendChild(button_td);
        button.addEventListener('click', ()=> deleteUser(response['id']));
        
        tb.appendChild(tr);
    }

}

function getAllUsers(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/user_functions.php?action=readUsers', true);

    xhr.onload = ()=>{
        if(xhr.status >= 200 && xhr.status < 400){
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
    
            addToTable('userTable', response);
        }else{
            alert('Error getting total users');
        }
    }

    xhr.send();
    
}

function deleteUser(userId){
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `/~tanitoluwa.adebayo/web-tech-project/php_functions/user_functions.php?action=deleteUser&userId=${userId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        alert('Successfully Deleted user');
    }

    xhr.send();
}

function init(){
    getTotalUsers();
    get30DaysUsers();

}

document.addEventListener("DOMContentLoaded", init);
