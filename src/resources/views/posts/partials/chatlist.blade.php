                <div class="panel panel-default"> <!-- Chatlist Panel -->
                    @if ($onlineFriends->count() <= 0)
                            <div class="padding-left-10">   
                                No friend is Online
                            </div>
                    @else
                        <div class="padding-left-10">Friends Online</div>
                    @endif
                    <div id="chatlist" class="chatlist {{ auth()->user()->online ? '': 'opacity-2' }}"><!-- Chatlist -->
                        
                        @foreach ($onlineFriends as $friend)
                            <div class="chatlist-item">
                                <a href="{{ route('messages.user.show', $friend->id) }}">
                                    <p class="chatlist-name">
                                    <img src="{{ $friend->thumbnail() }}" class="chatlist-image" alt="{{ $friend->name }}">
                                        {{ $friend->name }}
                                    <span class="pull-right dot"></span>
                                    </p>
                                </a>
                            </div>
                        @endforeach

                        
                    </div><!-- End Of Chatlist -->
                    <div class="row padding-10"><!-- Change Status Row -->
                        <div class="col-sm-12 ">
                            <div class=" border-top-dark padding-top-10">
                            <div class="col-xs-6">
                                <h5 class="padding-left-10">Change status</h5>
                            </div>
                            <div class="col-xs-6">
                                <input id="status" type="checkbox" data-toggle="toggle" data-on="Online" data-off="Offline" data-onstyle="success" data-offstyle="danger"
                                {{ auth()->user()->online ? 'checked': '' }}
                                >
                            </div>
                            </div>
                        </div>
                    </div><!-- End of Change Status Row -->
                </div><!-- End of Chatlist Panel -->