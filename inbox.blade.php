<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('frontend/globals/chatboxglobals.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/css/chatboxstyles.css') }}" />

    </head>
    <body>
      <nav class="navigation" role="navigation" aria-label="Main navigation">
        <div class="social-feed">
          <div class="bg">
            <div class="sidebar">
              <img src="{{ asset('frontend/img/logo1.png') }}" alt="Company logo" class="logo" />
              <img src="{{ asset('frontend/img/home.png') }}" alt="home" class="home" />
              <img src="{{ asset('frontend/img/wline.png') }}" alt="wline" class="wline" />
              <img src="{{ asset('frontend/img/chat.png') }}" alt="chat" class="chat" />
              <img src="{{ asset('frontend/img/event.png') }}" alt="event" class="event" />
              <img src="{{ asset('frontend/img/book.png') }}" alt="book" class="book" />

              <img src="{{ asset('frontend/img/settings.png') }}" alt="settings" class="settings" />
              <img src="{{ asset('frontend/img/main-menu.png') }}" alt="Menu" class="menu-dropdown-icon" />
            </div>
            <main class="content-area" role="main">
                <section class="stories-section" aria-label="User stories">
                    <div class="stories-container">
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
                    </div>
                  </section>

                  <header class="user-header">
                    <div class="user-profile">
                      <img src="{{ asset('frontend/img/notif.png') }}" alt="Notification icon" class="icon" />
                      <img src="{{ asset('frontend/img/light.png') }}" alt="Theme toggle" class="icon" />
                      <img src="{{ asset('frontend/img/profile.jpg') }}" alt="Profile picture" class="profile-pic" />
                      <div class="user-info">
                        <span class="username">Jeriebel Bulac Calunsag</span>
                        <span class="user-role">Student</span>
                      </div>
                    </div>
                    <form class="search-form" role="search">
                      <img src="{{ asset('frontend/img/search.png') }}" alt="" class="search-icon" />
                      <input type="search" placeholder="Search" aria-label="Search" class="search-input" />
                    </form>
                  </header>

              <div class="image">
                <img class="chat" src="{{ asset('frontend/img/chatbg.png') }}" alt="Chat background" />
              </div>

              <div class="messages-content">
                <aside class="chat-interface" role="complementary" aria-label="Messages">
                    <div class="chatbox-border">
                        <div class="chatbox-inside">
                            <div class="header">
                                <img class="img" src="{{ asset('frontend/img/kyle.png') }}" alt="Profile Picture" />
                                <p>
                                    <span class="sender-name">Kyle Grapa</span><br>
                                    <span class="sender-role">Software Engineer</span>
                                </p>
                                <img class="arrowdown" src="{{ asset('frontend/img/arrowdown.png') }}" alt="Arrow Down" />
                                <img src="{{ asset('frontend/img/x.png') }}" alt="Close" class="x">
                            </div>
                            <div class="message-wrapper">
                                <img class="kyle" src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle" />
                                <div class="hi-jeriebel-sadasda-wrapper">
                                    Hi jeriebel, sadasda dasdsa dsad asd a<br />
                                            sadsad sad ?
                                </div>
                                <span class="text-wrapper-time-recieve">9:58 AM</span>
                            </div>
                            <div class="message-sent-wrapper">
                                <span class="text-wrapper-time-sent">10:00 AM</span>
                                <div class="overlap-sent">
                                    <div class="text-wrapper-7">???!!!!</div>
                                </div>
                                <img class="jebel" src="{{ asset('frontend/img/jebel.png') }}" alt="Jebel Profile" />
                            </div>
                            <div class="overlap-4">
                                <div class="div-wrapper">
                                    <span class="text-wrapper-letter">Aa</span>
                                </div>
                                <div class="send-wrapper">
                                    <img class="send" src="{{ asset('frontend/img/send.png') }}" alt="Send" />
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
              </div>
            </main>

            <div class="menu-content">
                <aside class="messages-panel" role="complementary" aria-label="Messages">
                    <h2 class="panel-title">Messages</h2>
                    <div class="messages-users">
                        <a href="#message1" class="user-messages" tabindex="0">
                            <img src="{{ asset('frontend/img/conarcs.png') }}" alt="John Michael's profile" class="messages-avatar" />
                            <div class="user-info">
                                <span class="name">John Michael Conarco</span>
                                <span class="messages">Hoyyyyyyyy!!!</span>
                            </div>
                        </a>
                        <a href="#message2" class="user-messages" tabindex="0">
                            <img src="{{ asset('frontend/img/kenneth.png') }}" alt="Kenneth's profile" class="messages-avatar" />
                            <div class="user-info">
                                <span class="name">Kenneth Oval</span>
                                <span class="messages">Kapatidddddd!!!! ML</span>
                            </div>
                        </a>
                        <a href="#message3" class="user-messages" id="kyle-message" tabindex="0">
                            <img src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle's profile" class="messages-avatar" />
                            <div class="user-info">
                                <span class="name">Kyle Grapa</span>
                                <span class="messages">Hi jeriebel, sadasda dasdsa dsad asd asadsad sad ?</span>
                            </div>
                        </a>
                    </div>
                </aside>
            </div>
          </div>
      </nav>

      <script src="{{ asset('frontend/cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="{{ asset('frontend/js/chatbox.js') }}" defer></script>
    </body>
</html>
