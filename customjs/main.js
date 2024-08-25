document.addEventListener("DOMContentLoaded", function() {
    const userType = localStorage.getItem("userType");
    const userInfo = {
        Staff: {imageSrc: "../images/user.png"},
        Client: {imageSrc: "../images/client.png"},
        Attorney: {imageSrc: "../images/admin.png"}
    };

    const {imageSrc} = userInfo[userType] || {};

    if (imageSrc) {
        const nameTag = localStorage.getItem('nameTag');
        document.getElementById("type").innerText = nameTag;
        
        document.getElementById("imageprofile").src = imageSrc;
    }
    popupnotif();
    setInterval(popupnotif, 10000);
});

function getEvents() {
    let events = JSON.parse(localStorage.getItem('events')) || [];

    // Get today's date
    const today = new Date();
    const todayDate = today.toISOString().slice(0, 10); // Format today's date as "YYYY-MM-DD"

    // Filter events happening on today's date
    const todayEvents = events.filter(event => {
        const startDate = new Date(event.start);
        const eventDate = startDate.toISOString().slice(0, 10);
        return eventDate === todayDate;
    });

    // Create a string containing titles of today's events
    const eventTitles = todayEvents.map(event => event.title).join(', ');

    return eventTitles;
}

let previousEventTitles = '';

function popupnotif(){

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverTriggerList.forEach(popoverTriggerEl => {
        const existingPopover = bootstrap.Popover.getInstance(popoverTriggerEl);
        if (existingPopover)
            existingPopover.dispose();
        
        const title = getEvents();
        const popoverContent = `Today's event: ${title}`;
        popoverTriggerEl.setAttribute('data-bs-content', popoverContent);
        
        // Add event listener for shown.bs.popover
        popoverTriggerEl.addEventListener('shown.bs.popover', function () {
            const badge = this.querySelector('.badge');
            if (badge) badge.remove();
        });

        new bootstrap.Popover(popoverTriggerEl);

        // Add badge if there are new events
        if (title.length > 0 && title !== previousEventTitles) {
            const badgeHTML = '<span class="badge bg-danger rounded-circle position-absolute end-5 mt-3" style="font-size: 0.5rem;">!</span>';
            popoverTriggerEl.innerHTML += badgeHTML;
        } else if (title.length === 0) { // Remove badge if there are no events
            const badge = popoverTriggerEl.querySelector('.badge');
            if (badge) badge.remove(); 
        }

        // Update previous event titles
        previousEventTitles = title;
    });
}






