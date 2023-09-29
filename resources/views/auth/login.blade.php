<!DOCTYPE html>
<html lang="en">
@include('includes.header')

<body>
    <div style="width: 100%;margin-top:100px;text-align:center;font-family: cursue;">
        <h1>Login Form</h1>
    </div>
    <div class="row" style="width: 50%;margin-top:100px">
        <form class="col s12" method="post" action="login">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="text" class="validate">
                    <label for="email">Email</label>
                </div>
               
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name="password" type="text" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>

            
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
            <br>
            <br>
            <a href="register">Register</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
    <!-- Include your JavaScript scripts here -->
</body>
</html>
