import { joinTrip, leaveTrip, getUserTrips } from "./feed.js"
import { getTripById } from "./trip.js";

function createCard(
    tripType, originalSeats, seats, depTime, cost,
    meetUpSpot, destination, host, id
){
    return `
    <div class="col-12 col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary">${tripType}</span>
                        </div>
                        <h5 class="card-title">${destination}</h5>
                        <h5 class="card-title">host: ${host}</h5>
                        <div class="mb-3">
                            <i class="far fa-calendar me-2"></i>
                            <span>${depTime.split(' ')[0]}</span>
                        </div>
                        <div class="mb-3">
                            <i class="far fa-clock me-2"></i>
                            <span>${depTime.split(' ')[1]}</span>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-dollar-sign me-2"></i>
                            <span>${cost/(originalSeats - seats+1)}</span>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-dollar-sign me-2"></i>
                            <span>Meet Up Spot: ${meetUpSpot}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-outline-danger" onclick = leaveTrip(${id})>Leave Trip</button>
                            <span class="badge bg-success">${seats} seats left</span>
                        </div>
                    </div>
                </div>
            </div>
    `
}

async function init(){
    let userTripIds = await getUserTrips();
    userTripIds = userTripIds.map((t)=> t['tripId']);
    
    const trips = [];

    for(const id of userTripIds){
        const trip = await getTripById(id);
        console.log(trip);
        if(trip) trips.push(trip);
    }

    const tripHolder = document.getElementById('tripHolder');

    for(const trip of trips){
        const user = await getUserById(trip['userId']);
        tripHolder.appendChild(createCard(
            trip['tripType'], trip['originalSeats'], trip['seats'], trip['departureTime'],
            trip['originalCost'], trip['meetUpSpot'], trip['destination'], 
            user['firstName']+' '+user['lastName'], trip['id']
        ));
    }
    //get each trip that the user is in and append to a list
    //for every item in the list, create a card
}

document.addEventListener("DOMContentLoaded", init);
