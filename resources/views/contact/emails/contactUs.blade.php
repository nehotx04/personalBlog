<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body style="background:#111827; padding:0; margin:0; overflow-x:hidden;">
    <header style="color:white; background:#070a13; width:100%; float:left; padding-left:2rem; padding-top:2rem; padding-bottom:2rem;">
        <h1>Personal Blog</h1>
    </header>
    <div>
        <hr style="border: 3px solid #1c273f; color:#1c273f; background:#1c273f; margin-bottom:0;">
        <div style="
        margin-top:0;
        margin-left:1rem; 
        margin-right:1rem;
        width: 0;
        height: 0;
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        border-top: 50px solid #1c273f;
        margin-bottom:-1rem;
        ">

        </div>
    </div>
    <br>
    
    <div style="color:white; padding-left:2rem; padding-right:2rem; text-align:start;">
        <h1>Mail</h1>
        <h3>
            <strong style="margin-bottom:2rem;">Subject: </strong>
            <span>
                {{$contact['subject']}}
            </span>
        </h3>
        <h3>
            <strong style="margin-bottom:2rem;">
                Email: 
            </strong>
            <span>    
                {{$contact['email']}}
            </span>
        </h3>
        <h3>
            <strong style="margin-bottom:2rem;">
                Message: 
            </strong>
            <span>
                {{$contact['message']}}
            </span>
        </h3>
    </div>
</body>
</html>