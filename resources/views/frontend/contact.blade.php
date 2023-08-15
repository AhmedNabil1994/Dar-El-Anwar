<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar Al-Anwar</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{asset('images.jpg')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        *
        {
            color: aliceblue;
            text-shadow: #0c0c0c 4px 4px;
        }
        .container{

            box-shadow: black 9px 7px 36px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Contact Us</h1>

    <p>Thank you for your interest in contacting us. You can reach out to us using the form below or through the provided contact methods.</p>

    <h2>Contact Form</h2>
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <h2>Other Contact Methods</h2>
    <ul>
        <li>Email: <a href="mailto:info@example.com">info@example.com</a></li>
        <li>Phone: +123456789</li>
        <li>Twitter: <a href="https://twitter.com/ExampleTwitter" target="_blank">@ExampleTwitter</a></li>
        <li>Instagram: <a href="https://www.instagram.com/ExampleInstagram" target="_blank">@ExampleInstagram</a></li>
        <li>Facebook: <a href="https://www.facebook.com/ExampleFacebook" target="_blank">ExampleFacebook</a></li>
        <li>LinkedIn: <a href="https://www.linkedin.com/in/yourlinkedin" target="_blank">Your LinkedIn</a></li>
    </ul>

    <h2>Address</h2>
    <p>123 Example Street, Sample Town, Perfect Country</p>


    <p><strong>Under Development</strong></p>
    <p>We are currently working on improving our website to provide a better user experience. We apologize for any inconvenience this may cause. Feel free to reach out to us using the provided contact methods while we continue to make enhancements.</p>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
