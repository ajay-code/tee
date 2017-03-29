<div class="panel panel-default">
                <div class="profile__image__container">
                    <img id="avatar" src="{{ Auth::user()->avatar() }}" class="profile__image" alt="profile Image">
                    
                </div>
                <div>
                        <p class="text-center">{{ Auth::user()->username ? Auth::user()->username : Auth::user()->firstname }}</p>
                </div>
                <hr>
</div>