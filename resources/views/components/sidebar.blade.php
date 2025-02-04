<div class="sidebar p-3" id="sidebar">
    <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="COMPED Logo" class="logo-img img-fluid">
    </div>
    <a href="{{ route('event-management.home') }}" class="menu-item">
        <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/home/v7/24px.svg" alt="Home" class="menu-icon">
        <span class="menu-text">Home</span>
    </a>
    <a href="{{ route('event-management.calendar') }}" class="menu-item">
        <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/calendar_today/v7/24px.svg" alt="Events" class="menu-icon">
        <span class="menu-text">Events</span>
    </a>
    <a href="{{ route('event-management.attendance') }}" class="menu-item">
        <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/person/v7/24px.svg" alt="Attendance" class="menu-icon">
        <span class="menu-text">Attendance</span>
    </a>
    <a href="{{ route('event-management.finance') }}" class="menu-item">
        <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/paid/v7/24px.svg" alt="Finance" class="menu-icon">
        <span class="menu-text">Finance</span>
    </a>
    <a href="{{ route('event-management.borrow') }}" class="menu-item">
        <img src="https://fonts.gstatic.com/s/i/materialiconsoutlined/construction/v7/24px.svg" alt="Borrowing & Inventory" class="menu-icon">
        <span class="menu-text">Borrowing & Inventory</span>
    </a>
</div>
