<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Note</title>
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f0e4d7, #ff9563);
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
        form {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            transition: transform 0.3s;
        }
        form:hover {
            transform: scale(1.02);
        }
        label {
            font-weight: 700;
            color: #495057;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ced4da;
            border-radius: 10px;
            transition: border 0.3s;
        }
        input[type="text"]:focus {
            border-color: #ff9563;
            outline: none;
            box-shadow: 0 0 5px #ca7443(0, 123, 255, 0.5);
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
            background-color: #ff9563;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #ca7443;
            transform: translateY(-2px);
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        @media (min-width: 600px) {
            body {
                font-size: 18px;  
            }
        }

        
        @media (min-width: 900px) {
            .container {
                display: flex;  
            }
        }

        h1 {
        font-size: 2.5rem; 
        }

        p {
        font-size: 1rem;   
        }

        .container {
            display: flex;
            flex-wrap: wrap; 
            width:100%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        .responsive-textarea{
            width: calc(100% - 20px);
            height: 150px;
            padding: 10px;
            margin-bottom: 15px;
            resize: none;
            border: 2px solid #ced4da;
            border-radius: 10px;
            transition: border 0.3s;
        }
        .item {
            flex: 1 1 300px;  /* Grow, shrink, and set a base size */
        }

    </style>
</head>
<body>
    <h1>Edit Note</h1>

    <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $note->title }}" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $note->description }}" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" value="note-content" required class="responsive-textarea">{{ $note->content }}</textarea>
        
        <button type="submit">Update Note</button> 
    </form>

    <div class="button-container">
        <form action="{{ route('showAllNotes') }}" method="GET">
            <button type="submit" class="back-button">Back to Notes</button>
        </form>
    </div>
</body>
</html>
