<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTES</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f0e4d7, #ff9563); /* Soft gradient background */
            margin: 0;
            padding: 40px;
        }
    
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            font-family: 'Verdana', sans-serif; /* Clean, modern font */
            font-size: 4em; /* Large font size for impact */
            color: #fff; /* White text for contrast */
            text-align: center; /* Centered text */
            position: relative; /* For pseudo-elements */
            animation: flicker 1.2s infinite alternate; /* Flicker animation */
        }

        h1::before {
            content: ''; /* Empty content for pseudo-element */
            position: absolute; /* Absolute positioning */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background: rgba(255, 100, 0, 0.2); /* Soft orange glow */
            filter: blur(8px); /* Blurred effect for softness */
            top: 0; /* Align to top */
            left: 0; /* Align to left */
            z-index: -1; /* Send behind the text */
            animation: flickerGlow 1.5s infinite alternate; /* Flickering glow effect */
        }

        @keyframes flicker {
            100% { text-shadow: 0 0 5px rgb(161, 69, 7); }
            100% { text-shadow: 0 0 50px rgba(255, 0, 0, 0.9); }
        }

        @keyframes flickerGlow {
            100% { opacity: 0.3; }
            100% { opacity: 0.7; }
        }

        .create-button {
            text-align: center;
            margin-bottom: 20px;
        }
        .notes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 3fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .note-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .note-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        .note-details {
            margin-bottom: 15px;
            color: #495057;
            overflow: hidden;
        }
        button {
            background-color: #ff9563;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            margin-top: 10px;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }
        button:hover {
            background-color: #ca7443;
            transform: translateY(-2px);
        }
        button:after {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 300%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: transform 0.5s;
            transform: translateX(-100%) rotate(30deg);
            border-radius: 50%;
            z-index: 0;
        }
        button:hover:after {
            transform: translateX(0);
        }
        button span {
            position: relative;
            z-index: 1;
        }

        @media (min-width: 600px) {
            body {
                font-size: 18px;  /* Increase font size */
            }
        }

        /* For devices wider than 900px */
        @media (min-width: 900px) {
            .container {
                display: flex;  /* Change layout for larger screens */
            }
        }

        h1 {
        font-size: 2.5rem;  /* Responsive font size */
        }

        p {
        font-size: 1rem;    /* Default paragraph size */
        }

        .container {
            display: flex;
            flex-wrap: wrap;  /* Allow items to wrap */
        }
        .item {
            flex: 1 1 300px;  /* Grow, shrink, and set a base size */
        }
    </style>
</head>
<body>
    <h1> N O T E S </h1>

    <div class="create-button">
        <form action="{{ route('createNote') }}" method="GET">
            <button type="submit"><span>Create Note</span></button>
        </form>
    </div>

    <div class="notes-container">
        @foreach($notes as $note)
            <div class="note-card">
                <div class="note-details">
                    <strong>Title:</strong> {{ $note->title }}<br>
                    <strong>Description:</strong> {{ $note->description }}<br>
                    <strong>Content:</strong> {{ $note->content }}
                </div>
                <form action="{{ route('viewNote', ['id' => $note->id]) }}" method="GET">
                    <button type="submit"><span>View Note</span></button>
                </form>
            </div>
        @endforeach
    </div>
    
</body>
</html>
