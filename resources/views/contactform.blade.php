<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Omni Logs Telegram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 50px;">
    <a class="navbar-brand" href="#">Omni Logs Telegram</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/omni-telegram') }}">Send Message Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/updated-activity') }}">Check Activity BOT OmniLogsMessageBot</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <form action="{{ url('/send-message-telegram') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title Error</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your title error">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Enter your Message" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
