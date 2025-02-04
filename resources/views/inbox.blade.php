<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/globals/chatboxglobals.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/chatboxstyles.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navigation" role="navigation" aria-label="Main navigation">
        <div class="social-feed">
            <div class="bg">
                <div class="sidebar">
                    <img src="{{ asset('frontend/img/logo1.png') }}" alt="Company logo" class="logo" />
                    <a href="{{ route('socmed.form', ['id' => $user->id]) }}">
                        <img src="{{ asset('frontend/img/home.png') }}" alt="home" class="home" />
                    </a>
                    <img src="{{ asset('frontend/img/wline.png') }}" alt="wline" class="wline" />
                    <a href="{{ route('inbox', ['id' => $user->id]) }}">
                        <img src="{{ asset('frontend/img/chat.png') }}" alt="chat" class="chat" />
                    </a>
                    <a href="{{ route('event-management.borrow', ['id' => $user->id]) }}">
                        <img src="{{ asset('frontend/img/event.png') }}" alt="event" class="event" />
                    </a>


                    <img src="{{ asset('frontend/img/book.png') }}" alt="book" class="book" />

                    <img src="{{ asset('frontend/img/settings.png') }}" alt="settings" class="settings" />
                    <img src="{{ asset('frontend/img/main-menu.png') }}" alt="Menu" class="menu-dropdown-icon" />
                </div>
                <main class="content-area" role="main">
                    <section class="stories-section" aria-label="User stories">
                        {{-- <div class="stories-container">
                      <h2 class="section-title">Followers</h2>
                      <div class="stories-scroll" role="list">
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/jebel.png') }}" alt="Jebel's profile" class="story-avatar" />
                          <span class="story-username">Jebel</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/benj.png') }}" alt="Benjie's profile" class="story-avatar" />
                          <span class="story-username">Benjie</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/conarcs.png') }}" alt="Conarcs's profile" class="story-avatar" />
                          <span class="story-username">Conarcs</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/kenneth.png') }}" alt="Kenneth's profile" class="story-avatar" />
                          <span class="story-username">Kenneth</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/keith.png') }}" alt="Keith's profile" class="story-avatar" />
                          <span class="story-username">Keith</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/kim.png') }}" alt="Kim's profile" class="story-avatar" />
                          <span class="story-username">Kim</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle's profile" class="story-avatar" />
                          <span class="story-username">Kyle</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/kyt.png') }}" alt="Kyt's profile" class="story-avatar" />
                          <span class="story-username">Kyt</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/don.png') }}" alt="Don's profile" class="story-avatar" />
                          <span class="story-username">Don</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/eugene.png') }}" alt="Eugene's profile" class="story-avatar" />
                          <span class="story-username">Eugene</span>
                        </div>
                        <div class="story-item" role="listitem" tabindex="0">
                          <img src="{{ asset('frontend/img/claidy.png') }}" alt="Claidy's profile" class="story-avatar" />
                          <span class="story-username">Claidy</span>
                        </div>
                      </div>
                    </div> --}}
                    </section>

                    <header class="user-header">
                        <div class="user-profile">
                            <img src="{{ asset('frontend/img/notif.png') }}" alt="Notification icon" class="icon" />
                            <img src="{{ asset('frontend/img/light.png') }}" alt="Theme toggle" class="icon" />
                            <img src="{{ asset($user->profile_pic) }}" alt="Profile picture" class="profile-pic" />
                            <div class="user-info">
                                <span class="username">{{ $user->name }}</span>
                                <span class="user-role">{{ $user->status }}</span>
                            </div>
                        </div>
                        <form class="search-form" role="search">
                            <img src="{{ asset('frontend/img/search.png') }}" alt="" class="search-icon" />
                            <input type="search" placeholder="Search" aria-label="Search" class="search-input" />
                        </form>
                    </header>

                    <div class="image">
                        <div class="messages-content">
                            <aside class="chat-interface">
                                <div class="chatbox-border">
                                    <div class="chatbox-inside">
                                        <!-- Chat messages will be loaded dynamically here -->
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>


                </main>
                <div class="menu-content">
                    <aside class="messages-panel" role="complementary" aria-label="Messages">
                        <h2 class="panel-title">Messages</h2>
                        <div class="messages-users">
                            @foreach ($latestMessages as $contactId => $messages)
                                @php
                                    $contact = $contacts->where('id', $contactId)->first();
                                @endphp
                                @if ($contact)
                                    <a href="#" class="user-messages" data-user-id="{{ $contact->id }}"
                                        tabindex="0">
                                        <img src="{{ asset($contact->profile_pic ?? 'frontend/img/default-pp.jpeg') }}"
                                            alt="{{ $contact->name }}'s profile" class="messages-avatar" />
                                        <div class="user-info">
                                            <span class="name">{{ $contact->name }}</span>
                                            <span class="messages">
                                                {{ $messages->first()->message }}
                                            </span>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </aside>
                </div>




            </div>
    </nav>

    <script src="{{ asset('frontend/cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/chatbox.js') }}" defer></script>
</body>

</html>
