<?php
 if (isset($_SESSION['reset_message'])) {
    echo "<div class='error-message'>" . $_SESSION['reset_message'] . "</div>";
    unset($_SESSION['reset_message']); 
} else {
    echo "<div class='error-message'>Erreur : ERREUR A LA CON </div>";
}

// On pourra customiser tout ça plus tard
        