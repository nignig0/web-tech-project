function createCard(id, tripCreator, price, seatsLeft, depTime,
    destination, tripType
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
                                <button id = ${id} class="btn text-white" style="background-color: #923D41;">Join Trip</button>
                            </div>
                        </div>
                    </div>                 
                </div>               
            </div>         
        </div>     
    </section>`
}

function getUserTrips(){

}

function joinTrip(){

}

function leaveTrip(){

}

function getTrips(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getTrips', true);
    const trips = [];
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        const responses = JSON.parse(xhr.responseText);

        if(xhr.status == 200){
           const body = document.getElementsByTagName('body')[0];
           //if card is in user trips, we should show a different card button
           for(const response of responses){
            const card = createCard(response['id'], 'Tani', response['cost'], response['seats'], response['departureTime'],
                response['destination'], response['tripType']
               );
               body.innerHTML += card;
           }
           
           
        }
    }
    xhr.send();
}


document.addEventListener("DOMContentLoaded", getTrips);