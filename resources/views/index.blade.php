<!DOCTYPE html>
<html>
<head>
    <title>Laravel Task</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: auto; }
        form div { margin-bottom: 10px; }
        .error { color: red; }
        .success { color: green; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; padding: 8px; }
    </style>
</head>
<body>

<h2>Laravel Task</h2>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

<form action="{{ route('submit.message') }}" method="POST">
    @csrf
    <div>
        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div>
        <label>Message:</label><br>
        <textarea name="message">{{ old('message') }}</textarea>
        @error('message') <div class="error">{{ $message }}</div> @enderror
    </div>

    <button type="submit">Submit</button>
</form>

<h3>All Messages</h3>
<table>
    <tr>
        <th>Name</th><th>Email</th><th>Message</th><th>Date</th>
    </tr>
    @foreach($messages as $msg)
    <tr>
        <td>{{ $msg->name }}</td>
        <td>{{ $msg->email }}</td>
        <td>{{ $msg->message }}</td>
        <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
