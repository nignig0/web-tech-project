


export function getTotalTrips(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getTotalTrips', true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        if(xhr.status >= 200 && xhr.status < 400){
            const totalTripHolders = document.getElementsByClassName('totalTrips');
            const response = JSON.parse(xhr.responseText);
            for(const element of totalTripHolders){
                element.textContent = response['count'] ?? 0;
            }
        }else{
            alert('Error getting total trips');
        }
        
    }

    xhr.send();
}

export function getActiveTrips(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getActiveTrips', true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        if(xhr.status >= 200 && xhr.status < 400){
            const totalTripHolders = document.getElementsByClassName('activeTrips');
            const response = JSON.parse(xhr.responseText);
            for(const element of totalTripHolders){
                element.textContent = response['count'] ?? 0;
            }
        }else{
            alert('Error getting active trips');
        }
        
    }

    xhr.send();
}

export function getTotalUsers(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/user_functions.php?action=getTotalUsers', true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        if(xhr.status >= 200 && xhr.status < 400){
            const totalTripHolders = document.getElementsByClassName('totalUsers');
            const response = JSON.parse(xhr.responseText);
            for(const element of totalTripHolders){
                element.textContent = response['count'] ?? 0;
            }
        }else{
            alert('Error getting total users');
        }
        
    }

    xhr.send();
}

export function get30DaysUsers(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/~tanitoluwa.adebayo/web-tech-project/php_functions/user_functions.php?action=get30DayUsers', true);
    xhr.onload = ()=>{
        console.log(xhr.responseText);
        if(xhr.status >= 200 && xhr.status < 400){
            const totalTripHolders = document.getElementsByClassName('30DaysUsers');
            const response = JSON.parse(xhr.responseText);
            for(const element of totalTripHolders){
                element.textContent = response['count'] ?? 0;
            }
        }else{
            alert('Error getting users from last 30 days');
        }
        
    }

    xhr.send();
}

function initDashboard(){
    get30DaysUsers();
    getActiveTrips();
    getTotalTrips();
    getTotalUsers();
}


document.addEventListener("DOMContentLoaded", initDashboard);
