document.addEventListener("DOMContentLoaded", function () {
    fetchRegions();
  
    document.getElementById("regions").addEventListener("change", function () {
      const regionName = this.value;
      if (regionName) {
        fetchProvinces(regionName);
      } else {
        clearSelect(document.getElementById("provinces"));
        clearSelect(document.getElementById("cities"));
        clearSelect(document.getElementById("barangays"));
      }
    });
  
    document.getElementById("provinces").addEventListener("change", function () {
      const provinceName = this.value;
      if (provinceName) {
        fetchCitiesMunicipalities(provinceName);
      } else {
        clearSelect(document.getElementById("cities"));
        clearSelect(document.getElementById("barangays"));
      }
    });
  
    document.getElementById("cities").addEventListener("change", function () {
      const cityMunicipalityName = this.value;
      if (cityMunicipalityName) {
        fetchBarangays(cityMunicipalityName);
      } else {
        clearSelect(document.getElementById("barangays"));
      }
    });
  });
  
  function fetchRegions() {
    fetch("https://psgc.gitlab.io/api/regions/")
      .then((response) => response.json())
      .then((data) => {
        populateSelect(document.getElementById("regions"), data);
      })
      .catch((error) => console.error("Error fetching regions:", error));
  }
  
  function fetchProvinces(regionName) {
    fetch("https://psgc.gitlab.io/api/regions/")
      .then((response) => response.json())
      .then((regions) => {
        const region = regions.find((r) => r.name === regionName);
        if (region) {
          return fetch(
            `https://psgc.gitlab.io/api/regions/${region.code}/provinces/`
          )
            .then((response) => response.json())
            .then((data) => {
              populateSelect(document.getElementById("provinces"), data);
              clearSelect(document.getElementById("cities"));
              clearSelect(document.getElementById("barangays"));
            });
        } else {
          throw new Error("Region not found");
        }
      })
      .catch((error) => console.error("Error fetching provinces:", error));
  }
  
  function fetchCitiesMunicipalities(provinceName) {
    fetch("https://psgc.gitlab.io/api/provinces/")
      .then((response) => response.json())
      .then((provinces) => {
        const province = provinces.find((p) => p.name === provinceName);
        if (province) {
          return fetch(
            `https://psgc.gitlab.io/api/provinces/${province.code}/cities-municipalities/`
          )
            .then((response) => response.json())
            .then((data) => {
              populateSelect(document.getElementById("cities"), data);
              clearSelect(document.getElementById("barangays"));
            });
        } else {
          throw new Error("Province not found");
        }
      })
      .catch((error) =>
        console.error("Error fetching cities/municipalities:", error)
      );
  }
  
  function fetchBarangays(cityMunicipalityName) {
    fetch("https://psgc.gitlab.io/api/cities-municipalities/")
      .then((response) => response.json())
      .then((cities) => {
        const city = cities.find((c) => c.name === cityMunicipalityName);
        if (city) {
          return fetch(
            `https://psgc.gitlab.io/api/cities-municipalities/${city.code}/barangays/`
          )
            .then((response) => response.json())
            .then((data) => {
              populateSelect(document.getElementById("barangays"), data);
            });
        } else {
          throw new Error("City/Municipality not found");
        }
      })
      .catch((error) => console.error("Error fetching barangays:", error));
  }
  
  function populateSelect(selectElement, data) {
    clearSelect(selectElement);
    data.forEach((item) => {
      const option = document.createElement("option");
      option.value = item.name;
      option.textContent = item.name;
      selectElement.appendChild(option);
    });
  }
  
  function clearSelect(selectElement) {
    selectElement.innerHTML =
      '<option value="" selected disabled>Select</option>';
  }
  