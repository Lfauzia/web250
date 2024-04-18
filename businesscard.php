<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Business Card</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9; 
        margin: 0;
        padding: 0;
    }
    .card {
        background-color: #fff; /
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        padding: 40px;
        max-width: 400px;
        margin: 100px auto;
        position: relative;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-10px);
    }
    .card:before {
        content: '';
        position: absolute;
        top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;
        background: linear-gradient(45deg, #FFAC81, #FF928B, #FF6A8B, #FF6A8B, #FF6A8B, #FFAC81);
        border-radius: 30px;
        z-index: -1;
        transition: opacity 0.3s ease-in-out;
    }
    .card:hover:before {
        opacity: 0.5;
    }
    h1 {
        color: #333; 
        text-align: center;
        margin-bottom: 10px;
        position: relative;
        animation: fadeInUp 0.5s ease-out;
    }
    p {
        color: #555; 
        text-align: center;
        margin-bottom: 5px;
        position: relative;
        animation: fadeInUp 0.5s ease-out;
    }
    .contact-info {
        padding-top: 20px;
        border-top: 1px solid #eee;
        text-align: center;
    }
    .contact-info p {
        margin-bottom: 10px;
    }
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .card-border {
        position: absolute;
        top: -30px;
        left: -30px;
        right: -30px;
        bottom: -30px;
        border: 3px solid #FF6A8B; 
        border-radius: 35px;
        z-index: -2;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover .card-border {
        transform: scale(1.05);
    }
</style>
</head>
<body>

<div class="card">
    <div class="card-border"></div>
    <h1>Laura Fauzia</h1>
    <p>Owner, Legendary Fox</p>
    <div class="contact-info">
        <p>Email: lfox@example.com</p>
        <p>Phone: +1234567890</p>
        <p>Website: <a href="http://hellofox.lovestoblog.com/index.php?page=home" target="_blank">Hello Fox</a></p>
        <p>Address: 1 Seven Oh Four, Charlotte NC, USA</p>
        <p>Social: <a href="https://www.facebook.com/example" target="_blank">Facebook</a>, <a href="https://www.twitter.com/example" target="_blank">X</a>, <a href="https://www.instagram.com/example" target="_blank">Instagram</a></p>
    </div>
</div>

</body>
</html>
