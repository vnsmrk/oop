document.addEventListener("DOMContentLoaded", function() {
    const userType = localStorage.getItem("userType");
    const userInfo = {
        Staff: {partsToRemove: ["staffm", "interviewsheetm", "requestm"] },
        Client: {partsToRemove: ["staffm", "clientm", "dashm", "dashid", "casem", "archivedm", "settingsm", "transactionm", "reportm", "calendarm","clientaccm"]},
        Attorney: {partsToRemove: ["interviewsheetm", "clientm", "requestm"] }
    };

    const {partsToRemove } = userInfo[userType] || {};

    if (partsToRemove) {
        partsToRemove.forEach(partId => {
            const part = document.getElementById(partId);
            if (part) part.remove();
        });
    }
    if(userType==="Client")
        clientInitial();
});