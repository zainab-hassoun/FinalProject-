<?php
// session_start();

// בדיקה האם המשתמש לחץ על לוגאוט
if (isset($_POST['logout'])) {
    // מחיקת הפרטים הרלוונטיים מהסשן
    unset($_SESSION['username']);
    // ניתוב או הצגת הודעת התנתקות למשתמש
    header('Location: login.php');
    exit();
}
?>

<!-- הוסף את טופס הלוגאוט לדף שלך -->
<form action="" method="post">

    <button type="submit" name="logout">התנתק <script>alert("logout!")</script></button>
</form>
