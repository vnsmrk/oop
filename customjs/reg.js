document.addEventListener("DOMContentLoaded", () => {
    const regionsSelect = document.getElementById("regions");
    const provincesSelect = document.getElementById("provinces");
    const citiesSelect = document.getElementById("cities");
    const barangaysSelect = document.getElementById("barangays");
    const jsonFilePath = "ph.json";
    fetch(jsonFilePath)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Failed to load JSON file: ${response.status} ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            console.log("JSON data loaded successfully:", data);
            populateRegions(data);
        })
        .catch(error => {
            console.error("Error loading JSON:", error.message);
            alert("Error loading JSON data. Please check the console for details.");
        });
    function populateRegions(data) {
        const sortedRegions = Object.keys(data).sort((a, b) => a.localeCompare(b, undefined, { numeric: true }));
        for (const regionKey of sortedRegions) {
            const region = data[regionKey];
            const regionName = region.region_name;
            const option = document.createElement("option");
            option.text = regionName;
            option.value = regionKey;
            regionsSelect.appendChild(option);
        }
        regionsSelect.addEventListener("change", () => {
            const selectedRegionKey = regionsSelect.value;
            clearAndPopulateDropdown(provincesSelect, Object.keys(data[selectedRegionKey].province_list), "Select a province");
            clearDropdown(citiesSelect, "Select a city/municipality");
            clearDropdown(barangaysSelect, "Select a barangay");
        });
        provincesSelect.addEventListener("change", () => {
            const selectedRegionKey = regionsSelect.value;
            const selectedProvinceName = provincesSelect.value;
            clearAndPopulateDropdown(citiesSelect, Object.keys(data[selectedRegionKey].province_list[selectedProvinceName].municipality_list), "Select a city/municipality");
            clearDropdown(barangaysSelect, "Select a barangay");
        });
        citiesSelect.addEventListener("change", () => {
            const selectedRegionKey = regionsSelect.value;
            const selectedProvinceName = provincesSelect.value;
            const selectedCityName = citiesSelect.value;
            const barangayList = data[selectedRegionKey].province_list[selectedProvinceName].municipality_list[selectedCityName].barangay_list;
            clearAndPopulateDropdown(barangaysSelect, barangayList, "Select a barangay", true);
        });
    }
    function clearAndPopulateDropdown(selectElement, data, placeholderText, isArray = false) {
        clearDropdown(selectElement, placeholderText);
        if (isArray) {
            data.forEach(item => {
                const option = document.createElement("option");
                option.text = item;
                option.value = item;
                selectElement.appendChild(option);
            });
        } else {
            Object.keys(data).forEach(key => {
                const option = document.createElement("option");
                option.text = data[key];
                option.value = data[key];
                selectElement.appendChild(option);
            });
        }
    }
    function clearDropdown(selectElement, placeholderText) {
        selectElement.innerHTML = "";
        const placeholderOption = document.createElement("option");
        placeholderOption.text = placeholderText;
        placeholderOption.disabled = true;
        placeholderOption.selected = true;
        selectElement.appendChild(placeholderOption);
    }
});