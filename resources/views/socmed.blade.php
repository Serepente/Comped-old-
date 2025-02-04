<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/globals/socmedglobals.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/socmedstyle.css') }}" />

</head>

<body>
    <nav class="navigation" role="navigation" aria-label="Main navigation">
        <div class="social-feed">
            <div class="bg">
                <div class="sidebar">
                    <img src="{{ asset('frontend/img/logo1.png') }}" alt="Company logo" class="logo" />
                    <img src="{{ asset('frontend/img/home.png') }}" alt="home" class="home" />
                    <img src="{{ asset('frontend/img/wline.png') }}" alt="wline" class="wline" />
                    <a href="{{ route('inbox') }}">
                        <img src="{{ asset('frontend/img/chat.png') }}" alt="chat" class="chat" />
                    </a>
                    <a href="{{ route('event-management.home') }}">
                        <img src="{{ asset('frontend/img/event.png') }}" alt="event" class="event" />
                    </a>

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
                                    <img src="{{ asset('frontend/img/jebel.png') }}" alt="Jebel's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Jebel</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/benj.png') }}" alt="Benjie's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Benjie</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/conarcs.png') }}" alt="Conarcs's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Conarcs</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/kenneth.png') }}" alt="Kenneth's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Kenneth</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/keith.png') }}" alt="Keith's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Keith</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/kim.png') }}" alt="Kim's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Kim</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Kyle</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/kyt.png') }}" alt="Kyt's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Kyt</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/don.png') }}" alt="Don's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Don</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/eugene.png') }}" alt="Eugene's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Eugene</span>
                                </div>
                                <div class="story-item" role="listitem" tabindex="0">
                                    <img src="{{ asset('frontend/img/claidy.png') }}" alt="Claidy's profile"
                                        class="story-avatar" />
                                    <span class="story-username">Claidy</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <header class="user-header">
                        <div class="user-profile">
                            <img src="{{ asset('frontend/img/notif.png') }}" alt="Notification icon"
                                class="icon" />
                            <img src="{{ asset('frontend/img/light.png') }}" alt="Theme toggle" class="icon" />
                            <img src="{{ asset($user->profile_pic) }}" alt="Profile picture"
                                class="profile-pic" />
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

                    <section class="post-creation" aria-label="Create post">
                        <div class="post-input">
                            <button aria-label="Post options" class="options-btn">
                                <img src="{{ asset('frontend/img/3dot.png') }}" alt="3do" />
                            </button>
                            <div class="input-area">
                                <img src="{{ asset($user->profile_pic) }}" alt="Your profile"
                                    class="user-avatar" />
                                <input type="text" placeholder="Share something..." aria-label="Create a post"
                                    class="post-text-input" />
                            </div>
                            <div class="post-actions">
                                <div class="action-buttons">
                                    <button class="action-btn" aria-label="Add files">
                                        <img src="{{ asset('frontend/img/files.png') }}" alt="Files" />
                                        <span>Files</span>
                                    </button>
                                    <button class="action-btn" aria-label="Add photos">
                                        <img src="{{ asset('frontend/img/photos.png') }}" alt="Photos" />
                                        <span>Photos</span>
                                    </button>
                                    <button class="action-btn" aria-label="Add tags">
                                        <img src="{{ asset('frontend/img/tags.png') }}" alt="Tags" />
                                        <span>Tag</span>
                                    </button>
                                    <button class="action-btn" aria-label="Add links">
                                        <img src="{{ asset('frontend/img/links.png') }}" alt="Links" />
                                        <span>Links</span>
                                    </button>
                                </div>
                                <button class="post-btn">Post</button>
                            </div>
                        </div>
                    </section>

                    <section class="feed" aria-label="Posts feed">
                        <h2 class="feed-title">Timeline</h2>
                        <article class="post-card" role="article">
                            <div class="post-header">
                                <img src="{{ asset('frontend/img/conarcs.png') }}" alt="John Michael's profile"
                                    class="post-avatar" />
                                <div class="post-meta">
                                    <span class="author-name">John Michael Conarco</span>
                                    <span class="author-role">Senior</span>
                                </div>
                                <button aria-label="Post options" class="options-btn">
                                    <img src="{{ asset('frontend/img/3dot.png') }}" alt="" />
                                </button>
                            </div>
                            <p class="post-content">Magbabalik ang nakaraan Ibabalik ang pinagmulan Umaasa Umaasa</p>
                            <div class="post-actions">
                                <button class="action-btn" aria-label="Like post">
                                    <img src="{{ asset('frontend/img/heart.png') }}" alt="" />
                                    Like
                                </button>
                                <button class="action-btn" aria-label="Comment on post">
                                    <img src="{{ asset('frontend/img/comment.png') }}" alt="" />
                                    Comment
                                </button>
                                <button class="action-btn" aria-label="Share post">
                                    <img src="{{ asset('frontend/img/share.png') }}" alt="" />
                                    Share
                                </button>
                            </div>
                        </article>

                        <article class="post-card" role="article">
                            <div class="post-header">
                                <img src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle's profile"
                                    class="post-avatar" />
                                <div class="post-meta">
                                    <span class="author-name">Kyle Zymund C. Grapa</span>
                                    <span class="author-role">Senior</span>
                                    <span class="follow-status">Follow...</span>
                                </div>
                                <button aria-label="Post options" class="options-btn">
                                    <img src="{{ asset('frontend/img/3dot.png') }}" alt="" />
                                </button>
                            </div>
                            <p class="post-content">Attending Seminar with my Friends :)</p>
                            <img src="{{ asset('frontend/img/seminars.png') }}" alt="Seminar photo with friends"
                                class="post-image" />
                            <div class="post-actions">
                                <button class="action-btn" aria-label="Like post">
                                    <img src="{{ asset('frontend/img/heart.png') }}" alt="" />
                                    Like
                                </button>
                                <button class="action-btn" aria-label="Comment on post">
                                    <img src="{{ asset('frontend/img/comment.png') }}" alt="" />
                                    Comment
                                </button>
                                <button class="action-btn" aria-label="Share post">
                                    <img src="{{ asset('frontend/img/share.png') }}" alt="" />
                                    Share
                                </button>
                            </div>
                        </article>
                    </section>
                </main>

                <div class="menu-content">
                    <aside class="suggestions-panel" role="complementary" aria-label="Suggestions">
                        <h2 class="panel-title">Suggestions</h2>
                        <div class="suggested-users">
                            <div class="user-suggestion">
                                <img src="{{ asset('frontend/img/conarcs.png') }}" alt="John Michael's profile"
                                    class="suggestion-avatar" />
                                <div class="user-info">
                                    <span class="name">John Michael Conarco</span>
                                    <span class="role">Senior</span>
                                </div>
                                <button class="follow-btn">Follow</button>
                            </div>
                            <div class="user-suggestion">
                                <img src="{{ asset('frontend/img/kenneth.png') }}" alt="Kenneth's profile"
                                    class="suggestion-avatar" />
                                <div class="user-info">
                                    <span class="name">Kenneth Oval</span>
                                    <span class="role">Carpenter</span>
                                </div>
                                <button class="follow-btn followed">Followed</button>
                            </div>
                            <div class="user-suggestion">
                                <img src="{{ asset('frontend/img/kyle.png') }}" alt="Kyle's profile"
                                    class="suggestion-avatar" />
                                <div class="user-info">
                                    <span class="name">Kyle Grapa</span>
                                    <span class="role">Bro^2</span>
                                </div>
                                <button class="follow-btn followed">Followed</button>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <section class="job-updates" aria-label="Job updates">
                            <h3 class="section-title">Job Update</h3>
                            <img src="{{ asset('frontend/img/jobs.png') }}" alt="Latest job opportunities"
                                class="job-image" />
                        </section>
                    </aside>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="{{ asset('frontend/js/socmed.js') }}"></script>

</body>

</html>
