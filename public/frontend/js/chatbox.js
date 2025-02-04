document.addEventListener("DOMContentLoaded", () => {
    const messageLinks = document.querySelectorAll(".user-messages");
    const messagesContent = document.querySelector(".messages-content");
    const closeButton = document.querySelector(".messages-content .x");
    const messageWrapper = document.querySelector(".chatbox-inside");

    const loadMessages = (userId) => {
        fetch(`/chat/${userId}`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
            })
            .then(response => response.json())
            .then(data => {
                const messageWrapper = document.querySelector(".chatbox-inside");
                if (!messageWrapper) {
                    console.error("Error: .chatbox-inside not found");
                    return;
                }

                let messagesHtml = '';

                data.messages.forEach(message => {
                    messagesHtml += (message.sender_id === data.auth_user_id) ?
                        `<div class="message-sent-wrapper">
                    <span class="text-wrapper-time-sent">${message.time}</span>
                    <div class="overlap-sent">
                        <div class="text-wrapper-7">${message.message}</div>
                    </div>
                    <img class="jebel" src="${data.auth_user_pic}" alt="Your Profile" />
                </div>` :
                        `<div class="message-wrapper">
                    <img class="kyle" src="${data.receiver_pic}" alt="${data.receiver_name}" />
                    <div class="hi-jeriebel-sadasda-wrapper">${message.message}</div>
                    <span class="text-wrapper-time-recieve">${message.time}</span>
                </div>`;
                });

                messageWrapper.innerHTML = `
                <div class="header">
                    <img class="img" src="${data.receiver_pic}" alt="Profile Picture" />
                    <p>
                        <span class="sender-name">${data.receiver_name}</span><br>
                        <span class="sender-role">${data.receiver_role}</span>
                    </p>
                    <img class="arrowdown" src="/frontend/img/arrowdown.png" alt="Arrow Down" />
                    <img src="/frontend/img/x.png" alt="Close" class="x">
                </div>
                <div class="chat-messages">${messagesHtml}</div>
                <div class="overlap-4">
                    <div class="div-wrapper">
                        <input type="text" id="message-input" class="text-wrapper-letter" placeholder="Type a message...">
                    </div>
                    <div class="send-wrapper">
                        <img class="send" src="/frontend/img/send.png" alt="Send" id="send-message" data-user-id="${data.receiver_id}" />
                    </div>
                </div>
            `;

                openMessagesContent();
                attachSendMessageHandler();
            })
            .catch(error => console.error("Error loading messages:", error));
    };


    // Function to show the messages-content
    const openMessagesContent = () => {
        if (messagesContent) {
            messagesContent.classList.add("active");
        }
    };

    // Function to send a message
    const attachSendMessageHandler = () => {
        const sendButton = document.querySelector("#send-message");
        const messageInput = document.querySelector("#message-input");

        if (sendButton && messageInput) {
            sendButton.addEventListener("click", () => {
                const messageText = messageInput.value.trim();
                const receiverId = sendButton.getAttribute("data-user-id");

                if (messageText === "") return; // Don't send empty messages

                fetch("/send-message", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({
                            receiver_id: receiverId,
                            message: messageText
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            const chatMessages = document.querySelector(".chat-messages");
                            chatMessages.innerHTML += `
                                <div class="message-sent-wrapper">
                                <span class="text-wrapper-time-sent">Just Now</span>
                                    <div class="overlap-sent">
                                        <div class="text-wrapper-7">${messageText}</div>
                                    </div>
                                    <img class="jebel" src="${data.auth_user_pic}" alt="Your Profile" onerror="this.src='/frontend/img/default-pp.jpeg'" />
                                </div>
                            `;
                            messageInput.value = ""; // Clear input field
                        }
                    })
                    .catch((error) => console.error("Error sending message:", error));
            });
        }
    };

    // Attach click event listener to all message links
    messageLinks.forEach((messageLink) => {
        messageLink.addEventListener("click", (event) => {
            event.preventDefault();
            const userId = messageLink.getAttribute("data-user-id");
            loadMessages(userId);
        });
    });

    // Attach click event listener to the close button
    if (closeButton) {
        closeButton.addEventListener("click", () => {
            messagesContent.classList.remove("active");
        });
    }
});



// Clickable images in the timeline
document.querySelectorAll(".bro, .seminars").forEach((image) => {
    image.addEventListener("click", () => {
        window.location.href = "visitprofile.html";
    });
});

// Search bar functionality
const searchBar = document.querySelector(".searchbar .search");
if (searchBar) {
    searchBar.addEventListener("click", () => {
        alert("Search functionality coming soon!");
    });
}

const menuIcon = document.querySelector(".menu-dropdown-icon");
const menuContent = document.querySelector(".menu-content");

if (menuIcon && menuContent) {
    menuIcon.addEventListener("click", () => {
        menuContent.classList.toggle("active");
    });

    document.addEventListener("click", (event) => {
        if (!menuContent.contains(event.target) && !menuIcon.contains(event.target)) {
            menuContent.classList.remove("active");
        }
    });
}

// Sidebar navigation active state logic
const sidebarIcons = document.querySelectorAll(".sidebar img");

sidebarIcons.forEach((icon) => {
    icon.addEventListener("click", function() {
        sidebarIcons.forEach((icon) => icon.classList.remove("active"));
        this.classList.add("active");
    });
});

// JavaScript to handle navigation on image clicks and hover effects

// Add hover effect to elements
function addHoverEffect(selector) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((element) => {
        element.addEventListener("mouseover", () => {
            element.style.cursor = "pointer";
            element.style.opacity = "0.8";
        });
        element.addEventListener("mouseout", () => {
            element.style.opacity = "1";
        });
    });
}

// Redirect to specific URLs when elements are clicked
function addClickRedirect(selector, targetUrl) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((element) => {
        element.addEventListener("click", () => {
            window.location.href = targetUrl;
        });
    });
}

// Add hover and click functionality for profile picture
addClickRedirect(".profile-pic[src='img/profile.jpg']", "profile.html");
addHoverEffect(".profile-pic[src='img/profile.jpg']");

// Add hover and click functionality for suggestion avatar (Kyle)
addClickRedirect(".kyle[src='img/kyle.png']", "visitprofile.html");
addHoverEffect(".kyle[src='img/kyle.png']");

addClickRedirect(".img[src='img/kyle.png']", "visitprofile.html");
addHoverEffect(".img[src='img/kyle.png']");

document.addEventListener("DOMContentLoaded", () => {
    // Get the necessary elements
    const divWrapper = document.querySelector(".div-wrapper");
    const sendWrapper = document.querySelector(".send-wrapper");

    if (divWrapper && sendWrapper) {
        // Make the div-wrapper content editable
        divWrapper.setAttribute("contenteditable", "true");
        divWrapper.setAttribute("role", "textbox");
        divWrapper.style.cursor = "text"; // Change cursor to indicate it's editable
        divWrapper.style.outline = "none"; // Remove the border or focus rectangle

        // Remove the "Aa" when the div-wrapper is clicked
        divWrapper.addEventListener("focus", () => {
            if (divWrapper.innerText.trim() === "Aa") {
                divWrapper.innerText = ""; // Clear the initial placeholder
            }
        });

        // Handle clicking on the send-wrapper
        sendWrapper.addEventListener("click", () => {
            const typedText = divWrapper.innerText.trim(); // Get the typed text
            if (typedText) {
                alert(`You typed: ${typedText}`); // Display the typed text
                divWrapper.innerText = "Aa"; // Reset to "Aa" after sending
            } else {
                alert("Please type something before sending.");
            }
        });
    }

    // Functionality: Redirect to specific pages when clicking on icons
    const pageRedirects = {
        ".home": "socmed",
        ".chat": "inbox",
        ".event": "event.html",
        ".book": "elearningplatform.html",
    };

    Object.keys(pageRedirects).forEach((selector) => {
        const element = document.querySelector(selector);

        if (element) {
            element.addEventListener("click", () => {
                window.location.href = pageRedirects[selector]; // Redirect to the specified page
            });
        }
    });
});
