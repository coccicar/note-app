<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Notes</title>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(0deg, #f0e4d7, #ff9563);
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
            background: rgba(248, 136, 62, 0.2); /* Soft orange glow */
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
        .note-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            transition: transform 0.3s;
        }

        .note-card:hover {
            transform: scale(1.02);
        }
        .note-details {
            margin-bottom: 50px;
            overflow: hidden;
        }
        .note-details div {
            margin-bottom: 10px;
            font-weight: 500;
            color: #495057;
            overflow: hidden;
        }
        button {
            background-color: #ff9563;
            color: white;
            border: none;
            padding: 12px;
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
        .back-button {
            background-color: #945734;
        }
        .back-button:hover {
            background-color: #57321d;
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
    <h1> V I E W <div> N O T E S</h1>

    <div class="note-card">
        <div class="note-details">
            <div><strong>Title:</strong> {{ $note->title }}</div>
            <div><strong>Description:</strong> {{ $note->description }}</div>
            <div><strong>Content:</strong> {{ $note->content }}</div>
        </div>
        <form action="{{ route('editNote', ['id' => $note->id]) }}" method="GET">
            <button type="submit">Edit Note</button>
        </form>
        
        <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
            @csrf
            <input type="hidden" name="action" value="delete">
            <button type="submit">Delete Note</button>
        </form>
        <form action="{{ route('showAllNotes') }}" method="GET">
            <button type="submit" class="back-button">Back to Notes</button>
        </form>
    </div>
</body>
</html>