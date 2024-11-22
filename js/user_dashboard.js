function createCard(
    tripType, originalSeats, seats, depTime, cost,
    meetUpSpot
){
    return `
    <div class="col-12 col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary">${tripType}</span>
                        </div>
                        <h5 class="card-title">Accra Mall</h5>
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
                            <button class="btn btn-outline-danger">leave Trip</button>
                            <span class="badge bg-success">${seats} seats left</span>
                        </div>
                    </div>
                </div>
            </div>
    `
}

function init(){
    //get the user trips
    //get each trip that the user is in and append to a list
    //for every item in the list, create a card
}