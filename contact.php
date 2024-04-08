<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
    <title>Feedback Form</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

textarea {
    resize: vertical;
}

.rating {
    margin-top: 10px;
}

.rating input {
    display: none;
}

.rating label {
    cursor: pointer;
    font-size: 24px;
}

.rating label i {
    color: #ffd700; /* Golden yellow color for stars */
}

.rating input:checked + label i {
    color: #ffcc00; /* Darker yellow color for selected stars */
}
.rating label.selected i {
    color: #ffcc00;
}

        </style>
</head>
<body>

<div class="container">
    <h2>Feedback Form</h2>
    <form action="submit_feedback.php" method="post">
        <label for="name">Your Name:</label>
        <input type="text" name="name" required>

        <label for="feedback">Feedback:</label>
        <textarea name="feedback" rows="4" required></textarea>

        <label for="rating">Rating:</label>
        <div class="rating">
            <input type="radio" name="rating" value="5" id="star5" required><label for="star5"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" value="4" id="star4" required><label for="star4"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" value="3" id="star3" required><label for="star3"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" value="2" id="star2" required><label for="star2"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" value="1" id="star1" required><label for="star1"><i class="fas fa-star"></i></label>
        </div>

        <button type="submit">Submit Feedback</button>
    </form>
</div>
<script>
    // Get all radio buttons and their corresponding labels
const ratingInputs = document.querySelectorAll('.rating input');
const ratingLabels = document.querySelectorAll('.rating label');

// Add event listeners to each label to handle rating changes
ratingLabels.forEach((label, index) => {
    label.addEventListener('click', () => {
        resetStars(); // Reset all stars

        // Set stars up to the clicked label to selected state
        for (let i = 0; i <= index; i++) {
            ratingLabels[i].classList.add('selected');
        }

        // Set the corresponding radio button to checked
        ratingInputs[index].checked = true;
    });
});

// Function to reset all stars to unselected state
function resetStars() {
    ratingLabels.forEach((label) => {
        label.classList.remove('selected');
    });
}

// Function to reset the rating to zero
function resetRating() {
    resetStars(); // Reset all stars
    ratingInputs.forEach((input) => {
        input.checked = false;
    });
}

    </script>
</body>
</html>
