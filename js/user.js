export function getUserById(userId){
    return new Promise((resolve, reject)=>{
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/~tanitoluwa.adebayo/web-tech-project/php_functions/user_functions.php?action=getUser&userId=${userId}`, true);
        let user;
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