function createCard(id, tripCreator, price, seatsLeft, depTime,
    destination, tripType, inTrip = false
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
                                    onclick="${inTrip ? `leaveTrip(${id})` : `joinTrip(${id})`}"
                                    class="btn text-white" style="background-color: ${inTrip ? '#01823E' : '#923D41'}">${inTrip ? 'Leave Trip' : 'Join Trip'}
                                    </button>
                            </div>
                        </div>
                    </div>                 
                </div>               
            </div>         
        </div>     
    </section>`
}

async function getUserTrips() {
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


function joinTrip(tripId){

    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=joinTrip&tripId=${tripId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        location.reload();
    }
    xhr.send();
    
}

function leaveTrip(tripId){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=leaveTrip&tripId=${tripId}`, true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        location.reload();
    }
    xhr.send();
}

async function getTrips(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getTrips', true);
    let userTripIds = await getUserTrips();
    console.log(userTripIds);
    userTripIds = userTripIds.map((t)=> t['tripId']);
    console.log(userTripIds);

    xhr.onload = ()=>{
        console.log(xhr.responseText);
        const responses = JSON.parse(xhr.responseText);

        if(xhr.status == 200){
           const body = document.getElementsByTagName('body')[0];
           //if card is in user trips, we should show a different card button
           for(const response of responses){
            const card = createCard(response['id'], 'Tani', response['cost'], response['seats'], response['departureTime'],
                response['destination'], response['tripType'],
                userTripIds.includes(response['id'])
               );
               body.innerHTML += card;
               //can do better here
               //it's a little inefficient
           }
           
           
        }
    }
    xhr.send();
}


document.addEventListener("DOMContentLoaded", getTrips);