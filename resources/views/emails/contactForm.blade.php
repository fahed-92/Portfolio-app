
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
<h1>Contact Form Submission</h1>
<p><strong>Name:</strong> {{ $details['name'] }}</p>
<p><strong>Email:</strong> {{ $details['email'] }}</p>
<p><strong>Subject:</strong> {{ $details['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $details['message'] }}</p>
</body>
</html>
