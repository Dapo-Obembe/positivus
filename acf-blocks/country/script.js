function initCountry() {
  const countryInput = document.getElementById("country-inp");
  const searchBtn = document.getElementById("search-btn");
  const searchResult = document.getElementById("search-result");

  const handleSearch = () => {
    const countryName = countryInput.value.trim();

    if (countryName.length === 0) {
      searchResult.style.display = "block";
      searchResult.innerHTML =
        '<p class="text-red-400">Input field cannot be empty.</p>';
      return;
    }

    // Prepare the data to send to the server
    const formData = new FormData();
    formData.append("action", "fetch_country_data"); // This is our custom action name
    formData.append("nonce", mycountry_ajax_obj.nonce); // Security nonce
    formData.append("country", countryName); // The country name from the input

    searchResult.innerHTML = "<p>Loading...</p>";
    searchResult.style.display = "block";

    // Use fetch to send the data to WordPress's admin-ajax.php
    fetch(mycountry_ajax_obj.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((response) => {
        if (response.success) {
          const countryData = response.data;
          // Restore the HTML structure
          searchResult.innerHTML = `
            <img src="${countryData.flag}" id="flag-img" class="w-24 border border-gray-300 rounded mb-4">
            <h3 class="text-xl font-bold"><span id="country">${countryData.officialName}</span>, <span id="country-sec">${countryData.commonName}</span></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 mt-4">
                <h3><strong>Capital:</strong> <span id="capital">${countryData.capital}</span></h3>
                <h3><strong>Continent:</strong> <span id="continent">${countryData.continent}</span></h3>
                <h3><strong>Population:</strong> <span id="population">${countryData.population}</span></h3>
                <h3><strong>Currency:</strong> <span id="currency">${countryData.currencyName}</span> (<span id="currency-abb">${countryData.currencySymbol}</span>)</h3>
                <h3><strong>Common Languages:</strong> <span id="languages">${countryData.languages}</span></h3>
                <h3><strong>Time Zone:</strong> <span id="time">${countryData.timezone}</span></h3>
                <h3><strong>Week Starts On:</strong> <span id="week-starts">${countryData.weekStarts}</span></h3>
            </div>`;
        } else {
          // If response.success is false, show the error message from the server
          throw new Error(response.data.message);
        }
      })
      .catch((error) => {
        searchResult.innerHTML = `<p class="text-red-400">${error.message}</p>`;
      });
  };

  searchBtn.addEventListener("click", handleSearch);

  // Allow pressing Enter to search
  countryInput.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
      handleSearch();
    }
  });
}

// Check if we are on the ACF block preview.
if (window.acf) {
  window.acf.addAction("render_block_preview/type=country", initCountry);
} else {
  document.addEventListener("DOMContentLoaded", initCountry);
}
