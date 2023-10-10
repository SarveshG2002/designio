<!DOCTYPE html>
<html lang="en">
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>
    <div style="width: 100%;margin-top:100px;text-align:center;font-family: cursue;">
        <h1>Complete Profile</h1>
    </div>
    <div class="row" style="width:50%;margin-top: 100px;">
            
        <form class="col s12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
            <div class="row">

                <div class="input-field col s6">
                    <label for="username" >Username (Unique):</label>
                    <input type="text" id="username" name="username" required>
                    @error('username')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-field col s6">
                    

                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Choose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <!-- <option value="other">Other</option> -->
                    </select>

                    <!-- <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select> -->
                    @error('gender')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>


                <div class="input-field col s6">
                    <label for="profession">Profession/Title:</label>
                    <input type="text" id="profession" name="profession">
                    @error('profession')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <!-- <label for="profile_picture">Profile Picture:</label> -->
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="profile_picture">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate"  type="text">
                        </div>
                    </div>
                    @error('profile_picture')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <label for="bio">Bio/About Me:</label>
                    <textarea id="bio" name="bio" class="materialize-textarea" rows="3"></textarea>
                    @error('bio')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
            


                <div class="input-field col s6">
                    <label for="experience">Experience:</label>
                    <textarea id="experience" name="experience" class="materialize-textarea" rows="4"></textarea>
                    @error('experience')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="input-field col s6">
                    <label for="skills">Skills:</label>
                    <input type="text" id="skills" name="skills">
                    @error('skills')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="input-field col s6">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location">
                    @error('location')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="input-field col s6">
                    <label for="presence">Online Presence:</label>
                    <input type="text" id="presence" name="presence">
                    @error('presence')
                    <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div  class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Save
                        <i class="material-icons right">send</i>
                    </button>
                </div>
                
                
        </div>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
    </script>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
