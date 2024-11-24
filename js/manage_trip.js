import { getActiveTrips, getTotalTrips } from "./admin_dashboard.js";

import { getUserById } from "./user.js";

async function addToTable(tableBodyId, response){

    const tb = document.getElementById(tableBodyId);
    for (const trip of response){
        const user = await getUserById(trip['userId']);
        const tr = document.createElement('tr');

        const id_td = document.createElement('td');
        id_td.textContent = trip['id'];
        tr.appendChild(id_td);

        const creator_td = document.createElement('td');
        creator_td.textContent = `${user['firstName']} ${user['lastName']}`;
        tr.appendChild(creator_td);

        const destination_td = document.createElement('td');
        destination_td.textContent = trip['destination'];
        tr.appendChild(destination_td);

        const seats_taken_td = document.createElement('td');
        seats_taken_td.textContent = trip['seats'];
        tr.appendChild(seats_taken_td);

        const seats_left_td = document.createElement('td');
        seats_left_td.textContent = trip['originalSeats'] - trip['seats'];
        tr.appendChild(seats_left_td);

        const cost_td = document.createElement('td');
        cost_td.textContent = trip['originalCost'];
        tr.appendChild(cost_td);

        const mus_td = document.createElement('td');
        mus_td.textContent = trip['meetUpSpot'];
        tr.appendChild(mus_td);

        const depTime_td = document.createElement('td');
        depTime_td.textContent = trip['departureTime'];
        tr.appendChild(depTime_td);

        const button = document.createElement('button');
        button.classList.add('btn', 'btn-sm', 'btn-danger', 'trip-action-btn');
        button.setAttribute('title', 'Cancel Trip');

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
        button.addEventListener('click', ()=> deleteTrip(trip['id']));
        
        tb.appendChild(tr);
    }

}

function getAllTrips(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getAllTrips', true);

    xhr.onload = ()=>{
        if(xhr.status >= 200 && xhr.status < 400){
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
    
            addToTable('tripTable', response);
        }else{
            alert('Error getting total trips');
        }
    }

    xhr.send();
    
}

export function deleteTrip(tripId){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=deleteTrip&tripId=${tripId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        alert('Successfully Deleted Trip');
    }

    xhr.send();
}

function init(){
    getActiveTrips();
    getTotalTrips();
    getAllTrips();

}

document.addEventListener("DOMContentLoaded", init);
