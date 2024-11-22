export function getTripById(tripId){
    return new Promise((resolve, reject)=>{
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/~tanitoluwa.adebayo/web-tech-project/php_functions/trip_functions.php?action=getTripById&tripId=${tripId}`, true);
        xhr.onload=()=>{
            try {
                console.log(xhr.response);
                const responses = JSON.parse(xhr.responseText);
                resolve(responses);
            } catch (e) {
                reject('Failed to parse JSON: ' + e.message);
            }
        };

        xhr.onerror = () => reject('Network error');
        xhr.send();
    });
}
