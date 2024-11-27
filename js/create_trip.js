// Get form element
const createTripForm = document.getElementById('createTripForm');

// Validation functions
const validateDestination = (value) => {
    if (!value.trim()) {
        return 'Destination is required';
    }
    if (value.length == 0) {
        return 'Destination cannot be empty';
    }
    return '';
};

const validateMeetUpSpot = (value) => {
    if (!value.trim()) {
        return 'Meet Up Spot is required';
    }
    if (value.length == 0) {
        return 'Meet Up Spot cannot be empty';
    }
    return '';
};

const validateTripType = (value) => {
    if (!value || value === 'TRIP TYPE') {
        return 'Please select a trip type';
    }
    return '';
};

const validateSeats = (value) => {
    if (!value) {
        return 'Number of seats is required';
    }
    const seats = parseInt(value);
    if (isNaN(seats) || seats < 1) {
        return 'Please enter a valid number of seats (minimum 1)';
    }
    if (seats > 4) {
        return 'Maximum 4 seats allowed';
    }
    return '';
};

const validatePrice = (value) => {
    if (!value) {
        return 'Price is required';
    }
    const price = parseFloat(value);
    if (isNaN(price) || price <= 0) {
        return 'Please enter a valid price';
    }
    return '';
};

const validateDate = (value) => {
    if (!value) {
        return 'Departure date is required';
    }
    const selectedDate = new Date(value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (selectedDate < today) {
        return 'Departure date cannot be in the past';
    }
    return '';
};

const validateTime = (value) => {
    if (!value) {
        return 'Departure time is required';
    }
    return '';
};

// Form submission handler
createTripForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Get form values
    const destination = document.getElementById('destination').value;
    const tripType = document.getElementById('triptype').value;
    const seats = document.getElementById('seats').value;
    const price = document.getElementById('price').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const meetUpSpot = document.getElementById('meetUpSpot').value
    
    // Clear previous error messages
    document.getElementById('destinationError').textContent = '';
    document.getElementById('tripTypeError').textContent = '';
    document.getElementById('seatsError').textContent = '';
    document.getElementById('priceError').textContent = '';
    document.getElementById('dateError').textContent = '';
    document.getElementById('timeError').textContent = '';
    document.getElementById('meetUpSpotError').textContent = '';
    
    // Validate all fields
    const errors = {
        destination: validateDestination(destination),
        tripType: validateTripType(tripType),
        seats: validateSeats(seats),
        price: validatePrice(price),
        date: validateDate(date),
        time: validateTime(time),
        meetUpSpot: validateMeetUpSpot(meetUpSpot)
    };
    
    // Display error messages
    let hasErrors = false;
    Object.keys(errors).forEach(field => {
        if (errors[field]) {
            document.getElementById(`${field}Error`).textContent = errors[field];
            hasErrors = true;
        }
    });
    
    // If no errors, submit the form
    if (!hasErrors) {
        // Create form data object
        const formData = {
            destination,
            tripType,
            seats,
            price,
            date,
            time,
            meetUpSpot
        };
        
        document.getElementById('createTripForm').submit();
    }
});

// Real-time validation
document.getElementById('destination').addEventListener('input', (e) => {
    const error = validateDestination(e.target.value);
    document.getElementById('destinationError').textContent = error;
});

document.getElementById('triptype').addEventListener('change', (e) => {
    const error = validateTripType(e.target.value);
    document.getElementById('tripTypeError').textContent = error;
});

document.getElementById('seats').addEventListener('input', (e) => {
    const error = validateSeats(e.target.value);
    document.getElementById('seatsError').textContent = error;
});

document.getElementById('price').addEventListener('input', (e) => {
    const error = validatePrice(e.target.value);
    document.getElementById('priceError').textContent = error;
});

document.getElementById('date').addEventListener('input', (e) => {
    const error = validateDate(e.target.value);
    document.getElementById('dateError').textContent = error;
});

document.getElementById('time').addEventListener('input', (e) => {
    const error = validateTime(e.target.value);
    document.getElementById('timeError').textContent = error;
});

document.getElementById('meetUpSpot').addEventListener('input', (e) => {
    const error = validateMeetUpSpot(e.target.value);
    document.getElementById('meetUpSpotError').textContent = error;
});