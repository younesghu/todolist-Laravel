<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    @auth
        <div class="loggedin">
            @if(Auth::check()) <!-- Check if the user is logged in -->
                <p><strong><u>{{ Auth::user()->name }}</u> is logged in!</p>
            @endif
            <form action="/logout" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        </div>
        <div class="task-form">
            <img src="images/list.png" alt="">
            <h2>Add A Task Todo</h2>
            <table class="tbl">
                <tr>
                    <form action="/create-task" method="POST">
                    @csrf
                    <td>
                        <input type="text" name="title">
                    </td>
                    <td><button class="but add">add</button></td>
                    </form>
                </tr>
            </table>
        </div>
        <div>
            @foreach ($tasks as $task)
            <div class="task-form">
                <table class="tbl">
                    <tr>
                        <td>{{$task['title']}}</td>
                        <form action="/delete-task/{{$task->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <td><button class="but x">x</button></td>
                        </form>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        @else
        <div class="container">
            <div class="form-box reg">
                <form class="form" action="/register" method="POST">
                    @csrf
                    <span class="title">Register</span>
                    <span class="subtitle">Create an account to get started!</span>
                    <div class="form-container">
                    <input type="text" name="name" class="input" placeholder="Full Name">
                            <input type="email" name="email" class="input" placeholder="Email">
                            <input type="password" name="password" class="input" placeholder="Password">
                    </div>
                    <button>Register</button>
                    <div class="form-section">
                        <p>Have an account? <a href="/login">Log in</a> </p>
                    </div>
                </form>
            </div>
    @endauth
</body>
</html>
