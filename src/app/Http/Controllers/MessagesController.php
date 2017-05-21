<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        // All threads, ignore deleted/archived participants
        // $threads = Thread::getAllLatest()->get();

        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        return view('message.index', compact('threads'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */

    public function friends()
    {
        $friends = auth()->user()->getFriends();
        return view('message.friends', compact('friends'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::find($id);
        
        $threads = Thread::forUser(Auth::user()->id)->latest('updated_at')->get();

        return view('message.show', compact('threads', 'user'));
    }

    /**
     * Return the chat of a thread
     *
     * @param $id
     * @return mixed
     */
    public function getChat($id)
    {
        try {
            $thread = Thread::between([Auth::id(), $id])->latest('updated_at')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return 'no chat available';
        }

        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        $thread->load('messages.user');
        $messages = $thread->messages;
        // return $messages;
        return view('message.chat', compact('messages', 'users'));
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        /*If user has permission to chat with the user*/
        try {
            $thread = Thread::between([Auth::id(), $id])->latest('updated_at')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $thread = Thread::create(['subject' => '']);
            $thread->addParticipant(Auth::id(), $id);
        }

        $thread->activateAllParticipants();

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );

        // Add replier as a participant
        $participant = Participant::where(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        )->first();
        
        $participant->last_read = new Carbon;
        $participant->save();

        return 'success';
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = Auth::user()->getFriends()->pluck('id');
        // return $users;

        $users = User::whereIn('id', $users)->get();

        return view('message.create', compact('users'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();

        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect('messages');
    }

    
}