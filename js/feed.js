import { deleteTrip } from "./manage_trip.js";
import { getUserById } from "./user.js";

function createCard(id, tripCreator, price, seatsLeft, depTime,
    destination, tripType, inTrip = false, canDelete = false
){
    return `<section>         
        <div class="container">             
            <div class="card">                 
                <div class="card-header main-colors radius text-white d-flex justify-content-between align-items-center mb-4">                   
                    <img src="images/navbar/logo.png" alt="">                   
                    <h5 class="card-title-left">MoveMates</h5>                   
                    <h5 class="card-title-right">2024</h5>                 
                </div>                 
                <div class="container">                     
                    <div class="card-body mb-4">                         
                        <div class="row">                           
                            <div class="col-md-6">                             
                                <h6 class="card-subtitle mb-2 text-muted">DESTINATION</h6>                             
                                <h4 class="card-title">${destination}</h4>                           
                            </div>                           
                            <div class="col-md-6">                             
                                <h6 class="card-subtitle mb-2 text-muted">TRIP TYPE</h6>                             
                                <h4 class="card-title">${tripType}</h4>                           
                            </div>                         
                        </div>                         
                        <div class="row mt-3">                           
                            <div class="col-md-3">                             
                                <h6 class="card-subtitle mb-2 text-muted">SEATS LEFT</h6>                             
                                <p class="card-text">${seatsLeft}</p>                           
                            </div>                           
                            <div class="col-md-3">                             
                                <h6 class="card-subtitle mb-2 text-muted">RIDE CREATOR</h6>                             
                                <p class="card-text">${tripCreator}</p>                           
                            </div>                           
                            <div class="col-md-3">                             
                                <h6 class="card-subtitle mb-2 text-muted">PRICE</h6>                             
                                <p class="card-text">₡${price}</p>                           
                            </div>                           
                            <div class="col-md-3">                             
                                <h6 class="card-subtitle mb-2 text-muted">DEPARTURE</h6>                             
                                <p class="card-text">${depTime}</p>                           
                            </div>                         
                        </div>
                        <!-- New button row -->
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button
                                    id="trip-btn-${id}"
                                    class="btn text-white" style="background-color: ${inTrip ? '#01823E' : '#923D41'}">${canDelete? 'Delete Trip' : inTrip ? 'Leave Trip' : 'Join Trip'}
                                </button>
                            </div>
                        </div>
                    </div>                 
                </div>               
            </div>         
        </div>     
    </section>`;
}

export async function getUserTrips() {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getUserTrips', true);

        xhr.onload = () => {
            if (xhr.status === 200) {
                try {
                    const responses = JSON.parse(xhr.responseText);
                    resolve(responses);
                } catch (e) {
                    reject('Failed to parse JSON: ' + e.message);
                }
            } else {
                reject('Error: ' + xhr.status);
            }
        };

        xhr.onerror = () => reject('Network error');
        xhr.send();
    });
}

async function getTrips() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getTrips', true);
    let userTripIds = await getUserTrips();
    let userId = (userTripIds.length > 0) ? userTripIds[0]['userId'] : -1; 
    userTripIds = userTripIds.map((t) => t['tripId']);

    xhr.onload = async () => {
        const responses = JSON.parse(xhr.responseText);

        if (xhr.status == 200) {
            const body = document.getElementsByTagName('body')[0];
            for (const response of responses) {
                const user = await getUserById(response['userId']);
                const cardHTML = createCard(
                    response['id'], 
                    `${user['firstName']} ${user['lastName']}`, 
                    response['originalCost']/(response['originalSeats'] - response['seats']+2), 
                    response['seats'], 
                    response['departureTime'],
                    response['destination'], 
                    response['tripType'],
                    userTripIds.includes(response['id']),
                    response['userId'] == userId
                );

                // Create a new div element for the card and append it to the body
                const cardElement = document.createElement('div');
                cardElement.innerHTML = cardHTML;
                body.appendChild(cardElement);

                // Add event listener for the button in this card
                const button = document.getElementById(`trip-btn-${response['id']}`);
                button.addEventListener('click', () => {
                    if (userTripIds.includes(response['id'])) {
                        leaveTrip(response['id']);
                    }else if(response['userId'] == userId){
                        deleteTrip(response['userId']);
                    } else {
                        joinTrip(response['id']);
                    }
                });
            }
        }
    };
    xhr.send();
}




export function joinTrip(tripId){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=joinTrip&tripId=${tripId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        location.reload();
    }
    xhr.send();
    
}

export function leaveTrip(tripId){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=leaveTrip&tripId=${tripId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        location.reload();
    }
    xhr.send();
}


document.addEventListener("DOMContentLoaded", getTrips);