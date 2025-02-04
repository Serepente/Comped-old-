document.addEventListener("DOMContentLoaded", () => {
    // Sidebar Toggle
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');

    if (toggleSidebar) {
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('minimized');
        });
    }

    // Month Short/Full Name Toggle for Mobile
    const monthElements = document.querySelectorAll(".card .title");
    const months = [{
            full: "January",
            short: "Jan"
        }, {
            full: "February",
            short: "Feb"
        },
        {
            full: "March",
            short: "Mar"
        }, {
            full: "April",
            short: "Apr"
        },
        {
            full: "May",
            short: "May"
        }, {
            full: "June",
            short: "Jun"
        },
        {
            full: "July",
            short: "Jul"
        }, {
            full: "August",
            short: "Aug"
        },
        {
            full: "September",
            short: "Sep"
        }, {
            full: "October",
            short: "Oct"
        },
        {
            full: "November",
            short: "Nov"
        }, {
            full: "December",
            short: "Dec"
        }
    ];

    monthElements.forEach((element, index) => {
        const shortTitle = document.createElement("span");
        shortTitle.classList.add("short-title");
        shortTitle.textContent = months[index].short;
        element.insertAdjacentElement("afterend", shortTitle);

        // Show appropriate title based on screen size
        const updateTitleVisibility = () => {
            if (window.innerWidth <= 576) {
                element.style.display = "none"; // Hide full month name
                shortTitle.style.display = "inline"; // Show shortened name
            } else {
                element.style.display = "inline"; // Show full month name
                shortTitle.style.display = "none"; // Hide shortened name
            }
        };

        window.addEventListener('resize', updateTitleVisibility);
        updateTitleVisibility(); // Initialize
    });

    // Calendar Functionality
    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    let currentDate = new Date();
    const monthElement = document.querySelector(".month li:nth-child(3)");
    const daysElement = document.querySelector(".days");

    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();

        // Update month and year in the header
        monthElement.innerHTML = `${monthNames[month]}<br><span style="font-size:18px">${year}</span>`;

        // Get the first day and number of days in the month
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Clear previous days
        daysElement.innerHTML = "";

        // Fill in empty cells for the first week alignment
        for (let i = 0; i < firstDay; i++) {
            const li = document.createElement("li");
            daysElement.appendChild(li);
        }

        // Add all days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const li = document.createElement("li");
            li.textContent = day;
            daysElement.appendChild(li);
        }
    }

    // Initially render the calendar
    renderCalendar(currentDate);

    // Month Selection from Cards
    const monthCards = document.querySelectorAll('.card');
    monthCards.forEach((card, index) => {
        card.addEventListener('click', () => {
            currentDate.setMonth(index);
            renderCalendar(currentDate);

            // Update active carousel item
            document.querySelector('.carousel-item.active').classList.remove('active');
            card.closest('.carousel-item').classList.add('active');
        });
    });

    // Calendar Navigation Buttons
    document.querySelector('.month .prev').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.querySelector('.month .next').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const attendanceSection = document.getElementById("right-sidebar");

    if (attendanceSection) {
        // Check the current page URL
        if (window.location.pathname.includes("/event-management/home")) {
            attendanceSection.style.display = "block";
        } else {
            attendanceSection.style.display = "none";
        }
    }
});

// Finance js
document.addEventListener("DOMContentLoaded", () => {
    $(document).ready(function() {
        $('#confirmButtonmodal').on('click', function() {
            Swal.fire({
                title: "Good job!",
                text: "Your payment is Processing",
                icon: "success"
            });

            $('#qrModal').modal('hide');
        });
    });



    document.getElementById('toggleSidebar').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('minimized');
    });




    document.getElementById("confirmButton").addEventListener("click", function() {
        const amount = document.getElementById("paymentAmount").value;
        const gcashNumber = document.getElementById("gcashNumber").value;

        document.getElementById("modalAmount").innerText = amount;
        document.getElementById("modalGCashNumber").innerText = gcashNumber;
    });

    document.getElementById("modalNextButton").addEventListener("click", function() {
        alert("Proceed to the next step!");
    });
});

// payment js
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default GET behavior
    this.submit(); // Ensure form submits as POST
});